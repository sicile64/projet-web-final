
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset = "utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>liste commande</title>

  </head>
  <body>
    <h1>Commande</h1>
    <table classe='table'>
      <thead class="thead-dark">
        <tr>
          <th scope="col" >date</th>
          <th scope="col">jacket</th>
          <th scope="col">nom</th>
          <th scope="col">plateform</th>
          <th scope="col">Editeur</th>
          <th scope="col">prix totale</th>
          <th scope="col">quantité</th>
        </tr>
    </thead>

      <?php while($result = $req->fetch()) { ?>
          <li>
            <tr>
            <?php
            if($onum != $result['idcommande']) {
              $onum = $result['idcommande'];?>
            <td><label><?=$result['datecom'] ?></label></td>
            <td scope="col"><?=$result['prixtot'] ?>€</td>
          <?php }?>


                  <td><img style="height:50px;width:50px"; src="<?=$repertoire.$result['jacket'] ?>"/></td>
                  <td scope="col"><?=$result['nom'] ?></td>
                  <td scope="col"><?=$result['plateform'] ?></td>
                  <td scope="col"><?=$result['editeur'] ?></td>
                  <td scope="col"><?=$result['prix'] ?></td>
                  <td scope="col"><?=$result['qteV'] ?></td>

                </tr>

              </table>
          </li>
      <?php  } ?>




  </body>
</html>
