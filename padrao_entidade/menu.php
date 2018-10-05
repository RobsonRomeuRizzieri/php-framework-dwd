<?php
class menu extends entidade{
  private $bol_consultar;
  public $bol_verificar_senha;

	public function __construct($str_entidade="sys_menu",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "menu/menu_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "menu/menu_consulta_filtro.php";
		$this->str_cadastro_arquivo = "menu/menu_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "menu/menu_consulta.php";
		$this->str_consulta_arquivo_executar = "menu/menu_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "menu/menu_cadastro_executar.php";

    $this->str_con_descricao = "Manutenção dos menus";
    $this->str_nome = "Menus";
    $this->definir_campos();
  }

	private function definir_campos(){		$campo = new entidade_campo();
		$campo->nome = "id";
		$campo->tipo = "auto_inc";
		$campo->descricao = "Código";
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
		$campo->nome = "nome_completo";
		$campo->tipo = "string";
		$campo->descricao = "Nome Completo";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "texto";
		$campo->cad_tamanho	= 80;
 		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "arquivo";
		$campo->tipo = "string";
		$campo->descricao = "Arquivo";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->cad_tipo_campo	= "texto";
		$campo->cad_tamanho	= 80;
 		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "sys_menu_id";
		$campo->tipo = "integer";
		$campo->descricao = "Código Menu Pai";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->lookup_tabela = "sys_menu";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "nome_completo";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "sys_tabela_id";
		$campo->tipo = "integer";
		$campo->descricao = "Código da tabela";
		$campo->valor = "Ron";
		$campo->valor_chave = "gra";
		$campo->valor_resultado = "Gravar novo";
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
		$campo->cad_tamanho	= 10;
		$campo->cad_tamanho_resultado	= 40;
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

		$campo = new entidade_campo();
		$campo->nome = "usuario_controla";
		$campo->tipo = "integer";
		$campo->descricao = "Usuário Controla";
		$campo->descricao_complemento = "Define se o registro pode ser controlado pelo usuário";
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
		$campo->descricao_complemento = "Define se o registro pode ser usado ou não";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->entidade = "sys_menu";
		$campo->tipo = "string";
		$campo->descricao = "Menu Pai";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "nome_cientifico";
		$campo->entidade = "sys_tabela";
		$campo->bol_left = "nao";
		$campo->tipo = "string";
		$campo->descricao = "Nome Tabela Cientifica";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->con_exibir = "nao";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

  public function menu_criar($int_menu_grupo=0,$str_nivel=""){
  	$this->arr_filtro[0]["condicao"] = "Robson";
  	$this->arr_filtro[0]["nome"] = "ativo";
  	$this->arr_filtro[0]["tipo"] = "integer";
  	$this->arr_filtro[0]["operacao"] = "=";
  	$this->arr_filtro[0]["valor"] = 1;

    if ($int_menu_grupo > 0){	  	$this->arr_filtro[1]["condicao"] = "and";
	  	$this->arr_filtro[1]["entidade"] = "sys_menu";
	  	$this->arr_filtro[1]["nome"] = "sys_menu_id";
	  	$this->arr_filtro[1]["tipo"] = "integer";
	  	$this->arr_filtro[1]["operacao"] = "=";
	  	$this->arr_filtro[1]["valor"] = $int_menu_grupo;
    }else if ($int_menu_grupo == 0){	  	$this->arr_filtro[1]["condicao"] = "and";
	  	$this->arr_filtro[1]["entidade"] = "sys_menu";
	  	$this->arr_filtro[1]["nome"] = "sys_menu_id";
	  	$this->arr_filtro[1]["tipo"] = "integer";
	  	$this->arr_filtro[1]["operacao"] = "=";
	  	$this->arr_filtro[1]["valor"] = "0";
    }
    //$this->bol_exibir_sql = true;
    $matriz = $this->consultar();
		//Se encontrar registro na matriz
		if (!empty($matriz)){
	    $obj_acesso = new tabela_acesso(false);
			//Percore todos os registros da matriz
			foreach($matriz as $row){
        //Cria o nivel principal do menu (GRUPO)
        if ($str_nivel == ""){
?>        a = trv.add('<?php echo $row["nome"]?>','<?php echo $_SESSSION["projeto"].$row["arquivo"]?>','principal', null);
<?php
          $this->menu_criar($row["id"],"a");
        }
        //Cria o nivel secundario do menu (SUB-GRUPO)
        if ($str_nivel == "a"){        	if ($row["id"] == 4){?>        b = trv.add('<?php echo $row["nome"]?>','<?php echo $_SESSSION["projeto"].$row["arquivo"]."=".$_SESSION["usuario_id"]?>','principal', a);
<?php
        	}else{?>        b = trv.add('<?php echo $row["nome"]?>','<?php echo $_SESSSION["projeto"].$row["arquivo"]?>','principal', a);
<?php     }        	$this->menu_criar($row["id"],"b");
        }
        //Cria o nivel final do menu (Ultimo nível dos menus)
        if ($str_nivel == "b"){			    $obj_acesso->verificar_acesso($row["nome_cientifico_sys_tabela"],$_SESSION["usuario_grupo_id"]);
			    $this->bol_consultar = $obj_acesso->bol_consultar;
	        //$this->bol_exibir_sql = true;
			    //$this->bol_consultar = true;
          if ($this->bol_consultar){?>          c = trv.add('<?php echo $row["nome"]?>','<?php echo $_SESSSION["projeto"].$row["arquivo"]?>','principal', b);
<?php     }
        }
			}
    }

  }

}
?>