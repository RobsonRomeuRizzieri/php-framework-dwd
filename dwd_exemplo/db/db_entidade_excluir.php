<?php
require_once("../../inc_dwd_class.php");
//Exemplo da utilizaчуo da classe db_dataset

//1АParametro = $str_banco_tipo=""
//2АParametro = $str_servidor=""
//3АParametro = $str_banco=""
//4АParametro = $str_usuario=""
//5АParametro = $str_senha=""
//6АParametro = $str_porta=""
//7АParametro = $bol_sql_exibir=false
$obj = new db_entidade("MySQL","localhost","dwd","root","","",false,"teste");
//Recebe o total de registros afetados
$obj->int_total_registros;
//Define se deve ou nуo exibir o SQL de inserчуo, por padrуo recebe false
$obj->bol_sql_inserir_exibir = false;
//Define se deve exibir o SQL da consulta, por padrуo recebe false
$obj->bol_sql_consultar_exibir = false;
//Define se deve exibir o SQL de ediчуo, por padrуo recebe false
$obj->bol_sql_editar_exibir = false;
//Define se deve exibir o sql de exclusуo, por padrуo recebe false
$obj->bol_sql_excluir_exibir = false;
//Define se deve exibir o sql ao executar o SQL, por padrуo recebe false
$obj->bol_sql_executar_exibir = false;
//Define que deve colcar o SQL e o conteudo em maiusculo ou minuscul, True = Maiusculo, False = Minusculo.
$obj->bol_maiusculo_minusculo = true;
//Define para executar o SQL e o conteudo no seu formato original.
$obj->bol_maiusculo_minusculo_original = true;

//eventos que permitem executar arquivos
$obj->inc_antes_de_excluir = "db_entidade_antes_excluir.php";
$obj->inc_depois_de_excluir = "db_entidade_depois_excluir.php";

$obj->arr_campo[0]["nome"] = "id";
$obj->arr_campo[0]["tipo"] = "auto_inc";
$obj->arr_campo[0]["descricao"] = "Cѓdigo";
$obj->arr_campo[0]["valor"] = "38";
$obj->arr_campo[0]["requerido"] = "sim";
$obj->arr_campo[0]["chave"] = "sim";

$obj->arr_campo[1]["nome"] = "nome";
$obj->arr_campo[1]["tipo"] = "string";
$obj->arr_campo[1]["descricao"] = "Nome";
$obj->arr_campo[1]["valor"] = "Robson";
$obj->arr_campo[1]["requerido"] = "sim";
$obj->arr_campo[1]["editar"] = "sim";

$obj->arr_campo[2]["nome"] = "data_cadastro";
$obj->arr_campo[2]["tipo"] = "date";
$obj->arr_campo[2]["descricao"] = "Data cadastro";
$obj->arr_campo[2]["valor"] = "05/10/2080";
$obj->arr_campo[2]["requerido"] = "sim";
$obj->arr_campo[2]["editar"] = "sim";
//Executa a inserчуo o registro
$obj->excluir();

?>