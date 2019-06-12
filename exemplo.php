<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
</head>
<body>
	<form action="uploadtest.php" method="post" enctype="multipart/form-data">
		<input type="file" name="arquivos[]" multiple required>
		<input type="submit">
	</form>

	<?php 
		if(isset($_SESSION['erro'])) {
		echo $_SESSION['erro'];
		session_unset();
		} elseif (isset($_SESSION['sucesso'])) {
		echo $_SESSION['sucesso'];
		session_unset();
	}

	?>
</body>
</html>