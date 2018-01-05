<?php
$host = "localhost";
$username = "finalexam";
$password = "A12345678";
$dbname = "myschool";

// 建立MySQL的資料庫連接
$link = new mysqli($host, $username, $password, $dbname) 
        or die("無法開啟MySQL資料庫連接!<br/>");
//echo "資料庫myschool開啟成功!<br/>";

//送出UTF8編碼的MySQL指令
$link->query('SET NAMES utf8');
?>