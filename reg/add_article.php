<?php
$title=trim(filter_var($_POST['title'],FILTER_SANITIZE_STRING));
$intro=trim(filter_var($_POST['intro'],FILTER_SANITIZE_STRING));
$text=trim(filter_var($_POST['text'],FILTER_SANITIZE_STRING));


$error='';
if (strlen($title)<=3)
$error='Введите заголовок';
else if(strlen($intro)<=10)
$error='Введите интро';
else if (strlen($text)<=20)
$error='Введите статью';


if($error!=''){
  echo $error;
  exit();
}

$user='root';
$password='root';
$db='phpblog';
$host='localhost';

$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn,$user,$password);
$sql='insert into articles(title,intro,text,date,avtor) values(?,?,?,?,?)';
$query=$pdo->prepare($sql);
$query->execute([$title,$intro,$text,time(),$_COOKIE['log']]);
echo "Готово";

 ?>