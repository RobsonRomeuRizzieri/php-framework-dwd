function wd_exibir_conforme_valor(obj_campo,str_valor){
  arr = str_valor.split(';wd;');
	for (i = 0; i < arr.length; i++){
		arr_item = arr[i].split('//');
		if (obj_campo.value == arr_item[0]){
	    wd_definir_visibilidade(arr_item[1],true);
		}else if (obj_campo.value != arr_item[0]){
	    wd_definir_visibilidade(arr_item[1],false);
		}else{
	    alert('Deve ser definido tipo de pessoa');
		}
	}
}

function mascara(o,f){
		v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function soNumeros(v){
    return v.replace(/\D/g,"")
}

function telefone(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hífen entre o quarto e o quinto dígitos
    return v
}

function valida_cpf(cpf){
	var numeros, digitos, soma, i, resultado, digitos_iguais;
	digitos_iguais = 1;
	for (i = 0; i < cpf.value.length - 1; i++)
		if (cpf.value.charAt(i) != cpf.value.charAt(i + 1)){
		   digitos_iguais = 0;
		   break;
		}
	if (!digitos_iguais){
	  numeros = cpf.value.substring(0,9);
	  digitos = cpf.value.substring(9);
	  soma = 0;
	  for (i = 10; i > 1; i--)
	    soma += numeros.charAt(10 - i) * i;
	  resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	  if (resultado != digitos.charAt(0)){      alert('CPF inválido');
      cpf.focus();
      cpf.value = '';
	    return false;
	  }
	  numeros = cpf.value.substring(0,10);
	  soma = 0;
	  for (i = 11; i > 1; i--)
	    soma += numeros.charAt(11 - i) * i;
	  resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	  if (resultado != digitos.charAt(1)){
      alert('CPF inválido');
      cpf.focus();
      cpf.value = '';
	    return false;
	  }else{	    return true;
	  }
	}else{
    alert('CPF inválido');
    cpf.focus();
    cpf.value = '';
	  return false;
	}
}

function cpf(campo){	  v = campo.value;
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    campo.value = v;
}

function valida_cnpj( c ) {

  var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais, cnpj = c.value.replace(/\D+/g, '');
  digitos_iguais = 1;
  for (i = 0; i < cnpj.length - 1; i++)
	  if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
	    digitos_iguais = 0;
	    break;
	  }
   if (!digitos_iguais){
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
     for (i = tamanho; i >= 1; i--){
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
        pos = 9;
     }
     resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
     if (resultado != digitos.charAt(0)){
	    alert('CNPJ inválido');
	    c.focus();
   	  c.value = '';
	    return false;
     }
     tamanho = tamanho + 1;
     numeros = cnpj.substring(0,tamanho);
     soma = 0;
     pos = tamanho - 7;
     for (i = tamanho; i >= 1; i--)
           {
           soma += numeros.charAt(tamanho - i) * pos--;
           if (pos < 2)
                 pos = 9;
           }
     resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
     if (resultado != digitos.charAt(1)){
       alert('CNPJ inválido');
       c.focus();
       c.value = '';
       return false;
     }else{
       // alert('CNPJ  OK !');
       return true;
     }
   }else{
    alert('CNPJ inválido');
    c.focus();
	  c.value = '';
    return false;
   }
}

function cnpj(campo){	  v = campo.value;
		//Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
    //Coloca ponto entre o segundo e o terceiro dígitos
		v=v.replace(/^(\d{2})(\d)/,"$1.$2")
    //Coloca ponto entre o quinto e o sexto dígitos
		v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
    //Coloca uma barra entre o oitavo e o nono dígitos
		v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
    //Coloca um hífen depois do bloco de quatro dígitos
		v=v.replace(/(\d{4})(\d)/,"$1-$2")

		campo.value = v;
}

function remover_mascara_cpf_cnpj(campo){  campo.value = campo.value.replace(/(\.|\(|\)|\/|\-| )+/g,'');
}

function formatar_cnpj_cpf(campo){  if (campo.value.length == 11){  	valida_cpf(campo);    cpf(campo);
  }else if (campo.value.length == 14){    cnpj(campo);
    valida_cnpj(campo);
  }else if (campo.value.length != 0) {
    campo.focus();
    campo.value = '';    alert('Valor informado não é um CPF e nem um CNPJ.');
  }
}

function cep(v){
    v=v.replace(/\D/g,"")                //Remove tudo o que não é dígito
		//Coloca um ponto entre o segundo e terceiro digito
    v=v.replace(/(\d{2})(\d)/,"$1.$2")
		//Esse é tão fácil que não merece explicações
		v=v.replace(/(\d{3})(\d)/,"$1-$2")

		return v
}

function hora(v){
		//Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
		//Coloca os dois pontos entre o segundo e o terceiro dígitos
    v=v.replace(/^(\d{2})(\d)/,"$1:$2")

		return v
}

//Função para manipulação de campos tipo data
function formatar_data(campo){
    v = campo.value;
    //Remove tudo o que não é dígito
		v=v.replace(/\D/g,"")
    //Coloca a barra para separar o mes
		v=v.replace(/^(\d{2})(\d)/,"$1/$2")
		//Coloca a barra para separar o ano
    v=v.replace(/(\d{2})(\d)/,"$1/$2")

		campo.value = v;
}

//Função para verificar se a hora informada está correta
function verifica_hora(objCampo) {

  //Alimenta as variáveis com a hora informada
 	hrs = (objCampo.value.substring(0,2));
 	min = (objCampo.value.substring(3,5));
 	situacao = "";

 	//Se a hora informada é invávlida
 	if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
    //Seta a variável como falsa
		situacao = "falsa";
 	}

 	//Se a variável é falsa
	if (situacao == "falsa") {
    //Exibe o alerta de erro
		alert("A hora informada no campo Hora ("+ hrs + ":" + min + ") é inválida !");
    objCampo.focus();
 		return false;
 	} else {
	return true;
  }

}

function verifica_data(objCampo) {
  dia = (objCampo.value.substring(0,2));
  mes = (objCampo.value.substring(3,5));
  ano = (objCampo.value.substring(6,10));
  situacao = "";

  // verifica o dia valido para cada mes
  if ((dia < 1)||((dia < 1) || (dia > 30)) && ( ( mes == '04') ||( mes == '06') || (mes == '09') || (mes == 11) ) || (dia > 31)) {
    situacao = "falsa";
  }

  // verifica se o mes e valido
  if (mes < 1 || mes > 12 ) {
    situacao = "falsa";
  }

  // verifica se e ano bissexto
  if ((mes == 2) && ( (dia < 1) || (dia > 29) || ( (dia > 28) && (parseInt(ano / 4) != ano / 4)))) {
    situacao = "falsa";
  }

  if (objCampo.value == "") {
    situacao = "true";
  }

  if (situacao == "falsa") {
    objCampo.value = "";
    objCampo.focus();
    alert("A data informada ("+ objCampo.value +") é inválida !");
    return false;
  } else {
	return true;
  }
}
