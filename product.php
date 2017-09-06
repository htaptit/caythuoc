<?php
    include_once('config.php');
    $data = get_product_by_id();
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
                        <!-- entry -->
                        <div class="row-fluid">
                            <div class="details span12">
                                <div class="header">
                                    <div class="image-intro">
                                        <img src="<?=(isset($data['anh']) && $data['anh'] != '' ? UPLOAD_DIR . $data['anh'] : IMAGES_URL . 'no-logo.png')?>" alt="<?=$data['ten']?>" />
                                    </div>
                                    <div class="articles-intro">
                                        <h4 class="title"><a href="#"><?=$data['ten']?></a></h4>
                                        <div class="info">
                                            <div><span>Tên Khác :</span><?=$data['tenkhac']?></div>
                                            <div><span>Tên Khoa Học :</span><?=$data['tenkhoahoc']?></div>
                                            <div><span>Họ :</span><?=$data['ho']?></div>
                                            <div><span>Bệnh :</span><?=mysqli_get_record('benh', 'id', $data['idbenh'])['ten']?></div>
                                            <div><span>Tác Dụng :</span><?=mysqli_get_record('tacdung', 'id', $data['idtacdung'])['tentacdung']?></div>
                                            <div class="intro-text"><h4 class="title">Công Dụng :</h4><?=$data['congdung']?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="articles-content">
                                    <div>
                                        <h4 class="title">Thành Phần Hóa Học :</h4>
                                        <?=$data['thanhphanhoahoc']?>
                                    </div>
                                    <div>
                                        <h4 class="title">Tác Dụng Dược Lý :</h4>
                                        <?=$data['tacdungduocly']?>
                                    </div>
                                    <div>
                                        <h4 class="title">Thu Hái :</h4>
                                        <?=$data['thuhai']?>
                                    </div>
                                    <div>
                                        <h4 class="title">Đơn Thuốc :</h4>
                                        <?=$data['donthuoc']?>
                                    </div>
                                    <div>
                                        <?=$data['mota']?>
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