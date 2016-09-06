$(function(){ParallaxScroll.init()});var ParallaxScroll={showLogs:!1,round:1e3,init:function(){return this._log("init"),this._inited?(this._log("Already Inited"),void(this._inited=!0)):(this._requestAnimationFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e,t){window.setTimeout(e,1e3/60)}}(),void this._onScroll(!0))},_inited:!1,_properties:["x","y","z","rotateX","rotateY","rotateZ","scaleX","scaleY","scaleZ","scale"],_requestAnimationFrame:null,_log:function(e){this.showLogs&&console.log("Parallax Scroll / "+e)},_onScroll:function(e){var t=$(document).scrollTop(),n=$(window).height();this._log("onScroll "+t),$("[data-parallax]").each($.proxy(function(i,s){var a=$(s),o=[],r=!1,l=a.data("style");void 0==l&&(l=a.attr("style")||"",a.data("style",l));var u=[a.data("parallax")],d;for(d=2;a.data("parallax"+d);d++)u.push(a.data("parallax-"+d));var c=u.length;for(d=0;c>d;d++){var m=u[d],f=m["from-scroll"];void 0==f&&(f=Math.max(0,$(s).offset().top-n)),f=0|f;var h=m.distance,v=m["to-scroll"];void 0==h&&void 0==v&&(h=n),h=Math.max(0|h,1);var p=m.easing,y=m["easing-return"];if(void 0!=p&&$.easing&&$.easing[p]||(p=null),void 0!=y&&$.easing&&$.easing[y]||(y=p),p){var b=m.duration;void 0==b&&(b=h),b=Math.max(0|b,1);var g=m["duration-return"];void 0==g&&(g=b),h=1;var j=a.data("current-time");void 0==j&&(j=0)}void 0==v&&(v=f+h),v=0|v;var Q=m.smoothness;void 0==Q&&(Q=30),Q=0|Q,(e||0==Q)&&(Q=1),Q=0|Q;var w=t;w=Math.max(w,f),w=Math.min(w,v),p&&(void 0==a.data("sens")&&a.data("sens","back"),w>f&&("back"==a.data("sens")?(j=1,a.data("sens","go")):j++),v>w&&("go"==a.data("sens")?(j=1,a.data("sens","back")):j++),e&&(j=b),a.data("current-time",j)),this._properties.map($.proxy(function(e){var t=0,n=m[e];if(void 0!=n){"scale"==e||"scaleX"==e||"scaleY"==e||"scaleZ"==e?t=1:n=0|n;var i=a.data("_"+e);void 0==i&&(i=t);var s=(n-t)*((w-f)/(v-f))+t,l=i+(s-i)/Q;if(p&&j>0&&b>=j){var u=t;"back"==a.data("sens")&&(u=n,n=-n,p=y,b=g),l=$.easing[p](null,j,u,n,b)}l=Math.ceil(l*this.round)/this.round,l==i&&s==n&&(l=n),o[e]||(o[e]=0),o[e]+=l,i!=o[e]&&(a.data("_"+e,o[e]),r=!0)}},this))}if(r){if(void 0!=o.z){var C=m.perspective;void 0==C&&(C=800);var _=a.parent();_.data("style")||_.data("style",_.attr("style")||""),_.attr("style","perspective:"+C+"px; -webkit-perspective:"+C+"px; "+_.data("style"))}void 0==o.scaleX&&(o.scaleX=1),void 0==o.scaleY&&(o.scaleY=1),void 0==o.scaleZ&&(o.scaleZ=1),void 0!=o.scale&&(o.scaleX*=o.scale,o.scaleY*=o.scale,o.scaleZ*=o.scale);var x="translate3d("+(o.x?o.x:0)+"px, "+(o.y?o.y:0)+"px, "+(o.z?o.z:0)+"px)",S="rotateX("+(o.rotateX?o.rotateX:0)+"deg) rotateY("+(o.rotateY?o.rotateY:0)+"deg) rotateZ("+(o.rotateZ?o.rotateZ:0)+"deg)",T="scaleX("+o.scaleX+") scaleY("+o.scaleY+") scaleZ("+o.scaleZ+")",A=x+" "+S+" "+T+";";this._log(A),a.attr("style","transform:"+A+" -webkit-transform:"+A+" "+l)}},this)),window.requestAnimationFrame?window.requestAnimationFrame($.proxy(this._onScroll,this,!1)):this._requestAnimationFrame($.proxy(this._onScroll,this,!1))}};!function($){function e(e,t){return e.toFixed(t.decimals)}$.fn.countTo=function(e){return e=e||{},$(this).each(function(){function t(e){var t=i.formatter.call(o,e,i);r.text(t)}function n(){u+=a,l++,t(u),"function"==typeof i.onUpdate&&i.onUpdate.call(o,u),l>=s&&(r.removeData("countTo"),clearInterval(d.interval),u=i.to,"function"==typeof i.onComplete&&i.onComplete.call(o,u))}var i=$.extend({},$.fn.countTo.defaults,{from:$(this).data("from"),to:$(this).data("to"),speed:$(this).data("speed"),refreshInterval:$(this).data("refresh-interval"),decimals:$(this).data("decimals")},e),s=Math.ceil(i.speed/i.refreshInterval),a=(i.to-i.from)/s,o=this,r=$(this),l=0,u=i.from,d=r.data("countTo")||{};r.data("countTo",d),d.interval&&clearInterval(d.interval),t(u),d.interval=setInterval(n,i.refreshInterval)})},$.fn.countTo.defaults={from:0,to:0,speed:1e3,refreshInterval:100,decimals:0,formatter:e,onUpdate:null,onComplete:null}}(jQuery),!function(e){if("function"==typeof define&&define.amd)define(["$"],e);else{var t=window.Mobify&&window.Mobify.$||window.Zepto||window.jQuery;e(t)}}(function(e){var t=function(e){var t={},n=navigator.userAgent,i=e.support=e.support||{};e.extend(e.support,{touch:"ontouchend"in document}),t.events=i.touch?{down:"touchstart",move:"touchmove",up:"touchend"}:{down:"mousedown",move:"mousemove",up:"mouseup"},t.getCursorPosition=i.touch?function(e){return e=e.originalEvent||e,{x:e.touches[0].clientX,y:e.touches[0].clientY}}:function(e){return{x:e.clientX,y:e.clientY}},t.getProperty=function(e){for(var t=["Webkit","Moz","O","ms",""],n=document.createElement("div").style,i=0;t.length>i;++i)if(void 0!==n[t[i]+e])return t[i]+e},e.extend(i,{transform:!!t.getProperty("Transform"),transform3d:!(!(window.WebKitCSSMatrix&&"m11"in new WebKitCSSMatrix)||/android\s+[1-2]/i.test(n))});var s=t.getProperty("Transform");t.translateX=i.transform3d?function(e,t){"number"==typeof t&&(t+="px"),e.style[s]="translate3d("+t+",0,0)"}:i.transform?function(e,t){"number"==typeof t&&(t+="px"),e.style[s]="translate("+t+",0)"}:function(e,t){"number"==typeof t&&(t+="px"),e.style.left=t};var a=(t.getProperty("Transition"),t.getProperty("TransitionDuration"));return t.setTransitions=function(e,t){e.style[a]=t?"":"0s"},t.requestAnimationFrame=function(){var e=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)},t=function(){e.apply(window,arguments)};return t}(),t}(e),n=function(e,t){var n={dragRadius:10,moveRadius:20,animate:!0,autoHideArrows:!1,classPrefix:"m-",classNames:{outer:"scooch",inner:"scooch-inner",item:"item",center:"center",touch:"has-touch",dragging:"dragging",active:"active",inactive:"inactive",fluid:"fluid"}},i=e.support,s=function(e,t){this.setOptions(t),this.initElements(e),this.initOffsets(),this.initAnimation(),this.bind(),this._updateCallbacks=[]};return s.defaults=n,s.prototype.setOptions=function(t){var i=this.options||e.extend({},n,t);i.classNames=e.extend({},i.classNames,t.classNames||{}),this.options=i},s.prototype.initElements=function(t){this._index=1,this.element=t,this.$element=e(t),this.$inner=this.$element.find("."+this._getClass("inner")),this.$items=this.$inner.children(),this.$start=this.$items.eq(0),this.$sec=this.$items.eq(1),this.$current=this.$items.eq(this._index-1),this._length=this.$items.length,this._alignment=this.$element.hasClass(this._getClass("center"))?.5:0,this._isFluid=this.$element.hasClass(this._getClass("fluid"))},s.prototype.initOffsets=function(){this._offsetDrag=0},s.prototype.initAnimation=function(){this.animating=!1,this.dragging=!1,this._needsUpdate=!1,this._enableAnimation()},s.prototype._getClass=function(e){return this.options.classPrefix+this.options.classNames[e]},s.prototype._enableAnimation=function(){this.animating||(t.setTransitions(this.$inner[0],!0),this.$inner.removeClass(this._getClass("dragging")),this.animating=!0)},s.prototype._disableAnimation=function(){this.animating&&(t.setTransitions(this.$inner[0],!1),this.$inner.addClass(this._getClass("dragging")),this.animating=!1)},s.prototype.refresh=function(){this.$items=this.$inner.children("."+this._getClass("item")),this.$start=this.$items.eq(0),this.$sec=this.$items.eq(1),this._length=this.$items.length,this.update()},s.prototype.update=function(e){if(void 0!==e&&this._updateCallbacks.push(e),!this._needsUpdate){this._needsUpdate=!0;var n=this;t.requestAnimationFrame(function(){n._update(),setTimeout(function(){for(var e=0,t=n._updateCallbacks.length;t>e;e++)n._updateCallbacks[e].call(n);n._updateCallbacks=[]},10)})}},s.prototype._update=function(){if(this._needsUpdate){var e=this.$current,n=this.$start,i=e.prop("offsetLeft")+e.prop("clientWidth")*this._alignment,s=n.prop("offsetLeft")+n.prop("clientWidth")*this._alignment,a=Math.round(-(i-s)+this._offsetDrag);t.translateX(this.$inner[0],a),this._needsUpdate=!1}},s.prototype.bind=function(){function n(e){i.touch||e.preventDefault(),m=!0,f=!1,r=t.getCursorPosition(e),l=0,u=0,d=!1,v._disableAnimation(),$=1==v._index,g=v._index==v._length}function s(e){if(m&&!f){var n=t.getCursorPosition(e),i=v.$element.width();l=r.x-n.x,u=r.y-n.y,d||c(l)>c(u)&&c(l)>h?(d=!0,e.preventDefault(),$&&0>l?l=l*-i/(l-i):g&&l>0&&(l=l*i/(l+i)),v._offsetDrag=-l,v.update()):c(u)>c(l)&&c(u)>h&&(f=!0)}}function a(){m&&(m=!1,v._enableAnimation(),!f&&c(l)>b.moveRadius?l>0?v.next():v.prev():(v._offsetDrag=0,v.update()))}function o(e){d&&e.preventDefault()}var r,l,u,d,c=Math.abs,m=!1,f=!1,h=this.options.dragRadius,v=this,p=this.$element,y=this.$inner,b=this.options,$=!1,g=!1,j=e(window).width();y.on(t.events.down+".scooch",n).on(t.events.move+".scooch",s).on(t.events.up+".scooch",a).on("click.scooch",o).on("mouseout.scooch",a),p.on("click","[data-m-slide]",function(t){t.preventDefault();var n=e(this).attr("data-m-slide"),i=parseInt(n,10);isNaN(i)?v[n]():v.move(i)}),p.on("afterSlide",function(e,t,n){v.$items.eq(t-1).removeClass(v._getClass("active")),v.$items.eq(n-1).addClass(v._getClass("active")),v.$element.find("[data-m-slide='"+t+"']").removeClass(v._getClass("active")),v.$element.find("[data-m-slide='"+n+"']").addClass(v._getClass("active")),b.autoHideArrows&&(1===n?(v.$element.find("[data-m-slide=prev]").addClass(v._getClass("inactive")),v.$element.find("[data-m-slide=next]").removeClass(v._getClass("inactive"))):n===v._length?(v.$element.find("[data-m-slide=next]").addClass(v._getClass("inactive")),v.$element.find("[data-m-slide=prev]").removeClass(v._getClass("inactive"))):(v.$element.find("[data-m-slide=prev]").removeClass(v._getClass("inactive")),v.$element.find("[data-m-slide=next]").removeClass(v._getClass("inactive"))))}),e(window).on("resize orientationchange",function(){j!=e(window).width()&&(v._disableAnimation(),j=e(window).width(),v.update())}),p.trigger("beforeSlide",[1,1]),p.trigger("afterSlide",[1,1]),v.update()},s.prototype.unbind=function(){this.$inner.off()},s.prototype.destroy=function(){this.unbind(),this.$element.trigger("destroy"),this.$element.remove(),this.$element=null,this.$inner=null,this.$start=null,this.$current=null},s.prototype.move=function(t,n){var i=this.$element,s=(this.$inner,this.$items),a=(this.$start,this.$current),o=this._length,r=this._index;n=e.extend({},this.options,n),1>t?t=1:t>this._length&&(t=o),t==this._index,n.animate?this._enableAnimation():this._disableAnimation(),i.trigger("beforeSlide",[r,t]),this.$current=a=s.eq(t-1),this._offsetDrag=0,this._index=t,n.animate?this.update():this.update(function(){this._enableAnimation()}),i.trigger("afterSlide",[r,t])},s.prototype.next=function(){this.move(this._index+1)},s.prototype.prev=function(){this.move(this._index-1)},s}(e,t);e.fn.scooch=function(t,i){var s=e.extend({},e.fn.scooch.defaults);return"object"==typeof t&&(e.extend(s,t,!0),i=null,t=null),i=Array.prototype.slice.apply(arguments),this.each(function(){var a=(e(this),this._scooch);a||(a=new n(this,s)),t&&(a[t].apply(a,i.slice(1)),"destroy"===t&&(a=null)),this._scooch=a}),this},e.fn.scooch.defaults={}});var isMobile=/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent),ajaxurl=meta.ajaxurl,move={onMove:function(){move.slideUp(),move.slideDown(),move.slideInLeft(),move.slideInRight(),move.bubble()},isOnScreen:function(e){if(e.length){var t=jQuery(e),n=jQuery(window),i={top:n.scrollTop(),left:n.scrollLeft()};i.right=i.left+n.width(),i.bottom=i.top+n.height();var s=t.offset();return s.right=s.left+t.outerWidth(),s.bottom=s.top+t.outerHeight(),!(i.right<s.left||i.left>s.right||i.bottom<s.top||i.top>s.bottom)}},slideUp:function(){var e=jQuery('*[data-animation="slideUp"]');e.length>0&&e.each(function(){var e=jQuery(this);move.isOnScreen(e)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(e)&&e.addClass("slideIn")})})},slideDown:function(){var e=jQuery('*[data-animation="slideDown"]');e.length>0&&e.each(function(){var e=jQuery(this);move.isOnScreen(e)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(e)&&e.addClass("slideIn")})})},slideInLeft:function(){var e=jQuery('*[data-animation="slideInLeft"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("slideIn")})})},slideInRight:function(){var e=jQuery('*[data-animation="slideInRight"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("slideIn")})})},bubble:function(){var e=jQuery('*[data-animation="bubble"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("load"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("load")})})}},init={onReady:function(){init.openMenu(),init.bubbleOpen(),init.bubbleClose(),init.SVG(),init.dropdown(),init.contactBtn(),init.count(),init.scooch(),init.wizard(),init.playVideo(),init.topVideos(),init.tooltip(),init.subNav(),init.mobileBubbles()},mobileBubbles:function(){jQuery("#bubblesMobile .frame").click(function(e){e.preventDefault();var t=jQuery(this);jQuery("#bubblesMobile .frame").removeClass("open"),setTimeout(function(){jQuery("html,body").animate({scrollTop:t.offset().top-94},250,function(){t.addClass("open")})},500)})},subNav:function(){var e=jQuery("#pageBanner").outerHeight();jQuery(window).scroll(function(){jQuery(window).scrollTop()>e-50?jQuery("#Menu").addClass("blue"):jQuery("#Menu").removeClass("blue")})},tooltip:function(){jQuery(".bubblenav li.nav").hover(function(){var e=jQuery(this).attr("title");jQuery(this).append('<div class="tooltip">'+e+"</div>"),setTimeout(function(){jQuery(".tooltip").addClass("in")},50)},function(){jQuery(".tooltip").remove()})},topVideos:function(){jQuery("body").hasClass("home")&&(jQuery("#videos .active")[0].play(),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},7500),setTimeout(function(){jQuery("#videos .active").removeClass("active").next().addClass("active")[0].play(),jQuery("#videos").addClass("slideIn")},8500),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},22500),setTimeout(function(){jQuery("#videos .active").removeClass("active").next().addClass("active")[0].play(),jQuery("#videos").addClass("slideIn")},23500),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},31500),setTimeout(function(){jQuery("#videos .active").removeClass("active").prev().prev().addClass("active"),init.topVideos(),jQuery("#videos").addClass("slideIn")},33e3))},playVideo:function(){var e=jQuery("#help video");e.prop("loop",!1),playing=!1,move.isOnScreen(e)?(e[0].play(),playing=!0):jQuery(window).scroll(function(){move.isOnScreen(e)&&!playing&&(e[0].play(),playing=!0)}),jQuery("#video .playwrap").click(function(){jQuery("#video video").attr("controls","controls"),jQuery("#video").addClass("playing"),jQuery("#video video")[0].play()})},wizard:function(){jQuery(".btn-wizard").click(function(e){e.preventDefault(),jQuery("#signUp").fadeIn()}),jQuery("#signUp .close").click(function(){jQuery("#signUp").fadeOut()})},scooch:function(){var e=jQuery(".m-scooch");e.length&&e.scooch()},count:function(){var e=jQuery("#metrics"),t=!1;e.length&&(move.isOnScreen(e)&&t===!1?(jQuery(".timer").countTo(),t=!0):jQuery(window).scroll(function(){move.isOnScreen(e)&&t===!1&&(jQuery(".timer").countTo(),t=!0)}))},dropdown:function(){removeClass=!1,jQuery("#dropdown button").click(function(e){e.preventDefault(),jQuery("#dropdown ul").addClass("show"),removeClass=!1}),jQuery("html").click(function(){removeClass&&jQuery("#dropdown ul").removeClass("show"),removeClass=!0}),jQuery("#dropdown ul li").click(function(e){e.preventDefault();var t=jQuery(this).attr("data-value"),n=jQuery(this).text();jQuery("#interest").val(t),jQuery("#dropdown ul").removeClass("show"),jQuery("#dropdown button").addClass("selected"),jQuery("#dropdown button").text(n),jQuery("#dropdown button").append('<i class="fa fa-angle-down"></i>')})},SVG:function(){jQuery("img.svg").each(function(){var e=jQuery(this),t=e.attr("id"),n=e.attr("class"),i=e.attr("src");jQuery.get(i,function(i){var s=jQuery(i).find("svg");"undefined"!=typeof t&&(s=s.attr("id",t)),"undefined"!=typeof n&&(s=s.attr("class",n+" replaced-svg")),s=s.removeAttr("xmlns:a"),e.replaceWith(s)},"xml")})},openMenu:function(){jQuery("#Menu").click(function(){jQuery("header").hasClass("open")?(jQuery("header").removeClass("open"),jQuery(".menu ul li").removeClass("in").dequeue()):(jQuery("header").addClass("open"),jQuery(".menu ul li").each(function(e){jQuery(this).delay(50*e).queue(function(){jQuery(this).addClass("in")})}))}),jQuery(".menu").addClass("outer"),jQuery(".menu ul").addClass("inner")},bubbleOpen:function(){jQuery(".bubblewrap").click(function(e){e.preventDefault();var t=jQuery(this).parent(),n=t.find("i"),i=jQuery(this).attr("data-numb");t.addClass("open"),n.addClass("hide"),setTimeout(function(){jQuery(".frame",t).addClass("in"),jQuery(".bubblenav").addClass("in"),jQuery(".nav-"+i).addClass("selected")},250)})},bubbleClose:function(){jQuery(".bubblenav li").click(function(e){e.preventDefault();var t=jQuery(this).attr("data-numb"),n=jQuery(".bubble-"+t).parent();jQuery("#Menu").hide(),jQuery(this).hasClass("circleClose")?jQuery("html,body").animate({scrollTop:jQuery("#meet").offset().top},100,function(){jQuery(".frame").removeClass("in"),jQuery(".bubblenav").removeClass("in"),jQuery(".nav").removeClass("selected"),setTimeout(function(){jQuery("#bubbles li").removeClass("open")},250),setTimeout(function(){jQuery("#bubbles li").find("i").removeClass("hide")},500),jQuery("#Menu").show()}):(jQuery(".nav").removeClass("selected"),jQuery("#bubbles li").removeClass("open"),n.addClass("open"),n.find("i").addClass("hide"),setTimeout(function(){jQuery(".frame").removeClass("in"),jQuery(".frame",n).addClass("in"),jQuery(".nav-"+t).addClass("selected")},250))})},contactSubmit:function(){var e=jQuery("#contactfrm");return jQuery('<i class="fa fa-spinner fa-spin"></i>').prependTo(".btn-submit"),jQuery.ajax({url:ajaxurl,type:e.attr("method"),data:{firstname:jQuery("#firstname").val(),lastname:jQuery("#lastname").val(),company:jQuery("#company").val(),title:jQuery("#title").val(),emailaddress:jQuery("#emailaddress").val(),interest:jQuery("#interest").val(),message:jQuery("#message").val(),action:"sendContact"},dataType:"html",beforeSubmit:function(e,t,n){e.push({name:"nonce",value:meta.nonce})},success:function(e){init.contactResponse(e)}}),!1},contactResponse:function(e){jQuery(".btn-submit i").remove(),"Success"===e&&(jQuery(".btn-submit").replaceWith('<button class="btn btn-submit success"><i class="fa fa-check"></i></button>'),jQuery("input").val(""),jQuery("textarea").val(""),jQuery(".dropdown button").html('Area of interest <i class="fa fa-angle-down"></i>'),setTimeout(function(){jQuery(".btn-submit").replaceWith('<button class="btn btn-submit">Submit</button>')},2500)),"E"===e&&(jQuery(".btn-submit").replaceWith('<button class="btn btn-submit error"><i class="fa fa-ban"></i></button>'),setTimeout(function(){jQuery(".btn-submit").replaceWith('<button class="btn btn-submit">Submit</button>')},2500))},contactBtn:function(){jQuery("#contactfrm").submit(init.contactSubmit)}};jQuery(document).ready(function(){move.onMove(),init.onReady()});