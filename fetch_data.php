<?php

//fetch_data.php

include('assets/php/conn.php');

if(isset($_POST["action"]))
{
	$query = "
	SELECT * FROM anuncios";
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		
		$verif = strstr($query, "WHERE");
		if ($verif){
			$query .= " AND categoria ='".$brand_filter."'";
		} else {
			$query .= " WHERE categoria ='".$brand_filter."'";
		}
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);

		
		$verif = strstr($query, "WHERE");
		if ($verif){
			$query .= " AND cidade = '".$ram_filter."'";
		} else {
			$query .= " WHERE cidade ='".$ram_filter."'";
		}
	}
	$resulta = mysqli_query($conn, $query);
	// $statement->execute();
	// $result = $statement->fetchAll();
	$total_row = mysqli_num_rows($resulta);
	$output = '';
	if($total_row > 0)
	{

		foreach($resulta as $row)
		{

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
			$descricao = $row['descricao'];
			if((strlen($descricao)) > 350){

				$descricao = mb_substr($row['descricao'], 0, 350, 'UTF-8');
				$descricao .= '...';

			}else{
			}


			$output .= '<div class="itemrow" onclick="location.href = '.$caminho.'">
			<div class="col s2 m4 itemimg">
			<div class="itemprice blue white-text">
			'.$row['preco'].'
			</div>
			<div class="itemcat white-text">
			'.$categoria.'
			</div>
			<div class="itembg center-align">
			<img src='.$endereco.' height="210px">
			</div>

			</div>
			<div class="col s10 m8 itemdetails">

			<div class="itemtitle blue-text">
			'.$row['titulo'].'
			</div>
			<div class="row">
			<div class="col s4 m4 borderright center">
			<span class="valign-wrapper">
			<i class="material-icons itemviews">pageview</i> 15
			</span>
			</div>
			<div class="col s4 m4 borderright">
			<span class="valign-wrapper">
			<i class="material-icons itemviews">people</i> '.$nomeVendedor.'
			</span>
			</div>
			<div class="col s4 m4 blue-text">
			<span class="valign-wrapper">
			<i class="material-icons itemviews">apps</i> '.$categoria.'
			</span>
			</div>
			</div>
			<div class="itemdescription grey-text jumpline">

			'.$descricao.'
			</div>

			<?php  
			'.$row['telefone'].''.$row['id_user'].'
			</div>
			</div>';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>