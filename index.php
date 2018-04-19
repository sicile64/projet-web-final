<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = array_filter(explode('/', $uri));
if (count($segments) == 0 or $segments[1] === 'index')
{
    $file = 'accueil';
}
else
{
    $file = $segments[1];
}
$controller = 'controllers/'.$file.'.php';
if (count($segments) <= 1 and file_exists($controller)) {
    include $controller;
}
else {
    include 'controllers/404.php';
}
?>
