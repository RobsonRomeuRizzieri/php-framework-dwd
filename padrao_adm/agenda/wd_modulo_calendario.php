<?php
session_start();
  $obj_dataset = new db_dataset($_SESSION["banco_tipo"],$_SESSION["servidor"],$_SESSION["banco_nome"],$_SESSION["banco_usuario"],$_SESSION["banco_senha"],$_SESSION["banco_porta"]);

  $obj_dataset->str_sql = "SELECT AC.AGENDA_PRIORIDADE_ID,AC.AGENDA_STATUS_ID,AC.AGENDA_ATIVIDADE_ID,AC.AGENDA_CATEGORIA_ID,AC.ID,AC.DIA,AC.MES,AC.ANO,AC.AGENDA_HORA_INICIO_ID,AH.HORA,AC.DURACAO,AC.ASSUNTO,AC.LOCAL,AC.DESCRICAO,ACA.NOME AS CATEGORIA_NOME,AP.NOME AS PRIORIDADE_NOME,AA.NOME AS ATIVIDADE_NOME,AST.NOME AS STATUS_NOME FROM agenda_compromisso AC LEFT OUTER JOIN agenda_hora AH ON AH.ID = AC.AGENDA_HORA_INICIO_ID LEFT JOIN agenda_categoria ACA ON AC.AGENDA_CATEGORIA_ID = ACA.ID LEFT JOIN agenda_prioridade AP ON AC.AGENDA_PRIORIDADE_ID = AP.ID LEFT JOIN agenda_atividade AA ON AC.AGENDA_ATIVIDADE_ID = AA.ID LEFT JOIN agenda_status AST ON AC.AGENDA_STATUS_ID = AST.ID WHERE AC.SYS_USUARIO_ID=".$_SESSION["usuario_id"]." ORDER BY DIA,MES,ANO ASC";
  $matriz_compromisso = $obj_dataset->consultar();

$cor_topo='6666CC';

//Aplica a cor padrão
$cor_diahoje = 'FFFFCD';

//Aplica a cor padrão
$cor_compromisso = '9999FF';

//Aplica a cor padrão
$cor_dianormal = 'CDCDCD';


if (isset($show_month)) {
if ($show_month==">") {
  if($month==12) {
     $month=1;
     $year++;
     } else {
     $month++;
     }
     }
if ($show_month=="<") {
  if($month==1) {
     $month=12;
     $year--;
     } else {
     $month--;
     }
     }
}

//Busca os parametros de data caso forem passados pela URL
$day = $_GET['Dia'];
$month = $_GET['Mes'];
$year = $_GET['Ano'];

//Caso o dia venha vazio (sem nada na url)
if (!isset($day)) {
  //Seta as variaveis para os valores do dia padrão da data atual
  $day=date("d",mktime());
}

//Caso o mes venha vazio (sem nada na url)
if (!isset($month)) {
  //Seta as variaveis para os valores do dia padrão da data atual
  $month=date("m",mktime());
  }

//Caso o ano venha vazio (sem nada na url)
if (!isset($year)) {
  //Seta as variaveis para os valores do dia padrão da data atual
  $year=date("Y",mktime());
}

if (isset($day)) {
if ($day <= "9"&ereg("(^[1-9]{1})",$day)) {
  $day="0".$day;
  }
}

$thisday="$year-$month-$day";
//Cria o array com as iniciais do dia da semana para a primeira linha do calendário
$day_name=array("S","T","Q","Q","S","S"	,"<font color=\"#990000\">D</font>");
//Cria o array com a descrição do mes
$month_abbr=array("","Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

//Cria o switch com a descrição do mes
$y=date("Y");
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

$next = mktime(0,0,0,$month + 1,1,$year);
$nextano = date("Y",$next);
$nextmes = date("m",$next);

$prev = mktime(0,0,0,$month - 1,1,$year);
$prevano = date("Y",$prev);
$prevmes = date("m",$prev);

$d = mktime(0,0,0,$month,1,$year);
$diaSem = date('w',$d);
?>
<div id="calendario_rapido">
<table  border="0" align="left" cellpadding='0' cellspacing='0'>
  <tr>
    <td width="100%" valign="top" align="center"> </td>
  </tr>

  <tr>
    <td valign="top" align="center">

      <table class="listView" width="164" border="0" align="center" valign="middle" cellpadding="0" cellspacing="0">
        <tr valign="middle" height='20'>
          <td width="20">
            <div align="center" valign="top">
						  <font size="2" face="Tahoma">
					    <img src="../dwd_img/bt_anterior.gif" alt='Exibe o calendário do M&ecirc;s Anterior' border='0' align="middle" onclick="executar_exibir_img('agenda/wd_modulo_calendario.php?Mes=<?php echo $prevmes ?>&Ano=<?php echo $prevano ?>&header=1','calendario_rapido','GET','','',1,1,'../dwd_img')" style="cursor: hand">
					    </font>
					  </div>
          </td>
          <td >
            <div align="center">
						<font size="2" face="Tahoma" color='#424542'>
						<b><?php echo "$month_name de $year"; ?></b>
						</font>
            </div>
          </td>
          <td width="20">
            <div align="center">
		        <font size="2" face="Tahoma">
					  <img src="../dwd_img/bt_proximo.gif" alt='Exibe o calendário do Próximo M&ecirc;s' border='0' align="middle" onclick="executar_exibir_img('agenda/wd_modulo_calendario.php?Mes=<?php echo $nextmes ?>&Ano=<?php echo $nextano ?>&header=1','calendario_rapido','GET','','',1,1,'../dwd_img')" style="cursor: hand"/>
			      </font>
		        </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td>
      <table bgcolor="#<?php echo $cor_topo ?>" class="listView" width="164" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr align="center">
          <?php for ($i=0;$i<7;$i++) { ?>
          <td width="37" align="center" background="<?php echo $_SESSION["raiz_dwd_imagem"]?>fundo_consulta.gif" bgcolor='#C0C0C0'>
          <b><font size="2" face="Tahoma"><?php echo "$day_name[$i]"; ?></font></b>
          </td>
          <?php } ?>
        </tr>
        <tr  align="center">
          <?php

          if (date("w",mktime(0,0,0,$month,1,$year))==0) {
            $start=7;
          } else {
            $start=date ("w",mktime(0,0,0,$month,1,$year));
          }
            for($a=($start-2);$a>=0;$a--)
          {
            $d=date("t",mktime(0,0,0,$month,0,$year))-$a;
         ?>
          <td width='37' bgcolor="#EEEEEE" align="center"><?php $d?></td>
          <?php }

                for($d=1;$d<=date("t",mktime(0,0,0,($month+1),0,$year));$d++)
                {
         		global $linha;
   	            if($month==date("m") && $year==date("Y") && $d==date("d")) {

							//Se for o dia de hoje
              $bg='bgcolor="#'. $cor_diahoje . '"';
          	  $links="<a>";
	            $alinks="</a>";
	            $linkAjax = "";
		          $st="";
	            $sb="";

             	} else {

              //Se for um dia normal...
 					    $bg='bgcolor="#'. $cor_dianormal . '"';
       	      $links="<a>";
	            $alinks="</a>";
	            $linkAjax = "";
			        $st="";
	            $sb="";

	            }
    if (!empty($matriz_compromisso)){
      foreach($matriz_compromisso as $row_compromisso){

//			    for ($i=0;$i<$linha;$i++){
	            global $month,$year,$d;
	            $id_sql = $row_compromisso["ID"];
              $dia_sql = $row_compromisso["DIA"];
	            $mes_sql = $row_compromisso["MES"];
	            $ano_sql = $row_compromisso["ANO"];
              $id = ltrim($id_sql,"0");
	            $ano = ltrim($ano_sql,"0");
	            $mes = ltrim($mes_sql,"0");
	            $dia = ltrim($dia_sql,"0");

	        //Caso o dia conter compromissos
			    if($d==$dia&$year==$ano&$month==$mes) {
	            //Alimenta a variável da cor do fundo da tabela do dia com compromisso
							$bg='bgcolor="#'. $cor_compromisso . '"';
							//Alimenta a variável contendo o link para aparecer a "maozinha"
	            $links="<a title=\"Exibir compromissos desta data\" href=\"#\" onclick=\"createNewTab('dhtmlgoodies_tabView2','Agenda do Dia','','agenda/wd_modulo_compromisso.php?Dia=$dia&Mes=$mes&Ano=$ano',true);\">";
							//Alimenta a variável para fechar a tag de link
	            $alinks="</a>";
	            //Alimenta a variável de negrito
	            $st="<strong>";
	            //Alimenta a variável de remove negrito
	            $sb="</strong>";
	            }
				}
			}
             ?>
          <td <?php echo $bg ?> ><font size="2" face="Tahoma"><?php echo $links; ?> <?php echo $st; ?> <?php echo $d;?> <?php echo $sb; ?> <?php echo $alinks; ?></td>

		<?php
            if(date("w",mktime(0,0,0,$month,$d,$year))==0&date("t",mktime(0,0,0,($month+1),0,$year))>$d)
             {
            ?>
        </tr>

	    <tr align="center">
          <?php   }}
             $da=$d+1;
             if(date("w",mktime(0,0,0,$month+1,1,$year))<>1)
             {
             $d=1;
             while(date("w",mktime(0,0,0,($month+1),$d,$year))<>1)
                  {
            ?>
          <td bgcolor="#EEEEEE" align="center">
		    <?php $d?>
		  </td>
          <?php
            $d++;
                  }
             }
            ?>
          </font>
		</tr>
    </table>
  </td>
</tr>

<tr>
  <td valign="top" align="center">
    <table width="164" height="21" border="0" cellpadding="0" cellspacing="0" bordercolor="#666666">
  		<tr>
		  <td height="5" colspan="2"></td>
  		</tr>
		<tr>
    	  <td width="14" bgcolor="#<?php echo $cor_compromisso ?>" style="border: solid 1px">&nbsp;</td>
    	  <td align="left" style="	font-family: Verdana; 	font-size: 10px;">&nbsp;Dia Com Compromisso</td>
  		</tr>
	</table>
  </td>
</tr>
</table>
</div>