<?php require_once 'conn.php'; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CRUD com PHP, de forma simples e fácil</title>
    <?php include 'styles.php' ?>
  </head>
  <body>
  	<a class="btn red" href="cadastro.php">Cadastrar</a>

	<table>
		<thead>
			<td>Nome</td>
			<td>Email</td>
			<td>Cidade</td>
			<td>Senha</td>
			<td>UF</td>
		</thead>
		<tbody>
		<?php
			$puxarListUser = "SELECT * FROM 
								usuarios";
			$query = mysqli_query($conn, $puxarListUser) or die(mysqli_error($conn));
			while($row = mysqli_fetch_assoc($query)){
    			echo "";
			    echo "<tr>";
			    echo "<td>".$row['nome']."</td>";
			    echo "<td>".$row['email']."</td>";
			    echo "<td>".$row['cidade']."</td>";
			    echo "<td>".$row['senha']."</td>";
			    echo "<td>".$row['uf']."</td>";
			    echo "<td><a href='cadastro_edit.php?id=".$row['id']."'>editar</a></td>";
			    echo "<td><a href='php-delete.php?del=".$row['id']."'>deletar</a></td>";
			    echo "</tr>";
			}
		
		?>
		</tbody>
	</table>
	<?php include 'scripts.php' ?>
  </body>
</html>