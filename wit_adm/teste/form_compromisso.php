<html>

<head>
<title>Cadastro de Compromissos</title>
<link rel='stylesheet' type='text/css' href='dwd.css'/>
</head>

<body>
<!--<table>
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
<br />-->
<table class="dwd_table_geral">
	<tr>
		<td class="dwd_td_titulo"><h1>Inclusão/Alteração de Compromisso</h1></td>
	</tr>
	<tr>
		<td>
			<table class="dwd_table">
				<tr>
					<td class="dwd_td_right_2" width="20%">Dia:</td>
					<td class="dwd_td_left_2" width="80%"><input class="dwd_input_p" type="text"></td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Mês:</td>
					<td class="dwd_td_left_2" width="80%"><input class="dwd_input_p" type="text"></td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Ano:</td>
					<td class="dwd_td_left_2" width="80%"><input class="dwd_input_p" type="text"></td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Hora:</td>
					<td class="dwd_td_left_2" width="80%"><input class="dwd_input_m" type="text"></td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Duração:</td>
					<td class="dwd_td_left_2" width="80%"><input class="dwd_input_m" type="text"></td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Assunto:</td>
					<td class="dwd_td_left_2" width="80%"><input class="dwd_input_g" type="text"></td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Prioridade:</td>
					<td class="dwd_td_left_2" width="80%">
						<select>
							<option selected>--Selecione--</option>
							<option>Alta</option>
							<option>Média</option>
							<option>Baixa</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Atividade:</td>
					<td class="dwd_td_left_2" width="80%">
						<select>
							<option selected>--Selecione--</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Categoria:</td>
					<td class="dwd_td_left_2" width="80%">
						<select>
							<option selected>--Selecione--</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="dwd_td_right_2" width="20%">Status:</td>
					<td class="dwd_td_left_2" width="80%">
						<select>
							<option selected>--Selecione--</option>
						</select>
					</td>
				</tr>
				<tr class="dwd_tr_par">
					<td colspan="2">
						<input type="button" class="dwd_button" value="Gravar" name="Novo" alt="Incluir um registro"/>
						<input type="button" class="dwd_button" value="Cancelar" name="Novo"/>
						<input type="button" class="dwd_button" value="Incluir" name="Novo"/>
						<input type="button" class="dwd_button" value="Pesquisar" name="Novo"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>

</html>