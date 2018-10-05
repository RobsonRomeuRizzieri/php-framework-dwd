<?php
abstract class db_conexao{
	private $arr_dataset;
	public $str_sql;
  public $obj_conexao;
	public $str_servidor;
	public $str_banco;
	public $str_usuario;
	public $str_porta;
	public $str_senha;
  public $bol_maiusculo_minusculo;
  public $bol_maiusculo_minusculo_original;
	public $bol_sql_exibir;

  public function __construct(){
	  $this->bol_maiusculo_minusculo = false;
	  $this->bol_maiusculo_minusculo_original = true;
	  $this->bol_sql_exibir = false;
	}

  abstract public function criar();

  abstract public function fechar();

  abstract public function total_registros();

  abstract public function sql_erro();

  private function definir_sql($str_sql=""){  	//Verfica se o SQL foi definido na propriedade ou no parametro do método
  	if ($str_sql != ""){
  		//Defini SQL do Parametro para a propriedade
  		$this->str_sql = $str_sql;
    }
    //Define se o SQL deve ser em maiusculo ou minusculo
		$this->maiusculo_minusculo($this->str_sql);
  }

  public function sql_consultar($str_sql=""){
    $this->definir_sql($str_sql);
	}

  public function sql_executar($str_sql=""){    $this->definir_sql($str_sql);
	}

  private function maiusculo_minusculo($str_sql){
    //Se não for verdade define que deve alterar a forma original do SQL e do conteúdo a ser executado
    if (!$this->bol_maiusculo_minusculo_original){
	    //Se foi definido para executar o SQL em maiusculo
	    if ($this->bol_maiusculo_minusculo){
	    	//Define texto do SQL para maiusculo
	      $this->str_sql = strtoupper($str_sql);
	    }	else {
	      //converte o SQL para minusculo
				$this->str_sql = strtolower($str_sql);
	    }
    }
	}

  abstract public function __destructor();
}
?>