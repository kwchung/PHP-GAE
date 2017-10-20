<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>P6_1310534034_函數練習</title>
</head>
<body>
<form method="post">
    <input type="input" name="temp" /><br/>
    <input type="radio" value="1" name="type" checked="checked" />攝氏轉華氏
    <input type="radio" value="2" name="type" />華氏轉攝氏<br/>
    <button type="submit">Submit</button>
<?php
$temp = $_POST["temp"];
$type = $_POST["type"];
convertTemp($temp, $type);
function convertTemp($temp, $type){
    if($type == 1){
        echo "<p>攝氏 $temp 度 = 華氏 " . ($temp * (9 / 5) + 32) . " 度</p>";
    }
    elseif ($type == 2) {
        echo "<p>華氏 $temp 度 = 攝氏 " . (($temp - 32) * 5 / 9) . " 度</p>";
    }
}
?>
</body>
</html>