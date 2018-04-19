<div class="container">
<?php
if (!empty($error)) {
    include 'error.php';
}
?>
<br>
<?= $content ?>
<br>
<h1><?= $title ?></h1>
<section>
  <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a class="dropdown-item" href="ps4">PS4</a>
    </li>
    <li class="nav-item">
      <a class="dropdown-item" href="xbox">XBOX</a>
    </li>
    <li class="nav-item">
      <a class="dropdown-item" href="pc">PC</a>
    </li>
  </ul>
</section>
<div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="../../images/uncharted_collection.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"> Trilogie du célèbre Aventurier Nathan Drake en Remasteriser.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">voir plus</button>
                    <?php  if(isset($_SESSION['login_admin'])){ ?>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Editer</button>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="../../images/uncharted_collection.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"> Trilogie du célèbre Aventurier Nathan Drake en Remasteriser.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">voir plus</button>
                    <?php  if(isset($_SESSION['login_admin'])){ ?>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Editer</button>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="../../images/uncharted_collection.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"> Trilogie du célèbre Aventurier Nathan Drake en Remasteriser.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">voir plus</button>
                    <?php  if(isset($_SESSION['login_admin'])){ ?>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Editer</button>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
