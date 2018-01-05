<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入-1310534034_學生資料管理系統</title>
</head>
<body>
<?php
session_start();
require_once('final.inc');
$error_cnt = 0;
$sql_loginLog = "";
if(isset($_POST["btn_login"])){
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $sql_getStd = "SELECT COUNT(*) FROM students WHERE username = '$username' and password = '$pwd'";
    if ($result = $link->query($sql_getStd)) {
        $row = $result->fetch_row();

        // 登入成功
        if ($row[0] == "1") {
            $_SESSION["login_session"] = true;
            $_SESSION["login_user"] = $username;
            $sql_loginLog = "INSERT INTO s1310534034_logs (events, username) VALUES ('登入成功', '$username')";
            $link->query($sql_loginLog);
            header("Location: index.php");
        }
        // 登入失敗
        else {
            $_SESSION["error"]++;
            $sql_loginLog = "INSERT INTO s1310534034_logs (events, username) VALUES ('登入失敗', '$username')";
            $link->query($sql_loginLog);
        }    
    }
    $result->close();
    $link->close();
}
echo $_SESSION["error"];
if($error_cnt >= 3){
    echo "<h1 style='color: red;'>錯誤次數過多，請洽管理員。</h1>";
}
else{
?>
    <form method="post">
        <label for="username">帳號：</label>
        <input type="text" name="username" id="username">
        <br>
        <br>
        <label for="password">密碼：</label>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <button type="submit" name="btn_login">登入</button>
    </form>
<?php
}
?>
</body>
</html>