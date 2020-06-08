
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">producteur_id</th>
          <th scope = "col">vin_id</th>
          <th scope = "col">quantité</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", $element->getProducteurId(), $element->getVinId(), $element->getQuantite());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>