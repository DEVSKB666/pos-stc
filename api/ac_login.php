<?php 
    session_start();
    include '../connect.php';
    include 'function.php';
    $sql = $conn->query("SELECT * FROM tb_user WHERE username='".$_REQUEST['username']."' ");
    $num = $sql->num_rows;
    $fet = $sql->fetch_object();
    if($num <= 0){
        echo jsonMsg("Username ไม่ถูกต้อง","error");
    }else{
        if(password_verify($_REQUEST['password'],$fet->password)) {
            if($fet->user_status == null) {
                echo jsonMsg("รอการอนุมัติ","error");
            }else if($fet->user_status == 1) {
                $_SESSION['user_id'] = $fet->user_id;
                $_SESSION['fullname'] = $fet->fullname;
                $_SESSION['username'] = $fet->username;
                $_SESSION['address'] = $fet->address;
                $_SESSION['tel'] = $fet->tel;
                if($fet->user_role == 1) {
                    echo json_encode(array("status"=>true, "msg"=>"เข้าสู่ระบบสำเร็จ", "role"=>"admin", "type"=>"success"));
                }else if($fet->user_role == 2) {
                    $sql_shop = $conn->query("SELECT * FROM tb_shop WHERE user_id='".$fet->user_id."' ");
                    $fet_shop = $sql_shop->fetch_object();

                    $_SESSION['shop_id'] = $fet_shop->shop_id;
                    $_SESSION['shop_name'] = $fet_shop->shop_name;
                    $_SESSION['shop_type'] = $fet_shop->shop_type;


                    echo json_encode(array("status"=>true, "msg"=>"เข้าสู่ระบบสำเร็จ", "role"=>"shop", "type"=>"success"));
                }else if($fet->user_role == 3){
                    echo json_encode(array("status"=>true, "msg"=>"เข้าสู่ระบบสำเร็จ", "role"=>"rider", "type"=>"success"));
                }else{
                    echo json_encode(array("status"=>true, "msg"=>"เข้าสู่ระบบสำเร็จ", "role"=>"user", "type"=>"success"));
                }

            }else{
                if($fet->user_role == 4) {
                    $msg = "บัญชีถูกระงับการเข้าใช้งานชั่วคราว";
                }else{
                    $msg = "บัญชีถูกยกเลิกการเข้าใช้งาน";
                }
                echo jsonMsg($msg ,"error");
            }
        }else{
            echo jsonMsg("รหัสผ่านไม่ถูกต้อง","error");
        }
    }

?>