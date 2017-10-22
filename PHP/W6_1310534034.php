<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W6_1310534034_錯誤處理1</title>
</head>
<body>
<form method="get">
    <input type="text" name="email" placeholder="請輸入email"><br/>
    <button type="submit">檢查</button>
</form>
<?php
    $email = $_GET["email"];
    if(strpos($email, '@') == false){
        echo '<p> $email 沒有「@」符號</p>';
    }

    if(is_null($email)){
        echo '<p>空字串</p>';
    }

    if(is_numeric($email)){
        echo '<p> $email 全是數字</p>';
    }
?>
</body>
</html>