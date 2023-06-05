<!-- html開始 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>PHP</title>
</head>
<body>
    <!-- header作成 -->
    <header>
        <div class="login_div2">ログイン画面</div>
        <div class="login_div1">
            <a href="menu.php">メニュー</a>
            <a href="user.php">ユーザー登録画面</a>
            <a href="logout.php">ログアウト</a>
        </div>
    </header>
    <!-- form作成 -->
    <form name="form1" action="login_act.php" method="post">
        <div class="login_div">
        ID : <br><input class="login_input" type="text" name="lid"/><br>
        PW : <br><input class="login_input" type="password" name="lpw"/><br>
        <div class="login_val">
           <input type="submit" value="ログイン"/>
        </div>
        </div>
    </form>
</body>
</html>