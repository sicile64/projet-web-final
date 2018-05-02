<?php

if(!empty($_POST)){
  if(!empty($_POST['email']) AND !empty($_POST['password']))
  {
    $bdd=co_db();
    $req=rechpassword($_SESSION['id']);
    $request=rechemail($_SESSION['id']);
    $newemail=$_POST['email'];
    $confpass=md5($_POST['password']);
    $password=$req->fetch();
    $email=$request->fetch();
    echo $password['password'];
    echo '//////';
    echo $confpass;
    if($email['email']!=$newemail)
    {
      if ($password['password']==$confpass)
      {
          $err=setEmail($newemail);
          header('Location:profile');
      }
      else{
       $errorMessage="l'ancien mots de passe de correspond pas";
      }
    }
    else{
        $errorMessage="la nouvelle adresse email doit etre differente de l'ancienne";
      }

  }
  elseif(isset($_POST['id'])) {
    $_SESSION['id'] = $_POST['id'];
  }
}
 ?>
