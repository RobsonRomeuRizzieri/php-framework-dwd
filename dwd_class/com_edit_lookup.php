<?php class com_edit_lookup extends com_edit{

  public $str_nome_temp;
  public $bol_proteger;
  public $str_evento_complemento;
	public $str_db_campo;
	public $str_db_campo_tipo;
	public $str_db_entidade;
	public $str_valor_descricao;
	public $str_arquivo_consulta;
	public $str_arquivo_cadastro;
  public $int_top;
  public $int_left;
  public $str_div_lookup;
  public $int_size_resultado;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){		$this->str_nome_temp = $str_nome;
	  parent::__construct($str_nome."chave",$str_entidade,$bol_requerido);
	  $this->int_size = 10;
	  $this->int_size_resultado = 40;
	}
	public function criar($bol_automatico=false){
    $obj = new com_edit_oculto($this->str_nome_temp,$this->str_entidade,$this->bol_campo_requerido);
    $obj->str_valor = $this->str_valor_chave;
		$obj->criar();
  	$this->str_com .= parent::criar(false);
   	$this->str_com .= "<input type=image src=\"../dwd_img/lookup_consulta.png\" name=\"sub\">";
    $this->str_componente = $this->str_com;
	  if	($bol_automatico){
	  	echo $this->str_componente;
	  }
    $obj = new com_edit($this->str_nome_temp."chave_resultado",$this->str_entidade,$this->bol_campo_requerido);
    $obj->str_valor = $this->str_valor_resultado;
    $obj->int_size = $this->int_size_resultado;
		$obj->criar(true);

	}
}
?>