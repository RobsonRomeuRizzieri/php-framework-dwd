<?php class com_edit_arquivo extends com_edit{

	private $str_botao_arquivo;
	public $str_arquivo;
	public $int_tamanho_tela;

	public function __construct($str_nome="",$str_entidade="",$bol_requerido=false){
	  parent::__construct($str_nome,$str_entidade,$bol_requerido);
    $this->int_maxlength = 150;
    $this->int_size = 60;
    $this->str_pasta_principal = "imagem";
    $this->str_tipo_arquivo = ".jpeg;wd;.JPEG;wd;.jpg;wd;.JPG;wd;.gif;wd;.GIF;wd;.swf;wd;.SWF;wd;.bmp;wd;.BMP;wd;.zip;wd;.ZIP";
	}

	public function criar(){
    parent::criar();
    $this->str_botao_arquivo = "<img title=\"Clique para fazer upload do arquivo\" src=\"".$_SESSION["raiz_dwd_imagem"]."bt_upload.gif\" align=\"middle\" style=\"cursor: pointer\" onclick=\"edit_arquivo_top_left(event,'arq".$this->str_nome."',".$this->int_size."); executar_exibir_img('com_arquivo_upload.php?str_nome=".$this->str_nome."&str_entidade=".$this->str_entidade."&str_tipo_arquivo=".$this->str_tipo_arquivo."&str_pasta_principal=".$this->str_pasta_principal."','arq".$this->str_nome."','GET','','',1,1,'../dwd_img')\">";

		$this->str_botao_arquivo .= "<img title=\"Pesquisa arquivo no servidor\" src=\"".$_SESSION["raiz_dwd_imagem"]."bt_arquivo.gif\" align=\"middle\" style=\"cursor: pointer\" onclick=\"edit_arquivo_top_left(event,'arq".$this->str_nome."',".$this->int_size."); executar_exibir_img('com_arquivo_localizar_servidor.php?str_nome=".$this->str_nome."&str_entidade=".$this->str_entidade."&str_tipo_arquivo=".$this->str_tipo_arquivo."&str_pasta_principal=".$this->str_pasta_principal."','arq".$this->str_nome."','GET','','',1,1,'../dwd_img')\">";

		$this->str_arquivo .= "<div style=\" 	position:absolute; background-color:#ffffff; color:#000000; \" id=\"arq".$this->str_nome."\">";
		$this->str_arquivo .= "</div>";

    $this->str_componente = "<table><tr><td width=\"60px\">".$this->str_componente."</td><td align=\"left\">";
		$this->str_componente .= $this->str_botao_arquivo."</td></tr><tr><td colspan=\"2\">";
		$this->str_componente .= "</td></tr></table>";
	}

}
?>
<div style="color:#000000">
</div>

