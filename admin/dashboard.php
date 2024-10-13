<?php 
    $sql_shop = $conn->query("SELECT * FROM tb_user WHERE user_role=2");
    $num_shop = $sql_shop->num_rows;
    $sql_rider = $conn->query("SELECT * FROM tb_user WHERE user_role=3");
    $num_rider = $sql_rider->num_rows;
    $sql_user = $conn->query("SELECT * FROM tb_user WHERE user_role=4");
    $num_user = $sql_user->num_rows;
    $num_all = $num_rider + $num_shop + $num_user;
?>
<div class="content-wrapper">
    <div class="content-header">

        <div class="col col-sm-12 pt-3 px-3">
            <div class="alert alert-primary" role="alert">
                <h4 class="fw-bold">ระบบจัดการหน้าเว็บไซต์</h4>
            </div>
        </div>


    </div>
    <div class="content p-3 px-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-3 ">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <ion-icon name="people-outline"></ion-icon>
                            ข้อมูลผู้ใช้ทั้งหมด
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $num_all; ?> คน</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <ion-icon name="cart-outline"></ion-icon>
                            ข้อมูลผู้ใช้ทั่วไป
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">จำนวน 900,000 ออเดอร์</h5>
                            <p class="card-text">
                                <a href="https://devbanban.com/?p=2867" class="text-white"
                                    style="text-decoration: none;">
                                    more detail...</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <ion-icon name="desktop-outline"></ion-icon>
                            ข้อมูลผู้ใช้ร้านอาหาร
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">จำนวน 9,999 รายการ</h5>
                            <p class="card-text">
                                <a href="https://devbanban.com/?p=4425" class="text-white"
                                    style="text-decoration: none;">
                                    more detail...</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <ion-icon name="cash-outline"></ion-icon>
                            ข้อมูลผู้จัดส่งอาหาร
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> 11,500,000 บาท</h5>

                        </div>
                    </div>
                </div>
            </div> <!-- //row -->

        </div> <!-- //container -->
    </div>
</div>