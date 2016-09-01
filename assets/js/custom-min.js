$(function(){ParallaxScroll.init()});var ParallaxScroll={showLogs:!1,round:1e3,init:function(){return this._log("init"),this._inited?(this._log("Already Inited"),void(this._inited=!0)):(this._requestAnimationFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e,t){window.setTimeout(e,1e3/60)}}(),void this._onScroll(!0))},_inited:!1,_properties:["x","y","z","rotateX","rotateY","rotateZ","scaleX","scaleY","scaleZ","scale"],_requestAnimationFrame:null,_log:function(e){this.showLogs&&console.log("Parallax Scroll / "+e)},_onScroll:function(e){var t=$(document).scrollTop(),n=$(window).height();this._log("onScroll "+t),$("[data-parallax]").each($.proxy(function(i,s){var o=$(s),a=[],r=!1,l=o.data("style");void 0==l&&(l=o.attr("style")||"",o.data("style",l));var u=[o.data("parallax")],d;for(d=2;o.data("parallax"+d);d++)u.push(o.data("parallax-"+d));var c=u.length;for(d=0;c>d;d++){var m=u[d],h=m["from-scroll"];void 0==h&&(h=Math.max(0,$(s).offset().top-n)),h=0|h;var f=m.distance,p=m["to-scroll"];void 0==f&&void 0==p&&(f=n),f=Math.max(0|f,1);var v=m.easing,y=m["easing-return"];if(void 0!=v&&$.easing&&$.easing[v]||(v=null),void 0!=y&&$.easing&&$.easing[y]||(y=v),v){var g=m.duration;void 0==g&&(g=f),g=Math.max(0|g,1);var b=m["duration-return"];void 0==b&&(b=g),f=1;var w=o.data("current-time");void 0==w&&(w=0)}void 0==p&&(p=h+f),p=0|p;var j=m.smoothness;void 0==j&&(j=30),j=0|j,(e||0==j)&&(j=1),j=0|j;var Q=t;Q=Math.max(Q,h),Q=Math.min(Q,p),v&&(void 0==o.data("sens")&&o.data("sens","back"),Q>h&&("back"==o.data("sens")?(w=1,o.data("sens","go")):w++),p>Q&&("go"==o.data("sens")?(w=1,o.data("sens","back")):w++),e&&(w=g),o.data("current-time",w)),this._properties.map($.proxy(function(e){var t=0,n=m[e];if(void 0!=n){"scale"==e||"scaleX"==e||"scaleY"==e||"scaleZ"==e?t=1:n=0|n;var i=o.data("_"+e);void 0==i&&(i=t);var s=(n-t)*((Q-h)/(p-h))+t,l=i+(s-i)/j;if(v&&w>0&&g>=w){var u=t;"back"==o.data("sens")&&(u=n,n=-n,v=y,g=b),l=$.easing[v](null,w,u,n,g)}l=Math.ceil(l*this.round)/this.round,l==i&&s==n&&(l=n),a[e]||(a[e]=0),a[e]+=l,i!=a[e]&&(o.data("_"+e,a[e]),r=!0)}},this))}if(r){if(void 0!=a.z){var C=m.perspective;void 0==C&&(C=800);var _=o.parent();_.data("style")||_.data("style",_.attr("style")||""),_.attr("style","perspective:"+C+"px; -webkit-perspective:"+C+"px; "+_.data("style"))}void 0==a.scaleX&&(a.scaleX=1),void 0==a.scaleY&&(a.scaleY=1),void 0==a.scaleZ&&(a.scaleZ=1),void 0!=a.scale&&(a.scaleX*=a.scale,a.scaleY*=a.scale,a.scaleZ*=a.scale);var x="translate3d("+(a.x?a.x:0)+"px, "+(a.y?a.y:0)+"px, "+(a.z?a.z:0)+"px)",S="rotateX("+(a.rotateX?a.rotateX:0)+"deg) rotateY("+(a.rotateY?a.rotateY:0)+"deg) rotateZ("+(a.rotateZ?a.rotateZ:0)+"deg)",T="scaleX("+a.scaleX+") scaleY("+a.scaleY+") scaleZ("+a.scaleZ+")",A=x+" "+S+" "+T+";";this._log(A),o.attr("style","transform:"+A+" -webkit-transform:"+A+" "+l)}},this)),window.requestAnimationFrame?window.requestAnimationFrame($.proxy(this._onScroll,this,!1)):this._requestAnimationFrame($.proxy(this._onScroll,this,!1))}};!function($){function e(e,t){return e.toFixed(t.decimals)}$.fn.countTo=function(e){return e=e||{},$(this).each(function(){function t(e){var t=i.formatter.call(a,e,i);r.text(t)}function n(){u+=o,l++,t(u),"function"==typeof i.onUpdate&&i.onUpdate.call(a,u),l>=s&&(r.removeData("countTo"),clearInterval(d.interval),u=i.to,"function"==typeof i.onComplete&&i.onComplete.call(a,u))}var i=$.extend({},$.fn.countTo.defaults,{from:$(this).data("from"),to:$(this).data("to"),speed:$(this).data("speed"),refreshInterval:$(this).data("refresh-interval"),decimals:$(this).data("decimals")},e),s=Math.ceil(i.speed/i.refreshInterval),o=(i.to-i.from)/s,a=this,r=$(this),l=0,u=i.from,d=r.data("countTo")||{};r.data("countTo",d),d.interval&&clearInterval(d.interval),t(u),d.interval=setInterval(n,i.refreshInterval)})},$.fn.countTo.defaults={from:0,to:0,speed:1e3,refreshInterval:100,decimals:0,formatter:e,onUpdate:null,onComplete:null}}(jQuery),!function(e){if("function"==typeof define&&define.amd)define(["$"],e);else{var t=window.Mobify&&window.Mobify.$||window.Zepto||window.jQuery;e(t)}}(function(e){var t=function(e){var t={},n=navigator.userAgent,i=e.support=e.support||{};e.extend(e.support,{touch:"ontouchend"in document}),t.events=i.touch?{down:"touchstart",move:"touchmove",up:"touchend"}:{down:"mousedown",move:"mousemove",up:"mouseup"},t.getCursorPosition=i.touch?function(e){return e=e.originalEvent||e,{x:e.touches[0].clientX,y:e.touches[0].clientY}}:function(e){return{x:e.clientX,y:e.clientY}},t.getProperty=function(e){for(var t=["Webkit","Moz","O","ms",""],n=document.createElement("div").style,i=0;t.length>i;++i)if(void 0!==n[t[i]+e])return t[i]+e},e.extend(i,{transform:!!t.getProperty("Transform"),transform3d:!(!(window.WebKitCSSMatrix&&"m11"in new WebKitCSSMatrix)||/android\s+[1-2]/i.test(n))});var s=t.getProperty("Transform");t.translateX=i.transform3d?function(e,t){"number"==typeof t&&(t+="px"),e.style[s]="translate3d("+t+",0,0)"}:i.transform?function(e,t){"number"==typeof t&&(t+="px"),e.style[s]="translate("+t+",0)"}:function(e,t){"number"==typeof t&&(t+="px"),e.style.left=t};var o=(t.getProperty("Transition"),t.getProperty("TransitionDuration"));return t.setTransitions=function(e,t){e.style[o]=t?"":"0s"},t.requestAnimationFrame=function(){var e=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)},t=function(){e.apply(window,arguments)};return t}(),t}(e),n=function(e,t){var n={dragRadius:10,moveRadius:20,animate:!0,autoHideArrows:!1,classPrefix:"m-",classNames:{outer:"scooch",inner:"scooch-inner",item:"item",center:"center",touch:"has-touch",dragging:"dragging",active:"active",inactive:"inactive",fluid:"fluid"}},i=e.support,s=function(e,t){this.setOptions(t),this.initElements(e),this.initOffsets(),this.initAnimation(),this.bind(),this._updateCallbacks=[]};return s.defaults=n,s.prototype.setOptions=function(t){var i=this.options||e.extend({},n,t);i.classNames=e.extend({},i.classNames,t.classNames||{}),this.options=i},s.prototype.initElements=function(t){this._index=1,this.element=t,this.$element=e(t),this.$inner=this.$element.find("."+this._getClass("inner")),this.$items=this.$inner.children(),this.$start=this.$items.eq(0),this.$sec=this.$items.eq(1),this.$current=this.$items.eq(this._index-1),this._length=this.$items.length,this._alignment=this.$element.hasClass(this._getClass("center"))?.5:0,this._isFluid=this.$element.hasClass(this._getClass("fluid"))},s.prototype.initOffsets=function(){this._offsetDrag=0},s.prototype.initAnimation=function(){this.animating=!1,this.dragging=!1,this._needsUpdate=!1,this._enableAnimation()},s.prototype._getClass=function(e){return this.options.classPrefix+this.options.classNames[e]},s.prototype._enableAnimation=function(){this.animating||(t.setTransitions(this.$inner[0],!0),this.$inner.removeClass(this._getClass("dragging")),this.animating=!0)},s.prototype._disableAnimation=function(){this.animating&&(t.setTransitions(this.$inner[0],!1),this.$inner.addClass(this._getClass("dragging")),this.animating=!1)},s.prototype.refresh=function(){this.$items=this.$inner.children("."+this._getClass("item")),this.$start=this.$items.eq(0),this.$sec=this.$items.eq(1),this._length=this.$items.length,this.update()},s.prototype.update=function(e){if(void 0!==e&&this._updateCallbacks.push(e),!this._needsUpdate){this._needsUpdate=!0;var n=this;t.requestAnimationFrame(function(){n._update(),setTimeout(function(){for(var e=0,t=n._updateCallbacks.length;t>e;e++)n._updateCallbacks[e].call(n);n._updateCallbacks=[]},10)})}},s.prototype._update=function(){if(this._needsUpdate){var e=this.$current,n=this.$start,i=e.prop("offsetLeft")+e.prop("clientWidth")*this._alignment,s=n.prop("offsetLeft")+n.prop("clientWidth")*this._alignment,o=Math.round(-(i-s)+this._offsetDrag);t.translateX(this.$inner[0],o),this._needsUpdate=!1}},s.prototype.bind=function(){function n(e){i.touch||e.preventDefault(),m=!0,h=!1,r=t.getCursorPosition(e),l=0,u=0,d=!1,p._disableAnimation(),$=1==p._index,b=p._index==p._length}function s(e){if(m&&!h){var n=t.getCursorPosition(e),i=p.$element.width();l=r.x-n.x,u=r.y-n.y,d||c(l)>c(u)&&c(l)>f?(d=!0,e.preventDefault(),$&&0>l?l=l*-i/(l-i):b&&l>0&&(l=l*i/(l+i)),p._offsetDrag=-l,p.update()):c(u)>c(l)&&c(u)>f&&(h=!0)}}function o(){m&&(m=!1,p._enableAnimation(),!h&&c(l)>g.moveRadius?l>0?p.next():p.prev():(p._offsetDrag=0,p.update()))}function a(e){d&&e.preventDefault()}var r,l,u,d,c=Math.abs,m=!1,h=!1,f=this.options.dragRadius,p=this,v=this.$element,y=this.$inner,g=this.options,$=!1,b=!1,w=e(window).width();y.on(t.events.down+".scooch",n).on(t.events.move+".scooch",s).on(t.events.up+".scooch",o).on("click.scooch",a).on("mouseout.scooch",o),v.on("click","[data-m-slide]",function(t){t.preventDefault();var n=e(this).attr("data-m-slide"),i=parseInt(n,10);isNaN(i)?p[n]():p.move(i)}),v.on("afterSlide",function(e,t,n){p.$items.eq(t-1).removeClass(p._getClass("active")),p.$items.eq(n-1).addClass(p._getClass("active")),p.$element.find("[data-m-slide='"+t+"']").removeClass(p._getClass("active")),p.$element.find("[data-m-slide='"+n+"']").addClass(p._getClass("active")),g.autoHideArrows&&(1===n?(p.$element.find("[data-m-slide=prev]").addClass(p._getClass("inactive")),p.$element.find("[data-m-slide=next]").removeClass(p._getClass("inactive"))):n===p._length?(p.$element.find("[data-m-slide=next]").addClass(p._getClass("inactive")),p.$element.find("[data-m-slide=prev]").removeClass(p._getClass("inactive"))):(p.$element.find("[data-m-slide=prev]").removeClass(p._getClass("inactive")),p.$element.find("[data-m-slide=next]").removeClass(p._getClass("inactive"))))}),e(window).on("resize orientationchange",function(){w!=e(window).width()&&(p._disableAnimation(),w=e(window).width(),p.update())}),v.trigger("beforeSlide",[1,1]),v.trigger("afterSlide",[1,1]),p.update()},s.prototype.unbind=function(){this.$inner.off()},s.prototype.destroy=function(){this.unbind(),this.$element.trigger("destroy"),this.$element.remove(),this.$element=null,this.$inner=null,this.$start=null,this.$current=null},s.prototype.move=function(t,n){var i=this.$element,s=(this.$inner,this.$items),o=(this.$start,this.$current),a=this._length,r=this._index;n=e.extend({},this.options,n),1>t?t=1:t>this._length&&(t=a),t==this._index,n.animate?this._enableAnimation():this._disableAnimation(),i.trigger("beforeSlide",[r,t]),this.$current=o=s.eq(t-1),this._offsetDrag=0,this._index=t,n.animate?this.update():this.update(function(){this._enableAnimation()}),i.trigger("afterSlide",[r,t])},s.prototype.next=function(){this.move(this._index+1)},s.prototype.prev=function(){this.move(this._index-1)},s}(e,t);e.fn.scooch=function(t,i){var s=e.extend({},e.fn.scooch.defaults);return"object"==typeof t&&(e.extend(s,t,!0),i=null,t=null),i=Array.prototype.slice.apply(arguments),this.each(function(){var o=(e(this),this._scooch);o||(o=new n(this,s)),t&&(o[t].apply(o,i.slice(1)),"destroy"===t&&(o=null)),this._scooch=o}),this},e.fn.scooch.defaults={}});var isMobile=/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent),move={onMove:function(){move.slideUp(),move.slideDown(),move.slideInLeft(),move.slideInRight(),move.bubble()},isOnScreen:function(e){if(e.length){var t=jQuery(e),n=jQuery(window),i={top:n.scrollTop(),left:n.scrollLeft()};i.right=i.left+n.width(),i.bottom=i.top+n.height();var s=t.offset();return s.right=s.left+t.outerWidth(),s.bottom=s.top+t.outerHeight(),!(i.right<s.left||i.left>s.right||i.bottom<s.top||i.top>s.bottom)}},slideUp:function(){var e=jQuery('*[data-animation="slideUp"]');e.length>0&&e.each(function(){var e=jQuery(this);move.isOnScreen(e)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(e)&&e.addClass("slideIn")})})},slideDown:function(){var e=jQuery('*[data-animation="slideDown"]');e.length>0&&e.each(function(){var e=jQuery(this);move.isOnScreen(e)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(e)&&e.addClass("slideIn")})})},slideInLeft:function(){var e=jQuery('*[data-animation="slideInLeft"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("slideIn")})})},slideInRight:function(){var e=jQuery('*[data-animation="slideInRight"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("slideIn"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("slideIn")})})},bubble:function(){var e=jQuery('*[data-animation="bubble"]');e.length>0&&e.each(function(){var e=jQuery(this),t=jQuery(this).parent();move.isOnScreen(t)?e.addClass("load"):jQuery(window).scroll(function(){move.isOnScreen(t)&&e.addClass("load")})})}},init={onReady:function(){init.openMenu(),init.bubbleOpen(),init.bubbleClose(),init.SVG(),init.dropdown(),init.contactBtn(),init.count(),init.scooch(),init.wizard(),init.playVideo(),init.topVideos(),init.tooltip()},tooltip:function(){jQuery(".bubblenav li.nav").hover(function(){var e=jQuery(this).attr("title");jQuery(this).append('<div class="tooltip">'+e+"</div>"),setTimeout(function(){jQuery(".tooltip").addClass("in")},50)},function(){jQuery(".tooltip").remove()})},topVideos:function(){jQuery("#videos .active")[0].play(),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},9e3),setTimeout(function(){jQuery("#videos .active").removeClass("active").next().addClass("active")[0].play(),jQuery("#videos").addClass("slideIn")},9500),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},22e3),setTimeout(function(){jQuery("#videos .active").removeClass("active").next().addClass("active")[0].play(),jQuery("#videos").addClass("slideIn")},22500),setTimeout(function(){jQuery("#videos").removeClass("slideIn")},29e3),setTimeout(function(){jQuery("#videos .active").removeClass("active").prev().prev().addClass("active"),jQuery("#videos").addClass("slideIn"),init.topVideos()},29500)},playVideo:function(){var e=jQuery("#help video");e.prop("loop",!1),move.isOnScreen(e)?(e[0].play(),move.onMove()):jQuery(window).scroll(function(){move.isOnScreen(e)&&(e[0].play(),jQuery(window).off("scroll"),move.onMove())}),jQuery("#video .playwrap").click(function(){jQuery("#video video").attr("controls","controls"),jQuery("#video").addClass("playing"),jQuery("#video video")[0].play()})},wizard:function(){jQuery(".btn-wizard").click(function(e){e.preventDefault(),jQuery("#signUp").fadeIn()}),jQuery("#signUp .close").click(function(){jQuery("#signUp").fadeOut()})},scooch:function(){var e=jQuery(".m-scooch");e.length&&e.scooch()},count:function(){var e=jQuery("#metrics"),t=!1;e.length&&(move.isOnScreen(e)&&t===!1?(console.log("on screen"),jQuery(".timer").countTo(),t=!0):jQuery(window).scroll(function(){move.isOnScreen(e)&&t===!1&&(console.log("trigger"),jQuery(".timer").countTo(),t=!0,jQuery(window).off("scroll"))}))},dropdown:function(){jQuery("#dropdown button").click(function(e){e.preventDefault(),jQuery("#dropdown ul").addClass("show"),removeClass=!1}),jQuery("html").click(function(){removeClass&&jQuery("#dropdown ul").removeClass("show"),removeClass=!0}),jQuery("#dropdown ul li").click(function(e){e.preventDefault();var t=jQuery(this).attr("data-value"),n=jQuery(this).text();jQuery("#interest").val(t),jQuery("#dropdown ul").removeClass("show"),jQuery("#dropdown button").addClass("selected"),jQuery("#dropdown button").text(n),jQuery("#dropdown button").append('<i class="fa fa-angle-down"></i>')})},SVG:function(){jQuery("img.svg").each(function(){var e=jQuery(this),t=e.attr("id"),n=e.attr("class"),i=e.attr("src");jQuery.get(i,function(i){var s=jQuery(i).find("svg");"undefined"!=typeof t&&(s=s.attr("id",t)),"undefined"!=typeof n&&(s=s.attr("class",n+" replaced-svg")),s=s.removeAttr("xmlns:a"),e.replaceWith(s)},"xml")})},openMenu:function(){jQuery("#Menu").click(function(){jQuery("header").hasClass("open")?(jQuery("header").removeClass("open"),jQuery(".menu ul li").removeClass("in").dequeue()):(jQuery("header").addClass("open"),jQuery(".menu ul li").each(function(e){jQuery(this).delay(50*e).queue(function(){jQuery(this).addClass("in")})}))}),jQuery(".menu").addClass("outer"),jQuery(".menu ul").addClass("inner")},bubbleOpen:function(){jQuery(".bubblewrap").click(function(e){e.preventDefault();var t=jQuery(this).parent(),n=t.find("i");t.addClass("open"),n.addClass("hide"),setTimeout(function(){jQuery(".frame",t).addClass("in")},250)})},bubbleClose:function(){jQuery(".bubblenav li").click(function(e){e.preventDefault();var t=jQuery(this).attr("data-numb"),n=jQuery(".bubble-"+t).parent(),i=jQuery(this).parent().parent().parent();jQuery("#Menu").hide(),jQuery(this).hasClass("circleClose")?jQuery("html,body").animate({scrollTop:jQuery("#meet").offset().top},function(){jQuery(".frame").removeClass("in"),setTimeout(function(){i.removeClass("open")},500),setTimeout(function(){i.find("i").removeClass("hide")},750),jQuery("#Menu").show()}):(i.removeClass("open"),n.addClass("open"),n.find("i").addClass("hide"),setTimeout(function(){jQuery(".frame").removeClass("in"),jQuery(".frame",n).addClass("in")},250),setTimeout(function(){i.find("i").removeClass("hide")},500))})},contactSubmit:function(){var e=jQuery("#contactfrm");jQuery('<i class="fa fa-spinner fa-spin"></i>').prependTo(".btn-submit"),jQuery.ajax({url:ajaxurl,type:e.attr("method"),data:{action:"sendContact"},dataType:"html",success:function(){init.contactResponse()}})},contactResponse:function(e){jQuery(".btn-submit i").remove(),"Success"===e&&(jQuery(".btn-submit").replaceWith('<button class="btn btn-submit success"><i class="fa fa-check"></i></button>'),jQuery("input").val(""),jQuery("textarea").val(""),setTimeout(function(){jQuery(".btn-submit").replaceWith('<button class="btn btn-submit">Submit</button>')},2500)),"E"===e&&(jQuery(".btn-submit").replaceWith('<button class="btn btn-submit error"><i class="fa fa-ban"></i></button>'),setTimeout(function(){jQuery(".btn-submit").replaceWith('<button class="btn btn-submit">Submit</button>')},2500))},contactBtn:function(){jQuery("#contactfrm").submit(init.contactSubmit)}};jQuery(document).ready(function(){move.onMove(),init.onReady()});