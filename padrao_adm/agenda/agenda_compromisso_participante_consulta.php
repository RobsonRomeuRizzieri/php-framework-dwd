<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora_usada.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_empresa.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_filial.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_sistema.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso_participante.php");

  $obj = new usuario();
?>	<form name="participante_<?php echo $obj->str_entidade?>" action="" method="post">
    <table class="dwd_table"><tr class="dwd_tr_title">
	    <td class="dwd_th_left">Participar</td>
	    <td class="dwd_th_left">Usuário</td>
  	</tr>
<?php
	$obj->arr_filtro[0]["condicao"] = "and";
	$obj->arr_filtro[0]["nome"] = "id";
	$obj->arr_filtro[0]["tipo"] = "integer";
	$obj->arr_filtro[0]["operacao"] = "<>";
	$obj->arr_filtro[0]["valor"] = $_SESSION["usuario_id"];

  $matriz = $obj->consultar();
	//Se encontrar registro na matriz
	if (!empty($matriz)){
		$cont_itc = 0;
    $objx = new agenda_compromisso_participante();
		//Percore todos os registros da matriz
		foreach($matriz as $row){			$con_itc++;
		  if (($con_itc % 2) ==0)
		  	$classe = "tb_item_valor_coluna_par";
      else
      	$classe = "tb_item_valor_coluna_impar";

      $objz = new agenda_hora_usada();
			$objz->arr_filtro[0]["condicao"] = "and";
			$objz->arr_filtro[0]["nome"] = "sys_usuario_id";
			$objz->arr_filtro[0]["tipo"] = "integer";
			$objz->arr_filtro[0]["operacao"] = "=";
			$objz->arr_filtro[0]["valor"] = $row["id"];

			$objz->arr_filtro[1]["condicao"] = "and";
			$objz->arr_filtro[1]["nome"] = "agenda_hora_id";
			$objz->arr_filtro[1]["tipo"] = "integer";
			$objz->arr_filtro[1]["operacao"] = ">=";
			$objz->arr_filtro[1]["valor"] = $_POST["agenda_compromisso_dwd_agenda_hora_inicio_id"];

			$objz->arr_filtro[2]["condicao"] = "and";
			$objz->arr_filtro[2]["nome"] = "agenda_hora_id";
			$objz->arr_filtro[2]["tipo"] = "integer";
			$objz->arr_filtro[2]["operacao"] = "<";
			$objz->arr_filtro[2]["valor"] = $_POST["agenda_compromisso_dwd_agenda_hora_fim_id"];

			$objz->arr_filtro[3]["condicao"] = "and";
			$objz->arr_filtro[3]["nome"] = "ano";
			$objz->arr_filtro[3]["tipo"] = "integer";
			$objz->arr_filtro[3]["operacao"] = "=";
			$objz->arr_filtro[3]["valor"] = $_POST["agenda_compromisso_dwd_ano"];

			$objz->arr_filtro[4]["condicao"] = "and";
			$objz->arr_filtro[4]["nome"] = "mes";
			$objz->arr_filtro[4]["tipo"] = "integer";
			$objz->arr_filtro[4]["operacao"] = "=";
			$objz->arr_filtro[4]["valor"] = $_POST["agenda_compromisso_dwd_mes"];

			$objz->arr_filtro[5]["condicao"] = "and";
			$objz->arr_filtro[5]["nome"] = "dia";
			$objz->arr_filtro[5]["tipo"] = "integer";
			$objz->arr_filtro[5]["operacao"] = "=";
			$objz->arr_filtro[5]["valor"] = $_POST["agenda_compromisso_dwd_dia"];

			$matrizz = $objz->consultar();
			if (!empty($matrizz)){
				foreach($matrizz as $rowz){
          $int_hora_usada = 1;
				}
		  }else{
  		  $int_hora_usada = 0;
  		}

			$objx->arr_filtro[0]["condicao"] = "and";
			$objx->arr_filtro[0]["nome"] = "sys_usuario_id";
			$objx->arr_filtro[0]["tipo"] = "integer";
			$objx->arr_filtro[0]["operacao"] = "=";
			$objx->arr_filtro[0]["valor"] = $row["id"];

			$objx->arr_filtro[1]["condicao"] = "and";
			$objx->arr_filtro[1]["nome"] = "agenda_compromisso_id";
			$objx->arr_filtro[1]["tipo"] = "integer";
			$objx->arr_filtro[1]["operacao"] = "=";
			$objx->arr_filtro[1]["valor"] = $_POST[$_GET["campo_chave"]];

      $int_marcar = 0;
			$matrizx = $objx->consultar();
			if (!empty($matrizx)){
				foreach($matrizx as $rowx){
          $int_marcar = 1;
          $int_recusado = $rowx["recusado"];
          if ($rowx["agenda_compromisso_id"] == $objx->arr_filtro[1]["valor"]){            $int_hora_usada = 0;
          }
				}
		  }
?>
		  <tr class="tb_item_valor_linha">
	    <td width="10px" align="center" class="<?php echo $classe ?>">
	      <input name="usuario<?php echo $con_itc?>" type="hidden" value="<?php echo $row["id"]?>">
	      <?php //echo $row2["consulta"]
        if ($int_hora_usada == 0){
		      $objv = new com_checkbox("participar".$con_itc,"agenda",true);
		      if (($int_marcar == 1) && ($int_recusado == 0)){	          $objv->str_valor = 1;
		      }else{	          $objv->str_valor = 0;
		      }
		      if ($con_itc == 1){	          $str_campo .= "agenda_dwd_participar".$con_itc;
	          $str_campo .= ";dwd;usuario".$con_itc;
		      }else{
	   	      $str_campo .= ";dwd;agenda_dwd_participar".$con_itc;
	          $str_campo .= ";dwd;usuario".$con_itc;
	   	    }
	//	      $objv->str_valor = $row2["consulta"];
		      //$obj->str_desc_complemento = $this->arr_campo[$itc]["descricao_complemento"];
					$objv->criar();
		    }
	      ?>
	    </td>
	    <td class="<?php echo $classe ?>" align="left">
	    <?php
	    echo $row["login"];
	    if (($int_hora_usada == 1) && ($int_recusado == 0)){	      echo " - <strong>Indisponível para esse horário.</strong>";
	    }
	    if ($int_recusado == 1){	    	echo " - <strong>Recusou o compromisso.</strong>";
	    }
	    ?>
	    </td>
<?php
    }
?>  </table>
<?php
  }
?>
	<br>
	<fieldset>
	  <label class="botao_menu_dinamico lblbotao"><input value="Gravar" class="botao_detalhe" name="frm_con_copiar" id="frm_con_copiar" type="buttom" onClick="executar_exibir_img('../padrao_adm/agenda/agenda_compromisso_participante_executar.php?a=1&criar=nao&tot=<?php echo $con_itc?>&valor=<?php echo $_POST[$_GET["campo_chave"]]?>&str_campo=<?php echo $str_campo?>','campo_result_copiar','POST','<?php echo $str_campo?>',document.participante_<?php echo $obj->str_entidade?>,1,1,'../dwd_img');"></label>
	</fieldset>
	<div id="campo_result_copiar"></div>
	</form>
