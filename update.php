<!-- php開始 -->
<?php
$id = $_POST["id"];
$name = $_POST["name"];
$url  = $_POST["url"];
$comment = $_POST["comment"];

//funcs.php読み込み
include("funcs.php");

//DB接続
try {
  $pdo = new PDO('mysql:dbname=kadai09;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//データ登録SQL作成
$sql = "UPDATE kadai_09 SET name=:name, url=:url, comment=:comment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後
if($status==false){
  //関数呼び出し
    sql_error($stmt);
}else{
  //関数呼び出し
  //リダイレクトでselect.phpへ移動
    redirect("select.php");
}
?>