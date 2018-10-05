<?php
header("Content-Type: text/html;  charset=ISO-8859-1",true);
include("../../inc_dwd_class.php");
$obj_compromisso = new db_dataset($_SESSION["banco_tipo"],$_SESSION["servidor"],$_SESSION["banco_nome"],$_SESSION["banco_usuario"],$_SESSION["banco_senha"],$_SESSION["banco_porta"]);
$str_tab_local = $obj_compromisso->frm_str_nome;
//Busca os parametros de data caso forem passados pela URL
$day = $_GET['Dia'];
$dia_hoje = $_GET['Dia'];

$month = $_GET['Mes'];
$mes_hoje = $_GET['Mes'];

$year = $_GET['Ano'];
$ano_hoje = $_GET['Ano'];

//Caso o dia venha vazio (sem nada na url)
if (!isset($day)) {
  //Seta as variaveis para os valores do dia padrão da data atual
  $day=date("d",mktime());
  $dia_hoje = date("d",mktime());
}

//Caso o mes venha vazio (sem nada na url)
if (!isset($month)) {
  //Seta as variaveis para os valores do dia padrão da data atual
  $month=date("m",mktime());
  $mes_hoje = date("m",mktime());
}
//Caso o dia venha vazio

//Caso o ano venha vazio (sem nada na url)
if (!isset($year)) {
  //Seta as variaveis para os valores do dia padrão da data atual
  $year=date("Y",mktime());
  $ano_hoje = date("Y",mktime());
}

//Caso o dia venha vazio
if (isset($day)) {
  if ($day<="9"&ereg("(^[1-9]{1})",$day)) {
    $day="0".$day;
  }
}

 $day = ltrim($day,"0");
 $month = ltrim($month,"0");
   $obj_compromisso->str_sql = "SELECT AC.ID,AC.DIA,AC.MES,AC.ANO,AH.HORA,AC.DURACAO,AC.ASSUNTO,AC.LOCAL,AC.DESCRICAO,ACA.NOME AS CATEGORIA_NOME,AP.NOME AS PRIORIDADE_NOME, AA.NOME AS ATIVIDADE_NOME,AST.NOME AS STATUS_NOME FROM agenda_compromisso AC LEFT JOIN agenda_categoria ACA ON AC.AGENDA_CATEGORIA_ID = ACA.ID LEFT JOIN agenda_prioridade AP ON AC.AGENDA_PRIORIDADE_ID = AP.ID LEFT JOIN agenda_atividade AA ON AC.AGENDA_ATIVIDADE_ID = AA.ID LEFT JOIN agenda_status AST ON AC.AGENDA_STATUS_ID = AST.ID LEFT JOIN agenda_hora AH ON AH.ID = AC.AGENDA_HORA_INICIO_ID WHERE AC.DIA='$day' AND AC.MES='$month' AND AC.ANO='$year' ORDER BY DIA,MES,ANO ASC";
	$str_campo_agenda = "id;wd;wd_usuario_id;wd;dia;wd;mes;wd;ano;wd;hora;wd;duracao;wd;assunto;wd;local;wd;descricao;wd;wd_agenda_atividade_id;wd;wd_agenda_prioridade_id;wd;wd_agenda_categoria_id";
	$str_campo_tipo_agenda = "auto_incremento;wd;integer;wd;integer;wd;integer;wd;integer;wd;time;wd;time;wd;string;wd;string;wd;string;wd;integer;wd;integer;wd;integer";
  $matriz_compromisso = $obj_compromisso->consultar();

$thisday="$year-$month-$day";

//Monta o array com os dias da semana
$day_name=array("Segunda","Terça","Quarta","Quinta","Sexta","Sábado","<font color=\"#990000\">Domingo</font>");

//Monta o array com os nomes dos meses
$month_abbr=array("","Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

//Armazena o ano na variável
$y=date("Y");

//Efetua o switch para exibição dos meses
switch ($month) {
  case 1:  $month_name = "Janeiro";	break;
  case 2:  $month_name = "Fevereiro";	break;
  case 3:  $month_name = "Março";	break;
  case 4:  $month_name = "Abril";	break;
  case 5:  $month_name = "Maio";	break;
  case 6:  $month_name = "Junho";	break;
  case 7:  $month_name = "Julho";	break;
  case 8:  $month_name = "Agosto";	break;
  case 9:  $month_name = "Setembro";	break;
  case 10: $month_name = "Outubro";	break;
  case 11: $month_name = "Novembro";	break;
  case 12: $month_name = "Dezembro";	break;
}

$next = mktime(0,0,0,$month,$day + 1,$year);
$nextano = date("Y",$next);
$nextmes = date("m",$next);
$nextdia = date("d",$next);

$prev = mktime(0,0,0,$month,$day - 1,$year);
$prevano = date("Y",$prev);
$prevmes = date("m",$prev);
$prevdia = date("d",$prev);

$d = mktime(0,0,0,$month,1,$year);
$diaSem = date('w',$d);
?>

<table width="100%" border="0" align="left" cellpadding='0' cellspacing='0'>
  <tr>
    <td valign="top">
    <table id='2' class="listView" width="100%" border="0" valign="middle" cellpadding="0" cellspacing="0">
      <tr valign="middle" height='30'>
        <td width="60" align="center">
		    		<font size="2" face="Tahoma">
					  <img src="../dwd_img/voltar.png" alt='Exibe os Compromissos do Dia Anterior' border='0' align="middle" onclick="executar_exibir_img('agenda/wd_modulo_compromisso.php?a=1&Dia=<?php echo $prevdia ?>&Mes=<?php echo $prevmes ?>&Ano=<?php echo $prevano ?>','<?php echo $str_tab_local?>','GET','','',1,1,'../dwd_img')" style="cursor: pointer"/>
					  </font>
        </td>
        <td >
          <div align="center">
    		    <font size="4" face="Tahoma" color='#424542'>
	 	        <b><?php echo "Agendamento diário para $dia_hoje de $month_name de $ano_hoje"; ?></b>
		        </font>
          </div>
        </td>
        <td width="60" align="center">
		    	<font size="2" face="Tahoma">
					<img src="../dwd_img/avancar.png" alt='Exibe os Compromissos para o Próximo Dia' border='0' align="middle" onclick="executar_exibir_img('agenda/wd_modulo_compromisso.php?a=1&Dia=<?php echo $nextdia ?>&Mes=<?php echo $nextmes ?>&Ano=<?php echo $nextano ?>','<?php echo $str_tab_local?>','GET','','',1,1,'../dwd_img')" style="cursor: pointer"/>
		      </font>
        </td>
      </tr>
    </table>
		</td>
	</tr>

	<tr>
		<td>&nbsp;</td>
	</tr>

	<tr>
  	<td>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="listView" id='9'>
	<?php
     		//Rotina para pesquisar no banco e retornar os compromissos por hora
				for ($linhaHora = 00; $linhaHora < 24; $linhaHora++) {

					if ($linhaHora < 10) {
					  $horaPesquisa = '0' . $linhaHora;
					} else {
					  $horaPesquisa = $linhaHora;
					}
					?>
					<td width='60' height="20" bgcolor="#9CB6CE" style="cursor:pointer; border-bottom: 1px solid" onclick="createNewTab('dhtmlgoodies_tabView2','Compromisso Gravar','','agenda/agenda_compromisso_cadastro.php?a=1&status=gravar&ano=<?php echo $year ?>&mes=<?php echo $month ?>&dia=<?php echo $day ?>&hora_com=<?php echo $horaPesquisa.":00"?>',true);">
			      <div align="center"><font size="2" face="Tahoma"><strong><?php echo $horaPesquisa ?>:00</strong></font></div>
			    </td>
			    <td width="476" bgcolor="#FFFFFF" style="border-bottom: 1px solid #000000;">
						<?php /*Monta o início da tabela interna dos compromissos da hora*/ ?>
						<table width='100%' border='0' cellpadding='0' cellspacing='0'>
						<?php
					  if (!empty($matriz_compromisso)){
					    foreach($matriz_compromisso as $row){
								if ($horaPesquisa == substr($row["HORA"],0,2)){
					        $hora_curta = substr($row['HORA'], 0, 5);
?>
					   	  <tr valign='middle'>
					   	    <td style='cursor:pointer;' onclick="createNewTab('dhtmlgoodies_tabView2','Compromisso Editar','','agenda/agenda_compromisso_cadastro.php?a=1&status=editar&valor=<?php echo $row["ID"] ?>',true);" title='Clique para exibir os detalhes do compromisso (<?php echo $row["ASSUNTO"] ?>)' >
					   	    <font size='2'>(<strong><?php echo $hora_curta ?></strong>)</font>
									<font size='2' face='Tahoma' title="Compromisso"> <strong>-</strong> <?php echo $row["ASSUNTO"] ?></font>
									<font size='2' face='Tahoma' title="Local"> <strong>-</strong> <?php echo $row["LOCAL"] ?></font>
					  			</td>
							  </tr>
<?php
								}
							}
						}
             /*Fecha a tabela para exibição dos compromissos*/ ?>
            &nbsp;
		      	</table>

					</td>
			  </tr>
<?php
				}
?>    </table>
    </td>
  </tr>
</table>

