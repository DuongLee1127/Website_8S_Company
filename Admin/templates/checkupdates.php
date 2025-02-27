<?php
$host = 'localhost';
$dbname = 'ico_web_final';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password,$dbname, 4306);


$timeoutMinutes = 10;
date_default_timezone_set("Asia/Ho_Chi_Minh");

$sql = "SELECT * FROM `ql_dangnhap` WHERE 1";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
    $timecuoi = strtotime($row['hdcuoi']);
    $timenow = strtotime(date("Y-m-d H:i:s"));
    $mu = ($timenow - $timecuoi)/60;

    if($mu > $timeoutMinutes){
        $sql = "UPDATE `ql_dangnhap` SET `tthai`='off' WHERE `use`='{$row['use']}'";
	    $conn->query($sql);
    }
    
    //echo "User " . $user['username'] . " đã không hoạt động kể từ " . $user['last_activity'] . "<br>";
}
?>
