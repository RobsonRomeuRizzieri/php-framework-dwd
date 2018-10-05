<?php
class menu_rapido extends entidade{
  public $bol_verificar_senha;

	public function __construct($str_entidade="sys_menu_rapido",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		$this->str_arquivo_filtro = "menu/menu_rapido_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "menu/menu_rapido_consulta_filtro.php";
		$this->str_cadastro_arquivo = "menu/menu_rapido_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "menu/menu_rapido_consulta.php";
		$this->str_consulta_arquivo_executar = "menu/menu_rapido_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "menu/menu_rapido_cadastro_executar.php";

    $this->str_con_descricao = "Manutenção dos menus rapidos";
    $this->str_nome = "Menus Rapidos";
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
		$campo->nome = "descricao_hint";
		$campo->tipo = "string";
		$campo->descricao = "Hint";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "texto";
		$campo->cad_tamanho	= 80;
 		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "sys_menu_id";
		$campo->tipo = "integer";
		$campo->descricao = "Código Menu";
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
		$arr[0]["condicao"] = "Robosn";
    $arr[0]["nome"] = "sys_menu.arquivo";
    $arr[0]["tipo"] = "string";
    $arr[0]["operacao"] = "<>";
    $arr[0]["valor"] = " ";
    $arr[0]["valor2"] = "";
    $obj_acesso = new tabela_acesso(false);
    $str_int = $obj_acesso->verificar_acesso_geral($_SESSION["usuario_grupo_id"]);
//    echo $str_int;
		if ($_SESSION["usuario_grupo_id"] != 1){
			$arr[1]["condicao"] = "and";
	    $arr[1]["nome"] = "usuario_controla";
	    $arr[1]["tipo"] = "integer";
	    $arr[1]["operacao"] = "=";
	    $arr[1]["valor"] = "1";
	    $arr[1]["valor2"] = "";

			$arr[2]["condicao"] = "and";
	    $arr[2]["nome"] = "sys_tabela_id";
	    $arr[2]["tipo"] = "integer";
	    $arr[2]["operacao"] = "in";
	    $arr[2]["valor"] = "(".$str_int.")";
	    $arr[2]["valor2"] = "";

	  }else{
			$arr[1]["condicao"] = "and";
	    $arr[1]["nome"] = "sys_tabela_id";
	    $arr[1]["tipo"] = "integer";
	    $arr[1]["operacao"] = "in";
	    $arr[1]["valor"] = "(".$str_int.")";
	    $arr[1]["valor2"] = "";

	  }
		$campo->arr_filtro = $arr;
    $this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "imagem";
		$campo->tipo = "string";
		$campo->descricao = "Imagem";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->str_tipo_arquivo = ".png";
		$campo->str_pasta_principal = "img/menu";
		$campo->cad_tipo_campo	= "texto_arquivo";
		$campo->cad_tamanho	= 80;
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
		$campo->descricao = "Menu";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "sys_usuario_id";
		$campo->tipo = "integer";
		$campo->descricao = "Código usuário";
		$campo->valor = $_SESSION["usuario_id"];
		$campo->requerido = "sim";
		$campo->chave = "nao";
		$campo->filtrar = "nao";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "oculto";
		$campo->con_exibir = "nao";
		$this->adicionar_campo($campo);

		$campo = new entidade_campo();
		$campo->nome = "arquivo";
		$campo->entidade = "sys_menu";
		$campo->bol_left = "nao";
		$campo->tipo = "string";
		$campo->descricao = "Menu";
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

  public function criar(){
  	$this->arr_filtro[0]["condicao"] = "Robson";
  	$this->arr_filtro[0]["nome"] = "ativo";
  	$this->arr_filtro[0]["tipo"] = "integer";
  	$this->arr_filtro[0]["operacao"] = "=";
  	$this->arr_filtro[0]["valor"] = 1;

		$this->arr_filtro[1]["condicao"] = "and";
  	$this->arr_filtro[1]["nome"] = "sys_usuario_id";
  	$this->arr_filtro[1]["tipo"] = "integer";
  	$this->arr_filtro[1]["operacao"] = "=";
  	$this->arr_filtro[1]["valor"] = $_SESSION["usuario_id"];

    $matriz = $this->consultar();
		//Se encontrar registro na matriz
		if (!empty($matriz)){
?>    <div class="dock" id="dock2">
	  	  <div class="dock-container2">
<?php
			//Percore todos os registros da matriz
			foreach($matriz as $row){
?>    	<a class="dock-item2" onClick="createNewTab('dhtmlgoodies_tabView2','<?php echo $row["nome"]?>','','<?php echo $row["arquivo_sys_menu"]?>',true);"><img src="<?php echo $row["imagem"]?>" alt="<?php echo $row["descricao_hint"]?>" style="cursor:pointer;"/><span><?php echo $row["nome"]?></span></a>
<?php
			}
?>		  </div>
      </div>
<?php
    }
  }
}
?>