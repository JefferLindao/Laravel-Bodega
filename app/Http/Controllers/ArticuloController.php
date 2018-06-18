<?php

namespace SisBodega\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBodega\Http\Requests\ArticuloFormRequest;
use SisBodega\Models\Articulo;
use DB;

class ArticuloController extends Controller
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
        if($request)
        {
            $query=trim($request->get('searchText'));
            $articulos=DB::table('tb_articu as a')->join('tb_catego as c', 'a.Cate_codi', '=', 'c.Cate_codi')
            ->select('a.Arti_codi', 'a.Arti_nomb', 'a.Arti_seri', 'a.Arti_stoc', 'c.Cate_nomb', 'a.Arti_desc', 'a.Arti_imag', 'a.Arti_esta')
            ->where('a.Arti_nomb','LIKE','%'.$query.'%')
            ->orwhere('a.Arti_seri','LIKE','%'.$query.'%')
            ->orwhere('c.Cate_nomb', 'LIKE','%'.$query.'%')
            ->orderBy('a.Arti_codi','asc')
            ->paginate(4);
            return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=DB::table('tb_catego')->where('Cate_cond', '=', '1')->get();
        return view("almacen.articulo.create", ["categorias"=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloFormRequest $request)
    {
        $articulo=new Articulo;
        $articulo->Arti_seri=$request->get('codigo');
        $articulo->Arti_nomb=$request->get('nombre');
        $articulo->Arti_stoc='0';
        $articulo->Arti_desc=$request->get('descripcion');
        $articulo->Arti_tota='0';
        $articulo->Arti_fech=$request->get('fecha');
        $articulo->Arti_esta='Activo';

        $articulo->Cate_codi=$request->get('selecategoria');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/img/articulos',$file->getClientOriginalName());
            $articulo->Arti_imag=$file->getClientOriginalName();
        }
        $articulo->save();
        return Redirect::to('almacen/articulo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('almacen.articulo.show',["articulo"=>Articulo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        
       
        $articulo=Articulo::findOrFail($id);
        $categorias=DB::table('tb_catego')->where('Cate_cond', '=', '1')->get();

        $consulta=DB::table('tb_ingres as i')
        ->join('tb_person as p', 'i.Prov_codi', '=', 'p.Pers_codi')
        ->join('tb_Deting as d', 'i.Ingr_codi', '=', 'd.Ingr_codi')
        ->join('tb_articu as a', 'd.Arti_codi', '=', 'a.Arti_codi')
        ->select('p.Pers_nomb','d.Deti_prec','d.Deti_prev')
        ->where('a.Arti_codi', '=', $id)
        ->first();


        $salida=DB::table('tb_Kardex as k')
        ->join('tb_articu as a', 'k.Arti_codi', '=', 'a.Arti_codi')
        ->select('a.Arti_nomb', 'k.Kard_cant', 'k.Kard_movi','k.Kard_prev','k.Kard_prec', 'k.Kard_stoc', 'k.Kard_sast','k.Kard_sato', DB::raw('DATE_FORMAT(k.Kard_fech,"%H:%i") as hora'),DB::raw('DATE_FORMAT(k.Kard_fech,"%d %b %Y") as fecha'))
        ->where('a.Arti_codi', '=', $id)
        ->orderBy('fecha','asc')
        ->get();

        return view('almacen.articulo.edit',["articulo"=>$articulo, "categorias"=>$categorias, "consulta"=>$consulta, "salida"=>$salida]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloFormRequest $request, $id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->Arti_seri=$request->get('codigo');
        $articulo->Arti_nomb=$request->get('nombre');
        $articulo->Arti_desc=$request->get('descripcion');
        $articulo->Arti_fech=$request->get('fecha');
        $articulo->Cate_codi=$request->get('selecategoria');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/img/articulos',$file->getClientOriginalName());
            $articulo->Arti_imag=$file->getClientOriginalName();
        }
        $articulo->update(); 
        return Redirect::to('almacen/articulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->Arti_esta='Inactivo';
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }
}
