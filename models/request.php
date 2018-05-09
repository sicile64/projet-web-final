<?php
//pour voir si le login existe lors de la connexion
 function logExist($login) {
   $bdd = co_db();
   $reponse = $bdd->prepare("SELECT * FROM clients  WHERE login = ?");
   $reponse->execute(array($login));
   return $reponse->rowCount();

 }

//pour savoir si le mail existe lors de la connexion
 function emailExist($email) {
   $bdd = co_db();
   $reponse = $bdd->prepare("SELECT * FROM clients WHERE email = ?");
   $reponse->execute(array($email));
   return $reponse->rowCount();
 }
//fonction qui permet d'ajouter des user a la db
 function addUser($login, $password, $email, $datenaiss){
  $bdd = co_db();
  $req = $bdd->prepare("INSERT INTO clients(login, password, email, datenaiss) VALUES(?, ?, ?, ?)");
  $req->execute(array($login, $password, $email, $datenaiss));
  return $req;
}

//permet de savoir si c'est un client
function getUser($login) {
    $bdd = co_db();
    $req = $bdd->query("SELECT * FROM clients WHERE login IN(\"$login\")");
    $info=$req->fetch();
    $req->closeCursor();
    return $info;
}

//permet de savoir si c'est un admin
function getAdmin($login) {
    $bdd = co_db();
    $req = $bdd->query("SELECT * FROM admin WHERE login IN(\"$login\")");
    $info=$req->fetch();
    $req->closeCursor();
    return $info;
}
//permet de voir info commande
function infoCommande($id){
  $bdd=co_db();
  $req=$bdd->prepare("SELECT c.idcommande,c.datecom,cf.qteV,cf.prix,c.prixtot,j.nom,j.editeur,j.plateform,j.jacket,j.description FROM commande AS c, commandef AS cf, jeux AS j WHERE c.idcommande=cf.idcommande AND cf.idjeux=j.idjeux AND c.idclient=? ORDER BY c.idcommande");
  $req->execute(array($id));
  return $req;
}
function getCommandeAdmin($id){
$bdd=co_db();
$req=$bdd->prepare("SELECT c.idcommande,c.prixtot,c.datecom,cf.qteV,cf.prix,j.nom,j.editeur,j.plateform,j.jacket,j.description,cl.login FROM commande AS c, commandef AS cf, jeux AS j, clients AS cl WHERE c.idcommande=cf.idcommande AND cf.idjeux=j.idjeux AND c.idclient=?
  AND cl.idclient=? ORDER BY c.datecom ");
$req->execute(array($id,$id));
return$req;

}

//fonction pour le meilleur jeux vendue
function BGames() {
    $bdd = co_db();
    $req = $bdd->prepare("SELECT idjeux, SUM(qteV) mycount FROM commandef GROUP BY idjeux ORDER BY mycount DESC");
    $req->execute();

    return $req;
  }

function AllinfoTable(){
$bdd=co_db();
$req = $bdd->query("SELECT * FROM clients");
return $req;
}

//supprimer un utilisateur en fonction de l'id
function delUser($id){
 $bdd = co_db();
 $req = $bdd->query('DELETE FROM clients WHERE idclient = '.$id);
 return $req;
}

//savoir si le jeux existe sur cette Plateforme
function gameExist($nom ,$plateforme) {
  $bdd = co_db();
  $reponse = $bdd->prepare("SELECT * FROM jeux  WHERE nom = ? AND plateform= ?");
  $reponse->execute(array($nom ,$plateforme));
  return $reponse->rowCount();
}

//ajouter un jeux la db
function addGame($nom, $genre, $plateforme, $editeur, $prix, $pegi,$description, $date, $jacket){
 $bdd = co_db();
 $req = $bdd->prepare("INSERT INTO jeux(nom, genre, plateform, editeur, prix, pegi,description,datesortie,jacket) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $req->execute(array($nom, $genre, $plateforme, $editeur, $prix, $pegi, $description, $date, $jacket));
 return $req;
}

//avoir tout les info des jeux
function AllinfoGame(){
$bdd=co_db();
$req = $bdd->query("SELECT * FROM jeux");
return $req;
}

//de rechercher un jeux avec la barre de recherche
 function rechercherjeux($chercher)
 {
   $bdd=co_db();
   $req=$bdd->prepare("SELECT * FROM jeux WHERE nom like concat('%',?,'%')");
   $req->execute(array($chercher));
   return $req;
 }

//supprimer un jeux
function delGame($id){
 $bdd = co_db();
 $req = $bdd->query('DELETE FROM jeux WHERE idjeux = '.$id);
 return $req;
}

//info client en fnction de l'id
function Infoid($id)
{
 $bdd = co_db();
 $req = $bdd->query('SELECT * FROM clients WHERE idclient='.$id);
 $info=$req->fetch();
 $req->closeCursor();
 return $info;
}

//info sur le jeux en focntion de l' id
function infogame($id)
{
  $bdd=co_db();
  $req=$bdd->query('SELECT * FROM jeux WHERE idjeux='.$id);
  $info=$req->fetch();
  $req->closeCursor();
  return $info;
}

//permet d' ajouter a la table commandef
function addjeuvendu($onum, $panier){
        $bdd = co_db();
        $req = $bdd->prepare("INSERT INTO commandef (idcommande,idjeux,qteV,prix) VALUES (?,?,?,?)");
        for($i=0;$i<count($panier['idjeux']);$i++){
            $req->execute(array($onum,$panier['idjeux'][$i],$panier['qte'][$i],$panier['prix'][$i]));
        }
        return true;
}
//permet de commander un jeux
function addcommande($idclient, $total){
    $bdd = co_db();
    $req = $bdd->prepare("INSERT INTO commande(idclient,prixtot, datecom) VALUES(?, ?, NOW())");
    $req->execute(array($idclient, $total));
    return true;

}

//permet de savoir le dernier enregistrement
function Lastonum(){
    $bdd = co_db();
    $req = $bdd->query("SELECT idcommande FROM commande ORDER BY idcommande DESC LIMIT 1");
    $info=$req->fetch();
    $req->closeCursor();
    return $info;
}

//mettre a jour un jeux
function setGameData($id,$prix,$description,$date)
{
  $bdd=co_db();
   $req = $bdd->prepare('UPDATE jeux SET prix="'.$prix.'", description="'.$description.'", datesortie="'.$date.'" WHERE  idjeux='.$id);
   $req->execute();
}

//mettre a jour un mots de passe
function setPassword($password, $id)
{
  $bdd=co_db();
  $req=$bdd->prepare('UPDATE clients SET password=? WHERE idclient=?');
  $req->execute(array($password,$id));
}

//permet de changer les mail en foncion de l id
function setEmail($newemail,$id)
{
  $bdd=co_db();
  $req=$bdd->prepare('UPDATE clients SET email=? WHERE idclient= ?');
  $req->execute(array($newemail,$id));
}

//permet de savoir si le mots de passs existe
function rechpassword($id)
{
  $bdd=co_db();
  $req = $bdd->query("SELECT password FROM clients WHERE idclient=".$id);
  return $req;
}

//permet de savoir si le mail existe
function rechemail($id)
{
  $bdd=co_db();
  $req = $bdd->query("SELECT email FROM clients WHERE idclient=".$id);
  return $req;
}

//fonction qui permet de prendre tout les information des jeux en fonction de Plateforme
function InfoGameplat($plateform){
    $bdd=co_db();
    $req = $bdd->query("SELECT * FROM jeux WHERE plateform IN (\"$plateform\")");
    return $req;
}

//fonction qui va chercher tout les jeux pour les fetch
function InfoGameid($id){
  $bdd = co_db();
  $requser = $bdd->query("SELECT * FROM jeux WHERE idjeux=".$id);
  $info=$requser->fetch();
  $requser->closeCursor();
  return $info;
}

//fonction qui va chercher tout les info pour les détails
function details($id){
  $bdd = co_db();
  $requser = $bdd->query("SELECT * FROM jeux WHERE idjeux=".$id);
  return $requser;
}

//permet de créer un panier
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

//fonction qui permet d'ajouter des article au panier
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

//modifier la quantité des article dans le panier
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

//fonction qui permet de supprimer un article du panier
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

//fonction pour le montant global du panier
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['idjeux']); $i++)
   {
      $total += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
   }
   return $total;
}

//fonction pour supprimer le panier
function supprimePanier(){
   unset($_SESSION['panier']);
}

//fonction qui permet de compter les article du panier
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['idjeux']);
   else
   return 0;

}

 ?>
