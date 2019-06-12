<?php require_once 'assets/php/conn.php'; ?>

<?php 
session_start();

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
	$id = $_SESSION['id'];
}

// Se tiver logado
if((isset($_SESSION['nome']) == true)) {
	echo "Bem vindo ".$logado;
}

// Carregar Categorias
$puxarListCategorias = "SELECT * FROM categoria";
$queryCategoria = mysqli_query($conn, $puxarListCategorias) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD com PHP, de forma simples e fácil</title>
	<?php require_once 'assets/php/styles.php'; ?>
</head>
<body>
	<form method="post" action="assets/php/php-post-add.php" enctype="multipart/form-data">
		<input type="hidden" name="id_user" placeholder="Qual seu nome?" value="<?php echo $id ?>" required><br/><br/>
		Selecione a Categoria: <BR />
		<select name="categoria">
			<option value="" disabled selected>Categoria</option>
			<?php while($row = mysqli_fetch_assoc($queryCategoria)){ ?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['categoria']; ?></option>
			<?php } ?>
		</select><BR>
		Titulo do Anúncio:<br/> 
		<input type="text" name="titulo" placeholder="Qual seu nome?" required><br/><br/>
		Descrição:<br/> 
		<textarea id="descricao" name="descricao" class="materialize-textarea"></textarea>
		Preço:<br/> 
		<input type="text" name="preco" placeholder="Qual sua cidade?" required><br/><br/>
		Telefone para contato:<br/> 
		<input type="text" name="telefone" placeholder="Telefone de contato" required><br/><br/>
		E-mail de contato:<br />
		<input type="text" name="emailcontato" placeholder="" value="<?php echo $email; ?>" required><br/><br/>
		Cidade:<br />
		<input type="text" name="cidade" placeholder="Digite a cidade" required><br/><br/>
		<div class="file-field input-field">
			<div class="btn">
				<span>Imagem Principal</span>
				<input type="file" name="imagemcapa" required>
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text" placeholder="Adicione uma imagem principal">
			</div>
		</div>
		<div class="file-field input-field">
			<div class="btn">
				<span>Upar Imagens</span>
				<input type="file" multiple name="imagens[]" required>
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text" placeholder="Adicione outras fotos">
			</div>
		</div>
		<button class="btn green" type="submit">Cadastrar</button>
		<BR>
		<a href="index.php" class="btn orange">Voltar</a>
	</form>
	<?php require_once 'assets/php/scripts.php'; ?>
</body>
</html>