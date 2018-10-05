<?php
class frm_campo {
  public $str_campo;
  public $arr_campo;
  public $str_nome;
  public $str_apos_form;
  public $str_frm_nome;
  private $str_entidade;
  private $bol_campo_requerido;
	public function __construct($str_entidade="",$itc=0,$bol_campo_requerido=false){
  	if ($str_entidade == ""){
  	  echo "Não foi definida a entidade para o campo";
  	}else{
  	  $this->str_entidade = $str_entidade;
  	}
		$this->con_bol_descricao_exibir = "sim";
  	$this->bol_campo_requerido = $bol_campo_requerido;
  	$this->str_nome = "";
  	$this->itc = $itc;
  }

  public function criar(){    if ($this->str_nome == ""){    	$this->str_nome = $this->arr_campo[$this->itc]["nome"];
    }
  	if ($this->str_campo == "oculto"){  	  $this->oculto($this->itc);
  	}
  	if ($this->str_campo == "texto"){
  	  $this->texto($this->itc);
  	}
  	if ($this->str_campo == "texto_lookup"){
  	  $this->texto_lookup($this->itc);
  	}
  	if ($this->str_campo == "senha"){
  	  $this->senha($this->itc);
  	}
  	if ($this->str_campo == "checkbox"){
  	  $this->checkbox($this->itc);
  	}
  	if ($this->str_campo == "combobox_dinamico"){
  	  $this->combobox_dinamico($this->itc);
  	}
  	if ($this->str_campo == "data_dia"){
  	  $this->data_dia($this->itc);
  	}
  	if ($this->str_campo == "data_mes"){
  	  $this->data_mes($this->itc);
  	}
  	if ($this->str_campo == "data_ano"){
  	  $this->data_ano($this->itc);
  	}
  	if ($this->str_campo == "hora"){
  	  $this->hora($this->itc);
  	}
  	if ($this->str_campo == "texto_longo"){
  	  $this->texto_longo($this->itc);
  	}
  	if ($this->str_campo == "data"){
  	  $this->data($this->itc);
  	}
    if ($this->str_campo == "texto_arquivo"){      $this->texto_arquivo($this->itc);
    }
    if ($this->str_campo == "combobox_fixo"){
      $this->combobox_fixo($this->itc);
    }
    if ($this->str_campo == "texto_cpf_cnpj"){      $this->texto_cpf_cnpj($this->itc);
    }
  }

  private function oculto($itc=0){
    //Cria o campo se o mesmo for oculto
   	if ($this->arr_campo[$itc]["cad_tipo_campo"] == "oculto"){
      $obj = new com_edit_oculto($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
      $obj->str_valor = $this->arr_campo[$itc]["valor"];
 			$obj->criar();
   	}
  }

  private function texto($itc=0){
   	//Cria componente do tipo edit(Text)
   	if ($this->arr_campo[$itc]["cad_tipo_campo"] == "texto"){
      $obj = new com_edit($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
      $obj->str_valor = $this->arr_campo[$itc]["valor"];
      $obj->int_size = $this->arr_campo[$itc]["cad_tamanho"];
 			$obj->criar(true);
   	}
	}

  private function texto_lookup($itc=0){
   	//Cria componente do tipo edit(Text)
   	if ($this->arr_campo[$itc]["cad_tipo_campo"] == "texto_lookup"){
      $obj = new com_edit_lookup($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
      $obj->str_valor = $this->arr_campo[$itc]["valor"];
      $obj->str_valor_chave = $this->arr_campo[$itc]["valor_chave"];
      $obj->str_valor_resultado = $this->arr_campo[$itc]["valor_resultado"];
      $obj->int_size = $this->arr_campo[$itc]["cad_tamanho"];
      $obj->int_size_resultado = $this->arr_campo[$itc]["cad_tamanho_resultado"];
 			$obj->criar(true);
   	}
	}

	private function data($itc=0){
   	//Cria componente no formato date
   	if ($this->arr_campo[$itc]["cad_tipo_campo"] == "data"){
			$obj = new com_edit_data($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
			$obj->str_valor = $this->arr_campo[$itc]["valor"];
			if ($this->str_frm_nome != ""){
			  $obj->str_frm_nome = $this->str_frm_nome;
			}
			$obj->str_img = "";
			if ($this->arr_campo[$itc]["cad_carrega_data"] == "sim"){
			  $obj->bol_carrega_data = true;
			}else{
				$obj->bol_carrega_data = false;
			}
			//Se estiver editando converte data do banco informado para o formato "dd/mm/aaaa"
			if ($this->str_status == "editar"){
				$obj->bol_converte_data = true;
		  }else{
				if ($this->arr_campo[$itc]["cad_converte_data"] == "sim"){
				  $obj->bol_converte_data = true;
				}else{
				  $obj->bol_converte_data = false;
				}
		  }
			$obj->criar();
   	}
  }

  private function senha($itc=0){
   	//Cria componente do tipo edit(Senha)
   	if ($this->arr_campo[$itc]["cad_tipo_campo"] == "senha"){
       $obj = new com_edit($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
       //$obj->str_valor = $this->arr_campo[$itc]["valor"];
       $obj->bol_proteger = true;
       $obj->int_size = $this->arr_campo[$itc]["cad_tamanho"];
 			$obj->criar(true);
   	}
	}

	private function checkbox($itc=0){
   	//Cria componente do tipo edit(Senha)
   	if ($this->arr_campo[$itc]["cad_tipo_campo"] == "checkbox"){
      $obj = new com_checkbox($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
      $obj->str_valor = $this->arr_campo[$itc]["valor"];
      $obj->bol_checado = $this->arr_campo[$itc]["cad_bol_checado"];
      if ($this->con_bol_descricao_exibir == "sim"){
      $obj->str_desc_complemento = $this->arr_campo[$itc]["descricao_complemento"];
      }
			$obj->criar();
     }
  }

  private function combobox_dinamico($itc=0){
     if ($this->arr_campo[$itc]["cad_tipo_campo"] == "combobox_dinamico"){
       $obj = new com_combobox_dinamico($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
		   $obj->arr_lookup["tabela"] = $this->arr_campo[$itc]["lookup_tabela"];
			 $obj->arr_lookup["chave"] = $this->arr_campo[$itc]["lookup_chave"];
			 $obj->arr_lookup["chave_tipo"] = $this->arr_campo[$itc]["lookup_chave_tipo"];
			 $obj->arr_lookup["retorno"] = $this->arr_campo[$itc]["lookup_retorno"];
			 $obj->arr_lookup["retorno_tipo"] = $this->arr_campo[$itc]["lookup_retorno_tipo"];
			 $obj->arr_lookup["valor"] = $this->arr_campo[$itc]["valor"];
			 $obj->str_on_change .= $this->arr_campo[$itc]["str_on_change"];
       $cont_filtro = count($this->arr_campo[$itc]["arr_filtro"]);
       $arr_filtro = $this->arr_campo[$itc]["arr_filtro"];
       for ($i = 0; $i < $cont_filtro; $i++){
				 $obj->arr_lookup_filtro[$i]["condicao"] = $arr_filtro[$i]["condicao"];
				 $obj->arr_lookup_filtro[$i]["nome"] = $arr_filtro[$i]["nome"];
				 $obj->arr_lookup_filtro[$i]["tipo"] = $arr_filtro[$i]["tipo"];
				 $obj->arr_lookup_filtro[$i]["operacao"] = $arr_filtro[$i]["operacao"];
				 $obj->arr_lookup_filtro[$i]["valor"] = $arr_filtro[$i]["valor"];
				 $obj->arr_lookup_filtro[$i]["valor2"] = $arr_filtro[$i]["valor2"];
			 }
		   $obj->criar();
     }

  }

  private function data_dia($itc=0){
    if ($this->arr_campo[$itc]["cad_tipo_campo"] == "data_dia"){
      $obj_com = new com_edit_data_individual($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
	    //$obj_com->str_campo_dia = "dia";
	    //$obj_com->str_campo_mes = "mes";
	    //$obj_com->str_campo_ano = "ano";
    	$obj_com->str_on_change .= $this->arr_campo[$itc]["str_on_change"];
	    if (isset($_GET["dia"])){
	    	$obj_com->str_campo_dia_valor = $_GET["dia"];
	    }else{
	      $obj_com->str_campo_dia_valor = $this->arr_campo[$itc]["valor"];
	    }
			$obj_com->criar_dia();
     }

  }

  private function data_mes($itc=0){
    if ($this->arr_campo[$itc]["cad_tipo_campo"] == "data_mes"){
      $obj_com = new com_edit_data_individual($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
	    //$obj_com->str_campo_dia = "dia";
	    //$obj_com->str_campo_mes = "mes";
	    //$obj_com->str_campo_ano = "ano";
     	$obj_com->str_on_change .= $this->arr_campo[$itc]["str_on_change"];
	    if (isset($_GET["mes"])){
	    	$obj_com->str_campo_mes_valor = $_GET["mes"];
	    }else{
	      $obj_com->str_campo_mes_valor = $this->arr_campo[$itc]["valor"];
	    }
	  	$obj_com->criar_mes();
    }
  }

  private function data_ano($itc=0){
    if ($this->arr_campo[$itc]["cad_tipo_campo"] == "data_ano"){
      $obj_com = new com_edit_data_individual($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
      //$obj_com->str_campo_dia = "dia";
      //$obj_com->str_campo_mes = "mes";
      //$obj_com->str_campo_ano = "ano";
     	$obj_com->str_on_change .= $this->arr_campo[$itc]["str_on_change"];
	    if (isset($_GET["ano"])){
	    	$obj_com->str_campo_ano_valor = $_GET["ano"];
	    }else{
	      $obj_com->str_campo_ano_valor = $this->arr_campo[$itc]["valor"];
	    }
  		$obj_com->criar_ano();
    }
  }

  private function hora($itc=0){
    if ($this->arr_campo[$itc]["cad_tipo_campo"] == "hora"){
      $obj_com = new com_edit_hora($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
  		$obj_com->int_size = $this->arr_campo[$itc]["cad_tamanho"];
	  	if (isset($_GET["hora"])){
		  	$obj_com->str_valor = $_GET["hora"];
		  }else{
        $obj_com->str_valor = $this->arr_campo[$itc]["valor"];
      }
  		$obj_com->criar();
    }
  }

  private function texto_longo($itc=0){
    if ($this->arr_campo[$itc]["cad_tipo_campo"] == "texto_longo"){
        $obj_com = new com_edit_texto($this->str_nome,$this->str_entidade,$bol_campo_requerido);
     $obj_com->str_valor = $this->arr_campo[$itc]["valor"];
     if ($this->arr_campo[$itc]["cad_tamanho"] != ""){
			  $obj_com->int_colunas = $this->arr_campo[$itc]["cad_tamanho"];
	  }else{
			  $obj_com->int_colunas = 65;
	  }
	  if ($this->arr_campo[$itc]["cad_tamanho_linhas"] != ""){
			  $obj_com->int_linhas = $this->arr_campo[$itc]["cad_tamanho_linhas"];
	  }else{
			  $obj_com->int_linhas = 3;
    }
	  	$obj_com->criar();
  		echo $obj_com->str_componente;
    }
  }

  private function texto_arquivo($itc=0){
    if ($this->arr_campo[$itc]["cad_tipo_campo"] == "texto_arquivo"){
      $obj_com = new com_edit_arquivo($this->str_nome,$this->str_entidade,$bol_campo_requerido);
      $obj_com->str_valor = $this->arr_campo[$itc]["valor"];
      $obj_com->int_size = $this->arr_campo[$itc]["cad_tamanho"];
	  	$obj_com->str_tipo_arquivo = $this->arr_campo[$itc]["str_tipo_arquivo"];
   		$obj_com->str_pasta_principal = $this->arr_campo[$itc]["str_pasta_principal"];
	  	$obj_com->criar();
	  	$this->str_apos_form = $obj_com->str_arquivo;
  		echo $obj_com->str_componente;
    }
  }

  private function combobox_fixo($itc=0){
    if ($this->arr_campo[$itc]["cad_tipo_campo"] == "combobox_fixo"){
		  $obj = new com_combobox_fixo($this->str_nome,$this->str_entidade,$bol_campo_requerido);
			$obj->bol_item_selecao = true;
			$obj->arr_item = $this->arr_campo[$itc]["arr_item"];
    	$obj->str_on_change .= $this->arr_campo[$itc]["str_on_change"];
			$obj->str_valor = $this->arr_campo[$itc]["valor"];
			$obj->criar();
    }

  }

  private function texto_cpf_cnpj($itc=0){   	//Cria componente do tipo edit(Text)
   	if ($this->arr_campo[$itc]["cad_tipo_campo"] == "texto_cpf_cnpj"){
      $obj = new com_edit_cpf_cnpj($this->str_nome,$this->str_entidade,$this->bol_campo_requerido);
      $obj->str_valor = $this->arr_campo[$itc]["valor"];
      $obj->int_size = 20;
 			$obj->criar();
   	}

  }

}
?>