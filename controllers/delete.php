<?php
session_start();
include('models/bdd.php');
include('models/request.php');
$bdd=co_db();
$id=$_GET['id'];
$req=delUser($id);
header("Location:panneau");
?>
