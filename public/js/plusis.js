function  verinfo_usuario(arg){
  var urlraiz=$("#url_raiz_proyecto").val();
  var miurl =urlraiz+"/form_editar_usuario/"+arg+""; 
	$("#capa_modal").show();
	$("#capa_formularios").show();
	var screenTop = $(document).scrollTop();
	$("#capa_formularios").css('top', screenTop);
  $("#capa_formularios").html($("#cargador_empresa").html());

  $.ajax({
    url: miurl
  }).done( function(resul) 
  {
    $("#capa_formularios").html(resul);
  }).fail( function() 
  {
    $("#capa_formularios").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
  });
}




$(document).on("click",".div_modal", function(e){
	$(this).hide();
	$("#capa_formularios").hide();
	$("#capa_formularios").html("");
})




function cargar_formulario(arg){
   var urlraiz=$("#url_raiz_proyecto").val();
   $("#capa_modal").show();
   $("#capa_formularios").show();
   var screenTop = $(document).scrollTop();
   $("#capa_formularios").css('top', screenTop);
   $("#capa_formularios").html($("#cargador_empresa").html());
   if(arg==1){ var miurl=urlraiz+"/form_nuevo_usuario"; }
   if(arg==4){ var miurl=urlraiz+"/form_nuevo_ingreso"; }
   if(arg==2){ var miurl=urlraiz+"/form_nuevo_rol"; }
   if(arg==3){ var miurl=urlraiz+"/form_nuevo_permiso"; }
    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#capa_formularios").html(resul);
   
    }).fail( function() 
   {
    $("#capa_formularios").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   }) ;

}



$(document).on("submit",".formentrada",function(e){
  e.preventDefault();
  var quien=$(this).attr("id");
  var formu=$(this);
  var varurl="";
  if(quien=="f_crear_usuario"){  var varurl=$(this).attr("action");  var div_resul="capa_formularios";  }
  if(quien=="f_crear_ingreso"){  var varurl=$(this).attr("action");  var div_resul="capa_formularios";  }
  if(quien=="f_crear_rol"){  var varurl=$(this).attr("action");  var div_resul="capa_formularios";  }
  if(quien=="f_crear_permiso"){  var varurl=$(this).attr("action");  var div_resul="capa_formularios";  }
  if(quien=="f_editar_usuario"){  var varurl=$(this).attr("action");  var div_resul="notificacion_E2";  }
  if(quien=="f_editar_acceso"){  var varurl=$(this).attr("action");  var div_resul="notificacion_E3";  }
  if(quien=="f_borrar_usuario"){  var varurl=$(this).attr("action");  var div_resul="capa_formularios";  }
  if(quien=="f_asignar_permiso"){  var varurl=$(this).attr("action");  var div_resul="capa_formularios";  }
  
  $("#"+div_resul+"").html( $("#cargador_empresa").html());
  
  $.ajax({
    // la URL para la petición
    url : varurl,
    data : formu.serialize(),
    type : 'POST',
    dataType : 'html',
  
    success : function(resul) {
      $("#"+div_resul+"").html(resul);
       
    },
    error : function(xhr, status) {
        $("#"+div_resul+"").html('ha ocurrido un error, revise su conexion e intentelo nuevamente');
    }

  });


})



function asignar_rol(idusu){
   var idrol=$("#rol1").val();
   var urlraiz=$("#url_raiz_proyecto").val();
   $("#zona_etiquetas_roles").html($("#cargador_empresa").html());
   var miurl=urlraiz+"/asignar_rol/"+idusu+"/"+idrol+""; 

    $.ajax({
    url: miurl
    }).done( function(resul) 
    { 
      var etiquetas="";
      var roles=$.parseJSON(resul);
      $.each(roles,function(index, value) {
        etiquetas+= '<span class="label label-warning">'+value+'</span> ';
      })

     $("#zona_etiquetas_roles").html(etiquetas);
   
    }).fail( function() 
    {
    $("#zona_etiquetas_roles").html('<span style="color:red;">...Error: Aun no ha agregado roles o revise su conexion...</span>');
    }) ;

}


function quitar_rol(idusu){
   var idrol=$("#rol2").val();
   var urlraiz=$("#url_raiz_proyecto").val();
   $("#zona_etiquetas_roles").html($("#cargador_empresa").html());
   var miurl=urlraiz+"/quitar_rol/"+idusu+"/"+idrol+""; 

    $.ajax({
    url: miurl
    }).done( function(resul) 
    { 
      var etiquetas="";
      var roles=$.parseJSON(resul);
      $.each(roles,function(index, value) {
        etiquetas+= '<span class="label label-warning" style="margin-left:10px;" >'+value+'</span> ';
      })

     $("#zona_etiquetas_roles").html(etiquetas);
   
    }).fail( function() 
    {
    $("#zona_etiquetas_roles").html('<span style="color:red;">...Error: Aun no ha agregado roles  o revise su conexion...</span>');
    }) ;

}


function borrado_usuario(idusu){

   var urlraiz=$("#url_raiz_proyecto").val();
   $("#capa_modal").show();
   $("#capa_formularios").show();
   var screenTop = $(document).scrollTop();
   $("#capa_formularios").css('top', screenTop);
   $("#capa_formularios").html($("#cargador_empresa").html());
   var miurl=urlraiz+"/form_borrado_usuario/"+idusu+""; 
  

    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#capa_formularios").html(resul);
   
    }).fail( function() 
   {
    $("#capa_formularios").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   }) ;


}


function borrar_permiso(idrol,idper){

     var urlraiz=$("#url_raiz_proyecto").val();
     var miurl=urlraiz+"/quitar_permiso/"+idrol+"/"+idper+""; 
     $("#filaP_"+idper+"").html($("#cargador_empresa").html() );
        $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#filaP_"+idper+"").hide();
   
    }).fail( function() 
   {
     alert("No se borro correctamente, intentalo nuevamente o revisa tu conexion");
   }) ;



}


function borrar_rol(idrol){

     var urlraiz=$("#url_raiz_proyecto").val();
     var miurl=urlraiz+"/borrar_rol/"+idrol+""; 
     $("#filaR_"+idrol+"").html($("#cargador_empresa").html() );
        $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#filaR_"+idrol+"").hide();
   
    }).fail( function() 
   {
     alert("No se borro correctamente, intentalo nuevamente o revisa tu conexion");
   }) ;



}
