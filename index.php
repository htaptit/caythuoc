<?php
    include_once('config.php');
    $title = 'Trang Chủ';
    include_once( INCLUDE_URL . 'class.phpmailer.php');
    include_once( INCLUDE_URL . 'class.smtp.php');  
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
                        <?php
                            $table = 'caythuoc';
                            $data_pagination = pagination('caythuoc', 6, 'index.php', true);
                            $data = $data_pagination->data;
                            if( !empty($data) ) :
                                foreach($data as $key => $val) :
                        ?>
                                <div class="entry ">
                                	<div class="entry-previewimage rounded"><a href="" title="<?php echo $val['ten'] ?>">
                                    <img src="<?php echo (isset($val['anh']) && $val['anh'] != '' ? UPLOAD_DIR . $val['anh'] : IMAGES_URL . 'no-logo.png') ?>" alt="<?php echo $val['ten']?>"/></a></div>			
                                	<div class="entry-content">
                                		<h1 class="entry-heading">
                                			<a href="<?php echo SITE_URL.'product.php?id='.$val['id'].'&control=idcaythuoc'?>" title="<?php echo $val['ten']?>"><?php echo $val['ten']?></a>
                                		</h1>
                                		<div class="entry-head">
                                			<span class="date ie6fix"><?php echo strtotime_format($val['ngaytao'])?></span>
                                			<span class="comments ie6fix"><a href="#comments"><?php echo count_comment($val['id'], 'idcaythuoc')?> comments</a></span>
                                		</div>
                                		
                                		<div class="entry-text">
                                			<p><?php echo the_excerpt($val['mota'], 380)?>...</p>
                                		</div>
                                		
                                		<div class="entry-bottom">
                                            <a href="<?php echo SITE_URL.'product.php?id='.$val['id'].'&control=idcaythuoc'?>" class="more-link">Read more</a>
                                		</div>
                                	</div>
                                    <!--end entry_content-->
                                </div>
                        <?php
                                endforeach;
                            endif;
                        ?>
                        <!-- end entry -->
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="pagination pagination-right">
                                <?php echo $data_pagination->pagination; ?>
                                </div>
                            </div>
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
    <?php include_once( INCLUDE_URL . 'register.php');?>
    <!-- Login Box END -->
    <!-- FOOTER -->
    <?php include_once( INCLUDE_URL . 'front-end-footer.php');?>