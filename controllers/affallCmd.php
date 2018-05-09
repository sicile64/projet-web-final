<?php
$title = "Commande";
$repertoire = 'images/imgGame/';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(!empty($_POST['login'])) {
    $req = getUser($_POST['login']);
    $req2 = getCommandeAdmin($req['idclient']);
    $onum = 0;
    if(empty($req))$errorMessage = "Client inexistant";
    if(empty($req2))$errorMessage = "Le client n'as aucune vente";
  }
}
else{
  header("Location: listeCA");
}
?>
