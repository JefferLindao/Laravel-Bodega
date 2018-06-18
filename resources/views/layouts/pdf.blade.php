<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	
	<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
	
	<style type="text/css">
	@page {
		margin:0.6cm 1.5cm 1.5cm 1.5cm;
	}
	body {
		font-family: sans-serif;
		margin: 1.8cm 0;
		text-align: justify;
	}
	 .text-center {
	  text-align: center;
	 }
	 .text-right {
	  text-align: right;
	}
	table {
	  background-color: transparent;
	}
	caption {
	  padding-top: 8px;
	  padding-bottom: 8px;
	  color: #777;
	  text-align: left;
	}
	th {
	  text-align: left;
	}
	.table {
	  width: 100%;
	  max-width: 100%;
	  margin-bottom: 20px;

	}
	.table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {
	  padding: 8px;
	  line-height: 1.42857143;
	  vertical-align: top;
	  border-top: 1px solid #ddd;
	}
	.table > thead > tr > th {
	  vertical-align: bottom;
	  border-bottom: 2px solid #ddd;
	}
	.table > caption + thead > tr:first-child > th,
	.table > colgroup + thead > tr:first-child > th,
	.table > thead:first-child > tr:first-child > th,
	.table > caption + thead > tr:first-child > td,
	.table > colgroup + thead > tr:first-child > td,
	.table > thead:first-child > tr:first-child > td {
	  border-top: 0;
	}
	.table > tbody + tbody {
	  border-top: 2px solid #ddd;
	}
	.table .table {
	  background-color: #fff;
	}
	.table-condensed > thead > tr > th,
	.table-condensed > tbody > tr > th,
	.table-condensed > tfoot > tr > th,
	.table-condensed > thead > tr > td,
	.table-condensed > tbody > tr > td,
	.table-condensed > tfoot > tr > td {
	  padding: 5px;
	}
	.table-bordered {
	  border: 1px solid #ddd;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > tbody > tr > th,
	.table-bordered > tfoot > tr > th,
	.table-bordered > thead > tr > td,
	.table-bordered > tbody > tr > td,
	.table-bordered > tfoot > tr > td {
	  border: 1px solid #ddd;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > thead > tr > td {
	  border-bottom-width: 2px;
	}
	.table-striped > tbody > tr:nth-of-type(odd) {
	  background-color: #f9f9f9;
	}
	.table-hover > tbody > tr:hover {
	  background-color: #f5f5f5;
	}
	table col[class*="col-"] {
	  position: static;
	  display: table-column;
	  float: none;
	}
	table td[class*="col-"],
	table th[class*="col-"] {
	  position: static;
	  display: table-cell;
	  float: none;
	}
	.table > thead > tr > td.active,
	.table > tbody > tr > td.active,
	.table > tfoot > tr > td.active,
	.table > thead > tr > th.active,
	.table > tbody > tr > th.active,
	.table > tfoot > tr > th.active,
	.table > thead > tr.active > td,
	.table > tbody > tr.active > td,
	.table > tfoot > tr.active > td,
	.table > thead > tr.active > th,
	.table > tbody > tr.active > th,
	.table > tfoot > tr.active > th {
	  background-color: #f5f5f5;
	}
	.table-hover > tbody > tr > td.active:hover,
	.table-hover > tbody > tr > th.active:hover,
	.table-hover > tbody > tr.active:hover > td,
	.table-hover > tbody > tr:hover > .active,
	.table-hover > tbody > tr.active:hover > th {
	  background-color: #e8e8e8;
	}
	.table > thead > tr > td.success,
	.table > tbody > tr > td.success,
	.table > tfoot > tr > td.success,
	.table > thead > tr > th.success,
	.table > tbody > tr > th.success,
	.table > tfoot > tr > th.success,
	.table > thead > tr.success > td,
	.table > tbody > tr.success > td,
	.table > tfoot > tr.success > td,
	.table > thead > tr.success > th,
	.table > tbody > tr.success > th,
	.table > tfoot > tr.success > th {
	  background-color: #dff0d8;
	}
	.table-hover > tbody > tr > td.success:hover,
	.table-hover > tbody > tr > th.success:hover,
	.table-hover > tbody > tr.success:hover > td,
	.table-hover > tbody > tr:hover > .success,
	.table-hover > tbody > tr.success:hover > th {
	  background-color: #d0e9c6;
	}
	.table > thead > tr > td.info,
	.table > tbody > tr > td.info,
	.table > tfoot > tr > td.info,
	.table > thead > tr > th.info,
	.table > tbody > tr > th.info,
	.table > tfoot > tr > th.info,
	.table > thead > tr.info > td,
	.table > tbody > tr.info > td,
	.table > tfoot > tr.info > td,
	.table > thead > tr.info > th,
	.table > tbody > tr.info > th,
	.table > tfoot > tr.info > th {
	  background-color: #d9edf7;
	}
	.table-hover > tbody > tr > td.info:hover,
	.table-hover > tbody > tr > th.info:hover,
	.table-hover > tbody > tr.info:hover > td,
	.table-hover > tbody > tr:hover > .info,
	.table-hover > tbody > tr.info:hover > th {
	  background-color: #c4e3f3;
	}
	.table > thead > tr > td.warning,
	.table > tbody > tr > td.warning,
	.table > tfoot > tr > td.warning,
	.table > thead > tr > th.warning,
	.table > tbody > tr > th.warning,
	.table > tfoot > tr > th.warning,
	.table > thead > tr.warning > td,
	.table > tbody > tr.warning > td,
	.table > tfoot > tr.warning > td,
	.table > thead > tr.warning > th,
	.table > tbody > tr.warning > th,
	.table > tfoot > tr.warning > th {
	  background-color: #fcf8e3;
	}
	.table-hover > tbody > tr > td.warning:hover,
	.table-hover > tbody > tr > th.warning:hover,
	.table-hover > tbody > tr.warning:hover > td,
	.table-hover > tbody > tr:hover > .warning,
	.table-hover > tbody > tr.warning:hover > th {
	  background-color: #faf2cc;
	}
	.table > thead > tr > td.danger,
	.table > tbody > tr > td.danger,
	.table > tfoot > tr > td.danger,
	.table > thead > tr > th.danger,
	.table > tbody > tr > th.danger,
	.table > tfoot > tr > th.danger,
	.table > thead > tr.danger > td,
	.table > tbody > tr.danger > td,
	.table > tfoot > tr.danger > td,
	.table > thead > tr.danger > th,
	.table > tbody > tr.danger > th,
	.table > tfoot > tr.danger > th {
	  background-color: #f2dede;
	}
	.table-hover > tbody > tr > td.danger:hover,
	.table-hover > tbody > tr > th.danger:hover,
	.table-hover > tbody > tr.danger:hover > td,
	.table-hover > tbody > tr:hover > .danger,
	.table-hover > tbody > tr.danger:hover > th {
	  background-color: #ebcccc;
	}
	.table-responsive {
	  min-height: .01%;
	  overflow-x: auto;
	}
	@media screen and (max-width: 767px) {
	  .table-responsive {
	    width: 100%;
	    margin-bottom: 15px;
	    overflow-y: hidden;
	    -ms-overflow-style: -ms-autohiding-scrollbar;
	    border: 1px solid #ddd;
	  }
	  .table-responsive > .table {
	    margin-bottom: 0;
	  }
	  .table-responsive > .table > thead > tr > th,
	  .table-responsive > .table > tbody > tr > th,
	  .table-responsive > .table > tfoot > tr > th,
	  .table-responsive > .table > thead > tr > td,
	  .table-responsive > .table > tbody > tr > td,
	  .table-responsive > .table > tfoot > tr > td {
	    white-space: nowrap;
	  }
	  .table-responsive > .table-bordered {
	    border: 0;
	  }
	  .table-responsive > .table-bordered > thead > tr > th:first-child,
	  .table-responsive > .table-bordered > tbody > tr > th:first-child,
	  .table-responsive > .table-bordered > tfoot > tr > th:first-child,
	  .table-responsive > .table-bordered > thead > tr > td:first-child,
	  .table-responsive > .table-bordered > tbody > tr > td:first-child,
	  .table-responsive > .table-bordered > tfoot > tr > td:first-child {
	    border-left: 0;
	  }
	  .table-responsive > .table-bordered > thead > tr > th:last-child,
	  .table-responsive > .table-bordered > tbody > tr > th:last-child,
	  .table-responsive > .table-bordered > tfoot > tr > th:last-child,
	  .table-responsive > .table-bordered > thead > tr > td:last-child,
	  .table-responsive > .table-bordered > tbody > tr > td:last-child,
	  .table-responsive > .table-bordered > tfoot > tr > td:last-child {
	    border-right: 0;
	  }
	  .table-responsive > .table-bordered > tbody > tr:last-child > th,
	  .table-responsive > .table-bordered > tfoot > tr:last-child > th,
	  .table-responsive > .table-bordered > tbody > tr:last-child > td,
	  .table-responsive > .table-bordered > tfoot > tr:last-child > td {
	    border-bottom: 0;
	  }
	}
	#verde{
		top: -0.6cm;
		margin: 0cm -2.5cm;
		border-top: 10pt solid #1BE359FF;
	}
	#gris{
		bottom: 0;
		margin: 3px -1.5cm;
		border-top: 43pt solid rgba(0,0,0,0.7);
	}
	#header,
	#footer,
	#gris,
	#verde{
		position: fixed;
		left: 0;
		right: 0;
		color: #aaa;
		font-size: 0.7em;
	}

	#header {
		top: 0;
		padding: 5px;
		border-bottom: 0.1pt solid rgba(0,0,0,0.7);
	}

	#footer {
		bottom: 0;
		margin: 0 -2cm;
		border-top: 2pt solid #1BE359FF;
	}

	#header table,
	#footer table {
		width: 100%;
		border-collapse: collapse;
		border: none;
	}

	#header td,
	#footer td {
	  padding: 0;
		width: 50%;
	}

	.page-number {
	  text-align: right;
	  color: #fff;
	  margin: -1.4cm 1.5cm;
	}

	.infor {
	  text-align: center;
	  color: #fff;
	}
	.infor p{
		margin-top: -1.4cm;
	}
	
	.page-number:before {
	  content: "Page " counter(page);
	}

	hr {
	  page-break-after: always;
	  border: 0;
	}
	.raya{
		width: 40%;
		margin-left:30%;
		border-bottom: 0.1pt solid rgba(0,0,0,0.7);
	}
	.letra > th{
		text-align: center;
		font-size: 10px;
	}
	.letra > td{
		text-align: center;
		font-size: 12px;
		background: rgba(33, 208, 54, 0.1);
	}
	.bg{
		background: rgba(33, 208, 54, 0.3);
	}
	.rojo{
		background: rgba(215, 57, 37, 0.3);
	}
	.letra>.rojo1{
		background: rgba(215, 57, 37, 0.1);
	}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<script type="text/php">

	if ( isset($pdf) ) {

	  $font = Font_Metrics::get_font("verdana");;
	  $size = 6;
	  $color = array(0,0,0);
	  $text_height = Font_Metrics::get_font_height($font, $size);

	  $foot = $pdf->open_object();
	  
	  $w = $pdf->get_width();
	  $h = $pdf->get_height();

	  // Draw a line along the bottom
	  $y = $h - $text_height - 24;
	  $pdf->line(16, $y, $w - 16, $y, $color, 0.5);

	  $pdf->close_object();
	  $pdf->add_object($foot, "all");

	  $text = "Page {PAGE_NUM} of {PAGE_COUNT}";  

	  // Center the text
	  $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
	  $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);
	  
	}
	</script>
	<div id="verde"></div>
	<div id="header">
		<table>
			<tr>
				<td>{{ Auth::user()->name }}</td>
				<td style="text-align: center;font-size: 25px;color: #000;">Calzado Amy Shoes</td>
				@if ($datos!="")
				<td style="text-align: right;">{{ $datos }}</td>
				@else
				 @yield('fecha')
				@endif
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;color: #000;">Guayaquil - Ecuador</td>
			</tr>
		</table>
	</div>

	<div id="footer">
		
	</div>
	<div id="gris" >
		<div class="page-number"></div>
		<div class="infor">
			<p>Dirección: Bastión Popular Bloque 2 Solar 4 Manzana 779
			 <br> Email: amyshoes-2016@gmail.com
			  <br>Teléfono: 2115261 - 0983610154</p>
		</div>
	</div>
	<section class="contenido">
		@yield('contenido')
	</section>
	
</body>


</html>