<html>
<head>
		<title>Treeview</title>
		<meta http-equiv="Content-Type"
			content="text/html; charset=iso-8859-1" />

		<link rel="stylesheet" href="treeview.css" type="text/css"/>
        <script language="JavaScript"  src="treeview.js">
		</script>

		<script type="text/javascript">



function carregaMenu(){

	limparMenu();

	trv = new treeview('menuPrincipal');

	//m�dulo Acesso R�pido
	a = trv.add('Acesso R�pido','javascript:void(null);','principal', null);
	b = trv.add('Calend�rio','calendario.php','principal', a);
	b = trv.add('Agenda do Dia','teste.php','principal', a);
	b = trv.add('Trocar Senha','teste.php','principal', a);
	b = trv.add('Efetuar Logoff','teste.php','principal', a);


	//m�dulo Pessoa
	a = trv.add('Pessoa','javascript:void(null);','principal', null);
	//sub-m�dulo Controle Acesso
	b = trv.add('Controle Acesso','javascript:void(null);','principal', a);
	c = trv.add('Filial','teste.php','principal', b);
	c = trv.add('Grupo Usu�rio','teste.php','principal', b);
	c = trv.add('Usu�rio','teste.php','principal', b);
	c = trv.add('Hist�rico Acesso','teste.php','principal', b);
	c = trv.add('Hist�rico Sistema','teste.php','principal', b);
	c = trv.add('Sistemas','teste.php','principal', b);
	//Sub-m�dulo Agenda
	b = b = trv.add('Agenda','javascript:void(null);','principal', a);
	c = trv.add('Categoria','teste.php','principal', b);
	c = trv.add('Prioridade','teste.php','principal', b);
	c = trv.add('Atividade','teste.php','principal', b);
	c = trv.add('Status','teste.php','principal', b);
	c = trv.add('Compromisso','lista_compromisso.php','principal', b);



	//m�dulo Tarefas
	a = trv.add('Tarefas','javascript:void(null);','principal', null);
	//sub-m�dulo Controle Acesso
	b = trv.add('Tarefas','javascript:void(null);','principal', a);
	c = trv.add('Status','teste.php','principal', b);
	c = trv.add('Naturezas','teste.php','principal', b);
	c = trv.add('Projetos','teste.php','principal', b);
	c = trv.add('Tarefas','teste.php','principal', b);

	//m�dulo Base Conhecimento
	a = trv.add('Base Conhecimento','javascript:void(null);','principal', null);
	//sub-m�dulo Controle Acesso
	b = trv.add('Conhecimento','javascript:void(null);','principal', a);
	c = trv.add('Assuntos','teste.php','principal', b);
	c = trv.add('T�picos','teste.php','principal', b);


	//m�dulo Desenvolvedor
	a = trv.add('Desenvolvedor','javascript:void(null);','principal', null);
	//sub-m�dulo SGBD
	b = trv.add('SGBD','javascript:void(null);','principal', a);
	c = trv.add('Tabelas','teste.php','principal', b);
	c = trv.add('Grupo Sub-Menus','teste.php','principal', b);
	c = trv.add('Mudar Sub-Menus','teste.php','principal', b);


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

	</head>

	<body >


		<div id="mensagemCarregando">
			<h2>Aguarde, carregando Treeview...</h2>
		</div>
		<div id="menuPrincipal"></div>


		<script>
			carregaMenu();
		</script>


	</body>
</html>