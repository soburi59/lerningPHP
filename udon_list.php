<table border="1">
<tr><th>名前</th><th>価格</th></tr>
<?php
  require "require3_common.php";
  $pdo = new PDO("mysql:dbname=test2", "root");
  $st = $pdo->query("SELECT * FROM udon");
  while ($row = $st->fetch()) {
    $name = h($row['name']);
    $price = h($row['price']);
    echo "<tr><td>$name</td><td>$price 円</td></tr>";
  }
?>
</table>