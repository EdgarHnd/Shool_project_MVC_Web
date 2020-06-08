
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

          $iterrator = 0;
          foreach ($results_producteur as $producteur) {
              echo ("<div class='panel panel default'> 
                      <div class='panel-heading'>
                        <h4>");
              echo  $producteur->getNom();
              echo " ";
              echo  $producteur->getPrenom();
              echo     ("</h4>
                      </div>
                      <div class='panel-body'>");
              echo ("
              <table class = 'table table-striped table-bordered'>
                <thead>
                  <tr>
                    <th scope = 'col'>Cru</th>
                    <th scope = 'col'>Année</th>
                    <th scope = 'col'>Quantité</th>
                  </tr>
                </thead>
                <tbody>");
                    foreach ($results_recolte[$iterrator] as $recolte) {
                     printf("<tr><td>%s</td><td>%d</td><td>%d</td></tr>",$recolte['cru'], $recolte['annee'], $recolte['quantite']);
                        }
                   
              echo ("
                </tbody>
              </table>
              </div>
              </div>");
              $iterrator ++;
              }
          ?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>