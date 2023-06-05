<!-- php開始 -->
<?php
session_start();
//POSTデータ取得
$id = $_GET["id"];

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
$sql = "DELETE FROM kadai_09 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if($status==false){
  //関数呼び出し
    sql_error($stmt);
}else{
  //関数呼び出し
  //リダイレクトでselect.phpへ移動
    redirect("select.php");
}
?>