<?php
session_start();
require_once("final.inc");
if($_SESSION["login_session"] != true){
    header("Location: login.php");
}
if($_SESSION["login_permissions"] != "1"){
    header("Location: index.php");
}
$errorSno = '<div class="alert alert-danger mt-5" role="alert"><h4 class="alert-heading">新增失敗<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>學號重複。</div>';
$errorUsername = '<div class="alert alert-danger mt-5" role="alert"><h4 class="alert-heading">新增失敗<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>帳號重複。</div>';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
            crossorigin="anonymous">

        <title>新增-s1310534034 鐘冠武-學生資訊管理系統</title>
    </head>

    <body style="font-family: '微軟正黑體';">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">學生資訊管理系統</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">新增
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">登出
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
<?php
if(isset($_POST['btn_add'])){
    $new_sno = $_POST['sno'];
    $new_username = $_POST['username'];
    $result = $link->query("SELECT * FROM students WHERE sno = '$new_sno'");
    // 驗證是否有重複的sno
    if($result->num_rows > 0){
        // sno重複
        echo $errorSno;
    }else{
        // sno沒重複
        $result = $link->query("SELECT * FROM students WHERE username = '$new_username'");
        // 驗證是否有重複的username
        if($result->num_rows > 0){
            // username重複
            echo $errorUsername;
        }else{
            // username沒重複
            $new_name = $_POST['name'];
            $new_address = $_POST['address'];
            $new_birthday = $_POST['birthday'];
            $new_password = $_POST['password'];
            $username = $_SESSION['login_user'];
            $sql_students_insert = "INSERT INTO students (sno, name, address, birthday, username, password) VALUES ('$new_sno', '$new_name', '$new_address', '$new_birthday', '$new_username', '$new_password')";
            $sql_logs_insert = "INSERT INTO s1310534034_logs (events, username) VALUES ('新增 $new_sno 資料', '$username')";
            if($result = $link->query($sql_students_insert)){
                $result = $link->query($sql_logs_insert);
                header('Location: index.php');
            }
            $link->close();
        }
    }
}
?>
            <form method="POST" class="mt-5">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="sno">學號</label>
                            <input type="text" class="form-control" id="sno" name="sno" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="address">地址</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="username">帳號</label>
                            <input type="text" class="form-control" id="username" name="username" required maxlength="12">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="text" class="form-control" id="password" name="password" required maxlength="12">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-info" name="btn_add">新增</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
            crossorigin="anonymous"></script>
    </body>

    </html>