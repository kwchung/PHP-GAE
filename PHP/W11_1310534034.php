<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W11_1310534034_檔案上傳</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    選擇上傳檔案：<input type="file" name="file[]"><br/>
    <input type="submit" value="上傳檔案">
</form>
<?php
$fname = "upload_list.txt";
if(isset($_FILES["file"])){
    $fp = fopen($fname, "w")
    or exit("<p>檔案開啟錯誤</p>");
    for ($i=0; $i < 5; $i++) {
        $content = "";
        if(!is_null($_FILES["file"]["name"][$i]) && $_FILES["file"]["name"][$i]!=''){
            if ( copy($_FILES["file"]["tmp_name"][$i], "upload/".$_FILES["file"]["name"][$i])) {
                $content .= "檔案" . ($i+1) . "\n";
                $content .= "檔案名稱: " . $_FILES["file"]["name"][$i] . "\n";
                $content .= "暫存檔名: " . $_FILES["file"]["tmp_name"][$i] . "\n";
                $content .= "檔案尺寸: " . $_FILES["file"]["size"][$i] . "\n";
                $content .= "檔案種類: " . $_FILES["file"]["type"][$i] . "\n";
                echo nl2br($content);
                echo "==檔案上傳成功==<br/>";
                unlink($_FILES["file"]["tmp_name"][$i]);
                if (fwrite($fp, $content)){
                    echo "==檔案寫入成功==<br/>";
                } else {
                    echo "==檔案寫入錯誤==<br/>";
                }
            }
            else{
                echo "==檔案上傳失敗==<br/>";
            }
        }
            echo "<br/><br/>";
    }
    fclose($fp);
}
?>
</body>
</html>