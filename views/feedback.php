<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/feedcss.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body><h1 align="center">feedback</h1>
  <br>
  <br>
  <div class="container">
    <form>
      <div class="form-group">
        <label for="id">idenfiant</label>
        <input type="text" disabled="disabled" class="form-control" id="login" placeholder="id" value="<?= $_SESSION['login'] ?>">
      </div>

      <div class="form-group">
        <label for="text">entrez text ici</label>
        <textarea class="form-control" id=""placeholder="entrez votre text ici" rows="5"></textarea>
      </div>
      <div class="button">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer </button>
      <br>
      <a href="accueil"><button class="btn btn-lg btn-primary btn-block"type="button">Retour</button></a>
    </div>
    </form>
  </div>




  </body>
</html>
