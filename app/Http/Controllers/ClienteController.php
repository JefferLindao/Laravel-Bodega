<?php

namespace SisBodega\Http\Controllers;

use Illuminate\Http\Request;
use SisBodega\Models\Persona;
use Illuminate\Support\Facades\Redirect;
use SisBodega\Http\Requests\PersonaFormRequest;
use DB;

class ClienteController extends Controller
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
            $personas=DB::table('tb_person')
            ->where('Pers_nomb','LIKE','%'.$query.'%')
            ->where('Pers_tipe','=','Cliente')
            ->orwhere('Pers_nudo','LIKE','%'.$query.'%')
            ->where('Pers_tipe','=','Cliente')
            ->orderBy('Pers_codi','asc')
            ->paginate(5);
            return view('ventas.cliente.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaFormRequest $request)
    {
        $persona=new Persona;
        $persona->Pers_tipe='Cliente';
        $persona->Pers_nomb=$request->get('nombre');
        $persona->Pers_tido=$request->get('tipo_documento');
        $persona->Pers_nudo=$request->get('numero_documento');
        $persona->Pers_dire=$request->get('direccion');
        $persona->Pers_tele=$request->get('telefono');
        $persona->Pers_emai=$request->get('email');
        $persona->save();
        return Redirect::to('ventas/cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ventas.cliente.show',["persona"=>Persona::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('ventas.cliente.edit',["persona"=>Persona::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaFormRequest $request, $id)
    {
        $persona=Persona::findOrFail($id);

        $persona->Pers_nomb=$request->get('nombre');
        $persona->Pers_tido=$request->get('tipo_documento');
        $persona->Pers_nudo=$request->get('numero_documento');
        $persona->Pers_dire=$request->get('direccion');
        $persona->Pers_tele=$request->get('telefono');
        $persona->Pers_emai=$request->get('email');
        $persona->update();
        return Redirect::to('ventas/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->Pers_tipe='Inactivo';
        $persona->update();
        return Redirect::to('ventas/cliente');
    }
}
