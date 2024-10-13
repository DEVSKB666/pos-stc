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
    <div id="loader" class="d-flex justify-content-center align-items-center vh-100" style="background-color: grey;">
        <div class="spinner-border"></div>
    </div>

    <div class="alertMsg d-none" id="alert">
        <div id="txt"></div>
    </div>


    <div id="content" class="container mt-1">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <img width="100%" height="590" class="object-fit-cover" src="image/orther/6206973.jpg" alt="">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-5 pt-4">
                <div class="card border-0 shadow rounded-4">
                        <h3 class="fw-bold pt-5 mt-4 text-center">เข้าสู่ระบบ</h3>

                        <form class="needs-validation px-5" action="api/ac_login.php" id="frm_login" method="post" novalidate>
                            <div class="form-floating mt-3">
                                <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
                                <label for="" class="form-label">ชื่อผู้ใช้</label>
                                <div class="invalid-feedback">
                                    โปรดกรอกชื่อผู้ใช้ของท่าน
                                </div>
                            </div>
                            <div class="form-floating mt-3">
                                <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                                <label for="" class="form-label">รหัสผ่าน</label>
                                <div class="invalid-feedback">
                                    โปรดกรอกรหัสผ่านของท่าน
                                </div>
                            </div>

                            <div class="form-check mt-1">
                                <input type="checkbox" onclick="showpass()" class="form-check-input">
                                <small for="" class="form-check-label text-muted">แสดงรหัสผ่าน</small>
                            </div>

                            <div class="d-grid mt-3 text-center">
                                <p>ยังไม่มีบัญชีใช่ไหม <a href="register.php" class="text-decoration-none">สมัครเลย</a></p>

                                <button class="btn btn-grid btn-primary mb-5">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                </div>
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