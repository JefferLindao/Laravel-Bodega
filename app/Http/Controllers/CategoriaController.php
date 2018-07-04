<?php

namespace SisBodega\Http\Controllers;

use Illuminate\Http\Request;
use SisBodega\Models\Categoria;
use Illuminate\Support\Facades\Input;
use SisBodega\http\Requests;
use Validator;
use Response;
use DB;

class CategoriaController extends Controller
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
    $categorias=Categoria::paginate(5);
    return view('almacen.categoria.index',compact('categorias'));
  }
  public function addPost(Request $request){
      $rules = array(
        'nombre' => 'required',
        'descripcion' => 'required',
      );
    $validator = Validator::make ( Input::all(), $rules);
    if ($validator->fails())
    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

    else {
      $categoria = new Categoria;
      $categoria->Cate_nomb=$request->nombre;
      $categoria->Cate_desc=$request->descripcion;
      $categoria->Cate_cond='1';
      $categoria->save();
      return response()->json($categoria);
    }
  }

  public function editPost(request $request){
      $categoria = Categoria::find ($request->id);
      $categoria->Cate_nomb = $request->nombre;
      $categoria->Cate_desc = $request->descripcion;
      $categoria->save();
      return response()->json($categoria);
  }

  public function deletePost(request $request){
      $categoria = Categoria::find ($request->id)->delete();
      return response()->json();
  }
  public function search(Request $request)
  {
    $output="";
    if ($request->ajax()) {
      $query=trim($request->searchText);
      $categorias=DB::table('tb_catego')->where('Cate_nomb','LIKE','%'.$query.'%')
      ->where('Cate_cond','=','1')
      ->paginate(5);
      if ($categorias) {
        foreach ($categorias as $cat) {
          $output .= 
          
          "<tr class='categoria".$cat->Cate_codi. "'>".
          "<td>". $cat->Cate_codi . "</td>".
          "<td>" . $cat->Cate_nomb . "</td>".
          "<td>" . $cat->Cate_desc . "</td>".
          "<td><a class='show-modal btn btn-info btn-sm' data-codi='" . $cat->Cate_codi . "' data-nomb='" . $cat->Cate_nomb . "' data-desc='" . $cat->Cate_desc . "'>Detalles</a> <a class='edit-modal btn btn-warning btn-sm' data-codi='" . $cat->Cate_codi . "' data-nomb='" . $cat->Cate_nomb . "' data-desc='" . $cat->Cate_desc . "'>Editar</a> <a class='delete-modal btn btn-danger btn-sm' data-codi='" . $cat->Cate_codi . "' data-nomb='" . $cat->Cate_nomb . "' data-desc='" . $cat->Cate_desc . "'>Eliminar</a></td>".
          "</tr>";
        }
      }

      return Response($output);
    }
  }
}
