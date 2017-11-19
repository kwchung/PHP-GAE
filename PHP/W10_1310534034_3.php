<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W10_1310534034_Session應用_Step3</title>
</head>
<body>
<?php
session_start();
if(isset($_POST)){
    $_SESSION["job"] = $_POST["job"];
    $_SESSION["birthday"] = $_POST["birthday"];
}
?>
    <h1>Step3.</h1>
    <form action="W10_1310534034_4.php" method="post">
        <p>興趣</p>
        <input type="text" name="hobby" id="hobby" placeholder="請輸入興趣" required>
        <button type="submit">Next Step</button>
    </form>
</body>
</html>