/*******Tab function******/
var $items = $('.vtab .tabmenu .tabmenulist');
            $items.mouseenter(function() {
                $items.removeClass('tabselected');
                $(this).addClass('tabselected');

                var index = $items.index($(this));
                $('.vtab .tabdiv').hide().eq(index).show();
}).eq(0).mouseenter();
			
/********Add margin right 0 to 4 div************/
$('.footersection .footercolumn:nth-child(4n+4)').css("margin-right","0px");
			
/****** Submenu Menu***********/
$('header .menu ul li').hover(
	function() {
		$(this).find('ul:first').slideDown('slow');
	}, function() {
		$(this).find('ul').slideUp('fast');
});

/******Banner Slider******/ 
 $('#slider1').s3Slider({
            timeOut: 6000 
        });