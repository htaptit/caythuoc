<?php
	include_once('../config.php');
    if( !is_logged_in() || !is_admin() ){
        redirect_to();
    }
    $title = 'Chỉnh Sửa Thông Tin Thành Viên';  
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');

    if( !isset($_GET['id']) || validate_int($_GET['id']) == false || is_valid_unique('nguoidung', 'id', $_GET['id']) != true ) redirect_to('admincp/users.php');

    $id = validate_int($_GET['id']);
    $data = mysqli_get_record('nguoidung', 'id', $id);

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    	$errors = array();

    	if( isset($_POST['id']) && validate_int($_POST['id']) ){
    		$username = validate_int($id);
    	} else{
    		$errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên Tài Khoản không đúng.
                            </div>';
    	}

    	if( isset($_POST['username']) && preg_match('/^[a-zA-Z]{6,30}/', strip_tags($_POST['username'])) ){
    		$username = validate_string(strip_tags($_POST['username']));
    	} else{
    		$errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên không đúng.
                            </div>';
    	}

    	if( isset($_POST['password']) && trim($_POST['password']) != '' ){
    		if( preg_match('/^[\w\'.-]{6,30}$/', strip_tags($_POST['password']))  ){
    			$password = sha1(validate_string(strip_tags($_POST['password'])));
    		}
    		else{
    			$errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Mật khẩu không đúng.
                            </div>';
    		}
    	} 

    	if( isset($_POST['name']) && strlen($_POST['name']) > 4 ){
    		$name = validate_string( strip_tags($_POST['name']) );
    	} else{
    		$errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Họ tên Khoản không đúng.
                            </div>';
    	}

    	if( isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
    		$email = validate_string(strip_tags($_POST['email']));
    	} else{
    		$errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Email không đúng.
                            </div>';
    	}

    	if( isset($_POST['address']) && $_POST['address'] != '' ){
    		$address = validate_string($_POST['address']);
    	}
   		if( isset($_POST['note']) && strip_tags($_POST['note']) != '' ){
            $note = validate_string(strip_tags($_POST['note']));
        }
    	if( isset($_POST['status']) && validate_int($_POST['status']) ){
    		$status = validate_int($_POST['status']);
    	}

    	if( isset($_POST['userlevel']) && validate_int($_POST['userlevel']) ){
    		$userlevel = validate_int($_POST['userlevel']);
    	} else{
    		$errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Mã quyền không đúng.
                            </div>';
    	}

    	if( empty($errors) ){
    		// Kiểm Tra ảnh
            if(isset($_FILES['image'])) :
                // Kiểm Tra Lỗi File Upload
                if($_FILES['image']['error'] > 0) :
                    $errMsg = "<div class='alert alert-error'>
                                    <a class='close' data-dismiss='alert' href='#'>×</a>
                                    Các tập tin không thể được tải lên bởi vì: <strong>";
                    
                    switch ($_FILES['image']['error']) :
                        case 1:
                            $errMsg .= "Kích thước tập tin quá lớn, cấu hình lại upload_max_filesize trong php.ini";
                            break;
                            
                        case 2:
                            $errMsg .= "Kích thước tập tin vướt quá dung lượng cho phép";
                            break;
                         
                        case 3:
                            $errMsg .= "Đã tải lên được một phần";
                            break;
                        
                        case 4:
                            $errMsg .= "Không có tập tin nào được tải lên";
                            break;

                        case 6:
                            $errMsg .= "Thư mục tạm thời không tồn tại";
                            break;

                        case 7:
                            $errMsg .= "Không thể ghi vào thư mục";
                            break;

                        case 8:
                            $errMsg .= "Tập tin tải lên bị dừng lại";
                            break;
                        
                        default:
                            $errMsg .= "Đã xảy ra một lỗi hệ thống.";
                            break;
                    endswitch; // END of switch
            
                    $errMsg .= "</strong></div>";
                endif; // Kết Thúc Kiểm Tra Lỗi File UpLoad

                //array kiểm tra định dạng cho phép của file upload
                $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'image/x-png', 'image/gif');
                
                if(in_array(strtolower($_FILES['image']['type']), $allowed)) :
                    $tmp = explode('.', $_FILES['image']['name']);
                    $ext = end($tmp); // Tách lấy phần mở rộng
                    $image = uniqid(rand(), true).'.'."$ext"; // Đặt lại tên cho File Upload
                    
                    if(!move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD.$image)) :
                        $errors[] = '<div class="alert alert-error">
                                        <a class="close" data-dismiss="alert" href="#">×</a>
                                        Hệ thống xảy ra lỗi trong quá trình xử lý ảnh !
                                    </div>';
                    endif;
                endif;
            endif; // Kết Thúc Xử Lý File Upload Load

            // Xóa File đã được upload và tồn tại trong thư mục tạm
            if(isset($_FILES['image']['tmp_name']) && is_file($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) :
                unlink($_FILES['image']['tmp_name']);
            endif;

            if( isset($image) ){
                $image = $image;
            } else{
                $image = validate_string($data['avatar']);
            }

            $sql = 'UPDATE `nguoidung` SET taikhoan="'.$username.'", ';
            $sql .= ( isset($password) ) ? 'matkhau ="'.$password.'"' : 'matkhau ="'.$data['matkhau'].'"';
            $sql .= ', hoten="'.$name.'"';
            $sql .= ', '.'email="'.$email.'"';
            $sql .= ', '.'noio="'.$address.'"';
            if(isset($note)) :
                $sql .= ', ghichu="'.$note.'"';
            endif;
            if( isset($status) && $status == 1 ) :
            	$sql .= ', trangthai='. 'NULL';
            endif; 
            if( isset($status) && $status == 2 ) :
            	$sql .= ', trangthai='. '"Not actived"';
            endif;
			$sql .= ', '.'maquyen='.$userlevel.'';
			$sql .=	', avatar="'.$image.'" ';
			$sql .= 'WHERE id='.$id.' LIMIT 1';
			$result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
			if( mysqli_affected_rows($dbc) == 1){
                $log_content = 'Chỉnh Sửa Thông Tin Thành Viên : "'.$name.'"';
                $args = array(
                    'id' => $_SESSION['userId'],
                    'content' => $log_content
                );
                if(add_log($args)) :
                    $message = '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Cập Nhật dữ liệu thành công!</div>';
                endif;
			} else{
				echo ($status == 1) ? '1' : '2';
				var_dump($sql);
				$message = '<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Cập Nhật dữ liệu không thành công!</div>';
			}

    	}

    }
    // require form edit.
    require_once INCLUDE_URL.'edit-user-form.php';
?>