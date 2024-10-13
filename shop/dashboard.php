<?php 
    $sql = $conn->query("SELECT tb_user.*,tb_order.* FROM tb_order LEFT JOIN tb_user ON tb_order.cus_name = tb_user.user_id WHERE tb_order.shop_id='".$_SESSION['shop_id']."' ");
    $num = $sql->num_rows;
?>
<div class="col px-3">
    <div class="container rounded-3 shadow-sm bg-white mt-3">
        <h4 class="fw-bold text-center pt-3">รายการออเดอร์ในขณะนี้</h4>
            <?php 
                if($num <= 0) {
                    echo '<h5 class="text-muted text-center py-3">ยังไม่มีออเดอร์ในขณะนี้</h5>';
                }
            ?>
        <div class="row px-3 mt-3">
            <?php 
                while($fet = $sql->fetch_object()) {
                    $sql_product = $conn->query("SELECT tb_cart.*,tb_product.* FROM tb_cart LEFT JOIN tb_product ON tb_cart.ca_product = tb_product.pro_id WHERE tb_cart.order_id='".$fet->order_id."' ");
            ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 my-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="fw-bold text-center">ออเดอร์: <?= $fet->order_id; ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="fw-bold text-center">รายการอาหาร</p>
                                <?php 
                                    while($fet_product = $sql_product->fetch_object()) {
                                ?>
                                <p>ชื่อ: <?= $fet_product->pro_name; ?></p>
                                <p>รายละเอียด: <?= $fet_product->pro_detail; ?></p>
                                <p>จำนวน: <?= $fet_product->ca_qty; ?> รายการ</p>
                                <?php } ?>
                            </div>
                            <div class="col">
                                <p class="fw-bold text-center">ผู้สั่งซื้อ</p>
                                <p>ชื่อ: <?= $fet->fullname; ?></p>
                                <p>ที่อยู่: <?= $fet->address; ?></p>
                                <p>เบอร์โทรศัพท์: <?= $fet->tel; ?></p>
                            </div>
                            
                            <div class="text-center fw-bold">
                                <p>ราคารวม <?= $fet->total_price; ?> บาท</p>
                                <p>สถานะ : <?= order_status($fet->order_status); ?> </p>
                                    <?php 
                                        if($fet->order_status == 1){ 
                                    ?>
                                <button id="btn-shopCon" data-id="<?= $fet->order_id; ?>" class="btn btn-outline-success btn-sm">ยืนยันการทำอาหาร</button>
                                <a href="bill.php?order_id=<?= $fet->order_id; ?>" class="btn btn-outline-warning btn-sm">ปริ้นใบเสร็จ</a>
                                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>