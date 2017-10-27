<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>P7-2_1310534034_二維陣列</title>
</head>
<body>
<?php
    $data = array(
        "Joe" => array(88, 58),
        "Jane" => array(75, 67),
        "Mary" => array(46, 94)
    );

    // 加總
    function sum($array){
        $sum = 0;
        foreach ($array as $key => $value) {
            $sum += $value;
        }
        return $sum;
    }

    // 平均
    function avg($array){
        $sum = 0;
        foreach ($array as $key => $value) {
            $sum += $value;
        }
        return $sum / count($array);
    }

    foreach ($data as $key => $value) {
        $sum = sum($value);
        $avg = avg($value);

        echo "$key:<br/>";
        echo "=>成績總分 = $sum <br/>";
        echo "=>成績平均 = $avg <br/>";
    }
?>
</body>
</html>