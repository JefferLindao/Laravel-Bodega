<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<style type="text/css">
		.central{
			text-align: center;	
		}
		.union{
			padding: 0;
			margin: 0;
		}
		.short{
			font-size: 13px;
		}
		.raya{
			border-top: 1px solid #66B4F6;
		}
	</style>
</head>
<body>
	<header class="central">
		<h1 class="union">Calzado Amy Shoes</h1>
		<p class="union short">email</p>
		<p class="union short">Guayaquil - Ecuador</p><br>
		<p class="raya"></p>
	</header>

	<section class="contenido">
		@yield('contenido')
	</section>

	<footer class="central">
		<p class="raya"></p>
		<p class="union short"><strong>Telefono:</strong> 0974637375 - 0947483957</p>
		<p class="union short"><strong>Dirección:</strong> xxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
	</footer>
</body>
</html>