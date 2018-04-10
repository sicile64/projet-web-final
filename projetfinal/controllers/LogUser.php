<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
         $getUser=getUser($_POST['loginconnect']);
         $getAdmin=getAdmin($_POST['loginconnect']);
         if(!empty($getUser)) {
            $password=md5($_POST['passwordco']);
            if($getUser['password']==$password){
                session_start();
                $_SESSION['login'] = $getUser['login'];
                $_SESSION['id'] = $getUser['idclient'];
                header('Location: accueil');
            

            }
            else {
                $errorMessage="error mots de passe";
            }
         }
         else if(!empty($getAdmin)){
           $password=md5($_POST['passwordco']);
           if($getAdmin['password']==$password) {
               session_start();
               $_SESSION['login_admin'] = $getAdmin['login'];
               $_SESSION['id_admin'] = $getAdmin['idadmin'];
               header('Location: accueil');
           }
           else {
             $errorMessage="error mots de passe";
           }
         }
         else {
            $errorMessage="error";
         }
    }





 ?>
