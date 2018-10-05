<?php class com_edit extends componente{

	protected  $bol_align;
	protected  $str_align;
  public $bol_proteger;
  public $bol_desabilitar;
  public $str_on_blur;
  public $str_on_change;
  public $str_on_focus;
  public $str_on_keypress;

  public $str_evento_complemento;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);
	  $this->bol_align = false;
	  $this->bol_desabilitar = false;
	  $this->str_align = "";
	}

	public function criar($bol_automatico=false){

  	parent::criar();
    if ($this->bol_proteger){
    	$this->str_com .= "<input type=\"password\" ";
    }else{
			$this->str_com .= "<input type=\"text\" ";
		}
		$this->str_com .= "class=\"textInput\" ";
  	if ($this->bol_requerido){
      $str_requerido = "Campo requerido. ";
    }
		$this->str_com .= " title=\"".$str_requerido.$this->str_tela_help."\"";
  	$this->str_com .= "id=\"".$this->str_nome."\" ";
  	$this->str_com .= "name=\"".$this->str_nome."\" ";
	  if ($this->bol_align){
		  $this->str_com .= " style=\"text-align:".$this->str_align.";\"";
		}
  	$this->str_com .= "value=\"".$this->str_valor."\" ";
  	$this->str_com .= "size=\"".$this->int_size."\" ";
  	$this->str_com .= "maxlength=\"".$this->int_maxlength."\" ";
  	$this->str_com .= $this->str_css." ";
    //Define descrição da Ajuda para o campo
  	if ($this->str_descricao){
			$this->str_on_blur .= $this->str_on_blur." wd_conteudo_dinamico('','cabecalho_ajuda_campo_".$this->str_entidade."');";
			$this->str_on_blur .= " wd_conteudo_dinamico('','rodape_ajuda_campo_".$this->str_entidade."'); ";
  	}
  	if ($this->str_descricao){
			$this->str_on_focus .= " wd_conteudo_dinamico('<strong>Ajuda do Campo (".$this->str_nome_descricao."):</strong> ".$this->str_descricao."','cabecalho_ajuda_campo_".$this->str_entidade."');";
			$this->str_on_focus .= " wd_conteudo_dinamico('<strong>Ajuda do Campo (".$this->str_nome_descricao."):</strong> ".$this->str_descricao."','rodape_ajuda_campo_".$this->str_entidade."'); ";
  	}
  	if ($this->str_on_focus != ""){
  		$this->str_com .= " onFocus=\"".$this->str_on_focus." \"";
  	}
  	if ($this->str_on_change != ""){
  	  $this->str_com .= " onChange=\"".$this->str_on_change." \"";
  	}
  	if ($this->str_on_keypress != ""){			$this->str_com .= " onkeypress=\"".$this->str_on_keypress." \"";
  	}
  	if ($this->str_on_blur != ""){
  		$this->str_com .= " onBlur=\"".$this->str_on_blur." \"";
  	}
    if ($this->str_evento != ""){
			$this->str_com .= $this->str_evento;
		}

  	//$this->str_com .= $this->str_add_evento;
    $this->str_com .= $this->str_requerido;
    if ($this->bol_desabilitar) {
      $this->str_com .=	" disabled ";
    }
    $this->str_com .= " > ".$this->str_desc_complemento;
    if ($this->str_help != ""){
		  $this->str_com .= "</td></tr></table>";
		}
    $this->str_componente = $this->str_com;
	  if	($bol_automatico){
	  	echo $this->str_componente;
	  }
	}
}
?>