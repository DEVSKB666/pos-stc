<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Register</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">


    <div class="container">
        <div class="row shadow rounded-4">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                <img class="object-fit-cover border-0" width="100%" height="100%" src="image/orther/5214643.jpg" alt="">
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5 shadow-sm">
                <h3 class="fw-bold text-center mt-4">สมัครสมาชิก</h3>

                <form class="needs-validation px-5" action="" method="post" id="frm_regis" enctype="multipart/form-data" novalidate>
                    <div class="form-floating mt-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
                        <label class="form-label" for="">ชื่อผู้ใช้</label>
                        <div class="invalid-feedback">
                            โปรดกรอกชื่อผู้ใช้ของท่าน
                        </div>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="fullname" required>
                        <label class="form-label" for="">ชื่อ-สกุล</label>
                        <div class="invalid-feedback">
                            โปรดกรอกชื่อ-สกุลของท่าน
                        </div>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                        <label class="form-label" for="">รหัสผ่าน</label>
                        <div class="invalid-feedback">
                            โปรดกรอกรหัสผ่านของท่าน
                        </div>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" name="address" id="address" class="form-control" placeholder="address" required>
                        <label class="form-label" for="">ที่อยู่</label>
                        <div class="invalid-feedback">
                            โปรดกรอกที่อยู่ของท่าน
                        </div>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="tel" pattern="[0-9]{10}" name="tel" id="tel" class="form-control" placeholder="tel" required>
                        <label class="form-label" for="">เบอร์โทรศัพท์</label>
                        <div class="invalid-feedback">
                            โปรดกรอกเบอร์โทรศัพท์ของท่าน
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label ms-2">รูปโปรไฟล์</label>
                        <input type="file" name="user_img" id="user_img" class="form-control">
                    </div>

                    <div class="text-center mt-4">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="user_role" id="user_role" id="4" class="form-check-input" required>
                            <label for="" class="form-check-label">ชื่อผู้ใช้ทั่วไป</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="user_role" id="user_role" id="2" class="form-check-input" required>
                            <label for="" class="form-check-label">ร้านอาหาร</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="user_role" id="user_role" id="3" class="form-check-input" required>
                            <label for="" class="form-check-label">ผู้จัดส่งอาหาร</label>
                        </div>

                        <div class="invalid-feedback">
                            โปรดเลือกประเภทผู้ใช้งานของท่าน
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <p>มีบัญชีอยู่แล้วใช่ไหม <a href="login.php" class="fw-bold text-decoration-none">เข้าสู่ระบบ</a></p>
                        <button type="submit"class="btn btn-success w-75 mb-4">ลงทะเบียน</button>
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
        $(document).on("submit","#frm_regis",function(e) {
            let link = "";
            if($("#user_role:checked").val() === '2'){
                link = "shopdetails.php";
            }else{
                link = "login.php";
            }
            formSubmit(e,link);
            return false;
        })
        </script>
</body>

</html>