<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W11_1310534034_檔案上傳</title>
</head>
<body>
<p>PHP程式範例 Ch9_4_2.php 最多可同時上傳3個檔案，請修改程式顯示上傳檔案的類型和尺寸，並且能夠同時上傳5個檔案。另外建立一個上傳檔案清單(upload_list.txt)，紀錄所有檔案名稱與上傳時間。
</p>
<form method="post" enctype="multipart/form-data">
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    <input type="submit" value="上傳檔案">
</form>
<?php
if(isset($_FILES["file"])){
    for ($i=0; $i < 5; $i++) {
        if(!is_null($_FILES["file"]["name"][$i])){
        echo "檔案名稱: ".$_FILES["file"]["name"][$i]."<br/>";
        echo "暫存檔名: ".$_FILES["file"]["tmp_name"][$i]."<br/>";
        echo "檔案尺寸: ".$_FILES["file"]["size"][$i]."<br/>";
        echo "檔案種類: ".$_FILES["file"]["type"][$i]."<hr/>";
        }
    }
}
?>
</body>
</html>