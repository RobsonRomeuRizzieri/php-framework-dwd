<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora_usada.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso_participante.php");

	$objh = new agenda_hora_usada();
	$objh->arr_filtro[0]["condicao"] = "Robosn";
  $objh->arr_filtro[0]["nome"] = "sys_usuario_id";
  $objh->arr_filtro[0]["tipo"] = "integer";
  $objh->arr_filtro[0]["operacao"] = "=";
  $objh->arr_filtro[0]["valor"] = $_SESSION["usuario_id"];

	$objh->arr_filtro[1]["condicao"] = "and";
  $objh->arr_filtro[1]["nome"] = "dia";
  $objh->arr_filtro[1]["tipo"] = "integer";
  $objh->arr_filtro[1]["operacao"] = "=";
  $objh->arr_filtro[1]["valor"] = $_POST["agenda_compromisso_dwd_dia"];

	$objh->arr_filtro[2]["condicao"] = "and";
  $objh->arr_filtro[2]["nome"] = "mes";
  $objh->arr_filtro[2]["tipo"] = "integer";
  $objh->arr_filtro[2]["operacao"] = "=";
  $objh->arr_filtro[2]["valor"] = $_POST["agenda_compromisso_dwd_mes"];

	$objh->arr_filtro[3]["condicao"] = "and";
  $objh->arr_filtro[3]["nome"] = "ano";
  $objh->arr_filtro[3]["tipo"] = "integer";
  $objh->arr_filtro[3]["operacao"] = "=";
  $objh->arr_filtro[3]["valor"] = $_POST["agenda_compromisso_dwd_ano"];

  if ($_POST["agenda_compromisso_dwd_id"] != ""){
		$objh->arr_filtro[4]["condicao"] = "and";
	  $objh->arr_filtro[4]["nome"] = "agenda_compromisso_id";
	  $objh->arr_filtro[4]["tipo"] = "integer";
	  $objh->arr_filtro[4]["operacao"] = "<>";
	  $objh->arr_filtro[4]["valor"] = $_POST["agenda_compromisso_dwd_id"];
	}
  $matrizh = $objh->consultar();
  $conth = 0;
	if (!empty($matrizh)){
    foreach($matrizh as $rowh){
      if ($conth == 0){
        $str_filh = "(".$rowh["agenda_hora_id"];
      }else{
      	$str_filh .= ",".$rowh["agenda_hora_id"];
      }
      $conth++;
    }
     $str_filh .= ")";
		$arr[0]["condicao"] = "Robosn";
    $arr[0]["nome"] = "id";
    $arr[0]["tipo"] = "integer";
    $arr[0]["operacao"] = "not in ";
    $arr[0]["valor"] = $str_filh;
    $arr[0]["valor2"] = "";
		$arr_filtro = $arr;
  }
//  echo $_GET["dwd_tab"]."teste";
//  $frm_nome = "";
  $obj = new com_combobox_dinamico($_GET["nome"],"agenda_compromisso",true);
  if ($_GET["nome"] == "agenda_hora_inicio_id"){
  	$obj->str_on_change .= "agenda_hora_usada_final('agenda_hora_fim_id',document.".$_GET["dwd_tab"]."agenda_compromisso);";
  }
  $obj->arr_lookup["tabela"] = "agenda_hora";
  $obj->arr_lookup["chave"] = "id";
  $obj->arr_lookup["chave_tipo"] = "integer";
  $obj->arr_lookup["retorno"] = "hora";
  $obj->arr_lookup["retorno_tipo"] = "string";
  $obj->arr_lookup["valor"] = $_POST["agenda_compromisso_dwd_agenda_hora_inicio_id"];
  $cont_filtro = count($arr_filtro);
  for ($i = 0; $i < $cont_filtro; $i++){
    $obj->arr_lookup_filtro[$i]["condicao"] = $arr_filtro[$i]["condicao"];
 	  $obj->arr_lookup_filtro[$i]["nome"] = $arr_filtro[$i]["nome"];
	  $obj->arr_lookup_filtro[$i]["tipo"] = $arr_filtro[$i]["tipo"];
	  $obj->arr_lookup_filtro[$i]["operacao"] = $arr_filtro[$i]["operacao"];
	  $obj->arr_lookup_filtro[$i]["valor"] = $arr_filtro[$i]["valor"];
	  $obj->arr_lookup_filtro[$i]["valor2"] = $arr_filtro[$i]["valor2"];
  }
  $obj->criar();


?>