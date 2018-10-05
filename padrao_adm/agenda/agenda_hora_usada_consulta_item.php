<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora_usada.php");
$obj = new frm_filtro();
$obj->obj_entidade = new agenda_hora_usada();
$obj->criar($_GET["filtro"],$_GET["str_campo"]);
