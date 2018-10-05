<?php
// Define o SQL de alteração dos registros
class db_sql_editar extends db_sql{
  private $str_set;
  public $str_filtro;

	public function __construct($str_banco_tipo="",$str_tabela="",$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
  	//Executa método da classe pai definindo se deve cria os campos em maiusuclo ou minusculo
    parent::__construct($str_banco_tipo,$str_tabela,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
		//Define palavra reservado set como padrão
    $this->str_set = " set ";
	}
	/**
	* Método executado Para definir se o SQL deve ser convertido para maiusculo ou minusculo.
	* @author Robson Romeu Rizzieri <robson@workdynamics.com.br>
  * @version 2.0
	* @access protected
	* @return null
	*/
  protected function maiusculo_minusculo(){
    //Se for definido como verdade executa o SQL em mausiculo
    if ($this->bol_sql_maiusculo_minusculo){
    	//Define se o campos devem ser convertidos para maiusculo ou minusuculo
      $this->str_sql = strtoupper($this->str_sql);
      $this->str_tabela = strtoupper($this->str_tabela);
      $this->str_set = strtoupper($this->str_set);
    }	else {
      //converte os campos para minusculo
			$this->str_sql = strtolower($this->str_sql);
			$this->str_tabela = strtolower($this->str_tabela);
			$this->str_set = strtolower($this->str_set);
    }
  }

 	/**
	* Método do SQL de alteração dos registros conforme for definido os valores para os campos retornando o SQL a ser executado.
	*/
  public function criar_sql(){
	  //Define SQL a ser executado
	  $this->str_sql = "update ".$this->str_tabela.$this->str_set;
    //Define o SQL se deve ser em maiusculo ou minusculo
    //$this->maiusculo_minusculo();
	  $this->str_sql .= $this->definir_string_campo_valor().";";
    //retorna o SQL para executar a inserção do registro
		return $this->str_sql;
	}
 	/**
	* Monta a strig com os campos para colocar a mesma no SQL de alteração
	*/
	private function definir_string_campo_valor(){		$str_campo_valor = "";
	  $int_cont = count($this->arr_campo);
	  $obj_filtro = new db_sql_filtro($this->str_banco_tipo);
	  $int_cont_chave = 0;
	  $int_cont_editar = 0;
		//Lista as informações encontradas nos arrays
		for ($i = 0; $i < $int_cont; $i++){
      if ($this->arr_campo[$i]["chave"] == "sim"){
        $obj_filtro->arr_filtro[$int_cont_chave]["condicao"] = "and";
				$obj_filtro->arr_filtro[$int_cont_chave]["nome"] = $this->arr_campo[$i]["nome"];
				$obj_filtro->arr_filtro[$int_cont_chave]["tipo"] = $this->arr_campo[$i]["tipo"];
				$obj_filtro->arr_filtro[$int_cont_chave]["operacao"] = "=";
				$obj_filtro->arr_filtro[$int_cont_chave]["valor"] = $this->arr_campo[$i]["valor"];
				$obj_filtro->arr_filtro[$int_cont_chave]["valor2"] = 0;

        $int_cont_chave++;
      }else if ($this->arr_campo[$i]["editar"] == "sim"){
        if ($this->arr_campo[$i]["entidade"] == ""){
		      $str_valor = $this->arr_campo[$i]["valor"];
		    	//Define se deve usar separador ou não
		      $str_separador = $this->definir_separador_entre_dados($int_cont,$int_cont_editar);
		      if	($this->arr_aspas[$this->arr_campo[$i]["tipo"]] == "sim"){
		        if	($this->arr_campo[$i]["tipo"] == "date"){
		          $obj_data = new data_definicao();
		       		$str_valor = $obj_data->wd_definir($this->arr_campo[$i]["valor"],$this->str_banco_tipo);
		        }
		        $str_campo_valor .= $str_separador.$this->arr_campo[$i]["nome"]." = "."'".$str_valor."'";
		      }else{		        $str_campo_valor .= $str_separador.$this->arr_campo[$i]["nome"]." = ".$str_valor;
		      }
  	      $int_cont_editar++;
		    }
      }
		}
    $str_campo_valor .= " ".$obj_filtro->definir_filtro();
    return $str_campo_valor;
	}

}
?>