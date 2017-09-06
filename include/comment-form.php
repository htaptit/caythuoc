<div class="row-fluid">
    <div class="span12">
        <?php if(!isset($_SESSION['userId'])):?>
        <div class="comments">
            <span>Vui lòng <a href="#loginBox" class="login-window">Đăng Nhập</a> để có thể bình luận cho bài viết này.</span>
        </div>
        <?php else :
            $dataInfo = array(
                'userId' => $_SESSION['userId'],
                'pageId' => validate_int($_GET['id']),
                'control' => trim(strip_tags($_GET['control']))
            );
        ?>
        <comments data-info='<?=json_encode($dataInfo);?>'>
            <div class="comments box">
                <h3 class="title">
                    <a href="#">Bình Luận</a>
                </h3>
                <?php
                    $comment_data = get_comments($dataInfo['control'], $dataInfo['pageId'], true);                             
                    if(sizeof($comment_data) > 0) :
                        foreach($comment_data as $key => $comment) :
                ?>
                    <div class="chat">
                        <img src="<?php echo (isset($comment) && $comment['avatar'] != '')? UPLOAD_DIR.$comment['avatar'] : ADMIN_IMG_URL.'no-logo.png';?>" class="rounded" title="<?=$comment['hoten']?>" />
                        <div class="triangle"></div>
                        <div class="text">
                            <p class="msg">
                                <?=$comment['noidung']?>
                                <span class="date"><?=get_time_ago(strtotime($comment['ngay']))?></span>
                            </p>
                        </div>
                    </div>
                <?php 
                    endforeach;
                    else :
                ?>
                    <div class="chat">
                        <img src="<?=IMAGES_URL.'user.png'?>" class="rounded" title="Lê Vũ Trường An" />
                        <div class="triangle"></div>
                        <div class="text">
                            <p class="msg">Chào Mừng bạn đến với Hệ Thống Tra Cứu Cây Thuốc Việt Nam
                                <span class="date">Giáng Sinh</span>
                            </p>
                        </div>
                    </div>                                            
                <?php endif;?>
                
                <div class="chat-textarea">
                    <textarea id="textarea" class="ckeditor span8" name="comments" rows="3"></textarea>
                    <button class="btn">gửi</button>
                </div>
            </div>
        </comments>
        <?php endif;?>

    </div>
</div>