<?php

require 'conn.php';

$id = $_GET['del'];

$query = "DELETE FROM anuncios WHERE id = '$id'";
mysqli_query($conn, $query);

echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/posts.php'>
<script type='text/javascript'>
alert('Anuncio deletado com Sucesso.');
</script>"; 

mysqli_close($conn);

?>