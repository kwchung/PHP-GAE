<?php
session_start();
require_once("final.inc");
$sql_logs_insert = "INSERT INTO s1310534034_logs (events, username) VALUES ('登出成功', '" . $_SESSION['login_user'] . "')";
if($result = $link->query($sql_logs_insert)){
    $link->close();
    session_destroy();
    header('Location: login.php');
}
?>