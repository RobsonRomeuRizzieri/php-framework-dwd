<?php
// Classe base para montagem dos SQLs, nela й definido os campos e posteriormente montado o SQL.
abstract class db_sql{

  private $bol_aspas_crase;
  private $bol_sql_padrao;

  protected $arr_aspas;
  protected $bol_sql_maiusculo_minusculo;

	public $arr_campo;
	public $arr_filtro;
  public $str_sql;
  public $str_tabela;
  public $str_banco_tipo;

	public function __construct($str_banco_tipo="",$str_tabela="",$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    $this->str_banco_tipo = $str_banco_tipo;
		//Define tabela de manipulaзгo
		$this->str_tabela = $str_tabela;
	  //Quando for definido como verdade ele ignora a definiзгo de uso das aspas ou da crase
	  $this->bol_sql_padrao = $bol_sql_padrao;
 		//Define se deve executar o SQL com aspas duplas ou com crase se for verdade usa aspas duplas se nгo usa crase
  	$this->bol_aspas_crase = $bol_aspas_crase;
		//Define como padrгo que o SQL deve ser executado em maiusculo
	  $this->bol_sql_maiusculo_minusculo = $bol_sql_maiusculo;
	  //Determina se o tipo do campo usa aspas ou nгo quando executado o SQL
	  $this->arr_aspas = array("string"=>"sim","integer"=>"nao","numeric"=>"nao",
														"decimal"=>"nao","date"=>"sim","datetime"=>"sim",
														"time"=>"sim","integer"=>"nao","checkbox"=>"nao",
														"auto_inc"=>"nao","auto_inc_emp"=>"nao","auto_inc_fil"=>"nao",
														"auto_inc_emp_fil"=>"nao","money"=>"nao");

	}

	protected function tratamento_caracter_especial($i){		$this->arr_campo_valor[$i]["valor"] = str_replace("DWDRJ","&",$this->arr_campo_valor[$i]["valor"]);
	}

	//Й informado total de dados e o valor de contador se for o ultimo registro determina que nгo deve ser
	// adicionado o separador definido no parametro da funзгo, se o mesmo nгo for definido ele define automaticamente
	// o separador virgula.
 	protected function definir_separador_entre_dados($int_total,$int_contador,$str_separador=","){
	  //Se for o ultimo campo remove o separado
	  if (($int_contador) == 0){
  	  //Determina que nгo vai aplicar separador
			$str_retorno = "";
   	  //Se nгo for o ъltimo dado
		}	else{
			//Define o separador virgula para os campos
  		$str_retorno = $str_separador;
    }
	  //Retorna valor definido no separador
 		return $str_retorno;
 	}

	// Mйtodo usado para montar o SQL desejado nas classes que depedem da definiзгo dos campos
  abstract public function criar_sql();
	// Mйtodo usado para definir se o SQL deve ser executado em maiusuclo ou minusculo
  abstract protected function maiusculo_minusculo();
}
?>