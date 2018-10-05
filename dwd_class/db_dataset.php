<?php
class db_dataset{
	protected $obj_conexao;
	protected $str_banco_tipo;
	protected $str_servidor;
	protected $str_banco;
	protected $str_usuario;
	protected $str_senha;
  protected $str_porta;

	public $str_sql;
	public $int_total_registros;
	public $bol_sql_inserir_exibir;
	public $bol_sql_consultar_exibir;
	public $bol_sql_editar_exibir;
	public $bol_sql_excluir_exibir;
	public $bol_sql_executar_exibir;
	public $bol_maiusculo_minusculo;
  public $bol_maiusculo_minusculo_original;
  public $inc_antes_de_inserir;
  public $inc_depois_de_inserir;
  public $inc_antes_de_editar;
  public $inc_depois_de_editar;
  public $inc_antes_de_excluir;
  public $inc_depois_de_excluir;
  public $inc_antes_de_consultar;
  public $inc_depois_de_consultar;
  public $inc_antes_de_executar_sql;
  public $inc_depois_de_executar_sql;
  public $frm_str_nome;
  //B - banco, P - Pesquisa consulta, C - Cadastro, R_- Relatѓrio, F - Formulсrio vale para consulta cadastro, G - Geral vale para todos
	//Conforme valor definido no momento da criaчуo determina tipo e qual o banco que vai ser conectado.
	function __construct($str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false){

    $this->str_servidor 										= $str_servidor;
		$this->str_banco 												= $str_banco;
    $this->str_usuario											= $str_usuario;
    $this->str_senha 												= $str_senha;
    $this->str_porta 												= $str_porta;
    $this->bol_sql_exibir 									= $bol_sql_exibir;
 		$this->bol_sql_executar_exibir 					= $bol_sql_exibir;
    $this->bol_maiusculo_minusculo_original = true;
   	$this->bol_sql_consultar_exibir 				= $bol_sql_exibir;
    $this->bol_sql_editar_exibir 						= $bol_sql_exibir;
    $this->bol_sql_inserir_exibir 					= $bol_sql_exibir;
    $this->bol_sql_excluir_exibir 					= $bol_sql_exibir;
    $this->str_banco_tipo 									= $str_banco_tipo;

    $this->definir_nome_frm($_GET["dwd_tab"]);

		//Se nуo for definido tipo do banco
		if ($this->str_banco_tipo == ""){
			//Define como padrуo banco de dados MySQL
		  $this->str_banco_tipo = "MySQL";
		}
  	//se o tipo do banco for igual
		if ($this->str_banco_tipo == "MySQL"){
			//Cria um objeto de conexуo com o banco de dados MySQL
			$this->obj_conexao = new db_conexao_mysql();
		//Se nуo for MySQL mas for SQLServer
		}else if ($this->str_banco_tipo == "SQLServer"){
			  //Cria a conexуo para o banco de dados SQLServer
			  $this->obj_conexao = new db_conexao_sqlserver();
			 //Se nуo for MySQL e nem SQLServer for Postgrees
			}else if ($this->str_banco_tipo == "Postgrees"){
			  //Monta a conexуo com o banco de dados Postgreess
				$this->obj_conexao = new db_conexao_postgrees();
			}
		//Se o tipo do banco for igual a outros, deve ser criada a condiчуo

	  //Define o servidor
    $this->obj_conexao->str_servidor 	= $str_servidor;
    //DEfine o banco de dados
    $this->obj_conexao->str_banco 		= $str_banco;
    //Define o usuсrio
    $this->obj_conexao->str_usuario 	= $str_usuario;
    //Define senha
    $this->obj_conexao->str_senha 		= $str_senha;
    //Define porta de conexуo com o banco
    $this->obj_conexao->str_porta 		= $str_porta;
    //Cria a conexуo
    $this->obj_conexao->criar();
	}

	// Executa o SQL definido no parametro do mщtodo.
	public function inserir($str_sql=""){
    //Define se o SQL deve ser executa em maiusculo, minusculo ou na sua forma original
    $this->texto_maiusculo_minusculo_original();
    //Define se deve exibir o SQL
 	  $this->obj_conexao->bol_sql_exibir = $this->bol_sql_inserir_exibir;
 	  //Define cѓdigo para executar antes de inserir
	  $this->antes_de_inserir();
	  //Se nуo foi definido SQL no Parametro
	  if ($str_sql != ""){
	  	//define na propridade sql da entidade dataset
	  	$this->str_sql = $str_sql;
  	}
		//Executa o SQL na conexуo realizada
  	$this->obj_conexao->sql_executar($this->str_sql);
	  //Define cѓdigo para executar depois de inserir
	  $this->depois_de_inserir();

	}
	// Executa metodo de consulta dos registros,
	public function consultar($str_sql=""){
    //Define se o SQL deve ser executa em maiusculo, minusculo ou na sua forma original
    $this->texto_maiusculo_minusculo_original();
    //Define cѓdigo a ser executado antes de consultar
    $this->antes_de_consultar();
    //Define se deve exibir o SQL
    $this->obj_conexao->bol_sql_exibir = $this->bol_sql_consultar_exibir;
	  //Se nуo foi definido SQL no Parametro
	  if ($str_sql != ""){
	  	//define na propridade sql da entidade dataset
	  	$this->str_sql = $str_sql;
  	}
  	//Recebe o valor do array associativo da consulta
    $matriz = $this->obj_conexao->sql_consultar($this->str_sql);
  	//Define quantos registros foram afetados pelo SQL
  	$this->int_total_registros = $this->obj_conexao->total_registros();
    //Executado metodo depois de realizar a consulta
    $this->depois_de_consultar();
    //Retorna o array associativo
    return $matriz;
	}

	// Executa metodo de alteraчуo dos registros,
	public function editar($str_sql=""){
    //Define se o SQL deve ser executa em maiusculo, minusculo ou na sua forma original
    $this->texto_maiusculo_minusculo_original();
    //Define se deve exibir o SQL
    $this->obj_conexao->bol_sql_exibir = $this->bol_sql_editar_exibir;
    //Executa metodo antes de realizar a consulta
    $this->antes_de_editar();
	  //Se nуo foi definido SQL no Parametro
	  if ($str_sql != ""){
	  	//define na propridade sql da entidade dataset
	  	$this->str_sql = $str_sql;
  	}
	  //Executa o SQL na conexуo realizada
	  $this->obj_conexao->sql_executar($this->str_sql);
	  //Executa depois de executar o sql de ediчуo
	  $this->depois_de_editar();
	}

	//Executa metodo de exclusуo dos registros,
	public function excluir($str_sql=""){
    //Define se o SQL deve ser executa em maiusculo, minusculo ou na sua forma original
    $this->texto_maiusculo_minusculo_original();
    //Define se deve exibir o SQL
    $this->obj_conexao->bol_sql_exibir = $this->bol_sql_excluir_exibir;
    //Executa o cѓdigo antes de excluir o registro
    $this->antes_de_excluir();
	  //Se nуo foi definido SQL no Parametro
	  if ($str_sql != ""){
	  	//define na propridade sql da entidade dataset
	  	$this->str_sql = $str_sql;
  	}
		//Executa o SQL na conexуo realizada
	  $this->obj_conexao->sql_executar($this->str_sql);
	  //Executado depois de executar o cѓdigo de inserчуo do registro
	  $this->depois_de_excluir();
	}

	// Executa metodo de execuчуo de qualquer SQL, menos de consulta
	public function executar_sql($str_sql="",$bol_retorna_matriz=false){
    //Define se o SQL deve ser executa em maiusculo, minusculo ou na sua forma original
    $this->texto_maiusculo_minusculo_original();
    //Define se deve exibir o SQL
    $this->obj_conexao->bol_sql_exibir = $this->bol_sql_executar_exibir;
    //Executado antes de executar o SQL
		$this->antes_de_executar_sql();
	  //Se nуo foi definido SQL no Parametro
	  if ($str_sql != ""){
	  	//define na propridade sql da entidade dataset
	  	$this->str_sql = $str_sql;
  	}
  	//Se nуo for definido para retornar valor
  	if (!$bol_retorna_matriz){
	    //Executa o SQL na conexуo realizada
	    $this->obj_conexao->sql_executar($this->str_sql);
	  //se for definido para retornar valor
	  }else{
	    //Executa o SQL na conexуo realizada retornando a matriz com os registros encotrados
	    $matriz = $this->obj_conexao->sql_consultar($this->str_sql);
			$this->int_total_registros = $this->obj_conexao->total_registros;
		}
	  //Executado depois de executar o SQL;
	  $this->depois_de_executar_sql();
	  //Se encontrar registro na matriz
	  if (!empty($matriz)){
	    //Retorna matriz definida pelo SQL de Consulta
			return $matriz;
	  }
	}

	private function antes_de_inserir(){
	  //Se for definido arquivo a ser executado
		if ($this->inc_antes_de_inserir != ""){
			//Adiciona arquivo que deve ser executa antes de inserir os registros
		  include($this->inc_antes_de_inserir);
		}
	}

	private function depois_de_inserir(){
		//Se for definido arquivo a ser executado
		if ($this->inc_depois_de_inserir != ""){
			//Adiciona arquivo que deve ser executa depois de inserir os registros
		  include($this->inc_depois_de_inserir);
		}
	}

	private function antes_de_consultar(){
		//Se for definido arquivo a ser executado
    if ($this->inc_antes_de_consultar != ""){
			//Adiciona arquivo que deve ser executa antes de consultar os registros
	  	include($this->inc_antes_de_consultar);
		}
	}

	private function depois_de_consultar(){
		//Se for definido arquivo a ser executado
  	if ($this->inc_depois_de_consultar != ""){
			//Adiciona arquivo que deve ser executa depois de consultar os registros
	  	include($this->inc_depois_de_consultar);
	  }
	}

	private function antes_de_editar(){
	  if ($this->inc_antes_de_editar != ""){
  		include($this->inc_antes_de_editar);
		}
	}

	private function depois_de_editar(){
		//Se for definido arquivo a ser executado
		if ($this->inc_depois_de_editar != ""){
			//Adiciona arquivo que deve ser executa depois de editar os registros
		  include($this->inc_depois_de_editar);
		}
	}

	private function antes_de_excluir(){
		//Se for definido arquivo a ser executado
		if ($this->inc_antes_de_excluir != ""){
		  //Adiciona arquivo que deve ser executa antes de excluir os registros
		  include($this->inc_antes_de_excluir);
		}
	}

	private function depois_de_excluir(){
		//Se for definido arquivo a ser executado
  	if ($this->inc_depois_de_excluir != ""){
			//Adiciona arquivo que deve ser executa depois de execluir os registros
	  	include($this->inc_depois_de_excluir);
	  }
	}

	private function antes_de_executar_sql(){
		//Se for definido arquivo a ser executado
    if ($this->inc_antes_de_executar_sql != ""){
  		//Adiciona arquivo que deve ser executa antes de executar o SQL
	  	include($this->inc_antes_de_executar_sql);
	  }
	}

	private function depois_de_executar_sql(){
		//Se for definido arquivo a ser executado
		if ($this->inc_depois_de_executar_sql != ""){
		  //Adiciona arquivo que deve ser executa depois de executar o SQL
	  	include($this->inc_depois_de_executar_sql);
	  }
	}

	// Ele pode ser executado em maiusculo, minusculo ou pode manter sua forma original.
	private function texto_maiusculo_minusculo_original(){
		//Define o se o SQL deve ser executado em maiusuculo ou minusculo
    $this->obj_conexao->bol_maiusculo_minusculo = $this->bol_maiusculo_minusculo;
		//Define o que o SQL e o conteњdo devem ser executados na sua forma original
    $this->obj_conexao->bol_maiusculo_minusculo_original = $this->bol_maiusculo_minusculo_original;

	}

	private function definir_nome_frm($str_nome){		if ($str_nome != ""){			//DEfine nome do formulсrio e remove o nome da entidade se ja estiver concatenada ao nome do formulсrio
			$this->frm_str_nome =  str_replace($this->str_entidade, "", $str_nome);
      //Remove a concatenhaчуo do menu tambщm caso for definido para o nome do forme
			$this->frm_str_nome =  str_replace("menu_", "", $this->frm_str_nome);
			//Remove a a palavra dinamico quando estiver contida no mome do formulсrio
			$this->frm_str_nome =  str_replace("dinamico_", "", $this->frm_str_nome);

			$this->frm_str_nome =  str_replace("filtro_", "", $this->frm_str_nome);

			$this->frm_str_nome =  str_replace("resultado_filtro", "", $this->frm_str_nome);
		}else{
			$this->frm_str_nome = "tabViewdhtmlgoodies_tabView2_0";
		}
	}
}
?>