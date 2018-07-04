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
		                	<a href="#"><button class="create-modal btn btn-success">Nuevo</button></a>
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
		                  <table class="table table-striped table-bordered table-condensed table-hover" id="table">
							    <thead>
							      <th>Id</th>
							      <th>Nombre</th>
							      <th>Descripcion</th>
							      @canatleast(['categoria.edit', 'categoria.delete'])
							      <th>Opciones</th>
							       @endcanatleast
							    </thead>
							    {{ csrf_field() }}
							    
							    @foreach ($categorias as $cat)
							    <tbody>
							    	<tr class='categoria{{ $cat->Cate_codi}}' id="busqueda">
							    	  <td>{{ $cat->Cate_codi}}</td>
							    	  <td>{{ $cat->Cate_nomb}}</td>
							    	  <td>{{ $cat->Cate_desc}}</td>
							    	  @canatleast(['categoria.edit', 'categoria.delete'])
							    	  <td>
							    	  	<a href="#" class="show-modal btn btn-info btn-sm" data-codi="{{$cat->Cate_codi}}" data-nomb="{{$cat->Cate_nomb}}" data-desc="{{$cat->Cate_desc}}">Detalles</a>
							    	  	@can('categoria.edit')
							    	   <a href="#" class="edit-modal btn btn-warning btn-sm" data-codi="{{$cat->Cate_codi}}" data-nomb="{{$cat->Cate_nomb}}" data-desc="{{$cat->Cate_desc}}">Editar</a>
							    	    @endcan
							    	    @can('categoria.delete')
							    	    <a href="#" class="delete-modal btn btn-danger btn-sm" data-codi="{{$cat->Cate_codi}}" data-nomb="{{$cat->Cate_nomb}}" data-desc="{{$cat->Cate_desc}}">Eliminar</a>
							    	    @endcan
							    	  </td>
							    	  @endcanatleast
							    	</tr>
							    </tbody>
							    @include('almacen.categoria.create')
							    @include('almacen.categoria.show')
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



@push('script')
<script src="{{asset('js/ajax/categoria.js')}}"></script>
@endpush
@stop