<?php //Define Data conforme o banco selecionado
class data_definicao{
  private $dat_data;
  private $str_tipo_banco;

  //Se data menor retorna falso, se a data for maior ou igual retorna verdade
  public function verifica_data_maior($data_inicial,$data_final){
    $arr_data_inicial = explode("/",$data_inicial);
    $arr_data_final = explode("/",$data_final);
		//Aplica a validação das datas informadas
		$dia_inicial      = $arr_data_inicial[0];
		$dia_final        = $arr_data_final[0];
		$mes_inicial      = $arr_data_inicial[1];
		$mes_final        = $arr_data_final[1];
		$ano_inicial      = $arr_data_inicial[2];
		$ano_final        = $arr_data_final[2];

		if ($ano_inicial > $ano_final){
      return true;
		}else{
	    if ($ano_inicial == $ano_final){
				if ($mes_inicial > $mes_final){
		      return true;
				}else{
	   	    if ($mes_inicial == $mes_final){
	   	      if ($dia_inicial >= $dia_final){
              return true;
						}else{
							return false;
						}
					}else{
					  return false;
					}
	   	  }
	    }else{
		    return false;
		  }
		}
  }

	public function wd_definir($data,$str_tipo_banco){
	  $this->str_tipo_banco = $str_tipo_banco;
	  $this->dat_data = $data;
	  if ($this->str_tipo_banco == "MySQL"){
	    return $this->set_data_mysql();
	  }
		if ($this->str_tipo_banco == "Interbase"){
		  return $this->set_data_interbase();
		}
		if ($this->str_tipo_banco == "SQLServer"){
		  return $this->set_data_sqlserver();
		}
		if ($this->str_tipo_banco == "Postgrees"){
		  return $this->set_data_postgrees();
		}
  }

  public function wd_obter($data,$str_tipo_banco){
	  $this->str_tipo_banco = $str_tipo_banco;
	  $this->dat_data = $data;
	  if ($this->str_tipo_banco == "MySQL"){
	    return $this->get_data_mysql();
	  }
		if ($this->TipoBanco == "Interbase"){
		  return $this->get_data_inter_base();
		}
		if ($this->TipoBanco == "SQLServer"){
		  return $this->get_data_sqlserver();
		}
		if ($this->TipoBanco == "Postgrees"){
		  return $this->get_data_postgrees();
		}

	}

	//Defininir data MySQL
	private function set_data_mysql(){
	  $this->Data;
    $ANO = 0000;
    $MES = 00;
    $DIA = 00;
    $data_array = split("/",$this->dat_data);
    if (isset($this->dat_data)){
      $DIA = $data_array[0];
      $MES = $data_array[1];
      $ANO = $data_array[2];
      return $ANO."-".$MES."-".$DIA;
    }else{
      $ANO = 0000;
      $MES = 00;
      $DIA = 00;
      return $ANO."-".$MES."-".$DIA;
    }

	}

	private function get_data_mysql(){
    $ANO = 0000;
    $MES = 00;
    $DIA = 00;
    $data_array = split("-",$this->dat_data);
    if ($this->dat_data <> ""){
      $ANO = $data_array[0];
      $MES = $data_array[1];
      $DIA = $data_array[2];
      return $DIA."/".$MES."/".$ANO;
    }else {
      $ANO = 0000;
      $MES = 00;
      $DIA = 00;
      return $DIA."/".$MES."/".$ANO;
    }

	}

	//Defininir data MySQL
	private function set_data_interbase(){
	  $this->Data;
    $ANO = 0000;
    $MES = 00;
    $DIA = 00;
    $data_array = split("/",$this->dat_data);
    if (isset($this->dat_data)){
      $DIA = $data_array[0];
      $MES = $data_array[1];
      $ANO = $data_array[2];
      return $ANO."-".$MES."-".$DIA;
    }else{
      $ANO = 0000;
      $MES = 00;
      $DIA = 00;
      return $ANO."-".$MES."-".$DIA;
    }

	}
	private function get_data_interbase(){
    $ANO = 0000;
    $MES = 00;
    $DIA = 00;
    $data_array = split("-",$this->dat_data);
    if ($this->dat_data <> ""){
      $ANO = $data_array[0];
      $MES = $data_array[1];
      $DIA = $data_array[2];
      return $DIA."/".$MES."/".$ANO;
    }else {
      $ANO = 0000;
      $MES = 00;
      $DIA = 00;
      return $DIA."/".$MES."/".$ANO;
    }

	}

	private function set_data_sqlserver(){
	  $this->Data;
    $ANO = 0000;
    $MES = 00;
    $DIA = 00;
    $data_array = split("/",$this->dat_data);
    if (isset($this->dat_data)){
      $DIA = $data_array[0];
      $MES = $data_array[1];
      $ANO = $data_array[2];
      return $ANO."-".$MES."-".$DIA;
    }else{
      $ANO = 0000;
      $MES = 00;
      $DIA = 00;
      return $ANO."-".$MES."-".$DIA;
    }

	}

	private function get_data_sqlserver(){
    $ANO = 0000;
    $MES = 00;
    $DIA = 00;
    $data_array = split(" ",$this->dat_data);
    if ($this->dat_data <> ""){
      $DIA = $data_array[0];
      $MES = $data_array[1];
      $ANO = $data_array[2];
      if ($MES == "jan"){
        $MES = "01";
      }
      if ($MES == "fev"){
        $MES = "02";
      }
      if ($MES == "mar"){
        $MES = "03";
      }
      if ($MES == "abr"){
        $MES = "04";
      }
      if ($MES == "mai"){
        $MES = "05";
      }
      if ($MES == "jun"){
        $MES = "06";
      }
      if ($MES == "jul"){
        $MES = "07";
      }
      if ($MES == "ago"){
        $MES = "08";
      }
      if ($MES == "ago"){
        $MES = "08";
      }
      if ($MES == "set"){
        $MES = "09";
      }
      if ($MES == "out"){
        $MES = "10";
      }
      if ($MES == "nov"){
        $MES = "11";
      }
      if ($MES == "dez"){
        $MES = "12";
      }

			return $DIA."/".$MES."/".$ANO;
    }else {
      $ANO = 0000;
      $MES = 00;
      $DIA = 00;
      return $DIA."/".$MES."/".$ANO;
    }

	}

	//Defininir data Postgres
	private function set_data_postgrees(){
	  $this->Data;
    $ANO = 0000;
    $MES = 00;
    $DIA = 00;
    $data_array = split("/",$this->dat_data);
    if (isset($this->dat_data)){
      $DIA = $data_array[0];
      $MES = $data_array[1];
      $ANO = $data_array[2];
      return $ANO."-".$MES."-".$DIA;
    }else{
      $ANO = 0000;
      $MES = 00;
      $DIA = 00;
      return $ANO."-".$MES."-".$DIA;
    }

	}

	private function get_data_postgrees(){
    $ANO = 0000;
    $MES = 00;
    $DIA = 00;
    $data_array = split("-",$this->dat_data);
    if ($this->dat_data <> ""){
      $ANO = $data_array[0];
      $MES = $data_array[1];
      $DIA = $data_array[2];
      return $DIA."/".$MES."/".$ANO;
    }else {
      $ANO = 0000;
      $MES = 00;
      $DIA = 00;
      return $DIA."/".$MES."/".$ANO;
    }

	}



}
?>