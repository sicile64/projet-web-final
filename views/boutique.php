<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<title>Votre panier</title>
</head>
<body>
<div class="containerBoutique">
<form method="post" action="boutique">
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
				<th scope="col">Libellé</th>
				<th scope="col">Quantité</th>
				<th scope="col">Prix Unitaire</th>
				<th scope="col">Plateforme</th>
				<th scope="col">Action</th>
	    </tr>
	  </thead>

	<?php
	if (creationPanier())
	{?>
		<?php
	   $nbArticles=count($_SESSION['panier']['idjeux']);
	   if ($nbArticles <= 0){?>

	   <tr><td>Votre panier est vide <br/><br/><a href="accueil"><input type="button" value="Retour"></a></td></tr>

	 <?php }else{
	      for ($i=0 ;$i < $nbArticles ; $i++){?>
	          <tr>
	          <td><?=htmlspecialchars($_SESSION['panier']['nom'][$i])?></td>
	         	<td><input type="text" size="4" name="q[]" value=<?= htmlspecialchars($_SESSION['panier']['qte'][$i])?>></td>
	         	<td><?=htmlspecialchars($_SESSION['panier']['prix'][$i])?></td>
            <td><?=htmlspecialchars($_SESSION['panier']['plateform'][$i]) ?></td>
	       		<td><a href=<?=htmlspecialchars("boutique?action=suppression&l=".rawurlencode($_SESSION['panier']['idjeux'][$i]))?>>X</a></td>
	          </tr>
	    <?php } ?>

	       <tr><td colspan="2"> </td>
	       <td colspan="2">
	       Total : <?= MontantGlobal() ;?>€
	       </td></tr>

	       <tr><td colspan="4">
	       <input type="submit" value="Rafraichir"/>
	       <input type="hidden" name="action" value="refresh"/>
         <a href=<?=htmlspecialchars("boutique?action=suppressionPanier")?>><input type="button" value="Vider panier"></a>
				 <a href="biblio"><input type="button" value="continuer achat"></a>
         <a href="accueil"><input type="button" value="Retour"></a>
	       </td></tr>
				 <tr><td colspan="4">
				 <br>
				 <a href="validation"><input type="button" value="valider Achat(s)"></a>
			 	 </td></tr>
				 <?php
	   }
	}
	?>
</table>
</form>
</body>
</html>
