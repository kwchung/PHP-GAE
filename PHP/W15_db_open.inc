<?php
$username = "root";
$password = "6e47ab1a";
$dbname = "myschool";

// 建立MySQL的資料庫連接
$link = mysqli_connect("localhost", $username, $password) 
        or die("無法開啟MySQL資料庫連接!<br/>");
mysqli_select_db($link, $dbname);  // 選擇myschool資料庫

//送出UTF8編碼的MySQL指令
mysqli_query($link, 'SET NAMES utf8'); 
?>