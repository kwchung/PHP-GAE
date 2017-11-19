<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W10_1310534034_Session應用_Step4</title>
</head>
<body>
    <h1>Step4.</h1>
<?php
session_start();
if(isset($_POST)){
    $_SESSION["hobby"] = $_POST["hobby"];
    echo "<p>名稱：" . $_SESSION["name"] . "</p>";
    echo "<p>密碼：" . $_SESSION["password"] . "</p>";
    echo "<p>職業：" . $_SESSION["job"] . "</p>";
    echo "<p>生日：" . $_SESSION["birthday"] . "</p>";
    echo "<p>興趣：" . $_SESSION["hobby"] . "</p>";
}
?>
</body>
</html>