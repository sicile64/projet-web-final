<?php
if(!empty($_POST)){
  if(!empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['passwordconf']))
  {
    $bdd=co_db();
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordconf=$_POST['passwordconf'];
    if($password==$passwordconf)
    {
      
    }


  }



 ?>
