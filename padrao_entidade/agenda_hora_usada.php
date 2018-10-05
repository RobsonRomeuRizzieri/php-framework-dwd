<?php
class agenda_hora_usada extends entidade{

	public function __construct($str_entidade="agenda_hora_usada",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "agenda/agenda_hora_usada_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "agenda/agenda_hora_usada_consulta_filtro.php";
		$this->str_cadastro_arquivo = "agenda/agenda_hora_usada_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "agenda/agenda_hora_usada_consulta.php";
		$this->str_consulta_arquivo_executar = "agenda/agenda_hora_usada_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "agenda/agenda_hora_usada_cadastro_executar.php";
/*

    $this->str_con_descricao = "Descriзгo teste para consulta";
    $this->str_nome = "Teste";
    $this->arr_detalhe[0] = new teste_filho();
*/
    $this->definir_campos();
  }

	private function definir_campos(){
    /*
      O arquivo
      agenda_compromisso.php
      usa os campos pelo indice na ordem dos campos
      ser trocar a ordem dos campos deve ser alterado no arquivo tambйm
    */
    //indice campo = 0
		$campo = new entidade_campo();
		$campo->nome = "id";
		$campo->tipo = "auto_inc";
		$campo->descricao = "Cуdigo";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo = "oculto";
		$this->adicionar_campo($campo);
    //indice campo = 1
		$campo = new entidade_campo();
		$campo->nome = "dia";
		$campo->tipo = "string";
		$campo->descricao = "Dia";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "data_dia";
		$campo->cad_tamanho	= 60;
		$campo->cad_novalinha = "sim";
		$this->adicionar_campo($campo);
    //indice campo = 2
		$campo = new entidade_campo();
		$campo->nome = "mes";
		$campo->tipo = "string";
		$campo->descricao = "Mes";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "data_mes";
		$campo->cad_tamanho	= 60;
		$campo->cad_novalinha = "nao";
		$this->adicionar_campo($campo);
    //indice campo = 3
		$campo = new entidade_campo();
		$campo->nome = "ano";
		$campo->tipo = "string";
		$campo->descricao = "Ano";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "data_ano";
		$campo->cad_tamanho	= 60;
		$campo->cad_novalinha = "nao";
		$this->adicionar_campo($campo);
    //indice campo = 4
		$campo = new entidade_campo();
		$campo->nome = "agenda_hora_id";
		$campo->tipo = "integer";
		$campo->descricao = "Hora Agendada";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->lookup_tabela = "agenda_hora";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "hora";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);
    //indice campo = 5
		$campo = new entidade_campo();
		$campo->nome = "sys_usuario_id";
		$campo->tipo = "integer";
		$campo->descricao = "Usuбrio";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->lookup_tabela = "sys_usuario";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "login";
		$campo->lookup_retorno_tipo = "string";
		$campo->con_exibir = "sim";
		$campo->con_editar = "sim";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);
    //Indice campo = 6
		$campo = new entidade_campo();
		$campo->nome = "agenda_compromisso_id";
		$campo->tipo = "integer";
		$campo->descricao = "Compromisso Original";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "nao";
		$campo->filtrar = "nao";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "oculto";
		$campo->con_exibir = "nao";
		$this->adicionar_campo($campo);

  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

}
?>