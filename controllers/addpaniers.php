<?php
session_start();
include('models/bdd.php');
include('models/request.php');
if($_POST)
{
    if(!empty($_POST('id'))){
      creatpaniers();
      $id=$_POST['id'];
      $infogame=infogame($id);
      $idjeux=$infogame['id'];
    }
}



 ?>
