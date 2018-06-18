@extends('layouts.admin')
@section('headder')
<h1>Proveedores</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"><i class="fa fa-th"></i> Proveedores</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-blue">
	    <div class="box-header winth-border with-border-blue">
	      <h3 class="box-title">Compras - Proveedor</h3>
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
		                <h3>Listado de Proveedores
		                	@can('proveedor.create')
		                	<a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a>
		                	@endcan
		                	@can('reporte.compra')
		                	<a href="{{ URL::to('proveedorPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
		                	@endcan
		                </h3>
		               @include('compras.proveedor.search')
		              </div>
		            </div>

		            <div class="row">
		              <div class="col-xs-12">
		                <div class="table-responsive">
		                  <table class="table table-striped table-bordered table-condensed table-hover">
							    <thead>
							      <th>Id</th>
							      <th>Nombre</th>
							      <th>Tipo Doc.</th>
							      <th>Número Doc.</th>
							      <th>Teléfono</th>
							      <th>Email</th>
							      @canatleast(['compra.edit', 'compra.delete'])
							      <th>Opciones</th>
							      @endcanatleast
							    </thead>
							    @foreach ($personas as $per)
							    <tr>
							      <td>{{ $per->Pers_codi }}</td>
							      <td>{{ $per->Pers_nomb }}</td>
							      <td>{{ $per->Pers_tido }}</td>
							      <td>{{ $per->Pers_nudo }}</td>
							      <td>{{ $per->Pers_tele }}</td>
							      <td>{{ $per->Pers_emai }}</td>
							      @canatleast(['proveedor.edit', 'proveedor.delete'])
							      <td>
							      	@can('proveedor.edit')
							        <a href="{{URL::action('ProveedorController@edit', $per->Pers_codi)}}"><button class="btn btn-info">Editar</button></a>
							        @endcan
							        @can('proveedor.delete')
							        <a href="" data-target="#modal-delete-{{$per->Pers_codi}}" data-toggle="modal" ><button class="btn btn-danger">Eliminar</button></a>
							        @endcan
							      </td>
							      @endcanatleast
							    </tr>
							    @include('compras.proveedor.delete')
							    @endforeach
							</table>
		                </div>
		                {{ $personas->render()}}
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