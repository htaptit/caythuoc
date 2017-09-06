<?php
    include_once('../config.php');
    $title = "Danh Sách Bệnh"; 
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
    if( !is_logged_in() || !is_editor() ) :
        redirect_to();  
    endif;
?>
<?php
    if( isset($_POST, $_POST['benh']) && !empty($_POST['benh']) && !empty($_POST['namerecord']) ){
        if( mysqli_delete('benh', 'id', $_POST['benh']) == true ){
            $check = false;
            if(is_array($_POST['benh'])) :
                foreach($_POST['benh'] as $key => $val) :
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
        } else {
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
                    <span>Danh Sách Bệnh</span>
                    <?php echo isset($message) && !empty($message) ? $message : ''; ?>
                </div>
                <form action="" method="POST">
                    <div class="widget-content">
                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><input class="check-all" type="checkbox" onclick="checkAll(this)"></th>
                                    <th>Mã</th>
                                    <th>Tác Dụng</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $table = 'benh';
                                        $data_pagination = pagination('benh', 10, 'admincp/benh.php');
                                        $data = $data_pagination->data;
                                        if( !empty($data) ){
                                            $html = '';
                                            foreach($data as $key => $val){
                                                $html .= '<tr>';
                                                $html .= '<td><input class="chkbox" type="checkbox" name="'.$table.'[]" value="'.$val['id'].'"></td>';
                                                $html .= '<td>'.(($val['id'] <= 9) ? '0' . $val['id'] : $val['id']).'</td>';
                                                $html .= '<td>'.$val['ten'].'</td>';
                                                $html .= '<td>';
                                                $html .= '<a href="'.SITE_URL.'admincp/edit-benh.php?id='.$val['id'].'" class="edit"><img src="'.ADMIN_IMG_URL.'icons/pencil.png" alt="Edit"></a>';
                                                $html .= '<a href="#'.$table.'-'.$val['id'].'" class="delete"><img src="'.ADMIN_IMG_URL.'icons/trash_can.png" alt="Delete"></a><input type="hidden" name="namerecord['.$val['id'].']" value="Xóa Bản Ghi Thông Tin Bệnh :'.$val['ten'].'" />';
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