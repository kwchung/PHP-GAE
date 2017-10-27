<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>P7-3_1310534034_字串函數</title>
</head>
<body>
<?php
    $str = "PHP Programming";
    echo "strlen(\$str) = " . strlen($str) . "<br/>";
    echo "strpos(\$str, \"r\") = " . strpos($str, "r") . "<br/>";
    echo "strrev(\$str) = " . strrev($str) . "<br/>";
    echo "substr(\$str, 3, 6) = " . substr($str, 3, 6) . "<br/>";
?>
</body>
</html>