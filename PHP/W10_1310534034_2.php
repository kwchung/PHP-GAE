<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W10_1310534034_Session應用_Step2</title>
</head>
<body>
    <h1>Step2.</h1>
<?php
session_start();
if(isset($_POST)){
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["password"] = $_POST["password"];
}
?>
    <form action="W10_1310534034_3.php" method="post">
        <p>職業</p>
        <select name="job">
            <option value="學生">學生</option>
            <option value="老師">老師</option>
            <option value="律師">律師</option>
            <option value="醫師">醫師</option>
            <option value="工程師">工程師</option>
            <option value="其他">其他</option>
        </select>
        <p>生日</p>
        <input type="date" name="birthday" id="birthday" required>
        <button type="submit">Next Step</button>
    </form>
</body>
</html>