<?php
if(!empty($_POST)){
  if(!empty($_POST['prix']) AND !empty($_POST['date']) AND !empty($_POST['description']))
  {
    $id=$_GET['id'];
    $prix=htmlspecialchars($_POST['prix']);
    $description=htmlspecialchars($_POST['description']);
    $date=$_POST['date'];
    $bdd=co_db();
    $infogame=infogame($id);
    if($prix==$infogame['prix'])
    {
      $errorMessage="vous ne pouvez pas mettre le même prix";
    }
    else{
      setGameData($id, $prix, $description, $date);
      header('Location:panneaujeux');
    }
  }
  else{
    $errorMessage="des champs sont vide";
  }

}
 ?>
