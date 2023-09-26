<?php
require_once "dbtools.php";
$link = create_connect();
$dbname = "sample01";

if (isset($_POST['id'])) {

    $p_id = $_POST['id'];
    if ($p_id!="") {
        $sql = "DELETE FROM cart WHERE ID=' $p_id'";
        
        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"刪除成功"}');
        } else {
            echo ('{"state":false,"message":"刪除失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
