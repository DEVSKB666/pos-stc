<?php 
    session_start();
    include '../connect.php';
    include 'function.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'add':
                if($_FILES['pro_img']['name'] != "") {
                    $file = $_FILES['pro_img']['name'];
                    move_uploaded_file($_FILES['pro_img']['tmp_name'],"../img/product/".$file);
                }else{
                    echo jsonMsg("กรุณาแนบรูปประกอบรายการอาหาร","error");
                }
                $sql = $conn->query("INSERT INTO tb_product(pro_name, pro_detail, pro_price, pro_sale, pro_type, pro_img, shop_id) VALUES('".$_REQUEST['pro_name']."','".$_REQUEST['pro_detail']."','".$_REQUEST['pro_price']."','".$_REQUEST['pro_sale']."','".$_REQUEST['pro_type']."','".$file."','".$_SESSION['shop_id']."') ");
                if($sql) {
                    echo jsonMsg("เพิ่มรายการอาหารสำเร็จ","success");
                }else{
                    echo $conn->error;
                }
                break;
                case 'edit':
                    if($_FILES['pro_img']['name'] != "") {
                        $file = $_FILES['pro_img']['name'];
                        move_uploaded_file($_FILES['pro_img']['tmp_name'],"../img/product/".$file);
                    }else{
                       $sql_img = $conn->query("SELECT pro_img FROM tb_product WHERE pro_id='".$_REQUEST['pro_id']."' ");
                       $fet_img = $sql_img->fetch_object();
                       $file = $fet_img->pro_img;
                    }
                    $sql = $conn->query("UPDATE tb_product SET pro_name='".$_REQUEST['pro_name']."',pro_detail='".$_REQUEST['pro_detail']."',pro_price='".$_REQUEST['pro_price']."',pro_sale='".$_REQUEST['pro_sale']."',pro_type='".$_REQUEST['pro_type']."',pro_img='".$file."' WHERE pro_id='".$_REQUEST['pro_id']."' ");
                    if($sql) {
                        echo jsonMsg("แก้ไขรายการอาหารสำเร็จ","success");
                    }else{
                        echo $conn->error;
                    }
                    break;
                    case 'del':
                        $sql = $conn->query("DELETE FROM tb_product WHERE pro_id='".$_REQUEST['pro_id']."' ");
                        if($sql) {
                            echo jsonMsg("ลบรายการอาหารสำเร็จ","success");
                        }else{
                            echo $conn->error;
                        }
                        break;
                    case 'addType':
                        if($_FILES['type_img']['name'] != "") {
                            $file = $_FILES['type_img']['name'];
                            move_uploaded_file($_FILES['type_img']['tmp_name'],"../img/product_type/".$file);
                        }else{
                            echo jsonMsg("กรุณาแนบรูปประกอบหมวดหมู่อาหาร","error");
                        }
                        $sql = $conn->query("INSERT INTO tb_product_type(type_name, type_img, shop_id) VALUES('".$_REQUEST['type_name']."','".$file."','".$_SESSION['shop_id']."')");
                        if($sql) {
                            echo jsonMsg("เพิ่มหมวดหมู่อาหารสำเร็จ","success");
                        }else{
                            echo $conn->error;
                        }
                        break;
                        case 'addSale':
                            $sql = $conn->query("UPDATE tb_product SET pro_sale='".$_REQUEST['pro_sale']."' WHERE pro_id='".$_REQUEST['pro_id']."' ");
                            if($sql) {
                                echo jsonMsg("กำหนดส่วนลดรายการอาหารสำเร็จ","success");
                            }else{
                                echo $conn->error;
                            }
                            break;
            
        }
    }
?>