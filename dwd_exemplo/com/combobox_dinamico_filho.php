<?php
require_once("../../inc_dwd_class.php");
require_once("../../dwd.php");

$obj = new com_combobox_dinamico("dois_detalhe","exemplo",true);
$obj->arr_lookup["tabela"] = "teste_filho";
$obj->arr_lookup["chave"] = "id";
$obj->arr_lookup["chave_tipo"] = "integer";
$obj->arr_lookup["retorno"] = "nome";
$obj->arr_lookup["retorno_tipo"] = "string";
$obj->arr_lookup["valor"] = "1";

$obj->arr_lookup_filtro[0]["condicao"] = "and";
$obj->arr_lookup_filtro[0]["nome"] = "teste_id";
$obj->arr_lookup_filtro[0]["tipo"] = "integer";
$obj->arr_lookup_filtro[0]["operacao"] = "=";
if (isset($_GET["valor_pai"])){	$obj->arr_lookup_filtro[0]["valor"] = $_GET["dwd_pai"];
}else{
	$obj->arr_lookup_filtro[0]["valor"] = $int_valor_pai;
}
$obj->arr_lookup_filtro[0]["valor2"] = 0;

$obj->arr_lookup_filtro[1]["condicao"] = "and";
$obj->arr_lookup_filtro[1]["nome"] = "ativo";
$obj->arr_lookup_filtro[1]["tipo"] = "integer";
$obj->arr_lookup_filtro[1]["operacao"] = "=";
$obj->arr_lookup_filtro[1]["valor"] = 1;
$obj->arr_lookup_filtro[1]["valor2"] = 0;
echo "Detalhe: ";
$obj->criar();
?>