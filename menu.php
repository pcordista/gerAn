<nav class="menu">
	<div class="container">
		<div class="nav-wrapper">
			<a href="index.php" class="brand-logo">Logo</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="index.php">HOME</a></li>
				<li><a href="badges.html">CATEGORIAS</a></li>
				<?php 
				if((isset($_SESSION['nome']) == true)) {
					?> <li class="valign-wrapper" style="width: 120px"><a href="collapsible.html" style="display: flex"><i class="material-icons iconsmenuhelper">person</i>
						<?php echo strtoupper($logado);
				} ?></a></li>
				<?php if((!isset($_SESSION['nome']) == true)) { 
					?>
					<li><a href="cadastro.php">REGISTRO</a></li>
					<li><a href="login.php">LOGIN</a></li>

				<?php } else { ?>
					<li><a href="assets/php/php-sair.php">SAIR</a></li>
				<?php } ?>
				<li class="red"><a href="add_post.php">ANUNCIE</a></li>
			</ul>
		</div>
	</nav>