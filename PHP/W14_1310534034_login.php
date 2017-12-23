<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W14_1310534034_MySQL資料庫連結與查詢-Login</title>
</head>
<body>
    <form method="post">
        <label for="username">UserName</label>
        <input type="text" id="username" name="username" placeholder="Please enter username">
        <p> </p>
        <p> </p>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Please enter password">
        <p> </p>
        <p> </p>
        <button type="submit">LOGIN</button>
    </form>
</body>
</html>

<?php
require_once("W14_db_open.inc");
session_start();
$username = "";  $password = "";
// 取得表單欄位值
if ( isset($_POST["username"]) )
   $username = $_POST["username"];
if ( isset($_POST["password"]) )
   $password = $_POST["password"];
// 檢查是否輸入使用者名稱和密碼
if ($username != "" && $password != "") {
   // 建立SQL指令字串
   $sql = "SELECT * FROM tb_1310534034 WHERE password='";
   $sql.= $password."' AND username='".$username."'";
   // 執行SQL查詢
   $result = mysqli_query($link, $sql);
   $total_records = mysqli_num_rows($result);
   // 是否有查詢到使用者記錄
   if ( $total_records > 0 ) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      header("Location: W14_1310534034.php");
   } else {  // 登入失敗
      echo "<center><font color='red'>";
      echo "使用者名稱或密碼錯誤!<br/>";
      echo "</font>";
      $_SESSION["login_session"] = false;
   }
    require_once("W14_db_close.inc");
}
?>