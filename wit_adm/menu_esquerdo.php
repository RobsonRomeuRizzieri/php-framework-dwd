<?php
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/tabela_acesso.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/menu.php");

//  $obj = new menu();
//  $obj->menu_criar();
?>

<script type="text/javascript">

function carregaMenu(){

	limparMenu();

	trv = new treeview('menuPrincipal');

<?php
  $obj = new menu();
  $obj->menu_criar();
?>

	//m�dulo Acesso R�pido
//	a = trv.add('Acesso R�pido','','principal', null);
//	b = trv.add('Calend�rio','agenda/wd_calendario.php?a=1','principal', a);
//	b = trv.add('Agenda do Dia','agenda/wd_modulo_compromisso.php?a=1','principal', a);
//	b = trv.add('Trocar Senha','usuario/usuario_cadastro_senha.php?a=1&status=editar&valor=<?php echo $_SESSION["usuario_id"]?>','principal', a);
//	b = trv.add('Efetuar Logoff','usuario_logoff.php','principal', a);

  //Geral
//	a = trv.add('Geral','','principal', null);
//	b = trv.add('Empresa','','principal', a);
//	c = trv.add('Cadastro','empresa/empresa_consulta.php?a=1','principal', b);
//	b = trv.add('Filial','','principal', a);
//	c = trv.add('Cadastro','filial/filial_consulta.php?a=1','principal', b);

  //Usuario
//	a = trv.add('Usu�rio','','principal', null);
//	b = trv.add('Cadastro','','principal', a);
//	c = trv.add('Grupo','usuario/usuario_grupo_consulta.php?a=1','principal', b);
//	c = trv.add('Usu�rio','usuario/usuario_consulta.php?a=1','principal', b);
//	b = trv.add('Gerenciamento','','principal', a);
//	c = trv.add('Controle acesso','tabela/tabela_acesso_consulta.php','principal', b);

	//m�dulo Pessoa
//	a = trv.add('Pessoa','','principal', null);

	//Sub-m�dulo Agenda
//	b = b = trv.add('Agenda','','principal', a);
//	c = trv.add('Categoria','agenda/agenda_categoria_consulta.php?a=1','principal', b);
//	c = trv.add('Prioridade','agenda/agenda_prioridade_consulta.php?a=1','principal', b);
//	c = trv.add('Atividade','agenda/agenda_atividade_consulta.php?a=1','principal', b);
//	c = trv.add('Status','agenda/agenda_status_consulta.php?a=1','principal', b);
//	c = trv.add('Compromisso','agenda/agenda_compromisso_consulta.php?a=1','principal', b);



	//m�dulo Tarefas
//	a = trv.add('Tarefas','javascript:void(null);','principal', null);
	//sub-m�dulo Controle Acesso
//	b = trv.add('Tarefas','javascript:void(null);','principal', a);
//	c = trv.add('Status','teste.php','principal', b);
//	c = trv.add('Naturezas','teste.php','principal', b);
//	c = trv.add('Projetos','teste.php','principal', b);
//	c = trv.add('Tarefas','teste.php','principal', b);

	//m�dulo Base Conhecimento
//	a = trv.add('Base Conhecimento','javascript:void(null);','principal', null);
	//sub-m�dulo Controle Acesso
//	b = trv.add('Conhecimento','javascript:void(null);','principal', a);
//	c = trv.add('Assuntos','teste.php','principal', b);
//	c = trv.add('T�picos','teste.php','principal', b);


	//m�dulo Desenvolvedor
//	a = trv.add('Desenvolvedor','','principal', null);
	//sub-m�dulo SGBD
//	b = trv.add('SGBD','','principal', a);
//	c = trv.add('Tabelas','tabela/tabela_consulta.php?a=1','principal', b);
//	c = trv.add('Grupo Sub-Menus','teste.php','principal', b);
//	c = trv.add('Mudar Sub-Menus','teste.php','principal', b);
//	b = trv.add('Sistema','','principal', a);
//	c = trv.add('Menus','menu/menu_consulta.php?a=1','principal', b);

	document.getElementById('mensagemCarregando').style.display = "none";
	document.getElementById('menuPrincipal').style.display = "block";

}

function limparMenu(){
	var d = document.getElementById("menuPrincipal");
	while (d.childNodes.length > 0){
		d.removeChild(d.childNodes[0]);
	}
}

</script>

<div id="mensagemCarregando">
	<h2>Aguarde, carregando Treeview...</h2>
</div>
<div id="menuPrincipal"></div>


<script>
	carregaMenu();
</script>
