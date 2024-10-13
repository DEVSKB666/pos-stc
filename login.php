<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Login</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">


    <div class="container">
        <div class="row shadow rounded-4">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                <img class="object-fit-cover" width="100%" height="100%" src="image/orther/6206973.jpg" alt="">
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5 shadow-sm mt-5 pt-5">

                <h3 class="fw-bold text-center pt-5">เข้าสู่ระบบ</h3>
                <form class="needs-validation px-5" action="api/ac_login.php" id="frm_login" method="post" novalidate>
                    <div class="form-floating mt-3">
                        <input type="text" name="username" id="username" placeholder="username" class="form-control"
                            required>
                        <label for="" class="form-label">ชื่อผู้ใช้</label>
                        <div class="invalid-feedback">
                            โปรดกรอกชื่อผู้ใช้ของท่าน
                        </div>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" name="password" id="password" placeholder="password" class="form-control"
                            required>
                        <label for="" class="form-label">รหัสผ่าน</label>
                        <div class="invalid-feedback">
                            โปรดกรอกรหัสผ่านของท่าน
                        </div>
                    </div>

                    <div class="form-check mt-2">
                        <input type="checkbox" name="" id="" class="form-check-input">
                        <small class="form-check-label text-muted">แสดงรหัสผ่าน</small>
                    </div>

                    <div class="mt-4 text-center">
                        <p>ยังไม่มีบัญชีใช่ไหม <a href="register.php" class="fw-bold text-decoration-none">สมัครเลย</a>
                        </p>
                        <button type="submit" class="btn btn-primary w-75 mb-5">เข้าสู่ระบบ</button>
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
        $(document).on("submit","#frm_login",function(e) {
            
            formSubmit(e);
            return false;
        })
        </script>
</body>

</html>