<?php

$buscarCategorias = "SELECT * FROM categoria";
$queryCategorias = mysqli_query($conn, $buscarCategorias)or die(mysqli_error($conn));




?>

  <div class="input-field col s12 m12">
    <select class="icons">
      <option value="" disabled selected>Choose your option</option>

      <?php 

      while($rowCat = mysqli_fetch_assoc($queryCategorias)){
         ?>
         <option value="<?php
         echo $rowCat['categoria'];
         ?>" data-icon="assets/img/background.jpg"><?php
         echo $rowCat['categoria'];
         ?></option>


         <?php
     }

     ?>
 </select>
 <label>Images in select</label>
</div>
