<?php
    include_once('../config.php');
    $title = "Danh Sách Cây Thuốc"; 
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
    if( !is_admin() || !is_editor() ){
        redirect_to();
    }
?>
<?php
    if( isset($_POST, $_POST['caythuoc']) && !empty($_POST['caythuoc']) && !empty($_POST['namerecord']) ){
        if( mysqli_delete('caythuoc', 'id', $_POST['caythuoc']) == true ){
            $check = false;
            if(is_array($_POST['caythuoc'])) :
                foreach($_POST['caythuoc'] as $key => $val) :
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
                    <span>Danh Sách Cây Thuốc</span>
                    <?php echo isset($message) && !empty($message) ? $message : ''; ?>
                </div>
                <form action="" method="POST">
                    <div class="widget-content">
                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><input class="check-all" type="checkbox" onclick="checkAll(this)"></th>
                                    <th>Tên</th>
                                    <th>Họ</th>
                                    <th>Công Dụng</th>
                                    <th>Ngày Tạo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $table = 'caythuoc';
                                        $data_pagination = pagination('caythuoc', 10, 'admincp/caythuoc.php', true);
                                        $data = $data_pagination->data;
                                        if( !empty($data) ){
                                            $html = '';
                                            foreach($data as $key => $val){
                                                $html .= '<tr>';
                                                $html .= '<td><input class="chkbox" type="checkbox" name="'.$table.'[]" value="'.$val['id'].'"></td>';
                                                $html .= '<td>'.$val['ten'].'</td>';
                                                $html .= '<td>'.$val['ho'].'</td>';
                                                $html .= '<td>'.the_excerpt($val['congdung'], 100).'...</td>';
                                                $html .= '<td>'.$val['ngaytao'].'</td>';
                                                $html .= '<td>';
                                                $html .= '<a href="'.SITE_URL.'admincp/edit-caythuoc.php?id='.$val['id'].'" class="edit"><img src="'.ADMIN_IMG_URL.'icons/pencil.png" alt="Edit"></a>';
                                                $html .= '<a href="#'.$table.'-'.$val['id'].'" class="delete"><img src="'.ADMIN_IMG_URL.'icons/trash_can.png" alt="Delete"></a><input type="hidden" name="namerecord['.$val['id'].']" value="Xóa Bản Ghi Thông Tin Cây Thuốc :'.$val['ten'].'" />';
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