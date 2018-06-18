@extends('layouts.admin')
@section('headder')
<h1>Desarrollado por:<small> </small></h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"> Desarrollado</li>
</ol>
@stop
@section('contenido')
<div class="text-center">
  <img src="{{asset('img/Instituto.png')}}" class="img-circle">
</div>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url('{{asset('img/photo1.png')}}') center center;">
          <h3 class="widget-user-username">Jefferson Lindao</h3>
          <h5 class="widget-user-desc">Desarrollador Web</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset('img/imagenjl.jpg')}}" alt="User Avatar" style="width: 100px;height: 120px;">
        </div>
      </div>
      <!-- /.widget-user -->

      <!-- About Me Box -->
      
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Mas sobre mi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Educación</strong>
    
          <p class="text-muted">
            Egresado en Informática mención Análisis en sistema en el Instituto Tecnólogico Superior Guayaquil
          </p>
    
          <hr>
    
          <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
    
          <p class="text-muted">Floresta2, Guayaquil</p>
    
          <hr>
    
          <strong><i class="fa fa-pencil margin-r-5"></i> Habilidades</strong>
    
          <p>
            <span class="label label-danger">Laravel</span>
            <span class="label label-success">C#</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
          </p>
    
          <hr>
    
          <strong><i class="fa fa-file-text-o margin-r-5"></i> Contactenos:</strong>
    
          <div class="text-center">
            <a href="https://www.facebook.com/jeffer.lindao" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>            
            <a href="https://github.com/JefferLindao" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
            <a href="https://plus.google.com/u/0/118255977889822439333" class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
            <a href="https://www.instagram.com/jeffer_lindao/" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/jefferlindao/" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="https://twitter.com/JefferLindao" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    
    <div class="col-md-6">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url('{{asset('img/photo4.jpg')}}') center center;">
          <h3 class="widget-user-username">Cristhian Yagual</h3>
          <h5 class="widget-user-desc">Desarrollador Web</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset('img/muser2-160x160.jpg')}}" alt="User Avatar">
        </div>
      </div>
      <!-- /.widget-user -->

      <!-- About Me Box -->
      
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Mas sobre mi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Educación</strong>
    
          <p class="text-muted">
            Egresado en Informática mención Análisis en sistema en el Instituto Tecnólogico Superior Guayaquil
          </p>
    
          <hr>
    
          <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
    
          <p class="text-muted">Bastión Popular, Guayaquil</p>
    
          <hr>
    
          <strong><i class="fa fa-pencil margin-r-5"></i> Habilidades</strong>
    
          <p>
            <span class="label label-danger">Laravel</span>
            <span class="label label-success">C#</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
          </p>
    
          <hr>
    
          <strong><i class="fa fa-file-text-o margin-r-5"></i> Contactenos:</strong>
    
          <div class="text-center">
            <a href="https://www.facebook.com/Mors88" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://plus.google.com/u/0/114784548353188582527" class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
            <a href="https://www.instagram.com/cristhiam_yag/" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/cristian-jonas-yagual-suarez-620035158/" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="https://twitter.com/Morslml" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    
  </div>
  <!-- /.col -->
</section>

@stop