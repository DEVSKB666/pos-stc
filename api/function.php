<?php 
    function jsonMsg($msg, $type){
        return json_encode(array("status"=>true, "msg"=>"{$msg}", "type"=>"{$type}"));
    }
    function user_status($s, $r) {
        if($s == null) {
            echo "รออนุมัติการเข้าใช้งาน";
        }else if($s == 1) {
            echo "ได้รับการอนุมัติแล้ว";
        }else{
            if($r == 4) {
                echo "ระงับการเข้าใช้งานชั่วคราว";
            }else{
                echo "ยกเลิกการเข้าใช้งาน";
            }
        }
    }
    function showSale($s) {
        if($s != 0) {
            echo $s." %";
        }else{
            echo "ไม่มีส่วนลด";
        }
    }

    function sumsale($p, $s) {
        $sum = $p - ($p * $s)/100;
        return $sum;
    }
    
    function sumtotal($p, $qty, $s) {
        $sum = $p - ($p * $s)/100;
        $total = $sum * $qty;
        return $total;
    }

    function order_status($s) {
        if($s == null) {
            echo "กำลังหาไรเดอร์";
        }else if($s == 1) {
            echo "เจอไรเดอร์แล้ว ร้านกำลังเตรียมอาหาร";
        }else if($s == 2){
            echo "ร้านเตรียมอาหารเสร็จแล้ว กำลังนำไปส่ง";
        }else if($s == 3) {
            echo "ยืนยันการส่งอาหารและชำระเงินเสร็จสิ้น";
        }else{
            echo "ยกเลิกออเดอร์แล้ว";
        }
    }

    function review($p, $u){
        if($p == 0 || $u == 0) {
            echo "ไม่มีรีวิว";
        }else{
            $sum = $p / $u;
            echo number_format($sum, 1);
        }
    }
    

?>