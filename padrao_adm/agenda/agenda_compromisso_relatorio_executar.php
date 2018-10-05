<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso_participante.php");
//require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela.php");
//require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_campo.php");
$obj = new fpdf_relatorio();
$obj->obj_entidade = new agenda_compromisso();
$obj->obj_entidade->relatorio_usuario_configurar();
$c = count($obj->obj_entidade->arr_filtro);
$c = $c;
$obj->obj_entidade->arr_filtro[$c]["condicao"] = "and";
$obj->obj_entidade->arr_filtro[$c]["nome"] = "sys_usuario_id";
$obj->obj_entidade->arr_filtro[$c]["tipo"] = "integer";
$obj->obj_entidade->arr_filtro[$c]["operacao"] = "=";
$obj->obj_entidade->arr_filtro[$c]["valor"] = $_SESSION["usuario_id"];
$obj->criar();
?>
