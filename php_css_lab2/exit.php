<?php
setcookie('id', $user['id'], time() - 3600, "/");
header('Location: /Lab2.php');
?>
