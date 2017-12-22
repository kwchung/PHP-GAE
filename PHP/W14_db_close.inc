<?php
mysqli_free_result($result);  // 釋放佔用的記憶體
mysqli_close($link); // 關閉資料庫連接
?>