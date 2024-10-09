<?php
    /*
        processa_altera_fun.php
        1° Conexão com o Banco de Dados.
        2° Receber código, nome, função, login, senha e status.
        3° Verificar se o login recebido já existe (pesquisar todos menos o do usuário em alteração)
        SE EXISTIR
            * Mensagem de Erro.
            * Vai para altera_fun.php
        SENÃO
            * Efetua a alteração
            SE ALTEROU
                * Mensagem de Sucesso
                * Vai para lista_fun.php
            SENÃO
                * Mensagem de Erro
                * Vai para altera_fun.php
    */
    session_start();

    $conectar = mysqli_connect('localhost', 'root', '', '364975');

    $cod = $_POST["codigo"]; 
	$funcao = $_POST["funcao"];

    if ($funcao == "administrador") {
        $senha = $_POST["senha"];
        $sql_altera = "UPDATE funcionario
                        SET senha_fun = '$senha'
                        WHERE cod_fun = '$cod'";
        $sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

        if ($sql_resultado_alteracao == true)
        {
            echo "<script>
                    alert ('Senha do administrador alterado com sucesso')
                </script>";
            echo "<script>
                    location.href = ('lista_fun.php')
                </script>";
        }
        else
        {
            echo "<script>
                    alert ('Ocorreu um erro no servidor. A senha do administrador não foi alterado.Volte e tente de novo')
                </script>";
        }
    }
    else {
        $nome = $_POST["nome"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $status = $_POST["status"];
        $funcao = $_POST["funcao"];

        $sql_pesquisa = "SELECT login_fun FROM funcionario
                        WHERE login_fun = '$login' AND cod_fun <> '$cod'";
        $sql_resultado = mysqli_query ($conectar, $sql_pesquisa);

        $linhas = mysqli_num_rows ($sql_resultado);
        if ($linhas == 1) 
        {
            echo "<script>
                    alert ('Login do funcionario já existe. Tente novamente.')
                </script>";
            echo "<script>
                    location.href = ('altera_fun.php?codigo=$cod')
                </script>";
        }
        else
        {
            $sql_altera = "UPDATE funcionario
                            SET nome_fun = '$nome', 
					            funcao_fun = '$funcao',
							    login_fun = '$login',
							    senha_fun = '$senha',
							status_fun = '$status'
                        WHERE cod_fun = '$cod'";
            $sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
            if ($sql_resultado_alteracao == true) 
            {
                echo "<script>
                        alert ('$nome alterado com sucesso')
                    </script>";
                echo "<script>
                        location.href = ('lista_fun.php')
                    </script>";
            }
            else
            {
                echo "<script>
                        alert ('Ocorreu um erro no servidor. Dados do funcionario não foram alterados. Tente de novo')
                    </script>";
                echo "<script>
                        location.href = ('altera_fun.php?codigo=<?php echo $cod; ?>')
                    </script>";
            }
        }
    }
?>