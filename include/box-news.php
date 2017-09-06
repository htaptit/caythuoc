<?php $getNews = mysqli_getAll('baiviet', 1, 0, true);?>
<div class="box-news">
    <h3 class="title">
        <a href="#">Bài viết mới nhất</a>
        <i></i> 
    </h3>    
    <div class="big_box"> 
        <a href="<?=SITE_URL.'news.php?id='.$getNews[0]['id'].'&control=idbaiviet'?>">
            <div style="width: 140px;height: 100px;overflow: hidden;" class="img-thumb-single"> 
                <img src="<?php echo (isset($getNews) && $getNews[0]['anh'] != '')? UPLOAD_DIR.$getNews[0]['anh'] : ADMIN_IMG_URL.'no-logo.png';?>" />
            </div>
        </a>
        <div class="ttl-topic">
            <a href="<?=SITE_URL.'news.php?id='.$getNews[0]['id'].'&control=idbaiviet'?>" ><?=$getNews[0]['ten']?></a>
        </div>
        <div class="date"><?=$getNews[0]['ngaytao']?></div>
        <p><?=the_excerpt($getNews[0]['tomtat'], 500)?><strong> . . .</strong></p>
    </div>
    <div class="other_list">
        <ol class="">
        <?php 
            $getListNews = mysqli_getAll('baiviet', 6, 0, true);
            foreach( $getListNews as $key => $val ) :
        ?>
            <li><a href="<?=SITE_URL.'news.php?id='.$val['id'].'&control=idbaiviet'?>"><?=$val['ten']?></a></li>
        <?php endforeach;?>
            <!-- End -->
        </ol>
        <a href="<?=SITE_URL.'articles.php'?>" class="view-more"> Xem thêm </a> 
    </div>
</div>