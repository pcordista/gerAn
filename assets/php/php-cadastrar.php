<?php
    // Importa a conexão com o banco
    require "conn.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $senha = $_POST['senha'];
    $uf = $_POST['uf'];

    $protegerSenha = sha1(md5($senha));

    // Cria comando SQL para injetar numa função
    // Seleciona na tabela o nome que for igual a variavel $nome
    $queryListUser = "SELECT * 
                        FROM usuarios
                        WHERE nome = '$nome'";
    // Injeta o comando no SQL pelo servidor 
    $impedirRepeticao = mysqli_query($conn, $queryListUser) or die(mysqli_error($conn));
    
    // Checa se teve resultado no $impedirRepeticao
    if(mysqli_num_rows($impedirRepeticao) == 0) {
        // Cria comando SQL para injetar dentro do servidor
        $queryCreateUser = "INSERT INTO 
                            usuarios(nome, email, cidade, senha, uf) 
                            VALUES ('$nome', '$email', '$cidade', '$protegerSenha', '$uf')";
        // Injeta o comando com o banco de dados
        $result_query = mysqli_query($conn, $queryCreateUser);

        // Verifica se alguma linha foi afetado no banco, se deu certo !?
        if(mysqli_affected_rows($conn) != 0) {
            // Redireciona novamente para o index e alerta em JavaScript se deu certo
            echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/index.php'>
                    <script type='text/javascript'>
                        alert('Usuario cadastrado com Sucesso.');
                    </script>"; 
        // Caso de merda   
        }else{
            echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/index.php'>
                    <script type='text/javascript'>
                        alert('O Usuario não foi cadastrado com Sucesso.');
                    </script>";    
        }
    // Se não teve resultado no $impedirRepetição
    } else {
        echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/cadastro.php'>
                    <script type='text/javascript'>
                        alert('Esse usuário já está cadastrado!');
                    </script>";    
    }

    mysqli_close($conn);
?>