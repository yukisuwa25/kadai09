<!-- php開始 -->
<?php
session_start();
//funcs.php読み込み
include("funcs.php");
sschk();

//DB接続
try {
  $pdo = new PDO('mysql:dbname=coralbadger93_kadai09;charset=utf8;host=mysql57.coralbadger93.sakura.ne.jp','coralbadger93','suwayuki10');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//データ登録SQL作成
$sql = "SELECT * FROM kadai_09;";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- html開始 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css読み込み -->
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/select.css">
  <title>kadai09</title>
</head>
<body>
<!-- header作成 -->
<header>
  <p class="select_p">データ一覧</p>
  <div class="select_p1">[<?=$_SESSION["name"]?>さん、こんにちは]</div>
  <div class="select_a1">
    <a class="select_a2" href="menu.php">メニュー</a>
    <a class="select_a2" href="index.php">データ登録画面</a>
    <a class="select_a2" href="logout.php">ログアウト</a>
  </div>
</header>
<!-- テーブル作成 -->
<div>
  <table>
    <tr>
      <th>ID</th>
      <th>書籍名</th>
      <th>URL</th>
      <th>コメント</th>
      <th>デート</th>
      <?php if($_SESSION["kanri_flg"]==1){?>
      <th>削除</th>
      <?php }?>
    </tr>
      <?php foreach($values as $v){ ?>
    <tr>
      <td class="select_td1"><a class="select_id" href="detail.php?id=<?=$v["id"]?>"><?=h($v["id"])?></a></td>
      <td class="select_td1"><?=$v["name"]?></a></td>
      <td class="select_td1"><?=$v["url"]?></a></td>
      <td class="select_td2"><?=$v["comment"]?></a></td>
      <td class="select_td1"><?=$v["indate"]?></td>
      <?php if($_SESSION["kanri_flg"]==1){?>
        <td class="select_td1"><a class="select_id" href="delete.php?id=<?=$v["id"]?>">🗑️</a></td>
      <?php }?>
    </tr>
      <?php }?>
  </table>
</div>
<!-- footer作成 -->
</body>
</html>