<?php
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
				<h1> ROCK N´ROLL </h1>
				<h1> Amplificadores </h1>
			</div>
			<div id="menu_global"  class="menu_global">
				<p align="right"> 
					Olá, <?php include "valida_login.php"; ?> 
				</p>
				<?php include "menu_local.php"; ?>               
			</div>
		</div>

		<div id="conteudo_especifico">
			<h1> EXIBIÇÃO DE AMPLIFICADORES </h1>
			<?php		
				$conectar = mysqli_connect ("localhost", "root", "", "364975");
				$codigo_amp = $_GET["codigo"];
				$sql_pesquisa_amp = "SELECT marca_amp, modelo_amp, tipo_amp, preco_amp, foto_amp
									FROM amplificador
									WHERE cod_amp = '$codigo_amp'";

				$resultado_pesquisa_amp = mysqli_query ($conectar, $sql_pesquisa_amp);

				$registro_amp = mysqli_fetch_row($resultado_pesquisa_amp);
			?>
			<p> <img src="<?php echo $registro_amp[4]; ?>"> </p>
			<?php
				echo "<p> Marca: $registro_amp[0] </p>";
				echo "<p> Modelo: $registro_amp[1]</p>";						
				echo "<p> Tipo: $registro_amp[2] </p>";
				echo "<p> Preço: $registro_amp[3]</p>";
			?>
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