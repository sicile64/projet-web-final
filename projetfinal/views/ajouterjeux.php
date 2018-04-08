<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/connexion.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>

  <body>
    <form class="form-signin" method="post">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">ajouter jeux</h1>
      </div>
      <div class="form-label-group">
        <input type="text" id="nom" class="form-control" placeholder="nom" name="nom" required autofocus>
        <label for="nom">nom</label>
      </div>
      <div class="form-label-group">
        <input type="text" id="genre" class="form-control" placeholder="genre" name="genre" required>
        <label for="genre">genre</label>
      </div>
      <div class="form-label-group">
        <input type="text" id="plateforme" class="form-control" placeholder="plateforme" name="plateforme" required>
        <label for="plateforme">plateforme</label>
      </div>
      <div class="form-label-group">
        <input type="text" id="editeur" class="form-control" placeholder="editeur" name="editeur" required>
        <label for="editeur">editeur</label>
      </div>
      <div class="form-label-group">
        <input type="number" step="0.01" id="prix" class="form-control" placeholder="prix" name="prix" required>
        <label for="prix">prix</label>
      </div>
      <div class="form-label-group">
        <input type="number"  id="pegi" class="form-control" placeholder="pegi" name="pegi" required>
        <label for="pegi">pegi</label>
      </div>
      <div class="form-label-group">
        <textarea name="description" class="textarea" required></textarea>
      </div>
    <div class="form-label-group">
      <input type="date" id="date" class="form-control" placeholder="date" name="date" required>
      <label for="date">date de sortie</label>
    </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">ajouter</button>
      <br>
      <a href="accueil"><button class="btn btn-lg btn-primary btn-block" type="button">Retour</button></a>
      <p class="mt-5 mb-3 text-muted text-center">&copy;Costa Francesco 2017-2018</p>
      <?php
          // Rencontre-t-on une erreur ?
              if(isset($errorMessage)){
                  echo '<font color="red">'.$errorMessage."</font>";
              }
          ?>
    </form>

  </body>

</html>
