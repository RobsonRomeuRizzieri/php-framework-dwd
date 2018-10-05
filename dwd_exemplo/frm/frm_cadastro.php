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
$obj = new frm_cadastro();
$obj->obj_entidade = new teste();
if (isset($_GET["status"])){
  $obj->str_status = $_GET["status"];
}else{  $obj->str_status = "editar";
	$obj->obj_entidade->arr_filtro[0]["condicao"] = "Robson";
	$obj->obj_entidade->arr_filtro[0]["nome"] = "id";
	$obj->obj_entidade->arr_filtro[0]["tipo"] = "integer";
	$obj->obj_entidade->arr_filtro[0]["operacao"] = "=";
	$obj->obj_entidade->arr_filtro[0]["valor"] = "54";
	$obj->obj_entidade->arr_filtro[0]["valor2"] = "0";
}

$obj->criar();
?>
<div id="resultado_filtro">Resultado</div>
exemplo novo valor
</div>
aplicar teste
</body>

