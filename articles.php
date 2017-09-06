<?php
    include_once('config.php');
    $title = 'Trang Chủ';  
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
                            $table = 'baiviet';
                            $data_pagination = pagination('baiviet', 6, 'index.php', true);
                            $data = $data_pagination->data;
                            if( !empty($data) ) :
                                foreach($data as $key => $val) :
                        ?>
                                <div class="entry news-all">
                                	<div class="entry-previewimage rounded"><a href="" title="<?=$val['ten']?>">
                                    <img src="<?=(isset($val['anh']) && $val['anh'] != '' ? UPLOAD_DIR . $val['anh'] : IMAGES_URL . 'no-logo.png')?>" alt="<?=$val['ten']?>" alt="<?=$val['ten']?>" /></a></div>			
                                	<div class="entry-content">
                                		<h1 class="entry-heading">
                                			<a href="<?=SITE_URL.'news.php?id='.$val['id'].'&control=idbaiviet'?>" title="<?=$val['ten']?>"><?=the_excerpt($val['ten'], 65)?></a>
                                		</h1>
                                		<div class="entry-head">
                                			<span class="date ie6fix"><?=strtotime_format($val['ngaytao'])?></span>
                                			<span class="comments ie6fix"><a href="#comments"><?=count_comment($val['id'])?> comments</a></span>
                                		</div>
                                		
                                		<div class="entry-text">
                                			<p><?=the_excerpt($val['tomtat'], 320)?>...</p>
                                		</div>
                                		
                                		<div class="entry-bottom">
                                            <a href="<?=SITE_URL.'news.php?id='.$val['id'].'&control=idbaiviet'?>" class="more-link">Read more</a>
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
    <!-- Login Box END -->
    <!-- FOOTER -->
    <?php include_once( INCLUDE_URL . 'front-end-footer.php');?>