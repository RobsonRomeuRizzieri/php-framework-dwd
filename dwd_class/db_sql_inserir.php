<?php
// Classe base para montagem do SQL de inserção dos registros na entidade.
class db_sql_inserir extends db_sql{

  //var string $str_value Define como padrão a palavra reservada do SQL values.
  public $str_banco_tipo;
	public $str_servidor;
	public $str_banco;
	public $str_usuario;
	public $str_senha;
	public $str_porta;
  public $arr_campo;
  public $bol_sql_maiusculo;
	public $bol_sql_padrao;
	public $bol_aspas_crase;
	public $bol_gerar_log_auto_incremento;
	public $bol_verificar_sql_inject;
  public $bol_retornar_auto_incremento;
  public $str_valor_incremento;
  public $int_valor_novo;

	// Método executado no momento da criação do objeto.
	public function __construct($str_banco_tipo="",$str_tabela="",$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
  	//Executa método da classe pai definindo se deve cria os campos em maiusuclo ou minusculo
    parent::__construct($str_banco_tipo,$str_tabela,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		//Define palavra reservado value como padrão
    $this->str_value = " values ";
    $this->bol_gerar_log_auto_incremento = true;
    $this->bol_verificar_sql_inject = true;
	}

	// Método executado Para definir se o SQL deve ser convertido para maiusculo ou minusculo.
  protected function maiusculo_minusculo(){
    //Se for definido como verdade executa o SQL em mausiculo
    if ($this->bol_sql_maiusculo_minusculo){
    	//Define se o campos devem ser convertidos para maiusculo ou minusuculo
      $this->str_sql = strtoupper($this->str_sql);
      $this->str_tabela = strtoupper($this->str_tabela);
      $this->str_value = strtoupper($this->str_value);
    }	else {
      //converte os campos para minusculo
			$this->str_sql = strtolower($this->str_sql);
			$this->str_tabela = strtolower($this->str_tabela);
			$this->str_value = strtolower($this->str_value);
    }
  }

	// Método o SQL de inserção dos registros conforme for definido os valores para os campos retornando o SQL a ser executado.
  public function criar_sql(){
		//Executa a definição dos campos conforme valores definidos nas propriedades
		$this->definir_sql();
	  //Define SQL a ser executado
	  $this->str_sql = "insert into ".$this->str_tabela." (".$this->str_sql_campo.")".$this->str_value;
    //Define o SQL se deve ser em maiusculo ou minusculo
    //$this->maiusculo_minusculo();
    //Define o valor do campos para o insert
	  $this->str_sql .= "(".$this->str_sql_valor.");";
    //retorna o SQL para executar a inserção do registro
		return $this->str_sql;
	}

	// Monta a strig com os campos e valor para ser executado no SQL
	private function definir_sql(){
	  $int_cont = count($this->arr_campo);
		//Lista as informações encontradas nos arrays
		for ($i = 0; $i < $int_cont; $i++){			if ($this->arr_campo[$i][inserir] != "nao"){
		  	if ($this->arr_campo[$i]["entidade"] == ""){
		    	//Define se deve usar separador ou não por parão o separador é (,)
		      $str_separador = $this->definir_separador_entre_dados($int_cont,$i);

					//Define a string com o nome do campo
		   		$this->str_sql_campo .= $str_separador.$this->arr_campo[$i]["nome"];

		   		$str_valor = $this->arr_campo[$i]["valor"];

		   		//determina que deve incrementar sem controlar empresa e filial
		   		if	($this->arr_campo[$i]["tipo"] == "auto_inc"){					  $obj_inc = new db_auto_incremento(0,0,$this->str_tabela,$this->arr_campo[$i]["nome"],$this->str_banco_tipo,$this->str_servidor,$this->str_banco,$this->str_usuario,$this->str_senha,$this->str_porta,false);
		        $this->str_sql_valor .= $obj_inc->int_valor_novo.$str_separador;
		   		//Incrementa o valor controlando por empresa
		   		}else if	($this->arr_campo[$i]["tipo"] == "auto_inc_emp"){
		   		  $obj_inc = new db_auto_incremento(1,0,$this->str_tabela,$this->arr_campo[$i]["nome"],$this->str_banco_tipo,$this->str_servidor,$this->str_banco,$this->str_usuario,$this->str_senha,$this->str_porta,false);
		   		  $this->str_sql_valor .= $obj_inc->int_valor_novo.$str_separador;
		   		//Incrementa o valor controlando por filial
		   		}else if	($this->arr_campo[$i]["tipo"] == "auto_inc_fil"){		   		  $obj_inc = new db_auto_incremento(0,1,$this->str_tabela,$this->arr_campo[$i]["nome"],$this->str_banco_tipo,$this->str_servidor,$this->str_banco,$this->str_usuario,$this->str_senha,$this->str_porta,false);
		   		  $this->str_sql_valor .= $obj_inc->int_valor_novo.$str_separador;
		   		//Incrementa o valor controlando por empresa e por filial
		   		}else if	($this->arr_campo[$i]["tipo"] == "auto_inc_emp_fil"){		   		  $obj_inc = new db_auto_incremento(1,1,$this->str_tabela,$this->arr_campo[$i]["nome"],$this->str_banco_tipo,$this->str_servidor,$this->str_banco,$this->str_usuario,$this->str_senha,$this->str_porta,false);
		   		  $this->str_sql_valor .= $obj_inc->int_valor_novo.$str_separador;

		   		//Define se o valor é usado com aspas ou sem aspas
		      }else if	($this->arr_aspas[$this->arr_campo[$i]["tipo"]] == "sim"){		        if	($this->arr_campo[$i]["tipo"] == "date"){		          $obj_data = new data_definicao();
		       		$str_valor = $obj_data->wd_definir($this->arr_campo[$i]["valor"],$this->str_banco_tipo);
		        }
		     		//Define a string com o valor para os campos com aspas
		        $this->str_sql_valor .= $str_separador."'".$str_valor."'";
		      }else{		     		//Define a string com o valor para os campos sem aspas
		     		$this->str_sql_valor .= $str_separador.$str_valor;
		      }
		      $this->int_valor_novo = $obj_inc->int_valor_novo;
		   		//$this->str_sql_valor .= $str_valor.$str_separador;
		   	}
		  }
		}

	}

}
?>