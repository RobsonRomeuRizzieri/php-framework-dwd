<?php
include("../inc_dwd_class.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_grupo.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_sistema.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_empresa.php");
require_once($_SERVER["DOCUMENT_ROOT"].$_SESSION["projeto"]."padrao_entidade/usuario_filial.php");
$obj = new usuario();

function campo_filial($obj){  //define o sistema para a sessão
  if (isset($_POST["login_dwd_filial"])){
	  $_SESSION["usuario_filial_id"]	= $_POST["login_dwd_filial"];
	}
  $matriz = $obj->definir_filial($_SESSION["usuario_empresa_id"],$_SESSION["usuario_filial_id"]);
  if (count($matriz) == 1){
    foreach($matriz as $row){
      $_SESSION["filial_id"] = $row["sys_filial_id"];
      $_SESSION["filial_nome"] = $row["nome_sys_filial"];
    }
  }
/*
  echo "usuario id:".$_SESSION["usuario_id"]."<br>";
  echo "usuario login:".$_SESSION["usuario_login"]."<br>";
  echo "usuario grupo id:".$_SESSION["usuario_grupo_id"]."<br>";
  echo "usuario grupo nome:".$_SESSION["usuario_grupo_nome"]."<br>";
  echo "usuario sistema id:".$_SESSION["usuario_sistema_id"]."<br>";
  echo "usuario sistema nome:".$_SESSION["usuario_sistema_nome"]."<br>";
  echo "usuario sistema diretorio:".$_SESSION["usuario_sistema_diretorio"]."<br>";
  echo "usuario sistema banco:".$_SESSION["usuario_sistema_banco"]."<br>";
  echo "usuario sistema usuario:".$_SESSION["usuario_sistema_usuario"]."<br>";
  echo "empresa id:".$_SESSION["empresa_id"]."<br>";
  echo "empresa nome:".$_SESSION["empresa_nome"]."<br>";
  echo "usuario empresa id:".$_SESSION["usuario_empresa_id"]."<br>";
  echo "filial id:".$_SESSION["filial_id"]."<br>";
  echo "filial nome:".$_SESSION["filial_nome"]."<br>";
  echo "usuario filial id:".$_SESSION["usuario_filial_id"]."<br>";
*/
  //redefine as sessoes de conexão
  $_SESSION["banco_nome"] = $_SESSION["usuario_sistema_banco"];
  $_SESSION["banco_usuario"] = $_SESSION["usuario_sistema_usuario"];
?>
  <script>
		window.location = '<?php echo $_SESSION["usuario_sistema_diretorio"]?>';
	</script>
<?php

}

function campo_empresa($obj){
  //define o sistema para a sessão
  if (isset($_POST["login_dwd_empresa"])){
	  $_SESSION["usuario_empresa_id"]	= $_POST["login_dwd_empresa"];
	}
  $matriz = $obj->definir_empresa($_SESSION["usuario_id"],$_SESSION["usuario_empresa_id"]);
  if (count($matriz) == 1){
    foreach($matriz as $row){
      $_SESSION["empresa_id"] = $row["sys_empresa_id"];
      $_SESSION["empresa_nome"] = $row["nome_sys_empresa"];
    }
  }
  //define a empresa para a sessão do usuario
  //Define a tela para escolha do sistema
  $matriz_emp = $obj->definir_filial($_SESSION["usuario_empresa_id"]);
  //Se existir mais de um monta tela para o usuário escolher qual sistema deve entrar
  if (count($matriz_emp) > 1){
  	$cont = 0;
    $obj_com = new com_combobox_fixo("filial","login",false);
  	$obj_com->bol_item_selecao = true;
  	$obj_com->str_on_change = " executar_exibir_img('../padrao_entidade/usuario_executar.php?a=1&definir=filial','conteudo_usuario_filial_rec','POST','login_dwd_filial',document.login,1,1,'../dwd_img'); ";
    foreach($matriz_emp as $row){
	  	$obj_com->arr_item[$cont]["valor"] = $row["id"];
		  $obj_com->arr_item[$cont]["descricao"] = $row["nome_sys_filial"];
		  $cont++;
    }
?>  <div id="conteudo_usuario_filial">
<?php echo "Escolha a filial: ";
      $obj_com->criar();
?>    <!--
      <label class="botao_detalhe lblbotao"><input class="botao" type="buttom" name="entrar" value="Filial Entrar" tabindex="3" onClick="executar_exibir_img('../entidade_padrao/usuario_executar.php?a=1&definir=filial','conteudo_usuario_filial_rec','POST','login_dwd_filial',document.login,1,1,'../dwd_img');"></label>
      -->
      <br>
    </div>
    <div id="conteudo_usuario_filial_rec">

    </div>
<?php
  //Faz login automaticamente da unica empresa existe
  }else if (count($matriz_emp) == 1){
    foreach($matriz_emp as $row){
      $_SESSION["filial_id"]	= $row["sys_filial_id"];
      $_SESSION["filial_nome"] = $row["nome_sys_filial"];
    }
    campo_filial($obj);
?>
<?php
  }else{
    echo "Não existe filial relacionada ao usuário ".$_SESSION["usuario_login"].".<br>";
  }

}

function campo_sistema($obj){
  if (isset($_POST["login_dwd_sistema"])){    //define o sistema para a sessão
    $_SESSION["usuario_sistema_id"]	= $_POST["login_dwd_sistema"];
  }
  $matriz = $obj->definir_sistema($_SESSION["usuario_id"],$_SESSION["usuario_sistema_id"]);
  if (count($matriz) == 1){
    foreach($matriz as $row){
      $_SESSION["usuario_sistema_nome"] = $row["nome_sys_sistema"];
      $_SESSION["usuario_sistema_diretorio"] = $row["diretorio_arquivo_sys_sistema"];
      $_SESSION["usuario_sistema_banco"] = $row["banco_dados_sys_sistema"];
      $_SESSION["usuario_sistema_usuario"] = $row["banco_usuario_sys_sistema"];
    }
  }
  //define a empresa para a sessão do usuario
  //Define a tela para escolha do sistema
  $matriz_emp = $obj->definir_empresa($_SESSION["usuario_id"]);
  //Se existir mais de um monta tela para o usuário escolher qual sistema deve entrar
  if (count($matriz_emp) > 1){
  	$cont = 0;
    $obj_com = new com_combobox_fixo("empresa","login",false);
  	$obj_com->bol_item_selecao = true;
  	$obj_com->str_on_change = " executar_exibir_img('../padrao_entidade/usuario_executar.php?a=1&definir=empresa','conteudo_usuario_filial','POST','login_dwd_empresa',document.login,1,1,'../dwd_img'); ";
    foreach($matriz_emp as $row){
	  	$obj_com->arr_item[$cont]["valor"] = $row["id"];
		  $obj_com->arr_item[$cont]["descricao"] = $row["nome_sys_empresa"];
		  $cont++;
    }
?>  <div id="conteudo_usuario_empresa">
<?php echo "Escolha a empresa: ";
      $obj_com->criar();
?>    <!--
      <label class="botao_detalhe lblbotao"><input class="botao" type="buttom" name="entrar" value="Empresa Entrar" tabindex="3" onClick="executar_exibir_img('../entidade_padrao/usuario_executar.php?a=1&definir=empresa','conteudo_usuario_filial','POST','login_dwd_empresa',document.login,1,1,'../dwd_img');"></label>
      -->
      <br>
    </div>
    <div id="conteudo_usuario_filial">

    </div>
<?php
  //Faz login automaticamente da unica empresa existe
  }else if (count($matriz_emp) == 1){
    foreach($matriz_emp as $row){
      $_SESSION["empresa_id"]	= $row["sys_empresa_id"];
      $_SESSION["empresa_nome"] = $row["nome_sys_empresa"];
      $_SESSION["usuario_empresa_id"] = $row["id"];
    }
    campo_empresa($obj);
?>
<?php
  }else{
    echo "Não existe empresa relacionada ao usuário ".$_SESSION["usuario_login"].".<br>";
  }

}

if ($_GET["definir"] == "usuario"){
	$obj->arr_filtro[0]["condicao"] = "Robson";
	$obj->arr_filtro[0]["nome"] = "login";
	$obj->arr_filtro[0]["tipo"] = "string";
	$obj->arr_filtro[0]["operacao"] = "=";
	$obj->arr_filtro[0]["valor"] = $_POST["usuario"];

	$obj->arr_filtro[1]["condicao"] = "and";
	$obj->arr_filtro[1]["nome"] = "senha";
	$obj->arr_filtro[1]["tipo"] = "string";
	$obj->arr_filtro[1]["operacao"] = "=";
	$obj->arr_filtro[1]["valor"] = $_POST["senha"];
	if ($obj->usuario_validar()){
    //Define a tela para escolha do sistema
    $matriz = $obj->definir_sistema($_SESSION["usuario_id"]);
    //Se existir mais de um monta tela para o usuário escolher qual sistema deve entrar
    if (count($matriz) > 1){    	$cont = 0;
      $obj_com = new com_combobox_fixo("sistema","login",false);
			$obj_com->bol_item_selecao = true;
			$obj_com->str_on_change = " executar_exibir_img('../padrao_entidade/usuario_executar.php?a=1&definir=sistema','conteudo_usuario_empresa','POST','login_dwd_sistema',document.login,1,1,'../dwd_img'); ";
      foreach($matriz as $row){
				$obj_com->arr_item[$cont]["valor"] = $row["id"];
				$obj_com->arr_item[$cont]["descricao"] = $row["nome_sys_sistema"];
				$cont++;
      }
?>    <div id="conteudo_usuario_sistema">
<?php echo "Escolha o sistema: ";
      $obj_com->criar();
?>    <!--
      <label class="botao_detalhe lblbotao"><input class="botao" type="buttom" name="entrar" value="Sistema Entrar" tabindex="3" onClick="executar_exibir_img('../entidade_padrao/usuario_executar.php?a=1&definir=sistema','conteudo_usuario_empresa','POST','login_dwd_sistema',document.login,1,1,'../dwd_img');"></label>
      -->
      <br>
      </div>
      <div id="conteudo_usuario_empresa">

      </div>
<?php
    //Faz login automaticamente do unico sistema existe
    }else if (count($matriz) == 1){
      foreach($matriz as $row){
        $_SESSION["usuario_sistema_id"]	= $row["sys_sistema_id"];
        $_SESSION["usuario_sistema_nome"] = $row["nome_sys_sistema"];
      }
      campo_sistema($obj);
?>    <div id="conteudo_usuario_empresa">

      </div>
<?php
    }else{      echo "Não existe sistema relacionado ao usuário ".$_SESSION["usuario_login"].".<br>";
    }
	}else{		echo "Usuário ".$obj->arr_campo[1]["valor"]." é invalido ou sua senha esta errada.";
	}
}

if ($_GET["definir"] == "sistema"){	campo_sistema($obj);
}

if ($_GET["definir"] == "empresa"){	campo_empresa($obj);}

if ($_GET["definir"] == "filial"){
  campo_filial($obj);
}
?>
