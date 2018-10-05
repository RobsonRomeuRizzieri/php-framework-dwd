<?php
require_once("../../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_campo.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
$frm_nome = str_replace("menu_dinamico_", "", $_GET["dwd_tab"]);
?>
<table width="500">
  <tr>
    <td>
      <strong>Permite realizar a cópia do controle de acesso</strong>
		</td>
		<td align="right">
			<img onclick="menu_dinamico_conteudo('','<?php echo $_GET["dwd_tab"]?>');" title="Sair tela de gerenciamento dos arquivos" src="../dwd_img/bt_fechar.gif" align="middle" style="cursor: pointer">
		</td>
	</tr>
</table>
<?php
echo "Copiar do grupo: ";
$obj = new com_combobox_dinamico("grupo_copiar","tabela_acesso",true);
$obj->arr_lookup["tabela"] = "sys_usuario_grupo";
$obj->arr_lookup["chave"] = "id";
$obj->arr_lookup["chave_tipo"] = "integer";
$obj->arr_lookup["retorno"] = "nome";
$obj->arr_lookup["retorno_tipo"] = "string";
$obj->arr_lookup["valor"] = "";
$obj->arr_lookup_filtro[0]["condicao"] = "Robson";
$obj->arr_lookup_filtro[0]["nome"] = "ativo";
$obj->arr_lookup_filtro[0]["tipo"] = "integer";
$obj->arr_lookup_filtro[0]["operacao"] = "=";
$obj->arr_lookup_filtro[0]["valor"] = 1;
$obj->arr_lookup_filtro[0]["valor2"] = 0;
$obj->str_on_change = " executar_exibir_img('../padrao_adm/tabela/tabela_copiar_acesso_executar.php?a=1&criar=sim','campo_result".$_GET["dwd_tab"]."','POST','tabela_acesso_dwd_grupo_copiar',document.frm_con_menu_".$frm_nome.",1,1,'../dwd_img'); ";
$obj->criar();
?><div id="campo_result<?php echo $_GET["dwd_tab"]?>"></div>



