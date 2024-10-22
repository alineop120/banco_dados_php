<?php
	session_start();

	/*
		venda.php
		1° Conexão com o Bando de Dados
		2° Pesquisar marca, modelo, tipo, preço e código, onde o campo fila_compra_amp é igual a 'n'.
		Loop -----> {
			3° Extrair cada registro da pesquisa acima.
			4° Exibir cada registro extraído acima em tabela HTML
		} -----> Loop
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
			<h1> VENDAS </h1>							
			
			
			
			
			
			
			
			
			
			
			<p> <a href="ver_fila_compras.php"> Ver a fila de compras </a> </p>
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