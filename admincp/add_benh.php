<?php
    include_once('../config.php');
    $title = 'Thêm Bệnh';  
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
    if( !is_logged_in() || !is_editor() ) :
        redirect_to();  
    endif;
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') :
        $errors = array();
        if($_POST['benh'] && $_POST['benh'] != '' && !is_numeric($_POST['benh'])) :
            $str = validate_string(strip_tags(trim($_POST['benh'])));
            if(isset($str)) :
                if(sizeof(mysqli_get_record('benh', 'ten', $str)) > 0) :
                    $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên bệnh này của bạn đã được sử dung.
                            </div>';
                else :
                    $benh = $str;
                endif;
            endif;
        else :
            $errors[] = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Tên bệnh không đúng.
                            </div>';
        endif;
        if(empty($errors)) :
            $query = "INSERT INTO benh (ten) VALUES ('".$benh."')";
            $result = mysqli_query($dbc, $query);
            confirm_query($result, $query);
            if(mysqli_affected_rows($dbc) > 0) :
            $log_content = 'Thêm Mới Thông Tin Bệnh : "'.$benh.'"';
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
            else :
                $errMsg = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Quá Trình Cập Nhật Dữ Liệu Thất Bại !
                            </div>';   
            endif;
        endif;
    endif;
?>
<!-- Body start -->
<div class="span5">
    <form method="post">
        <section id="formElement" class="widget form-box section">
            <div class="widget-title">
                <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                <span>Thêm Mới</span>
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
                                    <input class="small" type="text" name="benh" value="<?php if(isset($_POST['benh'])) echo strip_tags($_POST['benh']);?>" />
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