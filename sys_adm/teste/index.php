<html>

<head>
<title>ConsysTI - Testes com novos estilos CSS</title>
<link rel='stylesheet' type='text/css' href='dwd.css'/>
</head>

<!--	<frameset cols="200,*">
		<frame name="conte�do" target="principal" src="menu.php" scrolling="yes">
		<frame name="principal" src="inicial.php">
	</frameset>
	<noframes>
	<body>

	<p>Esta p�gina usa quadros mas seu navegador n�o aceita quadros.</p>

	</body>
	</noframes>-->


<frameset rows="80,*,20" frameborder=no>
	<frame name="superior" scrolling="no" noresize src="cabecalho.php">
	<frameset cols="250,*">
		<frame name="conte�do" target="principal" src="menu.php" scrolling="yes">
		<frame name="principal" src="calendario.php">
	</frameset>
	<frame name="inferior" scrolling="no" noresize target="conte�do" src="rodape.php">
	<noframes>
	<body>

	<p>Esta p�gina usa quadros mas seu navegador n�o aceita quadros.</p>

	</body>
	</noframes>
</frameset>


</html>