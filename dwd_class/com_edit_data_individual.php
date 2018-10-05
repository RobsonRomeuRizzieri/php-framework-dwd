<?php //include_once("../wd_geral.php");
class com_edit_data_individual extends com_edit{

	private $bol_nome_data;
	public $str_campo_dia;
	public $str_campo_mes;
	public $str_campo_ano;
	public $str_campo_dia_valor;
	public $str_campo_mes_valor;
	public $str_campo_ano_valor;
  public $int_ano_inicio;
	public $int_ano_fim;
	public $str_evento_dia;
	public $str_evento_mes;
	public $str_evento_ano;
	public $str_on_change;
  //private $bol_requerido;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false,$bol_nome_data=false){
		$this->bol_nome_data = $bol_nome_data;
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);
	  $this->str_entidade = $str_entidade;
	  $this->bol_requerido = $bol_requerido;
	  if ($this->bol_nome_data){
		  $this->str_campo_dia = "dia_".$str_nome;
		  $this->str_campo_mes = "mes_".$str_nome;
		  $this->str_campo_ano = "ano_".$str_nome;
	  }else{
		  $this->str_campo_dia = "dia";
		  $this->str_campo_mes = "mes";
		  $this->str_campo_ano = "ano";
	  }
	  $this->int_ano_inicio = "2007";
	  $this->int_ano_fim = "2015";
	}

  public function criar_dia(){  	$obj = new com_combobox_fixo($this->str_campo_dia,$this->str_entidade,$this->bol_requerido);
  	$obj->str_on_change .= $this->str_on_change;
		$obj->bol_item_selecao = false;
		$obj->arr_item[0]["valor"] = "1";
		$obj->arr_item[0]["descricao"] = "01";
		$obj->arr_item[1]["valor"] = "2";
		$obj->arr_item[1]["descricao"] = "02";
		$obj->arr_item[2]["valor"] = "3";
		$obj->arr_item[2]["descricao"] = "03";
		$obj->arr_item[3]["valor"] = "4";
		$obj->arr_item[3]["descricao"] = "04";
		$obj->arr_item[4]["valor"] = "5";
		$obj->arr_item[4]["descricao"] = "05";
		$obj->arr_item[5]["valor"] = "6";
		$obj->arr_item[5]["descricao"] = "06";
		$obj->arr_item[6]["valor"] = "7";
		$obj->arr_item[6]["descricao"] = "07";
		$obj->arr_item[7]["valor"] = "8";
		$obj->arr_item[7]["descricao"] = "08";
		$obj->arr_item[8]["valor"] = "9";
		$obj->arr_item[8]["descricao"] = "09";
		$obj->arr_item[9]["valor"] = "10";
		$obj->arr_item[9]["descricao"] = "10";
		$obj->arr_item[10]["valor"] = "11";
		$obj->arr_item[10]["descricao"] = "11";
		$obj->arr_item[11]["valor"] = "12";
		$obj->arr_item[11]["descricao"] = "12";
		$obj->arr_item[12]["valor"] = "13";
		$obj->arr_item[12]["descricao"] = "13";
		$obj->arr_item[13]["valor"] = "14";
		$obj->arr_item[13]["descricao"] = "14";
		$obj->arr_item[14]["valor"] = "15";
		$obj->arr_item[14]["descricao"] = "15";
		$obj->arr_item[15]["valor"] = "16";
		$obj->arr_item[15]["descricao"] = "16";
		$obj->arr_item[16]["valor"] = "17";
		$obj->arr_item[16]["descricao"] = "17";
		$obj->arr_item[17]["valor"] = "18";
		$obj->arr_item[17]["descricao"] = "18";
		$obj->arr_item[18]["valor"] = "19";
		$obj->arr_item[18]["descricao"] = "19";
		$obj->arr_item[19]["valor"] = "20";
		$obj->arr_item[19]["descricao"] = "20";
		$obj->arr_item[20]["valor"] = "21";
		$obj->arr_item[20]["descricao"] = "21";
		$obj->arr_item[21]["valor"] = "22";
		$obj->arr_item[21]["descricao"] = "22";
		$obj->arr_item[22]["valor"] = "23";
		$obj->arr_item[22]["descricao"] = "23";
		$obj->arr_item[23]["valor"] = "24";
		$obj->arr_item[23]["descricao"] = "24";
		$obj->arr_item[24]["valor"] = "25";
		$obj->arr_item[24]["descricao"] = "25";
		$obj->arr_item[25]["valor"] = "26";
		$obj->arr_item[25]["descricao"] = "26";
		$obj->arr_item[26]["valor"] = "27";
		$obj->arr_item[26]["descricao"] = "27";
		$obj->arr_item[27]["valor"] = "28";
		$obj->arr_item[27]["descricao"] = "28";
		$obj->arr_item[28]["valor"] = "29";
		$obj->arr_item[28]["descricao"] = "29";
		$obj->arr_item[29]["valor"] = "30";
		$obj->arr_item[29]["descricao"] = "30";
		$obj->arr_item[30]["valor"] = "31";
		$obj->arr_item[30]["descricao"] = "31";
    if ($this->str_campo_dia_valor != ""){
 	    $obj->str_valor = $this->str_campo_dia_valor;
 	  }else{
		  $obj->str_valor = date('d');
		}
		$obj->criar();
  }

  public function criar_mes(){		$obj = new com_combobox_fixo($this->str_campo_mes,$this->str_entidade,$this->bol_requerido);
  	$obj->str_on_change .= $this->str_on_change;
		$obj->bol_item_selecao = false;
		$obj->arr_item[0]["valor"] = "1";
		$obj->arr_item[0]["descricao"] = "01";
		$obj->arr_item[1]["valor"] = "2";
		$obj->arr_item[1]["descricao"] = "02";
		$obj->arr_item[2]["valor"] = "3";
		$obj->arr_item[2]["descricao"] = "03";
		$obj->arr_item[3]["valor"] = "4";
		$obj->arr_item[3]["descricao"] = "04";
		$obj->arr_item[4]["valor"] = "5";
		$obj->arr_item[4]["descricao"] = "05";
		$obj->arr_item[5]["valor"] = "6";
		$obj->arr_item[5]["descricao"] = "06";
		$obj->arr_item[6]["valor"] = "7";
		$obj->arr_item[6]["descricao"] = "07";
		$obj->arr_item[7]["valor"] = "8";
		$obj->arr_item[7]["descricao"] = "08";
		$obj->arr_item[8]["valor"] = "9";
		$obj->arr_item[8]["descricao"] = "09";
		$obj->arr_item[9]["valor"] = "10";
		$obj->arr_item[9]["descricao"] = "10";
		$obj->arr_item[10]["valor"] = "11";
		$obj->arr_item[10]["descricao"] = "11";
		$obj->arr_item[11]["valor"] = "12";
		$obj->arr_item[11]["descricao"] = "12";

    if ($this->str_campo_mes_valor != ""){
 	    $obj->str_valor = $this->str_campo_mes_valor;
 	  }else{
		  $obj->str_valor = date('m');
		}
		$obj->criar();
  }

  public function criar_ano(){		$obj = new com_combobox_fixo($this->str_campo_ano,$this->str_entidade,$this->bol_requerido);
  	$obj->str_on_change .= $this->str_on_change;
		$obj->bol_item_selecao = false;
		$obj->arr_item = $this->definir_anos();
    if ($this->str_campo_ano_valor != ""){
 	    $obj->str_valor = $this->str_campo_ano_valor;
 	  }else{
		  $obj->str_valor = date('Y');
		}
		$obj->criar();
  }

	public function criar(){
		echo "Dia: ";
    $this->criar_dia();
		echo "Mês: ";
    $this->criar_mes();
		echo "Ano: ";
    $this->criar_ano();

	}

  private function definir_anos(){
    $int_um = 0;
		for ($i = $this->int_ano_inicio; $i <= $this->int_ano_fim; $i++){
			$arr_ano[$int_um]["valor"] = $i;
			$arr_ano[$int_um]["descricao"] = $i;
      $int_um++;
		}
		return $arr_ano;
  }

}
?>


