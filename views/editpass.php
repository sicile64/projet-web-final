<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifier profile</title>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">modifier password</h1>
      </div>
      <form class="form-signin" method="post">
        <div class="form-label-group">
          <input type="password" id="oldpassword" class="form-control" placeholder="oldpassword" name="oldpassword" required autofocus>
          <label for="oldpassword"> ancien password</label>
        </div>
        <div class="form-label-group">
          <input type="password" id="newpassword" class="form-control" placeholder="newpassword" name="newpassword" required autofocus>
          <label for="newpassword"> nouveau password</label>
        </div>
        <div class="form-label-group">
          <input type="password" id="passwordconf" class="form-control" placeholder="passwordconf" name="passwordconf" required autofocus>
          <label for="passwordconf"> confirmer password</label>
        </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">modifier</button>
              <br>
              <a href="profile"><button class="btn btn-lg btn-primary btn-block" type="button">Retour</button></a>
        <?php
            // Rencontre-t-on une erreur ?
                if(isset($errorMessage)){
                    echo '<font color="red">'.$errorMessage."</font>";
                }
          ?>
      </form>
    </div>

  </body>
</html>
