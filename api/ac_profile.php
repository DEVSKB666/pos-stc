<?php 
    session_start();
    include '../connect.php';
    include 'function.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'profile':
                if($_FILES['user_img']['name'] != "") {
                    $file = $_FILES['user_img']['name'];
                    move_uploaded_file($_FILES['user_img']['tmp_name'],"../img/profile/".$file);
                }else{
                    $sql_img = $conn->query("SELECT user_img FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
                    $fet_img = $sql_img->fetch_object();
                    $file = $fet_img->user_img;
                }
                $sql = $conn->query("UPDATE tb_user SET fullname='".$_REQUEST['fullname']."',address='".$_REQUEST['address']."',tel='".$_REQUEST['tel']."',user_img='".$file."' WHERE user_id='".$_SESSION['user_id']."' ");
                if($sql) {
                    echo jsonMsg("แก้ไขข้อมูลส่วนตัวสำเร็จ","success");
                }else{
                    echo $conn->error;
                }

                break;
                case 'shop':
                    $sql = $conn->query("UPDATE tb_shop SET shop_name='".$_REQUEST['shop_name']."',shop_type='".$_REQUEST['shop_type']."' WHERE shop_id='".$_SESSION['shop_id']."' ");
                    if($sql) {
                        echo jsonMsg("แก้ไขข้อมูลร้านอาหารสำเร็จ","success");
                    }else{
                        echo $conn->error;
                    }
                    break;
        }
    }

?>