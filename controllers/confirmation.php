<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
      $req = false;
      $add = false;
      $idclient = $_SESSION['id'];
      $total = MontantGlobal();
      $req = addcommande($idclient, $total);
      $onum = Lastonum();
      $add = addjeuvendu($onum['idcommande'], $_SESSION['panier']);

      if($req && $add){
       supprimePanier();
       header("Location:biblio");
      }
      else{
        echo 'Erreur';
      }
    }
?>
