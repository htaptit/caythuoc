<?php
	require_once '../config.php';
	if( !isset($_POST['source']) && !isset($_POST['namerecord']) ) return;
	$id = end(explode( '-', $_POST['source']));

	if( isset($_POST['status']) && $_POST['status'] == 'delete' ){
        $args = array(
            'id' => $_SESSION['userId'],
            'content' => ''.$_POST['namerecord'].''
        );	   	   
		if( mysqli_delete( array_shift(explode( '-', $_POST['source'])), 'id', $id ) == true && add_log($args) == true ){
			echo 'deleteOK'; die();
		}
	}
	
?>