<?php
class com_edit_data extends com_edit{

	private $str_botao_calendario;

	public $bol_carregar_data;
	public $bol_converte_data;
	public $str_frm_nome;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);
    $this->int_maxlength = 10;
    $this->int_size = 12;
    $this->str_on_keypress .= " formatar_data(this);";
    $this->str_on_blur .= " verifica_data(this);";
    $this->bol_carregar_data = true;
    $this->bol_converte_data = false;
    $this->str_mascara_data = "dd/mm/yyyy";
    $this->str_frm_nome = $this->str_entidade;
	}

	public function criar(){
    if ($this->str_valor != ""){
      if ($this->bol_converte_data){
	    	$obj_data = new com_data_configuracao();
	    	//Converte data do banco para data do usuário
	    	$this->str_valor = $obj_data->wd_obter($this->str_valor,$_SESSION["banco_tipo"]);
	    }

    }else if ($this->bol_carregar_data){
		  $this->str_valor = date('d/m/Y');
		}
    //$this->str_evento .=  " onBlur=\"javascript:VerificaData(document.".$this->str_entidade.".".$this->str_nome.");\"";
    parent::criar();

    $this->str_botao_calendario = " <img src=\"".$_SESSION["raiz_dwd_imagem"]."bt_calendario.gif\" alt=\"Clique para selecionar a data a partir do calend&aacute;rio\" align=\"middle\" style=\"cursor: pointer\" onclick=\"displayCalendar(document.".$this->str_frm_nome.$this->str_entidade.".".$this->str_nome.",'".$this->str_mascara_data."',this)\"> <span id=\"pop".$this->str_nome."\" style=\"position:absolute \"></span>";

    $this->str_componente = $this->str_componente;
		$this->str_componente .= $this->str_botao_calendario;

		echo $this->str_componente;
	}

}
?>


