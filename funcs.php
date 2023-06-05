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

//sessionCheck
function sschk(){
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    exit("Login Error");
  }else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
  }
?>