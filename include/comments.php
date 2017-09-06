<?php
	require_once '../config.php';
	if( !isset($_POST['userId']) && !isset($_POST['pageId']) && !isset($_POST['control']) && !isset($_POST['content']) ) return;

	if( isset($_POST['status']) && $_POST['status'] == 'comment' ){
        $args = array(
            'field' => ''.strip_tags(trim($_POST['table'])).'',
            'userId' => validate_int($_POST['user']),
            'content' => ''.trim(strip_tags($_POST['content'])).'',
            'pageId' => validate_int($_POST['page']),
            'avatar' => ''.(isset($_SESSION['avatar']) ? UPLOAD_DIR . $_SESSION['avatar'] : IMAGES_URL . 'user.png').'',
            'hoten' => ''.$_SESSION['username'].'',
            'ngay' => ''.date('m/d/Y h:i a', time()).''
        );	   	   
		if( add_comment($args) == true ){
			echo json_encode(array(
                    'field' => ''.strip_tags(trim($_POST['table'])).'',
                    'userId' => validate_int($_POST['user']),
                    'content' => ''.trim(strip_tags($_POST['content'])).'',
                    'pageId' => validate_int($_POST['page']),
                    'avatar' => ''.(isset($_SESSION['avatar']) ? UPLOAD_DIR . $_SESSION['avatar'] : IMAGES_URL . 'user.png').'',
                    'hoten' => ''.$_SESSION['username'].'',
                    'ngay' => ''.date('m/d/Y h:i a', time()).''
                )
            ); 
            die();
		}
	}
	
?>