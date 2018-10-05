<link href="../../dwd_css/com_data_calendario.css" rel="stylesheet" type="text/css" />
<script src="../../dwd_js/com_data_calendario.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/componente.js" TYPE="text/javascript"> </script>
<?php
require_once("../../inc_dwd_class.php");
require_once("../../dwd.php");
?>
<form name="teste">
<?php
$obj_com = new com_edit_data("data_exemplo","teste",true);
$obj_com->str_valor = "2008-12-15";
$obj_com->criar();
?>
</form>
