<?php
  session_start();
    if (isset($_COOKIE['auth_token'])) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Вход</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
</head>
<body>
  <article>
   <form action="login.php" method="post">
     <label>Логин</label>
     <input type="text" id="login" name="login" placeholder="Введите имя">
     <label >Пароль</label>
     <input type="password" id="pass" name="pass" placeholder="Введите пароль">
     <button class="success" type="submit"><strong>Авторизоваться</strong></button>
     <p id="link">Нет аккаунта?-<a href="signup_form.php">Зарегестрируйтесь!</a></p>
     <p id="link"><a href="forgot_password.php">Забыли пароль?</a></p>
     <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      }
      unset($_SESSION['message']);
     ?>
   </form>
 </article>
</body>
</html>
