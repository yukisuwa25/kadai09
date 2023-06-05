<!-- php開始 -->
<?php
session_start();
// GETデータ取得
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
$sql = "SELECT * FROM kadai_09 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if($status==false) {
  //関数呼び出し
    sql_error($stmt);
}

//全データ取得
$v = $stmt->fetch();
?>

<!-- html開始 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/detail.css">
    <title>kadai09</title>
</head>
<body>
        <!-- form作成 -->
    <form action="update.php" method="post">
        <div>
            <p class="index_p">本のブックマーク</p>
            <div class="index_a1">
                <a class="index_a2" href="menu.php">メニュー</a>
                <a class="index_a2" href="select.php">データ</a>
                <a class="index_a2" href="logout.php">ログアウト</a>
            </div>
                <div class="index_div1">
                    <label>書籍名 : <br><input class="index_input" type="text" name="name" value="<?=$v["name"]?>"></label><br>
                    <label>URL : <br><input class="index_input" type="text" name="url" value="<?=$v["url"]?>"></label><br>
                    <label>コメント : <br><textArea class="index_textarea" name="comment" rows="4" cols="40"><?=$v["comment"]?></textArea></label><br>
                    <input type="hidden" name="id" value="<?=$v["id"]?>">
                    <div class="index_val">
                        <input type="submit" value="更新">
                    </div>
                </div>
        </div>
    </form>
    <!-- form終了 -->
</body>
</html>