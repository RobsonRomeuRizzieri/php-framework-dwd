<?php
class pessoa extends entidade{
  public $bol_verificar_senha;

	public function __construct($str_entidade="pessoa",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "pessoa/pessoa_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "pessoa/pessoa_consulta_filtro.php";
		$this->str_cadastro_arquivo = "pessoa/pessoa_cadastro.php";
		$this->str_consulta_arquivo = "pessoa/pessoa_consulta.php";
		$this->str_consulta_arquivo_executar = "pessoa/pessoa_consulta_executar.php";
		$this->str_resultado_arquivo = "pessoa/pessoa_cadastro_executar.php";
		$this->str_arquivo_relatorio = "pessoa/pessoa_relatorio.php";
		$this->str_arquivo_relatorio_executar = "pessoa/pessoa_relatorio_executar.php";
    $this->str_con_descricao = "Manutenзгo das pessoas";
    $this->str_nome = "Manutenзгo da pessoa";
    $this->definir_campos();
  }

	protected function definir_campos(){
		$campo = new entidade_campo();
		$campo->nome = "id";
		$campo->tipo = "auto_inc";
		$campo->descricao = "Cуdigo";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "oculto";
		$campo->rel_int_tamanho	= 20;
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->tipo = "string";
		$campo->descricao = "Nome";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "texto";
		$campo->cad_tamanho	= 50;
		$campo->rel_int_tamanho	= 40;
 		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "apelido";
		$campo->tipo = "string";
		$campo->descricao = "Apelido";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "texto";
		$campo->cad_tamanho	= 50;
		$campo->rel_int_tamanho	= 40;
 		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "cpf_cnpj";
		$campo->tipo = "string";
		$campo->descricao = "CPF/CNPJ";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "texto_cpf_cnpj";
		$campo->cad_tamanho	= 20;
		$campo->rel_int_tamanho	= 30;
 		$this->adicionar_campo($campo);
/*
		$campo = new entidade_campo();
		$campo->nome = "sys_usuario_id";
		$campo->tipo = "integer";
		$campo->descricao = "Usuбrio Cуdigo";
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
*/
		$campo = new entidade_campo();
		$campo->nome = "data_nascimento";
		$campo->tipo = "date";
		$campo->descricao = "Data Nascimento";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
  	$campo->cad_tipo_campo	= "data";
  	$campo->cad_converte_data = "sim";
  	$campo->cad_carrega_data = "sim";
		$campo->rel_int_tamanho	= 40;
    $this->adicionar_campo($campo);
/*
		$campo = new entidade_campo();
		$campo->nome = "tipo_empresa";
		$campo->tipo = "integer";
		$campo->descricao = "Empresa";
		$campo->descricao_complemento = "Define se o registro й do tipo empresa";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "tipo_cliente";
		$campo->tipo = "integer";
		$campo->descricao = "Cliente";
		$campo->descricao_complemento = "Define se o registro й do tipo cliente";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "tipo_fornecedor";
		$campo->tipo = "integer";
		$campo->descricao = "Fornecedor";
		$campo->descricao_complemento = "Define se o registro й do tipo fornecedor";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "tipo_funcionario";
		$campo->tipo = "integer";
		$campo->descricao = "Funcionбrio";
		$campo->descricao_complemento = "Define se o registro й do tipo funcionбrio";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "tipo_representante";
		$campo->tipo = "integer";
		$campo->descricao = "Representante";
		$campo->descricao_complemento = "Define se o registro й do tipo representante";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "tipo_motorista";
		$campo->tipo = "integer";
		$campo->descricao = "Motorista";
		$campo->descricao_complemento = "Define se o registro й do tipo motorista";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);
*/
		$campo = new entidade_campo();
		$campo->nome = "ativo";
		$campo->tipo = "integer";
		$campo->descricao = "Ativo";
		$campo->descricao_complemento = "Define se o registro pode ser usado ou nгo";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
		$campo->rel_int_tamanho	= 15;
    $this->adicionar_campo($campo);

  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

}
?>