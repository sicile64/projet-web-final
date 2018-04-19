<div class="container">
<?php
if (!empty($error)) {
    include 'error.php';
}
?>
<br>
<?= $content ?>
<br>
<h1><?= $title ?></h1>
<section>
  <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a class="dropdown-item" href="ps4">PS4</a>
    </li>
    <li class="nav-item">
      <a class="dropdown-item" href="xbox">XBOX</a>
    </li>
    <li class="nav-item">
      <a class="dropdown-item" href="pc">PC</a>
    </li>
  </ul>
</section>
