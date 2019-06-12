<?php require_once 'assets/php/conn.php'; ?>

<?php 
	$id = $_REQUEST['id'];

	$query = "SELECT * FROM usuarios
				WHERE '$id' = id";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	$row = mysqli_fetch_assoc($result);

	$id = $row['id'];
	$nome = $row['nome'];
	$email = $row['email'];
	$cidade = $row['cidade'];
	$senha = $row['senha'];
	$uf = $row['uf'];

	

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CRUD com PHP, de forma simples e fácil</title>
	<?php require_once 'assets/php/styles.php'; ?>
  </head>
  <body>
	<form method="post" action="assets/php/php-update.php">

	  <input type="text" name="id" placeholder="Qual seu nome?" value="<?php echo $id ?>" required><br/><br/>
	  Nome:<br/> 
	  <input type="text" name="nome" placeholder="Qual seu nome?" value="<?php echo $nome ?>" required><br/><br/>
	  E-mail:<br/> 
	  <input type="email" name="email" placeholder="Qual seu e-mail?" value="<?php echo $email ?>" required><br/><br/>
	  Cidade:<br/> 
		<input type="text" name="cidade" placeholder="Qual sua cidade?" value="<?php echo $cidade ?>" required><br/><br/>
		Senha:<br />
	  <input type="password" name="senha" placeholder="Qual sua Senha?" value="<?php echo $senha ?>" required><br/><br/>
	  UF:<br/> 
	  <input type="text" name="uf" size="2" placeholder="UF" value="<?php echo $uf ?>" required>
	  <br/><br/>
	  <button class="btn blue" name="edit" type="submit">Editar</button>
	  <a href="index.php" class="btn orange">Voltar</a>
	</form>

	<?php 
		require_once 'assets/php/scripts.php'; 
	?>
  </body>
</html>