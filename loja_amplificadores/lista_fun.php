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
				<h1> FUNCIONÁRIOS </h1>
				<p align="right">
					<a href="cadastra_fun.php">
						Cadastro de funcionários
					</a>				
				</p>
				<?php
					$conectar = mysqli_connect('localhost', 'root', '', '364975');

					$sql_pesquisa = "select
										nome_fun,
										funcao_fun,
										status_fun,
										cod_fun
									from
										funcionario";
					$sql_resultado = mysqli_query($conectar, $sql_pesquisa);
				?>
				<table width="100%">
					<tr height="50px">
						<td>
							NOME
						</td>
						<td>
							FUNÇÃO
						</td>
						<td>
							STATUS
						</td>
						<td>
							AÇÃO
						</td>
					</tr>
					<?php
						while ($registro = mysqli_fetch_row($sql_resultado)) 
						{
					?>
							<tr height="50px">
								<td>
									<a href="exibe_fun.php?codigo=<?php echo $registro[3]?>">
										<?php echo $registro[0]; ?>
									</a>
								</td>
								<td>
									<?php echo $registro[1]; ?>
								</td>
								<td>
									<?php echo $registro[2]; ?>
								</td>
								<td>
									alterar
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