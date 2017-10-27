<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>P7-1_1310534034_陣列宣告</title>
</head>
<body>
<?php
    $data = array();
    for ($i = 0; $i < 10; $i++) {
        $data[$i] = $i;
        echo "\$data[$i] = $i <br/>";
    }
    echo "<br/>";
    $total = 0;
    foreach ($data as $key) {
        $total += $key;
    }
    echo "Total = " . $total;
?>
</body>
</html>