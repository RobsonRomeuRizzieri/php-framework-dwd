<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_hora_usada.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/agenda_compromisso_participante.php");
$obj = new frm_cadastro();
$obj->obj_entidade = new agenda_compromisso($_GET["dwd_tab"]);
$obj->obj_entidade->arr_campo[3]["valor"] = $_GET["ano"];
$obj->obj_entidade->arr_campo[2]["valor"] = $_GET["mes"];
$obj->obj_entidade->arr_campo[1]["valor"] = $_GET["dia"];
$obj->obj_entidade->arr_campo[5]["valor"] = $_GET["hora_com"];
if (isset($_GET["status"])){
  $obj->str_status = $_GET["status"];
	$obj->obj_entidade->arr_filtro[0]["condicao"] = "Robson";
	$obj->obj_entidade->arr_filtro[0]["nome"] = "id";
	$obj->obj_entidade->arr_filtro[0]["tipo"] = "integer";
	$obj->obj_entidade->arr_filtro[0]["operacao"] = "=";
	$obj->obj_entidade->arr_filtro[0]["valor"] = $_GET["valor"];
	$obj->obj_entidade->arr_filtro[0]["valor2"] = "0";

}
$obj->criar();
?>

<script type="text/javascript">
  agenda_hora_usada_inicial('agenda_hora_inicio_id',document.<?php echo $obj->obj_entidade->frm_str_nome?>agenda_compromisso);
</script>



