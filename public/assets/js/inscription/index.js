function egre() {
	var egresado = document.getElementById("egresado");
	var ciclo = document.getElementById("ciclo");
	if (egresado.checked) {
		ciclo.disabled=true;
		ciclo.selectedIndex="0";
	}else{
		ciclo.disabled=false;
	}
	
}