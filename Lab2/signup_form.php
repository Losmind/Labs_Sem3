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
	<title>Регистрация</title>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <article>
  <form action="signup.php" method="post">
    <label>Логин</label>
    <input type="text" id="login" name="login" placeholder="Введите имя">
    <label>Пароль</label>
    <input type="password" id="pass" name="pass" placeholder="Введите пароль">
    <label>Подтверждение пароля</label>
    <input type="password" id="pass_confirm" name="pass_confirm" placeholder="Повторите пароль">
    <button class="success" type="submit"><strong>Зарегистрироваться</strong></button>
    <p id="link">Есть аккаунт?-<a href="login_form.php">Авторизируйтесь!</a></p>
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
