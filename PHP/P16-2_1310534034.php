<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8" />
        <title>P16-2_1310534034_物件導向介面應用</title>
</head>

<body>
<?php
// 建立MySQL的資料庫連接 
$link = new mysqli("localhost", "root", "A12345678", "myschool")
        or die("無法開啟MySQL資料庫連接!<br/>");
echo "資料庫myschool開啟成功!<br/>";
$sql = "SELECT * FROM students"; // 指定SQL查詢字串
echo "SQL查詢字串: $sql <br/>";
//送出UTF8編碼的MySQL指令
$link->query('SET NAMES utf8'); 
// 送出查詢的SQL指令
if ( $result = $link->query($sql) ) { 
   echo "<b>學生資料:</b><br/>";  // 顯示查詢結果
   while( $row = $result->fetch_assoc() ){ 
      echo $row["sno"]." - ".$row["name"]."<br/>";
   }     
   $result->close(); // 釋放佔用記憶體
} 
$link->close();  // 關閉資料庫連接
?>
</body>

</html>