<?php
class empresa_filial extends entidade{

	public function __construct($str_entidade="sys_empresa_filial",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);

		$this->str_arquivo_filtro = "empresa/empresa_filial_paginado_item.php";
		$this->str_arquivo_filtro_resultado = "empresa/empresa_filial_paginado_executar.php";
		$this->str_cadastro_arquivo = "empresa/empresa_filial_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo_executar = "empresa/empresa_filial_consulta_executar.php";
//		$this->str_resultado_arquivo = "empresa/empresa_filial_cadastro_executar.php";
		$this->str_consulta_arquivo = "empresa/empresa_filial_consulta.php";
		$this->str_consulta_local = "content";

    $this->str_con_descricao = "Relacionamento filiais da empresa";
    $this->str_nome = "Filial";
    $this->bol_detalhe = true;
    $this->str_campo_ligacao_mestre = "sys_empresa_dwd_id";
    $this->definir_campos();
  }

	private function definir_campos(){

		$this->arr_campo[0]["nome"] = "id";
		$this->arr_campo[0]["tipo"] = "auto_inc";
		$this->arr_campo[0]["descricao"] = "Código";
		$this->arr_campo[0]["valor"] = "";
		$this->arr_campo[0]["requerido"] = "sim";
		$this->arr_campo[0]["chave"] = "sim";
		$this->arr_campo[0]["filtrar"] = "sim";
		$this->arr_campo[0]["consultar"] = "sim";
		$this->arr_campo[0]["cad_tipo_campo"]	= "oculto";

		$this->arr_campo[1]["nome"] = "sys_empresa_id";
		$this->arr_campo[1]["tipo"] = "integer";
		$this->arr_campo[1]["descricao"] = "Empresa";
		$this->arr_campo[1]["valor"] = "";
		$this->arr_campo[1]["requerido"] = "sim";
		$this->arr_campo[1]["chave"] = "nao";
		$this->arr_campo[1]["filtrar"] = "nao";
		$this->arr_campo[1]["consultar"] = "sim";
		$this->arr_campo[1]["cad_tipo_campo"]	= "oculto";
    $this->arr_campo[1]["con_exibir"] = "nao";//Propriedade controlada internamente na tela de consulta

		$this->arr_campo[2]["nome"] = "sys_filial_id";
		$this->arr_campo[2]["tipo"] = "integer";
		$this->arr_campo[2]["descricao"] = "Filial";
		$this->arr_campo[2]["valor"] = "";
		$this->arr_campo[2]["requerido"] = "sim";
		$this->arr_campo[2]["editar"] = "sim";
		$this->arr_campo[2]["filtrar"] = "sim";
		$this->arr_campo[2]["consultar"] = "sim";
		$this->arr_campo[2]["con_exibir"] = "sim";
		$this->arr_campo[2]["lookup_tabela"] = "sys_filial";
		$this->arr_campo[2]["lookup_chave"] = "id";
		$this->arr_campo[2]["lookup_chave_tipo"] = "integer";
		$this->arr_campo[2]["lookup_retorno"] = "nome";
		$this->arr_campo[2]["lookup_retorno_tipo"] = "string";
		$this->arr_campo[2]["cad_tipo_campo"]	= "combobox_dinamico";
		$this->arr_campo[2]["cad_tamanho"]	= 40;

		$this->arr_campo[3]["nome"] = "nome";
		$this->arr_campo[3]["entidade"] = "sys_filial";
		$this->arr_campo[3]["tipo"] = "string";
		$this->arr_campo[3]["descricao"] = "Filial nome";
		$this->arr_campo[3]["valor"] = "";
		$this->arr_campo[3]["requerido"] = "sim";
		$this->arr_campo[3]["editar"] = "sim";
		$this->arr_campo[3]["filtrar"] = "sim";
		$this->arr_campo[3]["consultar"] = "sim";
		$this->arr_campo[3]["cad_tipo_campo"]	= "nao";
		$this->arr_campo[3]["cad_tamanho"]	= 40;

		$this->arr_campo[4]["nome"] = "ativo";
		$this->arr_campo[4]["tipo"] = "integer";
		$this->arr_campo[4]["descricao"] = "Ativo";
		$this->arr_campo[4]["descricao_complemento"] = "Define se o registro pode ser usado ou não";
		$this->arr_campo[4]["valor"] = "";
		$this->arr_campo[4]["requerido"] = "sim";
		$this->arr_campo[4]["editar"] = "sim";
		$this->arr_campo[4]["filtrar"] = "sim";
		$this->arr_campo[4]["consultar"] = "sim";
		$this->arr_campo[4]["cad_tipo_campo"]	= "checkbox";
		$this->arr_campo[4]["cad_tamanho"]	= 40;


  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=",sys_filial"){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}
}
?>