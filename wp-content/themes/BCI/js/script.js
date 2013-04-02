

$(document).ready(function(){
	
		
			
	
	$(".down").click(function(){
		$('html, body').animate({
			scrollTop: $(this).parent().parent().parent().next(".home").offset().top - 55
		}, 2000);		
	});	
		
	$(".top-level li").mouseenter(function(){
		$(this).children("ul").show();
	}).mouseleave(function(){
		$(this).children("ul").hide();
	});
	
	$(".top-level li").has(".sub-menu").children("a").addClass("dropdown");
	$(".top-level li").has(".sub-menu	").children("a").removeAttr("href");
	

	$(".newsroom").click(function(){

		$(".news").animate({height: "30"}, 250, function(){
			$(".news").css("overflow","visible");
		});
	});
	
	$("li.protected").click(function(){
		$(".login").animate({height: "70"}, 250, function(){
			$(".login").css("overflow","visible");
		});
	});
	
	$('#loginform').submit(function(e) {
        
		//e.preventDefault();
		
		if($('#i_agree').is(':checked')) {
		
			return true;
			/*
			$.post($(this).attr('action'), $(this).serialize(), function(response) {
			
			window.location.reload();
			
			});
			*/
		}
		else {
			alert('You must agree to the terms first.');
			return false;
		}
		
	});
	
	$('#must-check').change(function(){
    	var c = this.checked ? 'none' : 'block';
    	$('p').css('display', c);
	});
	
	$(".news .close").click(function(){
		$(".news").animate({height: "5"}, 250, function(){
			$(".news").css("overflow","hidden");
		});	
	});
	
	$(".login .close").click(function(){
		$(".login").animate({height: "0"}, 250, function(){
			$(".login").css("overflow","hidden");
		});
	});
	
	$(".input").click(function(){
		$(this).val("");		
	});
	
	$("a.top").click(function (){
		$('html, body').animate({
			scrollTop: $("#page-top").offset().top
		}, 2000);
	});
	
		
	$(".mail-to").click(function(){
		
		var contactEmail = $(this).attr("rel");
		
		
		$(".overlay").show();
		$(".contact-form").show();
		$("#to-email").attr("value", contactEmail);
		
	});
	
	
	$(".em-calendar-wrapper").ajaxStop(function() {
		
		$(".eventful").children("a").removeAttr("href");
		$(".eventful-today").children("a").removeAttr("href");
	
		$(".eventful").mouseenter(function(){
			$(this).children("ul").show();
		}).mouseleave(function(){
			$(this).children("ul").hide();
		});
	
	
		$(".eventful-today").mouseenter(function(){
			$(this).children("ul").show();
		}).mouseleave(function(){
			$(this).children("ul").hide();
		});
	});
	
	$(".eventful").children("a").removeAttr("href");
	$(".eventful-today").children("a").removeAttr("href");
	
	$(".eventful").mouseenter(function(){
		$(this).children("ul").show();
	}).mouseleave(function(){
		$(this).children("ul").hide();
	});
	
	
	$(".eventful-today").mouseenter(function(){
		$(this).children("ul").show();
	}).mouseleave(function(){
		$(this).children("ul").hide();
	});
	
	var win = $(window);
	
	 win.scroll(function () {
		 
		if ($("#upcoming-events").length == false) {
	
		 if (win.height() + win.scrollTop() >= $(document).height() - 60) {
			
			$("header").fadeOut();
			$(".side-menu").fadeOut();
			 
		 }else{
		 
		 
			$("header").fadeIn();
			$(".side-menu").fadeIn();
		 }
				
		} else {
		
		 if (win.height() + win.scrollTop() >= $(document).height() - 250) {
			
			$("header").fadeOut();
			$(".side-menu").fadeOut();
			 
		 }else{
		 
		 
			$("header").fadeIn();
			$(".side-menu").fadeIn();
		 }	
			
		}
		

	 });
	 
	$(".wp-tooltip").mouseenter(function(){
		
		
		$(this).css("position","relative");
		$(this).data("title", $(this).attr("title")).removeAttr("title");
		$(this).append('<div class="footnote_tooltip"><span>' + $(this).data("title") + '</span><div class="callout"></div>');			
		
	}).mouseleave(function(){
		
		$(".footnote_tooltip").remove();
		$(this).css("position","static");
		$(this).attr("title", $(this).data("title"));

	});	
	
	$(".wp-tooltip").click(function(){
		
		var publicationURL = pathname + "?cat=18";
	
		window.location = publicationURL;
		
	});
	
	$(".popup .close").click(function(){
		$(".popup").hide();
		$(".newsletter").hide();
		$(".contact-form").hide();
		$(".credentials").hide();
	})
	
	$(".popup .close").click(function(){
		$(".popup").hide();
		$(".overlay").hide();
	});
	
	$("footer ul li").eq(2).children().removeAttr("href");

	
	$("footer ul li").eq(2).children().click(function(){
		$(".overlay").show();
		$(".newsletter").show();
	});
		
	$("#newsletter-btn").click(function(){
		$(".overlay").show();
		$(".newsletter").show();
	});
	
	$(".login span a").click(function(){
		$(".overlay").show();
		$(".credentials").show();
	});

});



(function ($) {
    $.fn.marquee = function (klass) {
        var newMarquee = [],
            last = this.length;

        // works out the left or right hand reset position, based on scroll
        // behavior, current direction and new direction
        function getReset(newDir, marqueeRedux, marqueeState) {
            var behavior = marqueeState.behavior, width = marqueeState.width, dir = marqueeState.dir;
            var r = 0;
            if (behavior == 'alternate') {
                r = newDir == 1 ? marqueeRedux[marqueeState.widthAxis] - (width*2) : width;
            } else if (behavior == 'slide') {
                if (newDir == -1) {
                    r = dir == -1 ? marqueeRedux[marqueeState.widthAxis] : width;
                } else {
                    r = dir == -1 ? marqueeRedux[marqueeState.widthAxis] - (width*2) : 0;
                }
            } else {
                r = newDir == -1 ? marqueeRedux[marqueeState.widthAxis] : 0;
            }
            return r;
        }

        // single "thread" animation
        function animateMarquee() {
            var i = newMarquee.length,
                marqueeRedux = null,
                $marqueeRedux = null,
                marqueeState = {},
                newMarqueeList = [],
                hitedge = false;
                
            while (i--) {
                marqueeRedux = newMarquee[i];
                $marqueeRedux = $(marqueeRedux);
                marqueeState = $marqueeRedux.data('marqueeState');
                
                if ($marqueeRedux.data('paused') !== true) {
                    // TODO read scrollamount, dir, behavior, loops and last from data
                    marqueeRedux[marqueeState.axis] += (marqueeState.scrollamount * marqueeState.dir);

                    // only true if it's hit the end
                    hitedge = marqueeState.dir == -1 ? marqueeRedux[marqueeState.axis] <= getReset(marqueeState.dir * -1, marqueeRedux, marqueeState) : marqueeRedux[marqueeState.axis] >= getReset(marqueeState.dir * -1, marqueeRedux, marqueeState);
                    
                    if ((marqueeState.behavior == 'scroll' && marqueeState.last == marqueeRedux[marqueeState.axis]) || (marqueeState.behavior == 'alternate' && hitedge && marqueeState.last != -1) || (marqueeState.behavior == 'slide' && hitedge && marqueeState.last != -1)) {                        
                        if (marqueeState.behavior == 'alternate') {
                            marqueeState.dir *= -1; // flip
                        }
                        marqueeState.last = -1;

                        $marqueeRedux.trigger('stop');

                        marqueeState.loops--;
                        if (marqueeState.loops === 0) {
                            if (marqueeState.behavior != 'slide') {
                                marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
                            } else {
                                // corrects the position
                                marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir * -1, marqueeRedux, marqueeState);
                            }

                            $marqueeRedux.trigger('end');
                        } else {
                            // keep this marquee going
                            newMarqueeList.push(marqueeRedux);
                            $marqueeRedux.trigger('start');
                            marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
                        }
                    } else {
                        newMarqueeList.push(marqueeRedux);
                    }
                    marqueeState.last = marqueeRedux[marqueeState.axis];

                    // store updated state only if we ran an animation
                    $marqueeRedux.data('marqueeState', marqueeState);
                } else {
                    // even though it's paused, keep it in the list
                    newMarqueeList.push(marqueeRedux);                    
                }
            }

            newMarquee = newMarqueeList;
            
            if (newMarquee.length) {
                setTimeout(animateMarquee, 25);
            }            
        }
        
        // TODO consider whether using .html() in the wrapping process could lead to loosing predefined events...
        this.each(function (i) {
            var $marquee = $(this),
                width = $marquee.attr('width') || $marquee.width(),
                height = $marquee.attr('height') || $marquee.height(),
                $marqueeRedux = $marquee.after('<div ' + (klass ? 'class="' + klass + '" ' : '') + 'style="display: block-inline; padding: 7px 0 6px; overflow: hidden;"><div style="float: left; white-space: nowrap;">' + $marquee.html() + '</div></div>').next(),
                marqueeRedux = $marqueeRedux.get(0),
                hitedge = 0,
                direction = ($marquee.attr('direction') || 'left').toLowerCase(),
                marqueeState = {
                    dir : /down|right/.test(direction) ? -1 : 1,
                    axis : /left|right/.test(direction) ? 'scrollLeft' : 'scrollTop',
                    widthAxis : /left|right/.test(direction) ? 'scrollWidth' : 'scrollHeight',
                    last : -1,
                    loops : $marquee.attr('loop') || -1,
                    scrollamount : $marquee.attr('scrollamount') || this.scrollAmount || 2,
                    behavior : ($marquee.attr('behavior') || 'scroll').toLowerCase(),
                    width : /left|right/.test(direction) ? width : height
                };
            
            // corrects a bug in Firefox - the default loops for slide is -1
            if ($marquee.attr('loop') == -1 && marqueeState.behavior == 'slide') {
                marqueeState.loops = 1;
            }

            $marquee.remove();
            
            // add padding
            if (/left|right/.test(direction)) {
                $marqueeRedux.find('> div').css('padding', '0 ' + width + 'px');
            } else {
                $marqueeRedux.find('> div').css('padding', height + 'px 0');
            }
            
            // events
            $marqueeRedux.bind('stop', function () {
                $marqueeRedux.data('paused', true);
            }).bind('pause', function () {
                $marqueeRedux.data('paused', true);
            }).bind('start', function () {
                $marqueeRedux.data('paused', false);
            }).bind('unpause', function () {
                $marqueeRedux.data('paused', false);
            }).data('marqueeState', marqueeState); // finally: store the state
            
            // todo - rerender event allowing us to do an ajax hit and redraw the marquee

            newMarquee.push(marqueeRedux);

            marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
            $marqueeRedux.trigger('start');
            
            // on the very last marquee, trigger the animation
            if (i+1 == last) {
                animateMarquee();
            }
        });            

        return $(newMarquee);
    };




	$.fn.pinToTop = function(options){
		var defaults = {},
			options = $.extend(defaults, options);
		
		return this.each(function(){
			
			var $obj = $(this);
			var initMargin = parseInt($obj.css('marginTop').replace(/auto/,0));
			var padTop = 10;
			var distY = 0;
			var initTop = parseInt($obj.css('top'));
			var initOffset = $obj.offset().top;
			
			function calculateOffset(){
				if(distY >= initOffset - padTop){
					$obj.css({
						position: 'fixed',
						top: 0,
						width: 940,
						marginTop: 110
					});
				} else {
					$obj.css({
						position: 'relative',
						marginTop: initMargin,
						width: 240						
					});
				}
			};
			
			$(window).bind({
				scroll: function(e){
					distY = $(window).scrollTop();
					calculateOffset();
				}
			});
			
		});
	};


	$('.side-menu').pinToTop();



		
}(jQuery));



