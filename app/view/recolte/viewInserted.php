
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    if ($results) {
     echo ("<h3>La nouvelle récolte à été ajoutée</h3>");
     echo("<ul>");
     echo ("<li>producteur_id = " . $results . "</li>");
     echo ("<li>vin_id = " . $_GET['vin_id'] . "</li>");
     echo ("<li>quantite = " . $_GET['quantite'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème lors de la création de la récolte</h3>");
     echo ("producteur_id = " . $_GET['producteur_id']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>