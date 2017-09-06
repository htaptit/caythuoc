<div class="box-comment">
    <div class="box-activity">
        <div class="title"><h3><a>Bình Luận</a></h3></div>
        <div class="comments-feeds promotion-box">
             <ul>
                <?php foreach(get_comments(0, 0, true) as $key => $val) :?>
                        <li>
                            <div class="avatar"><img title="<?=$val['hoten']?>" src="<?=(isset($val['avatar']) && $val['avatar'] != '' ? UPLOAD_DIR . $val['avatar'] : IMAGES_URL . 'user.png')?>"></div>
                            <div class="info-ac">
                                <p><?=$val['noidung']?></p>
                            </div>
                            <span class="date"><?=get_time_ago(strtotime($val['ngay']))?></span>
                        </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<script>
    jQuery('.comments-feeds').vTicker({
        speed: 500,
        pause: 3000,
        animation: 'fade',
        height: 360,
        mousePause: true,
        showItems: 4
    });
</script>
