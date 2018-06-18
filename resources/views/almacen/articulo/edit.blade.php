@extends('layouts.admin')
@section('headder')
<h1>
  Articulo
  <small>Editar Articulo</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('almacen/articulo') }}"><i class="fa fa-laptop"></i> Articulos</a></li>
  <li class="active">Editar Articulo</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<div class="col-md-3">
	  <!-- Profile Image -->
	  <div class="box box-primary">
	    <div class="box-body box-green">
	    	@if(($articulo->Arti_imag)!="")			
	      <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/articulos/'.$articulo->Arti_imag) }}" alt="User profile picture">
	      @endif
	      <h3 class="profile-username text-center">{{ $articulo->Arti_nomb }}</h3>

	      <p class="text-muted text-center">{{ $articulo->Arti_desc }}</p>

	      <ul class="list-group list-group-unbordered">
	        <li class="list-group-item">
	        	
	          <b>Proveedor</b> <a class="pull-right">{{ $consulta->Pers_nomb }}</a>
	         
	        </li>
	        <li class="list-group-item">
	          <b>Precio Compra</b> <a class="pull-right">$ {{ $consulta->Deti_prec }}</a>
	        </li>
	        <li class="list-group-item">
	          <b>Precio Venta</b> <a class="pull-right">$ {{ $consulta->Deti_prev }}</a>
	        </li>
	        <li class="list-group-item">
	          <b>Stock</b> <a class="pull-right">Nº {{ $articulo->Arti_stoc }}</a>
	        </li>
	      </ul>

	      <a href="{{ url('compras/ingreso/create') }}" class="btn btn-primary btn-block"><b>Nuevo Pedido</b></a>
	    </div>
	    <!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	<!-- /.col -->
	<div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs nav-tabs-green">
          <li class="active"><a href="#activity" data-toggle="tab">EDITAR</a></li>
          <li><a href="#timeline" data-toggle="tab">Actividad del Producto</a></li>
        </ul>
        <div class="tab-content">
        	<div class="active tab-pane" id="activity">
        		<div class="box-body">
			      	<div class="row">
			          	<div class="col-md-12">
				          	@can('articulo.edit')
				            <!--Contenido-->
				            <div class="row">
				            	<div class="col-xs-12 col-sm-6">
				            		<h3>Editar Articulo: {{ $articulo->Arti_nomb }}</h3>
				            		@if(count($errors)>0)
				            		<div class="alert alert-danger">
				            			<ul>
				            				@foreach($errors->all() as $error)
				            				<li>{{$error}}</li>
				            				@endforeach
				            			</ul>
				            		</div>
				            		@endif
				            	</div>
				            </div>
			            		{!! Form::model($articulo, ['method' => 'PATCH', 'route' => ['articulo.update', $articulo->Arti_codi], 'files' => 'true']) !!}
			            		{{ Form::token() }}
			        		<div class="row">
				            	<div class="col-xs-12 col-sm-6">
				            		<div class="form-group">
				            			<label for="nombre">Nombre</label>
				            			<input type="text" name="nombre" required value="{{ $articulo->Arti_nomb }}" class="form-control">
				            		</div>
				            	</div>

				            	<div class="col-xs-12 col-sm-6">
				            		<div class="form-group">
				            			<label for="selecategoria">Categoria</label>
				            			<select name="selecategoria" class="form-control">
			            				@foreach ($categorias as $cat)
				            				@if ($cat->Cate_codi == $articulo->Cate_codi)
					            				<option value="{{ $cat->Cate_codi }}" selected>{{ $cat->Cate_nomb }}</option>
				            				@else
					            				<option value="{{ $cat->Cate_codi }}">{{ $cat->Cate_nomb }}</option>
				            				@endif
			            				@endforeach
				            			</select>
				            		</div>
				            	</div>
				            	<div class="col-xs-12 col-sm-6">
				            		<div class="form-group">
				            			<label for="descripcion">Descripcion</label>
				            			<input type="text" name="descripcion" value="{{ $articulo->Arti_desc }}" class="form-control" placeholder="Descripcion del articulo...">
				            		</div>
				            	</div>
				            	<div class="col-xs-12 col-sm-6">
				            		<div class="form-group">
						                <label>Fecha de Caducidad:</label>
			
						                <div class="input-group ">
						                  <div class="input-group-addon">
						                    <i class="fa fa-calendar"></i>
						                  </div>
						                  <input type="date"  name="fecha" class="form-control" value="{{ $articulo->Arti_fech }}"data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
						                </div>
						                <!-- /.input group -->
				            	    </div>
				            	</div>
				            	<div class="col-xs-12 col-sm-6">
				            		<div class="form-group">
				            			<label for="codigo">Codigo</label>
				            			<input type="text" name="codigo" id="codigobar" required value="{{ $articulo->Arti_seri }}" class="form-control"><br>

				            			 <div class="text-center">
							               <button class="btn btn-success text-center" type="button" onclick="generarBarcode()">Generar</button>
							               <button class="btn btn-info text-center" onclick="imprimir()"type="button">imprimir</button>
						                </div>
						                <div id="print" class="text-center">
						                    <svg id="barcode"></svg>
						                </div>							       
					            		@push('script')
					            		<script>
											function generarBarcode()
											{   
											    codigo=$("#codigobar").val();
											    JsBarcode("#barcode", codigo, {
											    font: "OCRB",
											    fontSize: 18,
											    textMargin: 0
											    });
											}
											$('#liAlmacen').addClass("treeview active");
											$('#liArticulos').addClass("active");



											//Código para imprimir el svg
											function imprimir()
											{
											    $("#print").printArea();
											}

										</script>
										@endpush
				            		</div>
				            	</div>
				            	<div class="col-xs-12 col-sm-6">
				            		<div class="form-group">
				            			<label>Imagen</label>
				            			<input type="file" name="imagen" class="form-control">
				            		</div>
				            	</div>
				            	
				            	<div class="col-xs-12">
				            		<div class="form-group">
				            			<button class="btn btn-primary" type="submit">Guardar</button>
				            			<button class="btn btn-danger" type="reset">Cancelar</button>
				            		</div>
				            	</div>
				            		{!! Form::close() !!}
				            <!--Fin Contenido-->
				      		</div>
				      		@else
				            <div class="row">
				            	<div class="col-xs-12 text-center">
				            		<h3 style='color:#FA206A'>No tienes permiso para esta sección</h3>
				            	</div>
				            </div>
							@endcan
						</div>
			      	</div><!-- /.row -->
			    </div><!-- /.box-body -->
        	</div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
              <div class="text-right"><a href="{{ URL::action('PdfController@kardex', $articulo->Arti_codi) }}" class="btn btn-xs btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a></div>
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              
              @foreach($salida as $sal)
              <li class="time-label">
              	    @if($sal->Kard_movi == "Salen")
                    <span class="bg-orange"> {{ $sal->fecha}}</span>
                    @else
                    <span class="bg-green"> {{ $sal->fecha}}</span>
                    @endif
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              	
              <li>
              	@if($sal->Kard_movi == "Salen")
                <i class="fa fa-angle-double-left bg-maroon"></i>
                @else
                <i class="fa  fa-angle-double-right bg-blue"></i>
                @endif
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> {{ $sal->hora }} mins</span>
                 
                  <h3 class="timeline-header"><a href="#"> {{$sal->Kard_movi}}</a>  {{$sal->Kard_cant}}   {{$sal->Arti_nomb}}</h3>
                  
                  <div class="timeline-body">
                  	@if($sal->Kard_movi == "Salen")
                    <b class="label text-black text-center">Generando un ingreso de $ {{ $sal->Kard_cant*$sal->Kard_prev }}</b><br>
                    @else
                    <b class="label text-black text-center">Generando una invensión de $ {{ $sal->Kard_cant*$sal->Kard_prec }}</b><br>
                    @endif
                    <b class="label text-black"> Stok Actual: 
                    	@if($sal->Kard_stoc < 4)
                    	<samp class="bg-red"> &nbsp;Nº {{ $sal->Kard_stoc}} </samp>
                    	@else
                    	<samp> &nbsp;Nº {{ $sal->Kard_stoc}} </samp>
                    	@endif
                    </b><br>
                    <b class="label text-black"> Saldo Stock: <samp>   &nbsp;Nº {{ $sal->Kard_sast}} </samp></b>    
                  </div>
                </div>
              </li>
                
              @endforeach
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div>
          <!-- /.tab-pane -->

          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
@endsection