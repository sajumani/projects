jQuery.noConflict();
jQuery(document).ready(function() {
	//alert("ok");
	/*top-nav-menu*/
	jQuery('.menu ul').menu();
	
});

var ie = jQuery.browser.msie && jQuery.browser.version < 8.0;
 
jQuery.fn.menu = function() {
	jQuery(this).find('li').each(function() {
		if (jQuery(this).find('> ul').size() > 0) {
			jQuery(this).addClass('has_child');
		}
	});

	var closeTimer = null;
	var menuItem = null;
	
	function cancelTimer() {
		if (closeTimer) {
			window.clearTimeout(closeTimer);
			closeTimer = null;
		}
	}
	
	function close() {
		jQuery(menuItem).find('> ul ul').hide();
		ie ? jQuery(menuItem).find('> ul').fadeOut() : jQuery(menuItem).find('> ul').slideUp(250);
		menuItem = null;
	}
	
	jQuery(this).find('li').hover(function() {
		cancelTimer();
		
		var parent = false;
		jQuery(this).parents('li').each(function() { 
			if (this == menuItem) parent = true;
		});
		if (menuItem != this && !parent) close();
		
		jQuery(this).addClass('hover');
		ie ? jQuery(this).find('> ul').fadeIn() : jQuery(this).find('> ul').slideDown(250);
	}, function() {
		jQuery(this).removeClass('hover');
		menuItem = this;
		cancelTimer();
		closeTimer = window.setTimeout(close, 500);
	});
	
	if (ie) {
		jQuery(this).find('ul a').css('display', 'inline-block');
		jQuery(this).find('ul ul').css('top', '0');
	}
}