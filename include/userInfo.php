<?php if(is_dashboard()) :?>
<div class="user-panel header-divider">
<?php else :?>
<div class="user-panel header-divider u-front-end">
<?php endif;?>
    <div class="user-info">
        <span>
            <img src="<?=(isset($_SESSION['avatar']) && $_SESSION['avatar'] != '' ? UPLOAD_DIR . $_SESSION['avatar'] : IMAGES_URL . 'user.png')?>" alt="">
        </span>
        <a><?=(isset($_SESSION['username']) ? $_SESSION['username'] : 'user')?></a>
    </div>
    <div class="user-dropbox" style="display: none;">
        <ul>
            <li class="user"><a href="<?=SITE_URL . 'user-edit-profile.php?id='.$_SESSION['userId']?>">Thông Tin Tài Khoản</a></li>
            <?php if(!is_dashboard() && is_editor()) :?>
                <li class="settings"><a href="<?=ADMIN_URL . 'index.php'?>">Vào Trang Quản Trị</a></li>
            <?php endif;?>
            <?php if(is_dashboard() && is_editor()) :?>
                <li class="settings"><a href="<?=SITE_URL . 'index.php'?>">Ra Trang Chủ</a></li>
            <?php endif;?>
            <li class="logout"><a href="<?=SITE_URL . 'include/logout.php'?>">Thoát</a></li>
        </ul>
    </div>
</div>