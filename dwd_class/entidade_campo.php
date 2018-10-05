<?php

class entidade_campo{
		public $nome;
		public $tipo;
		public $descricao;
		public $valor;
		public $requerido;
		public $chave;
		public $filtrar;
		public $editar;
		public $inserir;
		public $consultar;
		public $entidade;
		public $entidade_campo_chave;
		public $entidade_apilidar;
		public $cad_tipo_campo;
		public $cad_tamanho;
		public $cad_tamanho_linhas;
		public $con_exibir;
		public $con_editar;
		public $con_exibir_lookup;
  	public $cad_converte_data;
  	public $cad_carrega_data;
  	public $cad_bol_checado;
    /*Propriedade usadas somente para lookup de texto*/
		public $valor_chave;
		public $valor_resultado;
		public $cad_tamanho_resultado;
    public $str_nome_chave;
    public $str_nome_resultado;

  	public $str_on_change;

		public $lookup_tabela;
		public $lookup_chave;
		public $lookup_chave_tipo;
		public $lookup_retorno;
		public $lookup_retorno_tipo;

    public $str_tipo_arquivo;
    public $str_pasta_principal;
    public $bol_left;
		public $arr_filtro;
		public $arr_item;

		public $rel_int_tamanho;
		public $rel_exibir;
}
?>