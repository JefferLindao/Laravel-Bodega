<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADBodega | {{ Auth::user()->email }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <!-- Bootstrap-select 1.12.4 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">

    <link rel="stylesheet" href="{{asset('css/plusis.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.css')}}">
    
    <link rel="shortcut icon" href="{{asset('img/zapato.ico')}}">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div style="display: none;" id="cargador_empresa" align="center"><br>
      <center><label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label><br>
      <label style="color:#ABB6BA">Realizando tarea solicitada ...</label><br></center>
      <center style="margin-top: 10px">
        <img src="{{ url('/img/cargando.gif') }}" align="middle" alt="cargador"> 
      </center>
      <hr style="color:#003" width="50%"><br>
    </div>
    <input type="hidden"  id="url_raiz_proyecto" value="{{ url('/') }}" />
    <div id="capa_modal" class="div_modal" style="display: none;"></div>
    <div id="capa_formularios" class="div_contenido" style="display: none;"></div>
    
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Am</b>y</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Amy Shoes</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less--> 
              
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                          page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('img/muser2-160x160.jpg')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header"> 
                    <img src="{{asset('img/muser2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->name }}
                      <small> {{ Auth::user()->email }}</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="" class="btn btn-default btn-flat" value="{{ Auth::user()->id }}">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ route('logout') }}" class="btn btn-default btn-flat"  onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Cerrar</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->        
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            @canatleast(['articulo.index', 'categoria.index'])
            <li class="sidebar-menu-left-green">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i> 
              </a>
              <ul class="treeview-menu">
                @can('articulo.index')
                <li><a href="{{ url('almacen/articulo') }}"><i class="fa fa-circle-o"></i> Artículos</a></li>
                @endcan
                @can('categoria.index')
                <li><a href="{{ url('almacen/categoria') }}"><i class="fa fa-circle-o"></i> Categorías</a></li>
                @endcan
              </ul>
            </li>
            @endcanatleast
            @canatleast(['ingreso.index', 'proveedor.index'])
            <li class="sidebar-menu-left-blue">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('ingreso.index')
                <li><a href="{{ url('compras/ingreso') }}"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                @endcan
                @can('proveedor.index')
                <li><a href="{{ url('compras/proveedor') }}"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                @endcan
              </ul>
            </li>
            @endcanatleast
            @canatleast(['ingreso.index', 'proveedor.index'])
            <li class="sidebar-menu-left-orange">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('proveedor.index')
                <li><a href="{{ url('ventas/venta') }}"><i class="fa fa-circle-o"></i> Ventas</a></li>
                @endcan
                @can('proveedor.index')
                <li><a href="{{ url('ventas/cliente') }}"><i class="fa fa-circle-o"></i> Clientes</a></li>
                @endcan
              </ul>
            </li>
            @endcanatleast
            @can('usuario.index')
            <li class="sidebar-menu-left-purple">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/listado_usuarios') }}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
              </ul>
            </li>
            @endcan
            @canatleast(['reporte.usuario', 'reporte.cliente','reporte.proveedor','reporte.venta','reporte.compra'])
            <li class="sidebar-menu-left-red">
              <a href="#">
                <i class="fa fa-file-pdf-o"></i> <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL::to('articuloPDF') }}"><i class="fa fa-circle-o"></i>Artículos</a></li>
                <li><a href="{{ URL::to('categoriaPDF') }}"><i class="fa fa-circle-o"></i>Categorías</a></li>
                <li><a href="{{ URL::to('ingresoPDF') }}"><i class="fa fa-circle-o"></i>Compras</a></li>
                <li><a href="{{ URL::to('proveedorPDF') }}"><i class="fa fa-circle-o"></i>Proveedores</a></li>
                <li><a href="{{ URL::to('ventaPDF') }}"><i class="fa fa-circle-o"></i>Ventas</a></li>
                <li><a href="{{ URL::to('clientePDF') }}"><i class="fa fa-circle-o"></i>Clientes</a></li>
                <li><a href="{{ URL::to('usuarioPDF') }}"><i class="fa fa-circle-o"></i>Usuarios</a></li>
              </ul>
            </li>
            @endcanatleast
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>

            <li>
              <a href="{{ url('programadores') }}">
                <i class="fa fa-info-circle"></i><span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           @yield('headder')
        </section>
        <!-- Main content -->
        <section class="content">

          @yield('contenido')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; <?php echo(date('Y',time())) ?>
          <a href="https://github.com/JefferLindao"> JefferCodi</a>
        </strong>todos los derechos reservados.
      </footer>

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('script')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap-select 1.12.4 -->
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    @stack('char')
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
   
    @stack('chart')
    <script src="{{asset('js/plusis.js')}}"></script>
  </body>
</html>