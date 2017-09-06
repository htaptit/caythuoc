<?php
    include_once('../config.php');
    $title = 'Thêm Cây Thuốc';  
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
    if( !is_logged_in() || !is_editor() ) :
        redirect_to();  
    endif;
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') :
        $errors = array();
        if($_POST['tencaythuoc'] != '' && $_POST['tenkhac'] != '' && $_POST['tenkhoahoc'] != '' && $_POST['ho'] != '' && $_POST['benh'] != '' && $_POST['tacdung'] != '' && $_POST['tphh'] != '' && $_POST['tddl'] != '' && $_POST['congdung'] != '' && $_POST['donthuoc'] != '' && $_POST['thuhai'] != '' && $_POST['mota'] != '') :
            $tenkhac = mysqli_real_escape_string($dbc, strip_tags($_POST['tenkhac']));
            $tenkhoahoc = mysqli_real_escape_string($dbc, strip_tags($_POST['tenkhoahoc']));
            $ho = mysqli_real_escape_string($dbc, strip_tags($_POST['ho']));
            $benh = mysqli_real_escape_string($dbc, strip_tags($_POST['benh']));
            $tacdung = mysqli_real_escape_string($dbc, strip_tags($_POST['tacdung']));
            $tphh = mysqli_real_escape_string($dbc, strip_tags($_POST['tphh']));
            $tddl = mysqli_real_escape_string($dbc, strip_tags($_POST['tddl']));
            $congdung = mysqli_real_escape_string($dbc, strip_tags($_POST['congdung']));
            $donthuoc = mysqli_real_escape_string($dbc, strip_tags($_POST['donthuoc']));
            $thuhai = mysqli_real_escape_string($dbc, strip_tags($_POST['thuhai']));
            $mota = mysqli_real_escape_string($dbc, strip_tags($_POST['mota']));
            $str = validate_string(strip_tags(trim($_POST['tencaythuoc'])));
            if(isset($str)) :
                if(sizeof(mysqli_get_record('caythuoc', 'ten', $str)) > 0) :
                    $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên cây thuốc này của bạn đã được sử dung.
                            </div>';
                else :
                    $tencaythuoc = $str;
                endif;
            endif;
        else :
            $errors[] = '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            Xin vui lòng nhập vào đầy đủ dữ liệu.
                        </div>';
        endif;
        // Kiểm Tra ảnh
        if(isset($_FILES['image'])) :
                    
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
    
        // Xóa File đã được upload và tồn tại trong thư mục tạm
        if(isset($_FILES['image']['tmp_name']) && is_file($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) :
            unlink($_FILES['image']['tmp_name']);
        endif;
        if(empty($errors) && empty($errMsg)) :
            $query = "INSERT INTO caythuoc (ten, tenkhac, tenkhoahoc, anh, ho, idtacdung, idbenh, mota, thuhai, thanhphanhoahoc, tacdungduocly, congdung, donthuoc, ngaytao)";
            $query .= " VALUES ('".$tencaythuoc."', '".$tenkhac."', '".$tenkhoahoc."', '".( isset($image) ? $image : '' )."', '".$ho."', '".$tacdung."', '".$benh."', '".$mota."', '".$thuhai."', '".$tphh."', '".$tddl."', '".$congdung."', '".$donthuoc."', NOW())";
            $result = mysqli_query($dbc, $query);
            confirm_query($result, $query);
            if(mysqli_affected_rows($dbc) > 0) :
                $idcaythuoc = mysqli_insert_id($dbc);
                $args = array(
                    'action' => 'add',
                    'table' => 'caythuoc_benh',
                    'key1' => 'idcaythuoc',
                    'key2' => 'idbenh',
                    'val1' => $idcaythuoc,
                    'val2' => $benh
                );
                if(add_record($args)) :
                    $args2 = array(
                        'action' => 'add',
                        'table' => 'caythuoc_tacdung',
                        'key1' => 'idcaythuoc',
                        'key2' => 'idtacdung',
                        'val1' => $idcaythuoc,
                        'val2' => $tacdung
                    );
                    if(add_record($args2)) :
                        $log_content = 'Thêm Mới Thông Tin Cây Thuốc : "'.$tencaythuoc.'"';
                        $args = array(
                            'id' => $_SESSION['userId'],
                            'content' => $log_content
                        );
                        if(add_log($args)) :
                            $succMsg = '<div class="alert alert-success">
                                        <a class="close" data-dismiss="alert" href="#">×</a>
                                        Quá Trình Cập Nhật Dữ Liệu Thành Công !
                                    </div>';
                        endif;
                    endif;
                endif;
            else :
                $errMsg = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Quá Trình Cập Nhật Dữ Liệu Thất Bại !
                            </div>';   
            endif;
        endif;
        //END CHECK ERROR
    endif;
    // end $_REQUEST
?>
<!-- Body start -->
<div class="span10">
    <form method="post" enctype="multipart/form-data">
        <section id="formElement" class="widget form-box section">
            <div class="widget-title">
                <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                <span>Thêm Cây Thuốc</span>
            </div>
            <div class="row-fluid">
                <?php 
                    if(isset($errMsg)) echo $errMsg;
                    if(isset($succMsg)) echo $succMsg;
                    if(isset($errors)) {report_errors($errors);} 
                ?>
                <div class="widget-content form">
                    <div class="span6 form-freeSpace">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">Tên Cây Thuốc</label>
                                <div class="controls">
                                    <input class="span10" type="text" name="tencaythuoc" value="<?php if(isset($_POST['tencaythuoc'])) echo strip_tags($_POST['tencaythuoc']);?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tên Khác</label>
                                <div class="controls">
                                    <input class="span10" type="text" name="tenkhac" value="<?php if(isset($_POST['tenkhac'])) echo strip_tags($_POST['tenkhac']);?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tên Khoa Học</label>
                                <div class="controls">
                                    <input class="span10" type="text" name="tenkhoahoc" value="<?php if(isset($_POST['tenkhoahoc'])) echo strip_tags($_POST['tenkhoahoc']);?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Họ</label>
                                <div class="controls">
                                    <input class="span10" type="text" name="ho" value="<?php if(isset($_POST['ho'])) echo strip_tags($_POST['ho']);?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tác Dụng</label>
                                <div class="controls">
                                    <select class="span6" name="tacdung">
                                        <option value="">Chọn tác dụng</option>
                                        <?php
                                            if(sizeof(mysqli_getAll('tacdung')) > 0) :
                                                foreach(mysqli_getAll('tacdung') as $key => $val) :
                                        ?>
                                        <option value="<?=$val['id']?>" <?=(isset($_POST['tacdung']) && $_POST['tacdung'] == $val['id'] ? "selected='selected'" : '')?>><?=$val['tentacdung']?></option>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Chọn Bệnh</label>
                                <div class="controls">
                                    <select class="span6" name="benh">
                                        <option value="">Chọn Bệnh</option>
                                        <?php
                                            if(sizeof(mysqli_getAll('benh')) > 0) :
                                                foreach(mysqli_getAll('benh') as $key => $val) :
                                        ?>
                                        <option value="<?=$val['id']?>" <?=(isset($_POST['benh']) && $_POST['benh'] == $val['id'] ? "selected='selected'" : '')?>><?=$val['ten']?></option>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textarea">Thành Phần Hóa Học</label>
                                <div class="controls">
                                    <textarea id="textarea" name="tphh" class="span10" rows="3"><?php if(isset($_POST['tphh'])) echo strip_tags($_POST['tphh']);?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textarea">Tác Dụng Dược Lý</label>
                                <div class="controls">
                                    <textarea id="textarea" name="tddl" class="span10" rows="3"><?php if(isset($_POST['tddl'])) echo strip_tags($_POST['tddl']);?></textarea>
                                </div>
                            </div>
                            
                        </fieldset>
                    </div>
                    <div class="span6 form-freeSpace">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="textarea">Công Dụng</label>
                                <div class="controls">
                                    <textarea id="textarea" name="congdung" class="span10" rows="3"><?php if(isset($_POST['congdung'])) echo strip_tags($_POST['congdung']);?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textarea">Đơn Thuốc</label>
                                <div class="controls">
                                    <textarea id="textarea" name="donthuoc" class="span10" rows="3"><?php if(isset($_POST['donthuoc'])) echo strip_tags($_POST['donthuoc']);?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textarea">Thu Hái</label>
                                <div class="controls">
                                    <textarea id="textarea" name="thuhai" class="span10" rows="3"><?php if(isset($_POST['thuhai'])) echo strip_tags($_POST['thuhai']);?></textarea>
                                </div>
                            </div>
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
                <span>Mô Tả</span>
            </div>
            <div class="row-fluid">
                <div class="utopia-widget-content-nopadding">
                    <div class="span12 text-editor">
                        <textarea id="textarea" name="mota" class="ckeditor" class="span8" rows="3"><?php if(isset($_POST['mota'])) echo strip_tags($_POST['mota']);?></textarea>
                    </div>
                </div>
            </div>
        </section>
        <div class="btn-submit">
            <input type="submit" id="growl-above" class="btn btn-success span5" value="Submit" />
        </div>
    </form>
</div>
<?php include_once( INCLUDE_URL . 'footer.php');?>