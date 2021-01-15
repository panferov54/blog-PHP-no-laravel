<!DOCTYPE html>
<html lang="ru" >
  <head>
    <?php
    $website_title='Регистрация на сайте';
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
        <h4>Форма регистрации</h4>
        <form   method="post">
          <label for="username">Ваше Имя</label>
          <input type="text" name="username" id="username" class="form-control">

          <label for="email">Ваш email</label>
          <input type="email" name="email" id="email" class="form-control">

          <label for="login">Ваш Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Ваш Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

            <div class="alert alert-danger mt-2" id="errorBlock">

            </div>
            <div class="alert alert-success my-2" id="goodBlock">
              <h1>Пользователь добавлен</h1>
            </div>
          <button type="button" id="reg_user" class="btn btn-success mt-3">Зарегистрироваться</button>

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
$('#reg_user').click(function(){
let name=$('#username').val();
let email=$('#email').val();
let login=$('#login').val();
let pass=$('#pass').val();
$.ajax({
  url:'reg/reg.php',
  type:'POST',
  cache:false,
  data:{'username':name,'email':email,'login':login,'pass':pass},
  dataType:'html',
  success:function(data){
    if(data==='Готово'){
          $('#reg_user').hide();
          $('#errorBlock').hide();
          $('#goodBlock').show();
              $('#goodBlock').text('Пользователь добавен');
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
