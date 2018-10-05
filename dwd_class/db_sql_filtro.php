<?php
class db_sql_filtro extends db_sql{
  public $arr_filtro;
  public $arr_campo;
  public $str_filtro_sql;

	public function __construct($str_banco_tipo="",$str_tabela="",$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){    parent::__construct($str_banco_tipo,$str_tabela,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
    $this->str_banco_tipo = $str_banco_tipo;
	}

  public function definir_filtro($str_entidade=""){  	if ($str_entidade != ""){  	  $str_entidade_ponto = ".";
  	}    $int_cont = count($this->arr_filtro);

    for ($i = 0; $i < $int_cont; $i++){      $str_valor = $this->arr_filtro[$i]["valor"];
      $str_valor2 = $this->arr_filtro[$i]["valor2"];
      if	($this->arr_aspas[$this->arr_filtro[$i]["tipo"]] == "sim"){      	if	($this->arr_filtro[$i]["tipo"] == "date"){
          $obj_data = new data_definicao();
       		$str_valor = $obj_data->wd_definir($this->arr_filtro[$i]["valor"],$this->str_banco_tipo);
       		$str_valor2 = $obj_data->wd_definir($this->arr_filtro[$i]["valor2"],$this->str_banco_tipo);
        }
        $str_aspas = "'";
      }else{
        $str_aspas = "";
	    }
      //Termine com
      if ($this->arr_filtro[$i]["operacao"] == "plike"){
        $str_valor = $str_aspas."%".$str_valor.$str_aspas;
      //Inicie com
      }else if ($this->arr_filtro[$i]["operacao"] == "likep"){
        $str_valor = $str_aspas.$str_valor."%".$str_aspas;
      //Contenha
      }else if ($this->arr_filtro[$i]["operacao"] == "plikep"){
        $str_valor = $str_aspas."%".$str_valor."%".$str_aspas;
      }else{
        $str_valor = $str_aspas.$str_valor.$str_aspas;
        $str_valor2 = $str_aspas.$str_valor2.$str_aspas;
      }
    	if ($i == 0){        $str_condicao = " WHERE ";
      }else{        $str_condicao = $this->arr_filtro[$i]["condicao"];
      }
      if ($this->arr_filtro[$i]["entidade"] != ""){        $str_entidade_principal = $str_entidade;
        $str_entidade = $this->arr_filtro[$i]["entidade"];
      }
      if ($this->arr_filtro[$i]["operacao"] == "between"){        $this->str_filtro_sql .= " ".$str_condicao." ".$str_entidade.$str_entidade_ponto.$this->arr_filtro[$i]["nome"]." ".$this->arr_filtro[$i]["operacao"]." ".$str_valor." AND ".$str_valor2;
      }else if (($this->arr_filtro[$i]["operacao"] == "plike") || ($this->arr_filtro[$i]["operacao"] == "likep") || ($this->arr_filtro[$i]["operacao"] == "plikep")){
        $this->str_filtro_sql .= " ".$str_condicao." ".$str_entidade.$str_entidade_ponto.$this->arr_filtro[$i]["nome"]." like ".$str_valor;
      }else{      	$this->str_filtro_sql .= " ".$str_condicao." ".$str_entidade.$str_entidade_ponto.$this->arr_filtro[$i]["nome"]." ".$this->arr_filtro[$i]["operacao"]." ".$str_valor;
      }
      if ($this->arr_filtro[$i]["entidade"] != ""){
        $str_entidade = $str_entidade_principal;
      }
    }
    return $this->str_filtro_sql;
  }

  public function criar_sql(){
  }

  protected function maiusculo_minusculo(){
  }
}
?>