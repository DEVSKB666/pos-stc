<?php 
    session_start();
    include '../connect.php';
    include 'function.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'app-user':
                $sql = $conn->query("UPDATE tb_user SET user_status = 1 WHERE user_id='".$_REQUEST['user_id']."' ");
                if($sql) {
                    echo jsonMsg("อนุมัติการเข้าใช้งานสำเร็จ","success");
                }else{
                    echo $conn->error;
                }
                break;
            case 'dis-user':
                $sql = $conn->query("UPDATE tb_user SET user_status = 2 WHERE user_id='".$_REQUEST['user_id']."' ");
                if($sql) {
                    if($_REQUEST['user_role'] == 4) {   
                        $msg = "ระงับการเข้าใช้งานชั่วคราวสำเร็จ";
                    }else{
                        $msg = "ยกเลิกการเข้าใช้งานสำเร็จ";
                    }
                    echo jsonMsg($msg,"success");
                }else{
                    echo $conn->error;
                }
                break;
                case 'addShopType':
                    $sql = $conn->query("INSERT INTO tb_shop_type(type_name, detail) VALUES('".$_REQUEST['type_name']."','".$_REQUEST['detail']."') ");
                    if($sql) {
                        echo jsonMsg("สร้างประเภทร้านอาหารสำเร็จ","success");
                    }else{
                        echo $conn->error;
                    }
                    break;
                    case 'edit':
                        $sql = $conn->query("UPDATE tb_shop_type SET type_name='".$_REQUEST['type_name']."',detail='".$_REQUEST['detail']."' WHERE type_id='".$_REQUEST['type_id']."' ");
                        if($sql) {
                            echo jsonMsg("แก้ไขประเภทร้านอาหารสำเร็จ","success");
                        }else{
                            echo $conn->error;
                        }
                        break;
                        case 'del':
                            $sql = $conn->query("DELETE FROM tb_shop_type WHERE type_id='".$_REQUEST['type_id']."' ");
                            if($sql) {
                                echo jsonMsg("ลบประเภทร้านอาหารสำเร็จ","success");
                            }else{
                                echo $conn->error;
                            }
                            break;
        }
    }
?>