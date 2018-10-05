<?php
class usuario_grupo_entidade extends entidade{

	public function __construct($str_entidade="sys_usuario_grupo",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "usuario/usuario_grupo_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "usuario/usuario_grupo_consulta_filtro.php";
		$this->str_cadastro_arquivo = "usuario/usuario_grupo_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "usuario/usuario_grupo_consulta.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "usuario/usuario_grupo_cadastro_executar.php";
/*

    $this->str_con_descricao = "Descriзгo teste para consulta";
    $this->str_nome = "Teste";
    $this->arr_detalhe[0] = new teste_filho();
*/
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
		$campo->cad_tamanho	= 40;
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
		if ($_SESSION["usuario_grupo_id"] == 1){
  		$campo->cad_tipo_campo	= "checkbox";
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