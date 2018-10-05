<?php
class com_edit_oculto extends componente{

  public $str_evento_complemento;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);
	}

	public function criar(){

  	parent::criar();
 		$this->str_com .= "<input type=\"hidden\" ";

  	$this->str_com .= "id=\"".$this->str_nome."\" ";
  	$this->str_com .= "name=\"".$this->str_nome."\" ";
  	$this->str_com .= "value=\"".$this->str_valor."\" ";
    $this->str_com .= " >";
    echo $this->str_com;

	}

}
?>