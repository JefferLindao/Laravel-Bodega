/* Creando Nuevo Articulo */
$(document).on('click', '.create-modal',function(){
	$('#form')[0].reset();
	$('#create').modal('show');
	$('.actionBtn').addClass('create');
	$('.actionBtn').addClass('btn-success');
	$('.create').text('Agregar');
	$('.actionBtn').removeClass('edit');
	$('.actionBtn').removeClass('btn-warning');
	$("#nomCate").val("0");
	$(".selectpicker").selectpicker('refresh');
	$('.form-horizontal').show();
	$('.caratu').hide();
	$('.id').hide();
	$('.modal-title').text('Agregar Articulo');
});
$('.modal-footer').on('click', '.create',function(){
	var nombre = $('input[name=nombre]');
	var descripcion = $('#descripcion');
	var categoria = $('select[name=selecategoria]');
	var fecha = $('input[name=fecha]');
	var imagen = $('input[name=imagen]');
	var codigo = $('input[name=codigo]');
	var token = $('input[name=_token]').val();
	var form = new FormData();
	form.append('nombre', nombre.val());
	form.append('descripcion', descripcion.val());
	form.append('categoria', categoria.val());
	form.append('fecha', fecha.val());
	form.append('codigo', codigo.val());
	form.append('imagen', imagen[0].files[0]);

	$.ajax({
		type:'POST',
		url:'createArticulo',
		headers: {'X-CSRF-TOKEN':token},
		data:form,
		contentType : false,
		processData : false,
		success: function(data){
			if ((data.errors)){
				if((data.errors.nombre)){
					$('.error-nomb').removeClass('hidden');
					$('.error-nomb').text(data.errors.nombre).show(200).delay(4500).hide(200);
				}
				if((data.errors.descripcion)){
					$('.error-desc').removeClass('hidden');
					$('.error-desc').text(data.errors.descripcion).show(200).delay(4500).hide(200);
				}
				if((data.errors.codigo)){
					$('.error-codi').removeClass('hidden');
					$('.error-codi').text(data.errors.codigo).show(200).delay(4500).hide(200);
				}
				if((data.errors.fecha)){
					$('.error-feve').removeClass('hidden');
					$('.error-feve').text(data.errors.fecha).show(200).delay(4500).hide(200);
				}				
			}else {
				$('.table').html("<thead>"+
	    		"<th>Id</th>"+
	    		"<th>Nombre</th>"+
	    		"<th>Codigo</th>"+
	    		"<th>Categoria</th>"+
	    		"<th>Stock</th>"+
	    		"<th>Imagen</th>"+
	    		"<th>Estado</th>"+
	    		"<th>Opciones</th>"+  
				"</thead>"+data);
				$('#create').modal('hide');
	            limpiar();
			}
		},
	});
});

/*Editar los datos del articulo*/
$(document).on('click', '.edit-modal', function() {
	$('#form')[0].reset();
	$('.actionBtn').removeClass('create');
	$('.actionBtn').removeClass('btn-success');
	$('.actionBtn').addClass('edit');
	$('.actionBtn').addClass('btn-warning');
	$('.actionBtn').text('Actualizar');
	$('.modal-title').text('Editar Categoría');
	$('#create').modal('show');
	$('.caratu').show();
	$('.id').show();
	$('#id').val($(this).data('codi'));
	$('#nombre').val($(this).data('nomb'));
	$('#descripcion').val($(this).data('desc'));
	$("#nomCate").val($(this).data('nomc'));
	$(".selectpicker").selectpicker('refresh');
	$('#fecha').val($(this).data('fech'));
	$('input[name=codigo]').val($(this).data('seri'));
	var preview = document.querySelector('#ima');
	var imag = $(this).data('imag');
	preview.src="../../../../img/articulos/"+imag;
});
$('.modal-footer').on('click', '.edit', function() {
	var nombre = $('input[name=nombre]');
	var descripcion = $('#descripcion');
	var categoria = $('select[name=selecategoria]');
	var id = $('input[name=id]');
	var fecha = $('input[name=fecha]');
	var imagen = $('input[name=imagen]');
	var codigo = $('input[name=codigo]');
	var token = $('input[name=_token]').val();
	var form = new FormData();
	form.append('nombre', nombre.val());
	form.append('descripcion', descripcion.val());
	form.append('id', id.val());
	form.append('categoria', categoria.val());
	form.append('fecha', fecha.val());
	form.append('codigo', codigo.val());
	form.append('imagen', imagen[0].files[0]);
	$.ajax({
    type: 'POST',
    url: 'editArticulo',
    data: form,
    headers: {'X-CSRF-TOKEN':token},
	contentType : false,
	processData : false,
	success: function(data) {
		if ((data.errors)){
			if((data.errors.nombre)){
				$('.error-nomb').removeClass('hidden');
				$('.error-nomb').text(data.errors.nombre).show(200).delay(4500).hide(200);
			}
			if((data.errors.descripcion)){
				$('.error-desc').removeClass('hidden');
				$('.error-desc').text(data.errors.descripcion).show(200).delay(4500).hide(200);
			}
			if((data.errors.codigo)){
				$('.error-codi').removeClass('hidden');
				$('.error-codi').text(data.errors.codigo).show(200).delay(4500).hide(200);
			}
			if((data.errors.fecha)){
				$('.error-feve').removeClass('hidden');
				$('.error-feve').text(data.errors.fecha).show(200).delay(4500).hide(200);
			}
		}else {
			$('.articulo' + data.art["0"].Arti_codi).replaceWith(" "+
			"<tr class='articulo" + data.art.Arti_codi + "'>"+
			"<td>" + data.art["0"].Arti_codi + "</td>"+
			"<td>" + data.art["0"].Arti_nomb + "</td>"+
			"<td>" + data.art["0"].Arti_seri + "</td>"+
			"<td>" + data.art["0"].Cate_nomb + "</td>"+
			"<td>" + data.art["0"].Arti_stoc + "</td>"+
			"<td class='text-center'>" + 
			"<img src='../../../../img/articulos/"+ data.art["0"].Arti_imag +"' height='100px' width='100px' class='img-thumbnail imag-center'>"+
			"<td>" + data.art["0"].Arti_esta + "</td>"+
			"<td class='text-center'>"+
			"<a href='#' class='show-modal btn btn-info btn-sm' data-codi='"+ data.art["0"].Arti_codi +"' data-nomb='"+ data.art["0"].Arti_nomb +"' data-seri='"+ data.art["0"].Arti_seri +"' data-nomc='"+ data.art["0"].Cate_nomb +"' data-stoc='"+ data.art["0"].Arti_stoc +"' data-esta='"+ data.art["0"].Arti_esta +"' data-desc='"+ data.art["0"].Arti_desc +"' data-imag='"+ data.art["0"].Arti_imag +"'>Detalles</a>"+
	        " <a href='#' class='edit-modal btn btn-warning btn-sm' data-codi='"+ data.art["0"].Arti_codi +"' data-nomb='"+ data.art["0"].Arti_nomb +"' data-seri='"+ data.art["0"].Arti_seri +"' data-nomc='"+ data.art["0"].Cate_codi +"' data-stoc='"+ data.art["0"].Arti_stoc +"' data-esta='"+ data.art["0"].Arti_esta +"' data-desc='"+ data.art["0"].Arti_desc +"' data-imag='"+ data.art["0"].Arti_imag +"' data-fech='"+ data.art["0"].Arti_fech +"'>Editar</a>"+
	        " <a href='#' class='delete-modal btn btn-danger btn-sm' data-codi='"+ data.art["0"].Arti_codi +"' data-nomb='"+ data.art["0"].Arti_nomb +"'>Eliminar</a>"+
	        "</td>");
	        $('#create').modal('hide');
		}	
	}
	});
});

/* Eliminar articulo */
$(document).on('click', '.delete-modal', function() {
	$('.modal-title').text('Eliminar Artículo');
	$('.deleteContent').show();
	$('.title').html($(this).data('nomb'));
	$('.idArticulo').val($(this).data('codi'));
	$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteArticulo',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.idArticulo').val(),
    },
    success: function(data){
    	$('.articulo' + $('.idArticulo').val()).remove();
    	$('#myModal').modal('hide');
    }
  });
});

/* Detalles del Articulo */
$(document).on('click', '.show-modal', function() {
	$('#show').modal('show'); 
	$('#id').text($(this).data('codi'));
	$('#desc').text($(this).data('desc'));
	$('#nomb').text($(this).data('nomb'));
	$('#codi').text($(this).data('seri'));
	$('#cate').text($(this).data('nomc'));
	$('#stoc').text($(this).data('stoc'));
	$('#esta').text($(this).data('esta'));
	var preview = document.querySelector('#imag');
	var imag = $(this).data('imag');
	preview.src="../../../../img/articulos/"+imag;
	$('.modal-title').text('Detalle Articulo');
});

/* generar codigo o serial del articulo */
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

/* Buscar Articulo */

$('#buscar').on('keyup', function(){
	var value = $(this).val();
    $.ajax({
	    type: 'GET',
	    url: 'searchArticulo',
	    data: {
	      '_token': $('input[name=_token]').val(),
	      'searchText': value
	    },
	    success: function(data){
	    	$('.table').html("<thead>"+
			"<th>Id</th>"+
			"<th>Nombre</th>"+
			"<th>Codigo</th>"+
			"<th>Categoria</th>"+
			"<th>Stock</th>"+
			"<th>Imagen</th>"+
			"<th>Estado</th>"+
			"<th>Opciones</th>"+  
			"</thead>"+data);
	    }
    });
});