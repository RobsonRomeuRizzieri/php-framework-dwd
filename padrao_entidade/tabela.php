<?php
class tabela extends entidade{
  public $bol_verificar_senha;

	public function __construct($str_entidade="sys_tabela",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "tabela/tabela_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "tabela/tabela_consulta_filtro.php";
		$this->str_cadastro_arquivo = "tabela/tabela_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "tabela/tabela_consulta.php";
		$this->str_consulta_arquivo_executar = "tabela/tabela_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "tabela/tabela_cadastro_executar.php";

    $this->str_con_descricao = "Manutenзгo das tabelas";
    $this->str_nome = "Tabelas";
    $this->arr_detalhe[0] = new tabela_campo();
    $this->definir_campos();
  }

	private function definir_campos(){		$campo = new entidade_campo();
		$campo->nome = "id";
		$campo->tipo = "auto_inc";
		$campo->descricao = "Cуdigo";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "oculto";
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
		$campo->nome = "tipo";
		$campo->tipo = "integer";
		$campo->descricao = "Tipo";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$arr_item[0]["valor"] = "1";
		$arr_item[0]["descricao"] = "Tabela";
		$arr_item[1]["valor"] = "2";
		$arr_item[1]["descricao"] = "Menu Grupo";
		$campo->arr_item = $arr_item;
		$campo->cad_tipo_campo	= "combobox_fixo";
		$campo->cad_tamanho	= 50;
 		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "usuario_controla";
		$campo->tipo = "integer";
		$campo->descricao = "Usuбrio Controla";
		$campo->descricao_complemento = "Define se o registro pode ser controlado pelo usuбrio";
		$campo->valor = "1";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		if ($_SESSION["usuario_grupo_id"] == 1){  		$campo->cad_tipo_campo	= "checkbox";
  		$campo->con_exibir = "sim";
		}else{
  		$campo->cad_tipo_campo	= "nao";
  		$campo->con_exibir = "nao";
  	}
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

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
    $this->adicionar_campo($campo);

  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

}
?>