<?php
class frm_cadastro extends frm{	private $str_campo_chave;
	private $bol_campo_requerido;
  private $str_resultado_local;
  private $int_tab;
  public $obj_entidade;
  //Define se esta gravando,alterando ou excluindo
  public $str_status;
  public $str_cad_campo;
  public $bol_detalhe_menu_exibir;
  public $bol_consultar;
  public $bol_novo;
  public $bol_gravar;
  public $bol_editar;
  public $bol_acesso_fixo;

	public function __construct(){    $this->bol_detalhe_menu_exibir = true;
    $this->bol_consultar = true;
    $this->bol_novo = true;
    $this->bol_gravar = true;
    $this->bol_editar = true;
    $this->bol_acesso_fixo = false;
	}

  public function criar(){
    $this->obj_entidade->str_cadastro_local = $this->obj_entidade->frm_str_nome;
    $this->obj_entidade->str_consulta_local = $this->obj_entidade->frm_str_nome;
    $frm_nome_temp = $this->obj_entidade->frm_str_nome;
    //Determina o indice da tab
    $this->int_tab = str_replace("tabViewdhtmlgoodies_tabView2_","",$frm_nome_temp);

		if (!$this->bol_acesso_fixo){
	    $obj_acesso = new tabela_acesso(false);
	    $obj_acesso->verificar_acesso($this->obj_entidade->str_entidade,$_SESSION["usuario_grupo_id"]);
	    $this->bol_consultar = $obj_acesso->bol_consultar;
	    $this->bol_novo = $obj_acesso->bol_novo;
	    $this->bol_gravar = $obj_acesso->bol_novo;
	    $this->bol_editar = $obj_acesso->bol_editar;
    }
    $int_tot_campo = count($this->obj_entidade->arr_campo);
    $int_cont_chave = 0;
    if ($this->obj_entidade->bol_detalhe){    	$this->obj_entidade->str_consulta_local = $_GET["detalhe_local"];
    	$this->obj_entidade->str_cadastro_local = $_GET["detalhe_local"];
    	$this->int_valor_chave = $_GET["valor_mestre"];
    }
    //se estiver editando carrega o valor para os campos
    if ($this->str_status == "editar"){
      $this->consultar();
    }
?>
    <table class="dwd_table_geral">
		<tr><td class="dwd_td_titulo">
		    <h1>
		    	<?php
		        if	(trim($this->obj_entidade->str_cad_descricao) <> "")
			    	echo $this->obj_entidade->str_cad_descricao;
				else
					echo "Informe a descrição";

		    	?>
		    </h1>
		  </td></tr>
	    </table>
	    <br>
	<form name="<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>" action="" method="post">
    <table class="frm_cadastro">
<?php
    for($itc = 0; $itc < $int_tot_campo; $itc++){    	if ($this->arr_campo[$itc]["cad_novalinha"] != "nao") {	    	if ($this->obj_entidade->arr_campo[$itc]["cad_tipo_campo"] != "nao"){		      if ($itc == 0){		        $this->str_cad_campo = $this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$itc]["nome"];
		      }else{		      	$this->str_cad_campo .= ";dwd;".$this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$itc]["nome"];
		      }		    	//Define se o campo é requerido ou não
		    	if ($this->obj_entidade->arr_campo[$itc]["requerido"] == "sim"){
		    	  $bol_campo_requerido = true;
		    	}else{		    		$bol_campo_requerido = false;
		    	}
		      if ($this->obj_entidade->bol_detalhe){
		      	//Define valor do campo mestre
		      	$arr_campo_mestre = explode("_dwd_",$this->obj_entidade->str_campo_ligacao_mestre);
		    	  if ($arr_campo_mestre[0]."_".$arr_campo_mestre[1] == $this->obj_entidade->arr_campo[$itc]["nome"]){		    	    $this->obj_entidade->arr_campo[$itc]["valor"]	= $_GET["valor_chave_mestre"];
		    	  }
		      }		    	//Define nome de todos os campos chaves		      if ($this->obj_entidade->arr_campo[$itc]["chave"] == "sim"){		        if ($int_cont_chave == 0){		          $this->str_campo_chave = $this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$itc]["nome"];
		        }else{		          $this->str_campo_chave = ";dwd;".$this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$itc]["nome"];
		        }
		        $int_cont_chave++;
		      }
		?>    <tr class="frm_cad_linha_item">
		        <td class="frm_cad_coluna_descricao">
		<?php
		      if ($this->obj_entidade->arr_campo[$itc]["cad_tipo_campo"] != "oculto"){
		        echo $this->obj_entidade->arr_campo[$itc]["descricao"].":";
		      }
		?>      </td>
		        <td class="frm_cad_coluna_campo">
<?php      if ($this->obj_entidade->arr_campo[$itc]["cad_tipo_campo"] != "oculto"){ ?>
		         <div id="div_<?php echo $this->obj_entidade->arr_campo[$itc]["nome"]?>">
		<?php  }
		       //Cria os componentes para o formulário
		       $obj_campo = new frm_campo($this->obj_entidade->str_entidade,$itc,$bol_campo_requerido);
           $obj_campo->str_campo = $this->obj_entidade->arr_campo[$itc]["cad_tipo_campo"];
           $obj_campo->arr_campo = $this->obj_entidade->arr_campo;
           $obj_campo->str_frm_nome = $this->obj_entidade->frm_str_nome;
           $obj_campo->criar();
           $str_apos_form .= $obj_campo->str_apos_form;
           if ($this->obj_entidade->arr_campo[$itc]["cad_tipo_campo"] != "oculto"){
		?>       </div>
<?php      } ?>
		        </td>
		      </tr>
		<?php
		    }
		  }
    }
?>    <tr>
        <td colspan="2"><div id="menu_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>">
<?php
    if ($this->str_status == "editar"){      $this->menu_editar();
    }
    if ($this->str_status == "gravar"){      $this->menu_gravar();
    }

?>      </td>
      </tr>
    </table>
    </form>
<?php
    echo $str_apos_form;
    //Cria os componentes detalhes
    $this->definir_detalhes();
  }
  public function menu_editar(){
?>
     <script type="text/javascript">
        arr_frm_tipo[<?php echo $this->int_tab?>] = 1;
         definir_atalhos_cadastro('<?php echo $this->obj_entidade->frm_str_nome?>');
     </script>
     <fieldset>
<?php  if ($this->obj_entidade->bol_detalhe){	       if ($this->bol_editar){
?>         <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_alt<?php echo $this->obj_entidade->str_entidade?>" id="frm_cad_alt<?php echo $this->obj_entidade->str_entidade?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_resultado_arquivo ?>?a=1&status=editar&str_campo=<?php echo $this->str_cad_campo?>&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>&valor_mestre=<?php echo $this->int_valor_chave?>&valor_campo_mestre=<?php echo $this->int_valor_chave?>&campo_chave=<?php echo $this->obj_entidade->str_campo_ligacao_mestre?>','menu_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;">Alterar </button></label>
<?php    }
         if ($this->bol_novo){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_nov<?php echo $this->obj_entidade->str_entidade?>" id="frm_cad_nov<?php echo $this->obj_entidade->str_entidade?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_cadastro_arquivo ?>?a=1&status=gravar&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>&valor_mestre=<?php echo $this->int_valor_chave?>&valor_campo_mestre=<?php echo $this->int_valor_chave?>&campo_chave=<?php echo $this->obj_entidade->str_campo_ligacao_mestre?>','<?php echo $this->obj_entidade->str_cadastro_local?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;">Novo </button></label>
<?php    }
         if ($this->bol_consultar){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_con<?php echo $this->obj_entidade->str_entidade?>" id="frm_cad_con<?php echo $this->obj_entidade->str_entidade?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_consulta_arquivo ?>?a=1&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>&valor_mestre=<?php echo $this->int_valor_chave?>&valor_campo_mestre=<?php echo $this->int_valor_chave?>&campo_chave=<?php echo $this->obj_entidade->str_campo_ligacao_mestre?>','<?php echo $this->obj_entidade->str_consulta_local?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;">Consultar</button></label>
<?php    }
       }else{
	       if ($this->bol_editar){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_alt<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_cad_alt<?php echo $this->obj_entidade->frm_str_nome?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_resultado_arquivo ?>?a=1&status=editar&str_campo=<?php echo $this->str_cad_campo?>','menu_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;"><u>A</u>lterar </button></label>
<?php    }
         if ($this->bol_novo){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_nov<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_cad_nov<?php echo $this->obj_entidade->frm_str_nome?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_cadastro_arquivo ?>?a=1&status=gravar','<?php echo $this->obj_entidade->str_cadastro_local?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;"><u>N</u>ovo </button></label>
<?php    }
         if ($this->bol_consultar){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_con<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_cad_con<?php echo $this->obj_entidade->frm_str_nome?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_consulta_arquivo ?>?a=1','<?php echo $this->obj_entidade->str_consulta_local?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;"><u>C</u>onsultar </button></label>
<?php    }
       }?>
     </fieldset>
<?php
  }

  public function menu_gravar(){
    if (isset($_GET["origem"])){	?>
      <script type="text/javascript">
        /*Caso estiver inserindo apartir da tela de consulta força o direcionamento para a tela de consulta*/
        executar_exibir_img('<?php echo $_GET["origem"]?>?a=1','<?php echo $this->obj_entidade->frm_str_nome?>','GET','','',0,0,'../dwd_img');
     </script>
     <fieldset>
<?php
    }
?>
      <script type="text/javascript">
        arr_frm_tipo[<?php echo $this->int_tab?>] = 1;
        definir_atalhos_cadastro('<?php echo $this->obj_entidade->frm_str_nome?>');
      </script>
<?php
       if ($this->obj_entidade->bol_detalhe){
	       if ($this->bol_gravar){
?>         <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_gra<?php echo $this->obj_entidade->str_entidade?>" id="frm_cad_gra<?php echo $this->obj_entidade->str_entidade?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_resultado_arquivo ?>?a=1&status=gravar&nov=editar&str_campo=<?php echo $this->str_cad_campo?>&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>&valor_mestre=<?php echo $this->int_valor_chave?>&valor_campo_mestre=<?php echo $this->int_valor_chave?>&campo_chave=<?php echo $this->obj_entidade->str_campo_ligacao_mestre?>','menu_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;">Gravar </button></label>
<?php    }
         if ($this->bol_novo){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_nov<?php echo $this->obj_entidade->str_entidade?>" id="frm_cad_nov<?php echo $this->obj_entidade->str_entidade?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_cadastro_arquivo ?>?a=1&status=gravar&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>&valor_mestre=<?php echo $this->int_valor_chave?>&valor_campo_mestre=<?php echo $this->int_valor_chave?>&campo_chave=<?php echo $this->obj_entidade->str_campo_ligacao_mestre?>','<?php echo $this->obj_entidade->str_cadastro_local?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;">Novo </button></label>
<?php    }
         if ($this->bol_consultar){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_con<?php echo $this->obj_entidade->str_entidade?>" id="frm_cad_con<?php echo $this->obj_entidade->str_entidade?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_consulta_arquivo ?>?a=1&detalhe_local=<?php echo $this->obj_entidade->str_cadastro_local?>&valor_campo_mestre=<?php echo $this->int_valor_chave?>&campo_chave=<?php echo $this->obj_entidade->str_campo_ligacao_mestre?>','<?php echo $this->obj_entidade->str_consulta_local?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;">Consultar </button></label>
<?php    }
       }else{
	       if ($this->bol_gravar){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_gra<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_cad_gra<?php echo $this->obj_entidade->frm_str_nome?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_resultado_arquivo ?>?a=1&status=gravar&nov=editar&str_campo=<?php echo $this->str_cad_campo?>','menu_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;">G<u>r</u>avar</button></label>
<?php    }
         if ($this->bol_novo){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_nov<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_cad_nov<?php echo $this->obj_entidade->frm_str_nome?>"  onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_cadastro_arquivo ?>?a=1&status=gravar','<?php echo $this->obj_entidade->str_cadastro_local?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false;"><u>N</u>ovo</button></label>
<?php    }
         if ($this->bol_consultar){?>
           <label class="botao_filtrar lblbotao"><button class="botao" name="frm_cad_con_<?php echo $this->obj_entidade->frm_str_nome?>" id="frm_cad_con<?php echo $this->obj_entidade->frm_str_nome?>" onClick="executar_exibir_img('<?php echo $this->obj_entidade->str_consulta_arquivo ?>?a=1','<?php echo $this->obj_entidade->str_consulta_local?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img'); return false; return false;"><u>C</u>onsultar</button></label>
<?php    }
       }?>
     </fieldset>
<?php
  }

  private function consultar(){    $matriz = $this->obj_entidade->consultar();
    $int_tot_campo = count($this->obj_entidade->arr_campo);
    foreach($matriz as $row){      for($itc = 0; $itc < $int_tot_campo; $itc++){				$this->obj_entidade->arr_campo[$itc]["valor"] = $row[$this->obj_entidade->arr_campo[$itc]["nome"]];
      }
    }
  }

  public function executar(){
    $this->obj_entidade->str_cadastro_local = $this->obj_entidade->frm_str_nome;
    $this->obj_entidade->str_consulta_local = $this->obj_entidade->frm_str_nome;
    $frm_nome_temp = $this->obj_entidade->frm_str_nome;
    //Determina o indice da tab
    $this->int_tab = str_replace("tabViewdhtmlgoodies_tabView2_","",$frm_nome_temp);

		if (!$this->bol_acesso_fixo){
	    $obj_acesso = new tabela_acesso(false);
	    $obj_acesso->verificar_acesso($this->obj_entidade->str_entidade,$_SESSION["usuario_grupo_id"]);
	    $this->bol_consultar = $obj_acesso->bol_consultar;
	    $this->bol_novo = $obj_acesso->bol_novo;
	    $this->bol_gravar = $obj_acesso->bol_novo;
	    $this->bol_editar = $obj_acesso->bol_editar;
	  }

    if ($this->obj_entidade->bol_detalhe){
    	$this->obj_entidade->str_consulta_local = $_GET["detalhe_local"];
    	$this->obj_entidade->str_cadastro_local = $_GET["detalhe_local"];
    	$this->int_valor_chave = $_GET["valor_mestre"];
    }

    $int_tot_campo = count($this->obj_entidade->arr_campo);
    //Define valor para os campos
    for($itc = 0; $itc < $int_tot_campo; $itc++){
      if ($_POST[$this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$itc]["nome"]] != ""){
    		$this->obj_entidade->arr_campo[$itc]["valor"] = $_POST[$this->obj_entidade->str_entidade."_dwd_".$this->obj_entidade->arr_campo[$itc]["nome"]];
      }
      if ($this->obj_entidade->arr_campo[$itc]["chave"] == "sim"){      	$str_campo_chave = $this->obj_entidade->arr_campo[$itc]["nome"];
      }
      if ($this->obj_entidade->bol_detalhe){
       	//Define valor do campo mestre
       	$arr_campo_mestre = explode("_dwd_",$this->obj_entidade->str_campo_ligacao_mestre);
   	    if ($arr_campo_mestre[0]."_".$arr_campo_mestre[1] == $this->obj_entidade->arr_campo[$itc]["nome"]){
   	      $this->obj_entidade->arr_campo[$itc]["valor"]	= $this->int_valor_chave;
   	    }
      }
    }

    if ($this->str_status == "gravar"){      if (!$this->obj_entidade->inserir()){      	$this->menu_gravar();
      }else{
	      if ($_GET["nov"] == "editar"){	?>
	        <script type="text/javascript">
	          /*java script determina o novo ID para o registro que foi gravado, permitindo assim
	          alterar o resgistro após o mesmo ser gravado no banco de dados*/
	          obj = document.getElementById('<?php echo $this->obj_entidade->str_entidade?>_dwd_id');
	          obj.value = <?php echo $this->obj_entidade->int_valor_incremento?>;
	        </script>
	<?php	        $this->menu_editar();
	      }else{
	        $this->menu_gravar();
	      }
	    }
    }
    if ($this->str_status == "editar"){      $this->obj_entidade->editar();
      $this->menu_editar();
    }
    if ($this->str_status == "excluir"){      $this->obj_entidade->excluir();
    }
  }
  private function definir_detalhes(){  	if ($this->bol_detalhe_menu_exibir){
	    $int_tot_detalhes = count($this->obj_entidade->arr_detalhe);
?>    <br>
	    <fieldset>
<?php
	    for ($i = 0; $i < $int_tot_detalhes; $i++){?>      <label class="botao_detalhe lblbotao">
	       <input value="<?php echo $this->obj_entidade->arr_detalhe[$i]->str_nome?>" class="botao_detalhe" name="frm_cad_det_<?php echo $this->obj_entidade->str_entidade?>" id="frm_cad_det_<?php echo $this->obj_entidade->str_entidade?>" type="button" onClick="executar_exibir_img('<?php echo $this->obj_entidade->arr_detalhe[$i]->str_consulta_arquivo ?>?a=1&detalhe_local=detalhe_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>&campo_chave=<?php echo $this->str_campo_chave?>','detalhe_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>','POST','<?php echo $this->str_cad_campo?>',document.<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>,1,1,'../dwd_img');">
	      </label>
<?php
	    }
?>
	    </fieldset>
      <br>
	    <div id="detalhe_<?php echo $this->obj_entidade->frm_str_nome.$this->obj_entidade->str_entidade?>"></div>
<?php
	  }
  }
}
?>