<?php
session_start();
require_once("final.inc");
if($_SESSION["login_session"] != true){
    header("Location: login.php");
}
$username = $_SESSION["login_user"];
$sql = "SELECT * FROM students ";
if($_SESSION['login_permissions'] == '2'){
    $sql .= " WHERE username = '$username'";
}
if(isset($_GET["sno"])){
    if($_SESSION["login_permissions"] == '1'){
        $sno = $_GET['sno'];
        $sql_students_delete = "DELETE FROM students WHERE sno = '$sno'";
        $sql_logs_insert = "INSERT INTO s1310534034_logs (events, username) VALUES('刪除 $sno 資料', '$username')";
        if($link->query($sql_students_delete)){
            $link->query($sql_logs_insert);
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
        <title>s1310534034 鐘冠武-學生資訊管理系統</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
            crossorigin="anonymous">
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
                    // 管理員才可以新增
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
            <table class="table table-hover mt-5">
                <caption>學生資料</caption>
                <thead class="thead-light">
                    <tr>
                        <th>sno</th>
                        <th>姓名</th>
                        <th>地址</th>
                        <th>生日</th>
                        <th>帳號</th>
                        <th>密碼</th>
                        <th>權限</th>
                        <th>動作</th>
                    </tr>
                </thead>
                <tbody>
<?php
if ($result = $link->query($sql)) {
    while ($row = $result->fetch_array()) {
?>
                    <tr>
                        <td>
                            <?=$row["sno"]?>
                        </td>
                        <td>
                            <?=$row["name"]?>
                        </td>
                        <td>
                            <?=$row["address"]?>
                        </td>
                        <td>
                            <?=$row["birthday"]?>
                        </td>
                        <td>
                            <?=$row["username"]?>
                        </td>
                        <td>
                            <?=$row["password"]?>
                        </td>
                        <td>
                            <?=$row["permissions"]?>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                            <?php
                                if($_SESSION['login_permissions'] == '1'){
                            ?>
                                    <a href="edit.php?sno=<?=$row['sno']?>" class="btn btn-info">編輯</a>
                            <?php
                                    if($row['permissions'] != 1){
                            ?>
                                        <a href="index.php?sno=<?=$row['sno']?>" class="btn btn-danger">刪除</a>
                            <?php
                                    }
                                }else{
                            ?>
                                    <a href="edit.php?sno=<?=$row['sno']?>" class="btn btn-info">編輯</a>
                            <?php
                                }
                            ?>
                            </div>
                        </td>
                    </tr>
                    <?php
    }
    $result->close();
}
$link->close();
?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
            crossorigin="anonymous"></script>
    </body>

    </html>