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
		<form class="formsearch">
			<input placeholder="Digite sua pesquisa" id="search" type="text" class="searchinput">
			<button class="btn waves-effect waves-light blue btnsearch" type="submit" name="action">Submit
				<i class="material-icons right">send</i>
			</button>
		</form>
	</section>

</section>

<section class="categorias center-align">
	<div class="categorias-title">Principais Categorias</div>
	<div class="categorias-subtitle">Ache os melhores produtos com os melhores preços</div>
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