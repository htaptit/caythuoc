<?php
    include_once('config.php');
    $action = false;
    if(isset($_GET['id']) && validate_int($_GET['id'])) :
        $id = trim($_GET['id']);
        $action = true;
    else : 
        $action = false;
    endif;
    if(isset($action) && $action == true) :
        $data = mysqli_get_record('baiviet', 'id', $id);
    endif;
    $title = $data['ten'];  
    include_once( INCLUDE_URL . 'front-end-head.php');
    include_once( INCLUDE_URL . 'featured.php');
?>
    <!-- Main Start -->
    <div class="row-fluid">
        <div class="span12">
            <div class="main wrapper">
                <div class="row-fluid">
                    <!-- Content Start -->
                    <div class="span8">
                        <?php if(isset($action) && $action == false) :?>
                        <span class="result">
                            <h3 class="title">
                                <a href="#">Lỗi Hệ Thống</a>
                            </h3> 
                            <div>Bài viết không tồn tại trên hệ thống</div>
                         </span>
                         <?php endif;?>
                        <!-- entry -->
                        <div class="row-fluid">
                            <div class="details span12">
                                <div class="header">
                                    <div class="image-intro">
                                        <img src="<?=(isset($data['anh']) && $data['anh'] != '' ? UPLOAD_DIR . $data['anh'] : IMAGES_URL . 'no-logo.png')?>" alt="<?=$data['ten']?>" />
                                    </div>
                                    <div class="articles-intro news">
                                        <h4 class="title"><a href="#"><?=$data['ten']?></a></h4>
                                        <div class="info">
                                            <?=$data['noidung']?>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <!-- COMMENTS FORM -->
                            <?php include_once( INCLUDE_URL . 'comment-form.php');?>
                            <!-- END COMMENTS FORM -->
                        </div>
                    </div>
                    <!-- Content End -->
                    <!-- Sidebar Start -->
                    <div class="span4">
                        <!-- BOX NEWS -->
                        <?php include_once( INCLUDE_URL . 'box-news.php');?>
                        <!-- END BOX NEWS -->
                        <!-- BOX COMMENT -->
                        <?php include_once( INCLUDE_URL . 'comment-box.php');?>
                        <!-- END BOX COMMENT -->
                    </div>
                    <!-- Sidebar End -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
    <!-- Login Box -->
    <?php include_once( INCLUDE_URL . 'loginForm.php');?>
    <!-- Login Box END -->
    <!-- FOOTER -->
    <?php include_once( INCLUDE_URL . 'front-end-footer.php');?>