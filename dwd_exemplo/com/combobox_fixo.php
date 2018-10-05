<?php
require_once("../../inc_dwd_class.php");
//exemplo
$obj = new com_combobox_fixo("um","exemplo",false);
$obj->bol_item_selecao = true;
$obj->arr_item[0]["valor"] = "1";
$obj->arr_item[0]["descricao"] = "Valor Um";
$obj->arr_item[1]["valor"] = "2";
$obj->arr_item[1]["descricao"] = "Valor Dois";
$obj->arr_item[2]["valor"] = "3";
$obj->arr_item[2]["descricao"] = "Valor Três";
$obj->arr_item[3]["valor"] = "4";
$obj->arr_item[3]["descricao"] = "Valor Quatro";
$obj->str_valor = 3;
$obj->criar();

?>