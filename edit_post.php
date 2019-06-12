<?php require_once 'assets/php/conn.php'; ?>

<?php 
session_start();
$id = $_REQUEST['id'];

// CHECA SESSÃO
if((!isset ($_SESSION['nome']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	unset($_SESSION['nome']);
	echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/login.php'>
	<script type='text/javascript'>
	alert('Logue para prosseguir');
	</script>";
} else {
	$logado = $_SESSION['nome'];
	$email = $_SESSION['email'];
}

// Se tiver logado
if((isset($_SESSION['nome']) == true)) {
	echo "Bem vindo ".$logado;
}

// Carregar Categorias
$puxarListCategorias = "SELECT * FROM categoria";
$queryCategoria = mysqli_query($conn, $puxarListCategorias) or die(mysqli_error($conn));

// Carrega o anuncio 
$queryAnuncio = "SELECT * FROM anuncios
WHERE '$id' = id";
$result = mysqli_query($conn, $queryAnuncio) or die(mysqli_error($conn));


$rowAnuncio = mysqli_fetch_assoc($result);

print_r($rowAnuncio);

$titulo = $rowAnuncio['titulo'];
$descricao = $rowAnuncio['descricao'];
$telefone = $rowAnuncio['telefone'];
$emailcontato = $rowAnuncio['emailcontato'];
$categoria = $rowAnuncio['categoria'];
$id_user = $rowAnuncio['id_user'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD com PHP, de forma simples e fácil</title>
	<?php require_once 'assets/php/styles.php'; ?>
</head>
<body>
	<form method="post" action="assets/php/php-post-update.php">

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
		Telefone para contato:<br/> 
		<input type="text" name="telefone" value="<?php echo $telefone?>" placeholder="Qual sua cidade?" required><br/><br/>
		E-mail de contato:<br />
		<input type="text" name="emailcontato" placeholder="" value="<?php echo $emailcontato; ?>" required><br/><br/>
		<button class="btn green" type="submit">Cadastrar</button>
		<BR>
		<a href="index.php" class="btn orange">Voltar</a>
	</form>
	<?php require_once 'assets/php/scripts.php'; ?>
</body>
</html>