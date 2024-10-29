<?php
    /*
        FUNCIONALIDADE:
            1° Conexão com o Banco de dados
            2° Receber marca, modelo, preço, foto, tipo e código.
            3° Verificar se foi escolhida nova foto
                SE foi escolhida
                    * Capturar o nome junto com o caminho relativo (endereço do arquivo).
                    * Fazer o upload da imagem.
                SENÃO
                    * Pesquisar o caminho relativo já cadastrado no banco de dados em função do código recebido.
                    * Estrair e manter esse dados pesquisado acima.
            4° Efetuar a alteração
                SE alterou
                    * Mensagem de sucesso
                    * Vai para lista_amp.php
                SENÃO 
                    * Mensagem de erro
                    * Voltar para altera_amp.php
    */
    session_start();

    $conectar = mysqli_connect ("localhost", "root", "", "364975");

    $cod = $_POST["codigo"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"]; 
    $preco = $_POST["preco"]; 
    $tipo = $_POST["tipo"]; 
    $foto = $_FILES["foto"];

    if ($foto["name"] <> "") 
    {
		$foto_nome = "img/".$foto["name"];		
		move_uploaded_file($foto["tmp_name"], $foto_nome);
	}
	else 
    {
		$pesquisa_caminho_foto = "SELECT foto_amp
                                FROM amplificador
								WHERE cod_amp = '$cod'";
		$resultado_pesquisa = mysqli_query ($conectar, $pesquisa_caminho_foto);

		$registro = mysqli_fetch_row ($resultado_pesquisa);
		$foto_nome = $registro[0];
	}

    $sql_altera = "UPDATE amplificador
                    SET     marca_amp = '$marca',
                            modelo_amp = '$modelo',
                            preco_amp = '$preco',
                            tipo_amp = '$tipo',
                            foto_amp = '$foto_nome',
                    WHERE   cod_amp = '$cod'";
    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);

    if ($sql_resultado_alteracao == true) 
    {
        echo "<script>
                alert ('$modelo alterado com sucesso');
            </script>";
        echo "<script>
                location.href = ('lista_amp.php');
            </script>";
    }
    else {
        echo "<script> 
				alert ('Ocorreu um erro no servidor. 
						Dados do amplificador não foram alterados. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('lista_amp.php') 
			</script>";
    }
?>