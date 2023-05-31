<!-- php開始 -->
<?php
// GETデータ取得
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
    <title>kadai09</title>
</head>
<body>
    <!-- form作成 -->
    <form action="update.php" method="post">
        <fieldset>
            <legend>本のブックマーク</legend>
                <div>
                    <label>書籍名 : <input type="text" name="name" value="<?=$v["name"]?>"></label><br>
                    <label>URL : <input type="text" name="url" value="<?=$v["url"]?>"></label><br>
                    <label>コメント : <textArea name="comment" rows="4" cols="40"><?=$v["comment"]?></textArea></label><br>
                    <input type="hidden" name="id" value="<?=$v["id"]?>">
                    <input type="submit" value="更新">
                </div>
        </fieldset>
    </form>
    <!-- form終了 -->
    <!-- select.phpへ移動 -->
    <div>
        <a href="select.php">データ更新</a>
    </div>
</body>
</html>