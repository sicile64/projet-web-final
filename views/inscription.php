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
    <form class="form-signin"method="post">
      <div class="text-center mb-4">
        <img class="imageco" src="" alt="img" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
      </div>
      <div class="form-label-group">
        <input type="text" id="login" class="form-control" placeholder="login" name="login" required autofocus>
        <label for="login">Login</label>
      </div>
      <div class="form-label-group">
        <input type="password" id="password" class="form-control" placeholder="password" name="password" required>
        <label for="password">mot de passe</label>
      </div>
      <div class="form-label-group">
        <input type="password" id="confpassword" class="form-control" placeholder="confpassword" name="confpassword" required>
        <label for="confpassword">confirmer mot de passe</label>
      </div>
      <div class="form-label-group">
        <input type="email" id="email" class="form-control" placeholder="inputEmail" name="email" required>
        <label for="email">E-mail</label>
      </div>
      <div class="form-label-group">
        <input type="date" id="datenaiss" class="form-control" placeholder="" name="datenaiss" required>
        <label for="datenaiss">date de naissance</label>
      </div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> s'incrire a la newsletter
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription </button>
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
