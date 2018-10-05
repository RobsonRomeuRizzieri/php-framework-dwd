<?php
session_start();
include("../dwd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <meta name="generator" content="DWD, www.developwd.com">
  <link href="portal_css/pagina.css" rel="stylesheet" type="text/css" />
  <link href="portal_css/janela.css" rel="stylesheet" type="text/css" />
  <link href="../dwd_css/componentes.css" rel="stylesheet" type="text/css" />
  <title></title>
  </head>
  <SCRIPT src="../dwd_js/drag.js" type=text/javascript></SCRIPT>
  <script src="../dwd_js/ajax.js" TYPE="text/javascript"> </script>
  <script src="../dwd_js/voltar.js" language="javascript"></script>

  <body style="-moz-user-select: none;" onload="dwd_ajax();">
  <div id="top">
     <A title="Arir a tela de login" onmousedown=abrir('janela'); href="#">login</A>
  </div>
<!--	 <DIV id=pos>x:<BR>y:</DIV> -->

    <div class="janela_isolamento">
		<DIV id="janela" class="janela" onmousemove="definir_janela('janela');">
		  <DIV onmouseup="stopDrag();" onmousedown="startDrag();" id="barra" class="barra">
		    <H2>Login - Entrar no Sistema</H2>
		    <A onmouseup=fechar('janela'); id=fechar title=Fechar href="#">x</A>
		    <A onmouseup="esconder('conteudo','minimax','statusbar');" id=esconder title=Esconder href="#">^</A>
		    <A onmouseup=minimax('conteudo','minimax','statusbar',false); id=minimax title=Minimizar href="#">-</A>
		  </DIV>
		  <DIV id="conteudo" class="conteudo">
				<form name="login" method="post" action="#" class="login">
  				Usuário: <input name="usuario" type="text" tabindex="1" size="15" value="dwd">
  				Senha:   <input name="senha" type="password" tabindex="2" size="15" value="123">
          <label class="botao_filtrar lblbotao"><input class="botao" type="buttom" name="entrar" value="Entrar" tabindex="3" onClick="executar_exibir_img('../padrao_entidade/usuario_executar.php?a=1&definir=usuario','conteudo_usuario','POST','usuario;dwd;senha',document.login,1,1,'../dwd_img');"></label>
          <br>
          <div id="conteudo_usuario"></div>
				</form>
			</DIV>
		  <DIV id="statusbar" class="statusbar">statusbar .:</DIV>
    </div>

  </body>
</html>