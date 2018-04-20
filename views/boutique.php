<!DOCTYPE html>
<html>
<head>
<title>Votre panier</title>
</head>
<body>

<form method="post" action="boutique">
<table style="width: 600px">
	<tr>
		<td colspan="4">Votre panier</td>
	</tr>
	<tr>
		<td>Libellé</td>
		<td>Quantité</td>
		<td>Prix Unitaire</td>
    <td>Plateforme</td>
		<td>Action</td>
	</tr>


	<?php
	if (creationPanier())
	{
	   $nbArticles=count($_SESSION['panier']['nom']);
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
	         echo "<td><a href=\"".htmlspecialchars("boutique?action=suppression&l=".rawurlencode($_SESSION['panier']['nom'][$i]))."\">X</a></td>";
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
