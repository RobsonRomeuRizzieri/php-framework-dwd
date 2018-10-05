<?php
// Classe base para montagem dos SQLs, nela � definido os campos e posteriormente montado o SQL.
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
		//Define tabela de manipula��o
		$this->str_tabela = $str_tabela;
	  //Quando for definido como verdade ele ignora a defini��o de uso das aspas ou da crase
	  $this->bol_sql_padrao = $bol_sql_padrao;
 		//Define se deve executar o SQL com aspas duplas ou com crase se for verdade usa aspas duplas se n�o usa crase
  	$this->bol_aspas_crase = $bol_aspas_crase;
		//Define como padr�o que o SQL deve ser executado em maiusculo
	  $this->bol_sql_maiusculo_minusculo = $bol_sql_maiusculo;
	  //Determina se o tipo do campo usa aspas ou n�o quando executado o SQL
	  $this->arr_aspas = array("string"=>"sim","integer"=>"nao","numeric"=>"nao",
														"decimal"=>"nao","date"=>"sim","datetime"=>"sim",
														"time"=>"sim","integer"=>"nao","checkbox"=>"nao",
														"auto_inc"=>"nao","auto_inc_emp"=>"nao","auto_inc_fil"=>"nao",
														"auto_inc_emp_fil"=>"nao","money"=>"nao");

	}

	protected function tratamento_caracter_especial($i){		$this->arr_campo_valor[$i]["valor"] = str_replace("DWDRJ","&",$this->arr_campo_valor[$i]["valor"]);
	}

	//� informado total de dados e o valor de contador se for o ultimo registro determina que n�o deve ser
	// adicionado o separador definido no parametro da fun��o, se o mesmo n�o for definido ele define automaticamente
	// o separador virgula.
 	protected function definir_separador_entre_dados($int_total,$int_contador,$str_separador=","){
	  //Se for o ultimo campo remove o separado
	  if (($int_contador) == 0){
  	  //Determina que n�o vai aplicar separador
			$str_retorno = "";
   	  //Se n�o for o �ltimo dado
		}	else{
			//Define o separador virgula para os campos
  		$str_retorno = $str_separador;
    }
	  //Retorna valor definido no separador
 		return $str_retorno;
 	}

	// M�todo usado para montar o SQL desejado nas classes que depedem da defini��o dos campos
  abstract public function criar_sql();
	// M�todo usado para definir se o SQL deve ser executado em maiusuclo ou minusculo
  abstract protected function maiusculo_minusculo();
}
?>