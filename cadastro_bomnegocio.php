<style type="text/css">
	.input-field {
		margin-top: 1rem !important;
		margin-bottom: 1rem !important
	}
</style>

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
		<div class="col s12 m8 offset-m2 off z-depth-1 loginform">
			<form method="post" action="assets/php/user-create.php">
				<div class="center">
					<span class="title2 bold">Cadastre-se, compre e venda!</span>
					<P class="center">Conecte-se com gente que querem comprar e vender</P>
				</div>
				<div class="row">

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">account_circle</i>
						<input id="nome" type="text" class="" name="nome" required>
						<label for="nome">Nome Completo</label>
					</div>

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">mail</i>
						<input id="icon_prefix" type="email" class="" name="email" required>
						<label for="email">Endereço de E-mail</label>
					</div>
				</div>

				<div class="row ">

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">chrome_reader_mode
						</i>
						<input id="cpf" type="text" class="" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
						<label for="cpf">CPF</label>
					</div>

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">perm_phone_msg</i>
						<input id="celular" type="text" class="" name="celular" required>
						<label for="celular">Celular: (00) 00000-0000</label>
					</div>
				</div>

				<div class="row ">

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">contact_phone
						</i>
						<input id="telefone" type="text" class="" name="telefone" required>
						<label for="telefone">Telefone fixo: (00) 0000-0000</label>
					</div>

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">lock_outline</i>
						<input id="senha" type="password" class="validate" name="senha" required>
						<label for="senha">Senha</label>
					</div>
				</div>

				<div class="row ">

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">my_location
						</i>
						<input id="endereco" type="text" class="" name="endereco" required>
						<label for="endereco">Endereço</label>
					</div>

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">location_city</i>
						<input id="numero" type="text" class="validate" name="numero" required>
						<label for="numero">Número e Complemento</label>
					</div>

				</div>

				<div class="row ">

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">location_on
						</i>
						<input id="cidade" type="text" class="" name="cidade" required>
						<label for="cidade">Cidade</label>
					</div>

					<div class="input-field col s12 m6 jumpline">
						<i class="material-icons prefix">map
						</i>
						<input id="estado" type="text" class="" name="estado" required>
						<label for="estado">Estado</label>
					</div>

				</div>

				
				<div class="row jumpline">
					<div class="col s12 m6 center">
						<button class="btn green waves-effect waves-light" type="submit">Cadastrar</button>
					</div>
					<div class="col s12 m6 center">
						<a href="index.php" class="btn orange">Voltar</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</section>
<?php require_once 'assets/php/scripts.php'; ?>
</body>
</html>