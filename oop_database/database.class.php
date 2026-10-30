<?php
class Dao {
    private $con;

    // LỖI TRONG PDF: viết là _construct (1 dấu gạch dưới). 
    // Chuẩn phải là __construct (2 dấu gạch dưới) để PHP nhận diện hàm khởi tạo.
    function __construct($user, $pass, $db) {
        $host = $_SERVER['SERVER_NAME'];
        // LỖI TRONG PDF: dùng mysql_connect (đã bị xóa ở PHP 7+). Đổi sang mysqli_connect
        $this->con = mysqli_connect($host, $user, $pass, $db);
        
        // Bổ sung kiểm tra lỗi kết nối (nếu cần)
        if (!$this->con) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
    }

    public function query($sql) {
        mysqli_query($this->con, "set names 'utf8'");
        $rs = mysqli_query($this->con, $sql);
        return $rs;
    }

    function table($sql, $header) {
        $rs = $this->query($sql);
        // LỖI TRONG PDF: mysql_fetch_fields -> mysqli_fetch_fields
        $fieldinfo = mysqli_fetch_fields($rs); 
        
        $str = "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
        $str .= "<tr class='hd'>";
        foreach ($fieldinfo as $val) {
            $name = $val->name;
            $str .= "<th>" . $name . "</th>";
        }
        $str .= "</tr>";

        // LỖI TRONG PDF: while($rs=mysql_fetch_array($rs)) - Gán đè lên chính nó gây lỗi vô hạn.
        // Sửa thành: $row = mysqli_fetch_array($rs)
        while ($row = mysqli_fetch_array($rs)) {
            $str .= "<tr>";
            foreach ($fieldinfo as $val) {
                $name = $val->name;
                // LỖI TRONG PDF: $r[$name] (sai tên biến). Sửa thành $row[$name]
                $str .= "<td>" . $row[$name] . "</td>"; 
            }
            $str .= "</tr>";
        }
        $str .= "</table>";
        
        // LỖI TRONG PDF: "<header>" thiếu dấu $ và sai thẻ đóng.
        echo "<h3>" . $header . "</h3>"; 
        echo $str;
    }
}
?>