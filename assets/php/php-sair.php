<?php
session_start();   
unset($_SESSION['email']);
unset($_SESSION['senha']);
    //redirecionar o usuario para a página de login
header("Location: ../../index.php");

session_destroy();
?>