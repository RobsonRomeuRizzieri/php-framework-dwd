<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/pessoa.php");
$obj = new fpdf_dwd_configurar();
$obj->obj_entidade = new pessoa();
$obj->criar();
?>
