<?php
    include_once('../config.php');
    $title = 'Trang Quản Trị'; 
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
    if( !is_editor() ){
        redirect_to();
    }
?>
<?php
    if( isset($_POST, $_POST['baiviet']) && !empty($_POST['baiviet']) && !empty($_POST['namerecord']) ){
        if( mysqli_delete('baiviet', 'id', $_POST['baiviet']) == true ){
            $check = false;
            if(is_array($_POST['baiviet'])) :
                foreach($_POST['baiviet'] as $key => $val) :
                    $args = array(
                        'id' => $_SESSION['userId'],
                        'content' => ''.$_POST['namerecord'][$val].''
                    );
                    add_log($args);
                    $check = true;
                endforeach;
            endif;
            if($check == true) :
                $message = '<div class="alert alert-success">
                            <a class="close" data-dismiss="alert" href="#">×</a>';
                $message .= 'Xóa bản ghi thành công!';
                $message .= '</div>';
            endif;
        } else{
            $message = '<div class="alert alert-error">
                        <a class="close" data-dismiss="alert" href="#">×</a>';
            $message = 'Xóa bản ghi không thành công!';
            $message .= '</div>';
        }
    }
?>
<!-- Body start -->
<div class="span10 body-container">
    <div class="row-fluid">
        <div class="span12">
            <section class="widget">
                <div class="widget-title">
                    <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                    <span>Danh Sách Bài Biết</span>
                    <?php echo isset($message) && !empty($message) ? '<span>:'.$message.'</span>' : ''; ?>
                </div>
                <form action="" method="POST">
                    <div class="widget-content">
                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><input class="check-all" type="checkbox" onclick="checkAll(this)"></th>
                                    <th>Tên</th>
                                    <th>Tóm Tắt</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Sửa</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $table = 'baiviet';
                                    $data_pagination = pagination('baiviet', 5, 'admincp/index.php', true);
                                    $data = $data_pagination->data;
                                        if( !empty($data) ){
                                            $html = '';
                                            foreach($data as $key => $news){
                                                $html .= '<tr>';
                                                $html .= '<td><input class="chkbox" type="checkbox" name="'.$table.'[]" value="'.$news['id'].'"></td>';
                                                $html .= '<td>'.the_excerpt($news['ten'], 40).'...</td>';
                                                $html .= '<td>'.the_excerpt($news['tomtat'], 50).'...</td>';
                                                $html .= '<td>'.$news['ngaytao'].'</td>';
                                                $html .= '<td>'.$news['ngaysua'].'</td>';
                                                $html .= '<td>';
                                                $html .= '<a href="'.SITE_URL.'admincp/edit-post-news.php?id='.$news['id'].'" class="edit"><img src="'.ADMIN_IMG_URL.'icons/pencil.png" alt="Edit"></a>';
                                                $html .= '<a href="#'.$table.'-'.$news['id'].'" class="delete"><img src="'.ADMIN_IMG_URL.'icons/trash_can.png" alt="Delete"></a><input type="hidden" name="namerecord['.$news['id'].']" value="Xóa Bản Ghi Thông Tin Bài Viết :'.$news['ten'].'" />';
                                                $html .= '</td>';
                                                $html .= '</tr>';
                                            }
                                            echo $html;
                                        }
                                    ?>
                                </tbody>
                        </table>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="table-action">
                                    <div class="btn-group">
                                        <button type="submit" class="btn span12"><i class="icon-cog"></i>Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="pagination pagination-right">
                                <?php echo $data_pagination->pagination; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <section class="widget">
                <div class="widget-title">
                    <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                    <span>Hoạt Động Gần Đây Nhất Của Các Thành Viên</span>
                </div>
                <div class="widget-content">
                    <div class="activity-feeds">
                        <ul>
                            <?php foreach(mysqli_getAll('log', 10) as $key => $val) :?>
                            <li>
                                <div class="text">
                                    <p><span class="label label-info"><?=mysqli_get_record('nguoidung', 'id', $val['idnguoidung'])['hoten']?></span><?=$val['noidung']?></p>
                                </div>
                                <div class="info">
                                    <span>Quyền :</span> <a class="tooltipA" href="#" data-original-title="Log" rel="tooltip"><?=mysqli_get_record('quyen', 'idquyen', mysqli_get_record('nguoidung', 'id', $val['idnguoidung'])['maquyen'])['tenquyen']?></a>
                                    <span>Thời Gian:</span>
                                    <span class="date"><?=$val['ngaythaydoi']?></span>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="span6">
            <section class="widget">
                <div class="widget-title">
                    <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                    <span>Bình Luận Gần Đây</span>
                </div>
                <div class="widget-content">
                    <div class="activity-feeds">
                        <ul>
                            <?php foreach(mysqli_getAll('binhluan', 10) as $key => $val) :?>
                            <li>
                                <div class="text">
                                    <p><span class="label label-info"><?=mysqli_get_record('nguoidung', 'id', $val['idnguoidung'])['hoten']?></span><?=$val['noidung']?></p>
                                </div>
                                <div class="info">
                                    <span>Quyền :</span> <a class="tooltipA" href="#" data-original-title="Log" rel="tooltip"><?=mysqli_get_record('quyen', 'idquyen', mysqli_get_record('nguoidung', 'id', $val['idnguoidung'])['maquyen'])['tenquyen']?></a>
                                    <span>Thời Gian:</span>
                                    <span class="date"><?=get_time_ago(strtotime($val['ngay']))?></span>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        $('.activity-feeds').vTicker({
            speed: 500,
            pause: 3000,
            animation: 'fade',
            height: 335,
            mousePause: true,
            showItems: 4
        });
    </script>
</div>
<?php include_once( INCLUDE_URL . 'footer.php');?>