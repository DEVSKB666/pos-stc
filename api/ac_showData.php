<?php 
    include '../connect.php';
    include 'function.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'showUserData':
                $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_REQUEST['user_id']."' ");
                if($sql) {
                    while($fet = $sql->fetch_object()) {
                        if($fet->user_status == null) {
                            $msg = "รออนุมัติการเข้าใช้งาน";
                        }elseif($fet->user_status == 1) {
                            $msg = "ได้รับการอนุมัติแล้ว";
                        }else{
                            if($fet->user_role == 4) {

                                $msg = "ระงับการเข้าใช้งานชั่วคราว";
                            }else{
                                $msg = "ยกเลิกการเข้าใช้งาน";

                            }
                        }
                        $result = ' <div class="mt-3">
                        <img src="../img/profile/'.$fet->user_img.'" alt="userProfile" class="rounded-circle d-block mx-auto" width="100" height="100">
                        <div class="row my-3 mx-3">
                            <div class="col">
                                <p><b>ชื่อ-นามสกุล:</b> '.$fet->fullname.'</p>
                                <p><b>ที่อยู่:</b> '.$fet->address.'</p>
                                <p><b>เบอร์โทรศัพท์:</b> '.$fet->tel.'</p>
                            </div>
                            <div class="col">
                                <p><b>ชื่อผู้ใช้:</b> '.$fet->username.'</p>
                                <p><b>สถานะ:</b> '.$msg.'</p>
                            </div>
                        </div>
                        <div class="text-center">
                        '; 
                        if($fet->user_role == 4) {

                        
                         if($fet->user_status == null) { 
                            $result .= '<button class="btn btn-sm btn-outline-success" id="btn-app" data-role="'.$fet->user_role.'" data-id="'.$fet->user_id.'">ยืนยัน</button>';
                         }elseif($fet->user_status == 1) {
                            $result .= '<button class="btn btn-sm btn-outline-warning" id="btn-dis" data-role="'.$fet->user_role.'" data-id="'. $fet->user_id.'">ระงับการใช้งานชั่วคราว</button>';
                            }else{ 
                               $result .= '<button class="btn btn-sm btn-outline-info" id="btn-app" data-role="'.$fet->user_role.'" data-id="'.$fet->user_id.'">ยกเลิกการระงับ</button>';
                             }                        
                             $result .= '</div>
                          </div>    ';
                            }else{
                                if($fet->user_status == null) { 
                                    $result .= '<button class="btn btn-sm btn-outline-success" id="btn-app" data-role="'.$fet->user_role.'" data-id="'.$fet->user_id.'">ยืนยัน</button>';
                                 }elseif($fet->user_status == 1) {
                                    $result .= '<button class="btn btn-sm btn-outline-danger" id="btn-dis" data-role="'.$fet->user_role.'" data-id="'.$fet->user_id.'">ยกเลิกการใช้งาน</button>';
                                }                      
                                     $result .= '</div>
                                  </div>    ';
                            }
                    echo $result;
                    }
                }else{
                    echo $conn->error;
                }
                break;
                case 'showShopData':
                    $sql = $conn->query("SELECT tb_user.*,tb_shop.shop_name,tb_shop_type.type_name FROM tb_user LEFT JOIN tb_shop ON tb_user.user_id = tb_shop.user_id LEFT JOIN tb_shop_type ON tb_shop.shop_type = tb_shop_type.type_id WHERE tb_user.user_role = 2");
                    $i=0;
                    while($fet = $sql->fetch_object()) {
                        if($fet->user_status == null) {
                            $msg = "รออนุมัติการเข้าใช้งาน";
                        }elseif($fet->user_status == 1) {
                            $msg = "ได้รับการอนุมัติแล้ว";
                        }else{
                            $msg = "ยกเลิกการเข้าใช้งาน";
                        }
                        $result = ' <div class="mt-3">
                        <img src="../img/profile/'.$fet->user_img.'" alt="userProfile" class="rounded-circle d-block mx-auto" width="100" height="100">
                        <div class="row my-3 mx-3">
                            <div class="col">
                                <p><b>ชื่อ-นามสกุล:</b> '.$fet->fullname.'</p>
                                <p><b>ร้าน:</b> '.$fet->shop_name.'</p>
                                <p><b>ที่อยู่:</b> '.$fet->address.'</p>
                                <p><b>เบอร์โทรศัพท์:</b> '.$fet->tel.'</p>
                            </div>
                            <div class="col">
                                <p><b>ชื่อผู้ใช้:</b> '.$fet->username.'</p>
                                <p><b>ประเภทร้านอาหาร:</b> '.$fet->type_name.'</p>
                                <p><b>สถานะ:</b> '.$msg.'</p>
                            </div>
                        </div>
                        <div class="text-center">
                        '; 
                        if($fet->user_status == null) { 
                            $result .= '<button class="btn btn-sm btn-outline-success" id="btn-app" data-role="'.$fet->user_role.'" data-id="'.$fet->user_id.'">ยืนยัน</button>';
                         }elseif($fet->user_status == 1) {
                            $result .= '<button class="btn btn-sm btn-outline-danger" id="btn-dis" data-role="'.$fet->user_role.'" data-id="'.$fet->user_id.'">ยกเลิกการใช้งาน</button>';
                        }                      
                             $result .= '</div>
                          </div>    ';
                        echo $result;
                    }
                    break;
        }
    }

?>