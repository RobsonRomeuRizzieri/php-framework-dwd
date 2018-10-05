function menu_dinamico_posicao(event,campo_definir,int_campo) {
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
document.getElementById(campo_definir).style.display = "block";
document.getElementById(campo_definir).style.left = x-(int_campo);
}

function menu_dinamico_conteudo(str_texto,str_exibir){
  var men_conteudo = document.getElementById(str_exibir);
  men_conteudo.style.display = "none";
}