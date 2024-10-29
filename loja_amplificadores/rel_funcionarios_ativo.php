<?php
	session_start();

	/*
		FUNCIONALIDADE:
		1° Conexão com o banco de dados.
		2° Pesquisar nome e função dos funcionarios ativos.
		3° Extrair os registros da pesquisa acima.
		4° Exibir os dados da extração acima em tabela HTML.
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
			<h1> RELATÓRIO DE FUNCIONÁRIOS ATIVOS</h1>
			<?php
				$conectar = mysqli_connect("localhost", "root", "", "364975");

				$sql_pesquisa = "SELECT
									nome_fun,
									funcao_fun
								FROM
									funcionario
								WHERE 
									status_fun = 'ativo'";
				$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);
			?>
			<table width="100%">	
				<tr height="50px">
					<td>
						Nome
					</td>
					<td>
						Função
					</td>
				</tr>
			<?php
				while ($registro = mysqli_fetch_row($resultado_pesquisa)) 
				{
			?>
					<tr height="50px">
						<td>
							<?php echo $registro[0]?>
						</td>
						<td>
							<?php echo $registro[1]?>
						</td>
					</tr>
			<?php
				}
			?>
			</table>
			<p> <a href="relatorios.php"> Voltar </a> </p>						
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