<?php
    if(!empty($_SESSION['login_admin'])){
       $req = AllinfoGame();
     while($donnees=$req->fetch()){
       ?>

    <div class="row">
          <div class="col-md-1"><div align="center"><?=$donnees['nom'] ?></div></div>
          <div class="col-md-1"><div align="center"><?=$donnees['genre'] ?></div></div>
          <div class="col-md-1"><div align="center"><?=$donnees['plateform'] ?></div></div>
          <div class="col-md-1"><div align="center"><?=$donnees['editeur'] ?></div></div>
          <div class="col-md-1"><div align="center"><?=$donnees['prix'] ?>€</div></div>
          <div class="col-md-1"><div align="center"><?=$donnees['pegi'] ?></div></div>
          <div class="col-md-3"><div align="center"><?=$donnees['description'] ?></div></div>
          <div class="col-md-1"><div align="center"><?=$donnees['datesortie'] ?></div></div>
          <div class="col-md-1"><div align="center">
            <form action="editgame" method="get">
                <input type="hidden" name="id" value=<?=$donnees['idjeux']?>>
                <input value="modifier" type="submit"/>
             </form>
          </div></div>
          <div class="col-md-1"><div align="center">
            <form action="delgame" method="get">
                <input type="hidden" name="id" value=<?=$donnees['idjeux']?>>
                <input value="Supprimer" type="submit"/>
             </form>
          </div></div>
      </div>
<?php
        }

    }
    else{
      header('Location:accueil');
    }
?>
