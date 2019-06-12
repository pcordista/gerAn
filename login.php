<?php require_once 'assets/php/conn.php'; ?>

<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD com PHP, de forma simples e fácil</title>
	<?php include 'assets/php/styles.php' ?>
</head>
<body>

	<form id="formlogin" method="post" action="assets/php/php-login.php">
		<input type="email" id="email" name="email" placeholder="Digite seu e-mail" required="" />
		<input type="password" id="senha" name="senha" placeholder="Senha" required="" />
		<button type="submit">Entrar</button>
		
	</form>
	<?php include 'assets/php/scripts.php' ?>
</body>
</html>