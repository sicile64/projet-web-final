<?php
$title = "Commande";
$repertoire = 'images/imgGame/';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(!empty($_POST['login'])) {
    $req = getUser($_POST['login']);
    $req2 = getCommandeAdmin($req['idclient']);
    $onum = 0;
  }
}
else{
  header("Location: listeCA");
}
?>
