<?php
  header( 'Content-Type: text/html; charset=utf-8' );
  $hostname = 'localhost';
  $username = 'root';
  $passwordname = '';
  $basename = 'baza_1';
  $mysql = new mysqli($hostname, $username, $passwordname, $basename);
  $mysql->set_charset('utf8');
?>
