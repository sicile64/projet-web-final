<?php
session_start();
include('models/bdd.php');
include('models/request.php');
if($_POST)
{
    if(!empty($_POST['id'])){
      creationPanier();
      $id=$_POST['id'];
      $infogame=infogame($id);
      $idjeux=$infogame['idjeux'];
      $nomjeux=$infogame['nom'];
      $prix=$infogame['prix'];
      $qte=1;
      ajoutPanier($idjeux, $nomjeux, $prix, $qte);
      header('Location:biblio');
    }
}



 ?>
