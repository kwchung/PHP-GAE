<?php
session_start();
require_once("final.inc");
$row = [];
if($_SESSION['login_session'] != true){
    header("Location: login.php");
}
if(!isset($_GET['sno'])){
  header("Location: index.php");
}else{
  if($result = $link->query("SELECT * FROM students WHERE sno = '".$_GET['sno']."'")){
    $row = $result->fetch_assoc();
  }
}
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

    <title>修改-s1310534034 鐘冠武-學生資訊管理系統</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="index.php">學生資訊管理系統</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php
if($_SESSION["login_permissions"] == '1'){
?>
            <li class="nav-item">
              <a class="nav-link" href="add.php">新增
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php
}
?>
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
if(isset($_POST['btn_edit'])){
    $new_sno = $_POST['sno'];
    $new_username = $_POST['username'];
    $new_name = $_POST['name'];
    $new_address = $_POST['address'];
    $new_birthday = $_POST['birthday'];
    $new_password = $_POST['password'];
    $username = $_SESSION['login_user'];
    $sql_students_insert = "UPDATE students SET name = '$new_name', address = '$new_address', birthday = '$new_birthday', username = '$new_username', password = '$new_password' WHERE sno = '$new_sno'";
    $sql_logs_insert = "INSERT INTO s1310534034_logs (events, username) VALUES ('編輯 $new_sno 資料', '$username')";
    if($result = $link->query($sql_students_insert)){
        $result = $link->query($sql_logs_insert);
        header('Location: index.php');
    }
    $link->close();
}
?>
      <form method="POST" class="mt-5">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="sno">學號</label>
              <input type="text" class="form-control" id="sno" name="sno" value="<?=$row['sno']?>" readonly>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="name">姓名</label>
              <input type="text" class="form-control" id="name" name="name" value="<?=$row['name']?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="address">地址</label>
              <input type="text" class="form-control" id="address" name="address" value="<?=$row['address']?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="birthday">生日</label>
              <input type="date" class="form-control" id="birthday" name="birthday" value="<?=$row['birthday']?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="username">帳號</label>
              <input type="text" class="form-control" id="username" name="username" value="<?=$row['username']?>" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="password">密碼</label>
              <input type="text" class="form-control" id="password" name="password" value="<?=$row['password']?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group float-right">
              <button type="submit" class="btn btn-info" name="btn_edit">修改完成</button>
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