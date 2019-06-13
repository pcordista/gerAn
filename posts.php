<?php 
session_start();
require_once 'assets/php/conn.php'; 

// CHECA SESSÃO
require 'check_session.php'; 


// error_reporting(0);
// ini_set(“display_errors”, 0 );

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
			<form id="" onsubmit="getDados(); return false;">
				<input placeholder="Digite sua pesquisa" id="search" type="text" class="searchinput">
				<button class="btn waves-effect waves-light blue btnsearch"  name="action" onclick="getDados();">Pesquisar
					<i class="material-icons right">send</i>
				</button>
			</form>
		</section>

	</section>

	<section class="maincontainer">



		<div class="row" id="ResultadoTotal">

			<div class="col s12 m3 nopadding hide-on-med-and-down jumpline">
				<?php include 'filterposts.php' ?>
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
	<script type="text/javascript" src="assets/js/search.js"></script>
	<!-- <script type="text/javascript" src="assets/js/filter.js"></script> -->
	<script>
		
		$(document).ready(function(){

			filter_data();

			function filter_data()
			{
				$('.filter_data').html('<div id="loading" style="" ></div>');
				var action = 'fetch_data';
				var brand = get_filter('brand');
				var ram = get_filter('ram');
				$.ajax({
					url:"fetch_data.php",
					method:"POST",
					data:{action:action, brand:brand, ram:ram},
					success:function(data){
						$('.filter_data').html(data);
					}
				});
			}

			function get_filter(class_name)
			{
				var filter = [];
				$('.'+class_name+':checked').each(function(){
					filter.push($(this).val());
				});
				return filter;
			}

			$('.common_selector').click(function(){
				filter_data();
			});


		});



	</script>
</body>
</html>