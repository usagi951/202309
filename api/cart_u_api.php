<?php
require_once "dbtools.php";
$link = create_connect();
$dbname = "sample01";

if (isset($_POST['member_id'])) {

    $p_member_id = $_POST['member_id'];
  
    if ( $p_member_id != "") {
        
        $sql = "UPDATE cart SET Pay='Y' WHERE Member_id=' $p_member_id'";
        


        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"結帳成功"}');
        } else {
            echo ('{"state":false,"message":"結帳失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}

