
<?php
require_once 'Model.php';

class ModelRecolte {

 private $producteur_id, $vin_id, $quantite;

 public function __construct($producteur_id = NULL, $vin_id = NULL , $quantite = NULL) {
  if (!is_null($producteur_id)) {
   $this->producteur_id = $producteur_id;
   $this->vin_id = $vin_id;
   $this->quantite = $quantite;
  }
 }

 function setProducteurId($producteur_id) {
  $this->producteur_id = $producteur_id;
 }
 
 function setVinId($vin_id) {
  $this->vin_id = $vin_id;
 }

 function setQuantite($quantite) {
  $this->quantite = $quantite;
 }

 function getProducteurId() {
  return $this->producteur_id;
 }
 
 function getVinId() {
  return $this->vin_id;
 }

 function getQuantite() {
  return $this->quantite;
 }

 public function __toString() {
  return "prod_id: ".$this->producteur_id ." vin_id: ". $this->vin_id;
 }

 public static function view() {
  printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", $this->getProducteurId(), $this->getVinId(), $this->getQuantite());
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from recolte";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getBest() {
  try {
   $database = Model::getInstance();
   $query = "select v.annee as annee, r.quantite as quantite from recolte r, vin v, producteur p "
           . "where r.producteur_id = p.id and r.vin_id = v.id group by v.annee order by r.quantite desc";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement;
   $results ->setFetchMode(PDO::FETCH_ASSOC);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($producteur_id, $vin_id, $quantite) {
  try {
   $database = Model::getInstance();
   $query = "insert into recolte value (:producteur_id, :vin_id, :quantite)";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur_id,
     'vin_id' => $vin_id,
     'quantite' => $quantite,
   ]);
   return $producteur_id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function delete($producteur_id, $vin_id) {
  try {
   $database = Model::getInstance();
   $query = "delete from recolte where producteur_id = :producteur_id and vin_id = :vin_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur_id,
     'vin_id' => $vin_id,
   ]);
   return $producteur_id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 public static function getOneProducteur($producteur_id) {
  try {
   $database = Model::getInstance();
   $query = "select  v.cru as cru, v.annee as annee, quantite from recolte, producteur p, vin v "
           . "where p.id = recolte.producteur_id and v.id = recolte.vin_id and producteur_id = :producteur_id order by v.annee";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur_id
   ]);
   $results = $statement;
   $results ->setFetchMode(PDO::FETCH_ASSOC);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
