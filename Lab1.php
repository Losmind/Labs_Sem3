<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Таблица</title>
</head>
<body background="https://cdn.hipwallpaper.com/i/41/95/Q8zMqy.jpg";>
  <h1 align="center";>Лист Группы</h1>
  <table align="center"; bgcolor="pink"; border="5"; bordercolor="green"; width="10%";>
    <?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $hostname = 'localhost';
    $username = 'root';
    $passwordname = '';
    $basename = 'baza_1';
    $conn = new mysqli($hostname, $username, $passwordname, $basename) or die('Connection error.');
    $conn->set_charset('utf8');
    $sql = "SELECT * FROM `Persons`";
    $result = $conn->query($sql);
    ?>
      <thead>
        <tr>
          <th>id</th>
          <th>Lastname</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while ($row = $result->fetch_assoc())
          {
        ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['Lastname'];
          }
              ?></td>
            </tr>
      </tbody>
</body>
</html>
