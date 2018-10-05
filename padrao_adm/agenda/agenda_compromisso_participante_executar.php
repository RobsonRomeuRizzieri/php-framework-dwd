<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora_usada.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_empresa.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_filial.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_sistema.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso_participante.php");

$obj = new agenda_compromisso_participante();
$obj->arr_filtro[0]["condicao"] = "Robson";
$obj->arr_filtro[0]["nome"] = "agenda_compromisso_id";
$obj->arr_filtro[0]["tipo"] = "integer";
$obj->arr_filtro[0]["operacao"] = "=";
$obj->arr_filtro[0]["valor"] = $_GET["valor"];
$obj->excluir();

$obj_com = new agenda_compromisso();
$obj_com->arr_filtro[0]["condicao"] = "Robson";
$obj_com->arr_filtro[0]["nome"] = "id";
$obj_com->arr_filtro[0]["tipo"] = "integer";
$obj_com->arr_filtro[0]["operacao"] = "=";
$obj_com->arr_filtro[0]["valor"] = $_GET["valor"];
$obj_com->arr_filtro[1]["condicao"] = "and";
$obj_com->arr_filtro[1]["nome"] = "sys_usuario_id";
$obj_com->arr_filtro[1]["tipo"] = "integer";
$obj_com->arr_filtro[1]["operacao"] = "=";
$obj_com->arr_filtro[1]["valor"] = $_SESSION["usuario_id"];
$matriz = $obj_com->consultar();
$cont_cam = count($obj->arr_campo);
$int = $_GET["tot"];
foreach($matriz as $row){
	for ($ii = 1; $ii <= $int; $ii++){		if ($_POST["agenda_dwd_participar".$ii] == 1){
			for ($i = 0; $i < $cont_cam; $i++){
	      if ($obj->arr_campo[$i]["nome"] == "sys_usuario_id"){
	        $obj->arr_campo[$i]["valor"] = $_POST["usuario".$ii];
	      }
	      if ($obj->arr_campo[$i]["nome"] == "agenda_compromisso_id"){
	        $obj->arr_campo[$i]["valor"] = $_GET["valor"];
	      }
	    }
	    //Registra os participantes
	    $obj->inserir();

			$obj_com->arr_filtro[0]["condicao"] = "Robson";
			$obj_com->arr_filtro[0]["nome"] = "agenda_compromisso_id";
			$obj_com->arr_filtro[0]["tipo"] = "integer";
			$obj_com->arr_filtro[0]["operacao"] = "=";
			$obj_com->arr_filtro[0]["valor"] = $row[id];

			$obj_com->arr_filtro[1]["condicao"] = "and";
			$obj_com->arr_filtro[1]["nome"] = "sys_usuario_id";
			$obj_com->arr_filtro[1]["tipo"] = "integer";
			$obj_com->arr_filtro[1]["operacao"] = "=";
			$obj_com->arr_filtro[1]["valor"] = $_POST["usuario".$ii];
			$matrizx = $obj_com->consultar();
			if (!empty($matrizx)){
      }else{
		    //Registra os compromissos para os participantes
		    $obj_com->arr_campo[1]["valor"] = $row["ano"];
		    $obj_com->arr_campo[2]["valor"] = $row["mes"];
		    $obj_com->arr_campo[3]["valor"] = $row["dia"];
		    $obj_com->arr_campo[4]["valor"] = $row["agenda_hora_inicio_id"];
		    $obj_com->arr_campo[6]["valor"] = $row["agenda_hora_fim_id"];
		    $obj_com->arr_campo[9]["valor"] = $row["assunto"];
		    $obj_com->arr_campo[10]["valor"] = $row["local"];
		    $obj_com->arr_campo[11]["valor"] = $row["descricao"];
	      $obj_com->arr_campo[12]["valor"] = $row["agenda_atividade_id"];
	      $obj_com->arr_campo[14]["valor"] = $row["agenda_prioridade_id"];
	      $obj_com->arr_campo[16]["valor"] = $row["agenda_categoria_id"];
	      $obj_com->arr_campo[18]["valor"] = $row["agenda_status_id"];
	      $obj_com->arr_campo[20]["valor"] = $_POST["usuario".$ii];
	      $obj_com->arr_campo[21]["valor"] = $row["privado"];
	      $obj_com->arr_campo[22]["valor"] = $_GET["valor"];

	      $obj_com->inserir();
	    }
		}
	}
}
echo "Participantes convidados com sucesso.";
?>