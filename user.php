<!-- php開始 -->
<?php
// sessionstart
session_start();

//funcs.php読み込み
include "funcs.php";
?>

<!-- html開始 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/user.css">
  <title>PHP</title>
</head>
<body>
<!-- header作成 -->
  <header>
    <p class="user_p1">ユーザー登録画面</p>
    <div class="user_div1">
        <a class="user_a" href="menu.php">メニュー</a>
        <a class="user_a" href="login.php">ログイン</a>
        <a class="user_a" href="logout.php">ログアウト</a>
    </div>
  </header>
<!-- form作成 -->
  <form method="post" action="user_insert.php">
    <div>
      <p class="user_p2">ユーザー登録</p>
      <div class="user_div">
        <label>名前 : <br><input class="user_input" type="text" name="name"></label><br>
        <label>Login ID : <br><input class="user_input" type="text" name="lid"></label><br>
        <label>Login PW : <br><input class="user_input" type="text" name="lpw"></label><br>
        <div class="user_val">
          <label>
          <div class="user_div2"> 管理FLG : 
          一般<input type="radio" name="kanri_flg" value="0">
          管理者<input type="radio" name="kanri_flg" value="1">
          </div>
          </label>
        </div><br>
        <div class="user_val">
          <input type="submit" value="送信">
        </div>
      </div>
    </div>
  </form>
</body>
</html>