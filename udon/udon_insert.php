<form action="udon_insert.php" method="post">
    名前<br>
    <input type="text" name="name"><br>
    価格<br>
    <input type="text" name="price"><br>
    <input type="submit">
  </form>
  <?php
  $pdo = new PDO("mysql:dbname=test2", "root");
  $st = $pdo->prepare("INSERT INTO udon VALUES(?,?)");
  $st->execute(array($_POST['name'], $_POST['price']));
?>
レコードを追加しました。