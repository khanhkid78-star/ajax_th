<?php
// 1. Kết nối CSDL (Dùng mysqli thay vì mysql)
$link = mysqli_connect("localhost", "root", "", "udn");

// Kiểm tra kết nối
if($link === false){
    die("ERROR: Không thể kết nối. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
    // 2. Chuẩn bị câu lệnh SQL SELECT có tham số (dấu ?)
    $sql = "SELECT * FROM hocphan WHERE tenhp LIKE ?";
    
    // 3. Chuẩn bị (Prepare) câu lệnh
    if($stmt = mysqli_prepare($link, $sql)){
        // 4. Liên kết biến với tham số (s = string)
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // 5. Thiết lập tham số (Thêm % ở sau để tìm kiếm gần đúng)
        $param_term = $_REQUEST["term"] . '%';
        
        // 6. Thực thi câu lệnh
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // 7. Kiểm tra số lượng row trong kết quả
            if(mysqli_num_rows($result) > 0){
                // Tìm nạp các hàng kết quả dưới dạng mảng kết hợp
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["tenhp"] . "</p>";
                }
            } else {
                echo "<p>Không tìm thấy kết quả nào</p>";
            }
        } else {
            echo "ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($link);
        }
    }
    // Đóng câu lệnh
    mysqli_stmt_close($stmt);
}

// Đóng kết nối
mysqli_close($link);
?>