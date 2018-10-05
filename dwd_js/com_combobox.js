function executar_exibir_combo(combo,str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho){
  var indice = document.getElementById(combo).selectedIndex;
  var indice_valor = document.getElementById(combo).options[indice].getAttribute('value');
  var limitador = '=';
	if(str_caminho_url.search(limitador) == -1)
	  {
    //Cria o link adicionando uma variável GET UNICA e adicionando a semente randômica
		var LinkAjax = str_caminho_url + "?dwd_pai=" + indice_valor;
		}
  //Caso ACHE o sinal de igual é porque tem um parâmetro sendo passado via GET
	else
		{
    //Monta o link ajax adicionando MAIS UMA VARIÁVEL na URL (para a semente randômica)
	  var LinkAjax = str_caminho_url + "&dwd_pai=" + indice_valor;
		}
  executar_exibir_img(LinkAjax,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho,'../dwd_img');
}
