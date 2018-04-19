<div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
        <?php
        $plateform = $_POST['plateform'];
        $req = InfoGameplat($plateform);
        while($donnees=$req->fetch()){
        ?>
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <?php $repertoire='images/imgGame/'; ?>
              <img class="card-img-top"  alt="<?=$donnees['nom']?>" src="<?=$repertoire.$donnees['jacket']?>">
              <div class="card-body">
                <p class="card-text"><?=$donnees['description']?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">voir plus</button>
                    <?php  if(isset($_SESSION['login_admin'])){ ?>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Editer</button>
                  <?php } ?>
                  <?php  if(isset($_SESSION['login'])){ ?>
                    <form  action="addpaniers" method="post">
                      <input type="hidden" name="id" value="<?=$donnees['idjeux']?>" >
                      <input  type="submit" class="btn btn-sm btn-outline-secondary" value="ajouter au panier">
                    </form>
                <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
        <?php  if(isset($_SESSION['login_admin'])){ ?>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="../../images/plus.png" alt="Card image cap">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="ajouterjeux"><button type="button" class="btn btn-sm btn-outline-secondary">ajouter un jeux </button></a>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>

    </div>
</div>
