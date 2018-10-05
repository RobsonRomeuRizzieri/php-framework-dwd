<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora_usada.php");

$obj = new frm_filtro();
$obj->obj_entidade = new agenda_hora_usada();
$obj->obj_entidade->arr_filtro[0]["condicao"] = "and";
$obj->obj_entidade->arr_filtro[0]["nome"] = "sys_usuario_id";
$obj->obj_entidade->arr_filtro[0]["tipo"] = "integer";
$obj->obj_entidade->arr_filtro[0]["operacao"] = "=";
$obj->obj_entidade->arr_filtro[0]["valor"] = $_SESSION["usuario_id"];
$obj->bol_consulta_paginada = true;
$obj->executar($_GET["tot"],$_GET["str_campo"]);
?>
