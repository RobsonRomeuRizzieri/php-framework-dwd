function executar_exibir_combo(combo,str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho){
  var indice = document.getElementById(combo).selectedIndex;
  var indice_valor = document.getElementById(combo).options[indice].getAttribute('value');
  var limitador = '=';
	if(str_caminho_url.search(limitador) == -1)
	  {
    //Cria o link adicionando uma vari�vel GET UNICA e adicionando a semente rand�mica
		var LinkAjax = str_caminho_url + "?dwd_pai=" + indice_valor;
		}
  //Caso ACHE o sinal de igual � porque tem um par�metro sendo passado via GET
	else
		{
    //Monta o link ajax adicionando MAIS UMA VARI�VEL na URL (para a semente rand�mica)
	  var LinkAjax = str_caminho_url + "&dwd_pai=" + indice_valor;
		}
  executar_exibir_img(LinkAjax,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho,'../dwd_img');
}
