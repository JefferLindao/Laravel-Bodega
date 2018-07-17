<?php

namespace SisBodega\Http\Controllers;

use Illuminate\Http\Request;
use SisBodega\Models\Articulo;
use SisBodega\Models\Categoria;
use Illuminate\Support\Facades\Input;
use SisBodega\http\Requests;
use Validator;
use Response;
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
            $articulos=DB::table('tb_articu as a')->join('tb_catego as c', 'a.Cate_codi', '=', 'c.Cate_codi')
            ->select('a.Arti_codi', 'a.Arti_nomb', 'a.Arti_seri', 'a.Arti_stoc', 'c.Cate_nomb', 'c.Cate_codi', 'a.Arti_desc', 'a.Arti_imag', 'a.Arti_esta', 'a.Arti_fech')
            ->where('a.Arti_esta','=','Activo')
            ->paginate(4);
            $categorias=Categoria::all();
            return view('almacen.articulo.index',compact('articulos', 'categorias'));
        }
    }

    public function create(Request $request)
    {
        $output="";
        $artic="";
        $rules = array(
        'nombre' => 'required',
        'codigo' => 'required',
        'fecha' => 'date',
        'descripcion' => 'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        else{
            $articulo = new Articulo;
            $articulo->Arti_nomb = $request->nombre;
            $articulo->Arti_desc = $request->descripcion;
            $articulo->Arti_seri = $request->codigo;
            $articulo->Arti_fech = $request->fecha;
            $articulo->Cate_codi = $request->categoria;
            $articulo->Arti_stoc = '0';
            $articulo->Arti_tota = '0';
            $articulo->Arti_esta = 'Activo';
            if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/img/articulos',$file->getClientOriginalName());
            $articulo->Arti_imag=$file->getClientOriginalName();
            }
            $articulo->save();
            if($articulo){
                $articulos=DB::table('tb_articu as a')->join('tb_catego as c', 'a.Cate_codi', '=', 'c.Cate_codi')
               ->select('a.Arti_codi', 'a.Arti_nomb', 'a.Arti_seri', 'a.Arti_stoc', 'c.Cate_nomb', 'c.Cate_codi', 'a.Arti_desc', 'a.Arti_imag', 'a.Arti_esta', 'a.Arti_fech')
               ->where('a.Arti_esta','=','Activo')
                ->paginate(4);
                foreach ($articulos as $art) {
                    if ( $art->Arti_stoc != "0") {
                        $artic = " <a href='#' class='edit-modal btn btn-warning btn-sm' data-codi='". $art->Arti_codi ."' data-nomb='". $art->Arti_nomb ."' data-seri='". $art->Arti_seri ."' data-nomc='". $art->Cate_codi ."' data-stoc='". $art->Arti_stoc ."' data-esta='". $art->Arti_esta ."' data-desc='". $art->Arti_desc ."' data-imag='". $art->Arti_imag ."'>Editar</a>";
                    }else {
                       $artic = " <a href='../compras/ingreso/create'><button class='btn btn-sm bg-blue'>Ingreso</button></a>";
                    }
                    $output .=
                    "<tr class='articulo". $art->Arti_codi ."'>".
                    "<td>". $art->Arti_codi ."</td>".
                    "<td>". $art->Arti_nomb ."</td>".
                    "<td>". $art->Arti_seri ."</td>".
                    "<td>". $art->Cate_nomb ."</td>".
                    "<td>". $art->Arti_stoc ."</td>".
                    "<td class='text-center'>".
                        "<img src='../../../../img/articulos/".$art->Arti_imag."' height='100px' width='100px' class='img-thumbnail imag-center'>".
                    "</td>".
                    "<td>". $art->Arti_esta ."</td>".
                    "<td class='text-center'>".
                    "<a href='#' class='show-modal btn btn-info btn-sm' data-codi='". $art->Arti_codi ."' data-nomb='". $art->Arti_nomb ."' data-seri='". $art->Arti_seri ."' data-nomc='". $art->Cate_nomb ."' data-stoc='". $art->Arti_stoc ."' data-esta='". $art->Arti_esta ."' data-desc='". $art->Arti_desc ."' data-imag='". $art->Arti_imag ."'>Detalles</a>".
                    $artic.
                    " <a href='#' class='delete-modal btn btn-danger btn-sm' data-codi='". $art->Arti_codi ."' data-nomb='". $art->Arti_nomb ."'>Eliminar</a>".
                    "</td>";
                }
            }
            return response($output);
        }
    }
   
    public function edit(request $request)
    {
        $rules = array(
        'nombre' => 'required',
        'codigo' => 'required',
        'fecha' => 'date',
        'descripcion' => 'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        else{
            $articulo = Articulo::find ($request->id);
            $articulo->Arti_nomb = $request->nombre;
            $articulo->Arti_desc = $request->descripcion;
            $articulo->Arti_seri = $request->codigo;
            $articulo->Arti_fech = $request->fecha;
            $articulo->Cate_codi = $request->categoria;
            if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/img/articulos',$file->getClientOriginalName());
            $articulo->Arti_imag=$file->getClientOriginalName();
            }
            $articulo->save();
            $articulos=DB::table('tb_articu as a')->join('tb_catego as c', 'a.Cate_codi', '=', 'c.Cate_codi')
            ->select('a.Arti_codi', 'a.Arti_nomb', 'a.Arti_seri', 'a.Arti_stoc', 'c.Cate_nomb', 'c.Cate_codi', 'a.Arti_desc', 'a.Arti_imag', 'a.Arti_esta', 'a.Arti_fech')
            ->where('a.Arti_esta','=','Activo')
            ->where('a.Arti_codi','=',$request->id)
            ->get();
            return response()->json(array('art' => $articulos));
        }
    }
    public function delete(request $request){
      $articulo = Articulo::findOrFail($request->id);
      $articulo->delete();
      return response()->json();
    }
    public function search(Request $request)
    {
        $output="";
        if ($request->ajax()) {
            $query=trim($request->searchText);
            $articulos=DB::table('tb_articu as a')->join('tb_catego as c', 'a.Cate_codi', '=', 'c.Cate_codi')
            ->select('a.Arti_codi', 'a.Arti_nomb', 'a.Arti_seri', 'a.Arti_stoc', 'c.Cate_nomb', 'c.Cate_codi', 'a.Arti_desc', 'a.Arti_imag', 'a.Arti_esta', 'a.Arti_fech')
            ->where('a.Arti_esta','=','Activo')
            ->where('a.Arti_nomb','LIKE','%'.$query.'%')
            ->orwhere('a.Arti_seri','LIKE','%'.$query.'%')
            ->orwhere('c.Cate_nomb', 'LIKE','%'.$query.'%')
            ->paginate(4);
            if ($articulos) {
                foreach ($articulos as $art) {
                    if ( $art->Arti_stoc != "0") {
                        $artic = " <a href='#' class='edit-modal btn btn-warning btn-sm' data-codi='". $art->Arti_codi ."' data-nomb='". $art->Arti_nomb ."' data-seri='". $art->Arti_seri ."' data-nomc='". $art->Cate_codi ."' data-stoc='". $art->Arti_stoc ."' data-esta='". $art->Arti_esta ."' data-desc='". $art->Arti_desc ."' data-imag='". $art->Arti_imag ."'>Editar</a>";
                    }else {
                       $artic = " <a href='../compras/ingreso/create'><button class='btn btn-sm bg-blue'>Ingreso</button></a>";
                    }
                    $output .=
                    "<tr class='articulo". $art->Arti_codi ."'>".
                    "<td>". $art->Arti_codi ."</td>".
                    "<td>". $art->Arti_nomb ."</td>".
                    "<td>". $art->Arti_seri ."</td>".
                    "<td>". $art->Cate_nomb ."</td>".
                    "<td>". $art->Arti_stoc ."</td>".
                    "<td class='text-center'>".
                        "<img src='../../../../img/articulos/".$art->Arti_imag."' height='100px' width='100px' class='img-thumbnail imag-center'>".
                    "</td>".
                    "<td>". $art->Arti_esta ."</td>".
                    "<td class='text-center'>".
                    "<a href='#' class='show-modal btn btn-info btn-sm' data-codi='". $art->Arti_codi ."' data-nomb='". $art->Arti_nomb ."' data-seri='". $art->Arti_seri ."' data-nomc='". $art->Cate_nomb ."' data-stoc='". $art->Arti_stoc ."' data-esta='". $art->Arti_esta ."' data-desc='". $art->Arti_desc ."' data-imag='". $art->Arti_imag ."'>Detalles</a>".
                    $artic.
                    " <a href='#' class='delete-modal btn btn-danger btn-sm' data-codi='". $art->Arti_codi ."' data-nomb='". $art->Arti_nomb ."'>Eliminar</a>".
                    "</td>";
                }
            }
            return Response($output);
        }
    }
}
