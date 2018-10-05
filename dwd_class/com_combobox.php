<?php class com_combobox extends componente{

  private $str_inf;
  public $arr_item;
  public $bol_item_selecao;
  public $str_on_blur;
  public $str_on_change;
  public $str_on_focus;
  public $arr_combobox_detalhe;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);

	  $this->bol_item_selecao = true;
	}

	public function criar(){

  	parent::criar();

		$this->str_com .= "<select ";
		$this->str_com .= "class=\"textInput\" ";
  	if ($this->bol_requerido){
      $str_requerido = "Campo requerido. ";
    }
		$this->str_com .= " title=\"".$str_requerido.$this->str_tela_help."\"";
  	$this->str_com .= "id=\"".$this->str_nome."\" ";
  	$this->str_com .= $this->str_evento;
  	if ($this->arr_combobox_detalhe["local_atualizar"] != ""){  		if ($this->arr_combobox_detalhe["evento"] == "onBlur"){  			$this->str_on_blur .= " executar_exibir_combo('".$this->str_nome."','".$this->arr_combobox_detalhe["arquivo"]."?a=1&valor_pai=".$this->str_valor."','".$this->arr_combobox_detalhe["local_atualizar"]."','GET','','',1,1); ";
  		}else{  			$this->str_on_change .= " executar_exibir_combo('".$this->str_nome."','".$this->arr_combobox_detalhe["arquivo"]."?a=1&valor_pai=".$this->str_valor."','".$this->arr_combobox_detalhe["local_atualizar"]."','GET','','',1,1); ";
  		}
  	}
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
  	if ($this->str_on_blur != ""){  		$this->str_com .= " onBlur=\"".$this->str_on_blur." \"";
  	}
  	if ($this->str_on_change != ""){
  	  $this->str_com .= " onChange=\"".$this->str_on_change." \"";
  	}

  	$this->str_com .= "name=\"".$this->str_nome."\" ".$this->str_requerido.">";
  	if ($this->bol_item_selecao){
      $this->str_com .= "<option value=\"0\">--Selecione--</option>";
    }
    $int_cont_item = count($this->arr_item);
 		for ($i = 0; $i < $int_cont_item; $i++) {
 	    if (($this->arr_item[$i]["valor"] != "") ||($this->arr_item[$i]["descricao"] != "")){
         if ($this->str_valor == $this->arr_item[$i]["valor"]){
				   $str_selected = "selected";
				 }else{
  				 $str_selected = "";
				}
			   $this->str_com .= "<option value=\"".$this->arr_item[$i]["valor"]."\" ".$str_selected.">".$this->arr_item[$i]["descricao"]."</option>";
			}
 		}
 		$this->str_com .= "</select>";
  	$this->str_com .= $this->str_css." ";
    if ($this->str_help != ""){
		  $this->str_com .= "</td></tr></table>";
		}
    $this->str_componente = $this->str_com;
    echo $this->str_componente;
	}

}
?>