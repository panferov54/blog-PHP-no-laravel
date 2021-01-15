<?php

$login=trim(filter_var($_POST['login'],FILTER_SANITIZE_STRING));
$pass=trim(filter_var($_POST['pass'],FILTER_SANITIZE_STRING));


$error='';

if (strlen($login)<=3)
$error='Введите логин';
else if(strlen($pass)<=3)
$error='Введите пароль';

if($error!==''){
  echo $error;
  exit();
}

$hash="dfaRBMfabdfesgVSfsaf412352agwBYNOFFvhsg134t43yFDAFef2352";
$pass=md5($pass.$hash);

require_once '../mysql_connect.html';

$sql='select `id` from `users` where `login` =:login && `pass` =:pass';
$query=$pdo->prepare($sql);
$query->execute(['login'=>$login,'pass'=>$pass]);
$user=$query->fetch(PDO::FETCH_OBJ);
if($user->id==0)echo "Такого пользователя не существует";
else{
  setcookie('login',$login,time()+3600*24*30,'/');
  echo 'Готово';
}


 ?>
