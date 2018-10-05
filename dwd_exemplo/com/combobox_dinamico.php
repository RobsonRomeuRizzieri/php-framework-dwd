<?php
require_once("../../inc_dwd_class.php");
require_once("../../dwd.php");
$obj = new com_combobox_dinamico("dois","exemplo",true);
$obj->arr_lookup["tabela"] = "teste";
$obj->arr_lookup["chave"] = "id";
$obj->arr_lookup["chave_tipo"] = "integer";
$obj->arr_lookup["retorno"] = "nome";
$obj->arr_lookup["retorno_tipo"] = "string";
$obj->arr_lookup["valor"] = "35";

$obj->arr_lookup_filtro[0]["condicao"] = "and";
$obj->arr_lookup_filtro[0]["nome"] = "ativo";
$obj->arr_lookup_filtro[0]["tipo"] = "integer";
$obj->arr_lookup_filtro[0]["operacao"] = "=";
$obj->arr_lookup_filtro[0]["valor"] = 1;
$obj->arr_lookup_filtro[0]["valor2"] = 0;

$obj->criar();

?>