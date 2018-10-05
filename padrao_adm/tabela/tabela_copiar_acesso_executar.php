<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_campo.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
$frm_nome = str_replace("campo_resultmenu_dinamico_", "", $_GET["dwd_tab"]);
if ($_GET["criar"] == sim){  $obj = new tabela();

	$obj->arr_filtro[0]["condicao"] = "robson";
	$obj->arr_filtro[0]["nome"] = "ativo";
	$obj->arr_filtro[0]["tipo"] = "integer";
	$obj->arr_filtro[0]["operacao"] = "=";
	$obj->arr_filtro[0]["valor"] = "1";
	$obj->arr_filtro[0]["valor2"] = "0";

  if ($_SESSION["usuario_grupo_id"] != 1){
		$obj->arr_filtro[1]["condicao"] = "and";
		$obj->arr_filtro[1]["nome"] = "usuario_controla";
		$obj->arr_filtro[1]["tipo"] = "integer";
		$obj->arr_filtro[1]["operacao"] = "=";
		$obj->arr_filtro[1]["valor"] = "1";
		$obj->arr_filtro[1]["valor2"] = "0";
	}
  $matriz = $obj->consultar();
	//Se encontrar registro na matriz
	if (!empty($matriz)){
	  $obj = new tabela_acesso();
?>  <table class="dwd_table"><tr class="dwd_tr_title">
	    <td class="dwd_th_left">Tabela</td>
	    <td class="dwd_th_center">Consultar</td>
	    <td class="dwd_th_center">Editar</td>
	    <td class="dwd_th_center">Excluir</td>
	    <td class="dwd_th_center">Novo</td>
  	</tr>
<?php
		//Percore todos os registros da matriz
		foreach($matriz as $row){
			$obj->arr_filtro[0]["condicao"] = "Robson";
			$obj->arr_filtro[0]["nome"] = "sys_tabela_id";
			$obj->arr_filtro[0]["tipo"] = "integer";
			$obj->arr_filtro[0]["operacao"] = "=";
			$obj->arr_filtro[0]["valor"] = $row["id"];
			$obj->arr_filtro[0]["valor2"] = "0";

			$obj->arr_filtro[1]["condicao"] = "and";
			$obj->arr_filtro[1]["nome"] = "sys_usuario_grupo_id";
			$obj->arr_filtro[1]["tipo"] = "integer";
			$obj->arr_filtro[1]["operacao"] = "=";
			$obj->arr_filtro[1]["valor"] = $_POST["tabela_acesso_dwd_grupo_copiar"];
			$obj->arr_filtro[1]["valor2"] = "0";

			$str_campo .= "tabela_acesso_dwd_grupo_copiar;dwd;";
		  $matriz2 = $obj->consultar();
			if (!empty($matriz2)){
				$cont_itc = 0;
				foreach($matriz2 as $row2){
					$con_itc++;
				  if (($con_itc % 2) ==0)
				  	$classe = "tb_item_valor_coluna_par";
		      else
		      	$classe = "tb_item_valor_coluna_impar";
          $str_campo .= "tabela".$con_itc.";dwd;";
				?>
				  <input name="tabela<?php echo $con_itc?>" type="hidden" value="<?php echo $row["id"]?>">
				  <tr class="tb_item_valor_linha">			    <td class="<?php echo $classe ?>"><?php echo $row["nome"]?></td>
			    <td class="<?php echo $classe ?>" align="center">
			      <?php //echo $row2["consulta"]
			      $objv = new com_checkbox("consulta".$con_itc,"tabela_acesso",true);
			      $str_campo .= "tabela_acesso_dwd_consulta".$con_itc.";dwd;";
			      $objv->str_valor = $row2["consulta"];
			      //$obj->str_desc_complemento = $this->arr_campo[$itc]["descricao_complemento"];
						$objv->criar();
			      ?>
			    </td>
			    <td class="<?php echo $classe ?>" align="center">
			      <?php //echo $row2["editar"]
			      $objv = new com_checkbox("editar".$con_itc,"tabela_acesso",true);
			      $str_campo .= "tabela_acesso_dwd_editar".$con_itc.";dwd;";
			      $objv->str_valor = $row2["editar"];
			      //$obj->str_desc_complemento = $this->arr_campo[$itc]["descricao_complemento"];
						$objv->criar();
			      ?>
			    </td>
			    <td class="<?php echo $classe ?>" align="center">
			      <?php //echo $row2["excluir"]
			      $objv = new com_checkbox("excluir".$con_itc,"tabela_acesso",true);
			      $str_campo .= "tabela_acesso_dwd_excluir".$con_itc.";dwd;";
			      $objv->str_valor = $row2["excluir"];
			      //$obj->str_desc_complemento = $this->arr_campo[$itc]["descricao_complemento"];
						$objv->criar();
			      ?>
			    </td>
			    <td class="<?php echo $classe ?>" align="center">
			      <?php //echo $row2["novo"]
			      $objv = new com_checkbox("novo".$con_itc,"tabela_acesso",true);
			      $str_campo .= "tabela_acesso_dwd_novo".$con_itc.";dwd;";
			      $objv->str_valor = $row2["novo"];
			      //$obj->str_desc_complemento = $this->arr_campo[$itc]["descricao_complemento"];
						$objv->criar();
			      ?>
			    </td>
			    </tr>
<?php  	}
		  }else{?>      <td class="<?php echo $classe ?>"><?php echo $row["nome"]?></td>
        <td class="<?php echo $classe ?>" colspan="5">Não existe permissões para esse grupo de usuário</td>
        </tr>
<?php
		  }
    }
?>  </table>
<?php
  }
	echo "Colar no grupo: ";
	$obj = new com_combobox_dinamico("grupo_colar","tabela_acesso",true);
	$obj->arr_lookup["tabela"] = "sys_usuario_grupo";
	$obj->arr_lookup["chave"] = "id";
	$obj->arr_lookup["chave_tipo"] = "integer";
	$obj->arr_lookup["retorno"] = "nome";
	$obj->arr_lookup["retorno_tipo"] = "string";
	$obj->arr_lookup["valor"] = "";
	$obj->arr_lookup_filtro[0]["condicao"] = "Robson";
	$obj->arr_lookup_filtro[0]["nome"] = "ativo";
	$obj->arr_lookup_filtro[0]["tipo"] = "integer";
	$obj->arr_lookup_filtro[0]["operacao"] = "=";
	$obj->arr_lookup_filtro[0]["valor"] = 1;
	$obj->arr_lookup_filtro[0]["valor2"] = 0;
	$obj->criar();
	$str_campo .= "tabela_acesso_dwd_grupo_colar";
	?>
	<br>
	<fieldset>
	  <label class="botao_menu_dinamico lblbotao"><input value="Copiar" class="botao_detalhe" name="frm_con_copiar" id="frm_con_copiar" type="button" onClick="executar_exibir_img('../padrao_adm/tabela/tabela_copiar_acesso_executar.php?a=1&criar=nao&tot=<?php echo $con_itc?>','campo_result_copiar<?php echo $frm_nome?>','POST','<?php echo $str_campo?>',document.frm_con_menu_<?php echo $frm_nome?>,1,1,'../dwd_img');"></label>
	</fieldset>
	<div id="campo_result_copiar<?php echo $frm_nome?>"></div>
<?php
}else{  $tot = $_GET["tot"];
  for ($ir = 1; $ir <= $tot; $ir++){	  $obj = new tabela_acesso();		$obj->arr_filtro[0]["condicao"] = "Robson";
		$obj->arr_filtro[0]["nome"] = "sys_tabela_id";
		$obj->arr_filtro[0]["tipo"] = "integer";
		$obj->arr_filtro[0]["operacao"] = "=";
		$obj->arr_filtro[0]["valor"] = $_POST["tabela".$ir];
		$obj->arr_filtro[0]["valor2"] = "0";

		$obj->arr_filtro[1]["condicao"] = "and";
		$obj->arr_filtro[1]["nome"] = "sys_usuario_grupo_id";
		$obj->arr_filtro[1]["tipo"] = "integer";
		$obj->arr_filtro[1]["operacao"] = "=";
		$obj->arr_filtro[1]["valor"] = $_POST["tabela_acesso_dwd_grupo_colar"];
		$obj->arr_filtro[1]["valor2"] = "0";
	  $matriz2 = $obj->consultar();
	  //Se encontrou deve alterar o registro
		if (!empty($matriz2)){			foreach($matriz2 as $row2){
				$cont_cam = count($obj->arr_campo);
				for ($i = 0; $i < $cont_cam; $i++){
		      if ($obj->arr_campo[$i]["nome"] == "id"){
		        $obj->arr_campo[$i]["valor"] = $row2["id"];
		      }
		      if ($obj->arr_campo[$i]["nome"] == "consulta"){
		        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_consulta".$ir];
		      }
		      if ($obj->arr_campo[$i]["nome"] == "editar"){
		        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_editar".$ir];
		      }
		      if ($obj->arr_campo[$i]["nome"] == "excluir"){
		        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_excluir".$ir];
		      }
		      if ($obj->arr_campo[$i]["nome"] == "novo"){		        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_novo".$ir];
		      }
		      if ($obj->arr_campo[$i]["nome"] == "sys_tabela_id"){
		        $obj->arr_campo[$i]["valor"] = $row2["sys_tabela_id"];
		      }
		      if ($obj->arr_campo[$i]["nome"] == "sys_usuario_grupo_id"){
		        $obj->arr_campo[$i]["valor"] = $row2["sys_usuario_grupo_id"];
		      }
		    }
		    if ($row2["id"] > 0){
		      $obj->editar();
		    }
		  }
    //se não deve gravar o registro
    }else{			$cont_cam = count($obj->arr_campo);
			for ($i = 0; $i < $cont_cam; $i++){
	      if ($obj->arr_campo[$i]["nome"] == "consulta"){
	        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_consulta".$ir];
	      }
	      if ($obj->arr_campo[$i]["nome"] == "editar"){
	        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_editar".$ir];
	      }
	      if ($obj->arr_campo[$i]["nome"] == "excluir"){
	        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_excluir".$ir];
	      }
	      if ($obj->arr_campo[$i]["nome"] == "novo"){
	        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_novo".$ir];
	      }
	      if ($obj->arr_campo[$i]["nome"] == "sys_tabela_id"){
	        $obj->arr_campo[$i]["valor"] = $_POST["tabela".$ir];
	      }
	      if ($obj->arr_campo[$i]["nome"] == "sys_usuario_grupo_id"){
	        $obj->arr_campo[$i]["valor"] = $_POST["tabela_acesso_dwd_grupo_colar"];
	      }
	    }
	    $obj->inserir();
    }
    //echo $_POST["tabela".$ir]." - ".$_POST["tabela_acesso_dwd_consulta".$ir].$_POST["tabela_acesso_dwd_editar".$ir].$_POST["tabela_acesso_dwd_novo".$ir].$_POST["tabela_acesso_dwd_excluir".$ir]." ".$_POST["tabela_acesso_dwd_grupo_copiar"].$_POST["tabela_acesso_dwd_grupo_colar"]."<br>";
  }
}

?>