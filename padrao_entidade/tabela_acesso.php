<?php
class tabela_acesso extends entidade{
  public $bol_verificar_senha;
  public $bol_novo;
  public $bol_editar;
  public $bol_consultar;
  public $bol_excluir;

	public function __construct($bol_instanciar_detalhe=true,$str_entidade="sys_tabela_acesso",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "tabela/tabela_acesso_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "tabela/tabela_acesso_consulta_filtro.php";
		$this->str_cadastro_arquivo = "tabela/tabela_acesso_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "tabela/tabela_acesso_consulta.php";
		$this->str_consulta_arquivo_executar = "tabela/tabela_acesso_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "tabela/tabela_acesso_cadastro_executar.php";

    $this->arr_menu_dinamico[0]["nome"] = "Copiar Acesso";
    $this->arr_menu_dinamico[0]["nome_cientifico"] = "copiar_acesso";
    $this->arr_menu_dinamico[0]["arquivo"] = "tabela/tabela_copiar_acesso.php";

   	$this->bol_novo = false;
   	$this->bol_editar = false;
   	$this->bol_consultar = false;
   	//$this->bol_gravar = $row["novo"];
   	$this->bol_excluir = false;

    $this->str_con_descricao = "Manutenзгo das tabelas";
    $this->str_nome = "Tabelas";
//    if ($bol_instanciar_detalhe){
//      $this->arr_detalhe[0] = new tabela_campo();
//    }
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
		$campo->nome = "sys_usuario_grupo_id";
		$campo->tipo = "integer";
		$campo->descricao = "Grupo de usuario";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->lookup_tabela = "sys_usuario_grupo";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "nome";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		if ($_SESSION["usuario_grupo_id"] != 1){
			$arr[0]["condicao"] = "Robosn";
	    $arr[0]["nome"] = "usuario_controla";
	    $arr[0]["tipo"] = "integer";
	    $arr[0]["operacao"] = "=";
	    $arr[0]["valor"] = "1";
	    $arr[0]["valor2"] = "";
			$campo->arr_filtro = $arr;
	  }
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->entidade = "sys_usuario_grupo";
		$campo->tipo = "string";
		$campo->descricao = "Grupo de usuario nome";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "consulta";
		$campo->tipo = "integer";
		$campo->descricao = "Consultar";
		$campo->descricao_complemento = "Define se o registro pode ser consultado";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "editar";
		$campo->tipo = "integer";
		$campo->descricao = "Editar";
		$campo->descricao_complemento = "Define se o registro pode ser editado";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "excluir";
		$campo->tipo = "integer";
		$campo->descricao = "Excluir";
		$campo->descricao_complemento = "Define se o registro pode ser excluido";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "novo";
		$campo->tipo = "integer";
		$campo->descricao = "Novo";
		$campo->descricao_complemento = "Define se pode criar um novo registro";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "sys_tabela_id";
		$campo->tipo = "integer";
		$campo->descricao = "Cуdigo da tabela";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->lookup_tabela = "sys_tabela";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "nome";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		if ($_SESSION["usuario_grupo_id"] != 1){
			$arr[0]["condicao"] = "Robosn";
	    $arr[0]["nome"] = "usuario_controla";
	    $arr[0]["tipo"] = "integer";
	    $arr[0]["operacao"] = "=";
	    $arr[0]["valor"] = "1";
	    $arr[0]["valor2"] = "";
			$campo->arr_filtro = $arr;
	  }
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->entidade = "sys_tabela";
		$campo->tipo = "string";
		$campo->descricao = "Tabela";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

  public function verificar_acesso($str_tabela="",$int_usuario_grupo=""){
  	$this->arr_filtro[0]["condicao"] = "Robson";
  	$this->arr_filtro[0]["entidade"] = "sys_tabela";
  	$this->arr_filtro[0]["nome"] = "nome_cientifico";
  	$this->arr_filtro[0]["tipo"] = "string";
  	$this->arr_filtro[0]["operacao"] = "=";
  	$this->arr_filtro[0]["valor"] = $str_tabela;

  	$this->arr_filtro[1]["condicao"] = "and";
  	$this->arr_filtro[1]["nome"] = "sys_usuario_grupo_id";
  	$this->arr_filtro[1]["tipo"] = "integer";
  	$this->arr_filtro[1]["operacao"] = "=";
  	$this->arr_filtro[1]["valor"] = $int_usuario_grupo;
    $matriz = $this->consultar();
		//Se encontrar registro na matriz
		if (!empty($matriz)){
			//Percore todos os registros da matriz
			foreach($matriz as $row){
       	$this->bol_novo = $row["novo"];
       	$this->bol_editar = $row["editar"];
       	$this->bol_consultar = $row["consulta"];
       	//$this->bol_gravar = $row["novo"];
       	$this->bol_excluir = $row["excluir"];
			}
    }
  }

  public function verificar_acesso_geral($int_usuario_grupo=""){

  	$this->arr_filtro[0]["condicao"] = "and";
  	$this->arr_filtro[0]["nome"] = "sys_usuario_grupo_id";
  	$this->arr_filtro[0]["tipo"] = "integer";
  	$this->arr_filtro[0]["operacao"] = "=";
  	$this->arr_filtro[0]["valor"] = $int_usuario_grupo;

    $matriz = $this->consultar();
		//Se encontrar registro na matriz
		if (!empty($matriz)){			$int_cont = 0;
			//Percore todos os registros da matriz
			foreach($matriz as $row){				$int_cont++;
       	if ($row["consulta"] == 1){          if ($int_cont == 1){            $str_int = $row["sys_tabela_id"];
          }else{          	$str_int .= ",".$row["sys_tabela_id"];
          }
       	}
			}
    }
    return $str_int;
  }

}
?>