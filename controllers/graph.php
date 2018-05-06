<?php

$req = BGames();
$resultat = array();
while($result=$req->fetch()) {
 $req2 = infogame($result['idjeux']);

 $info = "";

 $info = $req2['nom']."|".$result['mycount'];

 array_push($resultat, $info);
}

 ?>
