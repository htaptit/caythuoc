<?php 
    include_once('../config.php');
    if(!isset($_SESSION['userId'])) {
        redirect_to('register.php');
    } else {
        // Nếu thông tin người dùng tồn tại sẽ loguot tài khoản
        $_SESSION = array();
        
        session_destroy(); // destroy session đã khởi tạo
        
        setcookie(session_name(),'',time()-36000); // xóa cookie của trình duyệt
        redirect_to();
    }