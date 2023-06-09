<!-- php開始 -->
<?php
session_start();
// POSTデータ取得
$name = $_POST["name"];
$url = $_POST["url"];
$comment = $_POST["comment"];

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
$sql = "INSERT INTO kadai_09(name, url, comment, indate)VALUES(:name, :url, :comment, sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if($status==false){
  //関数呼び出し
  sql_error($stmt);
}else{
  //関数呼び出し
  //リダイレクトでindex.phpへ移動
  redirect("index.php");
}
?>