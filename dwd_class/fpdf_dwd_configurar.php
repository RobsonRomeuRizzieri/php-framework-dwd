<?php
class fpdf_dwd_configurar{  public $obj_entidade;

  public function criar(){		?>
		<table width="500">
		  <tr>
		    <td>
		      <strong>Configuração do relatório</strong>
				</td>
				<td align="right">
					<img onclick="menu_dinamico_conteudo('','menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>');" title="Sair tela de gerenciamento dos arquivos" src="../dwd_img/bt_fechar.gif" align="middle" style="cursor: pointer">
				</td>
			</tr>
		</table>
    <table class="dwd_table"><tr class="dwd_tr_title">
	    <td class="dwd_th_left">Campo</td>
	    <td class="dwd_th_center">Exibir</td>
	    <td class="dwd_th_left">Tamanho</td>
  	</tr>
		<?php
		$cont_campo = count($this->obj_entidade->arr_campo);
		for ($i = 0; $i < $cont_campo; $i++){			$con_itc++;
		  if (($con_itc % 2) ==0)
		  	$classe = "tb_item_valor_coluna_par";
      else
      	$classe = "tb_item_valor_coluna_impar";
?>    <tr class="tb_item_valor_linha">
        <td class="<?php echo $classe ?>">
        <?php echo $this->obj_entidade->arr_campo[$i]["descricao"];?>
        </td>
        <td align="center" class="<?php echo $classe ?>">
<?php
	      $objv = new com_checkbox("rel".$i,$this->obj_entidade->str_entidade,true);
	      if ($this->obj_entidade->arr_campo[$i]["rel_exibir"] != "nao"){
	        $objv->str_valor = 1;
	      }else{	      	$objv->str_valor = 0;
	      }
	      //$obj->str_desc_complemento = $this->arr_campo[$itc]["descricao_complemento"];
				$objv->criar();
?>
        </td>
        <td class="<?php echo $classe ?>">
<?php   $obj = new com_edit("rel_ta".$i,$this->obj_entidade->str_entidade,true);
        if ($this->obj_entidade->arr_campo[$i]["rel_int_tamanho"] == ""){        	$obj->str_valor = "30";
        }else{
          $obj->str_valor = $this->obj_entidade->arr_campo[$i]["rel_int_tamanho"];
        }
        $obj->int_size = 5;
  			$obj->criar(true);
?>
        </td>
      </tr>
<?php		  //echo $this->entidade->arr_campo[$i]["nome"]." Teste <br>";
		}
?>  </table>
	<br>
<?php echo "Formatar a página na: ";
      $obj = new com_combobox_fixo("tipo_pagina",$this->obj_entidade->str_entidade,false);
			$obj->bol_item_selecao = true;
			$obj->arr_item[0]["valor"] = "V";
			$obj->arr_item[0]["descricao"] = "Vertical";
			$obj->arr_item[1]["valor"] = "H";
			$obj->arr_item[1]["descricao"] = "Horizontal";
			if ($this->obj_entidade->rel_tipo_pagina != ""){
  			$obj->str_valor = $this->obj_entidade->rel_tipo_pagina;
			}else{				$obj->str_valor = "V";
			}
			$obj->criar();

      $frm_nome_temp =  $this->obj_entidade->frm_str_nome;
	    //Determina o indice da tab
	    $frm_nome_temp = str_replace("tabViewdhtmlgoodies_tabView2_","",$frm_nome_temp);
	    $int_tab = str_replace("resultado_filtro","",$frm_nome_temp);
?>
	<br><br>

	<fieldset>
	  <label class="botao_menu_dinamico lblbotao"><input value="Gerar PDF" class="botao_detalhe" name="frm_con_copiar" id="frm_con_copiar" type="button" onClick="fpdf_relatorio_exibir('<?php echo $this->obj_entidade->str_arquivo_relatorio_executar?>?a=1','<?php echo $this->obj_entidade->str_entidade?>',<?php echo $cont_campo?>,<?php echo $int_tab?>);""></label>
	  <label class="botao_menu_dinamico lblbotao"><input value="Gerar PDF e Fechar Config." class="botao_detalhe" name="frm_con_copiar" id="frm_con_copiar" type="button" onClick="menu_dinamico_conteudo('','menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>'); fpdf_relatorio_exibir('<?php echo $this->obj_entidade->str_arquivo_relatorio_executar?>?a=1','<?php echo $this->obj_entidade->str_entidade?>',<?php echo $cont_campo?>,<?php echo $int_tab?>);""></label>
	</fieldset>
  <div id="rel_result<?php echo $this->obj_entidade->str_entidade?>"></div>
<?php
  }

}
?>