<?php session_start(); ?>
<?php require_once 'assets/php/conn.php'; ?>

<?php 

require 'check_session.php';

?>

<?php include 'header.php' ?>

<section class="mainbackground">

	<?php include 'menu.php' ?>

	<section class="mainnav center-align white-text">
		<span class="title"><span class="blue-text">Bem vindo ao</span> BOMNEGOCIO<span class="blue-text">.SHOP</span></span>
		<BR><span class="subtitle">Compre e venda de tudo desde de carros, produtos eletrônicos, computadores, serviços e muito mais!</span>
		<form class="formsearch" action="posts.php" method="get">
			<input placeholder="Digite sua pesquisa" id="search" type="text" class="searchinput" name="search">
			<button class="btn waves-effect waves-light blue btnsearch" type="submit">Pesquise
				<i class="material-icons right">search</i>
			</button>
		</form>
	</section>

</section>

<section class="categorias center-align">
	<div class="categorias-title">Principais Categorias</div>
	<div class="categorias-subtitle">Ache os melhores produtos com os melhores preços</div>
	<div class="container">
		<div class="row jumpline">
			<?php
			$query = "SELECT DISTINCT(categoria) FROM anuncios";
			$statement = mysqli_query($conn, $query);

			while($row = mysqli_fetch_assoc($statement)){
				$idCat = $row['categoria'];
				$buscarCategorias = "SELECT * FROM categoria WHERE id = '$idCat'";
				$queryCategorias = mysqli_query($conn, $buscarCategorias)or die(mysqli_error($conn));
				$rowCat = mysqli_fetch_assoc($queryCategorias);
				$color = ['#03a9f4','#26ae61', '#048af1', '#7f27fb', '#40e0cf', '#ff7f15', '#1d65b4', '#ab47bc', '#f4c837', '#09c097', '#c56dfb', '#57dc90'];
				$id = $rowCat["id"];
				?>

				<div class="col s12 m3 center catindex jumpline" style="background-color: <?php echo $color[$id]; ?>">
					<i class="fas fa-<?php echo $rowCat["icone"] ?> fa-3x"></i>
					<div class="bold jumpline">
						<?php echo $rowCat["categoria"] ?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>

<section class="howworks center-align">
	<div class="howworks-title">Como funciona?</div>
	<div class="howworks-subtitle">Descubra & Conecte-se com negócios na sua região</div>

	<div class="container">
		<div class="howworksrow row">
			<div class="col s12 m4 center">
				<div class="howworksitem valign-wrapper"><i class="material-icons medium">group_add</i> </div>
				CRIA SUA CONTA
			</div>
			<div class="col s12 m4 center">
				<div class="howworksitem valign-wrapper"><i class="material-icons medium">shop</i> </div>
				POSTE SEU PRODUTO
			</div>
			<div class="col s12 m4 center">
				<div class="howworksitem valign-wrapper"><i class="material-icons medium">local_grocery_store</i> </div>
				NEGOCIE
			</div>
		</div>
	</div>
</section>

<a class="btn red" href="posts.php">Ver Anuncios</a>

<?php include 'assets/php/scripts.php' ?>
</body>
</html>