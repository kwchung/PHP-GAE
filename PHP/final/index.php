<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>s1310534034 鐘冠武-學生資訊管理系統</title>
</head>
<body>
<button type="submit">登出</button>
<a href="add.php">新增</a>
<table>
    <thead>
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
session_start();
require_once("final.inc");
if($_SESSION["login_session"] != true){
    header("Location: login.php");
}
$username = $_SESSION["login_user"];
$sql_getAllStd = "SELECT * FROM students ";
$sql_where = " WHERE username = '$username'";
if ($result1 = $link->query($sql_getAllStd.$sql_where)) {
    $per = $result1->fetch_array();
    $sql = $sql_getAllStd;
    if($per["permissions"] == 2){
        $sql .= $sql_where;
    }
    $result1->close();
    if ($result = $link->query($sql)) {
        while ($row = $result->fetch_array()) {
?>
        <tr>
            <td><?=$row["sno"]?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["address"]?></td>
            <td><?=$row["birthday"]?></td>
            <td><?=$row["username"]?></td>
            <td><?=$row["password"]?></td>
            <td><?=$row["permissions"]?></td>
            <td><a href="edit.php?sno=<?=$row["sno"]?>">編輯</a> | <a href="index.php?sno=<?=$row["sno"]?>">刪除</a></td>
        </tr>
<?php
        }
        $result->close();
    }
}
$link->close();
?>
    </tbody>
</table>
    
</body>
</html>