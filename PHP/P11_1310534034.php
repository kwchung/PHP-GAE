<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>P11_1310534034_檔案上傳</title>
</head>
<body>
<?php
    $fname = "1310534034.txt";
    $content = "鐘冠武\r\n1310534034\r\n";
    if (file_exists($fname)){
        unlink($fname);
        echo "<p>" . $fname . "存在，刪除成功" . "</p>";
    } else {
        $fp = fopen($fname, "w")
                or exit("<p>檔案開啟錯誤</p>");
        if (fwrite($fp, $content)){
            echo "<p>" . $fname . "不存在，新增成功" . "</p>";
        } else {
            echo "<p>檔案寫入錯誤</p>";
        }
        fclose($fp);
    }
?>
</body>
</html>