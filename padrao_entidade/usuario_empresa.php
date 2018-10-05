<?php
class usuario_empresa extends entidade{

	public function __construct($str_entidade="sys_usuario_empresa",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);

		$this->str_arquivo_filtro = "usuario/usuario_empresa_paginado_item.php";
		$this->str_arquivo_filtro_resultado = "usuario/usuario_empresa_consulta_filtro.php";
		$this->str_cadastro_arquivo = "usuario/usuario_empresa_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "usuario/usuario_empresa_consulta.php";
		$this->str_consulta_arquivo_executar = "usuario/usuario_empresa_consulta_executar.php";
		$this->str_resultado_arquivo = "usuario/usuario_empresa_cadastro_executar.php";

		$this->str_consulta_local = "content";

    $this->str_con_descricao = "Relacionamento usuários com empresas";
    $this->str_nome = "Empresa";
    $this->bol_detalhe = true;
    $this->str_campo_ligacao_mestre = "sys_usuario_dwd_id";
    $this->arr_detalhe[0] = new usuario_filial();
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
		$campo->nome = "sys_usuario_id";
		$campo->tipo = "integer";
		$campo->descricao = "Usuário";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "nao";
		$campo->filtrar = "nao";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo = "oculto";
		$campo->con_exibir = "nao";
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "sys_empresa_id";
		$campo->tipo = "integer";
		$campo->descricao = "Empresa";
		$campo->valor = "";
		$campo->editar = "sim";
		$campo->requerido = "sim";
		$campo->chave = "nao";
		$campo->filtrar = "nao";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo = "combox_dinamico";
		$campo->con_exibir = "nao";
		$campo->lookup_tabela = "sys_empresa";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "nome";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "data_expiracao";
		$campo->tipo = "date";
		$campo->descricao = "Data Expiracao";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
  	$campo->cad_tipo_campo	= "nao";
  	$campo->cad_converte_data = "nao";
  	$campo->cad_carrega_data = "sim";
    $campo->con_exibir = "nao";//Propriedade controlada internamente na tela de consulta
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->entidade = "sys_empresa";
		$campo->tipo = "string";
		$campo->descricao = "Empresa Nome";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "nao";
		$campo->filtrar = "nao";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "ativo";
		$campo->tipo = "integer";
		$campo->descricao = "Ativo";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

  }

	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=",sys_empresa"){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

}
?>