<?php
session_start();
include ('wd_cal_header.inc.php');
if ($_GET["status"] == "excluir"){	//Exclui compromisso pelo calendario
	require_once("../../inc_dwd_class.php");
	require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
	require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso.php");
	require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora.php");
	require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora_usada.php");
	require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso_participante.php");  $obj = new agenda_compromisso();
	$obj->arr_filtro[0]["condicao"] = "Robson";
	$obj->arr_filtro[0]["nome"] = "id";
	$obj->arr_filtro[0]["tipo"] = "integer";
	$obj->arr_filtro[0]["operacao"] = "=";
	$obj->arr_filtro[0]["valor"] = $_GET["valor"];
	$obj->arr_filtro[0]["valor2"] = "0";
  $obj->excluir();
}
/*****************/
/* view calender */
/*****************/
function cal($month,$year,$monthborder,$calcells,$calcellp,$tablewidth,$trtopcolor,$calfontback,$calfontasked,$calfontnext,$sundaytopclr,$weekdaytopclr,$sundayemptyclr,$weekdayemptyclr,$todayclr,$sundayclr,$weekdayclr){
  global $maand,$week,$language,$m,$d,$y,$tdwidth,$tdtopheight,$tddayheight,$tdheight,$viewcalok,$searchmonthok,$popupevent,$popupeventwidth,$popupeventheight;
  $obj_dataset = new db_dataset($_SESSION["banco_tipo"],$_SESSION["servidor"],$_SESSION["banco_nome"],$_SESSION["banco_usuario"],$_SESSION["banco_senha"],$_SESSION["banco_porta"]);
  $str_tab_local = $obj_dataset->frm_str_nome;
  if ($viewcalok == 1){

		// previous month
		$pm = $month;
		if ($month == "1")
		    $pm = "12";
		else
		    $pm--;
		// previous year
		$py = $year;
		if ($pm == "12")
		    $py--;

		// next month
		$nm = $month;
		if ($month == "12")
		    $nm = "1";
		else
		    $nm++;
		// next year
		$ny = $year;
		if ($nm == 1)
		    $ny++;

		// get month we want to see
		$askedmonth = $maand[$month];
		$askedyear = $year;
		$firstday = date ("w", mktime(12,0,0,$month,1,$year));
		$firstday++;

		// nr of days in askedmonth
		$nr = date("t",mktime(12,0,0,$month,1,$year));
?>  <div>
		<table class="dwd_table_geral">
	    <tr><td class="dwd_td_titulo">
		    <h1>Calendário</h1>
		  </td></tr>
	    <tr><td class="dwd_th_center">
	    <form name="frm_agenda_usuario_<?php echo $str_tab_local?>" action="" method="post">
	      Usuário:
<?php   $obj = new com_combobox_dinamico("usuario","agenda",true);
			  $obj->bol_item_selecao = false;
				$obj->arr_lookup["tabela"] = "sys_usuario";
				$obj->arr_lookup["chave"] = "id";
				$obj->arr_lookup["chave_tipo"] = "integer";
				$obj->arr_lookup["retorno"] = "login";
				$obj->arr_lookup["retorno_tipo"] = "string";
				if (isset($_GET["com"])){
				  if ($_POST["agenda_dwd_usuario"] != $_SESSION["usuario_id"]){					  $obj->arr_lookup["valor"] = $_POST["agenda_dwd_usuario"];
					  $int_usuario_id = $_POST["agenda_dwd_usuario"];
					  $str_sql_privado = "AND AC.PRIVADO = 0";
			    }else{					  $obj->arr_lookup["valor"] = $_SESSION["usuario_id"];
					  $int_usuario_id = $_SESSION["usuario_id"];
					  $str_sql_privado = "";
			    }
				}else{
				  $obj->arr_lookup["valor"] = $_SESSION["usuario_id"];
				  $int_usuario_id = $_SESSION["usuario_id"];
				  $str_sql_privado = "";
				}
				$obj->str_on_change = " executar_exibir_img('../sys_adm/agenda/wd_calendario.php?a=1&com=sim','".$str_tab_local."','POST','agenda_dwd_usuario',document.frm_agenda_usuario_".$str_tab_local.",1,1,'../dwd_img'); ";
				$obj->criar();
?>
      </form>
		  </td></tr>
	    <tr><td>
        <table class="dwd_table">
          <tr class="dwd_tr_title">
            <th colspan="2" class="dwd_th_center">
              <a href="#" onClick="executar_exibir_img('agenda/wd_calendario.php?op=cal&month=<?php echo $pm ?>&year=<?php echo $py ?>','<?php echo $str_tab_local?>','GET','','',1,1,'../dwd_img');">
                <?php echo $maand[$pm] ?> - <?php echo $py ?>
              </a>
            </th>
            <th colspan="3" class="dwd_th_center">
              <h1>
              <?php echo $askedmonth." ".$askedyear?>
              </h1>
            </th>
            <th colspan="2" class="dwd_th_center">
              <a href="#" onClick="executar_exibir_img('agenda/wd_calendario.php?op=cal&month=<?php echo $nm ?>&year=<?php echo $ny ?>','<?php echo $str_tab_local?>','GET','','',1,1,'../dwd_img');">
               <?php echo $maand[$nm] ?> - <?php echo $ny ?>
             </a>
            </th>
          </tr>
	        <tr class="dwd_tr_title">
<?php
	  // Determina estilo para descrição do domingo e para os demais dias da semana
	  for ($i=1;$i<=7;$i++){
	    echo "<th  ";
		  if ($i == 1){
	      echo "class=\"dwd_td_domingo\">".$week[$i]."</th>"; // sunday
			}else{
		    echo "class=\"dwd_td_semana\">".$week[$i]."</th>"; // rest of week
			}
		}
		echo "</tr>";
		// Determina estilo para dias normais domingo e dias da semana
		for ($i=1;$i<$firstday;$i++){
		  echo "<td ";
		  if ($i == "1"){
		    echo "class=\"dwd_td_domingo\" ";
			}else{
	      echo "class=\"dwd_td_semana\" ";
			}
		  echo "></td>";
		}
		$a=0;
		for ($i=1;$i<=$nr;$i++){
	    echo "<td style=\"border: 1px solid #FFFFFF;\" height=$tdheight ";
	    if ($i == $d && $month == $m && $year == $y){
	      echo "class=\"dwd_td_dia_atual\" ";
	    }
	if (($i == (2-$firstday)) or ($i == (9-$firstday)) or ($i == (16-$firstday)) or ($i == (23-$firstday)) or ($i == (30-$firstday)) or ($i == (37 - $firstday))){
	      echo "class=\"dwd_td_domingo_numero\" ";
	    }else{
	      echo "class=\"dwd_td_semana_numero\" ";
	    }
?>
	    valign=top><span style="cursor:pointer;" onclick="createNewTab('dhtmlgoodies_tabView2','Compromisso Gravar','','agenda/agenda_compromisso_cadastro.php?a=1&status=gravar&ano=<?php echo $py ?>&mes=<?php echo $month ?>&dia=<?php echo $i ?>',true);" title="Novo compromisso para dia"><strong><?php echo $i ?></strong></span><br>
<?php
      $obj_dataset->str_sql = "SELECT AC.AGENDA_PRIORIDADE_ID,AC.AGENDA_STATUS_ID,AC.AGENDA_ATIVIDADE_ID,AC.AGENDA_CATEGORIA_ID,AC.ID,AC.DIA,AC.MES,AC.ANO,AC.AGENDA_HORA_INICIO_ID,AH.HORA,AHF.HORA AS HORA_FIM,AC.DURACAO,AC.ASSUNTO,AC.LOCAL,AC.DESCRICAO,ACA.NOME AS CATEGORIA_NOME,AP.NOME AS PRIORIDADE_NOME,AA.NOME AS ATIVIDADE_NOME,AST.NOME AS STATUS_NOME FROM agenda_compromisso AC LEFT OUTER JOIN agenda_hora AH ON AH.ID = AC.AGENDA_HORA_INICIO_ID LEFT JOIN agenda_categoria ACA ON AC.AGENDA_CATEGORIA_ID = ACA.ID LEFT JOIN agenda_prioridade AP ON AC.AGENDA_PRIORIDADE_ID = AP.ID LEFT JOIN agenda_atividade AA ON AC.AGENDA_ATIVIDADE_ID = AA.ID LEFT JOIN agenda_status AST ON AC.AGENDA_STATUS_ID = AST.ID LEFT OUTER JOIN agenda_hora AHF ON AHF.ID = AC.AGENDA_HORA_FIM_ID WHERE AC.SYS_USUARIO_ID=".$int_usuario_id." AND AC.DIA='$i' AND AC.MES='$month' AND AC.ANO='$year' ".$str_sql_privado." ORDER BY DIA,MES,ANO ASC";
      $matriz = $obj_dataset->consultar();
			if (!empty($matriz)){
				//Percore todos os registros da matriz
				foreach($matriz as $row){
?>          <a href="#" onmouseout="mostrar_esconder('sim','compromisso_resumo_<?php echo $str_tab_local.$row["ID"]?>');" onmouseover="mostrar_esconder('nao','compromisso_resumo_<?php echo $str_tab_local.$row["ID"]?>');" onclick="createNewTab('dhtmlgoodies_tabView2','Agenda do Dia','','agenda/wd_modulo_compromisso.php?Ano=<?php echo $row["ANO"] ?>&Mes=<?php echo $row["MES"] ?>&Dia=<?php echo $row["DIA"] ?>',true);">
            <?php $arr_hora = explode(":",stripslashes($row["HORA"])) ?>
            <?php $arr_hora_fim = explode(":",stripslashes($row["HORA_FIM"])) ?>
            <?php echo  $arr_hora[0].":".$arr_hora[1]." - ".$arr_hora_fim[0].":".$arr_hora_fim[1];?>
					  </a><input onclick="createNewTab('dhtmlgoodies_tabView2','Compromisso Editar','','agenda/agenda_compromisso_cadastro.php?a=1&status=editar&valor=<?php echo $row["ID"] ?>',true);" title="Editar compromisso" type=image src="../dwd_img/com_editar.png" width="13px" height="13px" name="sub">
    					  <input onClick="executar_exibir_img('agenda/wd_calendario.php?a=1&status=excluir&valor=<?php echo $row["ID"]?>','<?php echo $str_tab_local?>','GET','','',1,1,'../dwd_img');" type=image src="../dwd_img/com_excluir.png" name="sub" height="13px" widht="13px"><br>
					  <?php
					  //Foi criado um para cada compromisso pois o mesmo SQL que traz a hora ja retorna outras informações do compromisso
					  ?>
					  <span style="display:none" class="compromisso_resumido" id="compromisso_resumo_<?php echo $str_tab_local.$row["ID"]?>">
            <strong>Assunto:</strong>    <?php echo $row["ASSUNTO"]."<br>"?>
            <strong>Local:</strong>      <?php echo $row["LOCAL"]."<br>"?>
            <hr>
            <strong>Atividade:</strong>  <?php echo $row["ATIVIDADE_NOME"]."<br>"?>
            <strong>Categoria:</strong>  <?php echo $row["CATEGORIA_NOME"]."<br>"?>
            <strong>Prioridade:</strong> <?php echo $row["PRIORIDADE_NOME"]."<br>"?>
            <strong>Status:</strong>     <?php echo $row["STATUS_NOME"]?>
					  </span>
<?php
			  }
			}
		  echo "</td>";
		  $a++;
		  if (($i == (8-$firstday)) or ($i == (15-$firstday)) or ($i == (22-$firstday)) or ($i == (29-$firstday)) or ($i == (36 - $firstday))){
		    echo "</tr><tr>";
		    $a = 0;
		  }
		}
		// Completa as colunas sem dias no final do calendário
		if ($a != 0){
		  $last = 7-$a;
		  for ($i=1;$i<=$last;$i++){
		    echo "<td class=\"dwd_td_semana_complemento\">&nbsp;</td>";
		  }
		}
		echo "</tr>";
		echo "</table>";
		echo "</td></tr>";
		echo "</table>";
		echo "</div>";
	}else{
	  echo translate("disabled");
	}
}


switch ($op){
  // default: bar, and show new submissions
  default:{
	  if ($caldefault == 2){
		  if (!$month)
			  $month = $m;
		  if (!$year)
			  $year = $y;
        cal($month,$year,$monthborder,$calcells,$calcellp,$tablewidth,$trtopcolor,$calfontback,$calfontasked,$calfontnext,$sundaytopclr,$weekdaytopclr,$sundayemptyclr,$weekdayemptyclr,$todayclr,$sundayclr,$weekdayclr);
	  }
    break;
  }
}
?>
<div id="com_alt" style="text-align: left; position:absolute; width:300px; height:200px; z-index:1; visibility:hidden; overflow: visible;  border: 1px none #000000;">
  <table width="100%" style="	background-color: #FFFFFF;"><tr>
    <td width="100%" align="center" class="dwd_frm_cadastro_cabecalho_ajuda">Alterar Registro (<strong id="alt_age"></strong>)</td>
    <td width="20px" class="dwd_frm_cadastro_cabecalho_ajuda"><img onClick="Layer(event,'com_alt',300)" style="cursor: pointer;" title="Ajuda referente a tela" src="<?php echo $_SESSION["raiz_dwd_imagem"]?>bt_fechar.gif"  /></td>
  </tr><tr>
    <td colspan="2" class="dwd_frm_cadastro_conteudo_ajuda">
      <div id="com_alt_form">
      </div>
    </td>
  </tr>
  </table>
<div>