<?php
require_once("../../inc_dwd_class.php");
//Exemplo da utilização da classe db_dataset

//1°Parametro = $str_banco_tipo=""
//2°Parametro = $str_servidor=""
//3°Parametro = $str_banco=""
//4°Parametro = $str_usuario=""
//5°Parametro = $str_senha=""
//6°Parametro = $str_porta=""
//7°Parametro = $bol_sql_exibir=false
$obj = new db_entidade("MySQL","localhost","dwd","root","","",false,"teste");
//Recebe o total de registros afetados
$obj->int_total_registros;
//Define se deve ou não exibir o SQL de inserção, por padrão recebe false
$obj->bol_sql_inserir_exibir = false;
//Define se deve exibir o SQL da consulta, por padrão recebe false
$obj->bol_sql_consultar_exibir = false;
//Define se deve exibir o SQL de edição, por padrão recebe false
$obj->bol_sql_editar_exibir = false;
//Define se deve exibir o sql de exclusão, por padrão recebe false
$obj->bol_sql_excluir_exibir = false;
//Define se deve exibir o sql ao executar o SQL, por padrão recebe false
$obj->bol_sql_executar_exibir = false;
//Define que deve colcar o SQL e o conteudo em maiusculo ou minuscul, True = Maiusculo, False = Minusculo.
$obj->bol_maiusculo_minusculo = true;
//Define para executar o SQL e o conteudo no seu formato original.
$obj->bol_maiusculo_minusculo_original = true;

//eventos que permitem executar arquivos
$obj->inc_antes_de_consultar = "db_entidade_antes_editar.php";
$obj->inc_depois_de_consultar = "db_entidade_depois_editar.php";

$obj->arr_campo[0]["nome"] = "id";
$obj->arr_campo[0]["tipo"] = "auto_inc";
$obj->arr_campo[0]["descricao"] = "Código";
$obj->arr_campo[0]["valor"] = "1";
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

//Monta o filtro da consulta
$obj->arr_filtro[0]["condicao"] = "Robson";
$obj->arr_filtro[0]["nome"] = "id";
$obj->arr_filtro[0]["tipo"] = "integer";
$obj->arr_filtro[0]["operacao"] = ">=";
$obj->arr_filtro[0]["valor"] = "35";
$obj->arr_filtro[0]["valor2"] = "0";

$obj->arr_filtro[1]["condicao"] = "and";
$obj->arr_filtro[1]["nome"] = "nome";
$obj->arr_filtro[1]["tipo"] = "string";
$obj->arr_filtro[1]["operacao"] = "plike";
$obj->arr_filtro[1]["valor"] = "son";
$obj->arr_filtro[1]["valor2"] = "0";

//Executa a inserção o registro
$matriz = $obj->consultar();
foreach($matriz as $row){  echo "Código ".$row["id"]." Nome ".$row["nome"]."<br>";
}

?>