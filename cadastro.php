<?php 
require_once 'assets/php/conn.php'; 
?>

<?php include 'header.php' ?>

<section class="postsbackground">
	<?php include 'menu.php' ?>

	<section class="postsnav center-align white-text">
		<span class="title"><span class="blue-text">Bem vindo ao</span> BOMNEGOCIO<span class="blue-text">.SHOP</span></span>
		<BR><span class="subtitle">Compre e venda de tudo desde de carros, produtos eletrônicos, computadores, serviços e muito mais!</span>
	</section>

</section>

<section class="cadastro valign-wrapper">
	<div class="row" style="width: 100%">
		<div class="col s12 m6 offset-m3 off z-depth-4 loginform">
			<form method="post" action="assets/php/php-cadastrar.php">
				<div class="center">
					<BR> Cadastre-se, compre e venda!
				</div>
				Nome:<br/> 
				<input type="text" name="nome" placeholder="Qual seu nome?" required><br/><br/>
				E-mail:<br/> 
				<input type="email" name="email" placeholder="Qual seu e-mail?" required><br/><br/>
				Cidade:<br/> 
				<input type="text" name="cidade" placeholder="Qual sua cidade?" required><br/><br/>
				UF:<br/> 
				<input type="text" name="uf" size="2" placeholder="UF" required>
				Senha:<br />
				<input type="password" name="senha" placeholder="Qual sua Senha?" required><br/><br/>
				<br/><br/>
				<div class="row">
					<div class="col s12 m6 center">
						<button class="btn green waves-effect waves-light" type="submit">Cadastrar</button>
					</div>
					<div class="col s12 m6 center">
						<a href="index.php" class="btn orange">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php require_once 'assets/php/scripts.php'; ?>
</body>
</html>