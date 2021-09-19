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
 $mysql->query("INSERT INTO `users` (`login`, `pass`) VALUES('$login', '$pass') ");
 $mysql->close();
 header('Location: /Lab2.php');
?>
