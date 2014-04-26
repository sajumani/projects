/* ------------------------------------------------------------------------
	s3Slider
	
	Developped By: Boban Karišik -> http://www.serie3.info/
        CSS Help: Mészáros Róbert -> http://www.perspectived.com/
	Version: 1.0
	
	Copyright: Feel free to redistribute the script/modify it, as
			   long as you leave my infos at the top.
------------------------------------------------------------------------- */


(function($){  

    $.fn.s3Slider = function(vars) {       
        
        var element     = this;
        var timeOut     = (vars.timeOut != undefined) ? vars.timeOut : 4000;
        var current     = null;
        var timeOutFn   = null;
        var faderStat   = true;
        var mOver       = false;
        var items       = $("#" + element[0].id + "Content ." + element[0].id + "Image");
		
        var itemsSpan   = $("#" + element[0].id + "Content ." + element[0].id + "Image span");
            
        items.each(function(i) {
    
            $(items[i]).mouseover(function() {
               mOver = true;
            });
            
            $(items[i]).mouseout(function() {
                mOver   = false;
                fadeElement(true);
            });
            
        });
        
        var fadeElement = function(isMouseOut) {
            var thisTimeOut = (isMouseOut) ? (timeOut/2) : timeOut;
            thisTimeOut = (faderStat) ? 10 : thisTimeOut;
            if(items.length > 0) {
                timeOutFn = setTimeout(app.makeSlider, thisTimeOut);
				
            } else {
                console.log("Poof..");
            }
        }
        /***************Slider Navi*****************/
		
		var $thumbsContainer = this,
		$thumbs = $('ul li', $thumbsContainer),
		thumbsCount = $thumbs.length;
		for(var i=1;i<=(thumbsCount);i++)
		{
			$('.slide_dots').append('<li>'+i+'</li>');	
		}

		/**************Slider Navi******************/
		var app = {
			events:function()
			{
				$('li','.slide_dots').on('click', function(e) {
						mOver = true;
						var $this = $(this);
						current = (current != null) ? current : items[(items.length-1)];
						var $currNo      = $this.index()+1;
						$currNo = ($currNo == items.length) ? 0 : ($currNo - 1);
						var newMargin   = $(element).width() * $currNo;
						$(items).fadeOut();
							$(items[$currNo]).fadeIn((timeOut/6), function() {
							$('li','.slide_dots').removeClass('active');
							$('li','.slide_dots').eq($(this).index()).addClass('active');
							if($(itemsSpan[$currNo]).css('bottom') == 0) {
								$(itemsSpan[$currNo]).slideUp((timeOut/6), function() {
								faderStat = false;
								current = items[$currNo];
								fadeElement(false);
								
								});
							} else {
								$(itemsSpan[$currNo]).slideDown((timeOut/6), function() {
								faderStat = false;
								current = items[$currNo];
								fadeElement(false);
								});
							}
							});
						if($(itemsSpan[$currNo]).css('bottom') == 0) {
							$(itemsSpan[$currNo]).slideDown((timeOut/6), function() {
								$(items[$currNo]).fadeOut((timeOut/6), function() {
								faderStat = true;
								current = items[($currNo+1)];
								if(!mOver) {
								fadeElement(false);
								}
								});
							});
							
						}
						mOver = false;
						timeOutFn=timeOutFn+10;
				});
							$('.bottomnavi').on('click', function(e) {
										mOver = true;	  
					e.preventDefault();
						current = (current != null) ? current : items[(items.length-1)];
						var $currNo =1;
						//alert($('li','.slide_dots').index());
						$('li','.slide_dots').each(function(i) {
											if($(this).hasClass('active'))
											{
												 $currNo      = $(this).index();
												//alert($currNo);
											}
											
											});
						//
						$currNo = ($currNo == 0) ? items.length-2 : ($currNo - 1);
						//alert($currNo);
						var newMargin   = $(element).width() * $currNo;
						$(items).fadeOut();
							$(items[$currNo]).fadeIn((timeOut/6), function() {
							$('li','.slide_dots').removeClass('active');
							$('li','.slide_dots').eq($(this).index()).addClass('active');
							if($(itemsSpan[$currNo]).css('bottom') == 0) {
								$(itemsSpan[$currNo]).slideUp((timeOut/6), function() {
								faderStat = false;
								current = items[$currNo];
								fadeElement(false);
								
								});
							} else {
								$(itemsSpan[$currNo]).slideDown((timeOut/6), function() {
								faderStat = false;
								current = items[$currNo];
								fadeElement(false);
								});
							}
							});
						if($(itemsSpan[$currNo]).css('bottom') == 0) {
							$(itemsSpan[$currNo]).slideDown((timeOut/6), function() {
								$(items[$currNo]).fadeOut((timeOut/6), function() {
								faderStat = true;
								current = items[($currNo+1)];
								if(!mOver) {
								fadeElement(false);
								}
								});
							});
							
						}
						//mOver = false;
						//timeOutFn=timeOutFn+10;
				
					
				});
			$('.topnavi').on('click', function(e) {
										mOver = true;	  
					e.preventDefault();
						current = (current != null) ? current : items[(items.length-1)];
						var $currNo =1;
						//alert($('li','.slide_dots').index());
						$('li','.slide_dots').each(function(i) {
											if($(this).hasClass('active'))
											{
												 $currNo      = $(this).index()+2;
												//alert($currNo);
											}
											
											});
						//alert($currNo);
						$currNo = ($currNo == items.length) ? 0 : ($currNo - 1);
						var newMargin   = $(element).width() * $currNo;
						$(items).fadeOut();
							$(items[$currNo]).fadeIn((timeOut/6), function() {
							$('li','.slide_dots').removeClass('active');
							$('li','.slide_dots').eq($(this).index()).addClass('active');
							if($(itemsSpan[$currNo]).css('bottom') == 0) {
								$(itemsSpan[$currNo]).slideUp((timeOut/6), function() {
								faderStat = false;
								current = items[$currNo];
								fadeElement(false);
								
								});
							} else {
								$(itemsSpan[$currNo]).slideDown((timeOut/6), function() {
								faderStat = false;
								current = items[$currNo];
								fadeElement(false);
								});
							}
							});
						if($(itemsSpan[$currNo]).css('bottom') == 0) {
							$(itemsSpan[$currNo]).slideDown((timeOut/6), function() {
								$(items[$currNo]).fadeOut((timeOut/6), function() {
								faderStat = true;
								current = items[($currNo+1)];
								if(!mOver) {
								fadeElement(false);
								}
								});
							});
							
						}
						//mOver = false;
						//timeOutFn=timeOutFn+10;
				
					
				});
			},
         makeSlider: function() {
            
           current = (current != null) ? current : items[(items.length-1)];
		   var $currNo      = jQuery.inArray(current, items) + 1;
            $currNo = ($currNo == items.length) ? 0 : ($currNo - 1);
            var newMargin   = $(element).width() * $currNo;
				
			
            if(faderStat == true) {
                if(!mOver) {
                    $(items[$currNo]).fadeIn((timeOut/6), function() {
																  //alert($currNo);
						$('li','.slide_dots').removeClass('active');
						$('li','.slide_dots').eq($(this).index()).addClass('active');
                        if($(itemsSpan[$currNo]).css('bottom') == 0) {
                            $(itemsSpan[$currNo]).slideUp((timeOut/6), function() {
								
                                faderStat = false;
                                current = items[$currNo];
								
                                if(!mOver) {
                                    fadeElement(false);
                                }
                            });
                        } else {
                            $(itemsSpan[$currNo]).slideDown((timeOut/6), function() {
                                faderStat = false;
                                current = items[$currNo];
                                if(!mOver) {
                                    fadeElement(false);
                                }
                            });
                        }
                    });
                }
            } else {
                if(!mOver) {
                    if($(itemsSpan[$currNo]).css('bottom') == 0) {
                        $(itemsSpan[$currNo]).slideDown((timeOut/6), function() {
                            $(items[$currNo]).fadeOut((timeOut/6), function() {
                                faderStat = true;
                                current = items[($currNo+1)];
                                if(!mOver) {
                                    fadeElement(false);
                                }
                            });
                        });
                    } else {
                        $(itemsSpan[$currNo]).slideUp((timeOut/6), function() {
                        $(items[$currNo]).fadeOut((timeOut/6), function() {
                                faderStat = true;
                                current = items[($currNo+1)];
                                if(!mOver) {
                                    fadeElement(false);
                                }
                            });
                        });
                    }
                }
            }
        }
		}
        app.makeSlider();
		app.events();
		
    };  

})(jQuery);  