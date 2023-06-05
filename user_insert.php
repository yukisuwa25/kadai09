<!-- php開始 -->
<?php
// sessionstart
session_start();

//funcs.php読み込み
include "funcs.php";

//POSTデータ取得
$name = filter_input( INPUT_POST, "name" );
$lid = filter_input( INPUT_POST, "lid" );
$lpw = filter_input( INPUT_POST, "lpw" );
$kanri_flg = filter_input( INPUT_POST, "kanri_flg" );
$lpw = password_hash($lpw, PASSWORD_DEFAULT);

//DB接続
try {
    $pdo = new PDO('mysql:dbname=coralbadger93_kadai09;charset=utf8;host=mysql57.coralbadger93.sakura.ne.jp','coralbadger93','suwayuki10');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }
  
//データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg)VALUES(:name,:lid,:lpw,:kanri_flg,0)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後
if ($status == false) {
    //関数呼び出し
    sql_error($stmt);
} else {
    //関数呼び出し
    // リダイレクトでuser.phpへ移動
    redirect("user.php");
}