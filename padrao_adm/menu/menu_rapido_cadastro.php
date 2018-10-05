<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/menu_rapido.php");

$obj = new frm_cadastro();
$obj->obj_entidade = new menu_rapido();
if (isset($_GET["status"])){
  $obj->str_status = $_GET["status"];
	$obj->obj_entidade->arr_filtro[0]["condicao"] = "Robson";
	$obj->obj_entidade->arr_filtro[0]["nome"] = "id";
	$obj->obj_entidade->arr_filtro[0]["tipo"] = "integer";
	$obj->obj_entidade->arr_filtro[0]["operacao"] = "=";
	$obj->obj_entidade->arr_filtro[0]["valor"] = $_GET["valor"];
	$obj->obj_entidade->arr_filtro[0]["valor2"] = "0";
}
$obj->criar();
?>


