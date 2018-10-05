<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_atividade.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
$obj = new frm_filtro();
$obj->obj_entidade = new agenda_atividade();
$obj->criar($_GET["filtro"],$_GET["str_campo"]);
