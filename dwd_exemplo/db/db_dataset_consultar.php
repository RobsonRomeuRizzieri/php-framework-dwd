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
$obj = new db_dataset("MySQL","localhost","dwd","root","","",false);
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
$obj->inc_antes_de_consultar = "db_dataset_antes_consultar.php";
$obj->inc_depois_de_consultar = "db_dataset_depois_consultar.php";

//Exclui o registro que acabou de ser gravado
$obj->str_sql = "SELECT ID,NOME,DESCRICAO,ATIVO FROM DWD_OBJETO_STATUS";
//Executa o SQL de consulta retornando para a matriz os valores encontrados
$matriz = $obj->consultar();
foreach($matriz as $row){  echo " Código = ".$row["ID"];
  echo " Nome = ".$row["NOME"]."<br>";
}

//Executa o SQL de consulta retornando para a matriz os valores encontrados
$matriz = $obj->consultar("SELECT ID,NOME,DESCRICAO,ATIVO FROM DWD_OBJETO_STATUS");
foreach($matriz as $row){
  echo " Código = ".$row["ID"];
  echo " Nome = ".$row["NOME"]."<br>";
}

//Exemplo usando a consulta aplicando o método executar_sql
//eventos que permitem executar arquivos
$obj->inc_antes_de_executar_sql = "db_dataset_antes_executar_sql.php";
$obj->inc_depois_de_executar_sql = "db_dataset_depois_executar_sql.php";

$matriz = $obj->executar_sql("SELECT ID,NOME,DESCRICAO,ATIVO FROM DWD_OBJETO_STATUS",true);
foreach($matriz as $row){
  echo " Código = ".$row["ID"];
  echo " Nome = ".$row["NOME"]."<br>";
}
?>