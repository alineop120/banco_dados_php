<?php 
    /*
        FUNCIONALIDADE:
            1° Conexão com o Banco de Dados.
            2° Receber o código do produto enviado via like.
            3° Alterar o campo fila_compra.php de 'N' para 'S' em função do código recebido acima.
                SE alterou
                    * Mensagem de sucesso
                    * Vai para vendas.php
                SENÃO 
                    * Mensagem de erro
                    * Vai para vendas.php
    */

    $conectar = mysqli_connect('localhost', 'root', '', '364975');
    $cod = $_GET["codigo"];
    
    $sql_altera = "UPDATE amplificadore
                    SET fila_compra_amp.php = 'S'
                    WHERE cod_amp = '$cod'";
    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);

    if ($sql_resultado_alteracao == true) 
            {
                echo "<script>
                        alert ('Amplificador colocado na fila de compra com sucesso!')
                    </script>";
                echo "<script>
                        location.href = ('vendas.php')
                    </script>";
            }
            else
            {
                echo "<script>
                        alert ('Ocorreu um erro no servidor. Tente de novo')
                    </script>";
                echo "<script>
                        location.href = ('vendas.php')
                    </script>";
            }
?>