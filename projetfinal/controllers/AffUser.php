<?php
    if(!empty($_SESSION['login_admin'])){
       $req = AllinfoTable();
     while($donnees=$req->fetch()){
       ?>
  <div class="container">
    <div class="row">
          <div class="col-md-1"><div align="center"><?=$donnees['idclient'] ?></div></div>
          <div class="col-md-2"><div align="center"><?=$donnees['login'] ?></div></div>
          <div class="col-md-7"><div align="center"><?=$donnees['password'] ?></div></div>
          <div class="col-md-2"><div align="center">
            <form action="delete" method="get">
                <input type="hidden" name="id" value=<?=$donnees['idclient']?>>
                <input value="Supprimer" type="submit"/>
             </form>
          </div></div>
      </div>
    </div>
<?php
        }

    }
    else{
      header('Location:accueil');
    }
?>
