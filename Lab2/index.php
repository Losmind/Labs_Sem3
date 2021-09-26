<?php
    session_start();
    if (!$_COOKIE['auth_token']) {
        header('Location: login_form.php');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Страница пользователя</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
  </head>
  <body>
   <article>
    <p id="profile">
      Привет!<br />
      Твои друзья: <br />
      <?php
       require_once 'db_connection.php';
       $auth_token = $_COOKIE['auth_token'];
       $uid = $_SESSION['uid'];
       $sql = ("SELECT friend_id,login FROM friends,users WHERE friend_id=users.id AND friends.id=$uid");
       $result = $mysql->query($sql);
       while ($row = $result->fetch_assoc())
            {
            echo $row['login'];?><br />
      <?php } ?>
      <form action="add_friends.php" method="post">
        <label>Добавление в друзья</label>
        <input type="text" id="add_friend" name="add_friend" placeholder="Введите имя">
        <button class="dark" type="submit">Добавить</button>
        <?php
         if (isset($_SESSION['message'])) {
           echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
         }
         unset($_SESSION['message']);
        ?>
      </form>
      <form action="delete_friends.php" method="post">
        <label>Удаление из дурзей</label>
        <input type="text" id="delete_friend" name="delete_friend" placeholder="Введите имя">
        <button class="dark" type="submit">Удалить</button>
        <?php
         if (isset($_SESSION['message1'])) {
           echo '<p class="msg"> ' . $_SESSION['message1'] . ' </p>';
         }
         unset($_SESSION['message1']);
        ?>
      </form>
       <?php
       $mysql->close(); ?>
      <p id="link">Чтобы выйти нажмите <a href="exit.php">здесь</a></p>
    </p>
  </article>
  </body>
</html>
