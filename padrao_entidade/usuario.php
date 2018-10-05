<?php
class usuario extends entidade{
  public $bol_verificar_senha;

	public function __construct($str_entidade="sys_usuario",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "usuario/usuario_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "usuario/usuario_consulta_filtro.php";
		$this->str_cadastro_arquivo = "usuario/usuario_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "usuario/usuario_consulta.php";
		$this->str_consulta_arquivo_executar = "usuario/usuario_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "usuario/usuario_cadastro_executar.php";

    $this->str_con_descricao = "Manutenção dos usuários";
    $this->str_nome = "Usuários";
    $this->arr_detalhe[0] = new usuario_empresa();
    $this->arr_detalhe[1] = new usuario_sistema();
    $this->definir_campos();
    $this->bol_verificar_senha = true;
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

		$this->arr_campo[1]["nome"] = "login";
		$this->arr_campo[1]["tipo"] = "string";
		$this->arr_campo[1]["descricao"] = "Login";
		$this->arr_campo[1]["valor"] = "";
		$this->arr_campo[1]["requerido"] = "sim";
		$this->arr_campo[1]["editar"] = "sim";
		$this->arr_campo[1]["filtrar"] = "sim";
		$this->arr_campo[1]["consultar"] = "sim";
		$this->arr_campo[1]["cad_tipo_campo"]	= "texto";
		$this->arr_campo[1]["cad_tamanho"]	= 40;

		$this->arr_campo[2]["nome"] = "senha";
		$this->arr_campo[2]["tipo"] = "string";
		$this->arr_campo[2]["descricao"] = "Senha";
		$this->arr_campo[2]["valor"] = "";
		$this->arr_campo[2]["requerido"] = "sim";
		$this->arr_campo[2]["editar"] = "sim";
		$this->arr_campo[2]["filtrar"] = "sim";
		$this->arr_campo[2]["consultar"] = "sim";
		$this->arr_campo[2]["con_exibir"] = "nao";
		$this->arr_campo[2]["cad_tipo_campo"]	= "senha";
		$this->arr_campo[2]["cad_tamanho"]	= 40;

		$this->arr_campo[3]["nome"] = "senha_confirmar";
		$this->arr_campo[3]["tipo"] = "string";
		$this->arr_campo[3]["descricao"] = "Senha Confirmar";
		$this->arr_campo[3]["valor"] = "";
		$this->arr_campo[3]["requerido"] = "sim";
		$this->arr_campo[3]["editar"] = "nao";
  	$this->arr_campo[3]["inserir"] = "nao";
		$this->arr_campo[3]["filtrar"] = "sim";
		$this->arr_campo[3]["consultar"] = "nao";
		$this->arr_campo[3]["con_exibir"] = "nao";
		$this->arr_campo[3]["cad_tipo_campo"]	= "senha";
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

		$this->arr_campo[5]["nome"] = "data_expiracao";
		$this->arr_campo[5]["tipo"] = "date";
		$this->arr_campo[5]["descricao"] = "Data Expiracao";
		$this->arr_campo[5]["valor"] = "";
		$this->arr_campo[5]["requerido"] = "sim";
		$this->arr_campo[5]["editar"] = "sim";
		$this->arr_campo[5]["filtrar"] = "sim";
		$this->arr_campo[5]["consultar"] = "sim";
  	$this->arr_campo[5]["cad_tipo_campo"]	= "data";
  	$this->arr_campo[5]["cad_converte_data"] = "nao";
  	$this->arr_campo[5]["cad_carrega_data"] = "sim";

		$this->arr_campo[6]["nome"] = "sys_usuario_grupo_id";
		$this->arr_campo[6]["tipo"] = "integer";
		$this->arr_campo[6]["descricao"] = "Grupo de Usuário";
		$this->arr_campo[6]["valor"] = "";
		$this->arr_campo[6]["requerido"] = "sim";
		$this->arr_campo[6]["editar"] = "sim";
		$this->arr_campo[6]["filtrar"] = "sim";
		$this->arr_campo[6]["consultar"] = "sim";
		$this->arr_campo[6]["con_exibir"] = "nao";
		$this->arr_campo[6]["lookup_tabela"] = "sys_usuario_grupo";
		$this->arr_campo[6]["lookup_chave"] = "id";
		$this->arr_campo[6]["lookup_chave_tipo"] = "integer";
		$this->arr_campo[6]["lookup_retorno"] = "nome";
		$this->arr_campo[6]["lookup_retorno_tipo"] = "string";
		$this->arr_campo[6]["cad_tipo_campo"]	= "combobox_dinamico";
		$this->arr_campo[6]["cad_tamanho"]	= 40;

		$this->arr_campo[7]["nome"] = "nome";
		$this->arr_campo[7]["entidade"] = "sys_usuario_grupo";
		$this->arr_campo[7]["tipo"] = "string";
		$this->arr_campo[7]["descricao"] = "Grupo de Usuário Nome";
		$this->arr_campo[7]["valor"] = "";
		$this->arr_campo[7]["requerido"] = "sim";
		$this->arr_campo[7]["editar"] = "sim";
		$this->arr_campo[7]["filtrar"] = "sim";
		$this->arr_campo[7]["consultar"] = "sim";
		$this->arr_campo[7]["cad_tipo_campo"]	= "nao";
		$this->arr_campo[7]["cad_tamanho"]	= 40;

  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=",sys_usuario_grupo"){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

	public function editar($str_sql=""){		$bol_executar_operacao = true;		if ($this->bol_verificar_senha) {
		  if (($this->arr_campo[2]["valor"] == "") && ($this->arr_campo[3]["valor"] == "")){		  	echo "Deve ser informada a nova senha.";
  		  $bol_executar_operacao = false;
		  }			if ($this->arr_campo[2]["valor"] != $this->arr_campo[3]["valor"]){			   echo " Valor informado no campo \"<strong>Senha Confirmar</strong>\" é diferente do valor informado no campo \"<strong>Senha</strong>\".";
			   $bol_executar_operacao = false;
			}
		}
		if ($bol_executar_operacao){
			$this->arr_campo[2]["valor"] = md5(trim($this->arr_campo[2]["valor"]));
			parent::editar($str_sql);
	  }
	  return $bol_executar_operacao;
	}
	public function inserir($str_sql=""){		$bol_executar_operacao = true;
		if ($this->bol_verificar_senha) {
			if ($this->arr_campo[2]["valor"] != $this->arr_campo[3]["valor"]){
			   echo " Valor informado no campo \"<strong>Senha Confirmar</strong>\" é diferente do valor informado no campo \"<strong>Senha</strong>\".";
				$bol_executar_operacao = false;
			}
		}
		if ($bol_executar_operacao){
  		$this->arr_campo[2]["valor"] = md5(trim($this->arr_campo[2]["valor"]));
	  	parent::inserir($str_sql);
	  }
	  return $bol_executar_operacao;
	}

	public function usuario_validar(){

    $this->arr_filtro[1]["valor"] = md5(trim($this->arr_filtro[1]["valor"]));
    $obj_data = new data_definicao();
    $matriz = $this->consultar();
		//Se encontrar registro na matriz
		if (!empty($matriz)){
			//Percore todos os registros da matriz
			foreach($matriz as $row){
       	$this->arr_campo[0]["valor"] = $row["id"];
				$this->arr_campo[1]["valor"] = $row["login"];
        $this->arr_campo[5]["valor"] = $row["sys_usuario_grupo_id"];
		    $this->arr_campo[3]["valor"] = $row["ativo"];
				$this->arr_campo[4]["valor"] = $obj_data->wd_obter($row["data_expiracao"],$this->str_banco_tipo);
			}


			$obj_grupo_usuario = new usuario_grupo();
			$obj_grupo_usuario->arr_filtro[0]["condicao"] = "Robson";
			$obj_grupo_usuario->arr_filtro[0]["nome"] = "id";
			$obj_grupo_usuario->arr_filtro[0]["tipo"] = "integer";
			$obj_grupo_usuario->arr_filtro[0]["operacao"] = "=";
			$obj_grupo_usuario->arr_filtro[0]["valor"] = $this->arr_campo[5]["valor"];

	   	$matriz = $obj_grupo_usuario->consultar();
			//Se encontrar registro na matriz
			if (!empty($matriz)){
				//Percore todos os registros da matriz
				foreach($matriz as $row){
	          $this->arr_campo[6]["valor"] = $row["nome"];
				}
			}

			if (($this->arr_campo[4]["valor"] == "00/00/0000") ||
			    ($obj_data->verifica_data_maior($this->arr_campo[4]["valor"],date('d/m/Y')))){
			  if ($this->arr_campo[3]["valor"] == 1){
			    $_SESSION["usuario_id"] = $this->arr_campo[0]["valor"];
			    $_SESSION["usuario_login"] = $this->arr_campo[1]["valor"];
			    $_SESSION["usuario_grupo_id"] = $this->arr_campo[5]["valor"];
			    $_SESSION["usuario_grupo_nome"] = $this->arr_campo[6]["valor"];
  			  return true;
  			}else{
  			  return false;
  			}
			}else{
			  return false;
			}
		}else{
		  return false;
		}
 	}
  public function buscar_sistema($int_sistema_id){

  }

 	public function definir_sistema($int_usuario_id,$int_sistema_id=0){		$obj = new usuario_sistema();
		$obj->arr_filtro[0]["condicao"] = "Robson";
		$obj->arr_filtro[0]["nome"] = "sys_usuario_id";
		$obj->arr_filtro[0]["tipo"] = "integer";
		$obj->arr_filtro[0]["operacao"] = "=";
		$obj->arr_filtro[0]["valor"] = $int_usuario_id;

		$obj->arr_filtro[1]["condicao"] = "and";
		$obj->arr_filtro[1]["nome"] = "ativo";
		$obj->arr_filtro[1]["tipo"] = "integer";
		$obj->arr_filtro[1]["operacao"] = "=";
		$obj->arr_filtro[1]["valor"] = 1;

    if ($int_sistema_id > 0){
			$obj->arr_filtro[2]["condicao"] = "and";
			$obj->arr_filtro[2]["nome"] = "sys_sistema_id";
			$obj->arr_filtro[2]["tipo"] = "integer";
			$obj->arr_filtro[2]["operacao"] = "=";
			$obj->arr_filtro[2]["valor"] = $int_sistema_id;
	  }

   	$matriz = $obj->consultar();
    return $matriz;
 	}

 	public function definir_empresa($int_usuario_id,$int_empresa_id=0){
		$obj = new usuario_empresa();
		$obj->arr_filtro[0]["condicao"] = "Robson";
		$obj->arr_filtro[0]["nome"] = "sys_usuario_id";
		$obj->arr_filtro[0]["tipo"] = "integer";
		$obj->arr_filtro[0]["operacao"] = "=";
		$obj->arr_filtro[0]["valor"] = $int_usuario_id;

		$obj->arr_filtro[1]["condicao"] = "and";
		$obj->arr_filtro[1]["nome"] = "ativo";
		$obj->arr_filtro[1]["tipo"] = "integer";
		$obj->arr_filtro[1]["operacao"] = "=";
		$obj->arr_filtro[1]["valor"] = 1;

		if ($int_empresa_id > 0){
			$obj->arr_filtro[2]["condicao"] = "and";
			$obj->arr_filtro[2]["nome"] = "sys_empresa_id";
			$obj->arr_filtro[2]["tipo"] = "integer";
			$obj->arr_filtro[2]["operacao"] = "=";
			$obj->arr_filtro[2]["valor"] = $int_empresa_id;
    }

   	$matriz = $obj->consultar();
    return $matriz;
 	}

 	public function definir_filial($int_usuario_empresa_id,$int_filial_id=0){
		$obj = new usuario_filial();
		$obj->arr_filtro[0]["condicao"] = "Robson";
		$obj->arr_filtro[0]["nome"] = "sys_usuario_empresa_id";
		$obj->arr_filtro[0]["tipo"] = "integer";
		$obj->arr_filtro[0]["operacao"] = "=";
		$obj->arr_filtro[0]["valor"] = $int_usuario_empresa_id;

		$obj->arr_filtro[1]["condicao"] = "and";
		$obj->arr_filtro[1]["nome"] = "ativo";
		$obj->arr_filtro[1]["tipo"] = "integer";
		$obj->arr_filtro[1]["operacao"] = "=";
		$obj->arr_filtro[1]["valor"] = 1;

		if ($int_filial_id > 0){
			$obj->arr_filtro[2]["condicao"] = "and";
			$obj->arr_filtro[2]["nome"] = "sys_filial_id";
			$obj->arr_filtro[2]["tipo"] = "integer";
			$obj->arr_filtro[2]["operacao"] = "=";
			$obj->arr_filtro[2]["valor"] = $int_filial_id;
    }
   	$matriz = $obj->consultar();
    return $matriz;
 	}

}
?>