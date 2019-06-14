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
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

?>