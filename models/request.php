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

 function rechercherjeux($chercher)
 {
   $bdd=co_db();
   $req=$bdd->prepare("SELECT * FROM jeux WHERE nom like concat('%',?,'%')");
   $req->execute(array($chercher));
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

function addjeuvendu($onum, $panier){
        $bdd = co_db();
        $req = $bdd->prepare("INSERT INTO commandef (idcommande,idjeux,qteV,prix) VALUES (?,?,?,?)");
        for($i=0;$i<count($panier['idjeux']);$i++){
            $req->execute(array($onum,$panier['idjeux'][$i],$panier['qte'][$i],$panier['prix'][$i]));
        }
        return true;
}

function addcommande($idclient, $total){
    $bdd = co_db();
    $req = $bdd->prepare("INSERT INTO commande(idclients, prix, datecom) VALUES(?, ?, NOW())");
    $req->execute(array($idclient, $total));
    return true;

}

function Lastonum(){
    $bdd = co_db();
    $req = $bdd->query("SELECT idcommande FROM commande ORDER BY idcommande DESC LIMIT 1");
    return $req->fetch();
}


function setGameData($id,$prix,$description,$date)
{
  $bdd=co_db();
   $req = $bdd->prepare('UPDATE jeux SET prix="'.$prix.'", description="'.$description.'", datesortie="'.$date.'" WHERE  idjeux='.$id);
   $req->execute();
}

function setPassword($password)
{
  $bdd=co_db();
  $req=$bdd->prepare('UPDATE clients SET password=?');
  $req->execute(array($password));
}

function setEmail($newemail)
{
  $bdd=co_db();
  $req=$bdd->prepare('UPDATE clients SET email=?');
  $req->execute(array($newemail));
}

function rechpassword($id)
{
  $bdd=co_db();
  $req = $bdd->query("SELECT password FROM clients WHERE idclient=".$id);
  return $req;
}

function rechemail($id)
{
  $bdd=co_db();
  $req = $bdd->query("SELECT email FROM clients WHERE idclient=".$id);
  return $req;
}

function InfoGameplat($plateform){
    $bdd=co_db();
    $req = $bdd->query("SELECT * FROM jeux WHERE plateform IN (\"$plateform\")");
    return $req;
}

function InfoGameid($id){
  $bdd = co_db();
  $requser = $bdd->query("SELECT * FROM jeux WHERE idjeux=".$id);
  return $info=$requser->fetch();
}

function details($id){
  $bdd = co_db();
  $requser = $bdd->query("SELECT * FROM jeux WHERE idjeux=".$id);
  return $requser;
}

function creationPanier(){
	if(!isset($_SESSION['panier'])){
      $_SESSION['panier'] = array();
      $_SESSION['panier']['idjeux'] = array ();
      $_SESSION['panier']['nom'] = array();
      $_SESSION['panier']['qte'] = array();
      $_SESSION['panier']['prix'] = array();
			$_SESSION['panier']['plateform'] = array();
			$_SESSION['panier']['verrou'] = false;
   }
   return true;
}

function ajoutPanier($idjeu, $nomjeu, $prix, $qte, $plateform){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($idjeu,  $_SESSION['panier']['idjeux']);
      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qte'][$positionProduit] += $qte ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['idjeux'],$idjeu);
         array_push( $_SESSION['panier']['nom'],$nomjeu);
         array_push( $_SESSION['panier']['qte'],$qte);
         array_push( $_SESSION['panier']['prix'],$prix);
         array_push( $_SESSION['panier']['plateform'],$plateform);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}

function modifierQTeArticle($idjeu,$qte){
   //Si le panier éxiste
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qte > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($idjeu,  $_SESSION['panier']['idjeux']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qte'][$positionProduit] = $qte ;
         }
      }
      else
      supprimerArticle($idjeu);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function supprimerArticle($idjeu){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['idjeux'] = array();
      $tmp['nom'] = array();
      $tmp['qte'] = array();
      $tmp['prix'] = array();
      $tmp['plateform'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['nom']); $i++)
      {
         if ($_SESSION['panier']['idjeux'][$i] !== $idjeu)
         {
            array_push( $tmp['idjeux'],$_SESSION['panier']['idjeux'][$i]);
            array_push( $tmp['nom'],$_SESSION['panier']['nom'][$i]);
            array_push( $tmp['qte'],$_SESSION['panier']['qte'][$i]);
            array_push( $tmp['prix'],$_SESSION['panier']['prix'][$i]);
            array_push( $tmp['plateform'],$_SESSION['panier']['plateform'][$i]);
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

function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['idjeux']); $i++)
   {
      $total += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
   }
   return $total;
}

function supprimePanier(){
   unset($_SESSION['panier']);
}

function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['idjeux']);
   else
   return 0;

}

 ?>
