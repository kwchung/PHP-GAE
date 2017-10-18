<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W5_1310534034_運費估算</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <h1>基本物流處理費199元，1~5公斤每公斤50元，高過5公斤每公斤30元。</h1>
    <h1>重量採單件計算，物流處理費一件收一次</h1>
    <form action="" method="post">
        <p>物品</p>
        <button type="button" id="btn_add">新增貨物</button>
        <div id="append_position">
            <input type="number" name="kg[]" style="display: block;" min="0" required>
        </div>
        <p>優惠代碼</p>
        <input type="text" name="coupon" id="txt_coupon" style="display: block;">
        <p style="color: red; opacity: 0;" id="txt_error">優惠代碼無效</p>
        <button type="submit">Submit</button>
    </form>

    <div id="template" style="display: none;">
      <input type="number" name="kg[]" style="display: block;" min="0" required>
    </div>
    <script>
        $(function(){
            $('#btn_add').on('click', function(){
                $('#template').find('input').clone().appendTo($('#append_position'));
            });
            $('#txt_coupon').on('blur', function(){
                if($('#txt_coupon').val() == '1310534034'){
                    $('#txt_error').css('opacity', '0');
                }else{
                    $('#txt_error').css('opacity', '1');
                }
            });
        })
    </script>
    <?php
    if(isset($_POST["kg"])){
        $kg = $_POST["kg"];// 物品重量
        $goods = count($kg);// 物品數
        $goods_fee = 0;// 物品價格
        $goods_fee_sum = 0;// 物品價格
        $fee = 0;// 物流處理費
        $coupon = $_POST["coupon"];

        echo"<h2>總運費</h2>";
        for ($i=  0 ; $i < count($kg) ; $i++) {
            if($kg[$i] <= 5){
                $goods_fee = $kg[$i] * 50;
            }elseif ($kg[$i] > 5) {
                $goods_fee = $kg[$i] * 30;
            }
            echo '<p>物品'. ($i + 1) .'運費：' . ($goods_fee + 199) . '元</p>';
            $goods_fee_sum += ($goods_fee + 199);
}

        $fee = $goods * 199;
        if($coupon == "1310534034"){
            $fee *= -1 ;
            echo '<p>優惠折扣：' . $fee . '元</p>';
            echo '<p>總運費：' . ($fee + $goods_fee_sum) . '元</p>';
        }else{
            echo '<p>總運費：' . $goods_fee_sum . '元</p>';
        }
    }
    ?>
</body>

</html>