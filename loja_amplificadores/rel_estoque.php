﻿<?php
	session_start();
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
			<h1> RELATÓRIO DE ESTOQUE </h1>
			<?php
				$conectar = mysqli_connect ("localhost", "root", "", "364975");			

				$sql_consulta = "SELECT cod_amp, marca_amp,	modelo_amp, tipo_amp, preco_amp 
								FROM amplificador
								WHERE status_fun != 'V'";
				$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
			?>
			<table width="100%">
				<tr>
					<th>
						<p> Marca </p>
					</th>

					<th>
						<p> Modelo </p>
					</th>
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

				</tr>
				<?php
					}
				?>
			</table>
			<p> <a href="relatorios.php"> Voltar </a> </p>		





					
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