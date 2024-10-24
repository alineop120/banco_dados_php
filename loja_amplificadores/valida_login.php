<?php
/*
    FUNCIONALIDADE:
        Segurança
*/
	if (isset($_SESSION["nome"])) {
    	// isset([variável]) - verifica se tem alguma coisa dentro da variável
    	echo "<span>" . $_SESSION["nome"] . "</span>";
	} 
	else {
    	echo "<script>
            	alert ('Você não está logado!!!');
        	</script>";

    	echo "<script>
            	location.href = ('index.php');
        	</script>";
	}
?>


