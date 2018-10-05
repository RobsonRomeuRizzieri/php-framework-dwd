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
$obj->inc_antes_de_inserir = "db_dataset_antes_inserir.php";
$obj->inc_depois_de_inserir = "db_dataset_depois_inserir.php";

//Define o SQL a ser executado
$obj->str_sql = "insert into dwd_objeto_status (id,nome,descricao,ativo) values (1,'Planejado','Esta em fase de desenvolvimento e definiчуo',1)";
//Executa a inserчуo o registro
$obj->inserir();

//Gera novo ID para o registro
$obj_inc = new db_auto_incremento(0,0,"DWD_OBJETO_STATUS","ID","MySQL","localhost","dwd","root","","",false);
//Insere o registro com o novo ID
$obj->str_sql = "insert into dwd_objeto_status (id,nome,descricao,ativo) values (".$obj_inc->int_valor_novo.",'Concluido','Determina que foi concluido o desenvolvimento',1)";
//Executa a inserчуo o registro
$obj->inserir();

$obj->inserir("insert into dwd_objeto_status (id,nome,descricao,ativo) values (2,'Iniciado','Determina que o objeto teve seu desenvolvimento iniciado',1)");

//Gera novo ID para o registro
$obj_inc = new db_auto_incremento(0,0,"DWD_OBJETO_STATUS","ID","MySQL","localhost","dwd","root","","",false);
//insere o segundo registro pode ser definido o SQL diretamento no mщtodo
$obj->inserir("insert into dwd_objeto_status (id,nome,descricao,ativo) values (".$obj_inc->int_valor_novo.",'Removido','Determina que o objeto foi removido mas matщm o histѓrico',1)");

?>