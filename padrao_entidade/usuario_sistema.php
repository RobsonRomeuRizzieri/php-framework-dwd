<?php
class usuario_sistema extends entidade{

	public function __construct($str_entidade="sys_usuario_sistema",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);

		$this->str_arquivo_filtro = "usuario/usuario_sistema_paginado_item.php";
		$this->str_arquivo_filtro_resultado = "usuario/usuario_sistema_consulta_filtro.php";
		$this->str_cadastro_arquivo = "usuario/usuario_sistema_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "usuario/usuario_sistema_consulta.php";
		$this->str_consulta_arquivo_executar = "usuario/usuario_sistema_consulta_executar.php";
		$this->str_resultado_arquivo = "usuario/usuario_sistema_cadastro_executar.php";

		$this->str_consulta_local = "content";

    $this->str_con_descricao = "Relacionamento usuários com sistemas";
    $this->str_nome = "Sistemas";
    $this->bol_detalhe = true;
    $this->str_campo_ligacao_mestre = "sys_usuario_dwd_id";
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

		$this->arr_campo[1]["nome"] = "sys_usuario_id";
		$this->arr_campo[1]["tipo"] = "integer";
		$this->arr_campo[1]["descricao"] = "Usuário";
		$this->arr_campo[1]["valor"] = "";
		$this->arr_campo[1]["requerido"] = "sim";
		$this->arr_campo[1]["chave"] = "nao";
		$this->arr_campo[1]["filtrar"] = "nao";
		$this->arr_campo[1]["consultar"] = "sim";
		$this->arr_campo[1]["cad_tipo_campo"]	= "oculto";
    $this->arr_campo[1]["con_exibir"] = "nao";//Propriedade controlada internamente na tela de consulta

		$this->arr_campo[2]["nome"] = "sys_sistema_id";
		$this->arr_campo[2]["tipo"] = "integer";
		$this->arr_campo[2]["descricao"] = "Sistema";
		$this->arr_campo[2]["valor"] = "";
		$this->arr_campo[2]["requerido"] = "sim";
		$this->arr_campo[2]["chave"] = "nao";
		$this->arr_campo[2]["filtrar"] = "nao";
		$this->arr_campo[2]["consultar"] = "sim";
		$this->arr_campo[2]["cad_tipo_campo"]	= "combobox_dinamico";
    $this->arr_campo[2]["con_exibir"] = "nao";//Propriedade controlada internamente na tela de consulta
		$this->arr_campo[2]["lookup_tabela"] = "sys_sistema";
		$this->arr_campo[2]["lookup_chave"] = "id";
		$this->arr_campo[2]["lookup_chave_tipo"] = "integer";
		$this->arr_campo[2]["lookup_retorno"] = "nome";
		$this->arr_campo[2]["lookup_retorno_tipo"] = "string";
		$this->arr_campo[2]["cad_tipo_campo"]	= "combobox_dinamico";
		$this->arr_campo[2]["cad_tamanho"]	= 40;

		$this->arr_campo[3]["nome"] = "ativo";
		$this->arr_campo[3]["tipo"] = "integer";
		$this->arr_campo[3]["descricao"] = "Ativo";
		$this->arr_campo[3]["valor"] = "";
		$this->arr_campo[3]["requerido"] = "sim";
		$this->arr_campo[3]["editar"] = "sim";
		$this->arr_campo[3]["filtrar"] = "sim";
		$this->arr_campo[3]["consultar"] = "sim";
		$this->arr_campo[3]["cad_tipo_campo"]	= "checkbox";
		$this->arr_campo[3]["cad_tamanho"]	= 40;

		$this->arr_campo[4]["nome"] = "nome";
		$this->arr_campo[4]["entidade"] = "sys_sistema";
		$this->arr_campo[4]["tipo"] = "string";
		$this->arr_campo[4]["descricao"] = "Sitema";
		$this->arr_campo[4]["valor"] = "";
		$this->arr_campo[4]["requerido"] = "sim";
		$this->arr_campo[4]["editar"] = "sim";
		$this->arr_campo[4]["filtrar"] = "nao";
		$this->arr_campo[4]["consultar"] = "sim";
		$this->arr_campo[4]["cad_tipo_campo"]	= "nao";
		$this->arr_campo[4]["cad_tamanho"]	= 40;

		$this->arr_campo[5]["nome"] = "diretorio_arquivo";
		$this->arr_campo[5]["entidade"] = "sys_sistema";
		$this->arr_campo[5]["tipo"] = "string";
		$this->arr_campo[5]["descricao"] = "Arquivo Diretório";
		$this->arr_campo[5]["valor"] = "";
		$this->arr_campo[5]["requerido"] = "sim";
		$this->arr_campo[5]["editar"] = "sim";
		$this->arr_campo[5]["filtrar"] = "nao";
		$this->arr_campo[5]["consultar"] = "sim";
		$this->arr_campo[5]["cad_tipo_campo"]	= "nao";
		$this->arr_campo[5]["cad_tamanho"]	= 40;
    $this->arr_campo[5]["con_exibir"] = "nao";//Propriedade controlada internamente na tela de consulta

		$this->arr_campo[6]["nome"] = "banco_dados";
		$this->arr_campo[6]["entidade"] = "sys_sistema";
		$this->arr_campo[6]["tipo"] = "string";
		$this->arr_campo[6]["descricao"] = "Banco de Dados";
		$this->arr_campo[6]["valor"] = "";
		$this->arr_campo[6]["requerido"] = "sim";
		$this->arr_campo[6]["editar"] = "sim";
		$this->arr_campo[6]["filtrar"] = "nao";
		$this->arr_campo[6]["consultar"] = "sim";
		$this->arr_campo[6]["cad_tipo_campo"]	= "nao";
		$this->arr_campo[6]["cad_tamanho"]	= 40;
    $this->arr_campo[6]["con_exibir"] = "nao";//Propriedade controlada internamente na tela de consulta

		$this->arr_campo[7]["nome"] = "banco_usuario";
		$this->arr_campo[7]["entidade"] = "sys_sistema";
		$this->arr_campo[7]["tipo"] = "string";
		$this->arr_campo[7]["descricao"] = "Usuário";
		$this->arr_campo[7]["valor"] = "";
		$this->arr_campo[7]["requerido"] = "sim";
		$this->arr_campo[7]["editar"] = "sim";
		$this->arr_campo[7]["filtrar"] = "nao";
		$this->arr_campo[7]["consultar"] = "sim";
		$this->arr_campo[7]["cad_tipo_campo"]	= "nao";
		$this->arr_campo[7]["cad_tamanho"]	= 40;
    $this->arr_campo[7]["con_exibir"] = "nao";//Propriedade controlada internamente na tela de consulta

  }

	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=",sys_sistema"){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}
}
?>