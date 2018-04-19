<?php

 function logExist($login) {
   $bdd = co_db();
   $reponse = $bdd->prepare("SELECT * FROM clients  WHERE login = ?");
   $reponse->execute(array($login));
   return $reponse->rowCount();
 }

 function emailExist($email) {
   $bdd = co_db();
   $reponse = $bdd->prepare("SELECT * FROM clients WHERE email = ?");
   $reponse->execute(array($email));
   return $reponse->rowCount();
 }

 function addUser($login, $password, $email, $datenaiss){
  $bdd = co_db();
  $req = $bdd->prepare("INSERT INTO clients(login, password, email, datenaiss) VALUES(?, ?, ?, ?)");
  $req->execute(array($login, $password, $email, $datenaiss));
  return $req;
}

function getUser($login) {
    $bdd = co_db();
    $req = $bdd->query("SELECT * FROM clients WHERE login IN(\"$login\")");
    return $info=$req->fetch();
}

function getAdmin($login) {
    $bdd = co_db();
    $req = $bdd->query("SELECT * FROM admin WHERE login IN(\"$login\")");
    return $info=$req->fetch();
}

function AllinfoTable(){
$bdd=co_db();
$req = $bdd->query("SELECT * FROM clients");
return $req;
}

function delUser($id){
 $bdd = co_db();
 $req = $bdd->query('DELETE FROM clients WHERE idclient = '.$id);
 return $req;
}

function gameExist($nom ,$plateforme) {
  $bdd = co_db();
  $reponse = $bdd->prepare("SELECT * FROM jeux  WHERE nom = ? AND plateform= ?");
  $reponse->execute(array($nom ,$plateforme));
  return $reponse->rowCount();
}

function addGame($nom, $genre, $plateforme, $editeur, $prix, $pegi,$description, $date, $jacket){
 $bdd = co_db();
 $req = $bdd->prepare("INSERT INTO jeux(nom, genre, plateform, editeur, prix, pegi,description,datesortie,jacket) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $req->execute(array($nom, $genre, $plateforme, $editeur, $prix, $pegi, $description, $date, $jacket));
 return $req;
}

function AllinfoGame(){
$bdd=co_db();
$req = $bdd->query("SELECT * FROM jeux");
return $req;
}

function delGame($id){
 $bdd = co_db();
 $req = $bdd->query('DELETE FROM jeux WHERE idjeux = '.$id);
 return $req;
}

function Infoid($id){
 $bdd = co_db();
 $req = $bdd->query('SELECT * FROM clients WHERE idclient='.$id);
 return $info=$req->fetch();
}

function infogame($id){
  $bdd=co_db();
  $req=$bdd->query('SELECT * FROM jeux WHERE idjeux='.$id);
  return $info=$req->fetch();

}

function setGameData($id,$prix,$description,$date){
  $bdd=co_db();
   $req = $bdd->prepare('UPDATE jeux SET prix="'.$prix.'", description="'.$description.'", datesortie="'.$date.'" WHERE  idjeux='.$id);
   $req->execute();
}

function InfoGameplat($plateform){
    $bdd=co_db();
    $req = $bdd->query("SELECT * FROM jeux WHERE plateform IN (\"$plateform\")");
    return $req;
}

 ?>
