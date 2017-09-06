<?php
    ob_start();
    if(!isset($_SESSION)) {
        session_start();
    }
    // SET DEFINE
    if( strpos($_SERVER['SERVER_PROTOCOL'], 'https') == true ){
    	define( 'BASE_URL', 'https://'.$_SERVER['SERVER_NAME'].'/' );
    } else{
    	define( 'BASE_URL', 'http://'.$_SERVER['SERVER_NAME'].'/' );
    }
    define( 'SITE_URL', 'http://'.$_SERVER['SERVER_NAME'].'/' ); // Đường Dẫn Thư Mục Chứa Code
    define( 'ADMIN_URL', SITE_URL. 'admincp/' );
    define( 'ADMIN_IMG_URL', ADMIN_URL . 'img/');
    define( 'ADMIN_JS_URL', ADMIN_URL . 'js/' );
    define( 'ADMIN_CSS_URL', ADMIN_URL . 'css/' );
    define( 'INCLUDE_URL', dirname(__file__) . '/include/' );
    define( 'UPLOAD', dirname(__file__) . '/upload/' );
    define( 'UPLOAD_DIR', SITE_URL . 'upload/' );
    define( 'IMAGES_URL', SITE_URL. 'images/' );
    define( 'LIB_URL', SITE_URL. 'lib/' );
    define( 'CSS_URL', SITE_URL. 'css/' );
    define( 'JS_URL', SITE_URL. 'js/' );
    define( 'IMG_URL', SITE_URL. 'images/' );
    
    // config database connect
    define( 'hostname', '127.0.0.1' );
    define( 'database', 'thuocdb' ); // Tên Database
    define( 'username', 'root' ); // User
    define( 'password', 'root' );
    define( 'charset', 'utf8' );
    require_once 'include/functions.php';
?>