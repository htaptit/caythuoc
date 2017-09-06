<?php
    include_once('../config.php');
    $title = 'Danh Sách Thành Viên';   
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
    if( !is_logged_in() || !is_admin() ) :
        redirect_to();  
    endif;
?>
<?php
    if( isset($_POST, $_POST['nguoidung']) && !empty($_POST['nguoidung']) && !empty($_POST['namerecord']) ){
        if( mysqli_delete('nguoidung', 'id', $_POST['nguoidung']) == true ){
            $log_content = 'Xóa Bản Ghi Thông Tin Thành Viên : "'.$_POST['namerecord'].'"';
            $args = array(
                'id' => $_SESSION['userId'],
                'content' => $log_content
            );
            if(add_log($args)) :
                $message = '<div class="alert alert-success">
                            <a class="close" data-dismiss="alert" href="#">×</a>';
                $message .= 'Xóa bản ghi thành công!';
                $message .= '</div>';
            endif;
        } else{
            $message = '<div class="alert alert-success">
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
                    <span>Danh Sách Thành Viên</span>
                    <?php echo isset($message) && !empty($message) ? $message : ''; ?>
                </div>
                <form action="" method="POST">
                    <div class="widget-content">
                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><input class="check-all" type="checkbox" onclick="checkAll(this)"></th>
                                    <th>Tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đăng ký</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $table = 'nguoidung';
                                        $data_pagination = pagination('nguoidung', 5, 'admincp/users.php');
                                    $data = $data_pagination->data;
                                        if( !empty($data) ){
                                            $html = '';
                                            foreach($data as $key => $user){
                                                $html .= '<tr>';
                                                $html .= '<td><input class="chkbox" type="checkbox" name="'.$table.'[]" value="'.$user['id'].'"></td>';
                                                $html .= '<td>'.$user['taikhoan'].'</td>';
                                                $html .= '<td>'.$user['hoten'].'</td>';
                                                $html .= '<td>'.$user['email'].'</td>';
                                                $html .= '<td>'.($user['trangthai'] == null ? 'Actived' : 'Not active' ).'</td>';
                                                $html .= '<td>'.$user['ngaydangki'].'</td>';
                                                $html .= '<td>';
                                                $html .= '<a href="'.SITE_URL.'admincp/edit-user.php?id='.$user['id'].'" class="edit"><img src="'.ADMIN_IMG_URL.'icons/pencil.png" alt="Edit"></a>';
                                                $html .= '<a href="#'.$table.'-'.$user['id'].'" class="delete"><img src="'.ADMIN_IMG_URL.'icons/trash_can.png" alt="Delete"></a><input type="hidden" name="namerecord['.$user['id'].']" value="Xóa Bản Ghi Thành Viên :'.$user['hoten'].'" />';
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
</div>
<?php include_once( INCLUDE_URL . 'footer.php');?>