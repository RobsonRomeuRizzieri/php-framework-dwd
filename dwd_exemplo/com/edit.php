<script src="../../dwd_js/componente.js" TYPE="text/javascript"> </script>
<?php
require_once("../../inc_dwd_class.php");
?>
<form name="teste">
<?php
$obj_com = new com_edit("exemplo","teste",true);
$obj_com->str_valor = "Robson Romeu Rizzieri";
$obj_com->criar(true);
?>
</form>
