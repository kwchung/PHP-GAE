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
        <p>物品</p>
        <button type="button" id="btn_add">Add Order</button>
        <div id="append_position">
            <input type="text" name="order[]" style="display: block;" required>
        </div>
        <button type="submit">Submit</button>
    </form>

    <div id="template" style="display: none;">
        <input type="number" name="order[]" style="display: block;" min="0" required>
    </div>
    <script>
        $(function () {
            $('#btn_add').on('click', function () {
                $('#template').find('input').clone().appendTo($('#append_position'));
            });
        })
    </script>
    <?php
    if(isset($_POST["order"])){
        $order = $_POST["order"];// 訂單
    }
    ?>
</body>

</html>