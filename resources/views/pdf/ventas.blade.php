@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de Venta</h3>
<div class="row">
  <div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-bordered table-condensed table-striped">
        <thead style="background: rgba(255, 150, 0, 0.3)">
          <tr class="text-center">
            <th class="text-center">Fecha</th>
            <th class="text-center">Proveedor</th>
            <th class="text-center">Comprovante</th>
            <th class="text-center">Impuesto</th>
            <th class="text-center">total</th>
            <th class="text-center">Estado</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ventas as $ven) 
            <tr style="background: rgba(255, 150, 0, 0.1)">
              <td class="text-center">{{ $ven->fech }}</td>
              <td class="text-center">{{ $ven->nomb }}</td>
              <td class="text-center">{{ $ven->tico.': '.$ven->seco.'-'.$ven->nuco }}</td>
              <td class="text-center">{{ $ven->impu }}</td> 
              <td class="text-center">{{ $ven->tove }}</td>
              <td class="text-center">{{ $ven->esta }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop