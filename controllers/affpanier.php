<?php
$erreur = false;
$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null){
   if(!in_array($action,array('ajout', 'suppression', 'suppression_panier', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
    $n = (isset($_POST['n'])? $_POST['n']:  (isset($_GET['n'])? $_GET['n']:null )) ;
    $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
    $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $n = preg_replace('#\v#', '',$n);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier

   if (is_array($q)){
      $qte = array();
      $i=0;
      foreach ($q as $contenu){
         $qte[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);

}
if(!$erreur){
   switch($action){
      Case "ajout":
         ajoutPanier($n,$q,$p);
         break;

      Case "suppression":
            supprimejeu($n);
         break;

      Case "suppression_panier":
          supprimePanier();
          break;

      Case "refresh" :
         for ($i = 0 ; $i < count($qte) ; $i++)
         {
             modifqte($_SESSION['panier']['nom'][$i],round($qte[$i]));

         }
         break;

      Default:
         break;
   }
}
?>
