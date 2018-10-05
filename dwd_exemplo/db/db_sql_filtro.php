<?php
require_once("../../inc_dwd_class.php");
//Exemplo da montagem de filtro para o sql
$obj = new db_sql_filtro("MySQL");

$obj->arr_filtro[0]["condicao"] = "Robson";
$obj->arr_filtro[0]["nome"] = "id";
$obj->arr_filtro[0]["tipo"] = "integer";
$obj->arr_filtro[0]["operacao"] = "=";
$obj->arr_filtro[0]["valor"] = "1";
$obj->arr_filtro[0]["valor2"] = "0";

$obj->arr_filtro[1]["condicao"] = "and";
$obj->arr_filtro[1]["nome"] = "nome";
$obj->arr_filtro[1]["tipo"] = "string";
$obj->arr_filtro[1]["operacao"] = "plike";
$obj->arr_filtro[1]["valor"] = "son";
$obj->arr_filtro[1]["valor2"] = "0";

$obj->arr_filtro[2]["condicao"] = "or";
$obj->arr_filtro[2]["nome"] = "nome";
$obj->arr_filtro[2]["tipo"] = "string";
$obj->arr_filtro[2]["operacao"] = "plikep";
$obj->arr_filtro[2]["valor"] = "son";
$obj->arr_filtro[2]["valor2"] = "0";

$obj->arr_filtro[3]["condicao"] = "or";
$obj->arr_filtro[3]["nome"] = "data_cadastro";
$obj->arr_filtro[3]["tipo"] = "date";
$obj->arr_filtro[3]["operacao"] = "=";
$obj->arr_filtro[3]["valor"] = "05/05/2080";
$obj->arr_filtro[3]["valor2"] = "0";

$obj->arr_filtro[4]["condicao"] = "and";
$obj->arr_filtro[4]["nome"] = "data_cadastro";
$obj->arr_filtro[4]["tipo"] = "date";
$obj->arr_filtro[4]["operacao"] = "between";
$obj->arr_filtro[4]["valor"] = "05/05/2080";
$obj->arr_filtro[4]["valor2"] = "01/01/2090";

echo $obj->definir_filtro();

?>