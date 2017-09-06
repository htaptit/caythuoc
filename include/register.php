<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) :
        $errors = array();
        if($_POST['username'] !='' && $_POST['address'] != '' && $_POST['name'] != '') :
            $address = mysqli_real_escape_string($dbc, strip_tags($_POST['address']));
            if(preg_match('/^[a-zA-Z]{6,30}/', strip_tags($_POST['username']))) :
                $check_username = mysqli_real_escape_string($dbc, strip_tags(trim($_POST['username'])));
            else :
                $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên Tài Khoản của bạn không đúng.
                            </div>';
            endif;
            if(isset($check_username)) :
                if(sizeof(mysqli_get_record('nguoidung', 'taikhoan', $check_username)) > 0) :
                    $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên Tài Khoản này của bạn đã được đăng kí.
                            </div>';
                else :
                    $username = $check_username;
                endif;
            endif;
            if(strlen($_POST['name']) > 4) :
                $name = mysqli_real_escape_string($dbc, strip_tags($_POST['name']));
            else :
            $errors[] = '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Tên của bạn không chính xác.
                        </div>';
            endif;
        else :
            $errors[] = '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Xin vui lòng nhập vào đầy đủ dữ liệu.
                        </div>';
        endif;
        if(!isset($_POST['term'])) :
            $errors[] = '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Bạn Chựa đồng ý với điều khoản dịch vụ của chúng tôi.
                        </div>';
        endif;
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) :
            $check_email = mysqli_real_escape_string($dbc, trim($_POST['email']));
        else :
            $errors[] = '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Email của bạn không chính xác.
                        </div>';
        endif;
        if(isset($check_email)) :
            if(sizeof(mysqli_get_record('nguoidung', 'email', $check_email)) > 0) :
                $errors[] = '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Email của bạn đã được đăng kí.
                        </div>';
            else :
                $email = $check_email;
            endif;
        endif;
        if(preg_match('/^[\w\'.-]{6,30}$/', strip_tags($_POST['pword']))) :
            if($_POST['pword'] == $_POST['re_pword']) :
                $pword = mysqli_real_escape_string($dbc, trim($_POST['pword']));
            else :
                $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Mật Khẩu không trùng khớp.
                            </div>';
            endif;
        else :
            $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Mật Khẩu không chính xác ( Mật khẩu phải dài hơn 6 kí tự ).
                            </div>';
        endif;
        if(empty($errors)) :
            $code = md5(uniqid(rand(), true));
            $args = array(
                'table' => 'nguoidung',
                'username' => $username,
                'pword' => $pword,
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'image' => 'no_avatar.png',
                'code' => $code
            );
            if(add_users($args)) :
                $succMsg = '<div class="alert alert-success">
                    <a class="close" data-dismiss="alert" href="#">×</a> Tài khoản Của <strong>
                    ';
                $succMsg.= $name;
                $succMsg.= '</strong> đã được khởi tạo thành công. Tài khoản của bạn cần phải được kích hoạt bởi quản trị viên để có thể sử dụng được các tính năng của hệ thống. Cảm ơn bạn đã sử dụng hệ thống tra cứu dữ liệu cây thuốc của chúng tôi.
                        </div>';
            else :
                $errMsg = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Quá Trình Đăng Kí Thành Viên Xảy Ra Lỗi !
                            </div>';                           
            endif;
        else :
            $errMsg = '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Xin Vui Lòng Kiểm Tra Lại Dữ Liệu Nhập Vào.
                        </div>';
        endif;
    endif;
?>
<div class="loginBox" id="registerBox" <?=(isset($errors) || isset($succMsg) ? 'style="display: block;"' : 'style="display: none;"')?>>
    <div class="row-fluid">
        <div class="modal-head">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&nbsp;</button>
            <a href="#" class="modal-logo">
                <img src="admincp/img/logo.png" />
            </a>
        </div>
    </div>
    <div class="modal-body">    
        <div class="row-fluid">
            <div class="title">
                Đăng Kí Thành Viên
            </div>
            <?php if(isset($succMsg) || isset($errors)) :?>
                <div style="width: 600px; margin: 10px auto 0;">
                    <?php 
                        if(isset($succMsg)) echo $succMsg;
                        if(isset($errors)) {report_errors($errors);} 
                    ?>
                </div>
            <?php endif;?>
            <?php if(!isset($succMsg)) : ?>
            <form method="post">
                <div class="span12">
                    <fieldset>
                        <div class="modal-row">
                            <label>Tài Khoản</label>
                            <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo strip_tags($_POST['username']);?>" />
                        </div>
                        <div class="modal-row">
                            <label>Mật Khẩu</label>
                            <input type="password" name="pword" value="123456"/>
                        </div>
                        <div class="modal-row">
                            <label class="full">Nhập Lại Mật Khẩu</label>
                            <input type="password" name="re_pword"/>
                        </div>
                        <div class="modal-row">
                            <label>Họ Tên</label>
                            <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo strip_tags($_POST['name']);?>"/>
                        </div>
                        <div class="modal-row">
                            <label>Hòm Thư</label>
                            <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo strip_tags($_POST['email']);?>"/>
                        </div>
                        <div class="modal-row">
                            <label>Nơi Ở</label>
                            <input type="text" name="address" value="<?php if(isset($_POST['address'])) echo strip_tags($_POST['address']);?>"/>
                        </div>
                    </fieldset>
                </div>
                <div class="span12" style="margin: 0; text-align: center;">
                    <div class="dieukhoan"><input type="checkbox" name="term" /><span>Tôi đồng ý với điều khoản dịch vụ</span></div>
                    <input type="submit" name="register" name="loginForm" value="Đăng Kí" />
                </div>
            </form>
            <?php endif;?>
        </div>
    </div>    
    <div class="row-fluid">
        <div class="modal-footer">
            <p><strong>Đăng kí tài khoản để trải nghiệm các tiện ích trên hệ thống <br>
                Đây là tài khoản duy nhất sử dụng xuyên suốt cho tất cả dịch vụ. <a rel="nofollow" title="Xem thêm" target="_blank" href="#">Xem thêm</a></p>
        </div>
    </div>
</div>