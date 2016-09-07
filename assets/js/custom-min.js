$(function(){ParallaxScroll.init()});var ParallaxScroll={showLogs:!1,round:1e3,init:function(){return this._log("init"),this._inited?(this._log("Already Inited"),void(this._inited=!0)):(this._requestAnimationFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e,t){window.setTimeout(e,1e3/60)}}(),void this._onScroll(!0))},_inited:!1,_properties:["x","y","z","rotateX","rotateY","rotateZ","scaleX","scaleY","scaleZ","scale"],_requestAnimationFrame:null,_log:function(e){this.showLogs&&console.log("Parallax Scroll / "+e)},_onScroll:function(e){var t=$(document).scrollTop(),n=$(window).height();this._log("onScroll "+t),$("[data-parallax]").each($.proxy(function(i,a){var s=$(a),o=[],r=!1,u=s.data("style");void 0==u&&(u=s.attr("style")||"",s.data("style",u));var l=[s.data("parallax")],c;for(c=2;s.data("parallax"+c);c++)l.push(s.data("parallax-"+c));var d=l.length;for(c=0;d>c;c++){var m=l[c],h=m["from-scroll"];void 0==h&&(h=Math.max(0,$(a).offset().top-n)),h=0|h;var f=m.distance,v=m["to-scroll"];void 0==f&&void 0==v&&(f=n),f=Math.max(0|f,1);var p=m.easing,y=m["easing-return"];if(void 0!=p&&$.easing&&$.easing[p]||(p=null),void 0!=y&&$.easing&&$.easing[y]||(y=p),p){var b=m.duration;void 0==b&&(b=f),b=Math.max(0|b,1);var j=m["duration-return"];void 0==j&&(j=b),f=1;var Q=s.data("current-time");void 0==Q&&(Q=0)}void 0==v&&(v=h+f),v=0|v;var g=m.smoothness;void 0==g&&(g=30),g=0|g,(e||0==g)&&(g=1),g=0|g;var w=t;w=Math.max(w,h),w=Math.min(w,v),p&&(void 0==s.data("sens")&&s.data("sens","back"),w>h&&("back"==s.data("sens")?(Q=1,s.data("sens","go")):Q++),v>w&&("go"==s.data("sens")?(Q=1,s.data("sens","back")):Q++),e&&(Q=b),s.data("current-time",Q)),this._properties.map($.proxy(function(e){var t=0,n=m[e];if(void 0!=n){"scale"==e||"scaleX"==e||"scaleY"==e||"scaleZ"==e?t=1:n=0|n;var i=s.data("_"+e);void 0==i&&(i=t);var a=(n-t)*((w-h)/(v-h))+t,u=i+(a-i)/g;if(p&&Q>0&&b>=Q){var l=t;"back"==s.data("sens")&&(l=n,n=-n,p=y,b=j),u=$.easing[p](null,Q,l,n,b)}u=Math.ceil(u*this.round)/this.round,u==i&&a==n&&(u=n),o[e]||(o[e]=0),o[e]+=u,i!=o[e]&&(s.data("_"+e,o[e]),r=!0)}},this))}if(r){if(void 0!=o.z){var C=m.perspective;void 0==C&&(C=800);var _=s.parent();_.data("style")||_.data("style",_.attr("style")||""),_.attr("style","perspective:"+C+"px; -webkit-perspective:"+C+"px; "+_.data("style"))}void 0==o.scaleX&&(o.scaleX=1),void 0==o.scaleY&&(o.scaleY=1),void 0==o.scaleZ&&(o.scaleZ=1),void 0!=o.scale&&(o.scaleX*=o.scale,o.scaleY*=o.scale,o.scaleZ*=o.scale);var x="translate3d("+(o.x?o.x:0)+"px, "+(o.y?o.y:0)+"px, "+(o.z?o.z:0)+"px)",S="rotateX("+(o.rotateX?o.rotateX:0)+"deg) rotateY("+(o.rotateY?o.rotateY:0)+"deg) rotateZ("+(o.rotateZ?o.rotateZ:0)+"deg)",T="scaleX("+o.scaleX+") scaleY("+o.scaleY+") scaleZ("+o.scaleZ+")",k=x+" "+S+" "+T+";";this._log(k),s.attr("style","transform:"+k+" -webkit-transform:"+k+" "+u)}},this)),window.requestAnimationFrame?window.requestAnimationFrame($.proxy(this._onScroll,this,!1)):this._requestAnimationFrame($.proxy(this._onScroll,this,!1))}};!function($){function e(e,t){return e.toFixed(t.decimals)}$.fn.countTo=function(e){return e=e||{},$(this).each(function(){function t(e){var t=i.formatter.call(o,e,i);r.text(t)}function n(){l+=s,u++,t(l),"function"==typeof i.onUpdate&&i.onUpdate.call(o,l),u>=a&&(r.removeData("countTo"),clearInterval(c.interval),l=i.to,"function"==typeof i.onComplete&&i.onComplete.call(o,l))}var i=$.extend({},$.fn.countTo.defaults,{from:$(this).data("from"),to:$(this).data("to"),speed:$(this).data("speed"),refreshInterval:$(this).data("refresh-interval"),decimals:$(this).data("decimals")},e),a=Math.ceil(i.speed/i.refreshInterval),s=(i.to-i.from)/a,o=this,r=$(this),u=0,l=i.from,c=r.data("countTo")||{};r.data("countTo",c),c.interval&&clearInterval(c.interval),t(l),c.interval=setInterval(n,i.refreshInterval)})},$.fn.countTo.defaults={from:0,to:0,speed:1e3,refreshInterval:100,decimals:0,formatter:e,onUpdate:null,onComplete:null}}(jQuery),!function(e){if("function"==typeof define&&define.amd)define(["$"],e);else{var t=window.Mobify&&window.Mobify.$||window.Zepto||window.jQuery;e(t)}}(function(e){var t=function(e){var t={},n=navigator.userAgent,i=e.support=e.support||{};e.extend(e.support,{touch:"ontouchend"in document}),t.events=i.touch?{down:"touchstart",move:"touchmove",up:"touchend"}:{down:"mousedown",move:"mousemove",up:"mouseup"},t.getCursorPosition=i.touch?function(e){return e=e.originalEvent||e,{x:e.touches[0].clientX,y:e.touches[0].clientY}}:function(e){return{x:e.clientX,y:e.clientY}},t.getProperty=function(e){for(var t=["Webkit","Moz","O","ms",""],n=document.createElement("div").style,i=0;t.length>i;++i)if(void 0!==n[t[i]+e])return t[i]+e},e.extend(i,{transform:!!t.getProperty("Transform"),transform3d:!(!(window.WebKitCSSMatrix&&"m11"in new WebKitCSSMatrix)||/android\s+[1-2]/i.test(n))});var a=t.getProperty("Transform");t.translateX=i.transform3d?function(e,t){"number"==typeof t&&(t+="px"),e.style[a]="translate3d("+t+",0,0)"}:i.transform?function(e,t){"number"==typeof t&&(t+="px"),e.style[a]="translate("+t+",0)"}:function(e,t){"number"==typeof t&&(t+="px"),e.style.left=t};var s=(t.getProperty("Transition"),t.getProperty("TransitionDuration"));return t.setTransitions=function(e,t){e.style[s]=t?"":"0s"},t.requestAnimationFrame=function(){var e=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)},t=function(){e.apply(window,arguments)};return t}(),t}(e),n=function(e,t){var n={dragRadius:10,moveRadius:20,animate:!0,autoHideArrows:!1,classPrefix:"m-",classNames:{outer:"scooch",inner:"scooch-inner",item:"item",center:"center",touch:"has-touch",dragging:"dragging",active:"active",inactive:"inactive",fluid:"fluid"}},i=e.support,a=function(e,t){this.setOptions(t),this.initElements(e),this.initOffsets(),this.initAnimation(),this.bind(),this._updateCallbacks=[]};return a.defaults=n,a.prototype.setOptions=function(t){var i=this.options||e.extend({},n,t);i.classNames=e.extend({},i.classNames,t.classNames||{}),this.options=i},a.prototype.initElements=function(t){this._index=1,this.element=t,this.$element=e(t),this.$inner=this.$element.find("."+this._getClass("inner")),this.$items=this.$inner.children(),this.$start=this.$items.eq(0),this.$sec=this.$items.eq(1),this.$current=this.$items.eq(this._index-1),this._length=this.$items.length,this._alignment=this.$element.hasClass(this._getClass("center"))?.5:0,this._isFluid=this.$element.hasClass(this._getClass("fluid"))},a.prototype.initOffsets=function(){this._offsetDrag=0},a.prototype.initAnimation=function(){this.animating=!1,this.dragging=!1,this._needsUpdate=!1,this._enableAnimation()},a.prototype._getClass=function(e){return this.options.classPrefix+this.options.classNames[e]},a.prototype._enableAnimation=function(){this.animating||(t.setTransitions(this.$inner[0],!0),this.$inner.removeClass(this._getClass("dragging")),this.animating=!0)},a.prototype._disableAnimation=function(){this.animating&&(t.setTransitions(this.$inner[0],!1),this.$inner.addClass(this._getClass("dragging")),this.animating=!1)},a.prototype.refresh=function(){this.$items=this.$inner.children("."+this._getClass("item")),this.$start=this.$items.eq(0),this.$sec=this.$items.eq(1),this._length=this.$items.length,this.update()},a.prototype.update=function(e){if(void 0!==e&&this._updateCallbacks.push(e),!this._needsUpdate){this._needsUpdate=!0;var n=this;t.requestAnimationFrame(function(){n._update(),setTimeout(function(){for(var e=0,t=n._updateCallbacks.length;t>e;e++)n._updateCallbacks[e].call(n);n._updateCallbacks=[]},10)})}},a.prototype._update=function(){if(this._needsUpdate){var e=this.$current,n=this.$start,i=e.prop("offsetLeft")+e.prop("clientWidth")*this._alignment,a=n.prop("offsetLeft")+n.prop("clientWidth")*this._alignment,s=Math.round(-(i-a)+this._offsetDrag);t.translateX(this.$inner[0],s),this._needsUpdate=!1}},a.prototype.bind=function(){function n(e){i.touch||e.preventDefault(),m=!0,h=!1,r=t.getCursorPosition(e),u=0,l=0,c=!1,v._disableAnimation(),$=1==v._index,j=v._index==v._length}function a(e){if(m&&!h){var n=t.getCursorPosition(e),i=v.$element.width();u=r.x-n.x,l=r.y-n.y,c||d(u)>d(l)&&d(u)>f?(c=!0,e.preventDefault(),$&&0>u?u=u*-i/(u-i):j&&u>0&&(u=u*i/(u+i)),v._offsetDrag=-u,v.update()):d(l)>d(u)&&d(l)>f&&(h=!0)}}function s(){m&&(m=!1,v._enableAnimation(),!h&&d(u)>b.moveRadius?u>0?v.next():v.prev():(v._offsetDrag=0,v.update()))}function o(e){c&&e.preventDefault()}var r,u,l,c,d=Math.abs,m=!1,h=!1,f=this.options.dragRadius,v=this,p=this.$element,y=this.$inner,b=this.options,$=!1,j=!1,Q=e(window).width();y.on(t.events.down+".scooch",n).on(t.events.move+".scooch",a).on(t.events.up+".scooch",s).on("click.scooch",o).on("mouseout.scooch",s),p.on("click","[data-m-slide]",function(t){t.preventDefault();var n=e(this).attr("data-m-slide"),i=parseInt(n,10);isNaN(i)?v[n]():v.move(i)}),p.on("afterSlide",function(e,t,n){v.$items.eq(t-1).removeClass(v._getClass("active")),v.$items.eq(n-1).addClass(v._getClass("active")),v.$element.find("[data-m-slide='"+t+"']").removeClass(v._getClass("active")),v.$element.find("[data-m-slide='"+n+"']").addClass(v._getClass("active")),b.autoHideArrows&&(1===n?(v.$element.find("[data-m-slide=prev]").addClass(v._getClass("inactive")),v.$element.find("[data-m-slide=next]").removeClass(v._getClass("inactive"))):n===v._length?(v.$element.find("[data-m-slide=next]").addClass(v._getClass("inactive")),v.$element.find("[data-m-slide=prev]").removeClass(v._getClass("inactive"))):(v.$element.find("[data-m-slide=prev]").removeClass(v._getClass("inactive")),v.$element.find("[data-m-slide=next]").removeClass(v._getClass("inactive"))))}),e(window).on("resize orientationchange",function(){Q!=e(window).width()&&(v._disableAnimation(),Q=e(window).width(),v.update())}),p.trigger("beforeSlide",[1,1]),p.trigger("afterSlide",[1,1]),v.update()},a.prototype.unbind=function(){this.$inner.off()},a.prototype.destroy=function(){this.unbind(),this.$element.trigger("destroy"),this.$element.remove(),this.$element=null,this.$inner=null,this.$start=null,this.$current=null},a.prototype.move=function(t,n){var i=this.$element,a=(this.$inner,this.$items),s=(this.$start,this.$current),o=this._length,r=this._index;n=e.extend({},this.options,n),1>t?t=1:t>this._length&&(t=o),t==this._index,n.animate?this._enableAnimation():this._disableAnimation(),i.trigger("beforeSlide",[r,t]),this.$current=s=a.eq(t-1),this._offsetDrag=0,this._index=t,n.animate?this.update():this.update(function(){this._enableAnimation()}),i.trigger("afterSlide",[r,t])},a.prototype.next=function(){this.move(this._index+1)},a.prototype.prev=function(){this.move(this._index-1)},a}(e,t);e.fn.scooch=function(t,i){var a=e.extend({},e.fn.scooch.defaults);return"object"==typeof t&&(e.extend(a,t,!0),i=null,t=null),i=Array.prototype.slice.apply(arguments),this.each(function(){var s=(e(this),this._scooch);s||(s=new n(this,a)),t&&(s[t].apply(s,i.slice(1)),"destroy"===t&&(s=null)),this._scooch=s}),this},e.fn.scooch.defaults={}});var isMobile=/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent),ajaxurl=meta.ajaxurl,move={onMove:function(){move.slideUp(),move.slideDown(),move.slideInLeft(),move.slideInRight(),move.bubble()},isOnScreen:function(e){if(e.length){var t=jQuery(e),n=jQuery(window),i={top:n.scrollTop(),left:n.scrollLeft()};i.right=i.left+n.width(),i.bottom=i.top+n.height();var a=t.offset();return a.right=a.left+t.outerWidth(),a.bottom=a.top+t.outerHeight(),!(i.right<a.left||i.left>a.right||i.bottom<a.top||i.top>a.bottom)}},slideUp:function(){var e=jQuery('*[data-animation="slideUp"]');e.length>0&&e.each(function(){var e=jQuery(this);move.isOnScreen(e)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(e)&&e.addClass("slideIn")})})},slideDown:function(){var e=jQuery('*[data-animation="slideDown"]');e.length>0&&e.each(function(){var e=jQuery(this);move.isOnScreen(e)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(e)&&e.addClass("slideIn")})})},slideInLeft:function(){var e=jQuery('*[data-animation="slideInLeft"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("slideIn")})})},slideInRight:function(){var e=jQuery('*[data-animation="slideInRight"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("slideIn")})})},bubble:function(){var e=jQuery('*[data-animation="bubble"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("load"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("load")})})}},init={onReady:function(){init.openMenu(),init.bubbleOpen(),init.bubbleClose(),init.SVG(),init.dropdown(),init.contactBtn(),init.count(),init.scooch(),init.wizard(),init.playVideo(),init.topVideos(),init.tooltip(),init.subNav(),init.mobileBubbles(),init.checkoutBtn()},mobileBubbles:function(){jQuery("#bubblesMobile .frame").click(function(e){e.preventDefault();var t=jQuery(this);jQuery("#bubblesMobile .frame").removeClass("open"),setTimeout(function(){jQuery("html,body").animate({scrollTop:t.offset().top-94},250,function(){t.addClass("open")})},500)})},subNav:function(){var e=jQuery("#pageBanner").outerHeight();jQuery(window).scroll(function(){jQuery(window).scrollTop()>e-50?jQuery("#Menu").addClass("blue"):jQuery("#Menu").removeClass("blue")})},tooltip:function(){jQuery(".bubblenav li.nav").hover(function(){var e=jQuery(this).attr("title");jQuery(this).append('<div class="tooltip">'+e+"</div>"),setTimeout(function(){jQuery(".tooltip").addClass("in")},50)},function(){jQuery(".tooltip").remove()})},topVideos:function(){jQuery("body").hasClass("home")&&(jQuery("#videos .active")[0].play(),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},7500),setTimeout(function(){jQuery("#videos .active").removeClass("active").next().addClass("active")[0].play(),jQuery("#videos").addClass("slideIn")},8500),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},22500),setTimeout(function(){jQuery("#videos .active").removeClass("active").next().addClass("active")[0].play(),jQuery("#videos").addClass("slideIn")},23500),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},31500),setTimeout(function(){jQuery("#videos .active").removeClass("active").prev().prev().addClass("active"),init.topVideos(),jQuery("#videos").addClass("slideIn")},33e3))},playVideo:function(){var e=jQuery("#help video");e.prop("loop",!1),playing=!1,move.isOnScreen(e)?(e[0].play(),playing=!0):jQuery(window).scroll(function(){move.isOnScreen(e)&&!playing&&(e[0].play(),playing=!0)}),jQuery("#video .playwrap").click(function(){jQuery("#video video").attr("controls","controls"),jQuery("#video").addClass("playing"),jQuery("#video video")[0].play()})},wizard:function(){jQuery(".btn-wizard").click(function(e){e.preventDefault(),jQuery("#checkout").fadeIn()}),jQuery("#checkout .close").click(function(){jQuery("#checkout").fadeOut()})},scooch:function(){var e=jQuery(".m-scooch");e.length&&e.scooch()},count:function(){var e=jQuery("#metrics"),t=!1;e.length&&(move.isOnScreen(e)&&t===!1?(jQuery(".timer").countTo(),t=!0):jQuery(window).scroll(function(){move.isOnScreen(e)&&t===!1&&(jQuery(".timer").countTo(),t=!0)}))},dropdown:function(){removeClass=!1,jQuery(".dropdown button").click(function(e){e.preventDefault(),jQuery(".dropdown ul").removeClass("show"),jQuery(this).next().addClass("show"),removeClass=!1}),jQuery("html").click(function(){removeClass&&jQuery(".dropdown ul").removeClass("show"),removeClass=!0}),jQuery(".dropdown ul li").click(function(e){e.preventDefault();var t=jQuery(this).attr("data-value"),n=jQuery(this).parent().attr("data-input"),i=jQuery(this).parent().prev(),a=jQuery(this).text();jQuery("#"+n).val(t),jQuery(".dropdown ul").removeClass("show"),jQuery(i).addClass("selected"),jQuery(i).text(a),jQuery(i).append('<i class="fa fa-angle-down"></i>')})},SVG:function(){jQuery("img.svg").each(function(){var e=jQuery(this),t=e.attr("id"),n=e.attr("class"),i=e.attr("src");jQuery.get(i,function(i){var a=jQuery(i).find("svg");"undefined"!=typeof t&&(a=a.attr("id",t)),"undefined"!=typeof n&&(a=a.attr("class",n+" replaced-svg")),a=a.removeAttr("xmlns:a"),e.replaceWith(a)},"xml")})},openMenu:function(){jQuery("#Menu").click(function(){jQuery("header").hasClass("open")?(jQuery("header").removeClass("open"),jQuery(".menu ul li").removeClass("in").dequeue()):(jQuery("header").addClass("open"),jQuery(".menu ul li").each(function(e){jQuery(this).delay(50*e).queue(function(){jQuery(this).addClass("in")})}))}),jQuery(".menu").addClass("outer"),jQuery(".menu ul").addClass("inner")},bubbleOpen:function(){jQuery(".bubblewrap").click(function(e){e.preventDefault();var t=jQuery(this).parent(),n=t.find("i"),i=jQuery(this).attr("data-numb");t.addClass("open"),n.addClass("hide"),setTimeout(function(){jQuery(".frame",t).addClass("in"),jQuery(".bubblenav").addClass("in"),jQuery(".nav-"+i).addClass("selected")},250)})},bubbleClose:function(){jQuery(".bubblenav li").click(function(e){e.preventDefault();var t=jQuery(this).attr("data-numb"),n=jQuery(".bubble-"+t).parent();jQuery("#Menu").hide(),jQuery(this).hasClass("circleClose")?jQuery("html,body").animate({scrollTop:jQuery("#meet").offset().top},100,function(){jQuery(".frame").removeClass("in"),jQuery(".bubblenav").removeClass("in"),jQuery(".nav").removeClass("selected"),setTimeout(function(){jQuery("#bubbles li").removeClass("open")},250),setTimeout(function(){jQuery("#bubbles li").find("i").removeClass("hide")},500),jQuery("#Menu").show()}):(jQuery(".nav").removeClass("selected"),jQuery("#bubbles li").removeClass("open"),n.addClass("open"),n.find("i").addClass("hide"),setTimeout(function(){jQuery(".frame").removeClass("in"),jQuery(".frame",n).addClass("in"),jQuery(".nav-"+t).addClass("selected")},250))})},contactSubmit:function(){var e=jQuery("#contactfrm");return jQuery('<i class="fa fa-spinner fa-spin"></i>').prependTo(".btn-submit"),jQuery.ajax({url:ajaxurl,type:e.attr("method"),data:{firstname:jQuery("#firstname").val(),lastname:jQuery("#lastname").val(),company:jQuery("#company").val(),title:jQuery("#title").val(),emailaddress:jQuery("#emailaddress").val(),interest:jQuery("#interest").val(),message:jQuery("#message").val(),action:"sendContact"},dataType:"html",beforeSubmit:function(e,t,n){e.push({name:"nonce",value:meta.nonce})},success:function(e){init.contactResponse(e)}}),!1},contactResponse:function(e){jQuery(".btn-submit i").remove(),"Success"===e&&(jQuery(".btn-submit").replaceWith('<button class="btn btn-submit success"><i class="fa fa-check"></i></button>'),jQuery("input").val(""),jQuery("textarea").val(""),jQuery(".dropdown button").html('Area of interest <i class="fa fa-angle-down"></i>'),setTimeout(function(){jQuery(".btn-submit").replaceWith('<button class="btn btn-submit">Submit</button>')},2500)),"E"===e&&(jQuery(".btn-submit").replaceWith('<button class="btn btn-submit error"><i class="fa fa-ban"></i></button>'),setTimeout(function(){jQuery(".btn-submit").replaceWith('<button class="btn btn-submit">Submit</button>')},2500))},contactBtn:function(){jQuery("#contactfrm").submit(init.contactSubmit)},checkoutSubmit:function(){var e=jQuery("#contactfrm");return jQuery('<i class="fa fa-spinner fa-spin"></i>').prependTo(".btn-submit"),jQuery.ajax({url:ajaxurl,type:e.attr("method"),data:{firstname:jQuery("#name").val(),firstname:jQuery("#card").val(),lastname:jQuery("#expire_month").val(),company:jQuery("#expire_year").val(),title:jQuery("#cvc").val(),emailaddress:jQuery("#emailaddress").val(),action:"charge"},dataType:"html",beforeSubmit:function(e,t,n){e.push({name:"nonce",value:meta.nonce})},success:function(e){init.checkoutResponse(e)}}),!1},checkoutResponse:function(e){jQuery(".btn-submit i").remove(),"Success"===e&&(jQuery(".btn-submit").replaceWith('<button class="btn btn-submit success"><i class="fa fa-check"></i></button>'),jQuery("input").val(""),jQuery(".month button").html('Month <i class="fa fa-angle-down"></i>'),jQuery(".year button").html('Year <i class="fa fa-angle-down"></i>'),setTimeout(function(){jQuery(".btn-submit").replaceWith('<button class="btn btn-submit">Submit</button>')},2500)),"E"===e&&(jQuery(".btn-submit").replaceWith('<button class="btn btn-submit error"><i class="fa fa-ban"></i></button>'),setTimeout(function(){jQuery(".btn-submit").replaceWith('<button class="btn btn-submit">Submit</button>')},2500))},checkoutBtn:function(){jQuery("#checkoutFrm").submit(init.checkoutSubmit)}};jQuery(document).ready(function(){move.onMove(),init.onReady()});