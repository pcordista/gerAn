<?php if((!isset ($_SESSION['nome']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	unset($_SESSION['nome']);
} else {
	$logado = $_SESSION['nome'];
} ?>