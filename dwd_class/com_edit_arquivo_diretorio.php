<?php class com_edit_arquivo_diretorio {

  public $bol_exibir_arquivo;
  public $str_diretorio_imagem;
  public $str_nome_div;
  private $str_montar_diretorio;
  public $str_nome_edit;
  public $str_tipo_arquivo;

  function com_edit_arquivo_diretorio(){

  }

	public function varre($dir,$filtro="",$nivel="",$str_diretorio=""){
    if ($this->bol_exibir_arquivo){
?>  <table width="500">
  		  <tr>
  		    <td>
  		      <strong>Escolha o arquivo para relacionar a informação </strong>
  				</td>
  				<td align="right">
  					<img onclick="conteudo_dinamico('','arq<?php echo $this->str_nome_div?>')" title="Sair tela de gerenciamento dos arquivos" src="<?php echo $this->str_diretorio_imagem?>bt_fechar.gif" align="middle" style="cursor: pointer">
  				</td>
  			</tr>
  		</table>
      <br>
<?php }
    $diraberto = opendir($dir);
    chdir($dir);
    $cont_diretorio = 0;
?>  <table>
<?php while($arq = readdir($diraberto)) {
        $cont_diretorio++;
  			if($arq == ".." || $arq == ".")continue;
        $arr_ext = explode(";wd;",$this->str_tipo_arquivo);
        $str_diretorio_comple = $str_diretorio."/".$dir;
        foreach($arr_ext as $ext) {
            $extpos = (strtolower(substr($arq,strlen($arq)-strlen($ext)))) == strtolower($ext);
            if ($extpos == strlen($arq) and is_file($arq)){
              if ($this->bol_exibir_arquivo){
  			      	$arquivo_temporario_novo = substr($str_diretorio_comple."/".$arq ,1); ?>
                <tr>
  							  <td>
  							    <span style="cursor:pointer; font-size:14px; line-height: 0.5; font-weight:bold; font-family: Verdana, Arial, Helvetica, sans-serif;" onclick="valor_dinamico('<?php echo $arquivo_temporario_novo?>','<?php echo $this->str_nome_edit?>'); conteudo_dinamico('','arq<?php echo $this->str_nome_div?>');" ">
  <?php         echo $nivel.$arq; ?>
  									</span>
                  </td>
  <?php           $ext = strtolower($ext);
                  if (($ext == ".png") || ($ext == ".gif") || ($ext == ".jpg") ||
  								   ($ext == ".jpeg") || ($ext == ".bmp")){ ?>
  	                <td>
                      <img title="Todas as imagens são exibidas em tamanho reduzido e fixo(Não é seu tamanho real) " src="<?php echo $arquivo_temporario_novo?>" width="32" height="32">
                    </td>
<?php             }else{
?>                 <td>Arquivo <strong><?php echo $ext?></strong></td>
<?php             }
      				}
            }
        }
      }
?>
    </table>
<?php chdir("..");
    closedir($diraberto);
  }
}
?>
