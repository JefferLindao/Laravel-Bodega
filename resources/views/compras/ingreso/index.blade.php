@extends('layouts.admin')
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
		                	<a href="ingreso/create"><button class="btn btn-success"> Nuevo</button></a>
		                	<a href="{{ URL::to('ingresoPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
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
							      <th>Opciones</th>
							    </thead>
							    @foreach ($ingresos as $ing)
							    <tr>
							      <td>{{ $ing->Ingr_fech }}</td>
							      <td>{{ $ing->Pers_nomb }}</td>
							      <td>{{ $ing->Ingr_tico.': '.$ing->Ingr_seco.'-'.$ing->Ingr_nuco}}</td>
							      <td>{{ $ing->Ingr_impu }}</td>
							      <td>{{ $ing->total}}</td>
							      <td>{{ $ing->Ingr_esta }}</td>
							      <td>
							        <a href="{{URL::action('IngresoController@show', $ing->Ingr_codi)}}"><button class="btn btn-info">Detalles</button></a>
							        <a href="" data-target="#modal-delete-{{$ing->Ingr_codi}}" data-toggle="modal" ><button class="btn btn-danger">Anular</button></a>
							      </td>
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