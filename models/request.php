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

function Infoid($id)
{
 $bdd = co_db();
 $req = $bdd->query('SELECT * FROM clients WHERE idclient='.$id);
 return $info=$req->fetch();
}

function infogame($id)
{
  $bdd=co_db();
  $req=$bdd->query('SELECT * FROM jeux WHERE idjeux='.$id);
  return $info=$req->fetch();
}

function setGameData($id,$prix,$description,$date)
{
  $bdd=co_db();
   $req = $bdd->prepare('UPDATE jeux SET prix="'.$prix.'", description="'.$description.'", datesortie="'.$date.'" WHERE  idjeux='.$id);
   $req->execute();
}

function InfoGameplat($plateform){
    $bdd=co_db();
    $req = $bdd->query("SELECT * FROM jeux WHERE plateform IN (\"$plateform\")");
    return $req;
}

function creationPanier(){
  if(isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
    $_SESSION['panier']['nom']= array();
    $_SESSION['panier']['qte']= array();
    $_SESSION['panier']['prix']= array();
    $_SESSION['panier']['verrou']= false;
  }
  return true;
}

function ajoutPanier($idjeux, $nomjeux, $prix, $qte)
{
  if(creationPanier() && !isVerrouille())
  {
    $positionjeux = array_search($nomjeux, $_SESSION['panier']['nom']);
    if($positionjeux!==false)
    {
      $_SESSION['panier']['qte'][$positionjeux]+=$qte;
    }
    else
    {
      array_push($_SESSION['panier']['nom'],$nomjeux);
      array_push($_SESSION['panier']['prix'],$prix);
      array_push($_SESSION['panier']['qte'],$qte);
    }
  }
  else echo "problème survenu contacter l'administrateur pour en savoir plus sur la marche a suivre";
}


function modifqte($nomjeux, $qte)
{
  if(creationPanier() && !isVerrouille())
  {
    if($qte>0)
    {
      $positionjeux = array_search($nomjeux, $_SESSION['panier']['nom']);
      if($positionjeux!==false)
      {
        $_SESSION['panier']['qte'][$positionjeux]=$qte;
      }

    }
    else supprimerjeu($idjeux);
  }
  else echo "problème survenu contacter l'administrateur pour en savoir plus sur la marche a suivre";
}

function countJeux()
{
  if(isset($_SESSION['panier']))
 return count($_SESSION['panier']['nom']);
 else
 return 0;
}

function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['nom']); $i++)
   {
      $total += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
   }
   return $total;
}

function supprimejeu($nomjeux){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['nom'] = array();
      $tmp['qte'] = array();
      $tmp['prix'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['nom']); $i++)
      {
         if ($_SESSION['panier']['nom'][$i] !== $nomjeux)
         {
            array_push($tmp['nom'],$_SESSION['panier']['nom'][$i]);
            array_push($tmp['qte'],$_SESSION['panier']['qte'][$i]);
            array_push($tmp['prix'],$_SESSION['panier']['prix'][$i]);
         }
      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
function supprimePanier(){
   unset($_SESSION['panier']);
}

 ?>
