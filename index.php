<?php
  $pdo = new PDO("mysql:dbname=blog", "root");#データベース全体を取得
  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");#postを取得
  $posts = $st->fetchAll();#postを配列に格納
  for ($i = 0; $i < count($posts); $i++) {
    $st = $pdo->query("SELECT * FROM comment WHERE post_no={$posts[$i]['no']} ORDER BY no DESC");
    #post_noが一致するコメントをすべて取得
    $posts[$i]['comments'] = $st->fetchAll();#postsの配列に入れる
  }
  require 't_index.php';
?>