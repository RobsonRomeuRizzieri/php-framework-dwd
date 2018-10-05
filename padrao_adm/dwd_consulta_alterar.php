<?php
require_once("../inc_dwd_class.php");

$obj = new db_entidade($_SESSION["banco_tipo"],$_SESSION["servidor"],$_SESSION["banco_nome"],$_SESSION["banco_usuario"],$_SESSION["banco_senha"],$_SESSION["banco_porta"],false,$_GET["entidade"]);

$obj->arr_campo[0]["nome"] = "id";
$obj->arr_campo[0]["tipo"] = "auto_inc";
$obj->arr_campo[0]["descricao"] = "Robson";
$obj->arr_campo[0]["valor"] = $_GET["valor_chave"];
$obj->arr_campo[0]["requerido"] = "sim";
$obj->arr_campo[0]["chave"] = "sim";

$obj->arr_campo[1]["nome"] = $_GET["nome"];
$obj->arr_campo[1]["tipo"] = $_GET["tipo"];
$obj->arr_campo[1]["descricao"] = "Robson";
$obj->arr_campo[1]["valor"] = $_POST[$_GET["entidade"]."_dwd_".$_GET["frm_campo"]];
$obj->arr_campo[1]["requerido"] = "nao";
$obj->arr_campo[1]["editar"] = "sim";

//Executa a inserção o registro
$obj->editar();

?>



