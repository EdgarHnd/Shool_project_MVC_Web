
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    if ($results) {
     echo ("<h3>Le vin a été supprimé </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
    } else {
     echo ("<h3>Problème de suppression du Vin. Il est probable qu'il soit présent dans la table des récoltes</h3>");
     echo ("id = " . $_GET['id']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>

    
    