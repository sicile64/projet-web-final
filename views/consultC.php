<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
    <?php include("includes/menu.php");?>
    <div class="container">
    <br><br><br><h2 align="center">Commande de <?=$_SESSION['login']?></h2><br>
    <table class="table table-hover table-dark">
      <?php while($result = $req->fetch()){
            if($onum != $result['idcommande']){
            $onum = $result['idcommande']; ?>
            <tr>
              <td scope="row">Date: <?=$result['datecom'] ?></td>
              <td scope="row">Total: <?=$result['prixtot'] ?> €</td>
            </tr>
          <?php } ?>
              <tbody>
                <tr>
                  <th scope="row"><img style="height:50px;width:50px;" src="<?=$repertoire.$result['jacket'] ?>"/></th>
                  <th scope="row"><?=$result['qteV']."x ".$result['nom'] ?></th>
                  <td scope="row"><?=$result['plateform'] ?></td>
                  <td scope="row"><?=$result['editeur'] ?></td>
                  <td scope="row"><?=$result['prix'] ?> € /P</td>
                </tr>
              </tbody>
      <?php  }  $req->closeCursor();?>
    </table>
    </div>
  </body>
</html>
