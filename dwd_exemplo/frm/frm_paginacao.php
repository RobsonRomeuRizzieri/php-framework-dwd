<?php
		// Selecionar servidor
		$conectar = mysql_connect("localhost", "root", "") or die ("Erro ao logar no BD");
		// Selecionar BD
		mysql_select_db("dwd", $conectar);
		// Pegar a p�gina atual por GET
		$p = $_GET["p"];
		// Verifica se a vari�vel t� declarada, sen�o deixa na primeira p�gina como padr�o
		if(isset($p)) {
		$p = $p;
		} else {
		$p = 1;
		}
		// Defina aqui a quantidade m�xima de registros por p�gina.
		$qnt = 5;
		// O sistema calcula o in�cio da sele��o calculando:
		// (p�gina atual * quantidade por p�gina) - quantidade por p�gina
		$inicio = ($p*$qnt) - $qnt;
		// Seleciona no banco de dados com o LIMIT indicado pelos n�meros acima
		$sql_select = "SELECT * FROM teste LIMIT $inicio, $qnt";
		// Executa o Query
		$sql_query = mysql_query($sql_select);

		// Cria um while para pegar as informa��es do BD
		while($array = mysql_fetch_array($sql_query)) {
		// Vari�vel para capturar o campo 'nome' no banco de dados
		$nome = $array["ID"]." ".$array["NOME"];
		// Exibe o nome que est� no BD e pula uma linha
		echo $nome." <br /> ";
		}

		// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr�xima, �ltima...)
		echo "<br />";

		// Faz uma nova sele��o no banco de dados, desta vez sem LIMIT,
		// para pegarmos o n�mero total de registros
		$sql_select_all = "SELECT * FROM teste";
		// Executa o query da sele��o acimas
		$sql_query_all = mysql_query($sql_select_all);
		// Gera uma vari�vel com o n�mero total de registros no banco de dados
		$total_registros = mysql_num_rows($sql_query_all);
		// Gera outra vari�vel, desta vez com o n�mero de p�ginas que ser� precisa.
		// O comando ceil() arredonda 'para cima' o valor
		$pags = ceil($total_registros/$qnt);
		// N�mero m�ximos de bot�es de pagina��o
		$max_links = 3;
		// Exibe o primeiro link 'primeira p�gina', que n�o entra na contagem acima(3)
		echo "<a href='frm_consulta.php?p=1' target='_self'>primeira pagina</a> ";
		// Cria um for() para exibir os 3 links antes da p�gina atual
		for($i = $p-$max_links; $i <= $p-1; $i++) {
		// Se o n�mero da p�gina for menor ou igual a zero, n�o faz nada
		// (afinal, n�o existe p�gina 0, -1, -2..)
		if($i <=0) {
		//faz nada
		// Se estiver tudo OK, cria o link para outra p�gina
		} else {
		echo "<a href='frm_consulta.php?p=".$i."' target='_self'>".$i."</a> ";
		}
		}
		// Exibe a p�gina atual, sem link, apenas o n�mero
		echo $p." ";
		// Cria outro for(), desta vez para exibir 3 links ap�s a p�gina atual
		for($i = $p+1; $i <= $p+$max_links; $i++) {
		// Verifica se a p�gina atual � maior do que a �ltima p�gina. Se for, n�o faz nada.
		if($i > $pags)
		{
		//faz nada
		}
		// Se tiver tudo Ok gera os links.
		else
		{
		echo "<a href='frm_consulta.php?p=".$i."' target='_self'>".$i."</a> ";
		}
		}
		// Exibe o link "�ltima p�gina"
		echo "<a href='frm_consulta.php?p=".$pags."' target='_self'>ultima pagina</a> ";
?>