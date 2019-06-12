<?php 

session_start();

require "conn.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$lendoSenha = sha1(md5($senha));

$query = "SELECT * FROM usuarios
WHERE email='$email' and senha='$lendoSenha'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$res = mysqli_fetch_array($result);

$nome = $res['nome'];
$id = $res['id'];

if(@mysqli_num_rows($result) > 0) {
	$_SESSION['id'] = $id;
	$_SESSION['nome'] = $nome;
	$_SESSION['email'] = $email;
	header('location:../../index.php');
}

else {
	echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/login.php'>
	<script type='text/javascript'>
	alert('Usuário ou Senha incorreto.');
	</script>"; 
}


mysqli_close($conn);

?>