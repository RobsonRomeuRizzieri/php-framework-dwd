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
$obj->inc_antes_de_excluir = "db_dataset_antes_excluir.php";
$obj->inc_depois_de_excluir = "db_dataset_depois_excluir.php";

//Gera novo ID para o registro
$obj_inc = new db_auto_incremento(0,0,"DWD_OBJETO_STATUS","ID","MySQL","localhost","dwd","root","","",false);
//Insere o registro com o novo ID
$obj->str_sql = "insert into dwd_objeto_status (id,nome,descricao,ativo) values (".$obj_inc->int_valor_novo.",'Teste um','Teste um aplicar',1)";
//Executa a inserção o registro
$obj->inserir();

echo "<br>Inicia o processo de exclusão<br>";
//Exclui o registro que acabou de ser gravado
$obj->str_sql = "DELETE FROM DWD_OBJETO_STATUS WHERE ID = ".$obj_inc->int_valor_novo;
//executa a exclusão do regsitro
$obj->excluir();
echo "Termino do processo de exclusão<br><br>";

$obj->inc_antes_de_inserir = "db_dataset_antes_inserir.php";
$obj->inc_depois_de_inserir = "db_dataset_depois_inserir.php";
//Gera novo ID para o registro
$obj_inc = new db_auto_incremento(0,0,"DWD_OBJETO_STATUS","ID","MySQL","localhost","dwd","root","","",false);
//insere o segundo registro pode ser definido o SQL diretamento no método
$obj->inserir("insert into dwd_objeto_status (id,nome,descricao,ativo) values (".$obj_inc->int_valor_novo.",'Teste dois','Teste dois aplicar',1)");

echo "<br>Inicia o processo de exclusão dois <br>";
//executa a exclusão do regsitro
$obj->excluir("DELETE FROM DWD_OBJETO_STATUS WHERE ID = ".$obj_inc->int_valor_novo);
echo "Termino do processo de exclusão dois<br>";

?>