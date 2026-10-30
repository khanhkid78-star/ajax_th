<?php
$op = $_GET["chon"];

if ($op != "") {
 
    include("database.class.php");
    
   
    $dao = new Dao("root", "", "udn");
    
    $sql = "SELECT * FROM {$op}";

    $header = "DANH SÁCH " . mb_strtoupper($op, 'UTF-8');
    
    $dao->table($sql, $header);
}
?>