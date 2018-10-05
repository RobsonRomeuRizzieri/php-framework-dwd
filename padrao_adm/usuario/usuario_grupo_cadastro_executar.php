<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_grupo_entidade.php");

$obj = new frm_cadastro();
$obj->str_status = $_GET["status"];
$obj->str_cad_campo = $_GET["str_campo"];
$obj->obj_entidade = new usuario_grupo_entidade();
$obj->bol_consulta_paginada = true;
$obj->executar();
?>



