<script src="../../dwd_js/ajax.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/componente.js" TYPE="text/javascript"> </script>
<script src="../../dwd_js/com_combobox.js" TYPE="text/javascript"> </script>
<?php
require_once("../../inc_dwd_class.php");
require_once("../../dwd.php");
?>
<body onload="dwd_ajax();">
<div id="pai">
<?php
$obj = new com_combobox_dinamico("dois","exemplo",true);
$obj->arr_lookup["tabela"] = "teste";
$obj->arr_lookup["chave"] = "id";
$obj->arr_lookup["chave_tipo"] = "integer";
$obj->arr_lookup["retorno"] = "nome";
$obj->arr_lookup["retorno_tipo"] = "string";
$obj->arr_lookup["valor"] = "35";

$obj->arr_lookup_filtro[0]["condicao"] = "and";
$obj->arr_lookup_filtro[0]["nome"] = "ativo";
$obj->arr_lookup_filtro[0]["tipo"] = "integer";
$obj->arr_lookup_filtro[0]["operacao"] = "=";
$obj->arr_lookup_filtro[0]["valor"] = 1;
$obj->arr_lookup_filtro[0]["valor2"] = 0;

$obj->arr_combobox_detalhe["local_atualizar"] = "detalhe";
$obj->arr_combobox_detalhe["arquivo"] = "combobox_dinamico_filho.php";
//Manter o valor da posição evento do array em branco executa o evento onChange
$obj->arr_combobox_detalhe["evento"] = "";
echo "Mestre: ";
$obj->criar();
?>
</div>
<br>
<div id="detalhe">
<?php
$objx = new com_combobox_dinamico("dois_detalhe","exemplo",true);
$objx->arr_lookup["tabela"] = "teste_filho";
$objx->arr_lookup["chave"] = "id";
$objx->arr_lookup["chave_tipo"] = "integer";
$objx->arr_lookup["retorno"] = "nome";
$objx->arr_lookup["retorno_tipo"] = "string";
$objx->arr_lookup["valor"] = "1";

$objx->arr_lookup_filtro[0]["condicao"] = "and";
$objx->arr_lookup_filtro[0]["nome"] = "teste_id";
$objx->arr_lookup_filtro[0]["tipo"] = "integer";
$objx->arr_lookup_filtro[0]["operacao"] = "=";
if (isset($_GET["valor_pai"])){	$objx->arr_lookup_filtro[0]["valor"] = $_GET["valor_pai"];
}else{
	$objx->arr_lookup_filtro[0]["valor"] = $obj->arr_lookup["valor"];
}
$objx->arr_lookup_filtro[0]["valor2"] = 0;

$objx->arr_lookup_filtro[1]["condicao"] = "and";
$objx->arr_lookup_filtro[1]["nome"] = "ativo";
$objx->arr_lookup_filtro[1]["tipo"] = "integer";
$objx->arr_lookup_filtro[1]["operacao"] = "=";
$objx->arr_lookup_filtro[1]["valor"] = 1;
$objx->arr_lookup_filtro[1]["valor2"] = 0;
echo "Detalhe: ";
$objx->criar();
?>
</div>
</body>
