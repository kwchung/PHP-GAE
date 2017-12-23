<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W14_1310534034_MySQL資料庫連結與查詢</title>
</head>
<body>

<?php
session_start();
if($_SESSION["login_session"] == false){
    echo '<h1 style="color: red;">您尚未登入！！</h1>';
    echo '<a href="W14_1310534034_login.php">回登入</a>';
}
else{
?>
    <form method="post">
        <label for="username">Search</label>
        <input type="text" name="username" id="username">
        <button type="submit" name="search">Search</button>
    </form>
<?php
    require_once("W14_db_open.inc");
    $records_per_page = 3;  // 每一頁顯示的記錄筆數
    // 取得URL參數的頁數
    if (isset($_GET["Pages"])) 
        $pages = $_GET["Pages"];
    else
        $pages = 1;
    // 執行SQL查詢
    $sql_all = "SELECT sno, name, address, birth, username FROM tb_1310534034";
    $result = mysqli_query($link, $sql_all);
    $total_fields=mysqli_num_fields($result); // 取得欄位數
    $total_records=mysqli_num_rows($result);  // 取得記錄數
    // 計算總頁數
    $total_pages = ceil($total_records/$records_per_page);
    // 計算這一頁第1筆記錄的位置
    $offset = ($pages - 1)*$records_per_page;
    mysqli_data_seek($result, $offset); // 移到此記錄
    echo "記錄總數: $total_records 筆<br/>";
    echo "<table border=1><tr>";
    while ( $meta=mysqli_fetch_field($result) )
    echo "<td>".$meta->name."</td>";
    echo "</tr>";
    $j = 1;
    while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
        and $j <= $records_per_page) {
    echo "<tr>";
    for ( $i = 0; $i<= $total_fields-1; $i++ )
        echo "<td>".$rows[$i]."</td>";
    echo "</tr>";
    $j++;
    }
    echo "</table><br>";
    if ( $pages > 1 )  // 顯示上一頁
    echo "<a href='W14_1310534034.php?Pages=".($pages-1).
            "'>上一頁</a>| ";
    for ( $i = 1; $i <= $total_pages; $i++ )
    if ($i != $pages)
        echo "<a href=\"W14_1310534034.php?Pages=".$i."\">".
            $i."</a> ";
    else
        echo $i." ";
    if ( $pages < $total_pages )  // 顯示下一頁
    echo "|<a href='W14_1310534034.php?Pages=".($pages+1).
            "'>下一頁</a> ";
    if(isset($_POST["search"])){
        $search = $_POST["username"];
        $sql_user = "SELECT password FROM tb_1310534034 WHERE username='" . $search . "'";
        $result_user = mysqli_query($link, $sql_user);
        $rows = mysqli_fetch_array($result_user, MYSQLI_NUM);
        echo 'password = ' . $rows[0];
    }
    require_once("W14_db_close.inc");
}
?>
</body>
</html>