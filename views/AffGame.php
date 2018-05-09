<?php
    if(!empty($_SESSION['login_admin'])){
       $req = AllinfoGame();
     while($donnees=$req->fetch()){
       ?>
       <tr>
          <td><div align="center"><?=$donnees['nom'] ?></div></td>
          <td><div align="center"><?=$donnees['genre'] ?></div></td>
          <td><div align="center"><?=$donnees['plateform'] ?></div></td>
          <td><div align="center"><?=$donnees['editeur'] ?></div></td>
          <td><div align="center"><?=$donnees['prix'] ?></div></td>
          <td><div align="center"><?=$donnees['pegi'] ?></div></td>
          <td><div align="center"><?=$donnees['description'] ?></div></td>
          <td><div align="center"><?=$donnees['datesortie'] ?></div></td>
          <td><div align="center">
          <form action="editgame" method="get">
                <input type="hidden" name="id" value=<?=$donnees['idjeux']?>>
                <input value="modifier" type="submit"/>
             </form>
          </td></div>

          <td><div align="center">
            <form action="delgame" method="get">
                <input type="hidden" name="id" value=<?=$donnees['idjeux']?>>
                <input value="Supprimer" type="submit"/>
             </form>
          </td></div>
       </tr>
<?php
        }

        $req->closeCursor();


    }
    else{
      header('Location:accueil');
    }
?>
