<?php 
	require_once 'assets/php/conn.php'; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD com PHP, de forma simples e fácil</title>
	<?php require_once 'assets/php/styles.php'; ?>
</head>
<body>
	<form method="post" action="assets/php/php-cadastrar.php">
		Nome:<br/> 
		<input type="text" name="nome" placeholder="Qual seu nome?" required><br/><br/>
		E-mail:<br/> 
		<input type="email" name="email" placeholder="Qual seu e-mail?" required><br/><br/>
		Cidade:<br/> 
		<input type="text" name="cidade" placeholder="Qual sua cidade?" required><br/><br/>
		Senha:<br />
		<input type="password" name="senha" placeholder="Qual sua Senha?" required><br/><br/>
		UF:<br/> 
		<input type="text" name="uf" size="2" placeholder="UF" required>
		<br/><br/>
		<button class="btn green" type="submit">Cadastrar</button>
		<BR>
		<a href="index.php" class="btn orange">Voltar</a>
	</form>
	<?php require_once 'assets/php/scripts.php'; ?>
</body>
</html>