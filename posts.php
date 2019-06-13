<?php 
session_start();
require_once 'assets/php/conn.php'; 

// CHECA SESSÃO
require 'check_session.php'; 


// error_reporting(0);
// ini_set(“display_errors”, 0 );
if($_GET == null) {

} else {
	$get = $_GET['search'];
}

$buscarCategorias = "SELECT * FROM categoria";
$queryCategorias = mysqli_query($conn, $buscarCategorias)or die(mysqli_error($conn));

$puxarListPosts = "SELECT * FROM anuncios";
$query = mysqli_query($conn, $puxarListPosts) or die(mysqli_error($conn));
$contador=mysqli_num_rows($query);

if(empty($_GET['pag'])){
	$pag=1;
}else{
	$pag = "$_GET[pag]";} //Pegando página selecionada na URL
	if($pag >= '1'){
		$pag = $pag;
	}else{
		$pag = '1';
	}

	$maximo = 10;
	$inicio = ($pag * $maximo) - $maximo;
	$paginas = ceil($contador/$maximo);



	?>

	<?php include 'header.php' ?>

	<section class="postsbackground">
		<?php include 'menu.php' ?>

		<section class="postsnav center-align white-text">
			<form id="search">
				<input placeholder="Digite sua pesquisa" id="search" type="text" class="searchinput">
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
			</div>

		</section>
		<section>


			<div class="row valign-wrapper">
				<div class="col s12 m2 offset-m7 right-align">

					<?php 
					echo "Página ".$pag." de ".$paginas;
					?>
				</div>
				<div class="col s12 m3 right-align">
					<ul class="pagination">
						<?php


						if($pag!=1){
							echo "<li class=''><a href=posts.php?pag=".($pag-1)."><i class='material-icons'>chevron_left</i></a></li>"; 
							for($i=1;$i<=$paginas;$i++){
								if($pag==$i){
									echo "<li class='active'><a href='posts.php?pag=".$i."'>".$i."</a></li>";
								}else{
									echo "<li class='waves-effect'><a href='posts.php?pag=".$i."'>".$i."</a></li>";
								}
							}
						}
						else{
							for($i=1;$i<=$paginas;$i++){
								if($pag==$i){
									echo "<li class='active'><a href='posts.php?pag=".$i."'>".$i."</a></li>";
								}else{
									echo "<li class='waves-effect'><a href='posts.php?pag=".$i."'>".$i."</a></li>";
								}
							}
						}
						if($pag!=$paginas){
							echo "<li class='waves-effect'><a href='posts.php?pag=".($pag+1)."'><i class='material-icons'>chevron_right</i></a></li>";
						}

						?>



					</ul>
				</div>
			</div>
		</section>



		<?php include 'assets/php/scripts.php' ?>
		<script type="text/javascript" src="assets/js/filter_posts.js"></script>
	</body>
	</html>