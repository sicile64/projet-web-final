<?php

if(!empty($_POST)){
  if(!empty($_POST['oldpassword']) AND !empty($_POST['newpassword']) AND !empty($_POST['passwordconf']))
  {
    $bdd=co_db();
    $req=rechpassword($_SESSION['id']);
    $oldpassword=$req->fetch();
    $password=md5($_POST['newpassword']);
    $passwordconf=md5($_POST['passwordconf']);
    $pass=md5($_POST['oldpassword']);

    if ($oldpassword['password']==$pass)
    {
      if($password==$passwordconf)
      {
        $err=setPassword($password);

        header('Location:profile');
      }
      else
      {
        $errorMessage="les mots de passe ne corresponde pas";
      }
    }
    else{
     $errorMessage="l'ancien mots de passe de correspond pas";
    }
  } elseif(isset($_POST['id'])) {
    $_SESSION['id'] = $_POST['id'];
  }
}
 ?>
