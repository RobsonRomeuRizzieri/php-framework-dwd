<link href="../../dwd_css/com_data_calendario.css" rel="stylesheet" type="text/css" />
<link href="../../dwd_css/frm_filtro.css" rel="stylesheet" type="text/css" />
<script src="../../dwd_js/ajax.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/componente.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/com_data_calendario.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/frm_filtro.js" TYPE="text/javascript"> </script>
<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."dwd_entidade/teste.php");
require_once("../../dwd.php");
?>
<?php
$obj = new frm_filtro();
$obj->obj_entidade = new teste();
$obj->bol_consulta_paginada = false;
$obj->executar($_GET["tot"]);
if (isset($obj->filtro_matriz)){
	foreach($obj->filtro_matriz as $row){	  echo $row["id"]." ".$row["nome"]." ".$row["data_cadastro"]."<br>";
	}
}else{  echo "nenhum registro foi encontrado";
}
//$obj->consultar();
?>
