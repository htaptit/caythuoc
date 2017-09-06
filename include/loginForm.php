<?php 
    if($_POST && isset($_POST['submit'])) :

    	// error array
    	$errors = array();
    
    	// username
    	if( !isset($_POST['username']) || empty($_POST['username']) || preg_match('/\s/i', $_POST['username']) == true ) :
    		$error[] = '<div class="alert alert-error" style="width: auto;">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Tên đăng nhập không hợp lệ.
                        </div>';
    	else :
    		$username = validate_string($_POST['username']);
    	endif;
    
    	if( !isset($_POST['password']) || empty($_POST['password']) ) :
    		$errors[] = '<div class="alert alert-error" style="width: auto;">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Mật khẩu không phù hợp.
                        </div>';
    	else :
    		$password = sha1(validate_string($_POST['password']));
    	endif;
    
    	if( empty($errors) ) :
    		$sql = 'SELECT * FROM nguoidung WHERE taikhoan="'.$username.'" AND matkhau="'.$password.'" LIMIT 1';
    		$result = mysqli_query($dbc, $sql);
            confirm_query($result, $sql);
    		if( mysqli_num_rows($result) == 1 ) :
    			$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    			$_SESSION = array(
    					'userId' 	=> $data['id'],
    					'username' 	=> $data['taikhoan'],
    					'userLevel'	=> $data['maquyen'],
                        'avatar'	=> $data['avatar'],
                        'active' => ((is_null($data['trangthai'])) ? 1 : 0)
    				);
                redirect_to();
    		else :
    			 $errors[] = '<div class="alert alert-error" style="width: auto;">
                                        <a class="close" data-dismiss="alert" href="#">×</a>
                                        Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng kiểm tra lại!
                                    </div>';
    		endif;
    	endif;
    endif;
?>
<div class="loginBox" id="loginBox" <?=(isset($errors) ? 'style="display: block;"' : 'style="display: none;"')?>>
    <div class="modal-head">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&nbsp;</button>
        <a href="#" class="modal-logo">
            <img src="admincp/img/logo.png" />
        </a>
    </div>
    <div class="modal-body">
        <form method="post">
            <fieldset>
                <div class="title">
                    Đăng Nhập
                </div>
                <?php if(isset($errors) && !empty($errors)) {report_errors($errors);}?>
                <div class="modal-row">
                    <label>Tài Khoản</label>
                    <input type="text" name="username" value="" placeholder="Tài Khoản" />
                </div>
                <div class="modal-row">
                    <label>Mật Khẩu</label>
                    <input type="password" name="password" value="" placeholder="Mật Khẩu" />
                </div>
                <input type="submit" name="submit" name="loginForm" value="Đăng Nhập" />
                <span id="lbl_register">&nbsp;Bạn chưa có tài khoản ? <a href="#registerBox" class="reg-window">Đăng Kí</a></span>
            </fieldset>
        </form>
    </div>
    <div class="modal-footer">
        <p><strong>Đăng nhập để trải nghiệm các tiện ích trên hệ thống <br>
            Đây là tài khoản duy nhất sử dụng xuyên suốt cho tất cả dịch vụ. <a rel="nofollow" title="Xem thêm" target="_blank" href="#">Xem thêm</a></p>
    </div>
</div>