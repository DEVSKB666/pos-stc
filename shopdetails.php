<?php 
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>STC ONLINE</title>
</head>
<body>
    <div id="loader" class="d-flex justify-content-center align-items-center vh-100 opacity-25" style="background-color: grey;">
        <div class="spinner-border"></div>
    </div>

    <div class="alertMsg d-none" id="alert">
        <div id="txt"></div>
    </div>


    <div id="content" class="container mt-1">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-7 col-xxl-7">
                <img width="100%" height="550" class="object-fit-cover" src="image/orther/5214643.jpg" alt="">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5 mt-5 pt-5">
                <h3 class="text-center fw-bold mt-4">ข้อมูลร้านอาหาร</h3>

                <form class="needs-validation px-5" action="api/ac_register.php?ac=nextStep" method="post" id="frm_shopRegis" novalidate>
                    <div class="form-floating mt-4">
                        <input type="text" name="shop_name" id="shop_name" class="form-control" placeholder="shopname" required>
                        <label for="" class="form-label">ชื่อร้านอาหาร</label>
                        <div class="invalid-feedback">
                            โปรดกรอกชื่อร้านอาหารของท่าน
                        </div>
                    </div>
                    <div class="mt-3">
                        <select name="shop_type" id="shop_type" class="form-select p-3" placeholder required>
                            <option selected>เลือกประเภทร้านอาหาร</option>
                            <?php 
                                $sql = $conn->query("SELECT * FROM tb_shop_type");
                                while($fet = $sql->fetch_object()) {

                                
                            ?>
                            <option value="<?= $fet->type_id; ?>"><?= $fet->type_name; ?></option>
                            <?php } ?>
                        </select>

                        <div class="invalid-feedback">
                            โปรดเลือกประเภทร้านอาหารของท่าน
                        </div>
                    </div>

                    <div class="text-center mt-4 pt-2">
                        <button type="submit" class="btn btn-outline-primary w-75 mb-4">ลงทะเบียน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            loader();
        })
        $(document).on("submit","#frm_shopRegis",function(e) {
        
            formSubmit(e,"login.php");
            return false;
        })
        </script>
</body>
</html>