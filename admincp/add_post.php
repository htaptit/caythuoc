<?php
    include_once('../config.php');
    $title = "Thêm Bài Viết";
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
    if( !is_editor() ){
        redirect_to();
    }
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

        $errors = array();
        if( isset($_POST['title']) && $_POST['title'] != '' ){
            $title = validate_string(strip_tags($_POST['title']));
        } else{
            $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên bài viết không hợp lệ.
                            </div>';
        }
        if( isset($_POST['description']) ){
            $description = validate_string($_POST['description']);
        }
        if( isset($_POST['content']) ){
            $content = validate_string($_POST['content']);
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

            if(empty($errors) && empty($errMsg)) :
                $sql = "INSERT INTO baiviet (ten, tomtat, noidung, anh, ngaytao) VALUES ";
                $sql .= '("'.$title.'", "'.$description.'", "'.$content.'", "'.$image.'", NOW())';
                $result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
                if( mysqli_affected_rows($dbc) == 1){
                    $log_content = 'Thêm Mới Bài Viết : "'.$title.'"';
                    $args = array(
                        'id' => $_SESSION['userId'],
                        'content' => $log_content
                    );
                    if(add_log($args)) :
                        $message = '<div class="alert alert-success">
                                <a class="close" data-dismiss="alert" href="#">×</a>';
                        $message .= 'Cập nhật dữ liệu thành công!';
                        $message .= '</div>';
                    endif;
                } else{
                    $message = '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>';
                    $message .= 'Cập nhật dữ liệu không thành công!';
                    $message .= '</div>';
                }
            endif;
        }
    }
?>
<!-- Body start -->
<div class="span10">
    <form action="" method="POST" enctype="multipart/form-data">
        <section id="formElement" class="widget form-box section">
            <div class="widget-title">
                <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                <span>Chỉnh Sửa Bài Viết</span>
                <?php 
                    if(isset($errMsg)) echo $errMsg;
                    if(isset($succMsg)) echo $succMsg;
                    if(isset($errors)) {report_errors($errors);} 
                ?>
            </div>
            <div class="row-fluid">
                <div class="widget-content form">
                    <div class="span6 form-freeSpace">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="input01">Tên bài viết</label>
                                <div class="controls">
                                    <input id="input01" name="title" class="span10" type="text" value="<?php if(isset($_POST['title'])) echo strip_tags($_POST['title']);?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textarea">Tóm tắt</label>

                                <div class="controls">
                                    <textarea id="textarea" name="description" class="span10" class="span8 ckeditor" rows="3"><?php if(isset($_POST['description'])) echo strip_tags($_POST['description']);?></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="span6 form-freeSpace">
                        <fieldset>
                            <div class="control-group">
                                <div class="controls controls-normal">
                                    <img width="100%" height="auto" class="picture" src="<?php echo (isset($image))? UPLOAD_DIR.$image : ADMIN_IMG_URL.'no-logo.png';?>" alt="Logo" />
                                </div>
                                <div class="upload">
                                    <p class="p-normal">Chọn Hình Ảnh ( Định Dạng Cho Phép PNG, JPG Và Gif )<p> 
                                    <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
                                    <input type="file" name="image" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </section>
        <section id="texEditor" class="widget section">
            <div class="widget-title">
                <img src="<?=ADMIN_IMG_URL.'icons/pencil.png'?>" class="widget-icon">
                <span>Text editor</span>
            </div>
            <div class="row-fluid">
                <div class="utopia-widget-content-nopadding">
                    <div class="span12 text-editor">
                        <textarea id="textarea" class="ckeditor" name="content" class="span8" rows="3"><?php if(isset($_POST['content'])) echo strip_tags($_POST['content']);?></textarea>
                    </div>
                </div>
            </div>
        </section>
        <div class="btn-submit">
            <input type="submit" id="growl-above" class="btn btn-success span5" name="submit" value="submit" />
        </div>
    </form>
</div>
<?php include_once( INCLUDE_URL . 'footer.php');?>