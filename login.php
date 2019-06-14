<?php require_once 'assets/php/conn.php'; ?>


<?php include 'header.php' ?>

<section class="postsbackground">
	<?php include 'menu.php' ?>

	<section class="postsnav center-align white-text">
		<span class="title"><span class="blue-text">Bem vindo ao</span> BOMNEGOCIO<span class="blue-text">.SHOP</span></span>
		<BR><span class="subtitle">Compre e venda de tudo desde de carros, produtos eletrônicos, computadores, serviços e muito mais!</span>
	</section>

</section>

<section class="login valign-wrapper">
	<div class="row" style="width: 100%">
		<div class="col s12 m6 offset-m3 off z-depth-4 loginform">

			<form id="formlogin" method="post" action="assets/php/php-login.php">
				<div class="center">
					<img src="http://demo.geekslabs.com/materialize/v2.2/layout03/images/login-logo.png" width="100px">
					<BR> Acesse agora mesmo !
				</div>
				<BR />E-mail<BR/>
				<input type="email" id="email" name="email" placeholder="Digite seu e-mail" required="" />
				<div class="col s6 m6 jumpline">
					Senha
				</div>
				<div class="col s6 m6 blue-text right-align jumpline">
					Esqueci a senha
				</div>
				<input type="password" id="senha" name="senha" placeholder="Senha" required="" />
				<div class="center jumpline">
					<button class="btn green waves-effect waves-light" type="submit" name="action">Acessar
						<i class="material-icons right">send</i>
					</button>
				</div>

			</form>
		</div>
	</div>
</section>
<?php include 'assets/php/scripts.php' ?>
</body>
</html>