<?php

require_once "dbtools.php";
$conn = create_connect();
$dbname = "sample01";



if (isset($_GET['member_id'])) {


    $p_id = $_GET['member_id'];

    //$p_password = $_POST['password'];//第一層加密md5()  第二層加密 substr(字串,索引,取幾個)
  
    if ($p_id!="") {
        $sql = "SELECT a.*, b.Img ,b.Type FROM cart a INNER JOIN product b ON a.Product_id = b.id WHERE member_id=' $p_id' AND Pay='N'";
        $result=execute_sql($conn,$dbname,$sql);
        if (mysqli_num_rows($result) >0) {
            $data=array();
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
            
           echo('{"state":true,"message":"購物車資料取得成功","data":'.json_encode($data).'}');
         
        } else {
            echo('{"state":false,"message":"查無購物車資料"}');
        }
        mysqli_close($conn);
    }else{
        echo ('{"state":true,"message":"欄位不允許空白"}');
    }
}else{
    echo ('{"state":true,"message":"欄位錯誤"}');
}
?>
