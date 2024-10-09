<?php
	session_start();

	/*
		lista_fun.php
		1° - Conexão com o Banco de Dados.
		2° - Pesquisam nome, função, status e código dos funcionarios.
		3° - Extrair os dados da pesquisa acima.
		4° - Exibir os dados extraídos acima em tabela HTML.

		=> Para exibir dados
			* Pesquisa o que você quer mostrar.
			* Extrair os dados pesquisados acima.
			* Exibir o(s) dados(s) extraídos acima em HTML.
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
				<p align="right"> Olá <?php include "valida_login.php";?> </p>
				<?php include "menu_local.php"; ?>               
			</div>
		</div>

		<div id="conteudo_especifico">
			<h1> FUNCIONÁRIOS </h1>
			<?php
				$conectar = mysqli_connect ("localhost", "root", "", "364975");			

				$sql_consulta = "SELECT cod_fun, nome_fun, funcao_fun, status_fun 
								FROM funcionario";
				$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
			?>
			<p align="right"> <a href="cadastra_fun.php"> Cadastrar funcionário </a> </p>
			<table width="100%">
				<tr>
					<td>
						<p> Nome </p>
					</td>

					<td>
						<p> Função </p>
					</td>

					<td>
						<p> Status </p>
					</td>

					<td>
						<p> Ação </p>
					</td>
				</tr>
				<?php		
					while ($registro = mysqli_fetch_row($resultado_consulta)) 
					{											
				?>						
				<tr>
					<td>
						<p>
							<a href="exibe_fun.php?codigo=<?php echo $registro[0]?>"> 
								<?php 
									echo "$registro[1]";
								?>
							</a>
						</p>
					</td>

					<td>
						<p>									 
							<?php echo "$registro[2]"; ?>
						</p>
					</td>

					<td>
						<p>									 
							<?php 
								echo "$registro[3]";
							?>
						</p>
					</td>

					<td>
						<p>
							<a href="altera_fun.php?codigo=<?php echo $registro[0]?>">
								Alterar	
							</a>
						</p>
					</td>
				</tr>
				<?php
					}
				?>
			</table>		
		</div>

		<div id="rodape">
			<div id="texto_institucional">
				<div id="texto_institucional">
					<h6> AMPLI - CONTROL </h6> 
					<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
				</div> 
			</div>
		</div>

</body>
</html>