<?php
abstract class componente {

	protected $str_tela_help;
  protected $str_entidade;
  protected $str_com;
  protected $bol_requerido;

	public $str_nome;
  public $str_componente;
	public $str_valor;
	public $str_evento;
	public $str_mascara;
	public $str_css;
	public $str_help;
	public $int_maxlength;
	public $int_size;
	public $bol_imagem_help_exibir;

	public function __construct($str_nome="",$str_entidade,$bol_requerido=false){

    $this->bol_imagem_help_exibir = true;
	  $this->str_entidade = $str_entidade;
	  $this->str_nome = $str_entidade."_dwd_".$str_nome;
	  $this->bol_requerido = $bol_requerido;

	}

	public function criar(){
		$this->str_com = "";
		$this->str_botao_help = "";
		if ($this->bol_requerido){
			if ($this->str_help != ""){
			  $this->str_alt_requerido = "(*) Campo Requerido. Saiba mais...";
	     	$this->str_tela_help = "(*) Campo Requerido.\n".$this->str_help;
			}

    	//$this->str_requerido = "<font size=\"2\" face=\"Tahoma\">(*)</font>";
    	$this->str_requerido = "onfocus=\"definir_cor(this,'#BCF1C1',0);\" onblur=\"definir_cor(this,'#FFFFFF',0);\"";
    }else{
		  $this->str_alt_requerido = "Saiba mais...";
		  $this->str_tela_help = $this->str_help;
		}
		if ($this->str_help != ""){
			$this->str_botao_help .= "<table><tr><td>";
			if ($this->bol_imagem_help_exibir){
  		  $this->str_botao_help .= "<img src=\"".$_SESSION["diretorio_imagem"]."ajuda.gif\" alt=\"".$this->str_alt_requerido."\" align=\"middle\" style=\"cursor: hand\" onclick=\"javascript:wd_pop_ajuda('document.".$this->str_entidade.".".$this->str_nome."','pop".$this->str_nome."','".$this->int_tamanho_tela."',document.".$this->str_entidade.".".$this->str_nome.".value,'".$this->str_help."')\"> <span id=\"pop".$this->str_nome."\" style=\"position:absolute \"></span>";
  		}
	  	$this->str_botao_help .= "</td><td>";
  	}
   	$this->str_com .= $this->str_botao_help;

	}

	public function __destruct(){

	}
}
?>