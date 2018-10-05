<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_empresa.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_filial.php");
$obj = new frm_filtro();
//$obj->str_item_arquivo = "frm_detalhe_filtro_paginado_item.php";
//$obj->str_resultado_arquivo = "frm_detalhe_filtro_paginado_executar.php";
$obj->obj_entidade = new usuario_filial();
$obj->criar($_GET["filtro"],$_GET["str_campo"]);
