<link href="../../dwd_css/com_data_calendario.css" rel="stylesheet" type="text/css" />
<link href="../../dwd_css/frm_filtro.css" rel="stylesheet" type="text/css" />
<link href="../../dwd_css/componentes.css" rel="stylesheet" type="text/css" />
<script src="../../dwd_js/ajax.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/componente.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/com_data_calendario.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/frm_filtro.js" TYPE="text/javascript"> </script>
<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."dwd_entidade/teste.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."dwd_entidade/teste_filho.php");
require_once("../../dwd.php");
$obj = new frm_filtro();
$obj->str_item_arquivo = "frm_filtro_paginado_item.php";
$obj->str_resultado_local = "resultado_filtro";
$obj->str_resultado_arquivo = "frm_filtro_paginado_executar.php";
$obj->obj_entidade = new teste();
$obj->criar($_GET["filtro"],$_GET["str_campo"]);
