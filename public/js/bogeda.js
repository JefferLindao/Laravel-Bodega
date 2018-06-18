$(document).on('click', '.create-modal',function(){
	$('#create').modal('show');
	$('.form-horizontal').show();
	$('.modal-title').text('Agregar Categoria')
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
				$('.alert').removeClass('hidden');
				$('.error').text(data.errors.nombre);
				$('.error').text(data.errors.descripcion);				
			}else {
				$('.error').remove();
	            $('#table').append("<tr class='post" + data.Cate_codi + "'>"+
	            "<td>" + data.Cate_codi + "</td>"+
	            "<td>" + data.Cate_nomb + "</td>"+
	            "<td>" + data.Cate_desc + "</td>"+
	            "<td><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.Cate_codi + "' data-title='" + data.Cate_nomb + "' data-body='" + data.Cate_desc + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.Cate_codi + "' data-title='" + data.Cate_nomb + "' data-body='" + data.Cate_desc + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
	            "</tr>");
			}
		},
	});
});