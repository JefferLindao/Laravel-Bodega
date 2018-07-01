@extends('layouts.admin')
@section('headder')
<h1>Inicio<small> Control</small></h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"> Control</li>
</ol>
@stop
@section('contenido')

<section>
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>{{$usuarios}}</h3>
      
          <p>Usuarios Registrado</p>
        </div>
        <div class="icon">
          <i class="fa fa-group"></i>
        </div>
        <a href="{{ url('/listado_usuarios') }}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
      
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>{{$proveedores}}</h3>
      
          <p>Provedores Registrado</p>
        </div>
        <div class="icon">
          <i class="fa fa-truck"></i>
        </div>
        <a href="{{url('compras/proveedor')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
      
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{$clientes}}</h3>
      
          <p>Clientes Registrado</p>
        </div>
        <div class="icon">
          <i class="fa fa-industry"></i>
        </div>
        <a href="{{url('/ventas/cliente')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$articulos}}</h3>

          <p>Articulos Registrado</p>
        </div>
        <div class="icon">
          <i class="fa fa-laptop"></i>
        </div>
        <a href="{{url('/almacen/articulo')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- fin row -->
  <?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
  <div  class="row" >
    <div class="col-md-8">
      <div class="row">
        <div class="col-xs-6 col-md-6">
            <label>Año</label>
            <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">      
                <?php  echo '<option value="'.$anio.'" >'.$anio.'</option>';?>
                <option value="2016" >2016</option>
                <option value="2017" >2017</option>
                <option value="2018" >2018</option>
                <option value="2019" >2019</option>
                <option value="2020" >2020</option>
                <option value="2021" >2021</option>
            </select>
        </div>
        <div class="col-xs-6 col-md-6">
            <label>Mes</label>
            <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                <?php  echo '<option value="'.$mes.'" >'.$nombremes[intval($mes)].'</option>';   ?>
                <option value="1">ENERO</option>
                <option value="2">FEBRERO</option>
                <option value="3">MARZO</option>
                <option value="4">ABRIL</option>
                <option value="5">MAYO</option>
                <option value="6">JUNIO</option>
                <option value="7">JULIO</option>
                <option value="8">AGOSTO</option>
                <option value="9">SEPTIEMBRE</option>
                <option value="10">OCTUBRE</option>
                <option value="11">NOVIEMBRE</option>
                <option value="12">DICIEMBRE</option>
            </select>
        </div>
      </div><br>
      <!-- fin row -->
       <!-- LINE CHART -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-purple">
            <div class="box-header with-border with-border-purple">
              <h3 class="box-title">Usuarios Registrado</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
              </div>
            </div>
            <div class="box-body" id="div_grafica_barras"></div>
            <div class="box-footer"></div>
          </div>
          <!-- /.box-body -->

          <div class="box box-orange">
            <div class="box-header with-border with-border-orange">
              <h3 class="box-title">Ventas</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
              </div>
            </div>
            <div class="box-body" id="div_grafica_lineas"></div>
            <div class="box-footer"></div>
          </div>
        </div>
      </div>

    </div>

    <div class="col-md-4">
      <!-- Info Boxes Style 2 -->
      <div class="row">
        <div class="col-xs-6 col-md-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-usd"></i></span>
        
            <div class="info-box-content">
              <span class="info-box-text">Ventas del día</span>
              @if($venta=="")
              <span class="info-box-number">00.00</span>
               @else 
               <span class="info-box-number">{{$venta->suma}}</span>
               @endif
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>

      <div class="box box-green">
        <div class="box-header with-border with-border-green">
          <h3 class="box-title">Productos Recientemente Agregado</h3>
      
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul class="products-list product-list-in-box">
            @foreach ($articuReciente as $articulo)
            <li class="item">
              <div class="product-img"><img src="{{ asset('img/articulos/'.$articulo->Arti_imag) }}" height="50px" width="50px"></div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">{{ $articulo->Arti_nomb }}
                  <span class="label label-success pull-right ">$ {{$articulo->Deti_prev}}</span></a>
                <span class="product-description">
                      {{$articulo->Arti_desc}}
                    </span>
              </div>
            </li>
            <!-- /.item -->
            @endforeach
          </ul>
        </div>
        <div class="box-footer text-center">
          <a href="{{ url('almacen/articulo') }}" class="uppercase">Ver todos los productos</a>
        </div>
        <!-- /.box-footer -->
      </div>

      <div class="box box-orange">
        <div class="box-header with-border with-border-orange">
          <h3 class="box-title">Productos Mas Vendido</h3>
      
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul class="products-list product-list-in-box">
            @foreach ($ventas as $vent)
            <li class="item">
              <div class="product-img"><img src="{{ asset('img/articulos/'.$vent->Arti_imag) }}" height="50px" width="50px"></div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">{{ $vent->articulo }}
                  <span class="label label-info pull-right">N° {{$vent->MasVendido}}</span></a>
                <span class="product-description">
                      {{$vent->Arti_desc}}
                    </span>
              </div>
            </li>
            <!-- /.item -->
            @endforeach
          </ul>
        </div>
        <div class="box-footer text-center">
          <a href="{{ url('ventas/venta') }}" class="uppercase">Ver todos las ventas</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
  </div>
  <!-- fin row -->
  
</section> 
<!--fin section  -->
@push('chart')
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/highcharts-more.js')}}"></script>
<script src="{{asset('js/exporting.js')}}"></script>
<script src="{{asset('js/graficas.js')}}"></script>
<script>
  cargar_grafica_barras(<?= $anio; ?>,<?= intval($mes); ?>);
  cargar_grafica_lineas(<?= $anio; ?>,<?= intval($mes); ?>);
  
</script>
@endpush
@stop