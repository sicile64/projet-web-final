<?php
if(!empty($_POST))
{

    if(!empty($_POST['nom']) AND !empty($_POST['genre']) AND !empty($_POST['plateforme']) AND !empty($_POST['editeur']) AND !empty($_POST['prix']) AND !empty($_POST['pegi']) AND !empty($_POST['date']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $genre = htmlspecialchars($_POST['genre']);
        $plateforme =  htmlspecialchars($_POST['plateforme']);
        $editeur =  htmlspecialchars($_POST['editeur']);
        $prix = $_POST['prix'];
        $pegi = $_POST['pegi'];
        $date = $_POST['date'];
        $gameExist = gameExist($nom ,$plateforme);

        if($gameExist==1){

          $errorMessage="le jeux exist déja";
        }

        else{

          if($prix<=0){
              $errorMessage="le prix ne peux pas être négatif ";
          }
          else{
            if($pegi==3 OR $pegi==12 OR $pegi==16 OR $pegi==18)
            {
              try{
               $req = addGame($nom, $genre, $plateforme, $editeur,$prix,$pegi,$date);
               header('Location:ajouterjeux');
               $errorMessage = "le jeux à bien été ajouter";

               }
              catch (Exception $e){
                $errorMessage = "Une erreur c'est produite.";
               }
            }
            else{
              $errorMessage="pegi incorrect";
            }


          }

        }
    }
    else {
      $errorMessage="erreur champ";
    }
}
?>
