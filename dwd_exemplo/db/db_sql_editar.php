<?php
require_once("../../inc_dwd_class.php");
//Exemplo da utilização da classe db_sql_inserir
//Essa classe tem como objetivo montar o SQL de inserção

//1°Parametro = $str_tabela=""
//2°Parametro = $bol_sql_maiusculo=true;
//3°Parametro = $bol_sql_padrao=true;
//4°parametro = $bol_aspas_crase=false;
$obj = new db_sql_editar("MySQL","DWD_OBJETO_STATUS",true,true,false);
$obj->str_servidor = "localhost";
$obj->str_banco = "dwd";
$obj->str_usuario = "root";
$obj->str_senha = "";
$obj->str_porta = "";
$obj->bol_verificar_sql_inject = false;

$obj->arr_campo[0]["nome"] = "id";
$obj->arr_campo[0]["tipo"] = "auto_inc";
$obj->arr_campo[0]["descricao"] = "Código";
$obj->arr_campo[0]["valor"] = "2";
$obj->arr_campo[0]["requerido"] = "sim";
$obj->arr_campo[0]["chave"] = "sim"; //Se for campo chave não pode ser alterado
$obj->arr_campo[0]["editar"] = "sim";

$obj->arr_campo[1]["nome"] = "nome";
$obj->arr_campo[1]["tipo"] = "string";
$obj->arr_campo[1]["descricao"] = "Nome";
$obj->arr_campo[1]["valor"] = "Robson dois";
$obj->arr_campo[1]["requerido"] = "nao";
$obj->arr_campo[1]["chave"] = "nao";
$obj->arr_campo[1]["editar"] = "sim";

echo $obj->criar_sql()."<br><br>";

$obj = new db_sql_editar("MySQL","TESTE",true,true,false);
$obj->str_servidor = "localhost";
$obj->str_banco = "dwd";
$obj->str_usuario = "root";
$obj->str_senha = "";
$obj->str_porta = "";
$obj->bol_verificar_sql_inject = false;

$obj->arr_campo[0]["nome"] = "id";
$obj->arr_campo[0]["tipo"] = "auto_inc";
$obj->arr_campo[0]["descricao"] = "Código";
$obj->arr_campo[0]["valor"] = "1";
$obj->arr_campo[0]["requerido"] = "sim";
$obj->arr_campo[0]["chave"] = "sim";
$obj->arr_campo[0]["editar"] = "nao";

$obj->arr_campo[1]["nome"] = "nome";
$obj->arr_campo[1]["tipo"] = "string";
$obj->arr_campo[1]["descricao"] = "Nome";
$obj->arr_campo[1]["valor"] = "Robson um alte";
$obj->arr_campo[1]["requerido"] = "nao";
$obj->arr_campo[1]["chave"] = "nao";
$obj->arr_campo[1]["editar"] = "sim";

$obj->arr_campo[2]["nome"] = "data_cadastro";
$obj->arr_campo[2]["tipo"] = "date";
$obj->arr_campo[2]["descricao"] = "Data Cadastro";
$obj->arr_campo[2]["valor"] = "05/11/2008";
$obj->arr_campo[2]["requerido"] = "nao";
$obj->arr_campo[2]["chave"] = "nao";
$obj->arr_campo[2]["editar"] = "nao";

echo $obj->criar_sql()."<br><br>";
?>