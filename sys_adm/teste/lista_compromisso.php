<html>

<head>
<title>Listagem de Compromissos</title>
<link rel='stylesheet' type='text/css' href='dwd.css'/>
</head>

<body>

<table class="dwd_table_geral">
	<tr>
		<td class="dwd_td_titulo"><h1>Listagem de Compromissos</h1></td>
	</tr>
	<tr>
		<td>
			<br />
			<table class="dwd_table">
				<tr class="dwd_tr_title">
					<td class="dwd_th_left" colspan="8">Aplicar Filtro:</td>
				</tr>
				<tr class="dwd_tr_impar">
					<td class="dwd_td_right">Campo:</td>
					<td>
						<select>
							<option selected>--Selecione--</option>
							<option>Código</option>
							<option>Dia</option>
							<option>Mês</option>
						</select>
					</td>
					<td class="dwd_td_right">Que:</td>
					<td>
						<select>
							<option selected>--Selecione--</option>
							<option>Igual a</option>
							<option>Diferente de</option>
							<option>Maior que</option>
						</select>
					</td>
					<td class="dwd_td_right">Valor:</td>
					<td>
						<input type="text"/>
					</td>
					<td class="dwd_td_right">Tipo:</td>
					<td>
						<select>
							<option selected>Simples</option>
							<option>E</option>
							<option>OU</option>
						</select>
					</td>
				</tr>
				<tr class="dwd_tr_par">
					<td class="dwd_th_left" colspan="8">
						<input type="button" class="dwd_button" value="Filtrar" name="Novo"/>
					</td>
				</tr>
			</table>
			<br /><br />
			<table>
				<tr>
					<td>
						<input type="button" class="dwd_button" value="Incluir" name="Novo" alt="Incluir um registro"/>
						<input type="button" class="dwd_button" value="Marcar" name="Novo"/>
						<input type="button" class="dwd_button" value="Desmarcar" name="Novo"/>
						<input type="button" class="dwd_button" value="Excluir" name="Novo"/>
						<input type="button" class="dwd_button" value="Imprimir" name="Novo"/>
					</td>
				</tr>
			</table>
			<br />
			<table class="dwd_table">
				<tr class="dwd_tr_title">
					<td class="dwd_th_left">Sel.</td>
					<td class="dwd_th_left">Código</td>
					<td class="dwd_th_left">Dia</td>
					<td class="dwd_th_left">Mês</td>
					<td class="dwd_th_left">Ano</td>
					<td class="dwd_th_left">Hora</td>
					<td class="dwd_th_left">Duração</td>
					<td class="dwd_th_left">Assunto</td>
					<td class="dwd_th_left">Prioridade</td>
					<td class="dwd_th_left">Atividade</td>
					<td class="dwd_th_left">Categoria</td>
					<td class="dwd_th_left">Status</td>
					<td class="dwd_th_center">Editar</td>
					<td class="dwd_th_center">Excluir</td>
				</tr>
				<tr class="dwd_tr_impar">
					<td class="dwd_td_center"><input type="checkbox" name="C1" value="ON"></td>
					<td class="dwd_td_left">1</td>
					<td class="dwd_td_left">01</td>
					<td class="dwd_td_left">01</td>
					<td class="dwd_td_left">2009</td>
					<td class="dwd_td_left">12:00</td>
					<td class="dwd_td_left">01:30</td>
					<td class="dwd_td_left">Reunião com diretoria</td>
					<td class="dwd_td_left">Alta</td>
					<td class="dwd_td_left">Reunião</td>
					<td class="dwd_td_left">Negócios</td>
					<td class="dwd_td_left">Aguardando</td>
					<td class="dwd_td_center" align="center"><a href="form_compromisso.php"><img src="img/grid_editar.gif"></a></td>
					<td class="dwd_td_center" align="center"><img src="img/grid_excluir.gif"></td>
				</tr>
				<tr class="dwd_tr_par">
					<td class="dwd_td_center"><input type="checkbox" name="C1" value="ON"></td>
					<td class="dwd_td_left">2</td>
					<td class="dwd_td_left">15</td>
					<td class="dwd_td_left">12</td>
					<td class="dwd_td_left">2008</td>
					<td class="dwd_td_left">08:00</td>
					<td class="dwd_td_left">04:00</td>
					<td class="dwd_td_left">Palestra sobre qq coisa</td>
					<td class="dwd_td_left">Baixa</td>
					<td class="dwd_td_left">Reunião</td>
					<td class="dwd_td_left">Negócios</td>
					<td class="dwd_td_left">Confirmado</td>
					<td class="dwd_td_center" align="center"><a href="form_compromisso.php"><img src="img/grid_editar.gif"></a></td>
					<td class="dwd_td_center" align="center"><img src="img/grid_excluir.gif"></td>
				</tr>
				<tr class="dwd_tr_impar">
					<td class="dwd_td_center"><input type="checkbox" name="C1" value="ON"></td>
					<td class="dwd_td_left">3</td>
					<td class="dwd_td_left">17</td>
					<td class="dwd_td_left">01</td>
					<td class="dwd_td_left">2009</td>
					<td class="dwd_td_left">14:30</td>
					<td class="dwd_td_left">00:45</td>
					<td class="dwd_td_left">Consulta médica</td>
					<td class="dwd_td_left">Normal</td>
					<td class="dwd_td_left">Consulta</td>
					<td class="dwd_td_left">Particular</td>
					<td class="dwd_td_left">Confirmada</td>
					<td class="dwd_td_center" align="center"><a href="form_compromisso.php"><img src="img/grid_editar.gif"></a></td>
					<td class="dwd_td_center" align="center"><img src="img/grid_excluir.gif"></td>
				</tr>
				<tr class="dwd_tr_par">
					<td class="dwd_td_center"><input type="checkbox" name="C1" value="ON"></td>
					<td class="dwd_td_left">4</td>
					<td class="dwd_td_left">07</td>
					<td class="dwd_td_left">02</td>
					<td class="dwd_td_left">2009</td>
					<td class="dwd_td_left">19:00</td>
					<td class="dwd_td_left">01:00</td>
					<td class="dwd_td_left">Casamento parente</td>
					<td class="dwd_td_left">Normal</td>
					<td class="dwd_td_left">Festa</td>
					<td class="dwd_td_left">Particular</td>
					<td class="dwd_td_left">Espera</td>
					<td class="dwd_td_center" align="center"><a href="form_compromisso.php"><img src="img/grid_editar.gif"></a></td>
					<td class="dwd_td_center" align="center"><img src="img/grid_excluir.gif"></td>
				</tr>
			</table>
			<br />
			<table width="100%">
				<tr>
					<td width="33%" align="right">Página(1):</td>
					<td width="34%" align="center">1</td>
					<td width="33%"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</body>

</html>