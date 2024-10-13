<?php
    session_start();
    include '../connect.php';
    include 'function.php';
    $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
    $fet = $sql->fetch_object();
    if($_REQUEST['newpass'] != $_REQUEST['compass']) {
        echo jsonMsg("รหัสผ่านไม่ตรงกัน ลองใหม่อีกครั้ง","error");
    }else{
        if(password_verify($_REQUEST['oldpass'],$fet->password)) {
            $hash = password_hash($_REQUEST['newpass'],PASSWORD_BCRYPT);
            $sql_update = $conn->query("UPDATE tb_user SET password='".$hash."' WHERE user_id='".$_SESSION['user_id']."' ");
            if($sql_update) {
                echo jsonMsg("เปลี่ยนรหัสผ่านสำเร็จ","success");
            }else{
                echo $conn->error;
            }
        }else{
            echo jsonMsg("รหัสผ่านเดิมไม่ถูกต้อง","error");
        }
    }
?>