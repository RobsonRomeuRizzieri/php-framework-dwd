<?php
class db_sql_excluir extends db_sql{
	public function __construct($str_banco_tipo="",$str_tabela="",$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
  	//Executa método da classe pai definindo se deve cria os campos em maiusuclo ou minusculo
    parent::__construct($str_banco_tipo,$str_tabela,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);
	}

  protected function maiusculo_minusculo(){

  }

  public function criar_sql(){
	  //Define SQL a ser executado
	  $this->str_sql = "delete from ".$this->str_tabela;
    //Define o SQL se deve ser em maiusculo ou minusculo
	  $this->str_sql .= $this->definir_campo_valor().";";
    //retorna o SQL para executar a inserção do registro
		return $this->str_sql;
	}

	private function definir_campo_valor(){
    $obj_filtro = new db_sql_filtro($this->str_banco_tipo);
	  $int_cont = count($this->arr_campo);
	  $int_cont_chave = 0;
		if (count($this->arr_filtro) <= 1){
	    for ($i = 0; $i < $int_cont; $i++){
	      if ($this->arr_campo[$i]["chave"] == "sim"){
	        $obj_filtro->arr_filtro[$int_cont_chave]["condicao"] = "and";
					$obj_filtro->arr_filtro[$int_cont_chave]["nome"] = $this->arr_filtro[$i]["nome"];
					$obj_filtro->arr_filtro[$int_cont_chave]["tipo"] = $this->arr_filtro[$i]["tipo"];
					$obj_filtro->arr_filtro[$int_cont_chave]["operacao"] = "=";
					$obj_filtro->arr_filtro[$int_cont_chave]["valor"] = $this->arr_filtro[$i]["valor"];
					$obj_filtro->arr_filtro[$int_cont_chave]["valor2"] = 0;
					$int_cont_chave++;
				}
			}
	  }else{	  	$obj_filtro->arr_filtro = $this->arr_filtro;
	  }
    return $obj_filtro->definir_filtro();
	}
}
?>