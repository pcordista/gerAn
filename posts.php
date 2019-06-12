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

			<div class="col s12 m9" id="Resultado">
				<?php


				$sql = "SELECT * FROM anuncios ORDER BY id LIMIT $inicio, $maximo";
				$queryPosts = mysqli_query($conn, $sql) or die(mysqli_error($conn));

				while($row = mysqli_fetch_assoc($queryPosts)){
					$endereco = $pathToAcess.$row['imagemcapa'];
					$caminho = 'post_view.php?id='.$row['id'].'&title='.$row['titulo'];
					$user = $row['id_user'];
					$puxarUser = "SELECT * FROM usuarios WHERE id = '$user'";
					$queryUser = mysqli_query($conn, $puxarUser) or die(mysqli_error($conn));
					$rowUser = mysqli_fetch_assoc($queryUser);
					$nomeVendedor = $rowUser['nome'];
					$idCategoria = $row['categoria'];
					$puxarUser = "SELECT * FROM categoria WHERE id = '$idCategoria'";
					$queryCat = mysqli_query($conn, $puxarUser) or die(mysqli_error($conn));
					$rowCat = mysqli_fetch_assoc($queryCat);
					$categoria = $rowCat['categoria'];

					?> 

					<div class="itemrow" onclick="location.href = '<?php echo $caminho; ?>'">
						<div class="col s2 m4 itemimg">
							<div class="itemprice blue white-text">
								<?php echo $row['preco'];?>
							</div>
							<div class="itemcat white-text">
								<?php echo
								$categoria; ?>
							</div>
							<div class="itembg center-align">
								<?php echo "<img src='".$endereco."' height='210px'>"; ?>
							</div>

						</div>
						<div class="col s10 m8 itemdetails">

							<div class="itemtitle blue-text">
								<?php echo $row['titulo']; ?>
							</div>
							<div class="row">
								<div class="col s4 m4 borderright center">
									<span class="valign-wrapper">
										<i class="material-icons itemviews">pageview</i> 15
									</span>
								</div>
								<div class="col s4 m4 borderright">
									<span class="valign-wrapper">
										<i class="material-icons itemviews">people</i> <?php echo $nomeVendedor; ?>
									</span>
								</div>
								<div class="col s4 m4 blue-text">
									<span class="valign-wrapper">
										<i class="material-icons itemviews">apps</i> <?php echo $categoria; ?>
									</span>
								</div>
							</div>
							<div class="itemdescription grey-text jumpline">
								<?php
								echo mb_substr($row['descricao'], 0, 350, 'UTF-8');
								?>...
							</div>

							<?php  



							echo "".$row['telefone']."";
							echo "".$row['id_user']."";

							if ($row['id_user'] === $_SESSION['id']) {
								echo "<a href='edit_post.php?id=".$row['id']."'>editar</a>";
								echo "<a href='assets/php/php-post-delete.php?del=".$row['id']."'>deletar</a>";
							} else {

							} ?>
						</div>
					</div>
					<?php


				}

				?>
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
	<script type="text/javascript" src="assets/js/search.js"></script><script type="text/javascript" src="assets/js/filter.js"></script>
</body>
</html>