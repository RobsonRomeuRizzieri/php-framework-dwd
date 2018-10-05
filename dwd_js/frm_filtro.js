function definir_condicao_que(obj_campo,str_campo){
  var str_campo_valor = obj_campo.value;
  arr_campo_tipo = str_campo_valor.split('_rrr_');
	if (arr_campo_tipo[0] == "string"){
    wd_definir_tipo_condicao(1,str_campo);

	}else if (arr_campo_tipo[0] == "integer"){
		wd_definir_tipo_condicao(2,str_campo);

	}else if (arr_campo_tipo[0] == "numeric"){
    wd_definir_tipo_condicao(2,str_campo);

	}else	if (arr_campo_tipo[0] == "decimal"){
		wd_definir_tipo_condicao(2,str_campo);

	}else if (arr_campo_tipo[0] == "date"){
	  wd_definir_tipo_condicao(2,str_campo);

	}else if (arr_campo_tipo[0] == "datetime"){
		wd_definir_tipo_condicao(2,str_campo);

	}else if (arr_campo_tipo[0] == "time"){
		wd_definir_tipo_condicao(2,str_campo);

	}else if (arr_campo_tipo[0] == "checkbox"){
		wd_definir_tipo_condicao(3,str_campo);

	}else if (arr_campo_tipo[0] == "auto_inc"){
		wd_definir_tipo_condicao(2,str_campo);

	}else{
    wd_limpar_item_combo(str_campo);
		alert('Tipo não definido!');
	}
}

function wd_definir_tipo_condicao(tipo,str_campo){
  if (tipo == 1){
    wd_limpar_item_combo(str_campo);
    wd_adicionar_item_combo(str_campo,'Inicie com','wdr');
    wd_adicionar_item_combo(str_campo,'Termine com','rwd');
    wd_adicionar_item_combo(str_campo,'Contenha','rwdr');
    wd_adicionar_item_combo(str_campo,'Igual à','=');
    wd_adicionar_item_combo(str_campo,'Diferente de','<>');
	}else if (tipo == 2){
    wd_limpar_item_combo(str_campo);
    wd_adicionar_item_combo(str_campo,'Igual à','=');
    wd_adicionar_item_combo(str_campo,'Diferente de','<>');
    wd_adicionar_item_combo(str_campo,'Maior que','>');
    wd_adicionar_item_combo(str_campo,'Menor que','<');
    wd_adicionar_item_combo(str_campo,'Entre os','between');
	}else if (tipo == 3){
    wd_limpar_item_combo(str_campo);
		wd_adicionar_item_combo(str_campo,'Igual à','=');
    wd_adicionar_item_combo(str_campo,'Diferente de','<>');
	}

}

function wd_adicionar_item_combo(cmb_combo,texto,valor) {
  obj = document.getElementById(cmb_combo);
  strvalor = texto;
  if (obj) {
    op = new Option(strvalor, valor);
    obj.options[obj.options.length] = op;
  }
}

function wd_limpar_item_combo(cmb_combo){
  var obj = document.getElementById(cmb_combo);
  for (i = obj.options.length -1; i >= 0; i--) {
    obj.options[i] = null;
  }
  wd_adicionar_item_combo(cmb_combo,'--Selecione--',';wd;');
}

function wd_definir_campo_para_filtro(obj_condicao,obj_campo,str_edit_um,str_edit_dois,str_data_um,str_data_dois,str_combo_checkbox){

  if (obj_condicao.value != ";wd;"){
	  if ((obj_condicao.value == "wdr") ||
		    (obj_condicao.value == "rwd") ||
		    (obj_condicao.value == "rwdr") ||
				(obj_condicao.value == "=")   ||
				(obj_condicao.value == "<>")  ||
				(obj_condicao.value == "<")   ||
				(obj_condicao.value == ">")){
      var str_campo_valor = obj_campo.value;
      arr_campo_tipo = str_campo_valor.split('_rrr_');

			if (arr_campo_tipo[0] == 'date'){
				wd_campo_data_visivel(true,false,str_edit_um,str_edit_dois,str_data_um,str_data_dois);
			}else{
	      wd_campo_edit_visivel(true,false,str_edit_um,str_edit_dois,str_data_um,str_data_dois);
	    }
		}else if (obj_condicao.value == "between"){
	    if (arr_campo_tipo[0] == 'date'){
				wd_campo_data_visivel(true,true,str_edit_um,str_edit_dois,str_data_um,str_data_dois);
			}else{
				wd_campo_edit_visivel(true,true,str_edit_um,str_edit_dois,str_data_um,str_data_dois);
			}
		}
	}
}

function wd_campo_edit_visivel(exibe_campo_um,exibe_campo_dois,str_edit_um,str_edit_dois,str_data_um,str_data_dois){
    wd_definir_visibilidade('div_'+str_edit_um,exibe_campo_um);
    wd_definir_visibilidade('div_'+str_edit_dois,exibe_campo_dois);
    wd_definir_visibilidade('div_'+str_data_um,false);
    wd_definir_visibilidade('div_'+str_data_dois,false);
}
function wd_campo_data_visivel(exibe_campo_um,exibe_campo_dois,str_edit_um,str_edit_dois,str_data_um,str_data_dois){
    wd_definir_visibilidade('div_'+str_edit_um,false);
    wd_definir_visibilidade('div_'+str_edit_dois,false);
    wd_definir_visibilidade('div_'+str_data_um,exibe_campo_um);
    wd_definir_visibilidade('div_'+str_data_dois,exibe_campo_dois);
}

function wd_definir_visibilidade(id,bol_visivel) {
  ID = document.getElementById(id);
  if (bol_visivel){
    ID.style.display = "";
  }else{
 		ID.style.display = "none";
  }
}

function filtro_campo_adicionar(obj_campo,str_frm,str_entidade,str_filtro_url,str_filtro_resultado,id_div,id_div_pai,str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho,str_img){

  var div_filtro = document.createElement('div');
  div_filtro.setAttribute('type', 'div');
  div_filtro.setAttribute('id', id_div);

  var div_filtro_pai = document.getElementById(id_div_pai);
  div_filtro_pai.appendChild(div_filtro);
  executar_exibir_img(str_caminho_url,str_retornar,str_metodo,str_campo,str_formulario,status,cabecalho,str_img);

  var str_campo_filtro = document.getElementById('frm_filtrar_'+ str_frm + str_entidade);
  str_campo_filtro.onclick = function(){ executar_exibir_img(str_filtro_url,str_filtro_resultado,str_metodo,str_campo,str_formulario,1,1,str_img) };

}