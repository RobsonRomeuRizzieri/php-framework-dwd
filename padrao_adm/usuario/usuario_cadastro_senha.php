<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_empresa.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_sistema.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_filial.php");

$obj = new frm_cadastro();
$obj->obj_entidade = new usuario();
$obj->obj_entidade->arr_campo[4]["cad_tipo_campo"]	= "nao";
$obj->obj_entidade->arr_campo[4]["editar"] = "nao";
$obj->obj_entidade->arr_campo[5]["cad_tipo_campo"]	= "nao";
$obj->obj_entidade->arr_campo[5]["editar"] = "nao";
$obj->obj_entidade->arr_campo[6]["cad_tipo_campo"]	= "nao";
$obj->obj_entidade->arr_campo[6]["editar"] = "nao";
$obj->bol_detalhe_menu_exibir = false;
$obj->bol_consultar = false;
$obj->bol_novo = false;
$obj->obj_entidade->str_resultado_arquivo = "usuario/usuario_cadastro_senha_executar.php";
$obj->obj_entidade->str_cadastro_arquivo = "usuario/usuario_cadastro_senha.php";
if (isset($_GET["status"])){
  $obj->str_status = $_GET["status"];
	$obj->obj_entidade->arr_filtro[0]["condicao"] = "Robson";
	$obj->obj_entidade->arr_filtro[0]["nome"] = "id";
	$obj->obj_entidade->arr_filtro[0]["tipo"] = "integer";
	$obj->obj_entidade->arr_filtro[0]["operacao"] = "=";
	$obj->obj_entidade->arr_filtro[0]["valor"] = $_SESSION["usuario_id"];
	$obj->obj_entidade->arr_filtro[0]["valor2"] = "0";
}
$obj->bol_acesso_fixo = true;
$obj->bol_novo = false;
$obj->bol_consultar = false;
$obj->criar();
?>


