<?php
  $pdo = new PDO("mysql:dbname=blog", "root");#データベース全体を取得
  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");#postを取得
  $posts = $st->fetchAll();#postを配列に格納
  for ($i = 0; $i < count($posts); $i++) {
    $st = $pdo->query("SELECT * FROM comment WHERE post_no={$posts[$i]['no']} ORDER BY no DESC");
    #post_noが一致するコメントをすべて取得
    $posts[$i]['comments'] = $st->fetchAll();#postsの配列に入れる
  }
  $d1 = date('Y/m/d H:i:s');
  $d2 = date('Y年m月d日 H時i分s秒');
  $d3 = date('H:i:s', time() + 60);
  $d4 = mktime(8, 24, 30, 6, 10, 2011);
  $d5 = date('Y/m/d H:i:s',$d4);
  echo "現在時刻は $d1 です。<br>";
  echo "現在時刻は $d2 です。<br>";
  echo "現在時刻の60秒後は $d3 です。<br>";
  echo "$d5";
  $weeks = array('日','月','火','水','木','金','土');
  $now = time();
  $y = date('Y', $now);
  $m = date('n', $now);
  $last = date('t', $now);
  echo "<h1>{$y}年{$m}月のカレンダー</h1>";
  for ($d = 1; $d <= $last; $d++) {
    $t = mktime(0, 0, 0, $m, $d, $y);
    $w = date('w', $t);
    echo "{$d}日({$weeks[$w]})　";
  }
  require 't_index.php';
?>