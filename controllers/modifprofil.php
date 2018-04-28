<?php

if(!empty($_POST)){
  if(!empty($_POST['oldpassword']) AND !empty($_POST['newpassword']) AND !empty($_POST['passwordconf']))
  {
    $bdd=co_db();
    $oldpassword=rechpassword($_SESSION['id']);
    $oldpassword=$oldpassword->fetch();
    $errorMessage=$oldpassword;
    $password=md5($_POST['newpassword']);
    $passwordconf=md5($_POST['passwordconf']);
    $pass=md5($_POST['oldpassword']);

    if ($oldpassword==$pass)
    {
      if($password==$passwordconf)
      {
        $errorMessage="test";
        setProfile($password);
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
  }


}
 ?>
