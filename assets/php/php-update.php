<?php require_once 'conn.php'; ?>

<?php 
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $senha = $_POST['senha'];
    $uf = $_POST['uf'];

    $query = "UPDATE usuarios SET email='$email', cidade='$cidade', senha='$senha', uf='$uf' WHERE id='$id'";
    $queryUpdateUser = mysqli_query($conn, $query) or die(mysqli_error($conn));


    if(mysqli_affected_rows($conn) != 0) {
            // Redireciona novamente para o index e alerta em JavaScript se deu certo
            echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/index.php'>
                    <script type='text/javascript'>
                        alert('Usuario alterado com Sucesso.');
                    </script>"; 
        // Caso de merda   
        }else{
            echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/index.php'>
                    <script type='text/javascript'>
                        alert('O Usuario não foi alterado com Sucesso.');
                    </script>";    
        }

mysqli_close($conn);

?>