<?php
class frm_consulta extends frm{
  private $str_con_campo;

  public $int_valor_chave;
  public $str_campo_chave;

  public $obj_entidade;
  public $str_arquivo_consulta;
  public $str_consulta_local;
  public $str_campo_filtro;
  public $int_total_filtro;
  public $bol_consultar;
  public $bol_novo;
  public $bol_gravar;
  public $bol_editar;

  public function criar(){
    $obj_acesso = new tabela_acesso(false);
    $obj_acesso->verificar_acesso($this->obj_entidade->str_entidade,$_SESSION["usuario_grupo_id"]);
    $this->bol_consultar = $obj_acesso->bol_consultar;
    $this->bol_novo = $obj_acesso->bol_novo;
    $this->bol_gravar = $obj_acesso->bol_novo;
    $this->bol_editar = $obj_acesso->bol_editar;
    $this->bol_excluir = $obj_acesso->bol_excluir;
    //Determina o local de criação do formulário
    $this->obj_entidade->str_cadastro_local = $this->obj_entidade->frm_str_nome;
    $this->obj_entidade->str_consulta_local = $this->obj_entidade->frm_str_nome;

    if ($this->obj_entidade->str_cadastro_arquivo != ""){
      $this->str_cadastro_arquivo = $this->obj_entidade->str_cadastro_arquivo;
    }
    if ($this->obj_entidade->str_cadastro_arquivo != ""){
      $this->str_cadastro_local = $this->obj_entidade->str_cadastro_local;
    }
    if ($this->obj_entidade->str_consulta_arquivo_executar != ""){
    	$this->str_arquivo_consulta = $this->obj_entidade->str_consulta_arquivo_executar;
    	$this->str_consulta_local = "resultado_filtro".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade;
    }
    if ($this->obj_entidade->bol_detalhe){
      $this->obj_entidade->str_cadastro_local = $_GET["detalhe_local"];
      $this->obj_entidade->str_consulta_local = $_GET["detalhe_local"];
      $arr_campo_detalhe = explode("_dwd_",$this->str_campo_chave);
			$this->obj_entidade->arr_filtro[0]["condicao"] = "Robson";
			$this->obj_entidade->arr_filtro[0]["nome"] = $arr_campo_detalhe[0]."_".$arr_campo_detalhe[1];
			$this->obj_entidade->arr_filtro[0]["tipo"] = "integer";
			$this->obj_entidade->arr_filtro[0]["operacao"] = "=";
			$this->obj_entidade->arr_filtro[0]["valor"] = $this->int_valor_chave;
			$this->obj_entidade->arr_filtro[0]["valor2"] = "0";

    }
		// Pegar a página atual por GET
		$p = $_GET["p"];
		// Verifica se a variável tá declarada, senão deixa na primeira página como padrão
		if(isset($p)) {
  		$p = $p;
		} else {
	  	$p = 1;
		}
		// Defina aqui a quantidade máxima de registros por página.
		$qnt = 5;
		// O sistema calcula o início da seleção calculando:
		// (página atual * quantidade por página) - quantidade por págia
		$inicio = ($p*$qnt) - $qnt;
		// Seleciona no banco de dados com o LIMIT indicado pelos números acima
		$sql_complementar = " LIMIT $inicio, $qnt";
		// Executa o Query
    $matriz = $this->obj_entidade->consultar("",$sql_complementar);
    //Define descrição das colunas
    $int_campo_tot = count($this->obj_entidade->arr_campo);
?>
    <form name="frm_con_menu_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>" action="" method="post">
    <table class="tb_frm_consulta">
      <tr class="frm_con_linha_cabecalho">
        <td colspan="<?php echo $int_campo_tot+2?>" class="frm_con_coluna_cabecalho">
		      <fieldset>
<?php   if ($this->obj_entidade->bol_detalhe){
          if ($this->bol_novo){ ?>
		        <label class="botao_filtrar lblbotao"><button class="botao" name="frm_con_nov<?php echo $this->obj_entidade->str_entidade?>" id="frm_con_nov<?php echo $this->obj_entidade->str_entidade?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_cadastro_arquivo ?>?a=1&status=gravar&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>&valor_chave_mestre=<?php echo $this->int_valor_chave?>&valor_mestre=<?php echo $this->int_valor_chave?>&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>','<?php echo $this->obj_entidade->str_cadastro_local?>','GET','','',1,1,'../dwd_img'); return false;"><u>N</u>ovo</button></label>
<?php     }
					if ($this->obj_entidade->str_arquivo_relatorio != ""){
?>        <label class="botao_filtrar lblbotao"><button class="botao_detalhe" name="frm_con_imp<?php echo $this->obj_entidade->str_entidade?>" id="frm_con_imp<?php echo $this->obj_entidade->str_entidadee?>" onClick="menu_dinamico_posicao(event,'menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>',160); executar_exibir_img('<?php echo $this->obj_entidade->str_arquivo_relatorio ?>?a=1','menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>','GET','','',1,1,'../dwd_img'); return false;">Imprimir PDF</button></label>
<?php     }
        }else{          if ($this->bol_novo){ ?>
		        <label class="botao_filtrar lblbotao"><button class="botao" name="frm_con_nov<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_con_nov<?php echo $this->obj_entidade->frm_str_nome?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_cadastro_arquivo ?>?a=1&status=gravar&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>&valor_chave_mestre=<?php echo $this->int_valor_chave?>&valor_mestre=<?php echo $this->int_valor_chave?>&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>','<?php echo $this->obj_entidade->str_cadastro_local?>','GET','','',1,1,'../dwd_img'); return false;"><u>N</u>ovo</button></label>
<?php     }
					if ($this->obj_entidade->str_arquivo_relatorio != ""){
?>        <label class="botao_filtrar lblbotao"><button class="botao_detalhe" name="frm_con_imp<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_con_imp<?php echo $this->obj_entidade->frm_str_nome?>" onClick="menu_dinamico_posicao(event,'menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>',160); executar_exibir_img('<?php echo $this->obj_entidade->str_arquivo_relatorio ?>?a=1','menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>','GET','','',1,1,'../dwd_img'); return false;">Imprimir PDF</button></label>
<?php     }
        }
          $cont = count($this->obj_entidade->arr_menu_dinamico);
          for ($im = 0; $im < $cont; $im++){ ?>
		        <label class="botao_menu_dinamico lblbotao"><button class="botao_detalhe" name="frm_con_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->arr_menu_dinamico[$im]["nome_cientifico"]?>" id="frm_con_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->arr_menu_dinamico[$im]["nome_cientifico"]?>" onClick="menu_dinamico_posicao(event,'menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>',160); executar_exibir_img('<?php echo $this->obj_entidade->arr_menu_dinamico[$im]["arquivo"] ?>','menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>','GET','','',1,1,'../dwd_img'); return false;"><?php echo $this->obj_entidade->arr_menu_dinamico[$im]["nome"]?></button></label>
<?php     }
?>	      </fieldset>
        </td>
      </tr>
    </table>
    <div class="compromisso_resumido" style=" display:none; position:absolute; background-color:#ffffff; color:#000000; " id="menu_dinamico_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>"></div>
    </form>
    <br>
    <form name="consulta_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>" action="" method="post">
    <table class="dwd_table" border="0">
<?php if ($this->obj_entidade->con_inserir_cad == "sim"){?>
     <tr class="dwd_tr_title">
<?php
      $this->str_con_campo = "";
      for ($ict = 0; $ict < $int_campo_tot; $ict++){
	      if (($this->obj_entidade->arr_campo[$ict]["con_exibir"] == "") ||
	         ($this->obj_entidade->arr_campo[$ict]["con_exibir"] == "sim")){
?>      <td class="dwd_th_left"> <?php
          //echo " teste:".array_search("agenda_hora_fim_id",$this->obj_entidade->arr_campo);
	        $int_indice = -1;
	        if ($this->obj_entidade->arr_campo[$ict]["entidade"] != ""){
	        	if ($this->obj_entidade->arr_campo[$ict]["entidade_campo_chave"] != ""){
	        		$int_indice = $this->obj_entidade->obter_indice_campo($this->obj_entidade->arr_campo[$ict]["entidade_campo_chave"]);
	        	}else{
					    $int_indice = $this->obj_entidade->obter_indice_campo($this->obj_entidade->arr_campo[$ict]["entidade"]."_id");
					  }
            $obj_campo = new frm_campo($this->obj_entidade->str_entidade,$int_indice,true);
	          $obj_campo->str_campo = $this->obj_entidade->arr_campo[$int_indice]["cad_tipo_campo"];
  					$this->obj_entidade->arr_campo[$int_indice]["cad_tipo_campo"];
			      if ($this->str_con_campo == ""){
			        $this->str_con_campo = $this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$int_indice]["nome"];
			      }else{
			      	$this->str_con_campo .= ";dwd;".$this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$int_indice]["nome"];
			      }
					}else{
			      if ($this->str_con_campo == ""){
			        $this->str_con_campo = $this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$ict]["nome"];
			      }else{
			      	$this->str_con_campo .= ";dwd;".$this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$ict]["nome"];
			      }
						$obj_campo = new frm_campo($this->obj_entidade->str_entidade,$ict,true);
	          $obj_campo->str_campo = $this->obj_entidade->arr_campo[$ict]["cad_tipo_campo"];
   					$this->obj_entidade->arr_campo[$ict]["cad_tamanho"] = 15;
					}
	        $obj_campo->arr_campo = $this->obj_entidade->arr_campo;
	        $obj_campo->con_bol_descricao_exibir = "nao";
	        $obj_campo->criar();
	        $str_apos_form .= $obj_campo->str_apos_form;
?>      </td><?php
        }
	 		}
?>
        <td align="center" colspan="2" class="dwd_th_left">
<?php if ($this->obj_entidade->bol_detalhe){?>
 	          <label class="botao_filtrar lblbotao" align="center"><button class="botao" name="frm_con_gra<?php echo $this->obj_entidade->str_entidade?>" id="frm_con_gra<?php echo $this->obj_entidade->str_entidade?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_resultado_arquivo?>?a=1&str_campo=<?php echo $this->str_con_campo?>&status=gravar&origem=<?php echo $this->obj_entidade->str_consulta_arquivo?>','<?php echo $this->obj_entidade->frm_str_nome?>','POST','<?php echo $this->str_con_campo?>',document.consulta_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade ?>,0,0,'../dwd_img'); return false;">G<u>r</u>avar</button></label>
<?php }else{?>
 	          <label class="botao_filtrar lblbotao" align="center"><button class="botao" name="frm_con_gra<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_con_gra<?php echo $this->obj_entidade->frm_str_nome?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_resultado_arquivo?>?a=1&str_campo=<?php echo $this->str_con_campo?>&status=gravar&origem=<?php echo $this->obj_entidade->str_consulta_arquivo?>','<?php echo $this->obj_entidade->frm_str_nome?>','POST','<?php echo $this->str_con_campo?>',document.consulta_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade ?>,0,0,'../dwd_img'); return false;">G<u>r</u>avar</button></label>
<?php }?>
        </td>
     </tr>
<?php } ?>

      <tr class="dwd_tr_title">
<?php
   	//Define valor do campo mestre
   	$arr_campo_mestre = explode("_dwd_",$this->obj_entidade->str_campo_ligacao_mestre);
    for ($ict = 0; $ict < $int_campo_tot; $ict++){
      if ($this->obj_entidade->bol_detalhe){
    	  if ($arr_campo_mestre[0]."_".$arr_campo_mestre[1] == $this->obj_entidade->arr_campo[$ict]["nome"]){
    	    $this->obj_entidade->arr_campo[$ict]["con_exibir_lookup"] = false;
    	  }else{
    	  	$this->obj_entidade->arr_campo[$ict]["con_exibir_lookup"] = true;
    	  }
      }else{
        $this->obj_entidade->arr_campo[$ict]["con_exibir_lookup"] = true;
      }
      if (($this->obj_entidade->arr_campo[$ict]["con_exibir"] == "") ||
         ($this->obj_entidade->arr_campo[$ict]["con_exibir"] == "sim")){
	      if ($this->obj_entidade->arr_campo[$ict]["con_exibir_lookup"]){
?>        <td class="dwd_th_left">
<?php      echo $this->obj_entidade->arr_campo[$ict]["descricao"];?>
	        </td>
<?php   }
      }
    }
    $arr_navegador = explode("/",$_SERVER["HTTP_USER_AGENT"]);
    if ($this->bol_editar){    	if ($arr_navegador[0] != "Opera"){    	  $str_editar_texto = "Editar";
    	}else{        $str_editar_texto = "";
    	}
?>    <td class="dwd_th_center"><?php echo $str_editar_texto;?></td>
<?php }
    if ($this->bol_excluir){    	if ($arr_navegador[0] != "Opera"){
    	  $str_editar_texto = "Excluir";
    	}else{
        $str_editar_texto = "";
    	}
?>    <td class="dwd_th_center"><?php echo $str_editar_texto;?></td>
<?php }?>
     </tr>
<?php
    if (isset($matriz)){
    	$con_itc = 0;
			// Cria um while para pegar as informações do BD
			foreach($matriz as $row) {
	?>    <tr class="tb_item_valor_linha">
	<?php $con_itc++;
			  if (($con_itc % 2) ==0)
			  	$classe = "tb_item_valor_coluna_par";
	      else
	      	$classe = "tb_item_valor_coluna_impar";

	      for ($ict = 0; $ict < $int_campo_tot; $ict++){
	      	if ($this->obj_entidade->arr_campo[$ict]["chave"] == "sim"){
	      	  $int_valor_chave = $row[$this->obj_entidade->arr_campo[$ict]["nome"]];
	      	}
		      if (($this->obj_entidade->arr_campo[$ict]["con_exibir"] == "") ||
		         ($this->obj_entidade->arr_campo[$ict]["con_exibir"] == "sim")){

	          if ($this->obj_entidade->arr_campo[$ict]["con_exibir_lookup"]){
		?>        <td class="<?php echo $classe ?>">
		<?php     if (($this->obj_entidade->arr_campo[$ict]["con_editar"] == "sim")){
                $this->obj_entidade->arr_campo[$ict]["valor"] = $row[$this->obj_entidade->arr_campo[$ict]["nome"]];
                $obj_campo = new frm_campo($this->obj_entidade->str_entidade,$ict,$bol_campo_requerido);
		            $obj_campo->str_campo = $this->obj_entidade->arr_campo[$ict]["cad_tipo_campo"];
		            if ($obj_campo->str_campo == "combobox_dinamico"){
                	$this->obj_entidade->arr_campo[$ict]["str_on_change"] = " executar_exibir_con_combo('".$this->obj_entidade->str_entidade."_dwd_".$con_itc.$ict."','".$this->obj_entidade->arr_campo[$ict]["valor"]."','../padrao_adm/dwd_consulta_alterar.php?a=1&valor_chave=".$int_valor_chave."&tipo=".$this->obj_entidade->arr_campo[$ict]["tipo"]."&nome=".$this->obj_entidade->arr_campo[$ict]["nome"]."&entidade=".$this->obj_entidade->str_entidade."&frm_campo=".$con_itc.$ict."','campo_result".$con_itc.$ict."','POST','".$this->obj_entidade->str_entidade."_dwd_".$con_itc.$ict."',document.consulta_".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade.",0,0,'../dwd_img'); ";
		              echo "<span id=\"campo_result".$con_itc.$ict."\"></span>";
		            }else{
		            	$this->obj_entidade->arr_campo[$ict]["str_on_change"] = "";
		            }
    			      $obj_campo->arr_campo = $this->obj_entidade->arr_campo;
    			      $obj_campo->str_nome = $con_itc.$ict;
         			  $obj_campo->criar();
							}else{
			          if ($this->obj_entidade->arr_campo[$ict]["entidade"] != ""){
              		if ($this->obj_entidade->arr_campo[$ict]["entidade_campo_chave"] != ""){
			              echo $row[$this->obj_entidade->arr_campo[$ict]["nome"]."_".$this->obj_entidade->arr_campo[$ict]["entidade_campo_chave"]];
			            }else{
			              echo $row[$this->obj_entidade->arr_campo[$ict]["nome"]."_".$this->obj_entidade->arr_campo[$ict]["entidade"]];
			            }
		            }else if ($this->obj_entidade->arr_campo[$ict]["tipo"] == "date"){
						      $obj_data = new com_data_configuracao();
						      //Converte data do banco para data do usuário
						      echo $obj_data->wd_obter($row[$this->obj_entidade->arr_campo[$ict]["nome"]],$_SESSION["banco_tipo"]);
			          }else{
			            echo $row[$this->obj_entidade->arr_campo[$ict]["nome"]];
			          }
			        }
	?>
	          </td>
	<?php     }
	        }
	      }
	      if ($this->bol_editar){
	?>
	        <td align="center" class="<?php echo $classe ?>">
<?php       if ($arr_navegador[0] == "Opera"){?>
  	          <label class="botao_filtrar lblbotao"><input value="Editar" class="botao" name="frm_con_novo" id="frm_con_novo" type="button" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_cadastro_arquivo ?>?a=1&status=editar&valor=<?php echo $int_valor_chave?>&valor_mestre=<?php echo $this->int_valor_chave?>&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>','<?php echo $this->obj_entidade->str_cadastro_local?>','GET','','',1,1,'../dwd_img');"></label>
<?php       }else{?>
              <input onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_cadastro_arquivo ?>?a=1&status=editar&valor=<?php echo $int_valor_chave?>&valor_mestre=<?php echo $this->int_valor_chave?>&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>','<?php echo $this->obj_entidade->str_cadastro_local?>','GET','','',1,1,'../dwd_img');" type="image" src="../dwd_img/com_editar.png" name="sub" height="16px" widht="16px">
<?php       }?>
	        </td>
<?php   }
				if ($this->bol_excluir){
?>
          <td align="center" class="<?php echo $classe ?>">
<?php       if ($arr_navegador[0] == "Opera"){?>
            <label class="botao_filtrar lblbotao"><input value="Excluir" class="botao" name="frm_con_novo" id="frm_con_novo" type="button" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_consulta_arquivo ?>?a=1&status=excluir&valor=<?php echo $int_valor_chave?>&valor_mestre=<?php echo $this->int_valor_chave?>&valor_campo_mestre=<?php echo $this->int_valor_chave?>&campo_chave=<?php echo $this->obj_entidade->str_campo_ligacao_mestre?>&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>','<?php echo $this->obj_entidade->str_consulta_local?>','GET','','',1,1,'../dwd_img');"></label>
<?php       }else{?>
            <input onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_consulta_arquivo ?>?a=1&status=excluir&valor=<?php echo $int_valor_chave?>&valor_mestre=<?php echo $this->int_valor_chave?>&valor_campo_mestre=<?php echo $this->int_valor_chave?>&campo_chave=<?php echo $this->obj_entidade->str_campo_ligacao_mestre?>&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>','<?php echo $this->obj_entidade->str_consulta_local?>','GET','','',1,1,'../dwd_img');" type=image src="../dwd_img/com_excluir.png" name="sub" height="16px" widht="16px">
<?php       }?>
          </td>
<?php   }	?>
	      </tr>
	<?php
			}
		}else{
?>    <tr class="tb_item_valor_linha">
        <td colspan="<?php echo $int_campo_tot+2?>" class="tb_item_valor_coluna">Nenhum registro foi encontrado</td>
      </tr>
<?php
		}
		//Link para as paginas
?>    <tr class="tb_linha_paginacao">
        <td colspan="<?php echo $int_campo_tot+2?>" class="tb_coluna_paginacao">
<?php
				// Faz uma nova seleção no banco de dados, desta vez sem LIMIT,
				// para pegarmos o número total de registros
				$this->obj_entidade->consultar();
				// Gera uma variável com o número total de registros no banco de dados
				$total_registros = $this->obj_entidade->int_total_registros;
				// Gera outra variável, desta vez com o número de páginas que será precisa.
				// O comando ceil() arredonda 'para cima' o valor
				$pags = ceil($total_registros/$qnt);
				// Número máximos de botões de paginação
				$max_links = 3;
				// Exibe o primeiro link 'primeira página', que não entra na contagem acima(3)
				echo "<a href='#' onClick=\"executar_exibir_img('".$this->str_arquivo_consulta."?p=1&a=1&tot=".$this->int_total_filtro."&str_campo=".$this->str_campo_filtro."&resultado_local=".$this->str_consulta_local."&detalhe_local=".$this->obj_entidade->str_cadastro_local."&valor_campo_mestre=".$this->int_valor_chave."&campo_chave=".$this->obj_entidade->str_campo_ligacao_mestre."','".$this->str_consulta_local."','POST','".$this->str_campo_filtro."',document.filtro_".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade.",1,1,'../dwd_img');\" target='_self'><<</a> ";
				// Cria um for() para exibir os 3 links antes da página atual
				for($i = $p-$max_links; $i <= $p-1; $i++) {
			  	// Se o número da página for menor ou igual a zero, não faz nada
				  // (afinal, não existe página 0, -1, -2..)
				  if($i <=0) {
		  		  //faz nada
			 	  } else {
			  		// Se estiver tudo OK, cria o link para outra página
				    echo "<a href='#' onClick=\"executar_exibir_img('".$this->str_arquivo_consulta."?p=".$i."&a=1&tot=".$this->int_total_filtro."&str_campo=".$this->str_campo_filtro."&resultado_local=".$this->str_consulta_local."&detalhe_local=".$this->obj_entidade->str_cadastro_local."&valor_campo_mestre=".$this->int_valor_chave."&campo_chave=".$this->obj_entidade->str_campo_ligacao_mestre."','".$this->str_consulta_local."','POST','".$this->str_campo_filtro."',document.filtro_".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade.",1,1,'../dwd_img');\" target='_self'>".$i."</a> ";
				  }
				}
				// Exibe a página atual, sem link, apenas o número
				echo $p." ";
				// Cria outro for(), desta vez para exibir 3 links após a página atual
				for($i = $p+1; $i <= $p+$max_links; $i++) {
			  	// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
			  	if($i > $pags){
			     	//faz nada
		  		}else{
		  		  // Se tiver tudo Ok gera os links.
		    		echo "<a href='#' onClick=\"executar_exibir_img('".$this->str_arquivo_consulta."?p=".$i."&a=1&tot=".$this->int_total_filtro."&str_campo=".$this->str_campo_filtro."&resultado_local=".$this->str_consulta_local."&detalhe_local=".$this->obj_entidade->str_cadastro_local."&valor_campo_mestre=".$this->int_valor_chave."&campo_chave=".$this->obj_entidade->str_campo_ligacao_mestre."','".$this->str_consulta_local."','POST','".$this->str_campo_filtro."',document.filtro_".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade.",1,1,'../dwd_img');\" target='_self'>".$i."</a> ";
				  }
				}
				// Exibe o link "última página"
				echo "<a href='#' onClick=\"executar_exibir_img('".$this->str_arquivo_consulta."?p=".$pags."&a=1&tot=".$this->int_total_filtro."&str_campo=".$this->str_campo_filtro."&resultado_local=".$this->str_consulta_local."&detalhe_local=".$this->obj_entidade->str_cadastro_local."&valor_campo_mestre=".$this->int_valor_chave."&campo_chave=".$this->obj_entidade->str_campo_ligacao_mestre."','".$this->str_consulta_local."','POST','".$this->str_campo_filtro."',document.filtro_".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade.",1,1,'../dwd_img');\" target='_self'>>></a> ";
?>      </td>
      </tr>
    </table>
    </form>
<?php
  }
}
?>