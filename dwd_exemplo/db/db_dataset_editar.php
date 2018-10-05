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
$obj = new db_dataset("MySQL","localhost","dwd","root","","",false);
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
$obj->inc_antes_de_editar = "db_dataset_antes_editar.php";
$obj->inc_depois_de_editar = "db_dataset_depois_editar.php";

$obj->str_sql = "UPDATE DWD_OBJETO_STATUS SET NOME = 'Inэciado' WHERE ID = 2";
//Define o SQL a ser executado
$obj->str_sql = "UPDATE DWD_OBJETO_STATUS SET NOME = 'Inэciado' WHERE ID = 2";
//Executa a inserчуo o registro
$obj->editar();
$obj->inc_antes_de_editar = "db_dataset_antes_editar.php";
$obj->inc_depois_de_editar = "db_dataset_depois_editar.php";
//insere o segundo registro pode ser definido o SQL diretamento no mщtodo
$obj->editar("UPDATE DWD_OBJETO_STATUS SET DESCRICAO = 'Foi inэciado o desenvolvimento do objeto.' WHERE ID = 2");

?>