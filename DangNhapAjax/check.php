<?php
include("connect.php");

if(isset($_POST['us']) && isset($_POST['pw'])){
    $us = mysqli_real_escape_string($con, $_POST['us']);
    $pw = mysqli_real_escape_string($con, $_POST['pw']);

    
    $sql = "SELECT * FROM users WHERE username='$us' AND password='$pw'";
    $rs = mysqli_query($con, $sql);

    if(mysqli_num_rows($rs) > 0){
        echo "Đăng nhập thành công! Chào mừng " . $us;
    } else {
        echo "Tài khoản hoặc mật khẩu không đúng!";
    }
}
?>