<?php class db_auto_incremento extends db_dataset{

	private $str_campo;
	private $str_tabela;
	private $int_valor_atual;
	private $int_empresa;
	private $int_filial;
	public $int_valor_novo;

	public function __construct($int_empresa=0,$int_filial=0,$str_tabela="",$str_campo="",$str_banco_tipo="",$str_servidor="",$str_banco="",$str_usuario="",$str_senha="",$str_porta="",$bol_sql_exibir=false){
    $this->str_campo = $str_campo;
    $this->str_tabela = $str_tabela;
    $this->int_empresa = $int_empresa;
    $this->int_filial = $int_filial;
	  parent::__construct($str_banco_tipo,$str_servidor,$str_banco,$str_usuario,$str_senha,$str_porta,$bol_sql_exibir);

		$this->auto_incremento();
	}
  private function sql_chave_filtro(){
    if (($this->int_empresa > 0) && ($this->int_filial > 0)){
			$str_sql .= " AND DWD_EMPRESA_ID = ".strtoupper($this->int_empresa);
			$str_sql .= " AND DWD_FILIAL_ID = ".strtoupper($this->int_filial);
    }else if ($this->int_empresa > 0){
			$str_sql .= " AND DWD_EMPRESA_ID = ".strtoupper($this->int_empresa);
			$str_sql .= " AND DWD_FILIAL_ID = 0";
		}else if ($this->int_filial > 0){
      $str_sql .= " AND DWD_EMPRESA_ID = 0";
			$str_sql .= " AND DWD_FILIAL_ID = ".strtoupper($this->int_filial);
		}else{
      $str_sql .= " AND DWD_EMPRESA_ID = 0";
			$str_sql .= " AND DWD_FILIAL_ID = 0";
		}
    return $str_sql;
  }
  private function sql_chave(){
		//Define a string com os campos
		$str_sql = "SELECT DWD_EMPRESA_ID,DWD_FILIAL_ID,CAMPO,TABELA,VALOR FROM dwd_gerar_chave";
		$str_sql .= " WHERE TABELA = '".strtoupper($this->str_tabela)."'";
		$str_sql .= " AND CAMPO = '".strtoupper($this->str_campo)."'";
		$str_sql .= $this->sql_chave_filtro();
		return $str_sql;
  }

  private function auto_incremento(){

    $this->criar_tabela_chave();
    $this->campo_chave_existe();

   	$matriz = $this->consultar($this->sql_chave());
		//Se encontrar registro na matriz
		if (!empty($matriz)){
   	  foreach ($matriz as $row){
		    $this->int_valor_atual = $row["VALOR"];
   	  }
			$this->int_valor_novo = $this->int_valor_atual + 1;
    }
    $str_sql = "UPDATE dwd_gerar_chave SET VALOR = ".$this->int_valor_novo." WHERE TABELA = '".$this->str_tabela."'";
    $str_sql .= " AND CAMPO = '".$this->str_campo."' ";
    $str_sql .= $this->sql_chave_filtro();
    $this->editar($str_sql);
    //Retorna código como uma string
	}

	private function criar_tabela_chave(){
    if ($this->str_banco_tipo == "SQLServer"){
  		$this->str_sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'DWD_GERAR_CHAVE' AND TABLE_SCHEMA = '".$this->str_banco."'";
  	}else if ($this->str_banco_tipo == "MySQL"){
  		$this->str_sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'dwd_gerar_chave' AND TABLE_SCHEMA = '".$this->str_banco."'";
  	}else if ($this->str_banco_tipo == "Postgrees"){
  		$this->str_sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'DWD_GERAR_CHAVE' AND TABLE_SCHEMA = '".$this->str_banco."'";
		}
   	$matriz = $this->consultar($this->str_sql);

		//Se encontrar registro na matriz
		if (!empty($matriz)){

		//Se a tabela de geração do ID não existir
		}else{
      //Cria a tabela na base de dados
      $this->str_sql = "CREATE TABLE DWD_GERAR_CHAVE( CAMPO VARCHAR(60),TABELA VARCHAR(60),DWD_EMPRESA_ID INTEGER,DWD_FILIAL_ID INTEGER,VALOR INTEGER, PRIMARY KEY(CAMPO,TABELA))";

      $this->sql_executar($this->str_sql);
		}
	}

 	private function campo_chave_existe(){
   	$matriz = $this->consultar($this->sql_chave());
		//Se encontrar registro na matriz
		if (empty($matriz)){			$str_sql = "SELECT MAX(".strtoupper($this->str_campo).") AS MAXIMO FROM ".strtoupper($this->str_tabela);
			$int_and = 0;
			if (($this->int_empresa > 0) && ($this->int_filial > 0)){			  $str_sql .= " WHERE ";
				$str_sql .= " DWD_EMPRESA_ID = ".strtoupper($this->int_empresa);
				$str_sql .= " AND ";
				$str_sql .= " DWD_FILIAL_ID = ".strtoupper($this->int_filial);
			}
			if (($this->int_empresa > 0) && ($this->int_filial <= 0)){
			  $str_sql .= " WHERE ";
				$str_sql .= " DWD_EMPRESA_ID = ".strtoupper($this->int_empresa);
			}
			if (($this->int_filial > 0) && ($this->int_empresa <= 0)){
			  $str_sql .= " WHERE ";
				$str_sql .= " DWD_FILIAL_ID = ".strtoupper($this->int_filial);
			}
			$matriz_id_maximo = $this->consultar($str_sql);
      $str_sql = "INSERT INTO DWD_GERAR_CHAVE (DWD_EMPRESA_ID,DWD_FILIAL_ID,CAMPO,TABELA,VALOR) VALUES ";
      if (!empty($matriz_id_maximo)){
        foreach($matriz_id_maximo as $row){          if (empty($row['MAXIMO'])){
            $int_max = 0;
          }else{
            $int_max = $row["MAXIMO"];
          }
      	  $str_sql .= "(".$this->int_empresa.",".$this->int_filial.",'".$this->str_campo."','".$this->str_tabela."',".$int_max.")";
        }
	  	}else{
        $str_sql .= "(".$this->int_empresa.",".$this->int_filial.",'".$this->str_campo."','".$this->str_tabela."',0)";
      }
      $this->inserir($str_sql);
    }
	}
}
?>