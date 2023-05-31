<!-- php開始 -->
<?php
//POSTデータ取得
$id = $_GET["id"];

//funcs.php読み込み
include("funcs.php");

//DB接続
try {
  $pdo = new PDO('mysql:dbname=kadai09;charset=utf8;host=localhost','root','');
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