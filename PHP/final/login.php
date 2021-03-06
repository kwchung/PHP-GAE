<?php
session_start();
require_once("final.inc");
$username_error = false;
$pwd_error = false;
$login_error = 0;
if(isset($_POST["btn_login"])){
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $result = $link->query("SELECT * FROM students WHERE username = '$username'");
    // 驗證帳號是否正確
    if($result->num_rows != 1){
        // 帳號錯誤
        $username_error = true;
    }
    else{
        // 帳號正確
        // 取出登入錯誤次數
        $login_error = $result->fetch_assoc()['loginError'];
        $result = $link->query("SELECT * FROM students WHERE username = '$username' AND password = '$pwd'");
        // 驗證密碼是否正確
        if($result->num_rows != 1){
            // 密碼錯誤
            $username_error = false;
            $pwd_error = true;
            $link->query("INSERT INTO s1310534034_logs (events, username) VALUES ('登入失敗', '$username')");
            // 將登入錯誤次數+1並存入資料庫
            $login_error++;
            $link->query("UPDATE students SET loginError = $login_error WHERE username = '$username'");
        }
        else{
            // 密碼正確
            $row = $result->fetch_assoc();
            $username_error = false;
            $pwd_error = false;
            $_SESSION["login_session"] = true;
            $_SESSION["login_user"] = $username;
            $_SESSION["login_permissions"] = $row['permissions'];
            $link->query("INSERT INTO s1310534034_logs (events, username) VALUES ('登入成功', '$username')");
            header("Location: index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入-1310534034_學生資料管理系統</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
        crossorigin="anonymous">
</head>

<body style="font-family: '微軟正黑體';">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">學生資訊管理系統</a>
    </nav>
    <div class="container">

<?php
if($login_error >= 3){
    echo '<div class="alert alert-danger mt-5" role="alert"><h4 class="alert-heading">登入失敗</h4>錯誤次數過多，請洽管理員。</div>';
}
else{
?>
            <div class="card border-primary mt-5">
                <div class="card-header text-white bg-primary border-primary">
                    登入
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username">帳號</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <?php if($username_error){ echo '<div class="text-danger">帳號錯誤</div>'; }?>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <?php if($pwd_error){ echo '<div class="text-danger">密碼錯誤</div>'; }?>
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" name="btn_login" class="btn btn-success">登入</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
}
?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
        crossorigin="anonymous"></script>
</body>

</html>