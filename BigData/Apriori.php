<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apriori演算法</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <form action="" method="post">
        <p>訂單（用 ',' 隔開）</p>
        <button type="button" id="btn_add">Add Order</button>
        <div id="append_position">
            <input type="text" name="order[]" style="display: block;" required>
        </div>
        <button type="submit">Submit</button>
    </form>

    <div id="template" style="display: none;">
        <input type="text" name="order[]" style="display: block;" min="0" required>
    </div>
    <script>
        $(function () {
            var i = 1;
            $('#btn_add').on('click', function () {
                i++;
                if(i <= 20){
                    $('#template').find('input').clone().appendTo($('#append_position'));
                }
            });
        })
    </script>
    <?php
    $result = array();
    if(isset($_POST["order"])){
        $order = $_POST["order"];// 訂單
        foreach ($order as $key => $value) {
            $a1 = explode(',', $value);
            foreach ($a1 as $key1 => $value1) {
                if($value1 != '')
                    $result[$value1] += 1;
            }
            var_dump($result);
            echo "<br/>";
        }
    }
    ?>
</body>

</html>