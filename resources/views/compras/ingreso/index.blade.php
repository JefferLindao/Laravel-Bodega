@extends('layouts.admin')
@section('headder')
<h1>Ingreso de Articulos</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"><i class="fa fa-th"></i> Ingreso de Articulos</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-blue">
	    <div class="box-header winth-border with-border-blue">
	      <h3 class="box-title">Compras - Ingreso</h3>
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
		                <h3>Listado de Ingresos
		                	@can('ingreso.create')
		                	<a href="ingreso/create"><button class="btn btn-success"> Nuevo</button></a>
		                	@endcan
		                	@can('reporte.compra')
		                	<a href="{{ URL::to('ingresoPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
		                	@endcan
		                </h3>
		               @include('compras.ingreso.search')
		              </div>
		            </div>
		            
		            <div class="row">
		              <div class="col-xs-12">
		                <div class="table-responsive">
		                  <table class="table table-striped table-bordered table-condensed table-hover">
							    <thead>
							      <th>Fecha</th>
							      <th>Proveedor</th>
							      <th>Comprobante</th>
							      <th>Impuesto</th>
							      <th>Total</th>
							      <th>Estado</th>
							      @canatleast(['ingreso.show', 'ingreso.anular'])
							      <th>Opciones</th>
							      @endcanatleast
							    </thead>
							    @foreach ($ingresos as $ing)
							    <tr>
							      <td>{{ $ing->Ingr_fech }}</td>
							      <td>{{ $ing->Pers_nomb }}</td>
							      <td>{{ $ing->Ingr_tico.': '.$ing->Ingr_seco.'-'.$ing->Ingr_nuco}}</td>
							      <td>{{ $ing->Ingr_impu }}</td>
							      <td>{{ $ing->total}}</td>
							      <td>{{ $ing->Ingr_esta }}</td>
							      @canatleast(['ingreso.show', 'ingreso.anular'])
							      <td>
							      	<a href="{{URL::action('PdfController@pedidos', $ing->Ingr_codi)}}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
							      	@can('ingreso.show')
							        <a href="{{URL::action('IngresoController@show', $ing->Ingr_codi)}}"><button class="btn btn-info">Detalles</button></a>
							        @endcan
							        @can('ingreso.anular')
							        <a href="" data-target="#modal-delete-{{$ing->Ingr_codi}}" data-toggle="modal" ><button class="btn btn-danger">Anular</button></a>
							        @endcan
							      </td>
							      @endcanatleast
							    </tr>
							    @include('compras.ingreso.delete')
							    @endforeach
							</table>
		                </div>
		                {{ $ingresos->render()}}
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