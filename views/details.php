<?php
if(!isset($_SESSION['nbjeu'])) $_SESSION['nbjeu']=0;
if(!empty($_SESSION['panier'])) $_SESSION['nbjeu']=compterArticles();
if(isset($_POST['id'])){
    $_SESSION['idjeux'] = $_POST['id'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../../css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
      <?php include 'includes/menu.php'?>

      <?php
      $requser = details($_SESSION['idjeux']);
      while($donnees=$requser->fetch()){
      ?>
            <div class="container">
                <div align="center">
                  <br>
                  <br>

                  <h2>Fiche de <?=$donnees['nom']?></h2>
                  <br>
                  <?php $repertoire = 'images/imgGame/'; ?>
                  <img style="height: 350px;width:350px" alt="<?=$donnees['nom']?>" src="<?=$repertoire.$donnees['jacket']?>">
                    <br>
                    <label>Nom du jeu : <?=$donnees['nom']?></label>
                    <br>
                    <label>Genre : <?=$donnees['genre']?></label>
                    <br>
                    <label> Editeur : <?=$donnees['editeur']?></label>
                    <br>
                    <label>Description : <?=$donnees['description']?></label>
                    <br>
                    <label>Pegi : <?=$donnees['pegi']?></label>
                    <br>
                    <label>Plateforme : <?=$donnees['plateform']?></label>
                    <br>
                    <label>Prix : <?=$donnees['prix']?> €</label>
                    <br>
                    <label>Date de sortie : <?=$donnees['datesortie']?></label>
                    <br>
                    <?php if(!empty($_SESSION['login'])){ ?>
                    <form action="addpaniers" method="post">
                      <input type="hidden" name="id" value="<?=$donnees['idjeux']?>" >
                      <input  type="submit" class="btn btn-outline-success my-2 my-sm-0" value="acheter">
                    </form>
                  <?php } ?>
                      <a href="accueil"><button align="center" class="btn btn-outline-success my-2 my-sm-0" type="button" name="button">Retour</button><a>


                </div>
            </div>
    <?php }   $requser->closeCursor();?>
    <?php include 'includes/footers.php' ?>
</body>

</html>
