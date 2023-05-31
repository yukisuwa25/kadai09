<!-- php開始 -->
<?php
//xss
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//sqlエラー
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//リダイレクト
function redirect($page){
    header("Location: ".$page);
    exit();
}
?>