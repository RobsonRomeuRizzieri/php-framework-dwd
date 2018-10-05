<?php
class com_checkbox extends componente{

  public $bol_checado;
  public $str_descricao;
  public $str_desc_complemento;
  public $str_nome_descricao;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);
//	  $this->str_entidade = $str_entidade;
	  $this->bol_checado = true;
	}

	public function criar(){


  	parent::criar();
		$this->str_com .= "<input type=\"checkbox\" ";
		$this->str_com .= "class=\"textInput\" ";
  	if ($this->bol_requerido){
      $str_requerido = "Campo requerido. ";
    }
    if ($this->str_valor == "1"){
      $this->bol_checado = true;
    }	else{
      $this->bol_checado = false;
    }
		$this->str_com .= " title=\"".$str_requerido.$this->str_tela_help."\"";
  	$this->str_com .= "id=\"".$this->str_nome."\" ";
  	$this->str_com .= "name=\"".$this->str_nome."\" ";
  	$this->str_com .= "value=\"1\" ";
  	$this->str_com .= $this->str_css." ";
    //Define descrição da Ajuda para o campo
  	if ($this->str_descricao){
			$this->str_com .= " onBlur=\"wd_conteudo_dinamico('','cabecalho_ajuda_campo_".$this->str_entidade."');";
			$this->str_com .= " wd_conteudo_dinamico('','rodape_ajuda_campo_".$this->str_entidade."');\"";
  	}
  	if ($this->str_descricao){
			$this->str_com .= " onFocus=\"wd_conteudo_dinamico('<strong>Ajuda do Campo (".$this->str_nome_descricao."):</strong> ".$this->str_descricao."','cabecalho_ajuda_campo_".$this->str_entidade."');";
			$this->str_com .= " wd_conteudo_dinamico('<strong>Ajuda do Campo (".$this->str_nome_descricao."):</strong> ".$this->str_descricao."','rodape_ajuda_campo_".$this->str_entidade."');\"";
  	}

    if ($this->bol_checado){
      $this->str_com .= " checked=\"checked\" ";
    }

  	//$this->str_com .= $this->str_add_evento;
    $this->str_com .= " >&nbsp;&nbsp;";
		$this->str_com .= $this->str_desc_complemento;
    if ($this->str_help != ""){
		  $this->str_com .= "</td></tr></table>";
		}
    echo $this->str_com;

	}

}
?>