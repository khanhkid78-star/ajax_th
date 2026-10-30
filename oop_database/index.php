<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP with PHP</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .hd { background-color: navy; color: white; text-align: left; }
        table { margin-top: 10px; }
        td, th { padding: 8px; border: 1px solid #ccc; }
    </style>
    
   
    <script>
        function ajax() {
            var chon = document.getElementById("chon").value;
            var info = document.getElementById("info");
            
            
            if (chon === "") {
                info.style.display = "none";
                return;
            }
            
            info.style.display = "block";
            info.innerHTML = "Đang tải...";
            
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (xml.readyState == 4 && xml.status == 200) {
                    info.innerHTML = xml.responseText;
                }
            }
            
            xml.open("GET", "showTable.php?chon=" + chon, true);
            xml.send();
        }
    </script>
</head>
<body>
    <h1>OOP with PHP</h1>
    
   
    <select id="chon" onChange="ajax();">
        <option value="">-- Chọn bảng --</option>
        <option value="giaovien">Giáo viên</option>
        <option value="sinhvien">Sinh viên</option>
        <option value="hocphan">Học phần</option>
    </select>
    
    <hr>
    
    <div id="info" style="display:none;"></div>
</body>
</html>