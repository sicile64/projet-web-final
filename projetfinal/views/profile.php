<!DOCTYPE html>
<html>
    <head>
        <title>Profil</title>
        <meta charset = "utf-8"/>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
<?php include 'includes/menu.php' ?>
        <div align="center">
            <h2>Profil de <?=$userinfo['login'] ?></h2>
            <br>
            <label>Login : <?=$userinfo['login'] ?></label>
      <br>
      <label>Email : <?=$userinfo['email'] ?></label>
      <br>
            <label>Age :
            <?php
            $date_actuelle = new Datetime();
            $date_naiss = new Datetime($userinfo['datenaiss']);
            echo $date_actuelle->diff($date_naiss)->format('%Y ans');
            ?>
            </label>
        </div>
    </body>
</html>
