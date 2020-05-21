window.addEventListener('load', recargar);

function recargar () {
	var peticion = new XMLHttpRequest();

	peticion.onreadystatechange = function () {
		if (this.readyState == 4) {
			document.getElementById('content').innerHTML = this.responseText;
			asignarEventos();
		}
	};

	peticion.open('GET', 'usuarios/recargar');
	peticion.send();
}



