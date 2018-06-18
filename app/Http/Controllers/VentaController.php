<?php

namespace SisBodega\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SisBodega\Http\Requests\VentaFormRequest;
use SisBodega\Models\Venta;
use SisBodega\Models\DetalleVenta;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $ventas=DB::table('tb_venta as v')
            ->join('tb_person as p','v.Clie_codi','=','p.Pers_codi')
            ->join('tb_detven as dv','v.Vent_codi','=','dv.Vent_codi')
            ->select('v.Vent_codi','v.Vent_fech','p.Pers_nomb','v.Vent_tico','v.Vent_seco','v.Vent_nuco','v.Vent_impu','v.Vent_esta','v.Vent_tove')
            ->where('v.Vent_nuco','LIKE','%'.$query.'%')
            ->orderBy('v.Vent_codi','desc')
            ->groupBy('v.Vent_codi','v.Vent_fech','p.Pers_nomb','v.Vent_tico','v.Vent_seco','v.Vent_nuco','v.Vent_impu','v.Vent_esta','v.Vent_tove')
            ->paginate(5);
            return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas=DB::table('tb_person')->where('Pers_tipe','=','Cliente')->get();
        $articulos=DB::table('tb_articu as a')
        ->join('tb_deting as di', 'a.Arti_codi', '=', 'di.Arti_codi')
        ->select(DB::raw('CONCAT(a.Arti_seri, " ", a.Arti_nomb) as articulo'),'a.Arti_codi', 'a.Arti_stoc',DB::raw('max(di.Deti_prev*di.Deti_cant/di.Deti_cant) as precio_promedio'))
        ->where('a.Arti_esta', '=', 'Activo')
        ->where('a.Arti_stoc', '>', '0')
        ->groupBy('articulo', 'a.Arti_codi', 'a.Arti_stoc')
        ->get();
        return view("ventas.venta.create", ["personas"=>$personas, "articulos"=>$articulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $venta=new Venta;
            $venta->Vent_tico='Comprobante';
            $venta->Vent_seco=$request->get('serie_comprobante');
            $venta->Vent_nuco=$request->get('numero_comprobante');
            $venta->Clie_codi=$request->get('cliente');
            $venta->Vent_tove=$request->get('total_venta');

            $mytime= Carbon::now('America/Guayaquil');
            $venta->Vent_fech=$mytime->toDateTimeString();
            $venta->Vent_impu='14';
            $venta->Vent_esta='A';
            $venta->save();

            $articulo=$request->get('articulo');
            $cantidad=$request->get('cantidad');
            $descuento=$request->get('descuento');
            $precio_venta=$request->get('precio_venta');

            $cont=0;

            while ($cont < count($articulo)) {
                $detalle=new DetalleVenta();
                $detalle->Detv_cant=$cantidad[$cont];
                $detalle->Detv_decu=$descuento[$cont];
                $detalle->Detv_prev=$precio_venta[$cont];
                $detalle->Detv_movi='Salen';
                $detalle->Arti_codi=$articulo[$cont];
                $detalle->Vent_codi=$venta->Vent_codi;
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return Redirect::to('ventas/venta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=DB::table('tb_venta as v')
        ->join('tb_person as p', 'v.Clie_codi', '=', 'p.Pers_codi')
        ->join('tb_detven as dv', 'v.Vent_codi', '=', 'dv.Vent_codi')
        ->select('v.Vent_codi', 'v.Vent_fech', 'p.Pers_nomb', 'v.Vent_tico','v.Vent_seco', 'v.Vent_nuco', 'v.Vent_impu', 'v.Vent_esta', 'v.Vent_tove')
        ->where('v.Vent_codi', '=', $id)
        ->first();

        $detalles=DB::table('tb_detven as d')
        ->join('tb_articu as a', 'd.Arti_codi', '=', 'a.Arti_codi')
        ->select('a.Arti_nomb as articulo','d.Detv_cant','d.Detv_decu','d.Detv_prev')
        ->where('d.Vent_codi', '=', $id)
        ->get();
        return view("ventas.venta.show", ["venta"=>$venta, "detalles"=>$detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta=Venta::findOrFail($id);
        $venta->Vent_esta='C';
        $venta->update();
        return Redirect::to('ventas/venta');
    }
}
