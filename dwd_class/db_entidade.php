<?php
class db_entidade extends db_dataset{

  private $bol_sql_padrao;
  private $bol_aspas_crase;
  private $obj_sql;
  private $indice_campos;

  protected $bol_sql_maiusculo;

  public $arr_campo;
  public $arr_filtro;
  public $bol_gerar_log;
  public $str_tabela;
  public $int_valor_incremento;
  public $inc_antes_de_montar_sql_inserir;
  public $inc_depois_de_montar_sql_inserir;
  public $inc_antes_de_montar_sql_editar;
  public $inc_depois_de_montar_sql_editar;
  public $inc_antes_de_montar_sql_excluir;
  public $inc_depois_de_montar_sql_excluir;
  public $inc_antes_de_montar_sql_consultar;
  public $inc_depois_de_montar_sql_consultar;
  public $bol_exibir_sql;
  public $int_valor_novo;

  public function __construct($str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$str_entidade="",$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    $this->indice_campos = 0;
  	//Define nome da entidade a ser manipulada
    $this->str_entidade = $str_entidade;
    //Define se o SQL é em maiusculo ou minusculo
    $this->bol_sql_maiusculo = $bol_sql_maiusculo;
    //Define se deve excutar o SQl padrão ou SQL aplicando aspas ou crase
    $this->bol_sql_padrao = $bol_sql_padrao;
    //Se definido como false a variavel $this->bol_sql_padrao e a varaivel $bol_aspas_crase for verdade
    //Aplica aspas no SQL se for false aplica SQL com crase
    $this->bol_aspas_crase = $bol_aspas_crase;
    $this->bol_gerar_log = true;
    $this->bol_exibir_sql = false;
    //Define metodo construtor do mestre
    parent::__construct($str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir);
  }
	public function inserir($str_sql=""){
	  //Quando não for definido SQL no parametro
		if ($str_sql == ""){
		  $this->antes_de_montar_sql_inserir();
			//Cria o objeto de manipulação e montagem do SQL
			$this->obj_sql = new db_sql_inserir($this->str_banco_tipo,$this->str_entidade,$this->bol_sql_maiusculo,$this->bol_sql_padrao,$this->bol_aspas_crase);
			$this->obj_sql->str_banco_tipo = $this->str_banco_tipo;
			$this->obj_sql->str_servidor = $this->str_servidor;
			$this->obj_sql->str_banco = $this->str_banco;
			$this->obj_sql->str_usuario = $this->str_usuario;
			$this->obj_sql->str_senha = $this->str_senha;
			$this->obj_sql->str_porta = $this->str_porta;
			$this->obj_sql->arr_campo = $this->arr_campo;
			$this->obj_sql->bol_sql_exibir = $this->bol_sql_exibir;
			$this->obj_sql->bol_sql_maiusculo = $this->bol_sql_maiusculo;
			$this->obj_sql->bol_sql_padrao = $this->bol_sql_padrao;
			$this->obj_sql->bol_aspas_crase = $this->bol_aspas_crase;
			$this->obj_sql->bol_retornar_auto_incremento = $this->bol_retornar_auto_incremento;
	    //Deine o SQL a ser executado
	    $this->str_sql = $this->definir_dados();
	    $this->int_valor_incremento = $this->obj_sql->str_valor_incremento;
		  $this->depois_de_montar_sql_inserir();
		  $this->int_valor_novo = $this->obj_sql->int_valor_novo;
	  }else{
	  	//Caso o SQL seja definido no parametro do método define o mesmo na propriedade
		  $this->str_sql = $str_sql;
		}

		//Executa metodo pai executando o SQL no banco de dados
		parent::inserir($this->str_sql);
    if ($this->bol_gerar_log){
//  		$obj_log = new db_log($this->str_banco_tipo,$this->str_servidor,$this->str_banco,$this->str_usuario,$this->str_senha,$this->str_porta,$this->bol_sql_exibir,$this->str_entidade,$this->bol_sql_maiusculo,$this->bol_sql_padrao,$this->bol_aspas_crase,$_SESSION["usuario_id"],$_SESSION["filial_id"],$this->str_sql,0);
    }

	}
	/**
	* Executa metodo de alteração dos registros,
	*/
	public function editar($str_sql=""){
	  //Se não foi definido o SQL no parametro do método
	 	if ($str_sql == ""){
		  $this->antes_de_montar_sql_editar();
			//Cria o objeto de manipulação do SQL e monta o SQL a ser executado
			$this->obj_sql = new db_sql_editar($this->str_banco_tipo,$this->str_entidade,$this->bol_sql_maiusculo,$this->bol_sql_padrao,$this->bol_aspas_crase);
			$this->obj_sql->str_banco_tipo = $this->str_banco_tipo;
      $this->obj_sql->arr_campo = $this->arr_campo;
      $this->obj_sql->arr_filtro = $this->arr_filtro;
	    //Deine o SQL a ser executado
	    $this->str_sql = $this->definir_dados();
		  $this->depois_de_montar_sql_editar();
	  //Se foi definido SQL no parametro do metodo
	  }else{
	  	//Define o mesmo na propriedade SQL
		  $this->str_sql = $str_sql;
		}
		//Executa metodo pai, executando o SQL no banco de dados
		parent::editar($this->str_sql);
		if ($this->bol_gerar_log){
//		  $obj_log = new wd_db_log($this->str_banco_tipo,$this->str_servidor,$this->str_banco,$this->str_usuario,$this->str_senha,$this->str_porta,$this->bol_sql_exibir,$this->str_entidade,$this->bol_sql_maiusculo,$this->bol_sql_padrao,$this->bol_aspas_crase,$_SESSION["usuario_id"],$_SESSION["filial_id"],$this->str_sql,1);
		}
	}
	/**
	* Executa metodo de conuslta dos registros
	*/
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_from=""){
    //Se o SQL não foi definido no parametro do metodo
		if ($str_sql == ""){
		  $this->antes_de_montar_sql_consultar();
			//Cria o objeto de manipulação do SQL, e monta o SQL a ser executado
			$this->obj_sql = new db_sql_consultar($this->str_banco_tipo,$this->str_entidade,$this->bol_sql_maiusculo,$this->bol_sql_padrao,$this->bol_aspas_crase);
	    $this->obj_sql->sql_complemento = $sql_apos_from;
	    $this->obj_sql->bol_exibir_sql = $this->bol_exibir_sql;
	    //Deine o SQL a ser executado
	    if ($sql_apos_from != ""){	    	$this->str_sql = $this->definir_dados();
	    }else{
  	    $this->str_sql = $this->definir_dados_join();
  	  }
		  $this->depois_de_montar_sql_consultar();
	  //Se foi definido o SQL no parametro do metodo
	  }else{
	  	//Define o mesmo a propriedade SQL
		  $this->str_sql = $str_sql;
		}
		if ($sql_complementar != ""){			$this->str_sql .= $sql_complementar;
		}
		//Executa metodo pai, executando o SQL no banco de dados, Retornando um array com os valores
		return parent::consultar($this->str_sql);
	}
	/**
	* Executa metodo de exclusão dos registros,
	*/
	public function excluir($str_sql=""){
		//Se não for definido o SQL
		if ($str_sql == ""){
		  $this->antes_de_montar_sql_excluir();
			//Cria o objeto de manipulação do SQL, e Monta o SQL a ser executado
			$this->obj_sql = new db_sql_excluir($this->str_banco_tipo,$this->str_entidade,$this->bol_sql_maiusculo,$this->bol_sql_padrao,$this->bol_aspas_crase);
	    $this->obj_sql->arr_campo = $this->arr_campo;
	    //Deine o SQL a ser executado
	    $this->str_sql = $this->definir_dados();
		  $this->depois_de_montar_sql_excluir();
	  //Se for definido o SQL no parametro do metodo
	  }else{
	  	//Define o SQL para a propriedade
		  $this->str_sql = $str_sql;
		}
		//Executa metodo pai, Executando o SQL no banco de dados
		parent::excluir($this->str_sql);
	  if ($this->bol_gerar_log){
//	  	$obj_log = new wd_db_log($this->str_banco_tipo,$this->str_servidor,$this->str_banco,$this->str_usuario,$this->str_senha,$this->str_porta,$this->bol_sql_exibir,$this->str_entidade,$this->bol_sql_maiusculo,$this->bol_sql_padrao,$this->bol_aspas_crase,$_SESSION["usuario_id"],$_SESSION["filial_id"],$this->str_sql,2);
	  }
	  unset($this->arr_filtro);
	}
	/**
	* Executa metodo de execução de qualquer SQL no banco de dados,
	*/
	public function sql_executar($str_sql="",$bol_retorna_matriz=false){
    //Se for definido SQL no paramtro do metodo
		if ($str_sql != ""){
			//Define o SQL para a propriedade
		  $this->str_sql = $str_sql;
		}
		//Se for definido para retornar valores
    if ($bol_retorna_matriz){
			if ($this->str_clausula_sql != ""){
				$this->str_sql = str_replace(";","",$this->str_sql);
	  		$this->str_sql .= " ".$this->str_clausula_sql.";";
		  	$this->str_clausula_sql = "";
			}
			//Significa que o SQL é de pesquisa e o mesmo retorna um array com os valores
			return parent::sql_executar($this->str_sql,$bol_retorna_matriz);
		//Se não for definido para retornar como matriz
		}else{
			//Executa o SQL diretamente no banco, usado para alteração, exclusão e inserção de registros
		  parent::sql_executar($this->str_sql,$bol_retorna_matriz);
		  if ($this->bol_gerar_log){
		  	$obj_log = new wd_db_log($this->str_banco_tipo,$this->str_servidor,$this->str_banco,$this->str_usuario,$this->str_senha,$this->str_porta,$this->bol_sql_exibir,$this->str_entidade,$this->bol_sql_maiusculo,$this->bol_sql_padrao,$this->bol_aspas_crase,$_SESSION["usuario_id"],$_SESSION["filial_id"],$this->str_sql,3);
		  }

		}
	}
	/**
	* Metodo de definição dos campos,
	* Como em todos os metodos é definido os campos de uma mesma forma foi criado método sempre que quiser definir os dados
	* de uma tabela deve ser executado esse metodo, O mesmo restorna o SQL montado pelos valores definidos para o mesmo.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return string
	*/
	private function definir_dados_join(){

		//Define a string com os campos
		$this->obj_sql->arr_campo = $this->arr_campo;
		//Define tipo do campo
		$this->obj_sql->arr_filtro = $this->arr_filtro;
		//Executa metodo de definição dos campos retornando o SQL montado
		return $this->obj_sql->criar_sql_join();
	}
	private function definir_dados(){

		//Define a string com os campos
		$this->obj_sql->arr_campo = $this->arr_campo;
		//Define tipo do campo
		$this->obj_sql->arr_filtro = $this->arr_filtro;
		//Executa metodo de definição dos campos retornando o SQL montado
		return $this->obj_sql->criar_sql();
	}


	/**
	* Executa método antes de inserir os registros,
	* Seu código deve ser definido na classe que erda da class wd_db_dataset.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return null
	*/
	private function antes_de_montar_sql_inserir(){
	  //Se for definido arquivo a ser executado
		if ($this->inc_antes_de_montar_sql_inserir != ""){
			//Adiciona arquivo que deve ser executa antes de inserir os registros
		  include($this->inc_antes_de_montar_sql_inserir);
		}
	}
	/**
	* Executa método depois de inserir os registros,
	* Seu código deve ser definido na classe que erda da class wd_db_dataset.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return null
	*/
	private function depois_de_montar_sql_inserir(){
		//Se for definido arquivo a ser executado
		if ($this->inc_depois_de_montar_sql_inserir != ""){
			//Adiciona arquivo que deve ser executa depois de inserir os registros
		  include($this->inc_depois_de_montar_sql_inserir);
		}
	}
	/**
	* Executa método antes de consultar os registros,
	* Seu código deve ser definido na classe que erda da class wd_db_dataset.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return null
	*/
	private function antes_de_montar_sql_consultar(){
		//Se for definido arquivo a ser executado
    if ($this->inc_antes_de_montar_sql_consultar != ""){
			//Adiciona arquivo que deve ser executa antes de consultar os registros
	  	include($this->inc_antes_de_montar_sql_consultar);
		}
	}
	/**
	* Executa método depois de consutar os registros,
	* Seu código deve ser definido na classe que erda da class wd_db_dataset.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return null
	*/
	private function depois_de_montar_sql_consultar(){
		//Se for definido arquivo a ser executado
  	if ($this->inc_depois_de_montar_sql_consultar != ""){
			//Adiciona arquivo que deve ser executa depois de consultar os registros
	  	include($this->inc_depois_de_montar_sql_consultar);
	  }
	}
	/**
	* Executa método antes de editar os registros,
	* Seu código deve ser definido na classe que erda da class wd_db_dataset.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return null
	*/
	private function antes_de_montar_sql_editar(){
	  if ($this->inc_antes_de_montar_sql_editar != ""){
			//Adiciona arquivo que deve ser executa antes de editar os registros
   		include($this->inc_antes_de_montar_sql_editar);
		}
	}
	/**
	* Executa método depois de editar os registros,
	* Seu código deve ser definido na classe que erda da class wd_db_dataset.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return null
	*/
	private function depois_de_montar_sql_editar(){
		//Se for definido arquivo a ser executado
		if ($this->inc_depois_de_montar_sql_editar != ""){
			//Adiciona arquivo que deve ser executa depois de editar os registros
        	include($this->inc_depois_de_montar_sql_editar);
		}
	}
	/**
	* Executa método antes de excluir os registros,
	* Seu código deve ser definido na classe que erda da class wd_db_dataset.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return null
	*/
	private function antes_de_montar_sql_excluir(){
		//Se for definido arquivo a ser executado
		if ($this->inc_antes_de_montar_sql_excluir != ""){
		  //Adiciona arquivo que deve ser executa antes de excluir os registros
		  include($this->inc_antes_de_montar_sql_excluir);
		}
	}
	/**
	* Executa método depois de excluir os registros,
	* Seu código deve ser definido na classe que erda da class wd_db_dataset.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access private
	* @return null
	*/
	private function depois_de_montar_sql_excluir(){
		//Se for definido arquivo a ser executado
  	if ($this->inc_depois_de_montar_sql_excluir != ""){
			//Adiciona arquivo que deve ser executa depois de execluir os registros
	  	include($this->inc_depois_de_montar_sql_excluir);
	  }
	}

	public function adicionar_campo($campo){

		$this->arr_campo[$this->indice_campos]["nome"] = $campo->nome;
		$this->arr_campo[$this->indice_campos]["tipo"] = $campo->tipo;
		$this->arr_campo[$this->indice_campos]["descricao"] = $campo->descricao;
		$this->arr_campo[$this->indice_campos]["valor"] = $campo->valor;
		$this->arr_campo[$this->indice_campos]["editar"] = $campo->editar;
		$this->arr_campo[$this->indice_campos]["inserir"] = $campo->inserir;
		$this->arr_campo[$this->indice_campos]["requerido"] = $campo->requerido;
		$this->arr_campo[$this->indice_campos]["chave"] = $campo->chave;
		$this->arr_campo[$this->indice_campos]["filtrar"] = $campo->filtrar;
		$this->arr_campo[$this->indice_campos]["consultar"] = $campo->consultar;
    $this->arr_campo[$this->indice_campos]["entidade"] = $campo->entidade;
    $this->arr_campo[$this->indice_campos]["entidade_campo_chave"] = $campo->entidade_campo_chave;
    $this->arr_campo[$this->indice_campos]["entidade_apilidar"] = $campo->entidade_apilidar;
		$this->arr_campo[$this->indice_campos]["cad_tipo_campo"]	= $campo->cad_tipo_campo;

    /* propriedades usadas somente em lookup texto*/
		$this->arr_campo[$this->indice_campos]["valor_chave"] = $campo->valor_chave;
		$this->arr_campo[$this->indice_campos]["valor_resultado"] = $campo->valor_resultado;
		$this->arr_campo[$this->indice_campos]["cad_tamanho_resultado"]	= $campo->cad_tamanho_resultado;
		$this->arr_campo[$this->indice_campos]["str_nome_resultado"]	= $campo->str_nome_resultado;
		$this->arr_campo[$this->indice_campos]["str_nome_chave"]	= $campo->str_nome_chave;

		$this->arr_campo[$this->indice_campos]["cad_tamanho"]	= $campo->cad_tamanho;
		$this->arr_campo[$this->indice_campos]["cad_tamanho_linhas"]	= $campo->cad_tamanho_linhas;
		$this->arr_campo[$this->indice_campos]["con_exibir"]	= $campo->con_exibir;
		$this->arr_campo[$this->indice_campos]["con_exibir_lookup"]	= $campo->con_exibir_lookup;
		$this->arr_campo[$this->indice_campos]["con_editar"]	= $campo->con_editar;
  	$this->arr_campo[$this->indice_campos]["cad_converte_data"]	= $campo->cad_converte_data;
  	$this->arr_campo[$this->indice_campos]["cad_carrega_data"]	= $campo->cad_carrega_data;
  	$this->arr_campo[$this->indice_campos]["cad_bol_checado"]	= $campo->cad_bol_checado;

    $this->arr_campo[$this->indice_campos]["str_on_change"]	= $campo->str_on_change;

		$this->arr_campo[$this->indice_campos]["lookup_tabela"]	= $campo->lookup_tabela;
		$this->arr_campo[$this->indice_campos]["lookup_chave"]	= $campo->lookup_chave;
		$this->arr_campo[$this->indice_campos]["lookup_chave_tipo"]	= $campo->lookup_chave_tipo;
		$this->arr_campo[$this->indice_campos]["lookup_retorno"]	= $campo->lookup_retorno;
		$this->arr_campo[$this->indice_campos]["lookup_retorno_tipo"]	= $campo->lookup_retorno_tipo;

		$this->arr_campo[$this->indice_campos]["arr_filtro"]	= $campo->arr_filtro;

		$this->arr_campo[$this->indice_campos]["str_tipo_arquivo"]	= $campo->str_tipo_arquivo;
		$this->arr_campo[$this->indice_campos]["str_pasta_principal"]	= $campo->str_pasta_principal;
  	$this->arr_campo[$this->indice_campos]["bol_left"]	= $campo->bol_left;
  	$this->arr_campo[$this->indice_campos]["arr_item"]	= $campo->arr_item;

  	$this->arr_campo[$this->indice_campos]["rel_int_tamanho"]	= $campo->rel_int_tamanho;
  	$this->arr_campo[$this->indice_campos]["rel_exibir"]	= $campo->rel_exibir;
  	$this->indice_campos++;

	}

  public function obter_indice_campo($str_campo,$bol_campo_chave=false,$entidade=""){  	$int_ind = 0;
  	if (($bol_campo_chave) && ($entidade != "")){      foreach($this->arr_campo as $ind => $row){
	    	if (($row["nome"] == $str_campo) && ($row["entidade"] == $entidade)){
	        $int_ind = $ind;
	        //caso encontrar para de procurar pelo indice do campo
	        abort;
	      }
	    }
  	}else if ($bol_campo_chave){      foreach($this->arr_campo as $ind => $row){
	    	if ($row["entidade_campo_chave"] == $str_campo){
	        $int_ind = $ind;
	        //caso encontrar para de procurar pelo indice do campo
	        abort;
	      }
	    }
  	}else{	    foreach($this->arr_campo as $ind => $row){	    	if ($row["nome"] == $str_campo){
	        $int_ind = $ind;
	        //caso encontrar para de procurar pelo indice do campo
	        abort;
	      }
	    }
    }
    return $int_ind;
  }
}
?>