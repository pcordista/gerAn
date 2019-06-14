<?php 
session_start();
require_once 'assets/php/conn.php'; 

// CHECA SESSÃO
require 'check_session.php'; 


// error_reporting(0);
// ini_set(“display_errors”, 0 );
if($_GET == null) {

} elseif (isset($_GET['search'])) {
	$get = $_GET['search'];
} else {

}

?>

<?php include 'header.php' ?>


<section class="postsbackground">
	<?php include 'menu.php' ?>

	<section class="postsnav center-align white-text">
		<form id="search">
			<input placeholder="Digite sua pesquisa" id="search" type="text" class="searchinput" value="<?php
			if (isset($_GET['search'])) {
				$get = $_GET['search'];
				echo $get;
				} else {

				}
				?>">
				<a class="btn waves-effect waves-light blue btnsearch" id="btnsearch"  name="action">Pesquisar
					<i class="material-icons right">send</i>
				</a>
			</form>
		</section>

	</section>

	<section class="maincontainer">



		<div class="row" id="ResultadoTotal">

			<div class="col s12 m3 nopadding hide-on-med-and-down jumpline">
				<div class="filterdiv" id="filterdiv">
					<?php include 'filterposts.php' ?>
				</div>
				<!-- PASSAR GET DO INDEX PARA QUERY -->
				<input type="hidden" name="get" class="get" value="
				<?php 
				if($_GET == null) {

					} else {
						echo $get;
					}
					?>">
				</div>

				<div class="filter_data col s12 m9" id="Resultado">
				</div>
				<div class="col s12 m4 offset-m8">
					<table id="paginador" border="1">

					</table>
				</div>


			</div>
		</section>



		<?php include 'assets/php/scripts.php' ?>
		<script type="text/javascript" src="assets/js/filter_posts.js"></script>
	</body>
	</html>