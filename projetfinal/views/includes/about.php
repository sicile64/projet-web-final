<?php
session_start();
include 'views/about.php';
?>
<?php ob_start() ?>
Voici mon projet.<br>
Il permet de s'authenitifer et de gérer des utilisateurs.
<?php
$title = 'A propos';
$content = ob_get_clean();
include 'includes/layout.php';
?>
