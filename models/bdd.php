<?php
function co_db() {
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projetfinal;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    return $bdd;
}
?>
