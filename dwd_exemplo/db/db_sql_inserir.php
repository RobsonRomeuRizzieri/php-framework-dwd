<?php
require_once("../../inc_dwd_class.php");
//Exemplo da utilização da classe db_sql_inserir
//Essa classe tem como objetivo montar o SQL de inserção

//1°Parametro = $str_tabela=""
//2°Parametro = $bol_sql_maiusculo=true;
//3°Parametro = $bol_sql_padrao=true;
//4°parametro = $bol_aspas_crase=false;
$obj = new db_sql_inserir("MySQL","DWD_OBJETO_STATUS",true,true,false);
$obj->str_servidor = "localhost";
$obj->str_banco = "dwd";
$obj->str_usuario = "root";
$obj->str_senha = "";
$obj->str_porta = "";
$obj->bol_verificar_sql_inject = false;

$obj->arr_campo[0]["nome"] = "id";
$obj->arr_campo[0]["tipo"] = "auto_inc";
$obj->arr_campo[0]["descricao"] = "Código";
$obj->arr_campo[0]["valor"] = "0";
$obj->arr_campo[0]["requerido"] = true;

$obj->arr_campo[1]["nome"] = "nome";
$obj->arr_campo[1]["tipo"] = "string";
$obj->arr_campo[1]["descricao"] = "Nome";
$obj->arr_campo[1]["valor"] = "Robson";
$obj->arr_campo[1]["requerido"] = true;

echo $obj->criar_sql()."<br><br>";

$obj = new db_sql_inserir("MySQL","TESTE",true,true,false);
$obj->str_servidor = "localhost";
$obj->str_banco = "dwd";
$obj->str_usuario = "root";
$obj->str_senha = "";
$obj->str_porta = "";
$obj->bol_verificar_sql_inject = false;

$obj->arr_campo[0]["nome"] = "id";
$obj->arr_campo[0]["tipo"] = "auto_inc";
$obj->arr_campo[0]["descricao"] = "Código";
$obj->arr_campo[0]["valor"] = "0";
$obj->arr_campo[0]["requerido"] = true;

$obj->arr_campo[1]["nome"] = "nome";
$obj->arr_campo[1]["tipo"] = "string";
$obj->arr_campo[1]["descricao"] = "Nome";
$obj->arr_campo[1]["valor"] = "Robson";
$obj->arr_campo[1]["requerido"] = true;

$obj->arr_campo[2]["nome"] = "data";
$obj->arr_campo[2]["tipo"] = "date";
$obj->arr_campo[2]["descricao"] = "Data Cadastro";
$obj->arr_campo[2]["valor"] = "05/10/2008";
$obj->arr_campo[2]["requerido"] = true;

echo $obj->criar_sql()."<br><br>";
?>