<link href="../../dwd_css/com_data_calendario.css" rel="stylesheet" type="text/css" />
<link href="../../dwd_css/frm_consulta.css" rel="stylesheet" type="text/css" />
<link href="../../dwd_css/componentes.css" rel="stylesheet" type="text/css" />
<script src="../../dwd_js/ajax.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/componente.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/com_data_calendario.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/frm_filtro.js" TYPE="text/javascript"> </script>
<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."dwd_entidade/teste.php");
require_once("../../dwd.php");
?>
<body onload="dwd_ajax();">
<div id="principal">
<?php
$obj = new frm_consulta();
$obj->str_arquivo_consulta = "frm_consulta.php";
$obj->str_consulta_local = "principal";
$obj->obj_entidade = new teste();
$obj->criar();
?>
<div id="resultado_filtro">Resultado</div>
exemplo novo valor
</div>
aplicar teste
</body>

