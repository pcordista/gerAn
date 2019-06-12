<?php require_once 'assets/php/conn.php'; ?>

<?php 
session_start();
$id = $_REQUEST['id'];


// Carrega o anuncio 
$queryAnuncio = "SELECT * FROM anuncios
WHERE '$id' = id";
$result = mysqli_query($conn, $queryAnuncio) or die(mysqli_error($conn));


$rowAnuncio = mysqli_fetch_assoc($result);


$id = $rowAnuncio['id'];
$titulo = $rowAnuncio['titulo'];
$descricao = $rowAnuncio['descricao'];
$telefone = $rowAnuncio['telefone'];
$emailcontato = $rowAnuncio['emailcontato'];
$categoria = $rowAnuncio['categoria'];
$id_user = $rowAnuncio['id_user'];
$imagemcapa = $rowAnuncio['imagemcapa'];

$queryImagens = "SELECT * FROM imagensanuncios WHERE '$id' = id_post";
$resultImagens = mysqli_query($conn, $queryImagens);



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD com PHP, de forma simples e fácil</title>
	<?php require_once 'assets/php/styles.php'; ?>
</head>
<body>

	<input type="hidden" name="id" placeholder="Qual seu nome?" value="<?php echo $id ?>" required><br/><br/>
	Categoria do Anúncio:<BR />
	<select name="categoria">
		<option value="<?php echo $categoria?>" selected><?php echo $categoria?></option>
		<?php while($row = mysqli_fetch_assoc($queryCategoria)){ ?>
			<option value="<?php echo $row['categoria']; ?>"><?php echo $row['categoria']; ?></option>
		<?php } ?>
	</select><BR />
	Titulo do Anúncio:<br/> 
	<input type="text" name="titulo" placeholder="Qual seu nome?" value="<?php echo $titulo?>" required><br/><br/>
	Descrição:<br/> 
	<textarea id="descricao" name="descricao" class="materialize-textarea"><?php echo $descricao?></textarea>
	<?php 
	// Se tiver logado
	if((isset($_SESSION['nome']) == true)) {
		?>
		Telefone para contato:<br/> 
		<input type="text" name="telefone" value="<?php echo $telefone?>" placeholder="Qual sua cidade?" required><br/><br/>
		E-mail de contato:<br />
		<input type="text" name="emailcontato" placeholder="" value="<?php echo $emailcontato; ?>" required><br/><br/>

		<?php
	} else {
		?>
		Telefone para contato:<br/> 
		<input type="text" name="telefone" value="LOGUE PARA VER O TELEFONE" placeholder="Qual sua cidade?" required><br/><br/>
		E-mail de contato:<br />
		<input type="text" name="emailcontato" placeholder="" value="LOGUE PARA VER O TELEFONE" required><br/><br/>
		<?php
	}
	?>
	
	<img src="<?php echo $pathToAcess.$imagemcapa ?>">
	<BR>

	<?php
	while($rowImagens = mysqli_fetch_assoc($resultImagens)) {
		?>
		<img src="<?php echo $pathToAcess.$rowImagens['arquivo']; ?>" width="200px"><BR>
		<?php
	}
	?>


	<a href="posts.php" class="btn orange">Voltar</a>
	<?php require_once 'assets/php/scripts.php'; ?>
</body>
</html>