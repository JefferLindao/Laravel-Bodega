function Cargar(url, id){
	// crear un objeto dependiendo el navegador
	var objeto;
	if (window.XMLHttpRequest){
		objeto = new XMLHttpRequest();
	}
	else if (window.ActitveXOject){
		try {
			objeto = new ActitveXOject("Msml2.XMLHTTP");
		} catch(e) {
			try {
				objeto = new ActitveXOject("Microsof.XMLHTTP");
			} catch(e) {}
		}
	}
	if (!objeto){
		alert("No ha sido posible crear un objeto XMLHttpRequest");
	}
	objeto.onreadystatechange = function(){
		CargarObjeto(objeto, id)
	}
	objeto.open('GET', url, true)
	objeto.send(null)
}

function CargarObjeto(objeto, id){
	if (objeto.readyState == 4)
	document.getElementById(id).innerHTML = objeto.responseText
	else 
	document.getElementById(id).innerHTML = '<center>cargando...</center>'
}