<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>P5_1310534034_while迴圈練習</title>
</head>

<body>
    <h1>計算繩索需要對折幾次才會小於20公分</h1>
    <form action="" method="post">
        <input type="number" name="Length" id="">
        <button type="submit">Submit</button>
    </form>
    <?php
if(isset($_POST["Length"])){
    $length = $_POST["Length"];
    $count = 0;
    while($length > 20){
    $length = $length / 2;
    $count++;
    }
    echo '<p><b style="color:red; ">' .
            $_POST["Length"].
            ' </b>公分的繩索需要對折<b style="color: red; "> '.
            $count.
            ' </b>次才會小於<b style="color:red; "> 20 </b>公分</p>';
}
?>
</body>

</html>