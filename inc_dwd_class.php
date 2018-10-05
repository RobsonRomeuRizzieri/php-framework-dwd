<?php
if ($_GET["a"] == "1"){
  header("Content-Type: text/HTML; charset=iso-8859-1", true);
}else if ($_GET["a"] == "2"){
  header("Content-Type: text/HTML; charset=UTF-8", true);
}else{	header("Content-Type: text/HTML; charset=iso-8859-1", true);
}
session_start();
//Metodo de gerenciamento da inclusão das classes
function __autoload($classe_nome){
  //Executa inclusão dos arquivos de forma automática.
  require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."dwd_class/".$classe_nome.".php");
}
?>