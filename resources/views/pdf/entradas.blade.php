@extends('layouts.pdf')
@section('title')
Pedidos
@stop
@section('fecha')
<td style="text-align: right;">{{ $ingreso->fecha }}</td>
@stop
@section('contenido')
<section>
    <!-- title row -->
    <div  style="width: 100%; height: 110px">
      <div style="float: left;">
        <br>
        <b>Proveedor:</b> {{ $ingreso->Pers_nomb }}<br>
        <b>Dirección:</b> {{ $ingreso->Pers_dire }} <br>
        <b>R.U.C./C.I.:</b> {{ $ingreso->Pers_nudo }}<br><br>
        </div>
        <div class="text-center" style="float: right;">
          <b>Factura #{{ $ingreso->Ingr_nuco }}</b><br>
          <br>
          <b>Serie:</b> {{ $ingreso->Ingr_seco }}<br>
          <b>R.U.C.:</b> 0938274834001<br><br>
        </div>
    </div>
    
      <!-- /.col -->
   
    <!-- Table row -->
    
        <div class="row">
          <div class="col-xs-12">
            <div class="table-responsive">
              <table class="table table-bordered table-condensed table-striped">
                <thead style="background: rgba(33, 208, 54, 0.3)">
                  <tr>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Serial#</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Precio Compra</th>
                    <th class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($detalles as $art) 
                  <tr style="background: rgba(33, 208, 54, 0.1)">
                    <td class="text-center">{{ $art->Deti_cant }}</td>
                    <td class="text-center">{{ $art->articulo }}</td>
                    <td class="text-center">{{ $art->serie }}</td>
                    <td class="text-center">{{ $art->desc }}</td>
                    <td class="text-center">$ {{ $art->Deti_prec }}</td>
                    <td class="text-center">$ {{ $art->Deti_cant*$art->Deti_prec }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      
    

    
      <!-- /.col -->
      <div style="width: 100%">

        <section class="text-center" style="width:60%; float: left;">
          <br><br>
          <div class="raya"></div>
          <p style="font-size: 10px">F. Autorizada</p>
          <br><br>
          <div class="raya"></div>
          <p style="font-size: 10px">Recibí Conforme</p>
        </section>
        <div class="table-responsive" style="width: 40%; float: right;">
          <table class="table">
                        
            <tr>
              <th style="background: rgba(33, 208, 54, 0.3)">Total:</th>
              <td>$ {{ $total->total }}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
 @stop