<div class="widthfull">
  <a class="btn waves-effect waves-light red cleanFilter widthfull" id="cleanFilter" type="reset" name="cleanFilter">Limpar
  </a>
</div>



  <div class="list-group">
    <h3>Categorias</h3>
    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
      <?php

      $query = "SELECT DISTINCT(categoria) FROM anuncios";
      $statement = mysqli_query($conn, $query);

      while($row = mysqli_fetch_assoc($statement)){
        $idCat = $row['categoria'];
         $buscarCategorias = "SELECT * FROM categoria WHERE id = '$idCat'";
        $queryCategorias = mysqli_query($conn, $buscarCategorias)or die(mysqli_error($conn));
        $rowCat = mysqli_fetch_assoc($queryCategorias);

        ?>


        <div>
          <input type="checkbox" class="common_selector categoria" id="check<?php echo $row['categoria']; ?>" value="<?php echo $row['categoria']; ?>">
          <label for="check<?php echo $row['categoria']; ?>"><?php echo $rowCat['categoria']; ?></label>
        </div>
        <?php
      }

      ?>
    </div>
  </div>


  <div class="list-group">
    <h3>Cidades</h3>
    <?php

    $query = "
    SELECT DISTINCT(cidade) FROM anuncios";
    $statement = mysqli_query($conn, $query);



    while($row = mysqli_fetch_assoc($statement)){


      ?>


      <div>
        <input type="checkbox" class="common_selector cidade" id="check<?php echo $row['cidade']; ?>" value="<?php echo $row['cidade']; ?>">
        <label for="check<?php echo $row['cidade']; ?>"><?php echo $row['cidade']; ?></label>
      </div>
      <?php
    }

    ?>
  </div>
