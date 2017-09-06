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
    var loginBox = jQuery('#loginBox');
	//jQuery(loginBox).fadeIn(300);
	var popMargTop = (jQuery(loginBox).height() + 24) / 2; 
	var popMargLeft = (jQuery(loginBox).width() + 24) / 2;
    //console.log(jQuery(loginBox).height()); 
	
	jQuery(loginBox).css({ 
		'margin-top' : -popMargTop,
		'margin-left' : -popMargLeft
	});
	jQuery('a.login-window').click(function() {
		
		jQuery(loginBox).fadeIn(300);
		jQuery('#mask').fadeIn(300);
		
		return false;
	});
	jQuery('button.close, #mask').live('click', function() { 
	  jQuery('#mask , .loginBox').fadeOut(300 , function() {
		jQuery('#mask').hide();  
	}); 
	return false;
	});
    $('#login-trigger').click(function(){
        $(this).next('#login-content').slideToggle();
        $(this).toggleClass('active');					
        
        if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
        	else $(this).find('span').html('&#x25BC;')
	})
    // button search
	jQuery('.options').on('click', function(event){
		event.preventDefault();
		jQuery('.selectOptions').slideToggle('200');
	});
	jQuery('span.selectOption').on('click', function(event){
		event.preventDefault();
		jQuery('#input_search').val('');
		jQuery(this).toggleClass('active');
		jQuery('div.selectOptions').slideUp('200');
		var value = jQuery(this).attr('value');
		if( jQuery(this).hasClass('active') ){
			jQuery('#input_search').val(value);
		} else{
			jQuery('#input_search').val('');
		}
		
	});
    jQuery('a.close').live('click', function() {
       jQuery('#loginBox, #mask').hide(); 
    });
    jQuery('.chat-textarea .btn').live('click', function(event){
        event.preventDefault();
        var comments = jQuery('comments');
        var info = comments.attr('data-info');
        var dataInfo = $.parseJSON(info);
        var noidung = CKEDITOR.instances['textarea'].getData();
        jQuery.ajax({
            url: ajaxurl+'include/comments.php',
            type: 'POST',
            dataType: 'json',
            data: { user: dataInfo.userId, page: dataInfo.pageId, table: dataInfo.control, content: noidung, status: 'comment'},
            success: function(res){
                if(res) {
                    var box = jQuery('<div class="chat"><img src="'+res.avatar+'" class="rounded" title="'+res.hoten+'"><div class="triangle"></div><div class="text"><p class="msg">'+res.content+'<span class="date">Vừa xong</span></p></div></div>');
                    box.hide();
                    $('comments .chat:last').after(box);
                    box.fadeIn('slow');
                    return false;
                } else{
                    alert('Quá trình xử lý không thành công.');
                }
            }
        });
        return false;
    });
    var regBox = jQuery('#registerBox');
	var popMargTop = (jQuery(regBox).height() + 12) / 2; 
	var popMargLeft = (jQuery(regBox).width() + 12) / 2;
    console.log(jQuery(regBox).width()); 
	
	jQuery(regBox).css({ 
		'margin-top' : -popMargTop,
		'margin-left' : -popMargLeft
	});
	jQuery('a.reg-window').click(function() {
		
		jQuery(regBox).fadeIn(300);
		jQuery('#mask').fadeIn(300);
		
		return false;
	});
});