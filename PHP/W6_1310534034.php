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
        <input type="text" name="email" placeholder="請輸入email">
        <br/>
        <button type="submit">檢查</button>
    </form>
    <?php
        function validEmail($email){
            $flag = true;
            if(strpos($email, '@') == false){
                trigger_error("沒有「@」符號", E_USER_ERROR);
                $flag = false;
            }

            if(trim($email) == ""){
                trigger_error("空字串", E_USER_WARNING);
                $flag = false;
            }

            if(is_numeric($email)){
                trigger_error("全是數字", E_USER_NOTICE);
                $flag = false;
            }

            if($flag == true){
                echo "<p> $email 是正確的電子郵件字串格式</p><br/>";
            }
        }

        function myErrorHandler($type, $msg, $file, $line){
            switch($type){
                case E_USER_ERROR:
                    echo "<b>自訂致命錯誤！</b><br/>";
                    break;
                case E_USER_WARNING:
                    echo "<b>自訂警告錯誤！</b><br/>";
                    break;
                case E_USER_NOTICE:
                    echo "<b>自訂注意錯誤！</b><br/>";
                    break;
                default:
                    break;
            }
            echo "檔案： $file 第： $line 行<br/>";
            echo "錯誤訊息： <b> $msg </b><br/><br/>";
        }

        set_error_handler("myErrorHandler");

        if(isset($_GET["email"])){
            validEmail($_GET["email"]);
        }
    ?>
</body>

</html>