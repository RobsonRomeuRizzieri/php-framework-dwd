<?php
class entidade extends db_entidade{
  public $str_frm_nome;  public $str_arquivo_filtro;
  public $str_arquivo_filtro_resultado;
  public $arr_menu_dinamico;

  public $str_cadastro_arquivo; //Determina qual arquivo de cadastro;
  public $str_cadastro_local;   //Define onde o arquivo de cadastro deve ser criado
  public $str_resultado_arquivo;//Define qual o arquivo que controla as operações do cadastro
  public $str_consulta_arquivo; //Define qual o arquivo usado para a criação da tela de consulta
  public $str_consulta_local;   //Define o local onde a consulta deve ser criada
  public $str_con_descricao;    //Descrição da tela de consulta
  public $arr_detalhe;          //Arr que recebe todos as entidades que são detalhe
  public $str_nome;             //Define nome para entidade
  public $str_campo_ligacao_mestre; //Deve ser definido quando a entidade é um detalhe de outra entidade
  public $bol_filtrar_detalhe;  //Define se deve ou criar o filtro dinamico para o detalhe
  public $bol_detalhe;          //Define que a entidade é um detalhe
  public $rel_tipo_pagina;			//Determina se o relatório é na horizontal "H" ou na vertical "V"
  public $str_arquivo_relatorio;//Define o arquivo para definições do relatório
  public $str_arquivo_relatorio_executar;//Gera o PDF com base nas informações definidas pelo usuário
  public $con_inserir_cad;

	public function __construct($str_entidade="",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false,$str_frm_nome=""){
    $this->bol_filtrar_detalhe = false;
    $this->bol_detalhe = false;
    //Se o nome da tab não foi definido quando o objeto foi criado
    if ($str_frm_nome == ""){
      //obtem o nome da tab automaticamente da URL      $this->str_frm_nome = $_GET["dwd_tab"];
    }else{
	    $this->str_frm_nome = $str_frm_nome;
	  }

    if	($str_banco_tipo == ""){    	$str_banco_tipo = $_SESSION["banco_tipo"];
    }
    if	($str_servidor == ""){
			$str_servidor = $_SESSION["servidor"];
    }
    if	($str_banco == ""){
      $str_banco = $_SESSION["banco_nome"];
    }
    if	($str_usuario == ""){
			$str_usuario = $_SESSION["banco_usuario"];
    }
    if	($str_senha == ""){
			$str_senha = $_SESSION["banco_senha"];
    }
    parent::__construct($str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$str_entidade,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase);

  }

	public function inserir($str_sql=""){		parent::inserir($str_sql);
    $this->arr_campo[0]["valor"] = $this->int_valor_novo;
    $this->int_valor_incremento = $this->int_valor_novo;
		return true;
	}
	public function editar($str_sql=""){		parent::editar($str_sql);
		return true;
	}
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}
	public function excluir($str_sql=""){		parent::excluir($str_sql);
		return true;
	}

  public function adicionar_campo($campo){		parent::adicionar_campo($campo);
  }

  public function relatorio_usuario_configurar(){    for($i = 0; $i < $_GET["tot_cam"]; $i++){      $this->arr_campo[$i]["rel_int_tamanho"] = $_GET["rel_ta".$i];
      if ($_GET["rel".$i] == "1"){
	      $this->arr_campo[$i]["rel_exibir"] = "sim";
	    }else{	      $this->arr_campo[$i]["rel_exibir"] = "nao";
	    }
    }
    $this->rel_tipo_pagina = $_GET["tipo_pagina"];

    if ((isset($_GET["campo1"])) && (isset($_GET["que1"]))){    	$int_fil = $_GET["tot_fil"];
	    for($i = 0; $i < $int_fil; $i++){		    if ($i < ($int_fil - 1)){	      	$val = $i + 1;
  	    	$val_condicao = $val-1;
		    	if ($_GET["e_ou".$val_condicao] != "nao"){
						$this->arr_filtro[$i]["condicao"] = $_GET["e_ou".$val_condicao];
			    }
					$arr_campo_fil = explode("_rrr_",$_GET["campo".$val]);
					$this->arr_filtro[$i]["nome"] = $arr_campo_fil[1];
					$this->arr_filtro[$i]["tipo"] = $arr_campo_fil[0];
					$this->arr_filtro[$i]["entidade"] = $arr_campo_fil[2];
					$cont = count($this->arr_campo);
		   		if ($_GET["que".$val] == "rwdr"){
		     	  $this->arr_filtro[$i]["operacao"] = "plikep";
		      }else if ($_GET["que".$val] == "rwd"){
		     	  $this->arr_filtro[$i]["operacao"] = "plike";
		      }else if ($_GET["que".$val] == "wdr"){
		     	  $this->arr_filtro[$i]["operacao"] = "likep";
		      }else{
		        //Define as demais condições
		      	$this->arr_filtro[$i]["operacao"] = $_GET["que".$val];
		      }

		      //Quando for do tipo data
		      if (($this->arr_filtro[$i]["tipo"] == "date") ||
		          ($this->arr_filtro[$i]["tipo"] == "datetime")){
		  			$this->arr_filtro[$i]["valor"] = $_GET["valor_data_um".$val];
					  $this->arr_filtro[$i]["valor2"] = $_GET["valor_data_dois".$val];
				  }else{
				  //Quando for outro tipo qualquer
		  			$this->arr_filtro[$i]["valor"] = $_GET["valor_um".$val];
					  $this->arr_filtro[$i]["valor2"] = $_GET["valor_dois".$val];
				  }
				}
	    }
	  }
  }

}
?>