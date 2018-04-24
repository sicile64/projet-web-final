<?php
if(!isset($_SESSION['nb_jeu'])) $_SESSION['nbjeu']=0;
if(!empty($_SESSION['panier'])) $_SESSION['nbjeu']=compterArticles();
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">The World Of Video Games</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="accueil">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">jeux</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <form action="biblio" method="POST"><input type="hidden" name="plateform" value="PS4"><input class="dropdown-item" type="submit" value="PS4"></form>
              <form action="biblio" method="POST"><input type="hidden" name="plateform" value="XBOX"><input class="dropdown-item" type="submit" value="XBOX"></form>
              <form action="biblio" method="POST"><input type="hidden" name="plateform" value="PC"><input class="dropdown-item" type="submit" value="PC"></form>

            </div>
          </li>
          <?php
          if(!empty($_SESSION['login']))
          {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Magasin</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="boutique">Mon paniers <?php if(isset($_SESSION['panier'])){?>(<?=$_SESSION['nbjeu']?>)</a>
                <?php } else{?>(0)<?php } ?>
              </div>
            </li>

            <?php
          }
         ?>
         <?php if(!empty($_SESSION['login'])) {?>

           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Utilisateur</a>
             <div class="dropdown-menu" aria-labelledby="dropdown01">
               <a class="dropdown-item" href="profile">Profil de <?=$_SESSION['login']?></a>
               <a class="dropdown-item" href="logout">Deconnexion</a>
             </div>

           <?php }else{
             if(isset($_SESSION['login_admin'])){
               ?>
               <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion</a>
                 <div class="dropdown-menu" aria-labelledby="dropdown01">
                   <a class="dropdown-item" href="panneau">Gestion utilisateur</a>
                   <a class="dropdown-item" href="panneaujeux">Gestion des jeux</a>
                   <a class="dropdown-item" href="logout">Deconnexion</a>
                 </div>
            <?php }else{?>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Utilisateur</a>
           <div class="dropdown-menu" aria-labelledby="dropdown01">
             <a class="dropdown-item" href="connexion">Connexion</a>
             <a class="dropdown-item" href="inscription">Inscription</a>
           </div>
         </li>
       <?php }}?>
          <?php if(!empty($_SESSION['login'])){
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="feedback">FeedBack</a>
              </div>
            </li>
        <?php }else {?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="connexion">FeedBack</a>
            </div>
          </li>
          <?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="rechercher" aria-label="Rechercher">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
      </div>
    </nav>
