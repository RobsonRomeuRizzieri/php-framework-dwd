  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <link href="css/pagina.css" rel="stylesheet" type="text/css" />
<?php
if (!(isset($_SESSION["usuario_id"])) &&
   !(isset($_SESSION["usuario_login"])) &&
   !(isset($_SESSION["usuario_grupo_id"])) &&
   !(isset($_SESSION["usuario_grupo_nome"])) &&
   !(isset($_SESSION["usuario_sistema_id"])) &&
   !(isset($_SESSION["usuario_sistema_nome"])) &&
   !(isset($_SESSION["usuario_sistema_diretorio"])) &&
   !(isset($_SESSION["usuario_sistema_banco"])) &&
   !(isset($_SESSION["usuario_sistema_usuario"])) &&
   !(isset($_SESSION["usuario_empresa_id"])) &&
   !(isset($_SESSION["usuario_filial_id"])) &&
   !(isset($_SESSION["empresa_id"])) &&
   !(isset($_SESSION["empresa_nome"])) &&
   !(isset($_SESSION["filial_id"])) &&
   !(isset($_SESSION["filial_nome"]))) {?> <div id="body">
     <div id="top">Sem permissăo para entrar no sistema.</div>
   </div>
<?php
	exit;
}

?>