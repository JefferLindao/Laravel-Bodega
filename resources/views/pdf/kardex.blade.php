@extends('layouts.pdf')
@section('title')
Kardex
@stop

@section('contenido')
<section>
  <!-- title row -->
  <h3 class="text-center">Tarjeta  de Kardex</h3>
  <div  style="width: 100%; height: 70px">
    <br>
    <b style="float: left;">Artículo: {{$articulo->Arti_nomb}}</b> 
    <b style="margin-left: 20%">Referencia: {{$articulo->Arti_seri}}</b>
    <b style="float: right;">Metodo: Promedio</b> 
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped">
          <thead class="bg">
            <tr>
              <th class="text-center" rowspan="1" colspan="1">Fecha</th>
              <th class="text-center" rowspan="1" colspan="1">Detalle</th>
              <th class="text-center" colspan="3">Entrada</th>
              <th class="text-center rojo" colspan="3">Salida</th>
              <th class="text-center" colspan="3">Saldo</th>
              <tr class="letra">
                <th></th>
                <th></th>
                <th>Nº</th>
                <th>Costo<br> Unitario</td>
                <th>Costo<br> Total</td>
                <th class="rojo">Nº</th>
                <th class="rojo">Costo<br> Unitario</th>
                <th class="rojo">Costo<br> Total</th>
                <th>Nº</th>
                <th>Costo<br> Unitario</th>
                <th>Costo<br> Total</th>
              </tr>
            </tr>
          </thead>
          <tbody>
            @foreach($kardex as $kar)
            @if($kar->Kard_movi == "Salen")
            <tr class="letra">
              <td>{{ $kar->fecha }}</td>
              <td class="rojo1">{{ $kar->Kard_movi}}</td>
              <td ></td>
              <td></td>
              <td></td>
              <td class="rojo1">{{ $kar->Kard_cant }}</td>
              <td class="rojo1">$ {{ ($kar->Kard_cant*$kar->Kard_prev)/$kar->Kard_cant }}</td>
              <td class="rojo1">$ {{ $kar->Kard_prev*$kar->Kard_cant }}</td>
              <td >{{ $kar->Kard_sast }}</td>
              <td>$ {{ ($kar->Kard_sast*$kar->Kard_prev)/$kar->Kard_sast }}</td>
              <td>{{ $kar->Kard_sato }}</td>
            </tr>
            @else
            <tr class="letra">
              <td>{{ $kar->fecha }}</td>
              <td>{{ $kar->Kard_movi }}</td>
              <td>{{ $kar->Kard_cant }}</td>
              <td>$ {{ ($kar->Kard_cant*$kar->Kard_prev)/$kar->Kard_cant }}</td>
              <td>$ {{ $kar->Kard_prev*$kar->Kard_cant }}</td>
              <td class="rojo1"></td>
              <td class="rojo1"></td>
              <td class="rojo1"></td>
              <td>{{ $kar->Kard_sast }}</td>
              <td>$ {{ ($kar->Kard_sast*$kar->Kard_prev)/$kar->Kard_sast }}</td>
              <td>{{ $kar->Kard_sato }}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>    
</section>
 @stop