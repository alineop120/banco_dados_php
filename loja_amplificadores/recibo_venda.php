<?php
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
			<?php
				$conectar = mysqli_connect('localhost', 'root', '', '364975');

				$data = date('d/m/y');
				$sql_registro_venda = "INSERT INTO venda (data_ven, funcionario_cod_fun)
										VALUES ('$data', '$cod_fun')";
				$resultado_resgistro_venda = mysqli_query ($conectar, $sql_registro_venda);

				$sql_consulta_ultima_venda = "SELECT cod_ven
											FROM venda
											ORDER BY cod_ven DESC LIMIT 1";
				$resultado_consulta = mysqli_query ($conectar, $sql_consulta_ultima_venda);

				$registro_cod_ven = mysqli_fetch_row($resultado_consulta);

				$sql_codigo_venda_em_amp = "UPDATE amplificador
											SET venda_cod_ven = '$resgistro_cod_ven[0]',
															fila_compra_amp = 'V'
														WHERE fila_compra_amp = 'S'";
				
				$resultado_alteracao_amp = mysqli_query($conectar, $sql_codigo_venda_em_amp);

				$sql_consulta_recibo = "SELECT marca_amp, modelo_amp, preco_amp
										FROM amplificador
										WHERE venda_cod_ven = '$registro_cod_ven[0]'";
				
				$resultado_consulta = mysqli_query($conectar, $sql_consulta_recibo);
				echo "<p> Venda n°: $registro_cod_ven[0] </p>";
				echo "<p> Data: $date </p>";
			?>
			<table width="100%">
				<tr>
					<td>
						<p> Marca </p>
					</td>
					<td>
						<p> Modelo </p>
					</td>
					<td>
						<p> Preço </p>
					</td>
				</tr>
				<?php
					$valor_total = 0;
					while ($registro = mysqli_fetch_row($resultado_consulta))
					{
				?>
						<tr>
							<td>
								<p>
									<?php echo "$registro[0]"; ?>
								</p>
							</td>
							<td>
								<p>
									<?php echo "$registro[1]"; ?>
								</p>
							</td>
							<td>
								<p>
									<?php 
										echo "$registro[2]"; 
										$valor_total = $valor_total + $registro[2];
									?>
								</p>
							</td>
						</tr>
				<?php
					}
				?>
			</table>
			<p> Total: <?php echo $valor_total; ?> </p>
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