<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/empresa.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/empresa_filial.php");

$obj = new frm_filtro();
$obj->obj_entidade = new empresa_filial();$obj->str_resultado_local = $_GET["resultado_local"];
//$obj->str_resultado_arquivo = "frm_detalhe_filtro_paginado_executar.php";
$obj->bol_consulta_paginada = true;
$obj->executar($_GET["tot"],$_GET["str_campo"]);

?>
