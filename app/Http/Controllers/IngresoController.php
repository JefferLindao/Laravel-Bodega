<?php

namespace SisBodega\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SisBodega\Http\Requests\IngresoFormRequest;
use SisBodega\Models\Ingreso;
use SisBodega\Models\DetalleIngreso;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class IngresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            $ingresos=DB::table('tb_ingres as i')
            ->join('tb_person as p','i.Prov_codi','=','p.Pers_codi')
            ->join('tb_Deting as di','i.Ingr_codi','=','di.Ingr_codi')
            ->select('i.Ingr_codi','i.Ingr_fech','p.Pers_nomb','i.Ingr_tico','i.Ingr_seco','i.Ingr_nuco','i.Ingr_impu','i.Ingr_esta',DB::raw('sum(di.Deti_cant*Deti_prec) as total'))
            ->where('i.Ingr_nuco','LIKE','%'.$query.'%')
            ->orderBy('i.Ingr_codi','desc')
            ->groupBy('i.Ingr_codi','i.Ingr_fech','p.Pers_nomb','i.Ingr_tico','i.Ingr_seco','i.Ingr_nuco','i.Ingr_impu','i.Ingr_esta')
            ->paginate(5);
            return view('compras.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas=DB::table('tb_person')->where('Pers_tipe','=','Proveedor')->get();
        $articulos=DB::table('tb_articu as a')
        ->select(DB::raw('CONCAT(a.Arti_seri, " ", a.Arti_nomb) AS articulo'),'a.Arti_codi')
        ->where('a.Arti_esta', '=', 'Activo')
        ->get();
        return view("compras.ingreso.create", ["personas"=>$personas, "articulos"=>$articulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngresoFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $ingreso = new Ingreso;
            $ingreso->Ingr_tico='Factura';
            $ingreso->Ingr_seco=$request->get('serie_comprobante');
            $ingreso->Ingr_nuco=$request->get('numero_comprobante');
            $ingreso->Prov_codi=$request->get('proveedor');
            $ingreso->Ingr_tota=$request->get('total_ingreso');

            $mytime= Carbon::now('America/Guayaquil');
            $ingreso->Ingr_fech=$mytime->toDateTimeString();
            $ingreso->Ingr_impu='14';
            $ingreso->Ingr_esta='A';
            $ingreso->save();

            $idarticulo=$request->get('articulo');
            $cantidad=$request->get('cantidad');
            $precio_compra=$request->get('precio_compra');
            $precio_venta=$request->get('precio_venta');

            $cont=0;
           

            while ($cont < count($idarticulo)) {
                $detalle=new DetalleIngreso();
                $detalle->Deti_cant=$cantidad[$cont];
                $detalle->Deti_prec=$precio_compra[$cont];
                $detalle->Deti_prev=$precio_venta[$cont];
                $detalle->Deti_movi='Entran';
                $detalle->Arti_codi=$idarticulo[$cont];
                $detalle->Ingr_codi=$ingreso->Ingr_codi;
                $detalle->save();
               
                $cont=$cont+1;
            }
           
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return Redirect::to('compras/ingreso');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso=DB::table('tb_ingres as i')
        ->join('tb_person as p', 'i.Prov_codi', '=', 'p.Pers_codi')
        ->join('tb_Deting as di', 'i.Ingr_codi', '=', 'di.Ingr_codi')
        ->select('i.Ingr_codi', 'i.Ingr_fech', 'p.Pers_nomb', 'i.Ingr_tico','i.Ingr_seco', 'i.Ingr_nuco', 'i.Ingr_impu', 'i.Ingr_esta', DB::raw('sum(di.Deti_cant*Deti_prec) as total'))
        ->where('i.Ingr_codi', '=', $id)
        ->groupBy('i.Ingr_codi', 'i.Ingr_fech', 'p.Pers_nomb', 'i.Ingr_tico','i.Ingr_seco', 'i.Ingr_nuco', 'i.Ingr_impu', 'i.Ingr_esta')
        ->first();

        $detalles=DB::table('tb_Deting as d')
        ->join('tb_articu as a', 'd.Arti_codi', '=', 'a.Arti_codi')
        ->select('a.Arti_nomb as articulo','d.Deti_cant','d.Deti_prec','d.Deti_prev')
        ->where('d.Ingr_codi', '=', $id)->get();
        return view("compras.ingreso.show", ["ingreso"=>$ingreso, "detalles"=>$detalles]);
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
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->Ingr_esta='C';
        $ingreso->update();
        return Redirect::to('compras/ingreso');
    }
}
