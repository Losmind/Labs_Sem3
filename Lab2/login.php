<?php
session_start();
$login = $_POST['login'];
$pass = $_POST['pass'];
if (mb_strlen($login) < 3 || mb_strlen($login) > 50) {
  $_SESSION['message'] = 'Неверный логин';
  header('Location: login_form.php');
} else if (mb_strlen($pass) < 5 || mb_strlen($pass) > 50) {
  $_SESSION['message'] = 'Неверный пароль';
  header('Location: login_form.php');
} else {
require_once 'db_connection.php';
$sql = ("SELECT salt FROM `users` WHERE `login` = '$login'");
$result = $mysql->query($sql);
$take_salt = $result->fetch_assoc();
$salt = $take_salt['salt'];
$options = ['salt' => $salt];
$pass = password_hash($pass, PASSWORD_BCRYPT, $options);
$res = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $res->fetch_assoc();
if($user == 0) {
  $_SESSION['message'] = 'Неверный логин или пароль';
  header('Location: login_form.php');
} else {
$_SESSION['uid'] = $user['id'];
$uid = $user['id'];
function rand_string($nChars, array $case = array()) {
  define ('LOW', 'abcdefghijklmnopqrstuvwxyz');
  define ('UPP', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
  define ('NUM', '1234567890');
  $nChars–;
  $symbols = array();
  if (in_array('low', $case))
  $symbols[] = LOW;
  if (in_array('upp', $case))
  $symbols[] = UPP;
  if (in_array('num', $case))
  $symbols[] = NUM;
  if (count($symbols) == 0)
  $symbols = array(LOW, UPP, NUM);
  $rand_str = '';
  for ($i = 0; $i < $nChars; $i++) { // циклим по числу необходимых символов в итоговой строке
  $id = mt_rand(0, count($symbols) - 1); // случайным образом определяем ТИП символов, из которых будем получать случайный СИМВОЛ
  $source_str = $symbols[$id];
  $rand_str .= $source_str{ mt_rand(0, strlen($source_str) - 1) }; // очередной случаный символ
  }
  return $rand_str;
  }
$arr=array('low', 'upp', 'num');
$auth_token = rand_string(20,$arr);
$mysql->query("INSERT INTO `clients` (`id`,`auth_token`) VALUES('$uid','$auth_token')");
setcookie('auth_token', $auth_token, time() + 3600, "/");
header('Location: index.php'); }}
?>
