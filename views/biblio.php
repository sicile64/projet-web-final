<?php
if(isset($_POST['plateform']))
{
  $_SESSION['plateform']=$_POST['plateform'];
}
 ?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset = "utf-8"/>
            <link rel="stylesheet" href="../../css/style.css">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <title><?=$_SESSION['plateform']?></title>
        </head>
        <body>
            <?php include 'includes/menu.php' ?>
      <h2 align="center">Actualité <?=$_POST['plateform']?></h2>
      <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
              <?php
              $req = InfoGameplat($_SESSION['plateform']);
              while($donnees=$req->fetch()){
              ?>
                <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                    <?php $repertoire='images/imgGame/'; ?>
                    <img class="card-img-top"  alt="<?=$donnees['nom']?>" src="<?=$repertoire.$donnees['jacket']?>">
                    <div class="card-body">
                      <p class="card-text"><?=$donnees['description']?></p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">Prix:<?=$donnees['prix']?>€</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Pegi:<?=$donnees['pegi']?></button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">détails</button>
                          <?php  if(isset($_SESSION['login_admin'])){ ?>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Editer</button>
                        <?php } ?>
                        <?php  if(isset($_SESSION['login'])){ ?>
                          <form action="addpaniers" method="post">
                            <input type="hidden" name="id" value="<?=$donnees['idjeux']?>" >
                            <input  type="submit" class="btn btn-sm btn-outline-secondary" value="ajouter au panier">
                          </form>
                      <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php }?>
              <?php  if(isset($_SESSION['login_admin'])){ ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="../../images/plus.png" alt="Card image cap">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="ajouterjeux"><button type="button" class="btn btn-sm btn-outline-secondary">ajouter un jeux </button></a>
                      <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
      </div>
            <?php include 'includes/footers.php' ?>
        </body>
</html>
