<?php
if(!empty($_POST))
{
    if(!empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['confpassword']) AND !empty($_POST['email']) AND !empty($_POST['datenaiss']))
    {

        $login = htmlspecialchars($_POST['login']);
        $password = md5($_POST['password']);
        $confpassword = md5($_POST['confpassword']);
        $email = htmlspecialchars($_POST['email']);
        $datenaiss = $_POST['datenaiss'];
        $logexist = logExist($login);
        if($password==$confpassword)
        {

            if(strlen($login) > 17 AND strlen($password) > 17)
            {

                $errorMessage = "Votre pseudo / password ne doivent pas dépasser les 16 caractères";
            }
            else
            {
                if($logexist==1)
                {

                    $errorMessage = "Votre pseudo est déjà pris";
                }
                else{
                      $emailexist = emailExist($email);
                      if($emailexist==0){

                          try{
                              $req = addUser($login, $password, $email, $datenaiss);
                              $errorMessage = "Votre compte a bien été créé ! connexion<a href=\"connexion\">ici</a>";
                          }
                          catch (Exception $e){
                              $errorMessage = "Une erreur c'est produite.";
                          }
                      }
                      else{
                        $errorMessage="Cette adresse mail est deja utilisée";
                        }
                  }
              }
        }
        else{
          $errorMessage = "les mots de passe ne correspondent pas";
        }
    }
    else
    {
        $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
}
?>
