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
<form method="post">
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
	{
	   $nbArticles=count($_SESSION['panier']['idjeux']);
	   if ($nbArticles > 0){
	      for ($i=0 ;$i < $nbArticles ; $i++){?>

	          <tr>
	          <td><?=htmlspecialchars($_SESSION['panier']['nom'][$i])?></td>
	         	<td><?=htmlspecialchars($_SESSION['panier']['qte'][$i])?></td>
	         	<td><?=htmlspecialchars($_SESSION['panier']['prix'][$i])?></td>
            <td><?=htmlspecialchars($_SESSION['panier']['plateform'][$i]) ?></td>
	          </tr>
	    <?php } ?>

	       <tr><td colspan="2"></td>
	       <td colspan="2">
	       Total : <?= MontantGlobal() ;?> €
	       </td></tr>
	       <tr><td colspan="4">
				 <input type="submit" value="commander">
         <a href="accueil"><input type="button" value="Retour"></a>
	       </td></tr>
				 <?php
	   }
	}
	?>
</table>
</form>
</body>
</html>
