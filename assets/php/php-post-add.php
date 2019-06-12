<?php
session_start();
// Importa a conexão com o banco
require "conn.php";

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$telefone = $_POST['telefone'];
$emailcontato = $_POST['emailcontato'];
$cidade = $_POST['cidade'];
$categoria = $_POST['categoria'];
$id_user = $_POST['id_user'];
$preco = $_POST['preco'];

// Define arquivos permitidos
$arquivos_permitidos = ['jpg', 'jpeg', 'png'];

// Define diretorio de upload 
$pathToUp = "../anuncios/";

// Pega os arquivos do POST
$imagemcapa = $_FILES['imagemcapa'];
$imagens = $_FILES['imagens'];

// Pega os nomes dos arquivos
$nomeCapa = $imagemcapa['name'];
$nomes = $imagens['name'];

// Pegar extensão / Separa o arquivo
$extensao = explode('.', $nomeCapa);

// Pegar final do explode
$extensao = end($extensao);

// Mudar nome do arquivo para impedir repetição
$nome = date('d-m-y--H-m-s') . '-' . $nomeCapa;



if(in_array($extensao, $arquivos_permitidos)) {

// Verifica extensão
//if (in_array($extensao, $arquivos_permitidos)) {
    $queryPost = "INSERT INTO anuncios (titulo, descricao, preco, telefone, emailcontato, cidade, categoria, id_user, imagemcapa) VALUES ('$titulo', '$descricao', '$preco', '$telefone', '$emailcontato', '$cidade', '$categoria', '$id_user', '$nome')";
    // Injeta o comando com o banco de dados
    $result_query = mysqli_query($conn, $queryPost);
    // Pegar o ultimo ID Gerado
    $id_post = mysqli_insert_id($conn);



    // Verifica se deu certo
    if (mysqli_affected_rows($conn) > 0) {
        // Move a imagem para a pasta
        $move = move_uploaded_file($_FILES['imagemcapa']['tmp_name'], $pathToUp . $nome);
        // Cria uma mensagem de sucesso
        $_SESSION['sucesso'] = "Estamos quase lá";
        $_SESSION['titulo'] = $titulo;


        for ($i=0; $i < count($nomes); $i++) { 
            $extensaoImagens = explode('.', $nomes[$i]);
            $extensaoImagens = end($extensaoImagens);
            $nomes[$i] = date('d-m-y--H-m-s') . '-' . $nomes[$i];

            if (in_array($extensaoImagens, $arquivos_permitidos)) {
                $queryImagens = "INSERT INTO imagensanuncios VALUES (default, '$nomes[$i]', '$id_post')";
                $InserirImgDB = mysqli_query($conn, $queryImagens);
                // Move a imagem para a pasta
                $moves = move_uploaded_file($_FILES['imagens']['tmp_name'][$i], $pathToUp . $nomes[$i]);
                $destino = header("Location: ../../posts.php");
            } else {
                // Da uma mensagem de erro na sessão para devolver a pagina origem
                $_SESSION['erro'] = "Existem arquivos não permitidos que não foram upados";
                // Envia para outra página
                $destino = header("Location: ../../posts.php");
            }


        } 


} // Caso extensão esteja errada 
else {
    // Da uma mensagem de erro na sessão para devolver a pagina origem
    $_SESSION['erro'] = "Existem arquivos não permitidos que não foram upados";
    // Envia para outra página
    $destino = header("Location: exemplo.php");
}

}

mysqli_close($conn);

?>