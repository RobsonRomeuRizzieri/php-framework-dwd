<?php
class db_conexao_mysql extends db_conexao{

  public function __construct(){
  	//Executa método da classe pai
    parent::__construct();
	}

  public function criar(){
    // echo $this->str_banco." ".$this->str_servidor." ".$this->str_usuario." ".$this->str_senha." novo";
    //Define como não tendo nenhum registro afetado pelo SQL
    $this->arr_dataset = 0;
    //Caso não consiga fazer a conexão com o banco mostra mensagem @ ignora mensagem de erro PHP
    if (!$this->obj_conexao = @mysql_Connect($this->str_servidor, $this->str_usuario, $this->str_senha))
    {
        //Exit para a exeução e mostra a mensagem caso tenha um erro.
        exit("<br>Servidor de banco de dados não esta rodando. Ou o usuário ou senha para o mesmo não estão certos.<br><br>");
    }
    //define o banco de dados definindo a conexao
    if (!@mysql_select_db($this->str_banco, $this->obj_conexao))
    {
        //Caso não encontre o banco de dados da a seguinte mensagem
        exit("<br>Não foi possivel conectar ao banco de dados $this->str_banco.<br><br></div>");
    }
	}

  public function fechar(){
	  //Fecha a conexão com o banco de dados MySQL
    mysql_close($this->obj_conexao);
	}

  public function sql_consultar($str_sql=""){	  if ($str_sql != ""){
	  	//define na propridade sql da entidade dataset
	  	$this->str_sql = $str_sql;
  	}
    //Executa metodo pai
    parent::sql_consultar($this->str_sql);
    //Se for definido para exibir o sql na tela
	  if ($this->bol_sql_exibir){
		  //Exibi o SQL na tela
			print $this->str_sql;
		}else{
			//Executa SQL definido na propriedade
		  $this->arr_dataset = mysql_query($this->str_sql, $this->obj_conexao);
	  	//Se contiver erro no SQL exibe mensagem
      $this->sql_erro();
		}
    //Se a matriz for diferente de vazia
		if ($this->total_registros() > 0){
			//percorre os valores retornados pelo SQL
      while ($row = mysql_fetch_assoc($this->arr_dataset)){
        //Atribui o valor do resultset para a matriz de forma associativa
        $matriz[] = $row;
      }
    }
    $this->sql_erro();
    //retorna a matriz associativa
    return $matriz;

	}

  public function sql_executar($str_sql=""){
    //Executa metodo pai
    parent::sql_executar($str_sql);
    //Se for definido para exibir o sql na tela
	  if ($this->bol_sql_exibir){
		  //Exibi o SQL na tela
			print $this->str_sql;
		}else{
		  //Executa o SQL e define quantos registros foram afetados
      $this->arr_dataset = mysql_query($this->str_sql);
  		//Se contiver erro no SQL exibe mensagem
      $this->sql_erro();
    }
	}

  public function sql_erro(){
    //Se não for verdadeiro o retorno do SQL
    if (!$this->arr_dataset){
    	//mostra o SQL que não conseguiu executar
      echo "Não foi possível executar a operação <strong>".$this->str_sql."</strong> no banco de dados: ".mysql_error();
      //Para a execução do sistema
      exit;
    }else{     // echo "Operação realizada com sucesso.";
    }

	}
  public function total_registros(){
    //Se for definido para exibir o sql na tela
	  if ($this->bol_sql_exibir){
	  	//retorna o valor vazio
	    return 0;
	  }else{
  	  //Retorna total de registros afetados pelo SQL
	    return mysql_num_rows($this->arr_dataset);
	  }
	}

  public function __destructor(){

	}
}
?>