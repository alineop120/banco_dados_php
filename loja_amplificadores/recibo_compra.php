﻿<?php
	session_start();

	/*
		FUNCIONALIDADE:
			1° Conexão com o Bando de Dados
			2° Capturar a data do sistema e o código do usuário logado.
			3° Inserir nova venda.
			4° Pesquisar o código da venda inserida acima.
			5° Extrair o código da pesquisa acima.
			6° Alterar na tabela amplificador o campo fila_compra_amp para 'V' e vendas_cod_ver para o código extraído acima.
			7° Pesquisar marca, modelo, preço onde o campo vendas_cod_ver é igual ao código extraído acima.
			8° Extração dos dados acima.
			9° Exibição em tabela HTML.
	*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
</head>
<body>
    <div id="principal">
		<div id="topo">
			<div id="logo">
				<img src="img/rocker_output_dribbble.gif" alt="logo">
				<div class="titles"> <!-- Contêiner para os títulos -->
					<h1> ROCK N´ROLL </h1>
					<h1> Amplificadores </h1>
				</div>
			</div>
			
			<div id="menu_global"  class="menu_global">
				<p align="right"> 
					Olá, <?php include "valida_login.php"; ?> 
				</p>
				<?php include "menu_local.php"; ?>               
			</div>
		</div>
		
		<div id="conteudo_especifico">
			<h1> RECIBO </h1>
			
			
			
			
			
			
			
			
			<p> <a href="vendas.php"> Fechar recibo </a> </p>
		</div>

		<div id="rodape">
			<div id="texto_institucional">
				<div id="texto_institucional">
					<h6> AMPLI - CONTROL </h6> 
					<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
				</div> 
			</div>
		</div>

	</div>
</body>
</html>