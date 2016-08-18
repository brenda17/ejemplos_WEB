function getAlumnos(){
	var ruta = "alumnos.php";

	solicitarDatos(ruta,recibirDatos);
}

function solicitarDatos(ruta, funcion){
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
	    if (xhttp.readyState == 4 && xhttp.status == 200) {
	       funcion(xhttp.responseText);
	    }
    };

  	xhttp.open("POST", ruta, true);
    xhttp.send();
}

function recibirDatos(respuestaServer){
	var respuesta = JSON.parse(respuestaServer);
	var salida = '';

	for(i = 0; i < respuesta.length; i++){
		salida += "<tr>";
		salida += "<td>"+respuesta[i].nombre+"</td>"
		salida += "<td>"+respuesta[i].ap1+"</td>"
		salida += "<td>"+respuesta[i].ap2+"</td>"
		salida += "</tr>";
	}
	
	document.getElementById('cuerpo').innerHTML = salida;
}
