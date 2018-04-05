
<!doctype html>
<html>
  <head>
    <title>Connexion</title>
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
        <img class="imageco" src="" alt="img" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
      </div>

      <div class="form-label-group">
        <input type="text" id="loginconnect" class="form-control" placeholder="login" name="loginconnect" required autofocus>
        <label for="loginconnect">Login</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="passwordco" class="form-control" placeholder="password" name="passwordco" required>
        <label for="passwordco">mot de passe</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> ce souvenir de moi
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion </button>
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
