<?php
    if( isset($id) ){
        $data = mysqli_get_record('nguoidung', 'id', $id);
    }
?>
<!-- Body start -->
<div class="span10">
    <form action=""  method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>" >
        <section id="formElement" class="widget form-box section">
            <div class="widget-title">
                <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                <span>Thông tin người dùng</span>
            </div>
            <div class="row-fluid">
                <?php 
                    echo isset($message) ? $message : '';
                    if( !empty($errors) ){
                        report_errors($errors);
                    }
                ?>
                <div class="widget-content form">
                    <div class="span6 form-freeSpace">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="input01">Tài khoản</label>
                                <div class="controls">
                                    <input id="input01" class="span10" type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : isset($data['taikhoan']) ? $data['taikhoan']: ''; ?>" <?=(!is_admin() || !is_activated()) ? 'readonly' : '' ?>/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">Mật khẩu</label>
                                <div class="controls">
                                    <input id="input01" class="span10" type="password" name="password" value="<?php //echo isset($data['matkhau']) ? $data['matkhau']: ''; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">Họ tên</label>
                                <div class="controls">
                                    <input id="input01" class="span10" type="text" name="name" value="<?php echo isset($_POST['hoten']) ? $_POST['hoten'] :  isset($data['hoten']) ? $data['hoten']: ''; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">Email</label>
                                <div class="controls">
                                    <input id="input01" class="span10" type="text" name="email" value="<?php echo  isset($_POST['email']) ? $_POST['email'] :  isset($data['email']) ? $data['email']: ''; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">Nơi ở</label>
                                <div class="controls">
                                    <input id="input01" class="span10" type="text" name="address" value="<?php echo isset($_POST['noio']) ? $_POST['noio'] : isset($data['noio']) ? $data['noio']: ''; ?>">
                                </div>
                            </div>
                            <?php if(is_admin()):?>
                                <div class="control-group">
                                    <label class="control-label" for="textarea">Ghi chú</label>
                                    <div class="controls">
                                        <textarea name="note" id="textarea" class="span10" class="span8" rows="3"><?php echo isset($_POST['ghichu']) ? $_POST['ghichu'] : isset($data['ghichu']) ? $data['ghichu']: ''; ?></textarea>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </fieldset>
                    </div>
                    <div class="span6 form-freeSpace">
                        <fieldset>
                        <?php if( !is_admin() ): ?>
                            <?php if(!is_activated()) :?>
                                <div class="alert alert-error users">
                                    <a class="close" data-dismiss="alert" href="#">×</a>
                                    Tài khoản của bạn chưa được kích hoạt !
                                </div>
                            <?php else :?>
                                <div class="alert alert-success users">
                                    <a class="close" data-dismiss="alert" href="#">×</a>
                                    Tài khoản của bạn đã được kích hoạt !
                                </div>                                                        
                            <?php endif;?>
                        <?php else: ?>
                            <?php if($data['maquyen'] != 4) :?>
                                <div class="control-group">
                                    <label class="control-label" for="input01">Trạng thái</label>
                                    <div class="controls users">
                                    <?php if( isset($data['trangthai']) == null || isset($_POST['status']) == '1' ) :?>
                                        <span><input class="active-button" type="radio" name="status" value="1" checked="checked" > Kích Hoạt</span>
                                        <span><input class="active-button" type="radio" name="status" value="2" > Bỏ Kích Hoạt</span>
                                    <?php else: ?>
                                        <span><input class="active-button" type="radio" name="status" value="1" > Kích Hoạt</span>
                                        <span><input class="active-button" type="radio" name="status" value="2" checked="checked" > Bỏ Kích Hoạt</span>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endif; ?>
                            <div class="control-group">
                                <label class="control-label" for="input01">Ngày đăng ký</label>
                                <div class="controls">
                                    <input id="input01" class="span10" type="text" name="created_date" value="<?php echo isset($_POST['ngaydangki']) ? $_POST['ngaydangki'] : isset($data['ngaydangki']) ? $data['ngaydangki']: ''; ?>" readonly>
                                </div>
                            </div>
                            <?php if( !is_activated() || !is_admin() ): ?>
                            <?php else: ?>
                            <div class="control-group">
                                <label class="control-label" for="select01">Mã quyền</label>
                                <div class="controls">
                                    <select id="select01" class="span6" name="userlevel">
                                        <?php
                                            $sql = 'SELECT * FROM `quyen`';
                                            $result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
                                            if( mysqli_num_rows($result) != 0 ){
                                                while ( $userlevel = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
                                                    if( $data['maquyen'] == $userlevel['idquyen'] ){
                                                        echo '<option value="'.(isset($_POST['userlevel']) ? $_POST['userlevel'] : $userlevel['idquyen']).'" selected="selected">'.$userlevel['tenquyen'].'</option>';
                                                    } else{
                                                        echo '<option value="'.$userlevel['idquyen'].'" >'.$userlevel['tenquyen'].'</option>';
                                                    }
                                                    
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="control-group register">
                                <div class="controls-normal box-img">
                                    <?php if( isset($data['avatar']) && $data['avatar'] != ''): ?>
                                        <img width="100%" height="auto" class="picture" src="<?=UPLOAD_DIR.$data['avatar']; ?>" alt="avatar" />
                                    <?php else: ?>
                                    <img width="100%" height="auto" class="picture" src="<?=ADMIN_IMG_URL.'no-logo.png'?>" alt="avatar" />
                                    <?php endif; ?>
                                </div>
                                <div class="upload">
                                    <p class="p-normal">Chọn Hình Ảnh ( Định Dạng Cho Phép PNG, JPG Và Gif )<p> 
                                    <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
                                    <input type="file" name="image" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="btn-submit clear">
                <input type="submit" id="growl-above" class="btn btn-success span5" value="Submit" />
            </div>
        </section>
    </form>
</div>