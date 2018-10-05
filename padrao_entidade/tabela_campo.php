<?php
class tabela_campo extends entidade{
  public $bol_verificar_senha;

	public function __construct($str_entidade="sys_tabela_campo",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "tabela/tabela_campo_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "tabela/tabela_campo_consulta_filtro.php";
		$this->str_cadastro_arquivo = "tabela/tabela_campo_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "tabela/tabela_campo_consulta.php";
		$this->str_consulta_arquivo_executar = "tabela/tabela_campo_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "tabela/tabela_campo_cadastro_executar.php";

    $this->str_con_descricao = "Manutenзгo dos campos";
    $this->str_nome = "Campos";
    $this->bol_detalhe = true;
    $this->str_campo_ligacao_mestre = "sys_tabela_dwd_id";
    $this->definir_campos();

  }

	private function definir_campos(){
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

		$campo = new entidade_campo();
		$campo->nome = "sys_tabela_id";
		$campo->tipo = "integer";
		$campo->descricao = "Tabela";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "nao";
		$campo->filtrar = "nao";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo = "oculto";
		$campo->con_exibir = "nao";
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
 		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "nome_cientifico";
		$campo->tipo = "string";
		$campo->descricao = "Nome Cientifico";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "texto";
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
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

}
?>