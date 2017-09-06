<?php
    include_once('config.php');
    $title = 'Kích Hoạt Thành Viên';   
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
?>
<!-- Body start -->
<div class="span10 body-container">
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <?php 
                    if(isset($_GET['x'], $_GET['y']) && strlen($_GET['y']) == 32) :
                        $taikhoan = mysqli_real_escape_string($dbc, strip_tags($_GET['x']));
                        $code = mysqli_real_escape_string($dbc, strip_tags($_GET['y']));
                        $args = array(
                            'taikhoan' => $taikhoan,
                            'code' => $code
                        );
                        //var_dump(actived_users($args)); die();
                        if(actived_users($args)) :
                            echo '<div class="alert alert-success">
                                        <a class="close" data-dismiss="alert" href="#">×</a>
                                            Chúc Mừng Bạn Đã Kích Hoạt Tài Khoản Thành Công. Bấm vào <a href="'.SITE_URL.'index.php">Đây</a> để quay lại trang chủ.
                                    </div>';
                        else :
                            echo redirect_to();
                        endif;
                    else :
                        // Thong tin khong dung, hoac khong hop le, chuyen huong nguoi dung ve trang index
                        echo redirect_to();
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php include_once( INCLUDE_URL . 'footer.php');?>