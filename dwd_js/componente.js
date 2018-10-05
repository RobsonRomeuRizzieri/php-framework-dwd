function definir_cor(obj_celula, str_cor,tipo){
  obj_celula.style.background = str_cor;
}

function visibilidade(str_campo){
  obj = document.getElementById(str_campo);
	alert(obj.style.visibility);
  if (obj.style.visibility == 'visible')
    obj.style.visibility = 'hidden';
  else
    obj.style.visibility = 'visible';
}
