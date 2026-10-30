<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "udn";


$con = mysqli_connect($server, $user, $pass, $db);

// Thiết lập font chữ tiếng Việt
mysqli_query($con, "set names 'utf8'");
?>