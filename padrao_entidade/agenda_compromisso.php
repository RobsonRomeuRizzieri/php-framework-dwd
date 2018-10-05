<?php
class agenda_compromisso extends entidade{

	public function __construct($str_frm_nome="",$str_entidade="agenda_compromisso",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false,$bol_sql_maiusculo=true,$bol_sql_padrao=true,$bol_aspas_crase=false){
    parent::__construct($str_entidade,$str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir,$bol_sql_maiusculo,$bol_sql_padrao,$bol_aspas_crase,$str_frm_nome);
		$this->str_arquivo_filtro = "agenda/agenda_compromisso_consulta_item.php";
		$this->str_arquivo_filtro_resultado = "agenda/agenda_compromisso_consulta_filtro.php";
		$this->str_cadastro_arquivo = "agenda/agenda_compromisso_cadastro.php";
		$this->str_cadastro_local = "content";
		$this->str_consulta_arquivo = "agenda/agenda_compromisso_consulta.php";
		$this->str_consulta_arquivo_executar = "agenda/agenda_compromisso_consulta_executar.php";
		$this->str_consulta_local = "content";
		$this->str_resultado_arquivo = "agenda/agenda_compromisso_cadastro_executar.php";
		$this->str_arquivo_relatorio = "agenda/agenda_compromisso_relatorio.php";
		$this->str_arquivo_relatorio_executar = "agenda/agenda_compromisso_relatorio_executar.php";
		$this->rel_tipo_pagina = "H"; //ou "V";
		$this->con_inserir_cad = "sim";

    $this->str_con_descricao = "Definição dos compromissos";
    $this->str_nome = "Compromisso";
    $this->arr_detalhe[0] = new agenda_compromisso_participante();

    $this->definir_campos();
  }

	private function definir_campos(){		/*Os arquivos
		  agenda_compromisso_participante_consulta.php
		  agenda_compromisso_participante_executar.php
		  Controlam e obtem os campos pelo indice fixo dos campos na ordem que estão
		  se mudar a ordem na classe deve ser alterado nos dois arquivos também
		*/
		//Campo id = 0
		$campo = new entidade_campo();
		$campo->nome = "id";
		$campo->tipo = "auto_inc";
		$campo->descricao = "Código";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->chave = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo = "oculto";
		$campo->rel_int_tamanho	= 20;
		$this->adicionar_campo($campo);
		//Campo id = 1
		$campo = new entidade_campo();
		$campo->nome = "ano";
		$campo->tipo = "string";
		$campo->descricao = "Ano";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "data_ano";
		$campo->cad_tamanho	= 60;
		$campo->str_on_change = " agenda_hora_usada_inicial('agenda_hora_inicio_id',document.".$this->frm_str_nome."agenda_compromisso); agenda_hora_usada_final('agenda_hora_fim_id',document.".$this->frm_str_nome."agenda_compromisso);";
		$campo->cad_novalinha = "nao";
		$campo->rel_int_tamanho	= 10;
		$this->adicionar_campo($campo);
		//Campo id = 2
		$campo = new entidade_campo();
		$campo->nome = "mes";
		$campo->tipo = "string";
		$campo->descricao = "Mes";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->str_on_change = " agenda_hora_usada_inicial('agenda_hora_inicio_id',document.".$this->frm_str_nome."agenda_compromisso); agenda_hora_usada_final('agenda_hora_fim_id',document.".$this->frm_str_nome."agenda_compromisso);";
		$campo->cad_tipo_campo	= "data_mes";
		$campo->cad_tamanho	= 60;
		$campo->cad_novalinha = "nao";
		$campo->rel_int_tamanho	= 10;
		$this->adicionar_campo($campo);
		//Campo id = 3
		$campo = new entidade_campo();
		$campo->nome = "dia";
		$campo->tipo = "string";
		$campo->descricao = "Dia";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->str_on_change = " agenda_hora_usada_inicial('agenda_hora_inicio_id',document.".$this->frm_str_nome."agenda_compromisso); agenda_hora_usada_final('agenda_hora_fim_id',document.".$this->frm_str_nome."agenda_compromisso);";
		$campo->cad_tipo_campo	= "data_dia";
		$campo->cad_tamanho	= 60;
		$campo->cad_novalinha = "sim";
		$campo->rel_int_tamanho	= 10;
		$this->adicionar_campo($campo);
		//Campo id = 4
		$campo = new entidade_campo();
		$campo->nome = "agenda_hora_inicio_id";
		$campo->tipo = "integer";
		$campo->descricao = "Hora Inicio";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->str_on_change .= "agenda_hora_usada_final('agenda_hora_fim_id',document.".$this->frm_str_nome."agenda_compromisso);";
		$campo->lookup_tabela = "agenda_hora";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "hora";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "nao";
		$campo->rel_int_tamanho	= 10;
		$this->adicionar_campo($campo);
		//Campo id = 5
		$campo = new entidade_campo();
		$campo->nome = "hora";
		$campo->entidade = "agenda_hora";
		$campo->entidade_campo_chave = "agenda_hora_inicio_id";
		$campo->tipo = "string";
		$campo->descricao = "Hora Inicio";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$campo->rel_int_tamanho	= 25;
		$this->adicionar_campo($campo);
		//Campo id = 6
		$campo = new entidade_campo();
		$campo->nome = "agenda_hora_fim_id";
		$campo->tipo = "integer";
		$campo->descricao = "Hora Fim";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->str_on_change .= "agenda_hora_usada_final('agenda_hora_fim_id',document.".$this->frm_str_nome."agenda_compromisso);";
		$campo->lookup_tabela = "agenda_hora";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "hora";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "nao";
		$campo->rel_int_tamanho	= 10;
		$this->adicionar_campo($campo);
		//Campo id = 7
		$campo = new entidade_campo();
		$campo->nome = "hora";
		$campo->entidade = "agenda_hora";
		$campo->entidade_campo_chave = "agenda_hora_fim_id";
		$campo->entidade_apilidar = "sim";
		//$campo->bol_left = "nao";
		$campo->tipo = "string";
		$campo->descricao = "Hora Fim";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$campo->rel_int_tamanho	= 25;
		$this->adicionar_campo($campo);
		//Campo id = 8
		$campo = new entidade_campo();
		$campo->nome = "duracao";
		$campo->tipo = "decimal";
		$campo->descricao = "Tempo";
		$campo->valor = "0";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 60;
		$campo->rel_int_tamanho	= 15;
		$campo->rel_exibir	= "nao";
		$this->adicionar_campo($campo);
		//Campo id = 9
		$campo = new entidade_campo();
		$campo->nome = "assunto";
		$campo->tipo = "string";
		$campo->descricao = "Assunto";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "texto";
		$campo->cad_tamanho	= 60;
		$campo->rel_int_tamanho	= 30;
		$this->adicionar_campo($campo);
		//Campo id = 10
		$campo = new entidade_campo();
		$campo->nome = "local";
		$campo->tipo = "string";
		$campo->descricao = "Local";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
  	$campo->con_exibir = "sim";
		$campo->cad_tipo_campo	= "texto";
		$campo->cad_tamanho	= 60;
		$campo->rel_int_tamanho	= 30;
		$this->adicionar_campo($campo);
		//Campo id = 11
		$campo = new entidade_campo();
		$campo->nome = "descricao";
		$campo->tipo = "string";
		$campo->descricao = "Descrição";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->cad_tipo_campo	= "texto_longo";
		$campo->cad_tamanho	= 60;
		$campo->cad_tamanho_linhas	= 3;
		$campo->rel_exibir	= "nao";
		$this->adicionar_campo($campo);
		//Campo id = 12
		$campo = new entidade_campo();
		$campo->nome = "agenda_atividade_id";
		$campo->tipo = "integer";
		$campo->descricao = "Atividade Código";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->lookup_tabela = "agenda_atividade";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "nome";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "nao";
		$this->adicionar_campo($campo);
		//Campo id = 13
		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->entidade = "agenda_atividade";
		$campo->tipo = "string";
		$campo->descricao = "Atividade";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "sim";
		$campo->rel_int_tamanho	= 20;
		$this->adicionar_campo($campo);
		//Campo id = 14
		$campo = new entidade_campo();
		$campo->nome = "agenda_prioridade_id";
		$campo->tipo = "integer";
		$campo->descricao = "Prioridade Código";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->lookup_tabela = "agenda_prioridade";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "nome";
		$campo->lookup_retorno_tipo = "string";
		$campo->con_exibir = "sim";
		$campo->con_editar = "sim";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "nao";
		$campo->rel_int_tamanho	= 30;
		$this->adicionar_campo($campo);
		//Campo id = 15
		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->entidade = "agenda_prioridade";
		$campo->tipo = "string";
		$campo->descricao = "Prioridade";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "sim";
		$campo->rel_int_tamanho	= 25;
		$this->adicionar_campo($campo);
		//Campo id = 16
		$campo = new entidade_campo();
		$campo->nome = "agenda_categoria_id";
		$campo->tipo = "integer";
		$campo->descricao = "Categoria Código";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->lookup_tabela = "agenda_categoria";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "nome";
		$campo->lookup_retorno_tipo = "string";
		$campo->cad_tipo_campo	= "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "nao";
		$campo->rel_int_tamanho	= 30;
		$this->adicionar_campo($campo);
		//Campo id = 17
		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->entidade = "agenda_categoria";
		$campo->tipo = "string";
		$campo->descricao = "Categoria";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "sim";
		$campo->rel_int_tamanho	= 20;
		$this->adicionar_campo($campo);
		//Campo id = 18
		$campo = new entidade_campo();
		$campo->nome = "agenda_status_id";
		$campo->tipo = "integer";
		$campo->descricao = "Status Código";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->lookup_tabela = "agenda_status";
		$campo->lookup_chave = "id";
		$campo->lookup_chave_tipo = "integer";
		$campo->lookup_retorno = "nome";
		$campo->lookup_retorno_tipo = "string";
		$campo->con_exibir = "sim";
		$campo->con_editar = "sim";
		$campo->cad_tipo_campo = "combobox_dinamico";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "nao";
		$campo->rel_int_tamanho	= 30;
		$this->adicionar_campo($campo);
		//Campo id = 19
		$campo = new entidade_campo();
		$campo->nome = "nome";
		$campo->entidade = "agenda_status";
		$campo->tipo = "string";
		$campo->descricao = "Status";
		$campo->valor = "";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->con_exibir = "nao";
		$campo->cad_tipo_campo	= "nao";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "sim";
		$campo->rel_int_tamanho	= 20;
		$this->adicionar_campo($campo);
		//Campo id = 20
		$campo = new entidade_campo();
		$campo->nome = "sys_usuario_id";
		$campo->tipo = "integer";
		$campo->descricao = "Código";
		$campo->valor = $_SESSION["usuario_id"];
		$campo->requerido = "sim";
		$campo->chave = "nao";
		$campo->filtrar = "nao";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "oculto";
		$campo->con_exibir = "nao";
		$campo->rel_exibir	= "nao";
		$campo->rel_int_tamanho	= 30;
		$this->adicionar_campo($campo);
		//Campo id = 21
		$campo = new entidade_campo();
		$campo->nome = "privado";
		$campo->tipo = "integer";
		$campo->descricao = "Privativo";
		$campo->valor = "1";
		$campo->requerido = "sim";
		$campo->editar = "sim";
		$campo->filtrar = "sim";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "checkbox";
		$campo->cad_tamanho	= 40;
		$campo->rel_exibir	= "sim";
		$campo->rel_int_tamanho	= 20;
		$this->adicionar_campo($campo);
    //Campo id = 22
		$campo = new entidade_campo();
		$campo->nome = "agenda_compromisso_id";
		$campo->tipo = "integer";
		$campo->descricao = "Compromisso Original";
		$campo->valor = "0";
		$campo->requerido = "sim";
		$campo->chave = "nao";
		$campo->filtrar = "nao";
		$campo->consultar = "sim";
		$campo->cad_tipo_campo	= "oculto";
		$campo->con_exibir = "nao";
		$campo->rel_exibir	= "nao";
		$campo->rel_int_tamanho	= 30;
		$this->adicionar_campo($campo);

  }
	public function consultar($str_sql="",$sql_complementar="",$sql_apos_form=""){
		return parent::consultar($str_sql,$sql_complementar,$sql_apos_form);
	}

  private function definir_tempo($status=""){	  $obj = new agenda_hora();
		$obj->arr_filtro[0]["condicao"] = "Robson";
		$obj->arr_filtro[0]["nome"] = "id";
		$obj->arr_filtro[0]["tipo"] = "integer";
		$obj->arr_filtro[0]["operacao"] = "=";
		$obj->arr_filtro[0]["valor"] = $this->arr_campo[4]["valor"];
   	$matriz = $obj->consultar();
		if (!empty($matriz)){
			//Percore todos os registros da matriz
			foreach($matriz as $row){
				if ($row["hora_numero"] == 1){
			    $tipo_filtro = 1;
			  }else{
			  	$tipo_filtro = 0;
			  }
			}
	  }

		$obj->arr_filtro[0]["condicao"] = "Robson";
		$obj->arr_filtro[0]["nome"] = "id";
		$obj->arr_filtro[0]["tipo"] = "integer";
		$obj->arr_filtro[0]["operacao"] = "=";
		$obj->arr_filtro[0]["valor"] = $this->arr_campo[6]["valor"];
   	$matriz = $obj->consultar();
		if (!empty($matriz)){
			//Percore todos os registros da matriz
			foreach($matriz as $row){
				if ($row["hora_numero"] == 1){
			    $tipo_filtro_fim = 1;
			  }else{
			  	$tipo_filtro_fim = 0;
			  }
			}
	  }

		$obj->arr_filtro[0]["condicao"] = "Robson";
		$obj->arr_filtro[0]["nome"] = "id";
		$obj->arr_filtro[0]["tipo"] = "integer";
		$obj->arr_filtro[0]["operacao"] = ">=";
		$obj->arr_filtro[0]["valor"] = $this->arr_campo[4]["valor"];

		$obj->arr_filtro[1]["condicao"] = "and";
		$obj->arr_filtro[1]["nome"] = "id";
		$obj->arr_filtro[1]["tipo"] = "integer";
		$obj->arr_filtro[1]["operacao"] = "<=";
		$obj->arr_filtro[1]["valor"] = $this->arr_campo[6]["valor"];

   	$matriz = $obj->consultar();
   	$cont_reg = count($matriz);
   	$contar = 0;

		$objx = new agenda_hora_usada();
		if ($status = "editar"){
			$objx->arr_filtro[0]["condicao"] = "Robson";
			$objx->arr_filtro[0]["nome"] = "agenda_compromisso_id";
			$objx->arr_filtro[0]["tipo"] = "integer";
			$objx->arr_filtro[0]["operacao"] = "=";
			$objx->arr_filtro[0]["valor"] = $this->arr_campo[0]["valor"];
			$objx->excluir();
	  }
		//Se encontrar registro na matriz
		if (!empty($matriz)){
			//Percore todos os registros da matriz
			foreach($matriz as $row){
			  if ($contar < ($cont_reg - 1)){
				  //Define valor para o campo dia					$objx->arr_campo[1]["valor"] = $this->arr_campo[3]["valor"];
					//Define valor para o campo mês
					$objx->arr_campo[2]["valor"] = $this->arr_campo[2]["valor"];
	        //Define valor para o campo ano
					$objx->arr_campo[3]["valor"] = $this->arr_campo[1]["valor"];
					//Agenda hora ID agenda_hora_id
					$objx->arr_campo[4]["valor"] = $row["id"];
					//Agenda usuário sys_usuario_id
					$objx->arr_campo[5]["valor"] = $this->arr_campo[20]["valor"];
					//Agenda compromisso - grava a agenda compromisso_id
					$objx->arr_campo[6]["valor"] = $this->arr_campo[0]["valor"];
					//Define que a hora, dia, mês e ano estão agendados para o usuário
					$objx->inserir();
		    }
        if (($tipo_filtro == 1) && ($contar > 0)){
	  			if ($contar == ($cont_reg - 1)){
	          $this->arr_campo[8]["valor"] = $this->arr_campo[8]["valor"] + $row["hora_numero"];
					}else {
					  if ($row["hora_numero"] == 1){
	  			    //Define o tempo de duração do compromisso.
	            $this->arr_campo[8]["valor"] = $this->arr_campo[8]["valor"] + $row["hora_numero"];
	          }
	        }
	      }else if (($tipo_filtro == 0) && ($contar < ($cont_reg - 1))){
	  			if ($contar == ($cont_reg - 1)){
	          $this->arr_campo[8]["valor"] = $this->arr_campo[8]["valor"] + $row["hora_numero"];
					}else {
					  if (($row["hora_numero"] == 1) || (($contar == 0) && ($tipo_filtro_fim == 1))){
	  			    //Define o tempo de duração do compromisso.
	            $this->arr_campo[8]["valor"] = $this->arr_campo[8]["valor"] + $row["hora_numero"];
	          }
	        }
	      }
        $contar++;
			}
		}
  }

	public function editar($str_sql=""){		//Rererva a hora e determina o tempo de duração do compromisso
    $this->definir_tempo("editar");
		parent::editar($str_sql);
		return true;
	}
	public function inserir($str_sql=""){
		parent::inserir($str_sql);
		//Rererva a hora e determina o tempo de duração do compromisso
		//Executado após inserir porque nesse momento é que se tem o código do compromisso
		//Para assim conseguir fazer o relacionamento do compromisso com as horas reservadas
		$this->definir_tempo("inserir");
		//Executa o editar para atuzlizar o campo duração depois de ter inserido registro
		parent::editar($str_sql);
		return true;
	}

	public function excluir($str_sql=""){		$objx = new agenda_compromisso();
		$objx->arr_filtro[0]["condicao"] = "Robson";
		$objx->arr_filtro[0]["nome"] = "id";
		$objx->arr_filtro[0]["tipo"] = "integer";
		$objx->arr_filtro[0]["operacao"] = "=";
		$objx->arr_filtro[0]["valor"] = $_GET["valor"];
    $matriz = $objx->consultar();
		if (!empty($matriz)){
			//Percore todos os registros da matriz
			foreach($matriz as $row){
        $int_age_comp_id = $row["agenda_compromisso_id"];
			}
	  }
		$obj = new agenda_compromisso_participante();
		$obj->arr_filtro[0]["condicao"] = "Robson";
		$obj->arr_filtro[0]["nome"] = "agenda_compromisso_id";
		$obj->arr_filtro[0]["tipo"] = "integer";
		$obj->arr_filtro[0]["operacao"] = "=";
		$obj->arr_filtro[0]["valor"] = $int_age_comp_id;

		$obj->arr_filtro[1]["condicao"] = "and";
		$obj->arr_filtro[1]["nome"] = "sys_usuario_id";
		$obj->arr_filtro[1]["tipo"] = "integer";
		$obj->arr_filtro[1]["operacao"] = "=";
		$obj->arr_filtro[1]["valor"] = $_SESSION["usuario_id"];

    $obj->arr_campo[1]["valor"] = $int_age_comp_id;
    $obj->arr_campo[2]["valor"] = $_SESSION["usuario_id"];
		$matrizn = $obj->consultar();
		if (!empty($matrizn)){
			//Percore todos os registros da matriz
			foreach($matrizn as $rown){
        $obj->arr_campo[0]["valor"] = $rown["id"];
        $obj->arr_campo[3]["valor"] = 1;
    	  $obj->editar();
       //$int_age_comp_id = $row["agenda_compromisso_id"];
			}
	  }		parent::excluir($str_sql);
	}

}
?>