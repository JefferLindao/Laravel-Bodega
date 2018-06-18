@extends('layouts.admin')
@section('headder')
<h1>Categorias</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"><i class="fa fa-laptop"></i> Categorias</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-green">
	    <div class="box-header winth-border with-border-green">
	      <h3 class="box-title">Almacen - Categorias</h3>
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
		                <h3>Listado de Categoria 
		                	@can('categoria.create')
		                	<a href="categoria/create"><button class="btn btn-success">Nuevo</button></a>
		                	@endcan
		                	@can('reporte.categoria')
		                	<a href="{{ URL::to('categoriaPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
		                	@endcan
		                </h3>
		               @include('almacen.categoria.search')
		              </div>
		            </div>

		            <div class="row">
		              <div class="col-xs-12">
		                <div class="table-responsive">
		                  <table class="table table-striped table-bordered table-condensed table-hover">
							    <thead>
							      <th>Id</th>
							      <th>Nombre</th>
							      <th>Descripcion</th>
							      @canatleast(['categoria.edit', 'categoria.delete'])
							      <th>Opciones</th>
							       @endcanatleast
							    </thead>
							    @foreach ($categorias as $cat)
							    <tr>
							      <td>{{ $cat->Cate_codi}}</td>
							      <td>{{ $cat->Cate_nomb}}</td>
							      <td>{{ $cat->Cate_desc}}</td>
							      @canatleast(['categoria.edit', 'categoria.delete'])
							      <td>
							      	@can('categoria.edit')
							        <a href="{{URL::action('CategoriaController@edit', $cat->Cate_codi)}}"><button class="btn btn-info">Editar</button></a>
							        @endcan
							        @can('categoria.delete')
							        <a href="" data-target="#modal-delete-{{$cat->Cate_codi}}" data-toggle="modal" ><button class="btn btn-danger">Eliminar</button></a>
							        @endcan
							      </td>
							      @endcanatleast
							    </tr>
							    @include('almacen.categoria.delete')
							    @endforeach
							</table>
		                </div>
		                {{ $categorias->render()}}
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