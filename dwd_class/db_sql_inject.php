<?php ###########
## M�dulo de Fun��es de Prote��o de Ataques via SQL_Injection
## Criado: 04/03/2007 - Maycon Edinger
## Alterado:
## Altera��es:
###########

//Fun��o para revinir ataque via sql injection
function dwd_filtra($variavel)    {
  //Define a var�avel inject como 0 (0 = variavel limpa)
	$inject=0;

	//Converte a string da vari�vel informada para minusculas para depois comparar
  $fonte=strtolower($variavel);

  //Cria o primeiro array com as palavras bloqueadas de tentativa de ataque
	$badword1= array("' or 0=0 --",'" or 0=0 --',"or 0=0 --","' or 0=0 #","admin'--",'" or 0=0 #',"or 0=0 #","' or 'x'='x",'" or "x"="x',"') or ('x'='x","' or 1=1--",'" or 1=1--',"or 1=1--","' or a=a--",'" or "a"="a',"') or ('a'='a",'") or ("a"="a','hi" or "a"="a','hi" or 1=1 --',"hi' or 1=1 --","hi' or 'a'='a","hi') or ('a'='a",'hi") or ("a"="a',"or '1=1'");
  //Cria o for para percorrer e comparar as palavras da vari�vel em busca de palavras maliciosas
	for($i=0;$i<sizeof($badword1);$i++)    {
    //Caso encontre alguma palavra maliciosa
		if(substr_count($fonte,$badword1[$i])!=0) {
      echo $badword1[$i];
      //Seta a vari�vel inject como 1 (1 = tentativa de sql injection)
			$inject=1;
    }
  }

  //Cria o segundo array com as palavras bloqueadas de tentativa de ataque
  $badword2 = array(" select","select "," insert","insert "," update","update "," delete","delete "," drop","drop "," destroy","destroy ","truncate "," truncate"," alter","alter ");
  //Cria o for para percorrer e comparar as palavras da vari�vel em busca de palavras maliciosas
	for($i=0;$i<sizeof($badword2);$i++)    {
    //Caso encontre alguma palavra maliciosa
	  if(substr_count($fonte,$badword2[$i])!=0)    {
	  	echo $badword2[$i];
    	//Seta a vari�vel inject como 1 (1 = tentativa de sql injection)
			$inject=1;
    }
  }

	//Cria o array com os caracteres v�lidos que podem ser utilizados
  $charvalidos = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789������������������������������������!?@#$%&(){}[]:;,.-_/*=\'\"><";

	//Cria o for para percorrer e comparar as palavras da vari�vel em busca de palavras maliciosas
  for($i=0;$i<strlen($fonte);$i++)    {
    //Verifica a existencia de letras inv�lidas
	  $char = substr($fonte,$i,1);
    //Se achar alguma
		if(substr_count($charvalidos,$char)==0)    {
//			echo $char;
    	//Seta a vari�vel inject como 1 (1 = tentativa de sql injection)
//      $inject=1;
    }
  }

  //Caso n�o tenha nenhuma tentativa de ataque
	if ($inject == 0) {
		//Retorna o valor original da vari�vel
   	return($variavel);
	//Se tiver tentativa de atauqe
	} else {

		//Para o script e exibe a mensagem para o usu�rio
		die("<table width='100%' style='background-color:#ffffff;' border='0' align='left' cellpadding='0' cellspacing='0' class='text'><tr style='padding: 4px'><td colspan='2'><img src='http://www.workdynamics.com.br/wd_imagem/logo_workdynamics.gif'></td></tr><tr style='padding: 2px'><td height='22' width='20' valign='top' bgcolor='#FFFFCD' style='border: solid 1px; padding-left: 4px; padding-top: 2px; border-right: 0px'><img src='http://www.workdynamics.com.br/wd_imagem/bt_informacao.gif' border='0' /></td><td valign='middle' bgcolor='#FFFFCD' style='border: solid 1px; padding-left: 4px; border-left: 0px'><font face='Verdana'><font size='2'><strong>Tentativa de invas�o via SQL Injection detectada. Interrompendo a execu��o do sistema !</strong></font></font></br><font face='Verdana'><font size='1'>Caso esteja com dificuldades na utiliza��o do work | Dynamics, entre em contato com nosso departamento de <a href='mailto:suporte@workdynamics.com.br'>suporte</a></font></font></td></tr></table>");
	}

}
?>