<?php
/*
	VALIDA_LOGIN.PHP
		Segurança
*/
	if(isset($_SESSION["nome"])) {
	// isset([variável]) - verifica se tem alguma coisa dentro da variavel
		echo $_SESSION["nome"];
	} else {
		echo "<script>
				alert ('Você não está logado!!!');
			  </script>";
			  
		echo "<script>
				location.href = ('index.php');
			  </script>";
	}
?>

