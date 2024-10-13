<?php 
    session_start();
    include '../connect.php';
    include 'function.php';
    if(isset($_REQUEST['ac'])){
        switch ($_REQUEST['ac']) {
            case 'regis':
                if($_FILES['user_img']['name'] != "") {
                    $file = $_FILES['user_img']['name'];
                    move_uploaded_file($_FILES['user_img']['tmp_name'],"../img/profile/".$file);
                }else{
                    $file = "avatar.jpg";
                }
                $hash = password_hash($_REQUEST['password'],PASSWORD_BCRYPT);
                $sql = $conn->query("INSERT INTO tb_user(fullname, username, password, address, tel, user_img, user_role) VALUES('".$_REQUEST['fullname']."','".$_REQUEST['username']."','".$hash."','".$_REQUEST['address']."','".$_REQUEST['tel']."','".$file."','".$_REQUEST['user_role']."') ");
                if($sql) {
                    if($_REQUEST['user_role'] == 2) {
                        $msg = "ขั้นตอนสุดท้ายของการสมัครร้านอาหาร";
                    }else{
                        $msg = "สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบก่อนเข้าใช้งาน";
                    }
                    echo jsonMsg($msg, "success");
                }else{
                    echo $conn->error;
                }
                break;
                case 'nextStep':
                    $sql_max = $conn->query("SELECT MAX(user_id) AS user_max FROM tb_user WHERE user_role = 2");
                    $fet = $sql_max->fetch_object();
                    $sql = $conn->query("INSERT INTO tb_shop(shop_name, shop_type, user_id) VALUES('".$_REQUEST['shop_name']."','".$_REQUEST['shop_type']."','".$fet->user_max."') ");
                    if($sql) {
                        echo jsonMsg("สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบก่อนใช้งาน","success");
                    }else{
                        echo $conn->error;
                    }
                    break;
        }
    }

?>