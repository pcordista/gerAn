<?php

require 'conn.php';

$id = $_GET['del'];

$query = "DELETE FROM usuarios WHERE id = '$id'";
mysqli_query($conn, $query);

echo    "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/php/index.php'>
<script type='text/javascript'>
alert('Usuário deletado com Sucesso.');
</script>"; 


mysqli_close($conn);

?>