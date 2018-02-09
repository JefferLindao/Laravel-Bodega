@extends('layouts.admin')
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
		                	<a href="categoria/create"><button class="btn btn-success">Nuevo</button></a>
		                	<a href="{{ URL::to('categoriaPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
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
							      <th>Opciones</th>
							    </thead>
							    @foreach ($categorias as $cat)
							    <tr>
							      <td>{{ $cat->Cate_codi}}</td>
							      <td>{{ $cat->Cate_nomb}}</td>
							      <td>{{ $cat->Cate_desc}}</td>
							      <td>
							        <a href="{{URL::action('CategoriaController@edit', $cat->Cate_codi)}}"><button class="btn btn-info">Editar</button></a>
							        <a href="" data-target="#modal-delete-{{$cat->Cate_codi}}" data-toggle="modal" ><button class="btn btn-danger">Eliminar</button></a>
							      </td>
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