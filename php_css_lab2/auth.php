<?php
$login = $_POST['login'];
$pass = $_POST['pass'];
header( 'Content-Type: text/html; charset=utf-8' );
$hostname = 'localhost';
$username = 'root';
$passwordname = '';
$basename = 'baza_1';
$mysql = new mysqli($hostname, $username, $passwordname, $basename);
$mysql->set_charset('utf8');
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch_assoc();
if($user == 0) {
  echo "Такой пользователь не найден";
  exit();
}
setcookie('id', $user['id'], time() + 3600, "/");
header('Location: /Lab2.php');
?>
