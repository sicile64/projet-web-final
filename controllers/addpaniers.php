<?php
session_start();
require('models/bdd.php');
require('models/request.php');
if($_POST){
    if(!empty($_POST['id'])){
      creationpanier();
      $id = $_POST['id'];
      $infogame = InfoGameid($id);
      $idjeu = $infogame['idjeux'];
      $nomjeu = $infogame['nom'];
      $prix = $infogame['prix'];
      $plateform = $infogame['plateform'];
      $qte = 1;
      ajoutPanier($idjeu, $nomjeu, $prix, $qte, $plateform);
      header('Location: boutique');
   }
}
?>
