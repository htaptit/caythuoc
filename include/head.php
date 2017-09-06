<?php if(!isset($_SESSION)) {session_start();}?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lINE" />
    <meta charset="utf8" />
	<title><?=(isset($title) ? 'Hệ Thống Tra Cứu Cây Thuốc | ' . $title : 'Hệ Thống Tra Cứu Cây Thuốc')?></title>
    <link href="<?=LIB_URL.'bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=LIB_URL.'bootstrap/css/bootstrap-responsive.css'?>" rel="stylesheet">
    <link href="<?=ADMIN_CSS_URL.'admin.css'?>" rel="stylesheet">
    <script type="text/javascript" src="<?=LIB_URL.'js/jquery.min.js'?>"></script>
    <script type="text/javascript" src="<?=ADMIN_JS_URL.'admin.js'?>"></script>
    <script type="text/javascript" src="<?=ADMIN_JS_URL.'jquery.vticker-min.js'?>"></script>
    <script type="text/javascript" src="<?=LIB_URL.'ckeditor/ckeditor.js'?>" ></script>
    <script language="javascript">
        var ajaxurl = '<?php echo SITE_URL; ?>';

        function checkAll(obj)
        {
            // Giá trị checkbox hiện tại
            var checked = obj.checked;

            // Danh sách checkbox cần check
            // var list_checkbox = document.getElementsByName('checkbox');
            var list_checkbox = jQuery('.widget-content table input[type="checkbox"]');
            // Lặp qua từng checbox
            for (var i = 0; i < list_checkbox.length; i++)
            {
                // Nếu check = true thì thiết lập checked
                if (checked)
                {
                    list_checkbox[i].setAttribute('checked', 'true');
                }
                else // ngược lại bỏ thuộc tính checked
                {
                    list_checkbox[i].removeAttribute('checked');
                }
            }
        }
    </script>
</head>

<body>
<div class="container-fluid">
    <!-- Header starts -->
    <div class="row-fluid">
        <div class="span12">
            <div class="header-top">
                <div class="header-wrapper">
                    <a href="<?=SITE_URL.'index.php'?>" class="utopia-logo"><img src="<?=ADMIN_IMG_URL.'logo.png'?>" /></a>
                    <div class="header-right">
                        <?php 
                            if(isset($_SESSION['userId'])) :
                                include_once( INCLUDE_URL . 'userInfo.php');
                            endif;
                        ?>
                    </div>
                    <!-- End header right -->
                </div>
            </div>
            <!-- End header -->
        </div>
    </div>
    <!-- Header ends -->