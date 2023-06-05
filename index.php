<?php
session_start();
include("funcs.php");
sschk();
?>
<!-- html開始 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css読み込み -->
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>kadai09</title>
</head>
<body>
    <!-- form作成 -->
    <form action="insert.php" method="post">
        <div>
            <p class="index_p">本のブックマーク</p>
            <div class="index_a1">
                <a class="index_a2" href="menu.php">メニュー</a>
                <a class="index_a2" href="select.php">データ</a>
                <a class="index_a2" href="logout.php">ログアウト</a>
            </div>
                <div class="index_div1">
                    <label>書籍名 : <br><input class="index_input" type="text" name="name" placeholder="example:xxxxx"></label><br>
                    <label>URL : <br><input class="index_input" type="text" name="url" placeholder="example:xxxxx"></label><br>
                    <label>コメント : <br><textArea class="index_textarea" name="comment" rows="4" cols="40" placeholder="example:xxxxx"></textArea></label><br>
                    <div class="index_val">
                        <input type="submit" value="送信">
                    </div>
                </div>
        </div>
    </form>
    <!-- form終了 -->
</body>
</html>