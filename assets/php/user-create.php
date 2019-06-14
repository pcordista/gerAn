<?php
    // Importa a conexão com o banco
    require "conn.php";

    print_r($_POST);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $nivel_acesso = 0;
    $data_cadastro = date("d-m-Y  H:m:s");

    echo $data_cadastro;

    $protegerSenha = sha1(md5($senha));

    // Cria comando SQL para injetar numa função
    // Seleciona na tabela o nome que for igual a variavel $nome
    $queryListUser = "SELECT * 
                        FROM usuarios
                        WHERE cpf = '$cpf'";
    // Injeta o comando no SQL pelo servidor 
    $impedirRepeticao = mysqli_query($conn, $queryListUser) or die(mysqli_error($conn));
    
    // Checa se teve resultado no $impedirRepeticao
    if(mysqli_num_rows($impedirRepeticao) == 0) {
        // Cria comando SQL para injetar dentro do servidor
        $queryCreateUser = "INSERT 
                            INTO 
                                usuarios(
                                nome, 
                                email, 
                                cpf, 
                                celular, 
                                telefone, 
                                senha, 
                                endereco, 
                                numero, 
                                cidade,
                                estado, 
                                nivel_acesso, 
                                data_cadastro) 
                            VALUES (
                            '$nome', 
                            '$email', 
                            '$cpf', 
                            '$celular',
                            '$telefone',
                            '$protegerSenha',
                            '$endereco',
                            '$numero', 
                            '$cidade', 
                            '$estado',
                            '$nivel_acesso', 
                            '$data_cadastro')";
        // Injeta o comando com o banco de dados
        $result_query = mysqli_query($conn, $queryCreateUser);

        // Verifica se alguma linha foi afetado no banco, se deu certo !?
        if(mysqli_affected_rows($conn) != 0) {
            // Redireciona novamente para o index e alerta em JavaScript se deu certo
            echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../login.php'>
                    <script type='text/javascript'>
                        alert('Usuario cadastrado com Sucesso.');
                    </script>"; 
        // Caso de merda   
        }else{
            echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../cadastro_bomnegocio.php'>
                    <script type='text/javascript'>
                        alert('O Usuario não foi cadastrado com Sucesso.');
                    </script>";    
        }
    // Se não teve resultado no $impedirRepetição
    } else {
        echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../login.php'>
                    <script type='text/javascript'>
                        alert('Esse usuário já está cadastrado!');
                    </script>";    
    }

?>