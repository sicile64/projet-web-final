<!DOCTYPE html>
<html>
    <head>
        <title>Profil</title>
        <meta charset = "utf-8"/>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="/css/style.css">
            <link rel="stylesheet" href="/css/profile.css">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
<?php include 'includes/menu.php' ?>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
<div class="panel panel-info">
<div class="panel-heading">
  <br>
  <br>
  <h3>Profil de <?=$userinfo['login'] ?></h3>
</div>
<div class="panel-body">
  <div class="row">
    <div class=" col-md-9 col-lg-9 ">
      <table class="table table-user-information">
        <tbody>
          <tr>
            <td>Login:</td>
            <td><?=$userinfo['login'] ?></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><?=$userinfo['email'] ?></td>
          </tr>
          <tr>
             <td>Age :</td>
             <td><?php
             $date_actuelle = new Datetime();
             $date_naiss = new Datetime($userinfo['datenaiss']);
             echo $date_actuelle->diff($date_naiss)->format('%Y ans');
             ?></td>
           </tr>
           <tr>
             <td>
               <form class="" action="editpass" method="post">
                   <input type="hidden" name="id" value="<?=$userinfo['idclient']?>">
                   <input class="btn btn-lg btn-primary btn-block" type="submit" value="modifier mots de passe">
              </form>
            </td>
               <td>
                 <form class="" action="editemail" method="post">
                     <input type="hidden" name="id" value="<?=$userinfo['idclient']?>">
                     <input class="btn btn-lg btn-primary btn-block" type="submit" value="modifier adresse email">
                 </form>
               </td>
               <td>
                 <form class="" action="consultC" method="post">
                     <input type="hidden" name="id" value="<?=$userinfo['idclient']?>">
                     <input class="btn btn-lg btn-primary btn-block" type="submit" value="consulter commande">
                 </form>
              </td>
              <tr>
                <td><a href="accueil"><button class="btn btn-lg btn-primary btn-block" type="submit">Retour</button></a></td>
              </tr>


             </div>
           </tr>

         </tbody>
       </table>




        </div>
    </body>
</html>
