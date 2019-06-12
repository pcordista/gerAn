<?php
	session_start();
	require 'assets/php/conn.php';

	// Seta arquivos permitidos
	$arquivos_permitidos = ['jpg', 'jpeg', 'png'];

	// Pega os arquivos do post
	$arquivos = $_FILES['arquivos'];

	// Pega os nome dos arquivos
	$nomes = $arquivos['name'];

	// Repete por todos os arquivos
	for ($i=0; $i < count($nomes); $i++) { 
		// Pegar extensão / Separa o arquivo
		$extensao = explode('.', $nomes[$i]);
		// Pegar final do explode
		$extensao = end($extensao);
		// Mudar nome do arquivo para impedir repetição
		$nomes[$i] = date('d-m-y--H-m-s') . '-' . $nomes[$i];

		// Verifica extensão
		if (in_array($extensao, $arquivos_permitidos)) {
			// Query para injetar no Mysqli
			$query = "INSERT into teste values (default, '$nomes[$i]')";
			// Injeta a query no Mysql
			$res = mysqli_query($conn, $query);

			// Verifica as linhas afetadas no banco de dados
			if(mysqli_affected_rows($conn) > 0) {
				// Move os arquivos para a pasta determinada
				$mover = move_uploaded_file($_FILES['arquivos']['tmp_name'][$i], 'assets/anuncios/' . $nomes[$i]);
				// Cria uma mensagem na sessão para devolver na página de upload
				$_SESSION['sucesso'] = 'Arquivo(s) enviado com sucesso';
				// Manda para o destino
				$destino = header("Location: exemplo.php");
			} 
		// Caso a extensão seja errada 
		} else {
			// Da uma mensagem de erro na sessão para devolver a pagina origem
			$_SESSION['erro'] = "Existem arquivos não permitidos que não foram upados";
			// Envia para outra página
			$destino = header("Location: exemplo.php");
		}
	}

?>