@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-purple">
	    <div class="box-header winth-border with-border-purple">
	      <h3 class="box-title">Acceso - Usuario</h3>
	      <div class="box-tools pull-right">
	        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i></button>
	        
	        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      	<div class="row">
	          	<div class="col-lg-6 col-xs-12 col-lg-offset-3">
	              <!--Contenido-->
	            	    <div class="knob-label">
	            	    	<h3>Nueva Usuario</h3>
	            	    </div>
	            		@if(count($errors)>0)
	            		<div class="alert alert-danger">
	            			<ul>
	            				@foreach($errors->all() as $error)
	            				<li>{{$error}}</li>
	            				@endforeach
	            			</ul>
	            		</div>
	            		@endif

	            		{!! Form::open(['url' => 'seguridad/usuario', 'method' => 'POST', 'autocomplete' => 'off']) !!}
	            		{{ Form::token() }}
	            		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	            			<label for="name">Nombre</label>
	            			<input id="name" type="text" name="name" class="form-control" placeholder="Nombre..." value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
	            		</div>
	            		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	            			<label for="email">Email</label>
	            			<input id="email" type="email" name="email" class="form-control" placeholder="Email..." value="{{ old('email') }}" required>
	            			@if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
	            		</div>

	            		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	            			<label for="password">Password</label>
	            			<input id="password" type="password" name="password" class="form-control" placeholder="Password..." >
	            			@if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
	            		</div>
	            		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	            			<label for="password_confirmation">Confirmar Password</label>
	            			<input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Password...">
	            			@if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
	            		</div>
	            		<div class="form-group knob-label">
	            			<button class="btn btn-primary" type="submit">Guardar</button>
	            			<button class="btn btn-danger" type="reset">Cancelar</button>
	            		</div>
	            		{!! Form::close() !!}
	            	</div>
	            </div>
	            <!--Fin Contenido-->
	      		</div>
	      	</div><!-- /.row -->
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection