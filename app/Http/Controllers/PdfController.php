<?php

namespace SisBodega\Http\Controllers;

use Illuminate\Http\Request;
use SisBodega\Models\User;
use SisBodega\Models\Persona;
use SisBodega\Models\Ingreso;
use SisBodega\Models\DetalleIngreso;
use SisBodega\Models\Categoria;
use SisBodega\Models\Articulo;
use PDF;
use DB;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function usuarioPDF()
    {
    	$usuarios=DB::table('role_user as ru')
        ->join('users as u','ru.user_id','=','u.id')
        ->join('roles as r','ru.role_id','=','r.id')
        ->select('u.id as id', 'u.name as name', 'u.email as email', 'r.name as role')
        ->orderBy('u.id','asc')
        ->get();
        $datos=date('d/m/Y');
    	$pdf=PDF::loadView('pdf.usuario',['usuarios'=>$usuarios, 'datos'=> $datos]);
    	return $pdf->stream('usaurio.pdf');

    }
    public function proveedorPDF()
    {
        $proveedores=DB::table('tb_person')
            ->where('Pers_tipe','=','Proveedor')
            ->orderBy('Pers_codi','asc')
            ->get();
        $datos=date('d/m/Y');
        $pdf=PDF::loadView('pdf.proveedor',['proveedores'=>$proveedores, 'datos'=> $datos]);
        return $pdf->stream('proveedor.pdf');
    }
    public function ingresoPDF()
    {
        $ingresos=DB::table('tb_ingres as i')
            ->join('tb_person as p','i.Prov_codi','=','p.Pers_codi')
            ->join('tb_Deting as di','i.Ingr_codi','=','di.Ingr_codi')
            ->select('i.Ingr_codi as codi','i.Ingr_fech as fech','p.Pers_nomb as nomb','i.Ingr_tico as tico','i.Ingr_seco as seco','i.Ingr_nuco as nuco','i.Ingr_impu as impu','i.Ingr_esta as esta',DB::raw('sum(di.Deti_cant*Deti_prec) as total'))
            ->orderBy('i.Ingr_codi','desc')
            ->groupBy('i.Ingr_codi','i.Ingr_fech','p.Pers_nomb','i.Ingr_tico','i.Ingr_seco','i.Ingr_nuco','i.Ingr_impu','i.Ingr_esta')
            ->get();
        $datos=date('d/m/Y');
        $pdf=PDF::loadView('pdf.ingreso',['ingresos'=>$ingresos, 'datos'=> $datos]);
        return $pdf->stream('ingreso.pdf');
    }
    public function categoriaPDF()
    {
    	$categorias=Categoria::all();
        $datos=date('d/m/Y');
    	$pdf=PDF::loadView('pdf.categoria',['categorias'=>$categorias, 'datos'=> $datos]);
    	return $pdf->stream('categoria.pdf');
    }
    public function articuloPDF()
    {
        $articulos=DB::table('tb_articu as a')
        ->join('tb_catego as c', 'a.Cate_codi', '=', 'c.Cate_codi')
        ->select('a.Arti_codi', 'a.Arti_nomb', 'a.Arti_seri', 'a.Arti_stoc', 'c.Cate_nomb as cate', 'a.Arti_desc', 'a.Arti_esta')
        ->paginate(10000);
       
        $datos=date('d/m/Y');
        $pdf=PDF::loadView('pdf.articulo',['articulos'=>$articulos, 'datos'=> $datos]);
        return $pdf->stream('articulo.pdf');
    }
    public function clientePDF()
    {
        $clientes=DB::table('tb_person')
        ->where('Pers_tipe','=','Cliente')
        ->orderBy('Pers_codi','asc')
        ->get();
        $datos=date('d/m/Y');
        $pdf=PDF::loadView('pdf.cliente',['clientes'=>$clientes, 'datos'=> $datos]);
        return $pdf->stream('cliente.pdf');
    }
     public function ventaPDF()
    {
        $ventas=DB::table('tb_venta as v')
        ->join('tb_person as p','v.Clie_codi','=','p.Pers_codi')
        ->join('tb_detven as dv','v.Vent_codi','=','dv.Vent_codi')
        ->select('v.Vent_codi as codi','v.Vent_fech as fech','p.Pers_nomb as nomb','v.Vent_tico as tico','v.Vent_seco as seco','v.Vent_nuco as nuco','v.Vent_impu as impu','v.Vent_esta as esta','v.Vent_tove as tove')
        ->orderBy('v.Vent_codi','desc')
        ->get();
        $datos=date('d/m/Y');
        $pdf=PDF::loadView('pdf.ventas',['ventas'=>$ventas, 'datos'=> $datos]);
        return $pdf->stream('venta.pdf');
    }
     public function ventas($id)
    {
       $venta=DB::table('tb_venta as v')
        ->join('tb_person as p', 'v.Clie_codi', '=', 'p.Pers_codi')
        ->select('v.Vent_codi', 'p.Pers_nomb', 'p.Pers_dire', 'p.Pers_nudo', 'v.Vent_tico','v.Vent_seco', 'v.Vent_nuco', 'v.Vent_impu', 'v.Vent_esta', 'v.Vent_tove',DB::raw('DATE_FORMAT(v.Vent_fech,"%d/%m/%Y") as fecha'))
        ->where('v.Vent_codi', '=', $id)
        ->first();

        $detalles=DB::table('tb_detven as d')
        ->join('tb_articu as a', 'd.Arti_codi', '=', 'a.Arti_codi')
        ->select('a.Arti_nomb as articulo','a.Arti_seri as serie','a.Arti_desc as desc','d.Detv_cant','d.Detv_decu','d.Detv_prev')
        ->where('d.Vent_codi', '=', $id)
        ->get();

        $descuento=DB::table('tb_detven')
        ->select(DB::raw('SUM(tb_detven.Detv_decu) as des'),DB::raw('SUM(tb_detven.Detv_cant*tb_detven.Detv_prev) as subt'))
        ->where('Vent_codi', '=', $id)
        ->first();

        $datos="";
        $pdf=PDF::loadView('pdf.salidas',['venta'=>$venta, 'datos'=> $datos, "detalles"=>$detalles, "descuento"=>$descuento]);
        return $pdf->stream('venta.pdf');
    }
    public function pedidos($id)
    {
       $ingreso=DB::table('tb_ingres as i')
        ->join('tb_person as p', 'i.Prov_codi', '=', 'p.Pers_codi')
        ->select('i.Ingr_codi', 'p.Pers_nomb', 'p.Pers_dire', 'p.Pers_nudo', 'i.Ingr_tico','i.Ingr_seco', 'i.Ingr_nuco', 'i.Ingr_impu', 'i.Ingr_esta',DB::raw('DATE_FORMAT(i.Ingr_fech,"%d/%m/%Y") as fecha'))
        ->where('i.Ingr_codi', '=', $id)
        ->first();

        $detalles=DB::table('tb_deting as d')
        ->join('tb_articu as a', 'd.Arti_codi', '=', 'a.Arti_codi')
        ->select('a.Arti_nomb as articulo','a.Arti_seri as serie','a.Arti_desc as desc','d.Deti_cant','d.Deti_prec','d.Deti_prev')
        ->where('d.Ingr_codi', '=', $id)
        ->get();

        $total=DB::table('tb_deting')
        ->select(DB::raw('SUM(tb_deting.Deti_cant*tb_deting.Deti_prec) as total'))
        ->where('Ingr_codi', '=', $id)
        ->first();

        $datos="";
        $pdf=PDF::loadView('pdf.entradas',['ingreso'=>$ingreso, 'datos'=> $datos, "detalles"=>$detalles, 'total'=>$total]);
        return $pdf->stream('ingreso.pdf');
    }
    public function kardex($id)
    {
        $articulo=Articulo::findOrFail($id);
        $kardex=DB::table('tb_kardex')
        ->select('Kard_movi','Kard_cant','Kard_prev','Kard_sast','Kard_sato',DB::raw('DATE_FORMAT(Kard_fech,"%d/%m/%Y") as fecha'))
        ->where('Arti_codi', '=', $id)
        ->get();
        $datos=date('d/m/Y');
        $pdf=PDF::loadView('pdf.kardex',['datos'=>$datos, 'kardex'=>$kardex, 'articulo'=>$articulo]);
        return $pdf->stream('kardex.pdf');
    }
}