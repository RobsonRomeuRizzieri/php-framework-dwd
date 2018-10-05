<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_status.php");

$obj = new frm_filtro();
$obj->bol_consulta_paginada = true;
$obj->bol_iniciar_com_registro = true;
$obj->obj_entidade = new agenda_status();
if (isset($_GET["status"])){
	$obj->obj_entidade->arr_filtro[0]["condicao"] = "Robson";
	$obj->obj_entidade->arr_filtro[0]["nome"] = "id";
	$obj->obj_entidade->arr_filtro[0]["tipo"] = "integer";
	$obj->obj_entidade->arr_filtro[0]["operacao"] = "=";
	$obj->obj_entidade->arr_filtro[0]["valor"] = $_GET["valor"];
	$obj->obj_entidade->arr_filtro[0]["valor2"] = "0";
  $obj->obj_entidade->excluir();
}
$obj->criar();
?>



