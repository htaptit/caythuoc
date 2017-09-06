jQuery(document).ready(function() {
    //userinfo
    jQuery('.user-info').live('click', function(){
        if(!jQuery(this).hasClass('user-active')) {
            var $userInfo = jQuery(this);
            var $userDrop = jQuery('.user-dropbox');
    
            $userDrop.slideDown(250);
            $userInfo.addClass('user-active');
    
        } else {
            jQuery(this).removeClass('user-active');
            jQuery('.user-dropbox').slideUp(250);
        }
    });
    jQuery(".leftmenu ul li").hover(function(){
        jQuery(this).find('ul:first').css({visibility: "visible", display: "inline-block"}).show(400);
    },function(){
        jQuery(this).find('ul:first').css({visibility: "hidden", display:'none'});
    });
    if(jQuery('.sidebar').hasClass('lefticon')){
        jQuery('.leftmenu ul li ul').css({left:'38px'});
    }else{
        if(jQuery('.sidebar-toggle > .btn-navbar').is(':visible')){
            jQuery('.leftmenu ul li ul').css({left:'220px'});
        }else{
            var $mainW = jQuery('.sidebar > .leftmenu > ul > li').width();
            jQuery('.leftmenu ul li ul').css({left:parseInt($mainW)+32 + 'px'});
        }

    }

    jQuery('.widget-content .table td .delete').on('click', function(event){
        event.preventDefault();
        $id = jQuery(this).attr('href').replace('#', '');
        $namerecord = jQuery(this).next().val();        
        $tr = jQuery(this).parent().parent();
        jQuery.ajax({
            url: ajaxurl+'include/ajax.php',
            type: 'POST',
            data: { source: $id, namerecord: $namerecord, status: 'delete'},
            aysnc: false,
            success: function(res){
                if(res == 'deleteOK'){
                    $tr.slideUp('400').remove();
                    alert('Xóa thành công!');
                } else{
                    alert('Xóa không thành công!');
                }
            }
        });
        return false;
    });
    jQuery('button.login').live('click', function(){
        if(!jQuery(this).next().hasClass('active')) {
            var $loginForm = jQuery(this).next();
            var $Drop = jQuery('#loginBox');
    
            $Drop.slideDown(250);
            $loginForm.addClass('active');
    
        } else {
            console.log('has class');
            jQuery(this).next().removeClass('active');
            jQuery('#loginBox').slideUp(250);
        }
    });
    jQuery('a.close').live('click', function() {
       jQuery(this).parent().hide(); 
    });
});