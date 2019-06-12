<?php require_once 'conn.php'; ?>

<?php 
    
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $telefone = $_POST['telefone'];
    $emailcontato = $_POST['emailcontato'];
    $categoria = $_POST['categoria'];


    $queryPost = "UPDATE anuncios SET titulo='$titulo', descricao='$descricao', telefone='$telefone', emailcontato='$emailcontato', categoria='$categoria' WHERE id='$id'";
    $queryUpdatePost = mysqli_query($conn, $queryPost) or die(mysqli_error($conn));


    if(mysqli_affected_rows($conn) != 0) {
            // Redireciona novamente para o index e alerta em JavaScript se deu certo
            echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/index.php'>
                    <script type='text/javascript'>
                        alert('Anuncio alterado com Sucesso.');
                    </script>"; 
        // Caso de merda   
        }else{
            echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/index.php'>
                    <script type='text/javascript'>
                        alert('O Anuncio não foi alterado com Sucesso.');
                    </script>";    
        }

mysqli_close($conn);

?>