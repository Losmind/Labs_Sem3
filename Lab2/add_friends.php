<?php
session_start();
$login = $_POST['add_friend'];
require_once 'db_connection.php';
$uid = $_SESSION['uid'];
$sql = ("SELECT id FROM users WHERE users.login='$login'");
$result = $mysql->query($sql);
$friend = $result->fetch_assoc();
if ($friend == 0) {
  $_SESSION['message'] = 'Такого пользователя не существует';
  header('Location: index.php');
} else {
$friend_id = $friend['id'];
$mysql->query("INSERT INTO `friends` (`id`, `friend_id`) VALUES ('$uid', '$friend_id') ");
$mysql->close();
header('Location: index.php'); }
?>
