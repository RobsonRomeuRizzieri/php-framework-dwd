<?php
class frm_filtro extends frm{

  private $obj_sql;
  private $str_filtro_campo;
  private $str_campo_valor;
  private $str_que_valor;
  private $str_valor_um_valor;
  private $str_valor_dois_valor;
  private $str_valor_data_um_valor;
  private $str_valor_data_dois_valor;
  private $str_e_ou_valor;
  private $int_tab;

  public $obj_entidade;
  public $bol_iniciar_com_registro;

  public $filtro_matriz;
  public $str_filtro_arquivo;
  public $str_resultado_local;
  public $str_resultado_arquivo;

	public function __construct(){
    $this->bol_iniciar_com_registro = false;
  }
  //Define que deve criar um item de filtro
  public function criar($item=1,$str_campo=""){
  	if ($this->obj_entidade->str_arquivo_filtro != ""){
	    $this->str_item_arquivo = $this->obj_entidade->str_arquivo_filtro;
    }
  	if ($this->obj_entidade->str_arquivo_filtro_resultado != ""){
	    $this->str_resultado_arquivo = $this->obj_entidade->str_arquivo_filtro_resultado;
    }
  	if (!($this->obj_entidade->bol_filtrar_detalhe) && !($this->obj_entidade->bol_detalhe)){
	    if ($item == 1){
	      if ($this->str_resultado_local == ""){
   	      $this->str_resultado_local = "resultado_filtro".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade;
   	    }
	?>    <div class="div_filtro">
				<table class="dwd_table_geral">
				<tr><td class="dwd_td_titulo">
				    <h1>
				    	<?php
				        if	(trim($this->obj_entidade->str_con_descricao) <> "")
						    	echo $this->obj_entidade->str_con_descricao;
								else
									echo "Informe a descrição";
				    	?>
				    </h1>
				  </td></tr>
			  </table>
			    <br>
			    <form class="frm_filtro" name="filtro_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>" action="" method="post">
			      <div id="filtro_item_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>" class="frm_filtro_item">
			      <table class="dwd_table">
						<tr class="dwd_tr_title">
							<td class="dwd_th_left" colspan="8">Aplicar Filtro:</td>
						</tr>
				    </table>
	<?php
	    }
	    $frm_nome_temp = $this->obj_entidade->frm_str_nome;
	    //Determina o indice da tab
	    $frm_nome_temp = str_replace("tabViewdhtmlgoodies_tabView2_","",$frm_nome_temp);
	    $this->int_tab = str_replace($item."filtro","",$frm_nome_temp);
	    $this->obj_entidade->frm_str_nome = str_replace($item."filtro","",$this->obj_entidade->frm_str_nome);
	    if ($str_campo == ""){
	      $this->str_filtro_campo = "filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_campo".$item;
	    }else{
	      $this->str_filtro_campo = $str_campo;
	      $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_campo".$item;
	    }
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_que".$item;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_um".$item;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_dois".$item;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_data_um".$item;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_data_dois".$item;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_e_ou".$item;
	    //implementado para definir os campos para o proximo filtro a ser criado
	    $item2 = $item + 1;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_campo".$item2;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_que".$item2;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_um".$item2;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_dois".$item2;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_data_um".$item2;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_data_dois".$item2;
	    $this->str_filtro_campo .= ";dwd;filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_e_ou".$item2;

	    $this->criar_item($item);
	    if ($item == 1){
	?>    </div>
          <br>
	      <fieldset>
		      <script type="text/javascript">
            arr_frm_tipo[<?php echo $this->int_tab?>] = 0;
            definir_atalhos_filtro('<?php echo $this->obj_entidade->frm_str_nome?>');
            definir_atalhos_consulta('<?php echo $this->obj_entidade->frm_str_nome?>');
		      </script>

	        <label class="botao_filtrar lblbotao"><button class="botao" name="frm_fil_fil<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_fil_fil<?php echo $this->obj_entidade->frm_str_nome?>" onClick="executar_exibir_img('<?php echo $this->str_resultado_arquivo ?>?a=1&tot=<?php echo $item?>&str_campo=<?php echo $this->str_filtro_campo?>&resultado_local=<?php echo $this->str_resultado_local?>','<?php echo $this->str_resultado_local ?>','POST','<?php echo $this->str_filtro_campo?>',document.filtro_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;"><u>F</u>iltrar</button></label>
	        <label class="botao_limpar lblbotao"><button class="botao" name="frm_fil_lim<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_fil_lim<?php echo $this->obj_entidade->frm_str_nome?>" ><u>L</u>impar</button></label>
	      </fieldset>
	      <br>
	    </form>
			</div><br>
	<?php
	    }
	  }
    if ($item == 1){
	    if ($this->bol_iniciar_com_registro){
	      $this->str_resultado_local = "resultado_filtro".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade;
?> 	  	<div class="frm_filtro_resultado" id="resultado_filtro<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>">
<?php
	      $this->executar();
?>
			  </div>
<?php
	    }
    }
  }

  public function criar_item($item=1,$str_div_pai="principal"){
  		if	(($item %2) <> 0)
  			$classe="filtro_impar";
  	 	else
  	 		$classe="filtro_par";
?>    <div id="filtro<?php echo $item?>" class="<?php echo $classe ?>">
				<div id="campo<?php echo $item?>" class="filtro_campo">
				Campo:
<?php
		    $tot_item = count($this->obj_entidade->arr_campo);
				$obj = new com_combobox_fixo("campo".$item,"filtro_".$this->obj_entidade->str_entidade.$this->int_tab,false);
				$obj->bol_item_selecao = true;
				for ($i = 0; $i < $tot_item; $i++){
					if 	($this->obj_entidade->arr_campo[$i]["filtrar"] == "sim"){
						$obj->arr_item[$i]["valor"] = $this->obj_entidade->arr_campo[$i]["tipo"]."_rrr_".$this->obj_entidade->arr_campo[$i]["nome"]."_rrr_".$this->obj_entidade->arr_campo[$i]["entidade"];
						$obj->arr_item[$i]["descricao"] = $this->obj_entidade->arr_campo[$i]["descricao"];
					}
				}
				$obj->str_on_change .= " definir_condicao_que(this,'filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_que".$item."');";
        $obj->str_valor = $this->str_campo_valor;
				$obj->criar();
?>      </div>
				<div id="que<?php echo $item?>" class="filtro_que">
        &nbsp;&nbsp;Que:
<?php   $obj = new com_combobox_fixo("que".$item,"filtro_".$this->obj_entidade->str_entidade.$this->int_tab,false);
     		$obj->str_on_change = "wd_definir_campo_para_filtro(this,document.filtro_".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade.".filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_campo".$item.",'filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_um".$item."','filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_dois".$item."','filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_data_um".$item."','filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_data_dois".$item."');";
				$obj->str_valor = $this->str_que_valor;
				$obj->criar();
?>      </div>
        <div id="valor<?php echo $item?>" class="filtro_valor">
			  	<div class="filtro_valor_item" id="div_filtro_<?php echo $this->obj_entidade->str_entidade.$this->int_tab?>_dwd_valor_um<?php echo $item?>" style="display: none">
			  	  &nbsp;&nbsp;Valor:
<?php       $obj_com = new com_edit("valor_um".$item,"filtro_".$this->obj_entidade->str_entidade.$this->int_tab,true);
			  	  $obj_com->str_valor = $this->str_valor_um_valor;
			  	  $obj_com->criar(true);
?>        </div>
			  	<div class="filtro_valor_item" id="div_filtro_<?php echo $this->obj_entidade->str_entidade.$this->int_tab?>_dwd_valor_dois<?php echo $item?>" style="display: none">
			  	  &nbsp;&nbsp;E&nbsp;&nbsp;
<?php       $obj_com = new com_edit("valor_dois".$item,"filtro_".$this->obj_entidade->str_entidade.$this->int_tab,true);
					  $obj_com->str_valor = $this->str_valor_dois_valor;
					  $obj_com->criar(true);
?>        </div>
			  	<div class="filtro_valor_item" id="div_filtro_<?php echo $this->obj_entidade->str_entidade.$this->int_tab?>_dwd_valor_data_um<?php echo $item?>" style="display: none">
            &nbsp;&nbsp;Valor:
<?php       $obj_com = new com_edit_data("valor_data_um".$item,"filtro_".$this->obj_entidade->str_entidade.$this->int_tab,true);
			    	$obj_com->str_valor = $this->str_valor_data_um_valor;
			    	$obj_com->criar();
?>        </div>
			  	<div class="filtro_valor_item" id="div_filtro_<?php echo $this->obj_entidade->str_entidade.$this->int_tab?>_dwd_valor_data_dois<?php echo $item?>" style="display: none">
			  	  &nbsp;&nbsp;E&nbsp;&nbsp;
<?php       $obj_com = new com_edit_data("valor_data_dois".$item,"filtro_".$this->obj_entidade->str_entidade.$this->int_tab,true);
				  	$obj_com->str_valor = $this->str_valor_data_dois_valor;
				  	$obj_com->criar();
?>        </div>
        </div>
        <div id="simples" class="filtro_e_ou">&nbsp;&nbsp;E/OU:
<?php
					$obj = new com_combobox_fixo("e_ou".$item,"filtro_".$this->obj_entidade->str_entidade.$this->int_tab,false);
					$item_pai = $item;
	     		$item = $item + 1;
	     		$obj->str_on_change = " filtro_campo_adicionar(this,'".$this->obj_entidade->frm_str_nome."','".$this->obj_entidade->str_entidade."','".$this->str_resultado_arquivo."?a=1&tot=".$item."&str_campo=".$this->str_filtro_campo."','".$this->str_resultado_local."','".$item."filtro".$this->obj_entidade->frm_str_nome."','filtro_item_".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade."','".$this->str_item_arquivo."?filtro=".$item."&a=1&str_campo=".$this->str_filtro_campo."','".$item."filtro".$this->obj_entidade->frm_str_nome."','POST','".$this->str_filtro_campo."',document.filtro_".$this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade.",1,1,'../dwd_img');";
					$obj->bol_item_selecao = false;
					$obj->arr_item[0]["valor"] = "nao";
					$obj->arr_item[0]["descricao"] = "Não";
					$obj->arr_item[1]["valor"] = "and";
					$obj->arr_item[1]["descricao"] = "E";
					$obj->arr_item[2]["valor"] = "or";
					$obj->arr_item[2]["descricao"] = "OU";
					$obj->str_valor = $this->str_e_ou_valor;
					$obj->criar();
?>
        </div>
		  </div>
<?php
  }

  public function executar($int_tot=0,$filtro_campo=""){
    if ($this->obj_entidade->bol_detalhe){
     $this->str_resultado_local = $_GET["detalhe_local"];
    }
  	if ($this->obj_entidade->str_arquivo_filtro != ""){
	    $this->str_item_arquivo = $this->obj_entidade->str_arquivo_filtro;
    }
  	if ($this->obj_entidade->str_arquivo_filtro_resultado != ""){
	    $this->str_resultado_arquivo = $this->obj_entidade->str_arquivo_filtro_resultado;
    }

    $frm_nome_temp = $this->obj_entidade->frm_str_nome;
    //Determina o indice da tab
    $frm_nome_temp = str_replace("tabViewdhtmlgoodies_tabView2_","",$frm_nome_temp);
    $frm_nome_temp = str_replace("filtro","",$frm_nome_temp);
    $this->int_tab = str_replace("resultado_","",$frm_nome_temp);

  	for ($i = 1; $i <= $int_tot; $i++){
  		//Define o indice para array dos filtros iniciar em zero
  		$int_fil = $i - 1;
      if (($_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_campo".$i] != "null") ||
          ($_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_que".$i] != "null")){
        //Define array com tipo e nome do campo
        $arr_fil_campo = explode("_rrr_",$_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_campo".$i]);
	      //Define a condição do filtro AND, OR ou nada quando estiver selecionado o não
				$this->obj_entidade->arr_filtro[$int_fil]["condicao"] = $_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_e_ou".$int_fil];
	      //Define o campo
				$this->obj_entidade->arr_filtro[$int_fil]["nome"] = $arr_fil_campo[1];
				//Define entidade para filtro
				$this->obj_entidade->arr_filtro[$int_fil]["entidade"] = $arr_fil_campo[2];
				//Define o tipo
				$this->obj_entidade->arr_filtro[$int_fil]["tipo"] = $arr_fil_campo[0];
				//Quando é uma string é usado o like para o SQL
	   		if ($_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_que".$i] == "rwdr"){
	     	  $this->obj_entidade->arr_filtro[$int_fil]["operacao"] = "plikep";
	      }else if ($_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_que".$i] == "rwd"){
	     	  $this->obj_entidade->arr_filtro[$int_fil]["operacao"] = "plike";
	      }else if ($_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_que".$i] == "wdr"){
	     	  $this->obj_entidade->arr_filtro[$int_fil]["operacao"] = "likep";
	      }else{
	        //Define as demais condições
	      	$this->obj_entidade->arr_filtro[$int_fil]["operacao"] = $_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_que".$i];
	      }
	      //Quando for do tipo data
	      if (($arr_fil_campo[0] == "date") ||
	          ($arr_fil_campo[0] == "datetime")){
	  			$this->obj_entidade->arr_filtro[$int_fil]["valor"] = $_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_data_um".$i];
				  $this->obj_entidade->arr_filtro[$int_fil]["valor2"] = $_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_data_dois".$i];
			  }else{
			  //Quando for outro tipo qualquer
	  			$this->obj_entidade->arr_filtro[$int_fil]["valor"] = $_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_um".$i];
				  $this->obj_entidade->arr_filtro[$int_fil]["valor2"] = $_POST["filtro_".$this->obj_entidade->str_entidade.$this->int_tab."_dwd_valor_dois".$i];
			  }
			}
  	}

  	if ($this->bol_consulta_paginada){
  		$obj = new frm_consulta();
			$obj->int_total_filtro = $int_tot;
			$obj->str_campo_filtro = $filtro_campo;
			$obj->str_arquivo_consulta = $this->str_resultado_arquivo;
//			$obj->str_consulta_local = $this->str_resultado_local;
			$obj->obj_entidade = $this->obj_entidade;
      if ($this->obj_entidade->bol_detalhe){
				if (isset($_GET["valor_campo_mestre"])){
	  			$obj->str_campo_chave = $_GET["campo_chave"];
	        $obj->int_valor_chave = $_GET["valor_campo_mestre"];
				}else{
	  			$obj->str_campo_chave = $_GET["campo_chave"];
	        $obj->int_valor_chave = $_POST[$obj->str_campo_chave];
	      }
	    }
			$obj->criar();
  	}else{
  	  //Executa o SQL e define o resultado obtido em uma matriz
      $this->filtro_matriz = $this->obj_entidade->consultar();
    }
  }
}
?>