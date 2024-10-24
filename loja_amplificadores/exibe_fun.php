<?php
	session_start();

	/*
		FUNCIONALIDADE:
			1° - Conexâo com o Banco de Dados.
			2° - Receber o código do funcionário enviado via line.
			3° - Pesquisar nome, login, função e status em função do código recebido acima.
			4° - Extraír os dados da pesquisa acima.
			5° - exibir os dados extraídos em parágrafos em HTML.
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
					Olá, <?php include "valida_login.php";?> 
				</p>
				<?php include "menu_local.php";?>               
			</div>
		</div>

		<div id="conteudo_especifico">
			<h1> EXIBIÇÃO DE DADOS DE USUÁRIOS </h1>
			<?php
				$conectar = mysqli_connect('localhost', 'root', '', '364975');

				$cod = $_GET["codigo"];

				$sql_pesquisa = "SELECT nome_fun, login_fun, funcao_fun, status_fun 
								FROM funcionario
								WHERE cod_fun = '$cod'";
				$resultado_pesquisa = mysqli_query($conectar, $sql_pesquisa);

				$registro = mysqli_fetch_row($resultado_pesquisa);

				echo "<p> <b>Nome:</b> $registro[0] </p>";
				echo "<p> <b>Login:</b> $registro[1] </p>";
				echo "<p> <b>Função:</b> $registro[2] </p>";
				echo "<p> <b>Status:</b> $registro[3] </p>";
			?>
		</div>	

		<div id="rodape">
			<div id="texto_institucional">
				<div id="texto_institucional">
					<h6> ETB - Escola Técnica de Brasília </h6> 
					<h6> Curso - Técnico em Informática </h6> 
					<h6> Disciplina - Desenvolvimento Web II </h6> 
				</div> 
			</div>
		</div>

	</div>
</body>
</html>