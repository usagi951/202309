<?php
require_once "dbtools.php";
$link = create_connect();
$dbname = "sample01";

if (isset($_POST['product_id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['num']) && isset($_POST['member_id']) &&  isset($_POST['pay'])) {
    $p_productId=$_POST['product_id'];
    $p_productName=$_POST['name'];
    $p_productPrice=$_POST['price'];
    $p_productNum=$_POST['num'];
    $p_member_id=$_POST['member_id'];

    $p_pay=$_POST['pay'];

    
    if ( $p_productId != "" && $p_productName != "" &&  $p_productPrice != "" && $p_productNum != "" && $p_member_id != ""  &&$p_pay!="") {
        
        $sql = "INSERT INTO cart (Name,Price,Num,Pay,Member_id,Product_id) VALUES('$p_productName','$p_productPrice','$p_productNum','$p_pay','$p_member_id','$p_productId')";

        if (execute_sql($link, $dbname, $sql)) {
            echo ('{"state":true,"message":"購物車加入成功"}');
        } else {
            echo ('{"state":false,"message":"購物車加入失敗"}');
        }
        mysqli_close($link);
    } else {
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
} else {
    echo ('{"state":true,"message":"欄位錯誤"}');
}
