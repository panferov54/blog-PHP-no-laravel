<!DOCTYPE html>
<html lang="ru" >
  <head>
    <?php
    $website_title='PHP Блог';
    require 'blocks/head.php';
     ?>
  </head>
  <body>
<?php
require 'blocks/header.php';
 ?>
<main class="container mt-5 mb-3">
  <div class="row">
      <div class="col-md-8">
основная часть сайта
      </div>
      <?php
      require 'blocks/aside.php';
       ?>
  </div>
</main>


<?php
require 'blocks/footer.php';
 ?>
  </body>
</html>
