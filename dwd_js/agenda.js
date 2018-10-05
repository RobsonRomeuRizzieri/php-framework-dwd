function mostrar_esconder(acao,campo) {
	var aviso =  document.getElementById(campo);
	if(acao == 'nao'){
    aviso.style.display = 'block';
	}else{
    aviso.style.display = 'none';
  }
}

function agenda_hora_usada_inicial(campo_definir,frm){  str_campo = 'agenda_compromisso_dwd_dia;dwd;agenda_compromisso_dwd_mes;dwd;agenda_compromisso_dwd_ano;dwd;';
  str_campo = str_campo + 'agenda_compromisso_dwd_id;dwd;agenda_compromisso_dwd_sys_usuario_id;dwd;';
  str_campo = str_campo + 'agenda_compromisso_dwd_agenda_hora_inicio_id;dwd;agenda_compromisso_dwd_agenda_hora_fim_id';
//  var frm = 'document.'+frm_str_nome+'agenda_compromisso';
  executar_exibir_img('../padrao_adm/agenda/agenda_hora_usada_definir.php?a=1&nome=agenda_hora_inicio_id','div_'+campo_definir,'POST',str_campo,frm,0,0,'../dwd_img');
}
function agenda_hora_usada_final(campo_definir,frm){
  str_campo = 'agenda_compromisso_dwd_dia;dwd;agenda_compromisso_dwd_mes;dwd;agenda_compromisso_dwd_ano;dwd;';
  str_campo = str_campo + 'agenda_compromisso_dwd_id;dwd;agenda_compromisso_dwd_sys_usuario_id;dwd;';
  str_campo = str_campo + 'agenda_compromisso_dwd_agenda_hora_inicio_id;dwd;agenda_compromisso_dwd_agenda_hora_fim_id';
//  var frm = 'document.'+frm_str_nome+'agenda_compromisso';
  executar_exibir_img('../padrao_adm/agenda/agenda_hora_usada_definir.php?a=1&nome=agenda_hora_fim_id','div_'+campo_definir,'POST',str_campo,frm,0,0,'../dwd_img');
}