<?php
$host = 'localhost';
$dbname = 'ico_web_final';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password,$dbname, 4306);


if(isset($_SESSION['use'])){
    $userId = $_SESSION['use'];
}else $userId = "";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$time = date("Y-m-d H:i:s");
if ($userId) {
    $conn->query("UPDATE `ql_dangnhap` SET `tthai`='onl', `hdcuoi` = '$time' WHERE `use` = '$userId'");
}
?>