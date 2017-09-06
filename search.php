<?php
    include_once('config.php');
    $title = 'Tìm Kiếm';  
    include_once( INCLUDE_URL . 'front-end-head.php');
    include_once( INCLUDE_URL . 'featured.php');
if( $_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search']) ){

	if( isset( $_GET['search-text'] ) && validate_string($_GET['search-text']) ){
		$keysearch = validate_string(trim($_GET['search-text']));
	} else{
		$message = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Nội dung search không đúng.
                            </div>';
	}
	if( isset($_GET['relationship']) && validate_int($_GET['relationship']) ){
		$relationship = trim($_GET['relationship']);
		switch ($relationship) {
			case '0':
				$relationship = 'ten';
				break;
			
			case '1':
				$relationship = 'tenkhoahoc';
				break;
			
			case '2':
				$relationship = 'tenkhac';
				break;

			case '3':
                if( isset($_SESSION['userLevel']) && $_SESSION['userLevel'] >= 2 && is_activated() ) :
				    $relationship = 'idtacdung';
                else :
                    $relationship = 'ten';
                endif;
				break;

			case '4':
                if( isset($_SESSION['userLevel']) && $_SESSION['userLevel'] >= 2 && is_activated() ) :
				    $relationship = 'idbenh';
                else :
                    $relationship = 'ten';
                endif;
				break;

			default:
				$relationship = 'ten';
				break;
		}
	} else{
		$message = '<div class="alert alert-error">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                Nội dung search không đúng.
                            </div>';
	}

	if( !isset($message) ){
		switch ($relationship) {
			case 'ten':
				$sql = 'SELECT *, caythuoc.ten as tencaythuoc, caythuoc.id as idcaythuoc  FROM `caythuoc` WHERE `ten` LIKE "'.'%'.$keysearch.'%'.'" ORDER BY id ASC';
				break;

			case 'tenkhoahoc':
				$sql = 'SELECT *, caythuoc.ten as tencaythuoc, caythuoc.id as idcaythuoc  FROM `caythuoc` WHERE `tenkhoahoc` LIKE "'.'%'.$keysearch.'%'.'" ORDER id date ASC';
				break;
			case 'tenkhac':
				$sql = 'SELECT *, caythuoc.ten as tencaythuoc, caythuoc.id as idcaythuoc  FROM `caythuoc` WHERE `tenkhac` LIKE "'.'%'.$keysearch.'%'.'" ORDER id date ASC LIMIT 30';
				break;
			case 'idtacdung':
				$sql = 'SELECT *, caythuoc.ten as tencaythuoc, caythuoc.id as idcaythuoc FROM `caythuoc` LEFT JOIN `tacdung` ON caythuoc.idtacdung = tacdung.id WHERE tacdung.tentacdung LIKE "'.'%'.$keysearch.'%'.'" ORDER BY caythuoc.id ASC';
				break;
			case 'idbenh':
				$sql = 'SELECT *, caythuoc.ten as tencaythuoc, caythuoc.id as idcaythuoc FROM `caythuoc` LEFT JOIN `benh` ON caythuoc.idbenh = benh.id WHERE benh.ten LIKE "'.'%'.$keysearch.'%'.'" ORDER BY caythuoc.id';
				break;
			default:
				$sql = 'SELECT *, caythuoc.ten as tencaythuoc, caythuoc.id as idcaythuoc  FROM `caythuoc` WHERE `ten` LIKE "'.'%'.$keysearch.'%'.'"';
				break;
		}
		$data = paging_search($sql, 20);
        if(sizeof($data->data) != 0) {
?>
    <!-- Main Start -->
    <div class="row-fluid">
        <div class="span12">
            <div class="main wrapper">
                <div class="row-fluid">
                    <!-- Content Start -->
                    <?php
                    	if( isset($message) ){
                    		echo $message;
                    	}
                    ?>
                    <div class="span8">
                        <!-- entry -->
                        <span class="result">
                            <h3 class="title">
                                <a href="#">Kết quả tìm kiếm</a>
                            </h3> 
                            <div>Đã tìm thấy <b><?=sizeof($data->data);?></b> kết quả phù hợp với từ khóa <b>"<?=(isset($_GET['search-text']) ? $_GET['search-text'] : '')?>"</b></div>
                         </span>
                        <?php
                            //var_dump($data->data); die();
                                foreach($data->data as $key => $val) :
                        ?>
                                <div class="entry ">
                                	<div class="entry-previewimage rounded"><a href="" title="<?=$val['tencaythuoc']?>">
                                    <img src="<?=(isset($val['anh']) && $val['anh'] != '' ? UPLOAD_DIR . $val['anh'] : IMAGES_URL . 'no-logo.png')?>" alt="<?=$val['ten']?>" alt="<?=$val['ten']?>" /></a></div>			
                                	<div class="entry-content">
                                		<h1 class="entry-heading">
                                			<a href="<?=SITE_URL.'product.php?id='.$val['idcaythuoc'].'&control=idcaythuoc'?>" title="<?=$val['tencaythuoc']?>"><?=$val['tencaythuoc']?></a>
                                		</h1>
                                		<div class="entry-head">
                                			<span class="date ie6fix"><?=strtotime_format($val['ngaytao'])?></span>
                                			<span class="comments ie6fix"><a href="#comments"><?=count_comment($val['id'])?> comments</a></span>
                                		</div>
                                		
                                		<div class="entry-text">
                                			<p><?=the_excerpt($val['mota'], 380)?>...</p>
                                		</div>
                                		
                                		<div class="entry-bottom">
                                            <a href="" class="more-link">Read more</a>
                                		</div>
                                	</div>
                                    <!--end entry_content-->
                                </div>
                        <?php
                                endforeach;

                        ?>
                        <!-- end entry -->
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="pagination pagination-right">
                                <?=paging_search($sql, 4)->html; ?>
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
<?php 
        } else {
?>
        <div class="row-fluid">
            <div class="span12">
                <div class="main wrapper">
                    <div class="row-fluid">
                        <div class="span8">
                            <span class="result">
                                <h3 class="title">
                                    <a href="#">Kết quả tìm kiếm</a>
                                </h3> 
                                <div>Không tìm thấy kết quả nào phù hợp với từ khóa <b>"<?=(isset($_GET['search-text']) ? $_GET['search-text'] : '')?>"</b></div>
                             </span>
                        </div>
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
<?php
        }
    }
}
?>
    <!-- End Main -->
    <!-- Login Box -->
    <?php include_once( INCLUDE_URL . 'loginForm.php');?>
    <!-- Login Box END -->
    <!-- FOOTER -->
    <?php include_once( INCLUDE_URL . 'front-end-footer.php');?>