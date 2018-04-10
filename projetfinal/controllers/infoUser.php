<?php
if($_SESSION['id'])
{
    $id = $_SESSION['id'];
    $userinfo = Infoid($id);
}
else{
    header("location: accueil");
}
?>
