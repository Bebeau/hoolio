// Parallax
$(function(){ParallaxScroll.init()});var ParallaxScroll={showLogs:!1,round:1e3,init:function(){return this._log("init"),this._inited?(this._log("Already Inited"),void(this._inited=!0)):(this._requestAnimationFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(a,t){window.setTimeout(a,1e3/60)}}(),void this._onScroll(!0))},_inited:!1,_properties:["x","y","z","rotateX","rotateY","rotateZ","scaleX","scaleY","scaleZ","scale"],_requestAnimationFrame:null,_log:function(a){this.showLogs&&console.log("Parallax Scroll / "+a)},_onScroll:function(a){var t=$(document).scrollTop(),e=$(window).height();this._log("onScroll "+t),$("[data-parallax]").each($.proxy(function(i,o){var s=$(o),r=[],n=!1,l=s.data("style");void 0==l&&(l=s.attr("style")||"",s.data("style",l));var d=[s.data("parallax")],c;for(c=2;s.data("parallax"+c);c++)d.push(s.data("parallax-"+c));var v=d.length;for(c=0;v>c;c++){var m=d[c],u=m["from-scroll"];void 0==u&&(u=Math.max(0,$(o).offset().top-e)),u=0|u;var h=m.distance,p=m["to-scroll"];void 0==h&&void 0==p&&(h=e),h=Math.max(0|h,1);var w=m.easing,x=m["easing-return"];if(void 0!=w&&$.easing&&$.easing[w]||(w=null),void 0!=x&&$.easing&&$.easing[x]||(x=w),w){var g=m.duration;void 0==g&&(g=h),g=Math.max(0|g,1);var f=m["duration-return"];void 0==f&&(f=g),h=1;var _=s.data("current-time");void 0==_&&(_=0)}void 0==p&&(p=u+h),p=0|p;var y=m.smoothness;void 0==y&&(y=30),y=0|y,(a||0==y)&&(y=1),y=0|y;var A=t;A=Math.max(A,u),A=Math.min(A,p),w&&(void 0==s.data("sens")&&s.data("sens","back"),A>u&&("back"==s.data("sens")?(_=1,s.data("sens","go")):_++),p>A&&("go"==s.data("sens")?(_=1,s.data("sens","back")):_++),a&&(_=g),s.data("current-time",_)),this._properties.map($.proxy(function(a){var t=0,e=m[a];if(void 0!=e){"scale"==a||"scaleX"==a||"scaleY"==a||"scaleZ"==a?t=1:e=0|e;var i=s.data("_"+a);void 0==i&&(i=t);var o=(e-t)*((A-u)/(p-u))+t,l=i+(o-i)/y;if(w&&_>0&&g>=_){var d=t;"back"==s.data("sens")&&(d=e,e=-e,w=x,g=f),l=$.easing[w](null,_,d,e,g)}l=Math.ceil(l*this.round)/this.round,l==i&&o==e&&(l=e),r[a]||(r[a]=0),r[a]+=l,i!=r[a]&&(s.data("_"+a,r[a]),n=!0)}},this))}if(n){if(void 0!=r.z){var X=m.perspective;void 0==X&&(X=800);var Y=s.parent();Y.data("style")||Y.data("style",Y.attr("style")||""),Y.attr("style","perspective:"+X+"px; -webkit-perspective:"+X+"px; "+Y.data("style"))}void 0==r.scaleX&&(r.scaleX=1),void 0==r.scaleY&&(r.scaleY=1),void 0==r.scaleZ&&(r.scaleZ=1),void 0!=r.scale&&(r.scaleX*=r.scale,r.scaleY*=r.scale,r.scaleZ*=r.scale);var Z="translate3d("+(r.x?r.x:0)+"px, "+(r.y?r.y:0)+"px, "+(r.z?r.z:0)+"px)",q="rotateX("+(r.rotateX?r.rotateX:0)+"deg) rotateY("+(r.rotateY?r.rotateY:0)+"deg) rotateZ("+(r.rotateZ?r.rotateZ:0)+"deg)",F="scaleX("+r.scaleX+") scaleY("+r.scaleY+") scaleZ("+r.scaleZ+")",S=Z+" "+q+" "+F+";";this._log(S),s.attr("style","transform:"+S+" -webkit-transform:"+S+" "+l)}},this)),window.requestAnimationFrame?window.requestAnimationFrame($.proxy(this._onScroll,this,!1)):this._requestAnimationFrame($.proxy(this._onScroll,this,!1))}};
// Add Count.js
!function($){function t(t,e){return t.toFixed(e.decimals)}$.fn.countTo=function(t){return t=t||{},$(this).each(function(){function e(t){var e=n.formatter.call(l,t,n);f.text(e)}function a(){c+=r,i++,e(c),"function"==typeof n.onUpdate&&n.onUpdate.call(l,c),i>=o&&(f.removeData("countTo"),clearInterval(s.interval),c=n.to,"function"==typeof n.onComplete&&n.onComplete.call(l,c))}var n=$.extend({},$.fn.countTo.defaults,{from:$(this).data("from"),to:$(this).data("to"),speed:$(this).data("speed"),refreshInterval:$(this).data("refresh-interval"),decimals:$(this).data("decimals")},t),o=Math.ceil(n.speed/n.refreshInterval),r=(n.to-n.from)/o,l=this,f=$(this),i=0,c=n.from,s=f.data("countTo")||{};f.data("countTo",s),s.interval&&clearInterval(s.interval),e(c),s.interval=setInterval(a,n.refreshInterval)})},$.fn.countTo.defaults={from:0,to:0,speed:1e3,refreshInterval:100,decimals:0,formatter:t,onUpdate:null,onComplete:null}}(jQuery);
// scooch.js
!function(t){if("function"==typeof define&&define.amd)define(["$"],t);else{var e=window.Mobify&&window.Mobify.$||window.Zepto||window.jQuery;t(e)}}(function(t){var e=function(t){var e={},i=navigator.userAgent,n=t.support=t.support||{};t.extend(t.support,{touch:"ontouchend"in document}),e.events=n.touch?{down:"touchstart",move:"touchmove",up:"touchend"}:{down:"mousedown",move:"mousemove",up:"mouseup"},e.getCursorPosition=n.touch?function(t){return t=t.originalEvent||t,{x:t.touches[0].clientX,y:t.touches[0].clientY}}:function(t){return{x:t.clientX,y:t.clientY}},e.getProperty=function(t){for(var e=["Webkit","Moz","O","ms",""],i=document.createElement("div").style,n=0;e.length>n;++n)if(void 0!==i[e[n]+t])return e[n]+t},t.extend(n,{transform:!!e.getProperty("Transform"),transform3d:!(!(window.WebKitCSSMatrix&&"m11"in new WebKitCSSMatrix)||/android\s+[1-2]/i.test(i))});var s=e.getProperty("Transform");e.translateX=n.transform3d?function(t,e){"number"==typeof e&&(e+="px"),t.style[s]="translate3d("+e+",0,0)"}:n.transform?function(t,e){"number"==typeof e&&(e+="px"),t.style[s]="translate("+e+",0)"}:function(t,e){"number"==typeof e&&(e+="px"),t.style.left=e};var o=(e.getProperty("Transition"),e.getProperty("TransitionDuration"));return e.setTransitions=function(t,e){t.style[o]=e?"":"0s"},e.requestAnimationFrame=function(){var t=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(t){window.setTimeout(t,1e3/60)},e=function(){t.apply(window,arguments)};return e}(),e}(t),i=function(t,e){var i={dragRadius:10,moveRadius:20,animate:!0,autoHideArrows:!1,classPrefix:"m-",classNames:{outer:"scooch",inner:"scooch-inner",item:"item",center:"center",touch:"has-touch",dragging:"dragging",active:"active",inactive:"inactive",fluid:"fluid"}},n=t.support,s=function(t,e){this.setOptions(e),this.initElements(t),this.initOffsets(),this.initAnimation(),this.bind(),this._updateCallbacks=[]};return s.defaults=i,s.prototype.setOptions=function(e){var n=this.options||t.extend({},i,e);n.classNames=t.extend({},n.classNames,e.classNames||{}),this.options=n},s.prototype.initElements=function(e){this._index=1,this.element=e,this.$element=t(e),this.$inner=this.$element.find("."+this._getClass("inner")),this.$items=this.$inner.children(),this.$start=this.$items.eq(0),this.$sec=this.$items.eq(1),this.$current=this.$items.eq(this._index-1),this._length=this.$items.length,this._alignment=this.$element.hasClass(this._getClass("center"))?.5:0,this._isFluid=this.$element.hasClass(this._getClass("fluid"))},s.prototype.initOffsets=function(){this._offsetDrag=0},s.prototype.initAnimation=function(){this.animating=!1,this.dragging=!1,this._needsUpdate=!1,this._enableAnimation()},s.prototype._getClass=function(t){return this.options.classPrefix+this.options.classNames[t]},s.prototype._enableAnimation=function(){this.animating||(e.setTransitions(this.$inner[0],!0),this.$inner.removeClass(this._getClass("dragging")),this.animating=!0)},s.prototype._disableAnimation=function(){this.animating&&(e.setTransitions(this.$inner[0],!1),this.$inner.addClass(this._getClass("dragging")),this.animating=!1)},s.prototype.refresh=function(){this.$items=this.$inner.children("."+this._getClass("item")),this.$start=this.$items.eq(0),this.$sec=this.$items.eq(1),this._length=this.$items.length,this.update()},s.prototype.update=function(t){if(void 0!==t&&this._updateCallbacks.push(t),!this._needsUpdate){this._needsUpdate=!0;var i=this;e.requestAnimationFrame(function(){i._update(),setTimeout(function(){for(var t=0,e=i._updateCallbacks.length;e>t;t++)i._updateCallbacks[t].call(i);i._updateCallbacks=[]},10)})}},s.prototype._update=function(){if(this._needsUpdate){var t=this.$current,i=this.$start,n=t.prop("offsetLeft")+t.prop("clientWidth")*this._alignment,s=i.prop("offsetLeft")+i.prop("clientWidth")*this._alignment,o=Math.round(-(n-s)+this._offsetDrag);e.translateX(this.$inner[0],o),this._needsUpdate=!1}},s.prototype.bind=function(){function i(t){n.touch||t.preventDefault(),c=!0,m=!1,r=e.getCursorPosition(t),h=0,d=0,l=!1,p._disableAnimation(),$=1==p._index,y=p._index==p._length}function s(t){if(c&&!m){var i=e.getCursorPosition(t),n=p.$element.width();h=r.x-i.x,d=r.y-i.y,l||u(h)>u(d)&&u(h)>f?(l=!0,t.preventDefault(),$&&0>h?h=h*-n/(h-n):y&&h>0&&(h=h*n/(h+n)),p._offsetDrag=-h,p.update()):u(d)>u(h)&&u(d)>f&&(m=!0)}}function o(){c&&(c=!1,p._enableAnimation(),!m&&u(h)>_.moveRadius?h>0?p.next():p.prev():(p._offsetDrag=0,p.update()))}function a(t){l&&t.preventDefault()}var r,h,d,l,u=Math.abs,c=!1,m=!1,f=this.options.dragRadius,p=this,g=this.$element,v=this.$inner,_=this.options,$=!1,y=!1,w=t(window).width();v.on(e.events.down+".scooch",i).on(e.events.move+".scooch",s).on(e.events.up+".scooch",o).on("click.scooch",a).on("mouseout.scooch",o),g.on("click","[data-m-slide]",function(e){e.preventDefault();var i=t(this).attr("data-m-slide"),n=parseInt(i,10);isNaN(n)?p[i]():p.move(n)}),g.on("afterSlide",function(t,e,i){p.$items.eq(e-1).removeClass(p._getClass("active")),p.$items.eq(i-1).addClass(p._getClass("active")),p.$element.find("[data-m-slide='"+e+"']").removeClass(p._getClass("active")),p.$element.find("[data-m-slide='"+i+"']").addClass(p._getClass("active")),_.autoHideArrows&&(1===i?(p.$element.find("[data-m-slide=prev]").addClass(p._getClass("inactive")),p.$element.find("[data-m-slide=next]").removeClass(p._getClass("inactive"))):i===p._length?(p.$element.find("[data-m-slide=next]").addClass(p._getClass("inactive")),p.$element.find("[data-m-slide=prev]").removeClass(p._getClass("inactive"))):(p.$element.find("[data-m-slide=prev]").removeClass(p._getClass("inactive")),p.$element.find("[data-m-slide=next]").removeClass(p._getClass("inactive"))))}),t(window).on("resize orientationchange",function(){w!=t(window).width()&&(p._disableAnimation(),w=t(window).width(),p.update())}),g.trigger("beforeSlide",[1,1]),g.trigger("afterSlide",[1,1]),p.update()},s.prototype.unbind=function(){this.$inner.off()},s.prototype.destroy=function(){this.unbind(),this.$element.trigger("destroy"),this.$element.remove(),this.$element=null,this.$inner=null,this.$start=null,this.$current=null},s.prototype.move=function(e,i){var n=this.$element,s=(this.$inner,this.$items),o=(this.$start,this.$current),a=this._length,r=this._index;i=t.extend({},this.options,i),1>e?e=1:e>this._length&&(e=a),e==this._index,i.animate?this._enableAnimation():this._disableAnimation(),n.trigger("beforeSlide",[r,e]),this.$current=o=s.eq(e-1),this._offsetDrag=0,this._index=e,i.animate?this.update():this.update(function(){this._enableAnimation()}),n.trigger("afterSlide",[r,e])},s.prototype.next=function(){this.move(this._index+1)},s.prototype.prev=function(){this.move(this._index-1)},s}(t,e);t.fn.scooch=function(e,n){var s=t.extend({},t.fn.scooch.defaults);return"object"==typeof e&&(t.extend(s,e,!0),n=null,e=null),n=Array.prototype.slice.apply(arguments),this.each(function(){var o=(t(this),this._scooch);o||(o=new i(this,s)),e&&(o[e].apply(o,n.slice(1)),"destroy"===e&&(o=null)),this._scooch=o}),this},t.fn.scooch.defaults={}});

// check to make sure it is not loaded on mobile device
var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
var ajaxurl = meta.ajaxurl;

var move = {
	onMove: function() {
		move.slideUp();
		move.slideDown();
		move.slideInLeft();
		move.slideInRight();
		move.bubble();
	},
	isOnScreen: function(elem) {
		if(elem.length) {
			var item = jQuery(elem);
			var win = jQuery(window);
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
		}
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
		init.bubbleClose();
		init.SVG();
		init.dropdown();
		init.contactBtn();
		init.count();
		init.scooch();
		init.wizard();
		init.playVideo();
		init.topVideos();
		init.tooltip();
		init.subNav();
		init.mobileBubbles();
		init.checkoutBtn();
	},
	mobileBubbles: function() {
		jQuery('#bubblesMobile .frame').click(function(e){
			e.preventDefault();
			var section = jQuery(this);
			jQuery('#bubblesMobile .frame').removeClass("open");
			setTimeout(
				function(){
					jQuery('html,body').animate({
					   scrollTop: section.offset().top - 94
					}, 250, function(){
						section.addClass("open");
					});
				}, 500
			);			
		});
	},
	subNav: function() {
		var height = jQuery('#pageBanner').outerHeight();
		jQuery(window).scroll(function(){
		    if(jQuery(window).scrollTop() > (height - 50)){
		       jQuery("#Menu").addClass("blue");
		    }
		    else{
		       jQuery("#Menu").removeClass("blue");
		    }
		});
	},
	tooltip: function() {
		jQuery('.bubblenav li.nav').hover(function(){
			var tip = jQuery(this).attr("title");
			jQuery(this).append('<div class="tooltip">'+tip+'</div>');
			setTimeout(
				function(){
					jQuery('.tooltip').addClass("in");
				}, 50
			);
		}, function(){
			jQuery('.tooltip').remove();
		});
	},
	topVideos: function() {
		if(jQuery('body').hasClass("home")) {
			jQuery('#videos .active')[0].play();
			setTimeout(
				function(){
					jQuery('#videos').removeClass("slideIn");
				}, 7500
			);
			setTimeout(
				function(){
					jQuery('#videos .active').removeClass("active").next().addClass("active")[0].play();
					jQuery('#videos').addClass("slideIn");
				}, 8500
			);
			setTimeout(
				function(){
					jQuery('#videos').removeClass("slideIn");
				}, 22500
			);
			setTimeout(
				function(){
					jQuery('#videos .active').removeClass("active").next().addClass("active")[0].play();
					jQuery('#videos').addClass("slideIn");
				}, 23500
			);
			setTimeout(
				function(){
					jQuery('#videos').removeClass("slideIn");
				}, 31500
			);
			setTimeout(
				function(){
					jQuery('#videos .active').removeClass("active").prev().prev().addClass("active");
					init.topVideos();
					jQuery('#videos').addClass("slideIn");
				}, 33000
			);
		}
	},
	playVideo: function() {
		var vid = jQuery('#help video');
    	vid.prop('loop', false);
    	playing = false;
        if (move.isOnScreen(vid)) {
        	vid[0].play();
        	playing = true;
        } else {
        	jQuery(window).scroll(function(){
        		if (move.isOnScreen(vid) && !playing) {
            		vid[0].play();
            		playing = true;
            	}
            });
        }
        jQuery('#video .playwrap').click(function(){
        	jQuery('#video video').attr("controls", "controls");
        	jQuery('#video').addClass("playing");
        	jQuery('#video video')[0].play();
        });
	},
	wizard: function() {
		jQuery('.btn-wizard').click(function(e){
			e.preventDefault();
			jQuery('#checkout').fadeIn();
		});
		jQuery('#checkout .close').click(function() {
			jQuery('#checkout').fadeOut();
		});
	},
	scooch: function() {
		var scooch = jQuery('.m-scooch');
		if(scooch.length) {
        	scooch.scooch();
        }
    },
	count: function() {
		// activate rolling number effect
		var numbers = jQuery('#metrics');
		var eventfired = false;
		if( numbers.length) {
			if(move.isOnScreen(numbers) && eventfired === false) {
				jQuery('.timer').countTo();
				eventfired = true;
			} else {
				jQuery(window).scroll(function(){
					if(move.isOnScreen(numbers) && eventfired === false) {
						jQuery('.timer').countTo();
						eventfired = true;
					}
				});
			}
		}
	},
	dropdown: function() {
		removeClass = false;
		jQuery('.dropdown button').click(function(e){
			e.preventDefault();
			jQuery(".dropdown ul").removeClass('show');
			jQuery(this).next().addClass("show");
			removeClass = false;
		});
		jQuery("html").click(function () {
		    if (removeClass) {
		        jQuery(".dropdown ul").removeClass('show');
		    }
		    removeClass = true;
		});
		jQuery('.dropdown ul li').click(function(e) {
			e.preventDefault();
			var value = jQuery(this).attr("data-value");
			var input = jQuery(this).parent().attr("data-input");
			var button = jQuery(this).parent().prev();
			var text = jQuery(this).text();
			jQuery('#'+input).val(value);
			jQuery('.dropdown ul').removeClass("show");
			jQuery(button).addClass("selected");
			jQuery(button).text(text);
			jQuery(button).append('<i class="fa fa-angle-down"></i>');
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
			var numb = jQuery(this).attr("data-numb");

			item.addClass("open");
			icon.addClass("hide");
			setTimeout(
				function() {
					jQuery('.frame',item).addClass("in");
					jQuery('.bubblenav').addClass("in");
					jQuery('.nav-'+numb).addClass("selected");
				}, 250
			);
		});
	},
	bubbleClose: function() {
		jQuery('.bubblenav li').click(function(e){
			e.preventDefault();

			var numb = jQuery(this).attr("data-numb");
			var tab = jQuery('.bubble-'+numb).parent();

			jQuery('#Menu').hide();

			if(jQuery(this).hasClass("circleClose")) {
				jQuery('html,body').animate({
				   scrollTop: jQuery("#meet").offset().top
				}, 100, function(){
					jQuery('.frame').removeClass("in");
					jQuery('.bubblenav').removeClass("in");
					jQuery('.nav').removeClass("selected");
					setTimeout(
						function() {
							jQuery('#bubbles li').removeClass("open");
						}, 250
					);
					setTimeout(
						function() {
							jQuery('#bubbles li').find("i").removeClass("hide");
						}, 500
					);
					jQuery('#Menu').show();
				});
			} else {
				jQuery('.nav').removeClass("selected");
				jQuery('#bubbles li').removeClass("open");
				tab.addClass("open");
				tab.find("i").addClass("hide");
				setTimeout(
					function() {
						jQuery('.frame').removeClass("in");
						jQuery('.frame',tab).addClass("in");
						jQuery('.nav-'+numb).addClass("selected");
					}, 250
				);
			}
		});
	},
	contactSubmit: function() {
		var Frm = jQuery('#contactfrm');
    	jQuery('<i class="fa fa-spinner fa-spin"></i>').prependTo('.btn-submit');
        jQuery.ajax({
            url: ajaxurl,
            type: Frm.attr('method'),
            data: {
            	firstname: jQuery('#firstname').val(),
            	lastname: jQuery('#lastname').val(),
            	company: jQuery('#company').val(),
            	title: jQuery('#title').val(),
            	emailaddress: jQuery('#emailaddress').val(),
            	interest: jQuery('#interest').val(),
            	message: jQuery('#message').val(),
            	action: 'sendContact'
            },
            dataType: 'html',
            beforeSubmit : function(arr, $form, options) {
	            arr.push( { "name" : "nonce", "value" : meta.nonce });
	        },
            success: function(data) {
            	init.contactResponse(data);
            }
        });
        return false;
	},
	contactResponse: function(response) {
        jQuery('.btn-submit i').remove();
        if (response === "Success") {
        	jQuery('.btn-submit').replaceWith('<button class="btn btn-submit success"><i class="fa fa-check"></i></button>');
            jQuery("input").val("");
            jQuery("textarea").val("");
            jQuery('.dropdown button').html('Area of interest <i class="fa fa-angle-down"></i>');
            setTimeout(
            	function() {
            		jQuery('.btn-submit').replaceWith('<button class="btn btn-submit">Submit</button>');
            	}, 2500
        	);
        }
        if (response === "E") {
         	jQuery('.btn-submit').replaceWith('<button class="btn btn-submit error"><i class="fa fa-ban"></i></button>');
         	setTimeout(
            	function() {
            		jQuery('.btn-submit').replaceWith('<button class="btn btn-submit">Submit</button>');
            	}, 2500
        	);
        }
	},
	contactBtn: function() {
		jQuery('#contactfrm').submit(init.contactSubmit);
	},
	checkoutSubmit: function(frm) {
        jQuery.ajax({
            url: ajaxurl,
            type: frm.attr('method'),
            data: {
            	firstname: jQuery('#firstname').val(),
            	lastname: jQuery('#lastname').val(),
            	emailaddress: jQuery('#emailaddress').val(),
            	token: jQuery('#stripeToken').val(),
            	action: 'charge'
            },
            dataType: 'html',
            beforeSubmit : function(arr, $form, options) {
	            arr.push( { "charge" : "charge_nonce", "value" : meta.charge_nonce });
	        },
            success: function(data) {
            	init.checkoutResponse(data);
            }
        });
        return false;
	},
	checkoutResponse: function(data) {
		jQuery('.btn-submit i').remove();
		if(data === "Success") {
			jQuery('.btn-submit').replaceWith('<button class="btn btn-submit success"><i class="fa fa-check"></i></button>');
            jQuery("input").val("");
            jQuery('.month button').html('Month <i class="fa fa-angle-down"></i>');
            jQuery('.year button').html('Year <i class="fa fa-angle-down"></i>');
            setTimeout(
            	function() {
            		jQuery('.btn-submit').replaceWith('<button class="btn btn-submit">Pay Now</button>');
            	}, 2500
        	);
		} else {
        	jQuery('.btn-submit').replaceWith('<button class="btn btn-submit error"><i class="fa fa-ban"></i></button>');
         	setTimeout(
            	function() {
            		jQuery('.btn-submit').replaceWith('<button class="btn btn-submit">Pay Now</button>');
            	}, 2500
        	);
		}
	},
	stripeResponseHandler: function(status, response) {
		var frm = jQuery('#checkoutFrm');
        if (response.error) {
        	// Show the errors on the form:
		    frm.find('.payment-errors').text(response.error.message);
		    jQuery('.btn-submit').prop('disabled', false); // Re-enable submission
        } else {
			// Get the token ID:
		    var token = response.id;
		    // Insert the token ID into the form so it gets submitted to the server:
		    frm.append(jQuery('<input type="hidden" name="stripeToken" id="stripeToken">').val(token));
		    // Submit the form:
		    init.checkoutSubmit(frm);
        }
	},
	checkoutBtn: function() {
		Stripe.setPublishableKey('pk_test_ByoJucUkS7YYjs6OMlbtlA7x');
		var frm = jQuery('#checkoutFrm');
		frm.submit(
			function(e) {
				jQuery('<i class="fa fa-spinner fa-spin"></i>').prependTo('.btn-submit');
				// Disable the submit button to prevent repeated clicks:
				frm.find('.btn-submit').prop('disabled', true);
				// Request a token from Stripe:
    			Stripe.card.createToken(frm, init.stripeResponseHandler);
    			// Prevent the form from being submitted:
    			return false;
			}
		);
	}
};

jQuery(document).ready(function() {
	move.onMove();
	init.onReady();
});