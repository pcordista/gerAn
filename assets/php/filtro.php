<?php

include "conn.php";

//Recebe os valores dos checkbox em forma de array
print_r($filterCategoria);
$filterCategoria = $_POST;
$cat = array_shift($categoria);


/*A função sizeof() retorna um valor inteiro.
 * 0 se estiver vazio
 * 1 se tiver pelo menos um dado.
 *
 */



$sql = "SELECT * FROM anuncios WHERE '$cat' = categoria";

$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


while ($linha = mysqli_fetch_array($query)) {
	?>

	<?php
	$endereco = $pathToAcess.$linha['imagemcapa'];
	$caminho = 'post_view.php?id='.$linha['id'].'&title='.$linha['titulo'];
	$user = $linha['id_user'];
	$puxarUser = "SELECT * FROM usuarios WHERE id = '$user'";
	$queryUser = mysqli_query($conn, $puxarUser) or die(mysqli_error($conn));
	$linhaUser = mysqli_fetch_assoc($queryUser);
	$nomeVendedor = $linhaUser['nome'];
	?> 

	<div class="itemlinha" onclick="location.href = '<?php echo $caminho; ?>'">
		<div class="col s2 m4 itemimg">
			<div class="itemprice blue white-text">
				<?php echo $linha['preco'];?>
			</div>
			<div class="itemcat white-text">
				<?php echo $linha['categoria']; ?>
			</div>
			<div class="itembg center-align">
				<?php echo "<img src='".$endereco."' height='210px'>"; ?>
			</div>

		</div>
		<div class="col s10 m8 itemdetails">

			<div class="itemtitle blue-text">
				<?php echo $linha['titulo']; ?>
			</div>
			<div class="linha">
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
						<i class="material-icons itemviews">apps</i> <?php echo $linha['categoria']; ?>
					</span>
				</div>
			</div>
			<div class="itemdescription grey-text jumpline">
				<?php
				echo mb_substr($linha['descricao'], 0, 350, 'UTF-8');
				?>...
			</div>

			<?php  



			echo "".$linha['telefone']."";
			echo "".$linha['id_user'].""; ?>
		</div>
	</div>
<?php }
?>
