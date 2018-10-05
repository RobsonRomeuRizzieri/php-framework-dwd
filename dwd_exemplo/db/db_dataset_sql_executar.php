<?php
require_once("../../inc_dwd_class.php");
//Exemplo da utiliza��o da classe db_dataset

//1�Parametro = $str_banco_tipo=""
//2�Parametro = $str_servidor=""
//3�Parametro = $str_banco=""
//4�Parametro = $str_usuario=""
//5�Parametro = $str_senha=""
//6�Parametro = $str_porta=""
//7�Parametro = $bol_sql_exibir=false
$obj = new db_dataset("MySQL","localhost","dwd","root","","",false);
//Recebe o total de registros afetados
$obj->int_total_registros;
//Define se deve ou n�o exibir o SQL de inser��o, por padr�o recebe false
$obj->bol_sql_inserir_exibir = false;
//Define se deve exibir o SQL da consulta, por padr�o recebe false
$obj->bol_sql_consultar_exibir = false;
//Define se deve exibir o SQL de edi��o, por padr�o recebe false
$obj->bol_sql_editar_exibir = false;
//Define se deve exibir o sql de exclus�o, por padr�o recebe false
$obj->bol_sql_excluir_exibir = false;
//Define se deve exibir o sql ao executar o SQL, por padr�o recebe false
$obj->bol_sql_executar_exibir = false;
//Define que deve colcar o SQL e o conteudo em maiusculo ou minuscul, True = Maiusculo, False = Minusculo.
$obj->bol_maiusculo_minusculo = true;
//Define para executar o SQL e o conteudo no seu formato original.
$obj->bol_maiusculo_minusculo_original = true;

//eventos que permitem executar arquivos
$obj->inc_antes_de_executar_sql = "db_dataset_antes_executar_sql.php";
$obj->inc_depois_de_executar_sql = "db_dataset_depois_executar_sql.php";

//Gera novo ID para o registro
$obj_inc = new db_auto_incremento(0,0,"DWD_OBJETO_STATUS","ID","MySQL","localhost","dwd","root","","",false);
//Insere o registro com o novo ID
$obj->str_sql = "insert into dwd_objeto_status (id,nome,descricao,ativo) values (".$obj_inc->int_valor_novo.",'Teste um','Teste um aplicar',1)";
//Executa o SQL e n�o retorna uma matriz com o SQL
$obj->inserir("",false);

echo "<br>Inicia o processo de exclus�o<br>";
//Exclui o registro que acabou de ser gravado
$obj->str_sql = "DELETE FROM DWD_OBJETO_STATUS WHERE ID = ".$obj_inc->int_valor_novo;
//O m�todo Executar SQL tem uma propriedade que quando � executado um SQL de consulta.
//for necess�rio mostrar retornar uma matriz com os valores da consulta deve ser definida para true
$obj->executar_sql("",false);
echo "Termino do processo de exclus�o<br><br>";

$obj->inc_antes_de_inserir = "db_dataset_antes_inserir.php";
$obj->inc_depois_de_inserir = "db_dataset_depois_inserir.php";
//Gera novo ID para o registro
$obj_inc = new db_auto_incremento(0,0,"DWD_OBJETO_STATUS","ID","MySQL","localhost","dwd","root","","",false);
//insere o segundo registro pode ser definido o SQL diretamento no m�todo, N�o retorna matriz com SQL
$obj->inserir("insert into dwd_objeto_status (id,nome,descricao,ativo) values (".$obj_inc->int_valor_novo.",'Teste dois','Teste dois aplicar',1)",false);

echo "<br>Inicia o processo de exclus�o dois <br>";
//O m�todo Executar SQL tem uma propriedade que quando � executado um SQL de consulta.
//for necess�rio mostrar retornar uma matriz com os valores da consulta deve ser definida para true
$obj->executar_sql("DELETE FROM DWD_OBJETO_STATUS WHERE ID = ".$obj_inc->int_valor_novo,false);
echo "Termino do processo de exclus�o dois<br>";

?>