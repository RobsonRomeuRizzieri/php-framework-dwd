<?php
class com_edit_texto extends componente{

  public $int_linhas;

  public $int_colunas;

  public $str_evento_complemento;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);
	  $this->int_colunas = 65;
	  $this->int_linhas = 3;
	}

	public function criar(){

  	parent::criar();
		$this->str_com .= "<textarea ";
		$this->str_com .= "class=\"textInput\" ";
  	if ($this->bol_requerido){
      $str_requerido = "Campo requerido. ";
    }
		$this->str_com .= " title=\"".$str_requerido.$this->str_tela_help."\"";
  	$this->str_com .= "id=\"".$this->str_nome."\" ";
  	$this->str_com .= "name=\"".$this->str_nome."\" ";
    $this->str_com .= "cols=\"".$this->int_colunas."\" ";
    $this->str_com .= "rows=\"".$this->int_linhas."\" ";
  	$this->str_com .= $this->str_css." ";
		$this->str_com .= $this->str_evento;
  	$this->str_com .= $this->str_requerido." >";
  	$this->str_com .= $this->str_valor;
  	//$this->str_com .= $this->str_add_evento;
    $this->str_com .= " </textarea>";
    if ($this->str_help != ""){
		  $this->str_com .= "</td></tr></table>";
		}

    $this->str_componente = $this->str_com;

	}

}
?>