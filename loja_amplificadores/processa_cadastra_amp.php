<?php
    /*
        processa_cadastra_amp.php
        1° Conexão com o Banco de Dados
        2° Receber os dados: marca, modelo, preço, tipo e dados do arquivo de imagem.
        3° Upload da imagem selecionada.
        4° Inserir os dados recebidos no Banco de Dados
            SE inseriu
                * Mensagem de sucesso
                * Vai para cadastra_amp.php
            SENÂO 
                * Mensagem de erro
                * Vai para cadastra_amp.php
    */

    $conectar = mysqli_connect("localhost", "root", "", "364975");

    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"]; 
    $preco = $_POST["preco"]; 
    $tipo = $_POST["tipo"]; 
    $foto = $_FILES["foto"];

    $foto_nome = "img/".$foto["name"];
    move_uploaded_file($foto["tmp_name"], $foto_nome);

    $sql_cadastrar = "INSERT INTO amplificador (marca_amp, modelo_amp, preco_amp, tipo_amp, foto_amp)
                    VALUES ('marca', 'modelo', 'preco', 'tipo', 'foto')";

    $sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);

    if ($sql_resultado_cadastrar == true) {
        echo "<script>
                    alert ('$modelo cadastrado realizado com sucesso')
                </script>";
            echo "<script>
                    location.href = ('cadastra_amp.php')
                </script>";
    } 
    else {
            echo "<script>
                    alert ('Ocorreu um erro no servidor ao cadastrar. Volte e tente de novo')
                </script>";
                echo "<script>
                location.href = ('cadastra_amp.php')
                    </script>";
        }
?>