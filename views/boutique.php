<!DOCTYPE html>
<html>
<head>
<title>Votre panier</title>
</head>
<body>
<form method="post" action="panier">
<table style="width:800px">
    <tr>
        <td colspan="4">Votre panier</td>
    </tr>
    <tr>
        <td>Libellé</td>
        <td>Quantité</td>
        <td>Prix Unitaire</td>
        <td>Action</td>
    </tr>
<?php
    if (creationPanier())
    {
        $nb_jeu=count($_SESSION['panier']['nom_jeu']);
        if ($nb_jeu <= 0)
        echo "<tr><td>Votre panier est vide <br/><br/><a href="boutique"><input type="button" value="Retour"></a></td></tr>";
        else
        {
            for ($i=0 ;$i < $nb_jeu ; $i++)
            {
                 echo "<tr>";
                 echo "<td>".htmlspecialchars($_SESSION['panier']['nom_jeu'][$i])."</ td>";
                 echo "<td><input type="text" size="4" name="q[]" value="".htmlspecialchars($_SESSION['panier']['qte_jeu'][$i]).""/></td>";
                 echo "<td>".htmlspecialchars($_SESSION['panier']['prix_jeu'][$i])."</td>";
                 echo "<td><a href="".htmlspecialchars("panier?action=suppression&n=".rawurlencode($_SESSION['panier']['nom_jeu'][$i])).""><input type="button" value="X"></a></td>";
                 echo "</tr>";
            }
            echo "<tr><td colspan="2"></td>";
            echo "<td colspan="2">";
            echo "Total : ".MontantGlobal();
            echo "</td></tr>";
            echo "<tr><td colspan="4">";
            echo "<input type="submit" value="Rafraichir"/>";
            echo "<input type="hidden" name="action" value="refresh"/>";
      echo "<a href="".htmlspecialchars("panier?action=suppression_panier").""><input type="button" value="Vider le panier"></a>";
      echo "<a href="boutique"><input type="button" value="Retour"></a>";
            echo "</td></tr>";
      echo "<tr><td colspan="4">";
        }
    }
    ?>
</table>
</form>
</body>
</html>
