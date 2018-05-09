<div class="container">
<?php
if (!empty($error)) {
    include 'error.php';
}
?>
<br>
<h1><?= $title ?></h1>
<?= $content ?>
<main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="../images/ps4.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <form action="biblio" method="post">
                 <input type="hidden" name="plateform" value="PS4">
                 <input class="btn btn-sm btn-outline-secondary" type="submit" value="jeux PS4">
               </form>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="../images/xbox.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <form action="biblio" method="post">
                 <input type="hidden" name="plateform" value="XBOX">
                 <input class="btn btn-sm btn-outline-secondary" type="submit" value="jeux XBOX">
               </form>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="../images/pc.jpg "alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <form action="biblio" method="post">
                 <input type="hidden" name="plateform" value="PC">
                 <input class="btn btn-sm btn-outline-secondary" type="submit" value="jeux PC">
               </form>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>
