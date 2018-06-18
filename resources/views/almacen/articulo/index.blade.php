@extends('layouts.admin')
@section('headder')
<h1>
  Articulos
</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"><i class="fa fa-laptop"></i> Articulos</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-green">
	    <div class="box-header winth-border with-border-green">
	      <h3 class="box-title">Almacen - Articulo</h3>
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
		                <h3>Listado de Articulo
		                	@can('articulo.create')
		                	<a href="articulo/create"><button class="btn btn-success"> Nuevo</button></a>
		                	@endcan
		                	@can('reporte.articulo')
		                	<a href="{{ URL::to('articuloPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o">
		                	</i></a>
		                	@endcan
		                </h3>
		               @include('almacen.articulo.search')
		              </div>
		            </div>

		            <div class="row">
		              <div class="col-xs-12">
		                <div class="table-responsive">
		                  <table class="table table-striped table-bordered table-condensed table-hover">
							    <thead>
							      <th>Id</th>
							      <th>Nombre</th>
							      <th>Codigo</th>
							      <th>Categoria</th>
							      <th>Stock</th>
							      <th>Imagen</th>
							      <th>Estado</th>
							      @canatleast(['articulo.edit', 'articulo.delete'])
							      <th>Opciones</th>
							      @endcanatleast
							    </thead>
							    @foreach ($articulos as $art)
							    <tr>
							      <td>{{ $art->Arti_codi}}</td>
							      <td>{{ $art->Arti_nomb}}</td>
							      <td>{{ $art->Arti_seri}}</td>
							      <td>{{ $art->Cate_nomb}}</td>
							      <td>{{ $art->Arti_stoc}}</td>
							      <td class="text-center">
							      	<img src="{{ asset('img/articulos/'.$art->Arti_imag) }}"  height="100px" width="100px" class="img-thumbnail img-center">
							      </td>
							      <td>{{ $art->Arti_esta}}</td>
							      @canatleast(['articulo.edit', 'articulo.delete'])
							      <td>
							      	@can('articulo.edit')
							      	@if(($art->Arti_stoc)!= 0)
							        <a href="{{URL::action('ArticuloController@edit', $art->Arti_codi)}}"><button class="btn btn-info">Editar</button></a>
							        @else
							        <a href="{{ url('compras/ingreso/create') }}"><button class="btn btn-info">Ingreso</button></a>
							        @endif
							        @endcan
							        @can('articulo.delete')
							        <a href="" data-target="#modal-delete-{{$art->Arti_codi}}" data-toggle="modal" ><button class="btn btn-danger">Eliminar</button></a>
							        @endcan
							      </td>
							      @endcanatleast
							    </tr>
							    @include('almacen.articulo.delete')
							    @endforeach
							</table>
		                </div>
		                {{ $articulos->render()}}
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