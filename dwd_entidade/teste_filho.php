<?php
class teste_filho extends entidade{

	public function __construct($str_entidade="teste_filho",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_cadastro_arquivo = "frm_detalhe_cadastro.php";
		$this->str_cadastro_local = "principal";
		$this->str_resultado_arquivo = "frm_detalhe_cadastro_executar.php";
		$this->str_consulta_arquivo = "frm_detalhe_filtro_paginado.php";
		$this->str_consulta_local = "principal";
    $this->str_con_descricao = "Descriзгo teste filho para detalhe";
    $this->str_nome = "Teste Filho";
    $this->bol_detalhe = true;
    $this->str_campo_ligacao_mestre = "teste_dwd_id";
    $this->definir_campos();
  }

	private function definir_campos(){

		$this->arr_campo[0]["nome"] = "id";
		$this->arr_campo[0]["tipo"] = "auto_inc";
		$this->arr_campo[0]["descricao"] = "Cуdigo";
		$this->arr_campo[0]["valor"] = "";
		$this->arr_campo[0]["requerido"] = "sim";
		$this->arr_campo[0]["chave"] = "sim";
		$this->arr_campo[0]["filtrar"] = "sim";
		$this->arr_campo[0]["consultar"] = "sim";
		$this->arr_campo[0]["cad_tipo_campo"]	= "oculto";

		$this->arr_campo[1]["nome"] = "teste_id";
		$this->arr_campo[1]["tipo"] = "integer";
		$this->arr_campo[1]["descricao"] = "Teste";
		$this->arr_campo[1]["valor"] = "";
		$this->arr_campo[1]["requerido"] = "sim";
		$this->arr_campo[1]["chave"] = "nao";
		$this->arr_campo[1]["filtrar"] = "nao";
		$this->arr_campo[1]["consultar"] = "sim";
		$this->arr_campo[1]["cad_tipo_campo"]	= "oculto";
    $this->arr_campo[1]["con_exibir"] = "nao";//Propriedade controlada internamente na tela de consulta

		$this->arr_campo[2]["nome"] = "nome";
		$this->arr_campo[2]["tipo"] = "string";
		$this->arr_campo[2]["descricao"] = "Nome";
		$this->arr_campo[2]["valor"] = "";
		$this->arr_campo[2]["requerido"] = "sim";
		$this->arr_campo[2]["editar"] = "sim";
		$this->arr_campo[2]["filtrar"] = "sim";
		$this->arr_campo[2]["consultar"] = "sim";
		$this->arr_campo[2]["cad_tipo_campo"]	= "texto";
		$this->arr_campo[2]["cad_tamanho"]	= 30;

		$this->arr_campo[3]["nome"] = "data_cadastro";
		$this->arr_campo[3]["tipo"] = "date";
		$this->arr_campo[3]["descricao"] = "Data Cadastro";
		$this->arr_campo[3]["valor"] = "";
		$this->arr_campo[3]["requerido"] = "sim";
		$this->arr_campo[3]["editar"] = "sim";
		$this->arr_campo[3]["filtrar"] = "sim";
		$this->arr_campo[3]["consultar"] = "sim";
  	$this->arr_campo[3]["cad_tipo_campo"]	= "data";
  	$this->arr_campo[3]["cad_converte_data"] = "nao";
  	$this->arr_campo[3]["cad_carrega_data"] = "sim";
  }

}
?>