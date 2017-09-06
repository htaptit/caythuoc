<?php
    include_once('../config.php');
    $title = 'Quản Lý LOg'; 
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
?>
<?php
    if( isset($_POST, $_POST['log']) && !empty($_POST['log']) ){
        if( mysqli_delete('log', 'id', $_POST['log']) == true ){
            $message = '<div class="alert alert-success">
                        <a class="close" data-dismiss="alert" href="#">×</a>';
            $message .= 'Xóa bản ghi thành công!';
            $message .= '</div>';
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
                    <span>Danh Sách Log</span>
                    <?php echo isset($message) && !empty($message) ? $message : ''; ?>
                </div>
                <form action="" method="POST">
                    <div class="widget-content">
                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><input class="check-all" type="checkbox" onclick="checkAll(this)"></th>
                                    <th>Thành Viên</th>
                                    <th>Thời Gian</th>
                                    <th>Nội Dung</th>
                                    <?php if(is_admin()):?>
                                    <th>Action</th>
                                    <?php endif;?>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $table = 'log';
                                        $data_pagination = pagination('log', 15, 'admincp/log.php');
                                        $data = $data_pagination->data;
                                        if( !empty($data) ){
                                            $html = '';
                                            foreach($data as $key => $val){
                                                $html .= '<tr>';
                                                $html .= '<td><input class="chkbox" type="checkbox" name="'.$table.'[]" value="'.$val['id'].'"></td>';
                                                $html .= '<td>'.mysqli_get_record('nguoidung', 'id', $val['idnguoidung'])['hoten'].'</td>';
                                                $html .= '<td>'.$val['ngaythaydoi'].'</td>';
                                                $html .= '<td>'.$val['noidung'].'</td>';
                                                if(is_admin()) :
                                                $html .= '<td>';
                                                $html .= '<a href="#'.$table.'-'.$val['id'].'" class="delete"><img src="'.ADMIN_IMG_URL.'icons/trash_can.png" alt="Delete"></a>';
                                                $html .= '</td>';
                                                endif;
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