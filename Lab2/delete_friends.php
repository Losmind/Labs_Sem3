<?php
session_start();
$login = $_POST['delete_friend'];
require_once 'db_connection.php';
$sql = ("SELECT id FROM users WHERE users.login='$login'");
$result = $mysql->query($sql);
$friend = $result->fetch_assoc();
if ($friend == 0) {
  $_SESSION['message1'] = 'Такого пользователя нет у вас в друзьях';
  header('Location: index.php');
} else {
$friend_id = $friend['id'];
$mysql->query("DELETE FROM friends WHERE friend_id=$friend_id");
$mysql->close();
header('Location: index.php'); }
?>
