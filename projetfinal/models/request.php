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
 ?>
