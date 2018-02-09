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

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function usuarioPDF()
    {
    	$usuarios=User::all();
    	$pdf=PDF::loadView('pdf.usuario',['usuarios'=>$usuarios]);
    	return $pdf->stream('usaurio.pdf');

    }
    public function proveedorPDF()
    {
        $proveedores=Persona::all();
        $pdf=PDF::loadView('pdf.proveedor',['proveedores'=>$proveedores]);
        return $pdf->stream('proveedor.pdf');
    }
    public function ingresoPDF()
    {
        $ingresos=Ingreso::all();
        $detalles=DetalleIngreso::all();
        $pdf=PDF::loadView('pdf.ingreso',['ingresos'=>$ingresos, 'detalles'=>$detalles]);
        return $pdf->stream('ingreso.pdf');
    }
    public function categoriaPDF()
    {
    	$categorias=Categoria::all();
    	$pdf=PDF::loadView('pdf.categoria',['categorias'=>$categorias]);
    	return $pdf->stream('categoria.pdf');
    }
    public function articuloPDF()
    {
        $articulos=Articulo::all();
        $pdf=PDF::loadView('pdf.articulo',['articulos'=>$articulos]);
        return $pdf->stream('articulo.pdf');
    }
}
