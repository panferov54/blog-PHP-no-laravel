<?php
if($_COOKIE['login']==''){
    header('Location: /reg.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="ru" >
  <head>
    <?php
    $website_title='Добавление статьи';
    require 'blocks/head.php';
     ?>
  </head>
  <body>
<?php
require 'blocks/header.php';
 ?>
<main class="container mt-5 mb-3">
  <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Форма добавления статьи</h4>
        <form   method="post">
          <label for="title">Заголовок статьи</label>
          <input type="text" name="title" id="title" class="form-control">
            <label for="intro">Интро статьи</label>
            <textarea name="intro" id="intro" class="form-control"></textarea>
          <label for="text">Текст статьи</label>
            <textarea name="text" id="text" class="form-control"></textarea>
            

            <div class="alert alert-danger mt-2" id="errorBlock">

            </div>
            <div class="alert alert-success my-2" id="goodBlock">
              <h1>Статья добавлена</h1>
            </div>
          <button type="button" id="article_send" class="btn btn-success mt-3">Добавить статью</button>

        </form>
      </div>
      <?php
      require 'blocks/aside.php';
       ?>
  </div>
</main>


<?php
require 'blocks/footer.php';
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$('#article_send').click(function(){
let title=$('#title').val();
let intro=$('#intro').val();
let text=$('#text').val();

$.ajax({
  url:'reg/add_article.php',
  type:'POST',
  cache:false,
  data:{'title':title,'intro':intro,'text':text},
  dataType:'html',
  success:function(data){
    if(data=='Готово'){
          $('#article_send').text('Статья добавлена');
          $('#errorBlock').hide();
        
    }

    else{
        $('#errorBlock').show();
        $('#errorBlock').text(data);
    }

  }
});


});

    

</script>


  </body>
</html>
