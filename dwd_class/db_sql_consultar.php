<?php
class db_sql_consultar extends db_sql{
  private $str_from;
  private $str_sql_filtro;

  public $arr_filtro;
  public $bol_exibir_sql;

	public function __construct($str_banco_tipo="",$str_tabela="",$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
  	//Executa método da classe pai definindo se deve cria os campos em maiusuclo ou minusculo
    parent::__construct($str_banco_tipo,$str_tabela,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
    //Define variavel reservada do SQL para definição da tabela
    $this->str_from = " from ";
    $this->bol_exibir_sql = false;
	}

  protected function maiusculo_minusculo(){

		//Se for definido como verdade executa o SQL em mausiculo
    if ($this->bol_sql_maiusculo_minusculo){
			//Define se o campos devem ser convertidos para maiusculo ou minusuculo
      $this->str_sql = strtoupper($this->str_sql);
      $this->str_tabela = strtoupper($this->str_tabela);
      $this->str_from = strtoupper($this->str_from);
    }	else {
      //converte os campos para minusculo
			$this->str_sql = strtolower($this->str_sql);
			$this->str_tabela = strtolower($this->str_tabela);
			$this->str_from = strtolower($this->str_from);
    }
  }

  public function criar_sql_join(){
		//Executa a definição dos campos conforme valores definidos nas propriedades
	  //Define SQL a ser executado
	  $this->str_sql = "select ".$this->definir_campos_join().$this->str_from.$this->str_tabela." ".$this->str_sql_filtro;
    //Define o SQL se deve ser em maiusculo ou minusculo
    // $this->maiusculo_minusculo();
    //retorna o SQL para executar a inserção do registro
    if ($this->bol_exibir_sql){
      echo $this->str_sql;
    }
		return $this->str_sql;
	}

  public function criar_sql(){
		//Executa a definição dos campos conforme valores definidos nas propriedades
	  //Define SQL a ser executado
	  $this->str_sql = "select ".$this->definir_campos().$this->str_from.$this->str_tabela." ".$this->str_sql_filtro;
    //Define o SQL se deve ser em maiusculo ou minusculo
    //$this->maiusculo_minusculo();
    //retorna o SQL para executar a inserção do registro
		return $this->str_sql;
	}

	// Monta a strig com os campos e valor para ser executado no SQL
	private function definir_campos_join(){
	  $this->sql_complemento = "";
	  $obj_filtro = new db_sql_filtro($this->str_banco_tipo);
	  $obj_filtro->arr_filtro = $this->arr_filtro;
	  $obj_filtro->arr_campo = $this->arr_campo;
	  $int_cont = count($this->arr_campo);
	  $int_cont_filtro = count($obj_filtro->arr_filtro);
	  $bol_definir_tabela = false;
	  $str_sql_condicao = " ";
		//Lista as informações encontradas nos arrays
		for ($i = 0; $i < $int_cont; $i++){
		  //Define a entidade do campo relacionado para permitir fazer filtro com o campo na tela de consulta
      /*
      for ($ii = 0; $ii < $int_cont_filtro; $ii++){        if ($obj_filtro->arr_filtro[$ii]["nome"] == $this->arr_campo[$i]["nome"]){        	if ($this->arr_campo[$i]["entidade"] != ""){
          	$obj_filtro->arr_filtro[$ii]["entidade"] = $this->arr_campo[$i]["entidade"];
          }
        }
      }
      */
      //Monta o SQL de consulta retornando o campo de relacionamento da chave estrangeira			if ($this->arr_campo[$i]["consultar"] != "nao"){    	  //Define se deve usar separador ou não por parão o separador é (,)
        $str_separador = $this->definir_separador_entre_dados($int_cont,$i);
        if ($this->arr_campo[$i]["entidade"] != ""){        	$bol_definir_tabela = true;          if (($this->arr_campo[$i]["entidade"] != $this->str_tabela) &&
             (($this->arr_campo[$i]["entidade_apilidar"] == "nao") || ($this->arr_campo[$i]["entidade_apilidar"] == ""))){
          	if ($this->arr_campo[$i]["bol_left"] != "nao"){          		if ($this->arr_campo[$i]["entidade_campo_chave"] != ""){
      	    	  $this->str_sql_campo .= $str_separador.$this->arr_campo[$i]["entidade"].".".$this->arr_campo[$i]["nome"]." as ".$this->arr_campo[$i]["nome"]."_".$this->arr_campo[$i]["entidade_campo_chave"];
           	    $this->sql_complemento .= " left join ".$this->arr_campo[$i]["entidade"]." on ".$this->str_tabela.".".$this->arr_campo[$i]["entidade_campo_chave"]." = ".$this->arr_campo[$i]["entidade"].".id";
           	  }else{      	    	  $this->str_sql_campo .= $str_separador.$this->arr_campo[$i]["entidade"].".".$this->arr_campo[$i]["nome"]." as ".$this->arr_campo[$i]["nome"]."_".$this->arr_campo[$i]["entidade"];
           	    $this->sql_complemento .= " left join ".$this->arr_campo[$i]["entidade"]." on ".$this->str_tabela.".".$this->arr_campo[$i]["entidade"]."_id = ".$this->arr_campo[$i]["entidade"].".id";
           	  }
 						}else{
	        		if ($this->arr_campo[$i]["entidade_campo_chave"] != ""){	     	    	  $this->str_sql_campo .= $str_separador.$this->arr_campo[$i]["entidade"]."x.".$this->arr_campo[$i]["nome"]." as ".$this->arr_campo[$i]["nome"]."_".$this->arr_campo[$i]["entidade_campo_chave"];
	              $this->sql_complemento .= " left join ".$this->arr_campo[$i]["entidade"]." ".$this->arr_campo[$i]["entidade"]."x on ".$this->str_tabela.".".$this->arr_campo[$i]["entidade_campo_chave"]." = ".$this->arr_campo[$i]["entidade"]."x.id";
	            }else{
	     	    	  $this->str_sql_campo .= $str_separador.$this->arr_campo[$i]["entidade"]."x.".$this->arr_campo[$i]["nome"]." as ".$this->arr_campo[$i]["nome"]."_".$this->arr_campo[$i]["entidade"];
	             	$this->sql_complemento .= " left join ".$this->arr_campo[$i]["entidade"]." ".$this->arr_campo[$i]["entidade"]."x on ".$this->str_tabela.".".$this->arr_campo[$i]["entidade"]."_id = ".$this->arr_campo[$i]["entidade"]."x.id";
	            }
	          }
          }else{        		if ($this->arr_campo[$i]["entidade_campo_chave"] != ""){
     	    	  $this->str_sql_campo .= $str_separador.$this->arr_campo[$i]["entidade"].$i.".".$this->arr_campo[$i]["nome"]." as ".$this->arr_campo[$i]["nome"]."_".$this->arr_campo[$i]["entidade_campo_chave"];
              $this->sql_complemento .= " left join ".$this->arr_campo[$i]["entidade"]." ".$this->arr_campo[$i]["entidade"].$i." on ".$this->str_tabela.".".$this->arr_campo[$i]["entidade_campo_chave"]." = ".$this->arr_campo[$i]["entidade"].$i.".id";
            }else{
     	    	  $this->str_sql_campo .= $str_separador.$this->arr_campo[$i]["entidade"].$i.".".$this->arr_campo[$i]["nome"]." as ".$this->arr_campo[$i]["nome"]."_".$this->arr_campo[$i]["entidade"];
             	$this->sql_complemento .= " left join ".$this->arr_campo[$i]["entidade"]." ".$this->arr_campo[$i]["entidade"].$i." on ".$this->str_tabela.".".$this->arr_campo[$i]["entidade"]."_id = ".$this->arr_campo[$i]["entidade"].$i.".id";
            }
          }
//          $str_sql_condicao .= " and ".$this->str_tabela.".".$this->arr_campo[$i]["entidade"]."_id = ".$this->arr_campo[$i]["entidade"].".id";
        }else{
      	  //Define a string com o nome do campo
 	    	  $this->str_sql_campo .= $str_separador.$this->str_tabela.".".$this->arr_campo[$i]["nome"];
 	    	}
      }
		}
		if ($bol_definir_tabela){
  		//Define filtro para o SQL
      $this->str_sql_filtro = " ".$this->sql_complemento." ".$obj_filtro->definir_filtro($this->str_tabela);
      /*
      if (strpos($this->str_sql_filtro," WHERE ") > 0){
      	$this->str_sql_filtro .= $str_sql_condicao;
      }else{
        $this->str_sql_filtro .= " WHERE ".substr($str_sql_condicao,5);
      }
      */
    }else{  		//Define filtro para o SQL
      $this->str_sql_filtro = " ".$this->sql_complemento." ".$obj_filtro->definir_filtro();
    }
    return $this->str_sql_campo;
	}

	// Monta a strig com os campos e valor para ser executado no SQL
	private function definir_campos(){
	  $obj_filtro = new db_sql_filtro($this->str_banco_tipo);
	  $obj_filtro->arr_filtro = $this->arr_filtro;
	  $obj_filtro->arr_campo = $this->arr_campo;
	  $int_cont = count($this->arr_campo);
	  $int_cont_filtro = count($obj_filtro->arr_filtro);
	  $bol_definir_tabela = false;
	  $str_sql_condicao = " ";
		//Lista as informações encontradas nos arrays
		for ($i = 0; $i < $int_cont; $i++){
		  //Define a entidade do campo relacionado para permitir fazer filtro com o campo na tela de consulta
      /*
      for ($ii = 0; $ii < $int_cont_filtro; $ii++){
        if ($obj_filtro->arr_filtro[$ii]["nome"] == $this->arr_campo[$i]["nome"]){
        	if ($this->arr_campo[$i]["entidade"] != ""){
          	if ($obj_filtro->arr_filtro[$ii]["entidade"] != ""){
          	  $obj_filtro->arr_filtro[$ii]["entidade"] = $this->arr_campo[$i]["entidade"];
          	}
          }
        }
      }
      */
      //Monta o SQL de consulta retornando o campo de relacionamento da chave estrangeira
  		if ($this->arr_campo[$i]["consultar"] != "nao"){
    	  //Define se deve usar separador ou não por parão o separador é (,)
        $str_separador = $this->definir_separador_entre_dados($int_cont,$i);
        if ($this->arr_campo[$i]["entidade"] != ""){
        	$bol_definir_tabela = true;
 	    	  $this->str_sql_campo .= $str_separador.$this->arr_campo[$i]["entidade"].".".$this->arr_campo[$i]["nome"]." as ".$this->arr_campo[$i]["nome"]."_".$this->arr_campo[$i]["entidade"];
          $str_sql_condicao .= " and ".$this->str_tabela.".".$this->arr_campo[$i]["entidade"]."_id = ".$this->arr_campo[$i]["entidade"].".id";
        }else{
      	  //Define a string com o nome do campo
 	    	  $this->str_sql_campo .= $str_separador.$this->str_tabela.".".$this->arr_campo[$i]["nome"];
 	    	}
      }
		}
		if ($bol_definir_tabela){
  		//Define filtro para o SQL
      $this->str_sql_filtro = " ".$this->sql_complemento." ".$obj_filtro->definir_filtro($this->str_tabela);
      if (strpos($this->str_sql_filtro," WHERE ") > 0){
      	$this->str_sql_filtro .= $str_sql_condicao;
      }else{
        $this->str_sql_filtro .= " WHERE ".substr($str_sql_condicao,5);
      }
    }else{
  		//Define filtro para o SQL
      $this->str_sql_filtro = " ".$this->sql_complemento." ".$obj_filtro->definir_filtro();
    }
    return $this->str_sql_campo;
	}

}
?>