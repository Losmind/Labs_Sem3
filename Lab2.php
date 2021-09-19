<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Список друзей</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" />
  <link href="php_css_lab2/style.css" />
</head>
<body>
  <?php
    var_dump($_COOKIE);
    if($_COOKIE['id'] == ''):
  ?>
  <div class="container mt-4">
   <form action="php_css_lab2/check.php" method="post">
     <input type="text" class="form-control" id="login" name="login" placeholder="Введите имя"><br />
     <input type="password" class="form-control" id="pass" name="pass" placeholder="Введите пароль"><br />
     <button type="submit">Зарегистрироваться</button><br />
   </form>
   <form action="php_css_lab2/auth.php" method="post">
     <input type="text" class="form-control" id="login" name="login" placeholder="Введите имя"><br />
     <input type="password" class="form-control" id="pass" name="pass" placeholder="Введите пароль"><br />
     <button type="submit">Авторизоваться</button><br />
   </form>
 <?php else:?>
   <p>
     Привет <?=$_COOKIE['id']?>.<br />
     <a href="php_css_lab2/friends.php">Мои друзья</a>.<br />
     Чтобы выйти нажмите <a href="php_css_lab2/exit.php">здесь</a>.<br />
   </p>
 <?php endif; ?>
   </div>
</body>
</html>
