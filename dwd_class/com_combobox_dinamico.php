<?php class com_combobox_dinamico extends com_combobox{

	public $str_db_banco_tipo;
	public $str_db_servidor;
	public $str_db_banco;
	public $str_db_usuario;
	public $str_db_senha;
	public $str_db_porta;
	public $bol_db_sql_exibir;
	public $bol_db_sql_maiusculo;
	public $bol_db_sql_padrao;
	public $bol_db_aspas_crase;
  public $bol_db_maiusuclo_minusculo_original;
	public $bol_db_maiusuculo_minusculo;
	public $bol_db_sql_consultar_exibir;
	public $inc_db_antes_de_consultar;
	public $inc_db_depois_de_consultar;
	public $arr_lookup;
	public $arr_lookup_filtro;
	public $str_detalhe;
	private $obj_entidade;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);
	}

	public function criar(){
    if (isset($_SESSION["banco_tipo"])){
			$this->str_db_banco_tipo = $_SESSION["banco_tipo"];

			$this->str_db_servidor = $_SESSION["servidor"];

			$this->str_db_banco = $_SESSION["banco_nome"];

			$this->str_db_usuario = $_SESSION["banco_usuario"];

			$this->str_db_senha = $_SESSION["banco_senha"];

			$this->str_db_porta = $_SESSION["banco_porta"];

			$this->bol_db_sql_maiusculo = $_SESSION["sql_maiusculo"];

			$this->bol_db_sql_padrao = $_SESSION["sql_padrao"];

			$this->bol_db_aspas_crase = $_SESSION["sql_aspa_crase"];
    }
    $this->bol_db_maiusculo_minusculo_original = true;

    $this->criar_lista_item_dinamico();

  	parent::criar();

	}

	private function criar_lista_item_dinamico(){
	  $this->obj_entidade = new db_entidade($this->str_db_banco_tipo,$this->str_db_servidor,$this->str_db_banco,$this->str_db_usuario,$this->str_db_senha,$this->str_db_porta,$this->bol_db_sql_exibir,$this->arr_lookup["tabela"],$this->bol_db_sql_maiusculo,$this->bol_db_sql_padrao,$this->bol_aspas_crase);

    //Define que deve executar o SQL e seu conteњdo da forma original
    $this->obj_entidade->bol_maiusculo_minusculo_original = $this->bol_db_maiusculo_minusculo_original;
    //Define se o SQL e conteњdo a ser executado deve ser executado em maiusculo ou minusculo
    $this->obj_entidade->bol_maiusculo_minusculo = $this->bol_db_maiusculo_minusculo;

    /*---------------------------------------------------------------------------------------------------------------*/
    //Define se deve exibir o SQL de exclusуo ele anula definiчуo de exibiчуo do SQL determinada na hora de criaчуo do objeto
    $this->obj_entidade->bol_sql_consultar_exibir = $this->bol_db_sql_consultar_exibir;
    //Permite definir o arquivo que deve ser chamado antes de inserir o registro
    $this->obj_entidade->inc_antes_de_consultar = $this->inc_db_antes_de_consultar;
    //Permite definir o arquivo que deve ser chamado depois de inseir o registro
    $this->obj_entidade->inc_depois_de_consultar = $this->inc_db_depois_de_consultar;

    //Define a string com os campos
    $this->obj_entidade->arr_campo[0]["nome"] = $this->arr_lookup["chave"];
    $this->obj_entidade->arr_campo[0]["tipo"] = $this->arr_lookup["chave_tipo"];

    $this->obj_entidade->arr_campo[1]["nome"] = $this->arr_lookup["retorno"];
    $this->obj_entidade->arr_campo[1]["tipo"] = $this->arr_lookup["retorno_tipo"];

    //Define filtro para a alteraчуo do registro
    $this->obj_entidade->arr_filtro = $this->arr_lookup_filtro;

		//Executa o SQL de editчуo da entidade pode ser definido como parametro do mщtodo o SQL
		$matriz = $this->obj_entidade->consultar();
		//Se encontrar registro na matriz
		if (!empty($matriz)){
			//$arr_campo = explode($str_separador,$this->str_db_campo);
			$cont_valores = count($matriz);
			$i = 0;
			//Percore todos os registros da matriz
			foreach($matriz as $row){				$this->arr_item[$i]["valor"] = $row[$this->arr_lookup["chave"]];
				$this->arr_item[$i]["descricao"] = $row[$this->arr_lookup["retorno"]];
				$i++;
			}
			$this->str_valor = $this->arr_lookup["valor"];
		}
	}

}
?>