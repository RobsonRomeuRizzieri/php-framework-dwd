<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_grupo_entidade.php");
$obj = new frm_filtro();
$obj->obj_entidade = new usuario_grupo_entidade();
$obj->criar($_GET["filtro"],$_GET["str_campo"]);
