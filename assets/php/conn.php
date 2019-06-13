<?php
$servidor = "localhost";
$login = "root";
$senha = "";
$db = "study";

    // Cria conexão
$conn = mysqli_connect($servidor, $login, $senha, $db);

    // Checa conexão 
if(!$conn) {
    die("Conexão falhou ". mysqli_connect_error());
} else {
        // Conectou com sucesso
}

$pathToUp = "../anuncios/";
$pathToAcess = "assets/anuncios/";

mysqli_set_charset($conn,"utf8");

?>