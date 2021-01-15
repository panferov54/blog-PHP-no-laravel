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
<?php 
        require_once 'mysql_connect.html';  
          
          $sql='select * from `articles` order by `date` desc';
          $query=$pdo->query($sql);
          while($row = $query->fetch(PDO::FETCH_OBJ)){
              echo "<h2>$row->title</h2>
                  <p>$row->intro</p>
                   <p><b>Автор статьи:</b> $row->avtor</p>
                  <button class='btn btn-warning mb-5'>Прочитать статью полностью</button>";
          }
          ?>
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
