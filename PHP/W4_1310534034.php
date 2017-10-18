<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W4_1310534034_解一元二次方程式</title>
</head>
<body>
<h1>解一元二次方程式</h1>
<form type="GET">
    <h2><input type="text" name="a" value="1"/>X<sup>2</sup> + <input type="text" name="b" value="1"/>X + <input type="text" name="c" value="1"/> = 0</h2>
    <button type="submit">送出</button>
</form>
<?php
if (isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["c"])) {
    $a = $_GET["a"];
    $b = $_GET["b"];
    $c = $_GET["c"];
    $i = pow($b, 2) - (4 * $a * $c);
    echo "<p>" . $a . "X<sup>2</sup> + ". $b ."X + ". $c ." = 0</p>";
    if($i < 0){
        echo "<p>X = " . -($b / (2 * $a)) . " ± " . (sqrt(abs($i)) / (2 * $a)) . "<i>i</i></p>";
    }else if($i == 0){
        $x1 = -($b / (2 * $a));
        echo "<p>X = " . $x1 . "</p>";
    }else if($i > 0){
        $x1 = -($b / (2 * $a)) + (sqrt($i) / (2 * $a));
        $x2 = -($b / (2 * $a)) - (sqrt($i) / (2 * $a));
        echo "<p>X = " . $x1 . " 或 " . $x2 . "</p>";
    }
}
?>
</body>
</html>