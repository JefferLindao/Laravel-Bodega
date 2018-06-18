<?php

namespace SisBodega\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use SisBodega\Models\User;
use SisBodega\Models\Venta;
use DB;
class SeguridadController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth');
    }

    public function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }

    public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $usuarios=User::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($usuarios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($usuarios as $usuario){
        $diasel=intval(date("d",strtotime($usuario->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

    public function registros_venta($anio,$mes){
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $venta=Venta::whereBetween('Vent_fech', [$fecha_inicial,  $fecha_final])->get();

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }
        foreach($venta as $vent){
        $diasel=intval(date("d",strtotime($vent->Vent_fech) ) );
        $registros[$diasel]++;    
        }
        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

    public function index(Request $request)
    {
        if($request)
        {
            $ventas=DB::table('tb_detven as dv')
            ->join('tb_articu as a', 'dv.Arti_codi','=','a.Arti_codi')
            ->select(DB::raw('CONCAT(a.Arti_nomb, " ",a.Arti_seri ) AS articulo'),'a.Arti_imag', 'a.Arti_desc', DB::raw('sum(dv.Detv_cant) as MasVendido'))
            ->orderBy('MasVendido', 'des')
            ->groupBy('articulo','Arti_desc','Arti_imag')
            ->limit(4)
            ->get();

            $usuarios=DB::table('users')->select('id')->count();
            $proveedores=DB::table('tb_person')->where('Pers_tipe','=','Proveedor')->count();
            $clientes=DB::table('tb_person')->where('Pers_tipe','=','Cliente')->count();
            $articulos=DB::table('tb_articu')->select('id')->count();  
           
            $articuReciente=DB::table('tb_deting as di')
            ->join('tb_articu as a','di.Arti_codi','=','a.Arti_codi')
            ->select('a.Arti_codi','a.Arti_nomb','a.Arti_desc','a.Arti_imag','di.Deti_prev')
            ->orderBy('Arti_codi', 'des')
            ->groupBy('a.Arti_codi','a.Arti_nomb','a.Arti_desc','a.Arti_imag','di.Deti_prev')
            ->limit(4)
            ->get();
            $anio=date("Y");
            $mes=date("m");
            $today=today();

            $venta=DB::table('tb_venta')
            ->select(DB::raw('sum(Vent_tove) as suma'))
            ->whereDate('Vent_fech','=',date("Y-m-d"))
            ->groupBy(DB::raw('date(Vent_fech)'))
            ->first();

            return view('seguridad.home.index',["usuarios"=>$usuarios,"proveedores"=>$proveedores,"clientes"=>$clientes, "articulos"=>$articulos, "articuReciente"=>$articuReciente, 'anio'=>$anio, 'mes'=>$mes, "ventas"=>$ventas,"venta"=>$venta]);

        }
    }
}
