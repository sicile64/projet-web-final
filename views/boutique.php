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
	{
	   $nbArticles=count($_SESSION['panier']['idjeux']);
	   if ($nbArticles <= 0)
	   echo "<tr><td>Votre panier est vide <br/><br/><a href=\"biblio\"><input type=\"button\" value=\"Retour\"></a></ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo "<tr>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['nom'][$i])."</ td>";
	         echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qte'][$i])."\"/></td>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['prix'][$i])."</td>";
           echo "<td>".htmlspecialchars($_SESSION['panier']['plateform'][$i])."</td>";
	         echo "<td><a href=\"".htmlspecialchars("boutique?action=suppression&l=".rawurlencode($_SESSION['panier']['idjeux'][$i]))."\">X</a></td>";
	         echo "</tr>";
	      }

	      echo "<tr><td colspan=\"2\"> </td>";
	      echo "<td colspan=\"2\">";
	      echo "Total : ".MontantGlobal();
	      echo "</td></tr>";

	      echo "<tr><td colspan=\"4\">";
	      echo "<input type=\"submit\" value=\"Rafraichir\"/>";
	      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
        echo "<a href=\"".htmlspecialchars("boutique?action=suppressionPanier")."\"><input type=\"button\" value=\"Vider panier\"></a>";
        echo "<a href=\"biblio\"><input type=\"button\" value=\"Retour\"></a>";
	      echo "</td></tr>";
	   }
	}
	?>
</table>
</form>
</body>
</html>
