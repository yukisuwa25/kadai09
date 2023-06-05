<!-- php開始 -->
<?php
// sessionstart
session_start();

//POSTデータ取得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//funcs.php読み込み
include("funcs.php");

//DB接続
try {
  $pdo = new PDO('mysql:dbname=coralbadger93_kadai09;charset=utf8;host=mysql57.coralbadger93.sakura.ne.jp','coralbadger93','suwayuki10');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND life_flg=0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//抽出データ数を取得
$val = $stmt->fetch(); 

//該当１レコードがあればSESSIONに値を代入
$pw = password_verify($lpw, $val["lpw"]);
if($pw){ 
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  //Login成功時（リダイレクト）
  //リダイレクトでindex.phpへ移動
  redirect("index.php");
}else{
  //Login失敗時(Logoutを経由：リダイレクト)
  //リダイレクトでligin.phpへ移動
  redirect("login.php");
}
exit();