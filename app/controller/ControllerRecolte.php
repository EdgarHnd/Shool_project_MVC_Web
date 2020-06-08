
<?php
require_once '../model/ModelRecolte.php';
require_once '../model/ModelProducteur.php';
require_once '../model/ModelVin.php';

class ControllerRecolte {

 public static function recolteReadAll() {
  $results = ModelRecolte::getAll();
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewAll.php';
  if (DEBUG)
   echo ("ControllerRecolte : recolteReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function recolteBestYears() {
  $results = ModelRecolte::getBest();
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewBest.php';
  if (DEBUG)
   echo ("ControllerRecolte : recolteBestYears : vue = $vue");
  require ($vue);
 }
 
 public static function recolteCreate() {
  $results = ModelProducteur::getAllId();
  $results2 = ModelVin::getAllId();
  
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInsert.php';
  require ($vue);
 }
 
 public static function recolteDelete() {
  $results = ModelProducteur::getAllId();
  $results2 = ModelVin::getAllId();
  
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewDelete.php';
  require ($vue);
 }

 public static function recolteCreated() {
  $results = ModelRecolte::insert(
      htmlspecialchars($_GET['producteur_id']), htmlspecialchars($_GET['vin_id']), htmlspecialchars($_GET['quantite']));
  
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInserted.php';
  require ($vue);
 }
 
 public static function recolteDeleted() {
  $producteur_id = $_GET['producteur_id'];
  $vin_id = $_GET['vin_id'];
  $results = ModelRecolte::delete($producteur_id,$vin_id);
  
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewDeleted.php';
  require ($vue);
 }
 
 public static function recolteProducteur() {
  $results_producteur = ModelProducteur::getAllRecolte();
  $results_recolte = [];
  foreach ($results_producteur as $producteur) {
           $recolte = ModelRecolte::getOneProducteur($producteur->getId());
           array_push($results_recolte, $recolte);
  }
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewProducteur.php';
  if (DEBUG)
   echo ("ControllerRecolte : recolteProducteur : vue = $vue");
  require ($vue);
 }
}
?>

