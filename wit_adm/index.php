<?php
require_once("../inc_dwd_class.php");
require_once("usuario_autenticar.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/menu_rapido.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <meta name="generator" content="DWD, www.developwd.com">
  <link href="css/pagina.css" rel="stylesheet" type="text/css" />
  <link href="css/agenda.css" rel="stylesheet" type="text/css" />
	<link href="../dwd_css/com_data_calendario.css" rel="stylesheet" type="text/css" />
	<link href="../dwd_css/frm_cadastro.css" rel="stylesheet" type="text/css" />
	<link href="../dwd_css/frm_consulta.css" rel="stylesheet" type="text/css" />
	<link href="../dwd_css/frm_filtro.css" rel="stylesheet" type="text/css" />
	<link href="../dwd_css/componentes.css" rel="stylesheet" type="text/css" />
  <link href="../dwd_css/agenda.css" rel="stylesheet" type="text/css"/>
  <link href="../dwd_css/treeview.css" rel="stylesheet" type="text/css"/>
  <link href="../dwd_css/menu_rapido.css" rel="stylesheet" type="text/css"/>
  <link href="../dwd_css/tab_view.css" rel="stylesheet" type="text/css"/>
  <script src="../dwd_js/ajax.js" TYPE="text/javascript"> </script>
	<script src="../dwd_js/componente.js" TYPE="text/javascript"> </script>
	<script src="../dwd_js/formatar.js" TYPE="text/javascript"> </script>
	<script src="../dwd_js/com_data_calendario.js" TYPE="text/javascript"> </script>
	<script src="../dwd_js/frm_filtro.js" TYPE="text/javascript"> </script>
	<script src="../dwd_js/frm_consulta.js" TYPE="text/javascript"> </script>
	<script src="../dwd_js/agenda.js" TYPE="text/javascript"> </script>
	<script src="../dwd_js/edit_arquivo.js" TYPE="text/javascript"> </script>
	<script src="../dwd_js/menu_dinamico.js" TYPE="text/javascript"> </script>
  <script src="../dwd_js/treeview.js" language="JavaScript"></script>
  <script src="../dwd_js/menu_rapido_jquery.js" language="JavaScript"></script>
  <script src="../dwd_js/menu_rapido_interface.js" language="JavaScript"></script>
  <script src="../dwd_js/fpdf_relatorio.js" language="JavaScript"></script>
  <script src="../dwd_js/menu_rapido_interface.js" language="JavaScript"></script>
  <script src="../dwd_js/tab_view_ajax.js" language="JavaScript"></script>
  <script src="../dwd_js/tab_view.js" language="JavaScript"></script>
  <script src="../dwd_js/tecla_atalho.js" language="JavaScript"></script>
  <title></title>
<!--[if lt IE 7]>
 <style type="text/css">
 div, img { behavior: url(iepngfix.htc) }
 </style>
<![endif]-->
  </head>
  <body onload="dwd_ajax();">
    <div id="body">
         <div id="top">
            <?php
            echo "<strong>Usuário:</strong> ".$_SESSION["usuario_id"]."-".$_SESSION["usuario_login"]."  <br>";
            echo "<strong>Sistema:</strong> ".$_SESSION["usuario_sistema_id"]."-".$_SESSION["usuario_sistema_nome"]."  <br>";
            echo "<strong>Empresa:</strong> ".$_SESSION["empresa_id"]."-".$_SESSION["empresa_nome"]."  <br>";
            echo "<strong>Filial:</strong> ".$_SESSION["filial_id"]."-".$_SESSION[filial_nome]."  <br>";
            $obj_menu = new menu_rapido();
            $obj_menu->criar();
            ?>
<!--
           <div class="dock" id="dock2">
	  	      <div class="dock-container2">
			 		   	<a class="dock-item2" ><img src="img/menu/administracao.png" alt="teste" style="cursor:pointer;"/><span>novo</span></a>
            	<a class="dock-item2" ><img src="img/menu/administracao.png" alt="teste" style="cursor:pointer;"/><span>novo</span></a>
            	<a class="dock-item2" ><img src="img/menu/administracao.png" alt="teste" style="cursor:pointer;"/><span>novo</span></a>
		        </div>
           </div>
-->
         </div>
         <div id="midle">
            <div id="menu">
              <?php
             //Monatagem do menu de acesso as funcionalidades do sistema
              require_once("menu_esquerdo.php");
              ?>
            </div>
            <div id="content">
							<div id="dhtmlgoodies_tabView2">
								<div class="dhtmlgoodies_aTab">
									Capital: Oslo

									<a href="#" onclick="showTab('dhtmlgoodies_tabView2',1); createNewTab('dhtmlgoodies_tabView2','Categoria','','agenda/wd_calendario.php?a=1',true);return false">Create new tab dynamically</a><br>

		              <?php
		              //Definição do conteúdo principal do sitema
		              include("agenda/wd_calendario_index.php");
		              //include("agenda/agenda_atividade_consulta.php");
		              ?>
								</div>
<!--
								<div class="dhtmlgoodies_aTab">
									Capital: Stockholm	<br>
									<a href="#" onclick="deleteTab('Sweden')">Remove this tab</a><br>
								</div>
								<div class="dhtmlgoodies_aTab">
									Capital: Copenhagen
									<a href="#" onclick="deleteTab('Denmark')">Remove this tab</a><br>
								</div>
-->
							</div>
              <?php
              //Definição do conteúdo principal do sitema
              //include("agenda/wd_calendario_index.php");
              ?>
            </div>
        </div>
    </div>
    <div id="menu_direito">
      <?php
      //Definição dos módulos agregados ao sistema
      include("agenda/wd_modulo_calendario_index.php");
      ?>
    </div>
<script type="text/javascript">
initTabs('dhtmlgoodies_tabView2',Array('Principal'),0,880,450,Array(false,true,true));
</script>
<script type="text/javascript">
  //determina que os atalhos devem ser criados para a tela de consulta
  var arr_frm_tipo = new Array;
  var arr_descricao_tab = new Array;
	$(document).ready(
		function()
		{
			$('#dock2').Fisheye(
				{
					maxWidth: 60,
					items: 'a',
					itemsText: 'span',
					container: '.dock-container2',
					itemWidth: 40,
					proximity: 80,
					alignment : 'left',
					valign: 'bottom',
					halign : 'center'
				}
			)
		}
	);

</script>
  </body>
</html>