<?php 
    session_start();
    include '../connect.php';
    include 'function.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'add':
                $sql = $conn->query("INSERT INTO tb_order(cus_name, total_price, shop_id, order_date) VALUES('".$_SESSION['user_id']."','".$_REQUEST['sum_total']."','".$_REQUEST['shop_id']."',now()) ");
                
                $sql_max = $conn->query("SELECT MAX(order_id) AS order_max FROM tb_order WHERE cus_name='".$_SESSION['user_id']."' ");
                $fet_max = $sql_max->fetch_object();
                
                $sql_update = $conn->query("UPDATE tb_cart SET order_id='".$fet_max->order_max."' WHERE ca_user='".$_SESSION['user_id']."' AND ISNULL(order_id) ");

                if($sql && $sql_max && $sql_update) {
                    echo jsonMsg("สั่งอาหารสำเร็จ","success");
                }else{
                    echo $conn->error;
                }
                break;
                case 'riderCon':
                    $sql = $conn->query("UPDATE tb_order SET order_status = 1,r_id='".$_SESSION['user_id']."' WHERE order_id='".$_REQUEST['order_id']."'");
                    if($sql) {
                        echo jsonMsg("รับออเดอร์สำเร็จ","success");
                    }else{
                        echo $conn->error;
                    }
                    break;
                case 'shopCon':
                    $sql = $conn->query("UPDATE tb_order SET order_status = 2 WHERE order_id='".$_REQUEST['order_id']."'");
                    if($sql) {
                        echo jsonMsg("ยืนยันการทำอาหารสำเร็จ","success");
                    }else{
                        echo $conn->error;
                    }
                    break;
                case 'complete':
                    $sql = $conn->query("UPDATE tb_order SET order_status = 3 WHERE order_id='".$_REQUEST['order_id']."'");
                    if($sql) {
                        echo jsonMsg("ยืนยันการส่งอาหารและชำระเงินเสร็จสิ้น","success");
                    }else{
                        echo $conn->error;
                    }
                    break;

        }
    }
?>