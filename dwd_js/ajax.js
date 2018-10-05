//Cria o objeto XMLHttpRequest
dwd_ajax = function (){
  try {
    ajax = new XMLHttpRequest();
  } catch(ee) {
    try {
      ajax = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(e) {
      try {
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
      } catch(E) {
        ajax = false;
      }
    }
  }
}

//Função para procurar tags de script JS no retorno do ajax e executar o conteudo
function extrai_script(texto){
  //inicializa o inicio<input type=image src="image.gif" name="sub"> ><
  var ini = 0;
  //loop enquanto achar um script
  while (ini!=-1){
    //procura uma tag de script
    ini = texto.indexOf('<script', ini);
    //se encontrar
    if (ini >= 0){
      //define o inicio para depois do fechamento dessa tag
      ini = texto.indexOf('>', ini) + 1;
      //procura o final do script
      var fim = texto.indexOf('</script>', ini);
      //extrai apenas o script
      codigo = texto.substring(ini,fim);
      //executa o script
      //eval(codigo);
      novo = document.createElement("script");
      novo.text = codigo;
      document.body.appendChild(novo);
    }
    ini = -1;
  }

}
//Cria a função de carregamento via ajax
//Parâmetros:
//str_caminho = url que será carregada
//str_retornar = div ou contâiner que receberá os dados
//str_metodo = modo de envio dos dados (Get ou Post)
//str_campo = string contendo os campos que serão enviados pelo formulário (sep |)
//str_formulario = nome do formulário de envio (usar document. antes)
//status = marcar com 1 se deve exibir o status das operação de processamento
//cabecalho = marcar com 1 se deve exibir a barra de cabecalho
function executar_exibir_img(str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho,str_img_dir){
  executar_exibir_ajax(str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho,str_img_dir);
}
function executar_exibir(str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho){
  executar_exibir_ajax(str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho,'../../dwd_img');
}
function executar_exibir_ajax(str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho,str_img_dir){
	//Verifica o método de envio dos datos
  if (str_metodo == "POST"){
		//Monta a variável com o array dos campos que devem ser postados
		var str_campo = definir_url(str_campo,str_formulario);
  }
  var Conteudo = document.getElementById(str_retornar);
  //Gerar um parâmetro de número randômico para o navegador não guardar no cache
  //Cria a variavel que será pesquisada (nesse caso o caractere de igual =)
  var limitador = '=';
  //Caso NÃO ache o sinal de igual, é porque não foi passado nenhum parametro GET na URL
	if(str_caminho_url.search(limitador) == -1)
	  {
    //Cria o link adicionando uma variável GET UNICA e adicionando a semente randômica
		var LinkAjax = str_caminho_url + "?dwd_tab="+str_retornar+"&TimeStamp=" + new Date() .getTime();
		}
  //Caso ACHE o sinal de igual é porque tem um parâmetro sendo passado via GET
	else
		{
    //Monta o link ajax adicionando MAIS UMA VARIÁVEL na URL (para a semente randômica)
	  var LinkAjax = str_caminho_url + "&dwd_tab="+str_retornar+"&TimeStamp=" + new Date() .getTime();
		}

	//Verifica se deve ou não exibir o aviso do status da operação executada
	if(status == 1) {
		//Verifica se deve ou não exibir o cabeçalho da área do sistema
		if(cabecalho == 1) {
			//Cria a mensagem que a página está sendo carregada mas sem o cabeçalho
	  	Conteudo.innerHTML = "<table width='100%' border='0' align='left' cellpadding='0' cellspacing='0' class='text'><tr><td height='22' width='20' valign='middle' bgcolor='#FFFFCD' style='border: solid 1px; padding-left: 4px; padding-top: 1px; border-right: 0px'><img src='"+str_img_dir+"/bt_ajax_loading2.gif' border='0' /><td valign='middle' bgcolor='#FFFFCD' style='border: solid 1px; padding-left: 4px; border-left: 0px'><strong>A opera&ccedil;&atilde;o solicitada est&aacute; sendo processada...</strong></td></tr><tr><td>&nbsp</td></tr></table>";
		} else {
			//Cria a mensagem que a página está sendo carregada COM cabeçalho
	  	Conteudo.innerHTML = "<table width='100%' border='0' align='left' cellpadding='0' cellspacing='0' class='text'><tr>    <td colspan='2' valign='top' class='text'><img src='"+str_img_dir+"/lat_cadastro.gif' />&nbsp;<span class='TituloModulo'>Aguarde...</span></td></tr><tr><td colspan='2'><img src='"+str_img_dir+"/bt_espacohoriz.gif' width='100%' height='12'></td></tr><tr><td height='22' width='20' valign='middle' bgcolor='#FFFFCD' style='border: solid 1px; padding-left: 4px; padding-top: 1px; border-right: 0px'><img src='"+str_img_dir+"/bt_ajax_loading2.gif' border='0' /><td valign='middle' bgcolor='#FFFFCD' style='border: solid 1px; padding-left: 4px; border-left: 0px'><strong>A opera&ccedil;&atilde;o solicitada est&aacute; sendo processada...</strong></td></tr><tr><td>&nbsp</td></tr></table>";
	  	}
	//Fecha o if do status
	}
	//Verifica o método de envio dos datos
  if (str_metodo == "POST"){
	  //Abre a página solicitada via ajax usando POST
    ajax.open("POST",LinkAjax,true);
  }else{
    //Abre a página solicitada via ajax usando GET
    ajax.open("GET",LinkAjax,true);
	}

  /* Cria os cabeçalhos da página html para instruções de chache ao navegador */
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
  ajax.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
  ajax.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
  ajax.setRequestHeader("Pragma", "no-cache");

  ajax.onreadystatechange = function() {
    //Verifica se o estado do ajax retornou OK
		if( ajax.readyState == 4 ){
      //Cria a variável com o retorno do ajax
			var valorRetorno = ajax.responseText;
 		  //Coloca o valor do retorno dentro do div informado
			Conteudo.innerHTML = valorRetorno;
		  //Executa a procura por tags javascript do retorno e executa
			extrai_script(valorRetorno);
		}
  }
	//Caso o método for via POST
	if (str_metodo == "POST"){
		//Envia os campos pelo ajaxs
    ajax.send( str_campo );

	} else {
	  //Se não for post, envia null pelo ajax
		ajax.send( null );
	}
  return true;
}

function conteudo_dinamico(str_texto,str_exibir){
  var Conteudo = document.getElementById(str_exibir);
  Conteudo.innerHTML = str_texto;
}

function valor_dinamico(str_texto,str_exibir){
	 var Conteudo = document.getElementById(str_exibir);
	 Conteudo.value = str_texto;
}

function elemento_limpar(Conteudo){
	Conteudo.innerHTML = "";
}
//Função para montar o array dos campos do formulário
function definir_url(str_campo,str_formulario){
	var arr_campo_nome = str_campo.split(';dwd;');
  var cont = arr_campo_nome.length;
  var str_valor = "";
  var str_url = "";

  for(i = 0; i < cont; i++){
  	if (arr_campo_nome[i] != ''){
			var obj_campo = str_formulario.elements;
			for(j = 0; j < obj_campo.length; ++j){
        if (obj_campo[j].name == arr_campo_nome[i]){
				  if (obj_campo[j].type == 'radio'){
					  if (obj_campo[j].checked == true){
					    str_valor = obj_campo[j].value;
					  }
					}else if (obj_campo[j].type == 'checkbox'){
					  if (obj_campo[j].checked == true){
					    str_valor = '1';
					  }else{
						  str_valor = '0';
						}
					}else if (obj_campo[j].type == 'textarea'){
		        str_valor = obj_campo[j].value;
					}else {
            try{
              str_valor = FCKeditorAPI.GetInstance(arr_campo_nome[i]).GetXHTML(true);
            }
            catch(e){
              str_valor = obj_campo[j].value;
            }
					}
				}
			}
			str_valor = escape(str_valor);
	    if (str_valor != ''){			  if (i == 0){
		      str_url += arr_campo_nome[i]+"="+str_valor;
		    }else{
				  str_url += "&"+arr_campo_nome[i]+"="+str_valor;
			  }
	    }
	    str_valor = '';
	  }
  }
	return str_url;
}

function Layer( e, strCampo,intTamanho)
{

  obj = document.getElementById(strCampo)
  obj.style.left = e.clientX-186-intTamanho-10+"px";
//	obj.style.left = cam.clientX+"px";
  obj.style.top = e.clientY-165+"px";
//  obj.style.top = cam.clientY+"px";
  if (obj.style.visibility == 'visible')
    obj.style.visibility = 'hidden';
  else
    obj.style.visibility = 'visible';

}
