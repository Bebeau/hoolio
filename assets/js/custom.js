// check to make sure it is not loaded on mobile device
var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);

var move = {
	onMove: function() {
		move.slideUp();
		move.slideDown();
		move.slideInLeft();
		move.slideInRight();
		move.bubble();
	},
	isOnScreen: function(elem) {
		var item = jQuery(elem);
		var win = $(window);
	    var viewport = {
	        top : win.scrollTop(),
	        left : win.scrollLeft()
	    };
	    viewport.right = viewport.left + win.width();
	    viewport.bottom = viewport.top + win.height();
	 
	    var bounds = item.offset();
	    bounds.right = bounds.left + item.outerWidth();
	    bounds.bottom = bounds.top + item.outerHeight();
	 
	    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	},
	slideUp: function() {
		var fadeWrap = jQuery('*[data-animation="slideUp"]');
		if(fadeWrap.length > 0) {
			fadeWrap.each(function(){
				var text = jQuery(this);
				if(move.isOnScreen(text)) {
					text.addClass("slideIn");
				} else {
					jQuery(window).scroll(function(){
						if(move.isOnScreen(text)) {
							text.addClass("slideIn");
						} else {
							text.removeClass("slideIn");
						}
					});
				}
			});
		}
	},
	slideDown: function() {
		var slideDownWrap = jQuery('*[data-animation="slideDown"]');
		if(slideDownWrap.length > 0){
			slideDownWrap.each(function(){
				var slide = jQuery(this);
				if(move.isOnScreen(slide)) {
					slide.addClass("slideIn");
				} else {
					jQuery(window).scroll(function(){
						if(move.isOnScreen(slide)) {
							slide.addClass("slideIn");
						} else {
							slide.removeClass("slideIn");
						}
					});
				}
			});
		}
	},
	slideInLeft: function() {
		var wrap = jQuery('*[data-animation="slideInLeft"]');
		if(wrap.length > 0){
			wrap.each(function(){
				var section = jQuery(this);
				var parent = jQuery(this).parent();
				if(move.isOnScreen(parent)) {
					section.addClass("slideIn");
				} else {
					jQuery(window).scroll(function(){
						if(move.isOnScreen(parent)) {
							section.addClass("slideIn");
						} else {
							section.removeClass("slideIn");
						}
					});
				}
			});
		}
	},
	slideInRight: function() {
		var wrap = jQuery('*[data-animation="slideInRight"]');
		if(wrap.length > 0){
			wrap.each(function(){
				var section = jQuery(this);
				var parent = jQuery(this).parent();
				if(move.isOnScreen(parent)) {
					section.addClass("slideIn");
				} else {
					jQuery(window).scroll(function(){
						if(move.isOnScreen(parent)) {
							section.addClass("slideIn");
						} else {
							section.removeClass("slideIn");
						}
					});
				}
			});
		}
	},
	bubble: function() {
		var bubble = jQuery('*[data-animation="bubble"]');
		if(bubble.length > 0){
			bubble.each(function(){
				var section = jQuery(this);
				var parent = jQuery(this).parent();
				if(move.isOnScreen(parent)) {
					section.addClass("load");
				} else {
					jQuery(window).scroll(function(){
						if(move.isOnScreen(parent)) {
							section.addClass("load");
						} else {
							section.removeClass("load");
						}
					});
				}
			});
		}
	}
};

var init = {
	onReady: function() {
		init.openMenu();
		init.bubbleOpen();
		init.pathAnimation();
		init.stepAnimation();
	},
	openMenu: function() {
		jQuery('#Menu').click(function(){
	    	if(jQuery('header').hasClass("open")) {
	    		jQuery('header').removeClass("open");
	    		jQuery('.menu ul li').removeClass("in").dequeue();
	    	} else {
	    		jQuery('header').addClass("open");
	    		jQuery('.menu ul li').each(function(e){
	    			jQuery(this).delay(50*e).queue(function(){
	    				jQuery(this).addClass("in");
	    			});
	    		});
	    	}
	    });
	    jQuery('.menu').addClass("outer");
	    jQuery('.menu ul').addClass("inner");
	},
	bubbleOpen: function() {
		jQuery('.bubble').click(function(e){
			e.preventDefault();
			var item = jQuery(this).parent();
			var icon = item.find("i");
			item.addClass("open");
			icon.addClass("hide");
			setTimeout(
				function() {
					jQuery('.frame',item).addClass("in");
				}, 250
			);
		});
		jQuery('.circleClose').click(function(e){
			e.preventDefault();
			var item = jQuery(this).parent().parent();
			var icon = item.find("i");
			jQuery('.frame',item).removeClass("in");
			setTimeout(
				function() {
					item.removeClass("open");
				}, 250
			);
			setTimeout(
				function() {
					icon.removeClass("hide");
				}, 500
			);
		});
	},
	pathAnimation: function() {
		setTimeout(
			function() {
				jQuery('.path').addClass("show");
			}, 500
		);
		setTimeout(
			function() {
				jQuery('.path').addClass("line");
			}, 750
		);
		setTimeout(
			function() {
				jQuery('.path').addClass("in");
			}, 1500
		);
	},
	stepAnimation: function() {
		var step = jQuery('.step');
		if(step.length > 0) {
			step.each(function(){
				var section = jQuery(this);
				var distance = section.offset().top;
				var outerHeight = jQuery(this).outerHeight();
				jQuery(window).scroll(function(){
					var top = jQuery(window).scrollTop();
					if (top >= distance ) {
						var difference = top - distance;
						var height = outerHeight - difference;
						section.addClass("fixed");
					} else {
						section.removeClass("fixed");
					}
				});
			});
		}
	}
};

jQuery(document).ready(function() {
	move.onMove();
	init.onReady();
});