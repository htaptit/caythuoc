<?php if(!isset($_SESSION)) {session_start();}?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Line" />
    <meta charset="utf-8" />
	<title><?=(isset($title) ? 'Cloud | ' . $title : 'Cloud')?></title>
    <link href="<?=CSS_URL.'style.css'?>" rel="stylesheet">
    <link href="<?=LIB_URL.'bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=LIB_URL.'bootstrap/css/bootstrap-responsive.css'?>" rel="stylesheet">
    <link href="<?=LIB_URL.'font-awesome/css/font-awesome.min.css'?>" rel="stylesheet">
    <script type="text/javascript" src="<?=LIB_URL.'js/jquery.min.js'?>"></script>
    <script type="text/javascript" src="<?=JS_URL.'jquery.easing.min.js'?>"></script>
    <script type="text/javascript" src="<?=JS_URL.'jquery.zaccordion.js'?>"></script>
    <script type="text/javascript" src="<?=JS_URL.'customs.js'?>"></script>
    <script type="text/javascript" src="<?=LIB_URL.'ckeditor/ckeditor.js'?>" ></script>
    <script type="text/javascript" src="<?=ADMIN_JS_URL.'jquery.vticker-min.js'?>"></script> 
    <script>
          var ajaxurl = '<?php echo SITE_URL; ?>';  
          jQuery(document).ready(function() {
            	jQuery("#slider").zAccordion({
            		tabWidth: "15%",
            		speed: 600,
            		slideClass: 'slider',
            		animationStart: function () {
            			jQuery('#slider').find('li.slider-open div').css('display', 'none');
            			jQuery('#slider').find('li.slider-previous div').css('display', 'none');
            		},
            		animationComplete: function () {
            			jQuery('#slider').find('li div').fadeIn(600);
            		},
            		height: 400,
                    startingSlide: 1,
                    easing: 'easeOutQuart',
                    imageShadowStrength:0.5,	
                	auto: true,
                	width: "100%",
                	trigger: "mouseover"
            	});
            });
	</script>
</head>

<body id="front-end">
<div class="container-fluid">
    <!-- Header starts -->
    <div class="row-fluid" id="topbar">
        <div class="span12">
            <div class="header-top wrapper">
                <div id="top-menu" class="span6">
                    <a href="<?=SITE_URL.'index.php'?>" class="logo"><img alt="Dura Cloud" src="<?=ADMIN_IMG_URL.'logo.png'?>"></a>
                </div>
                <div id="top-right" class="span6">
                    <?php 
                        if(isset($_SESSION['userId'])) :
                            include_once( INCLUDE_URL . 'userInfo.php');
                        else :
                    ?>
                        <div id="info-menu">
                            <ul class="menu">
                                <li class="icon-2515"><a href="#registerBox" class="reg-window">Đăng Kí</a></li>
                                <li class="icon-2516"><a href="#loginBox" class="login-window">Đăng Nhập</a></li>
                                <li class="icon-2517"><a href="#">Site Map</a></li>
                                <li class="icon-2518"><a href="#">Hỗ Trợ</a></li>
                            </ul>
                        </div>
                    <?php endif;?>
                    <div class="search-bar">
                        <form method="GET" action="<?php echo SITE_URL.'search.php' ?>">
                            <div class="box-search">
                                <input name="search-text" value="" placeholder="<?=(isset($_GET['search-text']) && $_GET['search-text'] != '' ? $_GET['search-text'] : 'Nhập từ khoá tìm kiếm')?>" type="search" class="search-txt" />
                                <input id="input_search" type="hidden" value="100" name="relationship" />
                                <span class="options"></span>
                                <div class="selectOptions">
                                    <span class="selectOption" value="1">Tên Khoa Học</span>
                                    <span class="selectOption" value="2">Tên Khác</span>
                                    <?php if( isset($_SESSION['userLevel']) && $_SESSION['userLevel'] >= 2 && is_activated() ) :?>
                                    <span class="selectOption" value="3">Tác dụng</span>
                                    <span class="selectOption" value="4">Bệnh</span>
                                    <?php endif;?>
                                </div>
                                <input type="submit" name="search" class="search-btn" value="Tìm Kiếm" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header ends -->