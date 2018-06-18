@extends('layouts.pdf')
@section('contenido')

<h3 class="text-title text-center">Lista de Ingreso</h3>
<div class="row">
  <div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-bordered table-condensed table-striped">
        <thead style="background: rgba(53, 98, 246, 0.3)">
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
          @foreach ($ingresos as $ingr) 
            <tr style="background: rgba(53, 98, 246, 0.1)">
              <td class="text-center">{{ $ingr->fech }}</td>
              <td class="text-center">{{ $ingr->nomb }}</td>
              <td class="text-center">{{ $ingr->tico.': '.$ingr->seco.'-'.$ingr->nuco }}</td>
              <td class="text-center">{{ $ingr->impu }}</td> 
              <td class="text-center">{{ $ingr->total }}</td>
              <td class="text-center">{{ $ingr->esta }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop