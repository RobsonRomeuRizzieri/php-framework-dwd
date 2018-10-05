<?php
class agenda_compromisso_participante extends entidade{

	public function __construct($str_entidade="agenda_compromisso_participante",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "agenda/agenda_compromisso_participante_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "agenda/agenda_compromisso_participante_consulta_filtro.php";
		$this->str_cadastro_arquivo = "agenda/agenda_compromisso_participante_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "agenda/agenda_compromisso_participante_consulta.php";
		$this->str_consulta_arquivo_executar = "agenda/agenda_compromisso_participante_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "agenda/agenda_compromisso_cadastro_executar.php";


    $this->str_con_descricao = "Define os participantes do compromisso";
    $this->str_nome = "Participantes";
    $this->str_campo_ligacao_mestre = "agenda_compromisso_dwd_id";
//    $this->arr_detalhe[0] = new teste_filho();

    $this->definir_campos();
  }

	private function definir_campos(){
		$campo = new entidade_campo();
		$campo->nome = "id";
		$campo->tipo = "auto_inc";
		$campo->descricao = "Código";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo = "oculto";
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "agenda_compromisso_id";
		$campo->tipo = "integer";
		$campo->descricao = "Compromisso";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "nao";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo = "oculto";
		$campo->con_exibir = "nao";
		$this->adicionar_campo($campo);
/*
		$campo = new entidade_campo();
		$campo->nome = "hora";
		$campo->entidade = "agenda_hora";
		$campo->entidade_campo_chave = "agenda_hora_inicio_id";
		$campo->tipo = "string";
		$campo->descricao = "Hora Inicio";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);
*/
		$campo = new entidade_campo();
		$campo->nome = "sys_usuario_id";
		$campo->tipo = "integer";
		$campo->descricao = "Usuário";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->lookup_tabela = "sys_usuario";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "login";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

    $campo = new entidade_campo();
	  $campo->nome = "recusado";
		$campo->tipo = "integer";
		$campo->descricao = "Recusado";
		$campo->descricao_complemento = "Quando selecionado indica que o participante recusou o compromisso.";
		$campo->valor = "0";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

}
?>