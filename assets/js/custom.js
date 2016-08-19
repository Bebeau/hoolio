// Parallax
$(function(){ParallaxScroll.init()});var ParallaxScroll={showLogs:!1,round:1e3,init:function(){return this._log("init"),this._inited?(this._log("Already Inited"),void(this._inited=!0)):(this._requestAnimationFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(a,t){window.setTimeout(a,1e3/60)}}(),void this._onScroll(!0))},_inited:!1,_properties:["x","y","z","rotateX","rotateY","rotateZ","scaleX","scaleY","scaleZ","scale"],_requestAnimationFrame:null,_log:function(a){this.showLogs&&console.log("Parallax Scroll / "+a)},_onScroll:function(a){var t=$(document).scrollTop(),e=$(window).height();this._log("onScroll "+t),$("[data-parallax]").each($.proxy(function(i,o){var s=$(o),r=[],n=!1,l=s.data("style");void 0==l&&(l=s.attr("style")||"",s.data("style",l));var d=[s.data("parallax")],c;for(c=2;s.data("parallax"+c);c++)d.push(s.data("parallax-"+c));var v=d.length;for(c=0;v>c;c++){var m=d[c],u=m["from-scroll"];void 0==u&&(u=Math.max(0,$(o).offset().top-e)),u=0|u;var h=m.distance,p=m["to-scroll"];void 0==h&&void 0==p&&(h=e),h=Math.max(0|h,1);var w=m.easing,x=m["easing-return"];if(void 0!=w&&$.easing&&$.easing[w]||(w=null),void 0!=x&&$.easing&&$.easing[x]||(x=w),w){var g=m.duration;void 0==g&&(g=h),g=Math.max(0|g,1);var f=m["duration-return"];void 0==f&&(f=g),h=1;var _=s.data("current-time");void 0==_&&(_=0)}void 0==p&&(p=u+h),p=0|p;var y=m.smoothness;void 0==y&&(y=30),y=0|y,(a||0==y)&&(y=1),y=0|y;var A=t;A=Math.max(A,u),A=Math.min(A,p),w&&(void 0==s.data("sens")&&s.data("sens","back"),A>u&&("back"==s.data("sens")?(_=1,s.data("sens","go")):_++),p>A&&("go"==s.data("sens")?(_=1,s.data("sens","back")):_++),a&&(_=g),s.data("current-time",_)),this._properties.map($.proxy(function(a){var t=0,e=m[a];if(void 0!=e){"scale"==a||"scaleX"==a||"scaleY"==a||"scaleZ"==a?t=1:e=0|e;var i=s.data("_"+a);void 0==i&&(i=t);var o=(e-t)*((A-u)/(p-u))+t,l=i+(o-i)/y;if(w&&_>0&&g>=_){var d=t;"back"==s.data("sens")&&(d=e,e=-e,w=x,g=f),l=$.easing[w](null,_,d,e,g)}l=Math.ceil(l*this.round)/this.round,l==i&&o==e&&(l=e),r[a]||(r[a]=0),r[a]+=l,i!=r[a]&&(s.data("_"+a,r[a]),n=!0)}},this))}if(n){if(void 0!=r.z){var X=m.perspective;void 0==X&&(X=800);var Y=s.parent();Y.data("style")||Y.data("style",Y.attr("style")||""),Y.attr("style","perspective:"+X+"px; -webkit-perspective:"+X+"px; "+Y.data("style"))}void 0==r.scaleX&&(r.scaleX=1),void 0==r.scaleY&&(r.scaleY=1),void 0==r.scaleZ&&(r.scaleZ=1),void 0!=r.scale&&(r.scaleX*=r.scale,r.scaleY*=r.scale,r.scaleZ*=r.scale);var Z="translate3d("+(r.x?r.x:0)+"px, "+(r.y?r.y:0)+"px, "+(r.z?r.z:0)+"px)",q="rotateX("+(r.rotateX?r.rotateX:0)+"deg) rotateY("+(r.rotateY?r.rotateY:0)+"deg) rotateZ("+(r.rotateZ?r.rotateZ:0)+"deg)",F="scaleX("+r.scaleX+") scaleY("+r.scaleY+") scaleZ("+r.scaleZ+")",S=Z+" "+q+" "+F+";";this._log(S),s.attr("style","transform:"+S+" -webkit-transform:"+S+" "+l)}},this)),window.requestAnimationFrame?window.requestAnimationFrame($.proxy(this._onScroll,this,!1)):this._requestAnimationFrame($.proxy(this._onScroll,this,!1))}};

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
		init.stepAnimation();
		init.lines();
		init.speachBubble();
		init.arm();
		init.SVG();
		init.dropdown();
		init.contactBtn();
	},
	dropdown: function() {
		jQuery('#dropdown button').click(function(e){
			e.preventDefault();
			jQuery('#dropdown ul').addClass("show");
		});
		jQuery('#dropdown ul li').click(function(e) {
			e.preventDefault();
			var value = jQuery(this).attr("data-value");
			var text = jQuery(this).text();
			jQuery('#interest').val(value);
			jQuery('#dropdown ul').removeClass("show");
			jQuery('#dropdown button').addClass("selected");
			jQuery('#dropdown button').text(text);
			jQuery('#dropdown button').append('<i class="fa fa-angle-down"></i>');
		});
	},
	SVG: function() {
	    jQuery('img.svg').each(function() {
	        var jQueryimg = jQuery(this);
	        var imgID = jQueryimg.attr('id');
	        var imgClass = jQueryimg.attr('class');
	        var imgURL = jQueryimg.attr('src');

	        jQuery.get(imgURL, function(data) {
	            // Get the SVG tag, ignore the rest
	            var jQuerysvg = jQuery(data).find('svg');

	            // Add replaced image's ID to the new SVG
	            if(typeof imgID !== 'undefined') {
	                jQuerysvg = jQuerysvg.attr('id', imgID);
	            }
	            // Add replaced image's classes to the new SVG
	            if(typeof imgClass !== 'undefined') {
	                jQuerysvg = jQuerysvg.attr('class', imgClass+' replaced-svg');
	            }

	            // Remove any invalid XML tags as per http://validator.w3.org
	            jQuerysvg = jQuerysvg.removeAttr('xmlns:a');

	            // Replace image with new SVG
	            jQueryimg.replaceWith(jQuerysvg);

	        }, 'xml');

	    });
	},
	arm: function() {
		jQuery(window).scroll(function(){
			if(move.isOnScreen(jQuery('#engage'))) {
				jQuery('#arm').addClass("show");
				setTimeout(
					function(){
						jQuery('#hand_icons').addClass("show");
					}, 500
				)
			} else {
				jQuery('#arm').removeClass("show");
				setTimeout(
					function(){
						jQuery('#hand_icons').removeClass("show");
					}, 500
				)
			}
		});
	},
	speachBubble: function() {
		jQuery(window).scroll(function(){
			if(move.isOnScreen(jQuery('.speach_bubble'))) {
				setTimeout(
					function(){
						jQuery('.speach_bubble').addClass("in");
					}, 300
				);
			} else {
				jQuery('.speach_bubble').removeClass("in");
			}
		});
	},
	lines: function() {
		jQuery(window).scroll(function(){
			if(move.isOnScreen(jQuery('.label'))) {
				jQuery('.label').addClass("in");
				setTimeout(
					function(){
						jQuery('.line2').addClass("in");
					}, 500
				);
				setTimeout(
					function(){
						jQuery('.followUp').addClass("in");
					}, 1000
				);
			} else {
				jQuery('.label').removeClass("in");
				setTimeout(
					function(){
						jQuery('.line2').removeClass("in");
					}, 500
				);
				setTimeout(
					function(){
						jQuery('.followUp').removeClass("in");
					}, 1000
				);
			}
		});
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
		jQuery('.bubblewrap').click(function(e){
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
	},
	contactSubmit: function() {
		var Frm = jQuery('#contactfrm');
    	jQuery('<i class="fa fa-spinner fa-spin"></i>').prependTo('.btn-submit');
        jQuery.ajax({
            url: Frm.attr('action')+"?ajax=true",
            type: Frm.attr('method'),
            data: Frm.serialize(),
            success: init.contactResponse
        });
        return false;
	},
	contactResponse: function(response) {
        jQuery('.btn-submit i').remove();
        if (response === "Success") {
        	jQuery('.btn-submit').replaceWith('<button class="btn-custom btn-pink btn-submit success"><i class="fa fa-check"></i> Success</button>');
            jQuery("input[name='firstname']").val( "" );
            jQuery("input[name='lastname']").val( "" );
            jQuery("input[name='emailaddress']").val( "" );
            jQuery("input[name='interest']").val( "" );
            jQuery('.btn-dropdown').replaceWith('<button type="button" class="btn btn-blue btn-block btn-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Me <i class="fa fa-caret-down"></i></button>');
            jQuery("textarea").val( "" );
            setTimeout(
            	function() {
            		jQuery('.btn-submit').replaceWith('<button class="btn-custom btn-pink btn-submit">Submit</button>');
            	}, 2500
        	);
        }
        if (response === "E") {
         	jQuery('.btn-submit').replaceWith('<button class="btn-custom btn-pink btn-submit error">Please fill out all fields</button>');
         	setTimeout(
            	function() {
            		jQuery('.btn-submit').replaceWith('<button class="btn-custom btn-pink btn-submit">Submit</button>');
            	}, 2500
        	);
        }
	},
	contactBtn: function() {
		jQuery('#contactfrm').submit(init.contactSubmit);
	},
};

jQuery(document).ready(function() {
	move.onMove();
	init.onReady();
});