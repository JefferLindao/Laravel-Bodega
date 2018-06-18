@extends('layouts.admin')
@section('headder')
<h1>Ventas</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"><i class="fa fa-shopping-cart"></i> Ventas</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-orange">
	    <div class="box-header winth-border with-border-orange">
	      <h3 class="box-title">Venta</h3>
	      <div class="box-tools pull-right">
	        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i></button>
	        
	        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      	<div class="row">
	          	<div class="col-md-12">
	              <!--Contenido-->
		            <div class="row">
		              <div class="col-sm-8 col-xs-12">
		                <h3>Listado de Ventas
		                	@can('venta.create')
		                	<a href="venta/create"><button class="btn btn-success"> Nuevo</button></a>
		                	@endcan
		                	@can('reporte.venta')
		                	<a href="{{ URL::to('ventaPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
		                	@endcan
		                </h3>
		               @include('ventas.venta.search')
		              </div>
		            </div>

		            <div class="row">
		              <div class="col-xs-12">
		                <div class="table-responsive">
		                  <table class="table table-striped table-bordered table-condensed table-hover">
							    <thead>
							      <th>Fecha</th>
							      <th>Cliente</th>
							      <th>Comprobante</th>
							      <th>Impuesto</th>
							      <th>Total</th>
							      <th>Estado</th>
							       @canatleast(['venta.show', 'venta.anular'])
							      <th>Opciones</th>
							      @endcanatleast
							    </thead>
							    @foreach ($ventas as $ven)
							    <tr>
							      <td>{{ $ven->Vent_fech }}</td>
							      <td>{{ $ven->Pers_nomb }}</td>
							      <td>{{ $ven->Vent_tico.': '.$ven->Vent_seco.'-'.$ven->Vent_nuco}}</td>
							      <td>{{ $ven->Vent_impu }}</td>
							      <td>{{ $ven->Vent_tove }}</td>
							      <td>{{ $ven->Vent_esta }}</td>
							      @canatleast(['venta.show', 'venta.anular'])
							      <td>
							        <a href="{{URL::action('PdfController@ventas', $ven->Vent_codi)}}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
							      	@can('venta.show')
							        <a href="{{URL::action('VentaController@show', $ven->Vent_codi)}}"><button class="btn btn-info">Detalles</button></a>
							        @endcan
							        @can('venta.anular')
							        <a href="" data-target="#modal-delete-{{$ven->Vent_codi}}" data-toggle="modal" ><button class="btn btn-danger">Anular</button></a>
							        @endcan
							      </td>
							      @endcanatleast
							    </tr>
							    @include('ventas.venta.delete')
							    @endforeach
							</table>
		                </div>
		                {{ $ventas->render()}}
		              </div>
		            </div>
	            
	            <!--Fin Contenido-->
	      		</div>
	      	</div><!-- /.row -->
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@stop