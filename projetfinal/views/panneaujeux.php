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
        <div class="container">
            <div class="row">
                        <div class="col-md-12"><div align="center">Données sur les jeux Bibliothèque</div></div>
                        <br>
                        <div class="col-md-1"><div align="center">ID</div></div>
                        <div class="col-md-2"><div align="center">Nom</div></div>
                        <div class="col-md-1"><div align="center">Genre</div></div>
                        <div class="col-md-1"><div align="center">plateforme</div></div>
                        <div class="col-md-2"><div align="center">editeur</div></div>
                        <div class="col-md-1"><div align="center">prix</div></div>
                        <div class="col-md-1"><div align="center">pegi</div></div>
                        <div class="col-md-5"><div align="center">description</div></div>
                        <div class="col-md-3"><div align="center">date de sortie</div></div>
            </div>
        </div>
</html>
