<!DOCTYPE html>
<html>
    <head>
        <title>Panneau Administrateur</title>
        <meta charset = "utf-8"/>
        <meta charset = "utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/panneaujeux.css">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <?php include 'includes/menuAdmin.php' ?>
        <br/>
        <h1 align="center"> Panneau Jeux </h1>
        <br/>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col"><div align="center">Nom</div></th>
              <th scope="col"><div align="center">Genre</div></th>
              <th scope="col"><div align="center">Plateforme</div></th>
              <th scope="col"><div align="center">Editeur</div></th>
              <th scope="col"><div align="center">Prix</div></th>
              <th scope="col"><div align="center">Pegi</div></th>
              <th scope="col"><div align="center">Description</div></th>
              <th scope="col"><div align="center">Date de sortie</div></th>
              <th scope="col"><div align="center">Modifier</div></th>
              <th scope="col"><div align="center">Supprimer</div></th>
            </tr>
          </thead>
</html>
