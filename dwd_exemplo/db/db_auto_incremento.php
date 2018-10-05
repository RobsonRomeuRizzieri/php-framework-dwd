<?php
require_once("../../inc_dwd_class.php");
//Exemplo da tulização do auto incremento por campo.

//1°Parametro = $int_empresa - Se não quer incrementar pela empresa mantem o valor 0
//2°Parametro = $int_filial - Se não quer incrementar pela filial mantem o valor 0
//3°Parametro = $str_tabela - Determina qual a tabela que deve ser aplicado o auto incremento
//4°Parametro = $str_campo = Determina qual o campo que deve ter seu valor incrementado
//5°Parametro = $str_banco_tipo=""
//6°Parametro = $str_servidor=""
//7°Parametro = $str_banco=""
//8°Parametro = $str_usuario=""
//9°Parametro = $str_senha=""
//10°Parametro = $str_porta=""
//11°Parametro = $bol_sql_exibir=false
//Exemplo gerando novo valor de incremento sem levar em conta a empresa e a filial
  $obj_inc = new db_auto_incremento(0,0,"TESTE","ID","MySQL","localhost","dwd","root","","",false);
//Motra o valor do campo no auto incremento
  echo "Valor do novo ID para a tabela TESTE ".$obj_inc->int_valor_novo."<br>";

//Auto incremento controlado por empresa
  $obj_inc = new db_auto_incremento(1,0,"TESTE","ID","MySQL","localhost","dwd","root","","",false);
//Motra o valor do campo no auto incremento
  echo "Valor do novo ID por empresa para a tabela TESTE ".$obj_inc->int_valor_novo."<br>";

//Auto incremento controlado por filial
  $obj_inc = new db_auto_incremento(0,1,"TESTE","ID","MySQL","localhost","dwd","root","","",false);
//Motra o valor do campo no auto incremento
  echo "Valor do novo ID por filal para a tabela TESTE ".$obj_inc->int_valor_novo."<br>";

//Auto incremento controlado por empresa e filial
$obj_inc = new db_auto_incremento(1,1,"TESTE","ID","MySQL","localhost","dwd","root","","",false);
//Motra o valor do campo no auto incremento
echo "Valor do novo ID por empresa e filial para a tabela TESTE ".$obj_inc->int_valor_novo."<br>";

?>