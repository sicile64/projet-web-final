<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(!empty($_POST['nom']))
  {
    if(!empty($_POST['genre']))
    {
      if(!empty($_POST['plateforme']))
      {
        if(!empty($_POST['editeur']))
        {
          if(!empty($_POST['prix']))
          {
            if(!empty($_POST['pegi']))
            {
              if(!empty($_POST['description']))
              {
                  if(!empty($_POST['date']))
                  {
                    $nom = htmlspecialchars($_POST['nom']);
                    $genre = htmlspecialchars($_POST['genre']);
                    $plateforme =  htmlspecialchars($_POST['plateforme']);
                    $editeur =  htmlspecialchars($_POST['editeur']);
                    $prix = $_POST['prix'];
                    $pegi = $_POST['pegi'];
                    $date = $_POST['date'];
                    $description=$_POST['description'];
                    $gameExist = gameExist($nom ,$plateforme);
                    if($gameExist==1)
                    {

                        $errorMessage="le jeux exist déja";
                    }
                    else
                    {
                      if($prix<=0)
                      {
                          $errorMessage="le prix ne peux pas être négatif ";
                      }
                      else
                      {
                        if($pegi==3 OR $pegi==12 OR $pegi==16 OR $pegi==18)
                        {
                          if(!empty($_FILES['jacket']['name']))
                          {
                            $repertoire = 'images/imgGame/';
                            $file = $repertoire.basename($_FILES['jacket']['name']);
                            if (move_uploaded_file($_FILES['jacket']['tmp_name'], $file))
                            {
                                try{
                                      $quantité = 99;
                                      $req = addGame($nom, $genre, $plateforme, $editeur,$prix,$pegi,$description,$date,$_FILES['jacket']['name']);
                                      header('Location:panneaujeux');
                                         }
                                        catch (Exception $e){
                                          $errorMessage = "Une erreur c'est produite.";
                                         }
                                    } else {
                                        $errMsg = "Erreur inconnue! Merci de retenter l'ajout plus tard ou de contacter l'administrateur.";
                                    }
                            } else
                              {
                                $errMsg = 'Veuillez ajouter une jacket';
                              }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

  ?>
