<?php
require_once 'db_connection.php';
$auth_token = $_COOKIE['auth_token'];
$mysql->query(" DELETE FROM clients WHERE auth_token='$auth_token'");
unset($_SESSION['uid']);
setcookie('auth_token', $auth_token, time() - 3600, "/");
header('Location: login_form.php');
?>
