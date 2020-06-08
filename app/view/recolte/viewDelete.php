
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
          <input type="hidden" name='action' value='recolteDeleted'>  
        <label for="producteur_id">producteur_id : </label> <select class="form-control" id='producteur_id' name='producteur_id' style="width: 100px">
            <?php
            foreach ($results as $producteur_id) {
             echo ("<option>$producteur_id</option>");
            }
            ?>
        </select>
      </div>
      <div class="form-group">
        <label for="vin_id">vin_id : </label> <select class="form-control" id='vin_id' name='vin_id' style="width: 100px">
            <?php
            foreach ($results2 as $vin_id) {
             echo ("<option>$vin_id</option>");
            }
            ?>
        </select>
      </div>
      <button class="btn btn-primary" type="submit">Supprimer</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>



