<?php
$username=trim(filter_var($_POST['username'],FILTER_SANITIZE_STRING));
$email=trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
$login=trim(filter_var($_POST['login'],FILTER_SANITIZE_STRING));
$pass=trim(filter_var($_POST['pass'],FILTER_SANITIZE_STRING));


$error='';
if (strlen($username)<=3)
$error='Введите имя';
else if(strlen($email)<=3)
$error='Введите email';
if (strlen($login)<=3)
$error='Введите логин';
else if(strlen($pass)<=3)
$error='Введите пароль';

if($error!=''){
  echo $error;
  exit();
}

$hash="dfaRBMfabdfesgVSfsaf412352agwBYNOFFvhsg134t43yFDAFef2352";
$pass=md5($pass.$hash);

$user='root';
$password='root';
$db='phpblog';
$host='localhost';

$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn,$user,$password);
$sql='insert into users(name,email,login,pass) values(?,?,?,?)';
$query=$pdo->prepare($sql);
$query->execute([$username,$email,$login,$pass]);
echo "Готово";

 ?>
