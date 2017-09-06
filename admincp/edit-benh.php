<?php
    include_once('../config.php');
    $title = 'Chỉnh Sửa Tác Dụng';  
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
    if( !is_logged_in() || !is_editor() || !isset($_GET['id']) || validate_int($_GET['id']) == false) :
        redirect_to();  
    endif;
    $id = validate_int($_GET['id']);
    $data = mysqli_get_record('benh', 'id', $id);
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') :
        $errors = array();
        if($_POST['benh'] && $_POST['benh'] != '' && !is_numeric($_POST['benh'])) :
            $str = validate_string(strip_tags(trim($_POST['benh'])));
            if(isset($str)) :
                if(is_valid_title_unique('benh', 'ten', $str, 'id', $id)) :
                    $benh = $str;
                else :
                    $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên Bệnh này của bạn đã được sử dung.
                            </div>';
                endif;
            endif;
        else :
            $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên bệnh không đúng.
                            </div>';
        endif;
        if(empty($errors)) :
            $query = "UPDATE benh SET ten = '".$benh."' WHERE id = ".$id." LIMIT 1";
            $result = mysqli_query($dbc, $query);
            confirm_query($result, $query);
            if(mysqli_affected_rows($dbc) > 0) :
                $log_content = 'Chỉnh Sửa Thông Tin Bệnh : "'.$benh.'"';
                $args = array(
                    'id' => $_SESSION['userId'],
                    'content' => $log_content
                );
                if(add_log($args)) :
                    $message = '<div class="alert alert-success">
                                <a class="close" data-dismiss="alert" href="#">×</a>';
                    $message .= 'Xóa bản ghi thành công!';
                    $message .= '</div>';
                endif;
            else :
                $errMsg = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Quá Trình Cập Nhật Dữ Liệu Thất Bại !
                            </div>';   
            endif;
        endif;
        $data = mysqli_get_record('benh', 'id', $id);
    endif;
?>
<!-- Body start -->
<div class="span5">
    <form method="post">
        <section id="formElement" class="widget form-box section">
            <div class="widget-title">
                <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                <span>Chỉnh Sửa Tên Bệnh</span>
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
                                <label class="control-label">Tên Bệnh</label>
                                <div class="controls">
                                    <input class="small" type="text" name="benh" value="<?php if(isset($data['ten'])) echo strip_tags($data['ten']);?>" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="btn-submit clear">
                    <input type="submit" id="growl-above" class="btn btn-success span3" value="Submit" />
                </div>
            </div>
        </section>
    </form>
</div>
<?php include_once( INCLUDE_URL . 'footer.php');?>