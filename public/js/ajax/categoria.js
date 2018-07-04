$(document).on('click', '.create-modal',function(){
	$('#create').modal('show');
	$('.form-horizontal').show();
	$('.modal-title').text('Agregar Categoria');
	$('.erro-nomb','error-desc').reset();
});

$("#add").click(function(){
	$.ajax({
		type:'POST',
		url:'addPost',
		data: {
			'_token': $('input[name=_token]').val(),
			'nombre': $('input[name=nombre]').val(),
			'descripcion': $('input[name=descripcion]').val()
		},
		success: function(data){
			if ((data.errors)){
				if((data.errors.nombre)){
					$('.error-nomb').removeClass('hidden');
					$('.error-nomb').text(data.errors.nombre).show(200).delay(2500).hide(200);
				}
				if((data.errors.descripcion)){
					$('.error-desc').removeClass('hidden');
					$('.error-desc').text(data.errors.descripcion).show(200).delay(2500).hide(200);
				}					
			}else {
				$('.error').remove();
	            $('#table').append("<tr class='categoria" + data.Cate_codi + "'>"+
	            "<td>" + data.Cate_codi + "</td>"+
	            "<td>" + data.Cate_nomb + "</td>"+
	            "<td>" + data.Cate_desc + "</td>"+
	            "<td><a class='show-modal btn btn-info btn-sm' data-codi='" + data.Cate_codi + "' data-nomb='" + data.Cate_nomb + "' data-desc='" + data.Cate_desc + "'>Detalles</a> <a class='edit-modal btn btn-warning btn-sm' data-codi='" + data.Cate_codi + "' data-nomb='" + data.Cate_nomb + "' data-desc='" + data.Cate_desc + "'>Editar</a> <a class='delete-modal btn btn-danger btn-sm' data-codi='" + data.Cate_codi + "' data-nomb='" + data.Cate_nomb + "' data-desc='" + data.Cate_desc + "'>Eliminar</a></td>"+
			        "</tr>");
	            $('#create').modal('hide');
	            limpiar();
			}
		},
	});
});

$(document).on('click', '.edit-modal', function() {
	$('.actionBtn').text('Actualizar');
	$('.actionBtn').addClass('edit');
	$('.actionBtn').removeClass('delete');
	$('.modal-title').text('Editar Categoría');
	$('.deleteContent').hide();
	$('#suspender').show();
	$('#fid').val($(this).data('codi'));
	$('#t').val($(this).data('nomb'));
	$('#b').val($(this).data('desc'));
	$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
	$.ajax({
    type: 'POST',
    url: 'editPost',
    data: {
    	'_token': $('input[name=_token]').val(),
		'id': $("#fid").val(),
		'nombre': $('#t').val(),
		'descripcion': $('#b').val()
		},
		success: function(data) {
			$('.categoria' + data.Cate_codi).replaceWith(" "+
			"<tr class='categoria" + data.Cate_codi + "'>"+
			"<td>" + data.Cate_codi + "</td>"+
			"<td>" + data.Cate_nomb + "</td>"+
			"<td>" + data.Cate_desc + "</td>"+
			"<td><a class='show-modal btn btn-info btn-sm' data-codi='" + data.Cate_codi + "' data-nomb='" + data.Cate_nomb + "' data-desc='" + data.Cate_desc + "'>Detalles</a> <a class='edit-modal btn btn-warning btn-sm' data-codi='" + data.Cate_codi + "' data-nomb='" + data.Cate_nomb + "' data-desc='" + data.Cate_desc + "'>Editar</a> <a class='delete-modal btn btn-danger btn-sm' data-codi='" + data.Cate_codi + "' data-nomb='" + data.Cate_nomb + "' data-desc='" + data.Cate_desc + "'>Eliminar</a></td>"+
			"</tr>");
		}
	});
});

$(document).on('click', '.delete-modal', function() {
	$('#suspender').hide();
	$('.actionBtn').addClass('delete');
	$('.actionBtn').removeClass('edit');
	$('.actionBtn').text('Eliminar');
	$('.modal-title').text('Eliminar Categoría');
	$('.idCategoria').val($(this).data('codi'));
	$('.deleteContent').show();
	$('.title').html($(this).data('nomb'));
	$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deletePost',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.idCategoria').val()
    },
    success: function(data){
    	$('.categoria' + $('.idCategoria').val()).remove();
    }
  });
});


$(document).on('click', '.show-modal', function() {
	$('#show').modal('show');
	$('#i').text($(this).data('codi'));
	$('#ti').text($(this).data('nomb'));
	$('#by').text($(this).data('desc'));
	$('.modal-title').text('DETALLE CATEGORIA');
});

$('#buscar').on('keyup', function(){
	 var value = $(this).val();
    $.ajax({
	    type: 'GET',
	    url: 'search',
	    data: {
	      '_token': $('input[name=_token]').val(),
	      'searchText': value
	    },
    success: function(data){

    	$('#table').html("<thead>"+
    		"<th>Id</th>"+
    		"<th>Nombre</th>"+
    		"<th>Descripcion</th>"+
    		"<th>Opciones</th>"+  
			"</thead>"+data);
    }
  });
});
function limpiar(){
	$('input[name=nombre]').val("");
	$('input[name=descripcion]').val("");
}