<?php
class teste extends entidade{
	public function __construct($str_entidade="teste",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_cadastro_arquivo = "frm_cadastro.php";
		$this->str_cadastro_local = "principal";
		$this->str_resultado_arquivo = "frm_cadastro_executar.php";
		$this->str_consulta_arquivo = "frm_filtro_paginado.php";
		$this->str_consulta_local = "principal";
    $this->str_con_descricao = "Descriзгo teste para consulta";
    $this->str_nome = "Teste";

    $this->arr_detalhe[0] = new teste_filho();
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

		$this->arr_campo[1]["nome"] = "nome";
		$this->arr_campo[1]["tipo"] = "string";
		$this->arr_campo[1]["descricao"] = "Nome";
		$this->arr_campo[1]["valor"] = "";
		$this->arr_campo[1]["requerido"] = "sim";
		$this->arr_campo[1]["editar"] = "sim";
		$this->arr_campo[1]["filtrar"] = "sim";
		$this->arr_campo[0]["consultar"] = "sim";
		$this->arr_campo[1]["cad_tipo_campo"]	= "texto";
		$this->arr_campo[1]["cad_tamanho"]	= 40;

		$this->arr_campo[2]["nome"] = "data_cadastro";
		$this->arr_campo[2]["tipo"] = "date";
		$this->arr_campo[2]["descricao"] = "Data Cadastro";
		$this->arr_campo[2]["valor"] = "";
		$this->arr_campo[2]["requerido"] = "sim";
		$this->arr_campo[2]["editar"] = "sim";
		$this->arr_campo[2]["filtrar"] = "sim";
		$this->arr_campo[0]["consultar"] = "sim";
  	$this->arr_campo[2]["cad_tipo_campo"]	= "data";
  	$this->arr_campo[2]["cad_converte_data"] = "nao";
  	$this->arr_campo[2]["cad_carrega_data"] = "sim";
  }

}
?>