-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Fev 26, 2009 as 09:16 PM
-- Versão do Servidor: 5.0.45
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `dwd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_atividade`
--

CREATE TABLE `agenda_atividade` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(60) default NULL,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_atividade`
--

INSERT INTO `agenda_atividade` (`ID`, `NOME`, `ATIVO`) VALUES
(1, 'Reunião', 1),
(2, 'Telefonar', 1),
(3, 'Tarefa', 1),
(4, 'Compromisso', 1),
(5, 'Aniversário', 1),
(6, 'Festa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_categoria`
--

CREATE TABLE `agenda_categoria` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(60) default NULL,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_categoria`
--

INSERT INTO `agenda_categoria` (`ID`, `NOME`, `ATIVO`) VALUES
(1, 'Nenhuma', 1),
(2, 'Negócio', 1),
(3, 'Pessoal', 1),
(4, 'Folga', 1),
(5, 'Empresa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_compromisso`
--

CREATE TABLE `agenda_compromisso` (
  `ID` int(11) NOT NULL,
  `SYS_USUARIO_ID` int(11) default NULL,
  `DIA` varchar(50) default NULL,
  `MES` varchar(50) default NULL,
  `ANO` varchar(50) default NULL,
  `AGENDA_HORA_INICIO_ID` int(11) NOT NULL,
  `DURACAO` decimal(10,2) NOT NULL,
  `ASSUNTO` varchar(255) default NULL,
  `LOCAL` varchar(255) default NULL,
  `DESCRICAO` varchar(800) default NULL,
  `AGENDA_ATIVIDADE_ID` int(11) default NULL,
  `AGENDA_PRIORIDADE_ID` int(11) default NULL,
  `AGENDA_CATEGORIA_ID` int(11) default NULL,
  `AGENDA_STATUS_ID` int(11) default NULL,
  `TIPO_AGENDAMENTO` int(11) default NULL,
  `DATA_FIM_AGENDAMENTO` date default NULL,
  `DIA_AGENDAMENTO` int(11) default NULL,
  `INTERVALO_DIA_AGENDAMENTO` int(11) default NULL,
  `APLICAR_AGENDAMENTO` int(11) default NULL,
  `AGENDA_COMPROMISSO_ID` int(11) default NULL,
  `APLICAR_ALTERACAO` int(11) default NULL,
  `AGENDA_HORA_FIM_ID` int(11) default NULL,
  `PRIVADO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_compromisso`
--

INSERT INTO `agenda_compromisso` (`ID`, `SYS_USUARIO_ID`, `DIA`, `MES`, `ANO`, `AGENDA_HORA_INICIO_ID`, `DURACAO`, `ASSUNTO`, `LOCAL`, `DESCRICAO`, `AGENDA_ATIVIDADE_ID`, `AGENDA_PRIORIDADE_ID`, `AGENDA_CATEGORIA_ID`, `AGENDA_STATUS_ID`, `TIPO_AGENDAMENTO`, `DATA_FIM_AGENDAMENTO`, `DIA_AGENDAMENTO`, `INTERVALO_DIA_AGENDAMENTO`, `APLICAR_AGENDAMENTO`, `AGENDA_COMPROMISSO_ID`, `APLICAR_ALTERACAO`, `AGENDA_HORA_FIM_ID`, `PRIVADO`) VALUES
(49, 9, '24', '2', '2009', 21, '5.00', 'novo exemplo', 'Blumenua', ' teste                         ', 0, 0, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, NULL, 26, 1),
(53, 1, '24', '2', '2009', 19, '1.50', 'exemplo', 'exemplo', ' novo ', 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 22, 1),
(55, 8, '24', '2', '2009', 19, '3.00', 'exemplo', 'exemplo', ' novo', 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 53, NULL, 22, 1),
(67, 6, '24', '2', '2009', 19, '1.50', 'exemplo', 'exemplo', ' novo', 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 53, NULL, 22, 1),
(68, 6, '25', '2', '2009', 5, '2.00', 'mais um', 'mais um', ' mais um exemplo', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 9, 1),
(69, 1, '25', '2', '2009', 5, '2.00', 'novo mais', 'novo mais', ' Exemplo novo', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_compromisso_participante`
--

CREATE TABLE `agenda_compromisso_participante` (
  `ID` int(11) NOT NULL,
  `AGENDA_COMPROMISSO_ID` int(11) default NULL,
  `SYS_USUARIO_ID` int(11) default NULL,
  `RECUSADO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_compromisso_participante`
--

INSERT INTO `agenda_compromisso_participante` (`ID`, `AGENDA_COMPROMISSO_ID`, `SYS_USUARIO_ID`, `RECUSADO`) VALUES
(80, 53, 6, 0),
(81, 53, 8, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_hora`
--

CREATE TABLE `agenda_hora` (
  `ID` int(11) NOT NULL,
  `HORA` time default NULL,
  `ATIVO` int(11) default NULL,
  `HORA_NUMERO` decimal(11,2) default NULL,
  `ORDEM` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_hora`
--

INSERT INTO `agenda_hora` (`ID`, `HORA`, `ATIVO`, `HORA_NUMERO`, `ORDEM`) VALUES
(1, '00:00:00', 1, '1.00', 1),
(2, '00:30:00', 1, '0.50', 2),
(3, '01:00:00', 1, '1.00', 3),
(4, '01:30:00', 1, '0.50', 4),
(5, '02:00:00', 1, '1.00', 5),
(6, '02:30:00', 1, '0.50', 6),
(7, '03:00:00', 1, '1.00', 7),
(8, '03:30:00', 1, '0.50', 8),
(9, '04:00:00', 1, '1.00', 9),
(10, '04:30:00', 1, '0.50', 10),
(11, '05:00:00', 1, '1.00', 11),
(12, '05:30:00', 1, '0.50', 12),
(13, '06:00:00', 1, '1.00', 13),
(14, '06:30:00', 1, '0.50', 14),
(15, '07:00:00', 1, '1.00', 15),
(16, '07:30:00', 1, '0.50', 16),
(17, '08:00:00', 1, '1.00', 17),
(18, '08:30:00', 1, '0.50', 18),
(19, '09:00:00', 1, '1.00', 19),
(20, '09:30:00', 1, '0.50', 20),
(21, '10:00:00', 1, '1.00', 21),
(22, '10:30:00', 1, '0.50', 22),
(23, '11:00:00', 1, '1.00', 23),
(24, '11:30:00', 1, '0.50', 24),
(25, '12:00:00', 1, '1.00', 25),
(26, '12:30:00', 1, '0.50', 26),
(27, '13:00:00', 1, '1.00', 27),
(28, '13:30:00', 1, '0.50', 28),
(29, '14:00:00', 1, '1.00', 29),
(30, '14:30:00', 1, '0.50', 30),
(31, '15:00:00', 1, '1.00', 31),
(32, '15:30:00', 1, '0.50', 32),
(33, '16:00:00', 1, '1.00', 33),
(34, '16:30:00', 1, '0.50', 34),
(35, '17:00:00', 1, '1.00', 35),
(36, '17:30:00', 1, '0.50', 36),
(37, '18:00:00', 1, '1.00', 37),
(38, '18:30:00', 1, '0.50', 38),
(39, '19:00:00', 1, '1.00', 39),
(40, '19:30:00', 1, '0.50', 40),
(41, '20:00:00', 1, '1.00', 41),
(42, '20:30:00', 1, '0.50', 42),
(43, '21:00:00', 1, '1.00', 43),
(44, '21:30:00', 1, '0.50', 44),
(45, '22:00:00', 1, '1.00', 45),
(46, '22:30:00', 1, '0.50', 46),
(47, '23:00:00', 1, '1.00', 47),
(48, '23:30:00', 1, '0.50', 48);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_hora_usada`
--

CREATE TABLE `agenda_hora_usada` (
  `ID` int(11) NOT NULL,
  `AGENDA_HORA_ID` int(11) default NULL,
  `DIA` int(11) default NULL,
  `MES` int(11) default NULL,
  `ANO` int(11) default NULL,
  `SYS_USUARIO_ID` int(11) default NULL,
  `AGENDA_COMPROMISSO_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_hora_usada`
--

INSERT INTO `agenda_hora_usada` (`ID`, `AGENDA_HORA_ID`, `DIA`, `MES`, `ANO`, `SYS_USUARIO_ID`, `AGENDA_COMPROMISSO_ID`) VALUES
(291, 19, 24, 2, 2009, 6, 54),
(292, 20, 24, 2, 2009, 6, 54),
(293, 21, 24, 2, 2009, 6, 54),
(294, 19, 24, 2, 2009, 8, 55),
(295, 20, 24, 2, 2009, 8, 55),
(296, 21, 24, 2, 2009, 8, 55),
(297, 23, 24, 2, 2009, 6, 56),
(298, 24, 24, 2, 2009, 6, 56),
(299, 25, 24, 2, 2009, 6, 56),
(300, 26, 24, 2, 2009, 6, 56),
(301, 16, 24, 2, 2009, 6, 57),
(302, 17, 24, 2, 2009, 6, 57),
(303, 19, 24, 2, 2009, 6, 58),
(304, 20, 24, 2, 2009, 6, 58),
(305, 21, 24, 2, 2009, 6, 58),
(306, 19, 24, 2, 2009, 6, 59),
(307, 20, 24, 2, 2009, 6, 59),
(308, 21, 24, 2, 2009, 6, 59),
(309, 19, 24, 2, 2009, 6, 60),
(310, 20, 24, 2, 2009, 6, 60),
(311, 21, 24, 2, 2009, 6, 60),
(312, 19, 24, 2, 2009, 6, 61),
(313, 20, 24, 2, 2009, 6, 61),
(314, 21, 24, 2, 2009, 6, 61),
(315, 19, 24, 2, 2009, 6, 62),
(316, 20, 24, 2, 2009, 6, 62),
(317, 21, 24, 2, 2009, 6, 62),
(318, 19, 24, 2, 2009, 6, 63),
(319, 20, 24, 2, 2009, 6, 63),
(320, 21, 24, 2, 2009, 6, 63),
(321, 19, 24, 2, 2009, 6, 64),
(322, 20, 24, 2, 2009, 6, 64),
(323, 21, 24, 2, 2009, 6, 64),
(324, 19, 24, 2, 2009, 6, 65),
(325, 20, 24, 2, 2009, 6, 65),
(326, 21, 24, 2, 2009, 6, 65),
(327, 19, 24, 2, 2009, 6, 66),
(328, 20, 24, 2, 2009, 6, 66),
(329, 21, 24, 2, 2009, 6, 66),
(330, 19, 24, 2, 2009, 6, 67),
(331, 20, 24, 2, 2009, 6, 67),
(332, 21, 24, 2, 2009, 6, 67),
(333, 19, 24, 2, 2009, 1, 53),
(334, 20, 24, 2, 2009, 1, 53),
(335, 21, 24, 2, 2009, 1, 53),
(336, 5, 25, 2, 2009, 6, 68),
(337, 6, 25, 2, 2009, 6, 68),
(338, 7, 25, 2, 2009, 6, 68),
(339, 8, 25, 2, 2009, 6, 68),
(340, 5, 25, 2, 2009, 1, 69),
(341, 6, 25, 2, 2009, 1, 69),
(342, 7, 25, 2, 2009, 1, 69),
(343, 8, 25, 2, 2009, 1, 69);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_prioridade`
--

CREATE TABLE `agenda_prioridade` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(60) default NULL,
  `ATIVO` int(11) default NULL,
  `IMAGEM` varchar(250) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_prioridade`
--

INSERT INTO `agenda_prioridade` (`ID`, `NOME`, `ATIVO`, `IMAGEM`) VALUES
(1, 'Alta', 1, NULL),
(2, 'Média', 1, NULL),
(3, 'Baixa', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_status`
--

CREATE TABLE `agenda_status` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) default NULL,
  `ATIVO` int(11) default NULL,
  `IMAGEM` varchar(250) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_status`
--

INSERT INTO `agenda_status` (`ID`, `NOME`, `ATIVO`, `IMAGEM`) VALUES
(1, 'Registrado', 1, NULL),
(2, 'Espera', 1, NULL),
(3, 'Iniciado', 1, NULL),
(4, 'Concluido', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dwd_gerar_chave`
--

CREATE TABLE `dwd_gerar_chave` (
  `CAMPO` varchar(60) NOT NULL default '',
  `TABELA` varchar(60) NOT NULL default '',
  `DWD_EMPRESA_ID` int(11) NOT NULL default '0',
  `DWD_FILIAL_ID` int(11) NOT NULL default '0',
  `VALOR` int(11) default NULL,
  PRIMARY KEY  (`CAMPO`,`TABELA`,`DWD_EMPRESA_ID`,`DWD_FILIAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dwd_gerar_chave`
--

INSERT INTO `dwd_gerar_chave` (`CAMPO`, `TABELA`, `DWD_EMPRESA_ID`, `DWD_FILIAL_ID`, `VALOR`) VALUES
('id', 'agenda_atividade', 0, 0, 6),
('id', 'agenda_categoria', 0, 0, 6),
('id', 'agenda_compromisso', 0, 0, 69),
('id', 'agenda_compromisso_participante', 0, 0, 81),
('id', 'agenda_hora', 0, 0, 48),
('id', 'agenda_hora_usada', 0, 0, 343),
('id', 'agenda_prioridade', 0, 0, 3),
('id', 'agenda_status', 0, 0, 4),
('id', 'dwd_tabela', 0, 0, 1),
('id', 'dwd_tabela_campo', 0, 0, 1),
('id', 'sys_empresa_filial', 0, 0, 6),
('id', 'sys_menu', 0, 0, 30),
('id', 'sys_menu_rapido', 0, 0, 6),
('ID', 'SYS_OBJETO_STATUS', 0, 0, 29),
('id', 'sys_tabela', 0, 0, 28),
('id', 'sys_tabela_acesso', 0, 0, 62),
('id', 'sys_tabela_campo', 0, 0, 135),
('id', 'sys_usuario', 0, 0, 9),
('id', 'sys_usuario_empresa', 0, 0, 3),
('id', 'sys_usuario_filial', 0, 0, 6),
('id', 'sys_usuario_grupo', 0, 0, 3),
('id', 'sys_usuario_sistema', 0, 0, 5),
('ID', 'TESTE', 0, 0, 120),
('ID', 'TESTE', 0, 1, 8),
('ID', 'TESTE', 1, 0, 8),
('ID', 'TESTE', 1, 1, 8),
('id', 'teste_filho', 0, 0, 30),
('sys_usuario_id', 'agenda_compromisso', 0, 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_empresa`
--

CREATE TABLE `sys_empresa` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) default NULL,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_empresa`
--

INSERT INTO `sys_empresa` (`ID`, `NOME`, `ATIVO`) VALUES
(1, 'Consysti', 1),
(2, 'teste', 1),
(3, 'teste 3', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_empresa_filial`
--

CREATE TABLE `sys_empresa_filial` (
  `ID` int(11) NOT NULL,
  `SYS_EMPRESA_ID` int(11) default NULL,
  `SYS_FILIAL_ID` int(11) default NULL,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_empresa_filial`
--

INSERT INTO `sys_empresa_filial` (`ID`, `SYS_EMPRESA_ID`, `SYS_FILIAL_ID`, `ATIVO`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 0),
(4, 1, 4, 1),
(5, 2, 1, 1),
(6, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_filial`
--

CREATE TABLE `sys_filial` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) default NULL,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_filial`
--

INSERT INTO `sys_filial` (`ID`, `NOME`, `ATIVO`) VALUES
(1, 'DWD', 1),
(2, 'exemplo ', 1),
(4, 'novo exemplo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_menu`
--

CREATE TABLE `sys_menu` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) default NULL,
  `ARQUIVO` varchar(250) default NULL,
  `ATIVO` int(11) default NULL,
  `SYS_MENU_ID` int(11) default NULL,
  `NOME_COMPLETO` varchar(250) default NULL,
  `SYS_TABELA_ID` int(11) default NULL,
  `USUARIO_CONTROLA` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_menu`
--

INSERT INTO `sys_menu` (`ID`, `NOME`, `ARQUIVO`, `ATIVO`, `SYS_MENU_ID`, `NOME_COMPLETO`, `SYS_TABELA_ID`, `USUARIO_CONTROLA`) VALUES
(1, 'Acesso Rápido', '', 1, 0, 'Acesso Rápido', 0, 0),
(2, 'Calendário', 'agenda/wd_calendario.php?a=1', 1, 1, 'Calendário', 5, 1),
(3, 'Agenda do Dia', 'agenda/wd_modulo_compromisso.php?a=1', 1, 1, 'Agenda do Dia', 5, 1),
(4, 'Trocar Senha', 'usuario/usuario_cadastro_senha.php?a=1&status=editar', 1, 1, 'Trocar Senha', 27, 1),
(5, 'Efetuar Logoff', 'usuario_logoff.php', 1, 1, 'Efetuar Logoff', 26, 1),
(6, 'Geral', '', 1, 0, 'Geral', 0, 0),
(7, 'Empresa', '', 1, 6, 'Empresa', 0, 0),
(8, 'Filial', '', 1, 6, 'Filial', 0, 0),
(9, 'Cadastro', '', 1, 7, 'Empresa Cadastro', 6, 1),
(10, 'Cadastro', 'empresa/empresa_consulta.php?a=1', 1, 8, 'Filial Cadastro', 8, 1),
(11, 'Usuário', '', 1, 0, 'Usuário', 0, 0),
(12, 'Cadastro', '', 1, 11, 'Usuário Cadastro', 0, 0),
(13, 'Gerenciamento', '', 1, 11, 'Usuário Gerenciamento', 0, 0),
(14, 'Grupo', 'usuario/usuario_grupo_consulta.php?a=1', 1, 12, 'Usuário Cadastro Grupo', 23, 1),
(15, 'Usuário', 'usuario/usuario_consulta.php?a=1', 1, 12, 'Usuário Cadastro Usuário', 20, 1),
(16, 'Controle Acesso', 'tabela/tabela_acesso_consulta.php?a=1', 1, 13, 'Usuário Gerenciamento Controle Acesso', 18, 1),
(17, 'Pessoa', '', 1, 0, 'Pessoa', 0, 0),
(18, 'Agenda', '', 1, 17, 'Pessoa Agenda', 0, 0),
(19, 'Categoria', 'agenda/agenda_categoria_consulta.php?a=1', 1, 18, 'Pessoa Agenda Categoria', 3, 1),
(20, 'Prioridade', 'agenda/agenda_prioridade_consulta.php?a=1', 1, 18, 'Pessoa Agenda Prioridade', 4, 1),
(21, 'Atividade', 'agenda/agenda_atividade_consulta.php?a=1', 1, 18, 'Pessoa Agenda Atividade', 1, 1),
(22, 'Status', 'agenda/agenda_status_consulta.php?a=1', 1, 18, 'Pessoa Agenda Status', 2, 1),
(23, 'Compromisso', 'agenda/agenda_compromisso_consulta.php?a=1', 1, 18, 'Pessoa Agenda Compromisso', 5, 1),
(24, 'Desenvolvedor', '', 1, 0, 'Desenvolvedor', 0, 0),
(25, 'SGDB', '', 1, 24, 'Desenvolvedor SGDB', 0, 0),
(26, 'Tabelas', 'tabela/tabela_consulta.php?a=1', 1, 25, 'Desenvolvedor SGDB Tabelas', 17, 0),
(27, 'Sistema', '', 1, 24, 'Desenvolvedor Sistema', 0, 0),
(28, 'Menus', 'menu/menu_consulta.php?a=1', 1, 27, 'Desenvolvedor Sistema Menus', 9, 0),
(29, 'Menu Rápido', 'menu/menu_rapido_consulta.php?a=1', 1, 13, 'Usuário Gerenciamento Menu Rápido', 25, 1),
(30, 'Hora', 'agenda/agenda_hora_consulta.php?a=1', 1, 18, 'Pessoa Agenda Hora', 28, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_menu_rapido`
--

CREATE TABLE `sys_menu_rapido` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) default NULL,
  `DESCRICAO_HINT` varchar(250) default NULL,
  `SYS_MENU_ID` int(11) default NULL,
  `ATIVO` int(11) default NULL,
  `IMAGEM` varchar(250) default NULL,
  `SYS_USUARIO_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_menu_rapido`
--

INSERT INTO `sys_menu_rapido` (`ID`, `NOME`, `DESCRICAO_HINT`, `SYS_MENU_ID`, `ATIVO`, `IMAGEM`, `SYS_USUARIO_ID`) VALUES
(1, 'Caledário', 'Acesso ao calendário', 2, 1, 'img/menu/calendar.png', 1),
(2, 'Agenda do Dia', 'Acesso aos compromissos do dia', 3, 1, 'img/menu/history.png', 1),
(3, 'Usuários', 'Definição de usuários', 15, 1, 'img/menu/Administracao.png', 1),
(4, 'Calendário', 'Mostra o calendário do mês', 2, 1, 'img/menu/calendar.png', 6),
(5, 'Efetuar Logoff', 'Permite sair do sistema', 5, 1, 'img/menu/link.png', 6),
(6, 'Trocar senha', 'Trocar a senha', 4, 1, 'img/menu/link.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_objeto`
--

CREATE TABLE `sys_objeto` (
  `ID` int(11) NOT NULL,
  `PESSOA_ID_FUNCIONARIO_AUTOR` int(11) default NULL,
  `TIPO_OBJETO` int(11) default NULL,
  `VISIBILIDADE` int(11) default NULL,
  `SYS_OBJETO_ID_HERDADO` int(11) default NULL,
  `DATA_CADASTRO` date default NULL,
  `DATA_INICIO` date default NULL,
  `DATA_FINAL` date default NULL,
  `NOME_CIENTIFICO` varchar(150) default NULL,
  `NOME` varchar(90) default NULL,
  `DESCRICAO` blob,
  `SYS_OBJETO_STATUS_ID` int(11) default NULL,
  `SYS_OBJETO_TIPO_CONTEUDO_ID` int(11) default NULL,
  `DOCUMENTACAO` blob,
  `DATA_ATUALIZACAO` date default NULL,
  `SYS_OBJETO_GRUPO_ID` int(11) NOT NULL,
  `SYS_OBJETO_SUB_GRUPO_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_objeto`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_objeto_grupo`
--

CREATE TABLE `sys_objeto_grupo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) default NULL,
  `ATIVO` int(11) default NULL,
  `DESCRICAO` varchar(250) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_objeto_grupo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_objeto_status`
--

CREATE TABLE `sys_objeto_status` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(60) default NULL,
  `DESCRICAO` blob,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_objeto_status`
--

INSERT INTO `sys_objeto_status` (`ID`, `NOME`, `DESCRICAO`, `ATIVO`) VALUES
(1, 'Planejado', 0x4573746120656d206661736520646520646573656e766f6c76696d656e746f206520646566696e69e7e36f, 1),
(2, 'Iníciado', 0x466f6920696eed636961646f206f20646573656e766f6c76696d656e746f20646f206f626a65746f2e, 1),
(3, 'Concluido', 0x44657465726d696e612071756520666f6920636f6e636c7569646f206f20646573656e766f6c76696d656e746f, 1),
(4, 'Removido', 0x44657465726d696e6120717565206f206f626a65746f20666f692072656d6f7669646f206d6173206d6174e96d206f2068697374f37269636f, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_objeto_sub_grupo`
--

CREATE TABLE `sys_objeto_sub_grupo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) default NULL,
  `ATIVO` int(11) default NULL,
  `DESCRICAO` varchar(250) default NULL,
  `SYS_OBJETO_GRUPO_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_objeto_sub_grupo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_objeto_tipo_conteudo`
--

CREATE TABLE `sys_objeto_tipo_conteudo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(60) default NULL,
  `DESCRICAO` blob,
  `ATIVO` int(11) default NULL,
  `TIPO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_objeto_tipo_conteudo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_sistema`
--

CREATE TABLE `sys_sistema` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) default NULL,
  `DIRETORIO_ARQUIVO` varchar(250) default NULL,
  `ATIVO` int(11) default NULL,
  `BANCO_DADOS` varchar(250) default NULL,
  `BANCO_USUARIO` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_sistema`
--

INSERT INTO `sys_sistema` (`ID`, `NOME`, `DIRETORIO_ARQUIVO`, `ATIVO`, `BANCO_DADOS`, `BANCO_USUARIO`) VALUES
(1, 'Extranet', 'extranet', 1, 'work_exemplo', NULL),
(2, 'Portal WEB', 'portal', 1, 'work_demonstracao', NULL),
(3, 'Portal ADM', '../sys_adm/index.php', 1, 'dwd', 'root'),
(4, 'Portal Exemplo', '../consysti_adm/extranet.php', 1, 'work_consysti', 'root');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_tabela`
--

CREATE TABLE `sys_tabela` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) default NULL,
  `ATIVO` int(11) default NULL,
  `NOME_CIENTIFICO` varchar(50) default NULL,
  `USUARIO_CONTROLA` int(11) default NULL,
  `TIPO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_tabela`
--

INSERT INTO `sys_tabela` (`ID`, `NOME`, `ATIVO`, `NOME_CIENTIFICO`, `USUARIO_CONTROLA`, `TIPO`) VALUES
(1, 'Agenda Atividade', 1, 'agenda_atividade', 1, 1),
(2, 'Agenda Status', 1, 'agenda_status', 1, 1),
(3, 'Agenda Categoria', 1, 'agenda_categoria', 1, 1),
(4, 'Agenda Prioridade', 1, 'agenda_prioridade', 1, 1),
(5, 'Agenda Compromisso', 1, 'agenda_compromisso', 1, 1),
(6, 'Empresa', 1, 'sys_empresa', 1, 1),
(7, 'Empresa Filial', 1, 'sys_empresa_filial', 1, 1),
(8, 'Filial', 1, 'sys_filial', 1, 1),
(9, 'Menu', 1, 'sys_menu', 0, 1),
(10, 'Objeto', 1, 'sys_objeto', 0, 1),
(11, 'Objeto Grupo', 1, 'sys_objeto_grupo', 0, 1),
(12, 'Objeto Status', 1, 'sys_objeto_status', 0, 1),
(13, 'Objeto Sub-Grupo', 1, 'sys_objeto_sub_grupo', 0, 1),
(14, 'Objeto Tipo Conteúdo', 1, 'sys_objeto_tipo_conteudo', 0, 1),
(15, 'Sistema', 1, 'sys_sistema', 0, 1),
(17, 'Tabela', 1, 'sys_tabela', 0, 1),
(18, 'Tabela Acesso', 1, 'sys_tabela_acesso', 1, 1),
(19, 'Tabela Campo', 1, 'sys_tabela_campo', 0, 1),
(20, 'Usuário', 1, 'sys_usuario', 1, 1),
(21, 'Usuário Empresa', 1, 'sys_usuario_empresa', 1, 1),
(22, 'Usuário Filial', 1, 'sys_usuario_filial', 1, 1),
(23, 'Usuário Grupo', 1, 'sys_usuario_grupo', 1, 1),
(24, 'Usuário Sistema', 1, 'sys_usuario_sistema', 1, 1),
(25, 'Menu Rápido', 1, 'sys_menu_rapido', 1, 1),
(26, 'Efetuar Logof', 1, 'efetuar_logof', 1, 2),
(27, 'Trocar Senha', 1, 'trocar_senha', 1, 2),
(28, 'Hora', 1, 'agenda_hora', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_tabela_acesso`
--

CREATE TABLE `sys_tabela_acesso` (
  `ID` int(11) NOT NULL,
  `SYS_USUARIO_GRUPO_ID` int(11) default NULL,
  `CONSULTA` int(11) default NULL,
  `EDITAR` int(11) default NULL,
  `EXCLUIR` int(11) default NULL,
  `NOVO` int(11) default NULL,
  `SYS_TABELA_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_tabela_acesso`
--

INSERT INTO `sys_tabela_acesso` (`ID`, `SYS_USUARIO_GRUPO_ID`, `CONSULTA`, `EDITAR`, `EXCLUIR`, `NOVO`, `SYS_TABELA_ID`) VALUES
(1, 1, 1, 1, 1, 1, 18),
(2, 1, 1, 1, 1, 1, 3),
(3, 1, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 4),
(5, 1, 1, 1, 1, 1, 2),
(6, 1, 1, 1, 1, 1, 5),
(7, 1, 1, 1, 1, 1, 20),
(8, 1, 1, 1, 1, 1, 21),
(9, 1, 1, 1, 1, 1, 22),
(10, 1, 1, 1, 1, 1, 24),
(11, 1, 1, 1, 1, 1, 23),
(12, 1, 1, 1, 1, 1, 8),
(13, 1, 1, 1, 1, 1, 6),
(14, 1, 1, 1, 1, 1, 7),
(15, 1, 1, 1, 1, 1, 17),
(16, 1, 1, 1, 1, 1, 19),
(17, 1, 1, 1, 1, 1, 9),
(18, 1, 1, 1, 1, 1, 25),
(23, 1, 1, 1, 1, 1, 26),
(24, 1, 1, 1, 1, 1, 27),
(25, 2, 1, 1, 1, 1, 1),
(26, 2, 1, 1, 1, 1, 2),
(27, 2, 1, 1, 1, 1, 3),
(28, 2, 1, 1, 1, 1, 4),
(29, 2, 1, 1, 1, 1, 5),
(30, 2, 1, 1, 1, 1, 6),
(31, 2, 1, 1, 1, 1, 7),
(32, 2, 1, 1, 1, 1, 8),
(33, 2, 1, 1, 1, 1, 18),
(34, 2, 0, 1, 1, 1, 20),
(35, 2, 1, 0, 1, 0, 21),
(36, 2, 1, 1, 1, 1, 22),
(37, 2, 1, 0, 1, 0, 23),
(38, 2, 1, 1, 0, 1, 24),
(39, 2, 1, 1, 1, 1, 25),
(40, 2, 1, 1, 1, 1, 26),
(41, 2, 1, 1, 1, 1, 27),
(42, 3, 0, 1, 1, 1, 1),
(43, 3, 1, 1, 1, 1, 2),
(44, 3, 1, 1, 1, 1, 3),
(45, 3, 0, 0, 0, 0, 4),
(46, 3, 1, 0, 0, 1, 5),
(47, 3, 0, 0, 0, 1, 6),
(48, 3, 1, 0, 1, 1, 7),
(49, 3, 1, 1, 1, 1, 8),
(50, 3, 0, 1, 1, 1, 18),
(51, 3, 0, 1, 1, 1, 20),
(52, 3, 1, 1, 1, 1, 21),
(53, 3, 1, 1, 1, 1, 22),
(54, 3, 1, 1, 1, 1, 23),
(55, 3, 1, 1, 1, 1, 24),
(56, 3, 1, 1, 1, 1, 25),
(57, 3, 1, 1, 1, 1, 26),
(58, 3, 1, 1, 1, 1, 27),
(59, 2, 1, 1, 1, 1, 9),
(60, 2, 1, 1, 1, 1, 17),
(61, 2, 1, 1, 1, 1, 19),
(62, 1, 1, 1, 1, 1, 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_tabela_campo`
--

CREATE TABLE `sys_tabela_campo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) default NULL,
  `SYS_TABELA_ID` int(11) default NULL,
  `ATIVO` int(11) default NULL,
  `NOME_CIENTIFICO` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_tabela_campo`
--

INSERT INTO `sys_tabela_campo` (`ID`, `NOME`, `SYS_TABELA_ID`, `ATIVO`, `NOME_CIENTIFICO`) VALUES
(1, 'código', 1, 1, 'ID'),
(2, 'Código', 2, 1, 'ID'),
(3, 'Nome', 2, 1, 'nome'),
(4, 'Nome', 1, 1, 'nome'),
(5, 'Ativo', 1, 1, 'ativo'),
(6, 'Ativo', 2, 1, 'ativo'),
(7, 'Código', 3, 1, 'id'),
(8, 'Nome', 3, 1, 'nome'),
(9, 'Ativo', 3, 1, 'ativo'),
(10, 'Código', 4, 1, 'id'),
(11, 'Nome', 4, 1, 'nome'),
(12, 'Ativo', 4, 1, 'ativo'),
(13, 'Código', 5, 1, 'id'),
(14, 'Código Usuário', 5, 1, 'sys_usuario_id'),
(15, 'Dia', 5, 1, 'dia'),
(16, 'Mês', 5, 1, 'mes'),
(17, 'Ano', 5, 1, 'ano'),
(18, 'Hora', 5, 1, 'hora'),
(19, 'Duração', 5, 1, 'duracao'),
(20, 'Assunto', 5, 1, 'assunto'),
(21, 'Local', 5, 1, 'local'),
(22, 'Descrição', 5, 1, 'descricao'),
(23, 'Código Atividade', 5, 1, 'agenda_atividade_id'),
(24, 'Código Prioridade', 5, 1, 'agenda_prioridade_id'),
(25, 'Código Categoria', 5, 1, 'agenda_categoria_id'),
(26, 'Código Status', 5, 1, 'agenda_status_id'),
(27, 'Código', 6, 1, 'id'),
(28, 'Nome', 6, 1, 'nome'),
(29, 'Ativo', 6, 1, 'ativo'),
(30, 'Código', 7, 1, 'id'),
(31, 'Código Empresa', 7, 1, 'sys_empresa_id'),
(32, 'Código Filial', 7, 1, 'sys_filial_id'),
(33, 'Ativo', 7, 1, 'ativo'),
(34, 'Código', 8, 1, 'id'),
(35, 'Nome', 8, 1, 'nome'),
(36, 'Ativo', 8, 1, 'ativo'),
(37, 'Código', 9, 1, 'id'),
(38, 'Nome', 9, 1, 'nome'),
(39, 'Arquivo', 9, 1, 'arquivo'),
(40, 'Ativo', 9, 1, 'ativo'),
(41, 'Código Menu', 9, 1, 'sys_menu_id'),
(42, 'Nome Completo', 9, 1, 'nome_completo'),
(43, 'Código Tabela', 9, 1, 'sys_tabela_id'),
(44, 'Código', 10, 1, 'id'),
(45, 'Autor', 10, 1, 'pessoa_id_funcionario_autor'),
(46, 'Tipo Objeto', 10, 1, 'tipo_objeto'),
(47, 'Visibilidade', 10, 1, 'visibilidade'),
(48, 'Objeto Herdado', 10, 1, 'sys_objeto_id_herdado'),
(49, 'Data Cadastro', 10, 1, 'data_cadastro'),
(50, 'Data Início', 10, 1, 'data_inicio'),
(51, 'Data Final', 10, 1, 'data_final'),
(52, 'Nome Cientifico', 10, 1, 'nome_cientifico'),
(53, 'Nome', 10, 1, 'nome'),
(54, 'Descrição', 10, 1, 'descricao'),
(55, 'Objeto Status', 10, 1, 'sys_objeto_status_id'),
(56, 'Objeto Tipo Conteúdo', 10, 1, 'sys_objeto_tipo_conteudo_id'),
(57, 'Documentação', 10, 1, 'documentacao'),
(58, 'Data Atualização', 10, 1, 'data_atualizacao'),
(59, 'Objeto Grupo', 10, 1, 'sys_objeto_grupo_id'),
(60, 'Objeto Sub-Grupo', 10, 1, 'sys_objeto_sub_grupo_id'),
(61, 'Código', 11, 1, 'id'),
(62, 'Nome', 11, 1, 'nome'),
(63, 'Ativo', 11, 1, 'ativo'),
(64, 'Descrição', 11, 1, 'descricao'),
(65, 'Código', 12, 1, 'id'),
(66, 'Nome', 12, 1, 'nome'),
(67, 'Descrição', 12, 1, 'descricao'),
(68, 'Ativo', 12, 1, 'ativo'),
(69, 'Código', 13, 1, 'id'),
(70, 'Nome', 13, 1, 'nome'),
(71, 'Ativo', 13, 1, 'ativo'),
(72, 'Descrição', 13, 1, 'descricao'),
(73, 'Objeto Grupo', 13, 1, 'sys_objeto_grupo_id'),
(74, 'Código', 14, 1, 'id'),
(75, 'Nome', 14, 1, 'nome'),
(76, 'Descrição', 14, 1, 'descricao'),
(77, 'Ativo', 14, 1, 'ativo'),
(78, 'Tipo', 14, 1, 'tipo'),
(79, 'Código', 15, 1, 'id'),
(80, 'Nome', 15, 1, 'nome'),
(81, 'Diretório Arquivo', 15, 1, 'diretorio_arquivo'),
(82, 'Ativo', 15, 1, 'ativo'),
(83, 'Banco Dados', 15, 1, 'banco_dados'),
(84, 'Banco Usuário', 15, 1, 'banco_usuario'),
(85, 'Código', 17, 1, 'id'),
(86, 'Nome', 17, 1, 'nome'),
(87, 'Ativo', 17, 1, 'ativo'),
(88, 'Nome Cientifico', 17, 1, 'nome_cientifico'),
(89, 'Controla Usuário', 17, 1, 'usuario_controla'),
(90, 'Código', 18, 1, 'id'),
(91, 'Código Grupo Usuário', 18, 1, 'sys_usuario_grupo_id'),
(92, 'Consultar', 18, 1, 'consulta'),
(93, 'Editar', 18, 1, 'editar'),
(94, 'Excluir', 18, 1, 'excluir'),
(95, 'Novo', 18, 1, 'novo'),
(96, 'Código Tabela', 18, 1, 'sys_tabela_id'),
(97, 'Código', 19, 1, 'id'),
(98, 'Nome', 19, 1, 'nome'),
(99, 'Código Tabela', 19, 1, 'sys_tabela_id'),
(100, 'Ativo', 19, 1, 'ativo'),
(101, 'Nome Cientifico', 19, 1, 'nome_cientifico'),
(102, 'Código', 20, 1, 'id'),
(103, 'Login', 20, 1, 'login'),
(104, 'Senha', 20, 1, 'senha'),
(105, 'Ativo', 20, 1, 'ativo'),
(106, 'Data Expiração', 20, 1, 'data_expiracao'),
(109, 'Código Usuário Grupo', 20, 1, 'sys_usuario_grupo_id'),
(110, 'Código', 21, 1, 'id'),
(111, 'Código usuário', 21, 1, 'sys_usuario_id'),
(112, 'Código Empresa', 21, 1, 'sys_empresa_id'),
(113, 'Data Expiração', 21, 1, 'data_expiracao'),
(114, 'Ativo', 21, 1, 'ativo'),
(115, 'Código', 22, 1, 'id'),
(116, 'Código Usuário Empresa', 22, 1, 'sys_usuario_empresa_id'),
(117, 'Código Filial', 22, 1, 'sys_filial_id'),
(118, 'Data Expiração', 22, 1, 'data_expiracao'),
(119, 'Ativo', 22, 1, 'ativo'),
(120, 'Código', 23, 1, 'id'),
(121, 'Nome', 23, 1, 'nome'),
(122, 'Ativo', 23, 1, 'ativo'),
(123, 'Usuário Controla', 23, 1, 'usuario_controla'),
(124, 'Código', 24, 1, 'id'),
(125, 'Código usuário', 24, 1, 'sys_usuario_id'),
(126, 'Código Sistema', 24, 1, 'sys_sistema_id'),
(127, 'Ativo', 24, 1, 'ativo'),
(128, 'Código', 25, 1, 'id'),
(129, 'Nome', 25, 1, 'nome'),
(130, 'Hint', 25, 1, 'descricao_hint'),
(131, 'Código Menu', 25, 1, 'sys_menu_id'),
(132, 'Ativo', 25, 1, 'ativo'),
(133, 'Código', 28, 1, 'id'),
(134, 'Hora', 28, 1, 'hora'),
(135, 'Ativo', 28, 1, 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_usuario`
--

CREATE TABLE `sys_usuario` (
  `ID` int(11) NOT NULL,
  `LOGIN` varchar(60) default NULL,
  `SENHA` varchar(200) default NULL,
  `ATIVO` int(11) default NULL,
  `DATA_EXPIRACAO` date default NULL,
  `SYS_USUARIO_GRUPO_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_usuario`
--

INSERT INTO `sys_usuario` (`ID`, `LOGIN`, `SENHA`, `ATIVO`, `DATA_EXPIRACAO`, `SYS_USUARIO_GRUPO_ID`) VALUES
(1, 'dwd', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00', 1),
(6, 'robson', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00', 1),
(8, 'juarez', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00', 1),
(9, 'jisele', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_usuario_empresa`
--

CREATE TABLE `sys_usuario_empresa` (
  `ID` int(11) NOT NULL,
  `SYS_USUARIO_ID` int(11) default NULL,
  `SYS_EMPRESA_ID` int(11) default NULL,
  `DATA_EXPIRACAO` date default NULL,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_usuario_empresa`
--

INSERT INTO `sys_usuario_empresa` (`ID`, `SYS_USUARIO_ID`, `SYS_EMPRESA_ID`, `DATA_EXPIRACAO`, `ATIVO`) VALUES
(1, 1, 1, '0000-00-00', 1),
(2, 1, 3, '0000-00-00', 1),
(3, 6, 1, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_usuario_filial`
--

CREATE TABLE `sys_usuario_filial` (
  `ID` int(11) NOT NULL,
  `SYS_USUARIO_EMPRESA_ID` int(11) default NULL,
  `SYS_FILIAL_ID` int(11) default NULL,
  `DATA_EXPIRACAO` date default NULL,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_usuario_filial`
--

INSERT INTO `sys_usuario_filial` (`ID`, `SYS_USUARIO_EMPRESA_ID`, `SYS_FILIAL_ID`, `DATA_EXPIRACAO`, `ATIVO`) VALUES
(1, 1, 1, '0000-00-00', 1),
(2, 1, 2, NULL, 1),
(3, 1, 3, NULL, 1),
(6, 3, 1, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_usuario_grupo`
--

CREATE TABLE `sys_usuario_grupo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(60) default NULL,
  `ATIVO` int(11) default NULL,
  `USUARIO_CONTROLA` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_usuario_grupo`
--

INSERT INTO `sys_usuario_grupo` (`ID`, `NOME`, `ATIVO`, `USUARIO_CONTROLA`) VALUES
(1, 'Desenvolvedores', 1, 0),
(2, 'Consultor', 1, 1),
(3, 'Convidados', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_usuario_sistema`
--

CREATE TABLE `sys_usuario_sistema` (
  `ID` int(11) NOT NULL,
  `SYS_USUARIO_ID` int(11) default NULL,
  `SYS_SISTEMA_ID` int(11) default NULL,
  `ATIVO` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sys_usuario_sistema`
--

INSERT INTO `sys_usuario_sistema` (`ID`, `SYS_USUARIO_ID`, `SYS_SISTEMA_ID`, `ATIVO`) VALUES
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 6, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) default NULL,
  `ATIVO` int(11) default NULL,
  `DATA_CADASTRO` date default NULL,
  `HORA_CADASTRO` time default NULL,
  `DWD_EMPRESA_ID` int(11) default NULL,
  `DWD_FILIAL_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`ID`, `NOME`, `ATIVO`, `DATA_CADASTRO`, `HORA_CADASTRO`, `DWD_EMPRESA_ID`, `DWD_FILIAL_ID`) VALUES
(29, 'Robson', NULL, '2080-10-05', NULL, NULL, NULL),
(31, 'Robson novo teste', 1, '2080-10-05', NULL, NULL, NULL),
(32, 'Robson 32 aplicar ', 1, '2080-10-26', NULL, NULL, NULL),
(35, 'Robson 35', 1, '2080-10-05', NULL, NULL, NULL),
(36, 'Robson', NULL, '2080-10-05', NULL, NULL, NULL),
(37, 'Robson', NULL, '2080-10-05', NULL, NULL, NULL),
(42, 'Jean ', NULL, '2080-10-05', NULL, NULL, NULL),
(43, 'Jean ', NULL, '2080-10-05', NULL, NULL, NULL),
(44, 'Jean ', NULL, '2080-10-05', NULL, NULL, NULL),
(45, 'Jean ', NULL, '2080-10-05', NULL, NULL, NULL),
(46, 'Jean ', NULL, '2080-10-05', NULL, NULL, NULL),
(47, 'Jean ', NULL, '2080-10-05', NULL, NULL, NULL),
(48, 'Jean ', NULL, '2080-10-05', NULL, NULL, NULL),
(49, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(50, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(51, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(52, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(53, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(54, 'Juarez teste novo', NULL, '2012-01-20', NULL, NULL, NULL),
(55, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(56, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(57, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(58, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(59, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(60, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(61, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(62, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(63, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(64, 'Juarez', NULL, '2080-10-05', NULL, NULL, NULL),
(65, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(66, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(67, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(68, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(69, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(70, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(71, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(72, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(73, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(74, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(75, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(76, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(77, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(78, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(79, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(80, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(81, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(82, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(83, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(84, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(85, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(86, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(87, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(88, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(89, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(90, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(91, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(92, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(93, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(94, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(95, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(96, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(97, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(98, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(99, 'Jisele', NULL, '2080-10-05', NULL, NULL, NULL),
(100, 'Exemplo', NULL, '2009-01-06', NULL, NULL, NULL),
(101, 'exemplo dois', NULL, '2009-01-06', NULL, NULL, NULL),
(102, 'gravar', NULL, '2009-01-06', NULL, NULL, NULL),
(103, 'mais um reg', NULL, '2009-01-06', NULL, NULL, NULL),
(104, 'Gavar novo robson', NULL, '2009-01-06', NULL, NULL, NULL),
(105, 'teste novo', NULL, '2009-01-06', NULL, NULL, NULL),
(106, 'mais um novo', NULL, '2009-01-06', NULL, NULL, NULL),
(107, 'fdfdf', NULL, '2009-01-06', NULL, NULL, NULL),
(108, 'sadfsdfsdf', NULL, '2009-01-06', NULL, NULL, NULL),
(109, 'adasdasd', NULL, '2009-01-06', NULL, NULL, NULL),
(110, 'novo valor com editar na consulta', NULL, '2009-01-06', NULL, NULL, NULL),
(111, 'dsafsdf', NULL, '2009-01-06', NULL, NULL, NULL),
(112, 'teste', NULL, '2009-01-06', NULL, NULL, NULL),
(113, 'treste', NULL, '2009-01-06', NULL, NULL, NULL),
(114, 'exemplo', NULL, '2009-01-06', NULL, NULL, NULL),
(115, 'exemplo sd', NULL, '2009-01-06', NULL, NULL, NULL),
(116, 'alterar a gravar', NULL, '2009-01-06', NULL, NULL, NULL),
(117, 'TEste arquivo entidade var', NULL, '2009-01-07', NULL, NULL, NULL),
(118, 'teste aplicar', NULL, '2009-01-07', NULL, NULL, NULL),
(120, 'exemplo filtro', NULL, '2009-01-07', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_filho`
--

CREATE TABLE `teste_filho` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) default NULL,
  `TESTE_ID` int(11) NOT NULL,
  `ATIVO` int(11) default NULL,
  `DATA_CADASTRO` date default NULL,
  `HORA_CADASTRO` time default NULL,
  PRIMARY KEY  (`ID`),
  KEY `FK_TESTE` (`TESTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste_filho`
--

INSERT INTO `teste_filho` (`ID`, `NOME`, `TESTE_ID`, `ATIVO`, `DATA_CADASTRO`, `HORA_CADASTRO`) VALUES
(1, 'teste filho 1', 35, 1, NULL, NULL),
(2, 'teste filho 2', 35, 0, NULL, NULL),
(3, 'Teste filho 3 ap mais', 32, 1, '2009-01-07', NULL),
(8, 'aplicar teste', 32, NULL, '2009-01-07', NULL),
(10, 'gravar no', 32, NULL, '2009-01-07', NULL),
(11, 'registrar', 32, NULL, '2009-01-07', NULL),
(12, 'mais um ', 32, NULL, '2009-01-07', NULL),
(13, 'grande novo', 32, NULL, '2009-01-07', NULL),
(14, 'Gravar registro', 36, NULL, '2009-01-07', NULL),
(16, 'gravar', 37, NULL, '2009-01-07', NULL),
(17, 'exemplo', 37, NULL, '2009-01-07', NULL),
(18, 'gravar', 29, NULL, '2009-01-07', NULL),
(23, 'jisele', 32, NULL, '2009-01-07', NULL),
(24, 'jisele 2', 32, NULL, '2009-01-07', NULL),
(25, 'jisele 3', 32, NULL, '2009-01-07', NULL),
(30, 'mais um grave', 29, NULL, '2009-01-07', NULL);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `teste_filho`
--
ALTER TABLE `teste_filho`
  ADD CONSTRAINT `FK_TESTE` FOREIGN KEY (`TESTE_ID`) REFERENCES `teste` (`ID`);
