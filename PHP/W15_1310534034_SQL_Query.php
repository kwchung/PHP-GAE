<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W15_1310534034_SQL語法應用</title>
</head>
<body>

<?php
require_once("W15_db_open.inc");
require_once("W15_SQLS.php");
foreach ($sqls as $key => $value) {
    echo "<p>指令".($key + 1)."：<code>".$value."</code></p>";
    $result = mysqli_query($link, $value);

    // 若指令是 INSERT、UPDATE、DELETE 則不須印出表格
    if((stripos($value, 'INSERT') !== false) || (stripos($value, 'UPDATE') !== false) || (stripos($value, 'DELETE') !== false))
        continue;

    $total_fields = mysqli_num_fields($result); // 取得欄位數
    echo "<table border=1><tr>";

    // 印出標題
    while ($meta = mysqli_fetch_field($result))
        echo "<td>".$meta->name."</td>";
    echo "</tr>";

    // 印出資料
    while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
        echo "<tr>";
        for ( $i = 0; $i <= $total_fields-1; $i++ )
            echo "<td>".$rows[$i]."</td>";
        echo "</tr>";
    }
    echo "</table><br>";
}
require_once("W15_db_close.inc");
?>
    
</body>
</html>