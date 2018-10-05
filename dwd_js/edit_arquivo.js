function edit_arquivo_top_left(event,campo_definir,int_campo) {
	//obter.offsetTop obtem top do componente
	//obter.offsetLeft obtem left do componente
    if (document.all) {
			x = window.event.clientX;
			y = window.event.clientY;
		} else {
			x = event.pageX;
			y = event.pageY;
		}
document.getElementById(campo_definir).style.top = y+6;
document.getElementById(campo_definir).style.left = x-(506);
}
