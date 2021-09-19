<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Таблица</title>
</head>
<body>
  <h1 align="center";>FRIENDS</h1>
    <?php
     header( 'Content-Type: text/html; charset=utf-8' );
     $hostname = 'localhost';
     $username = 'root';
     $passwordname = '';
     $basename = 'baza_1';
     $mysql = new mysqli($hostname, $username, $passwordname, $basename);
     $mysql->set_charset('utf8');
     var_dump($_COOKIE);
     $s = array_keys($_COOKIE);
     $s = $s[0];
     $uid = $_COOKIE[$s][0];
     var_dump($uid);
     $sql = ("SELECT friend_id,login FROM friends,users WHERE friend_id=users.id AND friends.id=$uid");
     $result = $mysql->query($sql);
     while ($row = $result->fetch_assoc())
          {
          echo $row['friend_id'].' '.$row['login'];?><br />
              <?php }
                   $mysql->close(); ?>
      <a href="./../Lab2.php">Назад</a>.<br />
</body>
</html>
