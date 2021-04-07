!function(t){"object"==typeof module&&"object"==typeof module.exports?module.exports=t(require("jquery"),window,document):t(jQuery,window,document)}(function(t,e,s,i){function n(e,s){var i=this;return this.settings=s,this.elems={},this.element=e,this._cssClasses=["chocolat-open","chocolat-mobile","chocolat-in-container","chocolat-cover","chocolat-zoomable","chocolat-zoomed"],!this.settings.setTitle&&e.data("chocolat-title")&&(this.settings.setTitle=e.data("chocolat-title")),this.element.find(this.settings.imageSelector).each(function(){i.settings.images.push({title:t(this).attr("title"),src:t(this).attr(i.settings.imageSource),height:!1,width:!1})}),this.element.find(this.settings.imageSelector).each(function(e){t(this).off("click.chocolat").on("click.chocolat",function(t){i.init(e),t.preventDefault()})}),this}var o=0;t.extend(n.prototype,{init:function(t){return this.settings.initialized||(this.setDomContainer(),this.markup(),this.events(),this.settings.lastImage=this.settings.images.length-1,this.settings.initialized=!0),this.settings.afterInitialize.call(this),this.load(t)},preload:function(e){var s=t.Deferred();if(void 0!==this.settings.images[e]){var i=new Image;return i.onload=function(){s.resolve(i)},i.src=this.settings.images[e].src,s}},load:function(e){var s=this;if(this.settings.fullScreen&&this.openFullScreen(),this.settings.currentImage!==e){this.elems.overlay.fadeIn(this.settings.duration),this.settings.timer=setTimeout(function(){void 0!==s.elems&&t.proxy(s.elems.loader.fadeIn(),s)},this.settings.duration);var i=this.preload(e).then(function(t){return s.place(e,t)}).then(function(t){return s.appear(e)}).then(function(t){s.zoomable(),s.settings.afterImageLoad.call(s)}),n=e+1;return void 0!==this.settings.images[n]&&this.preload(n),i}},place:function(t,e){var s,i=this;return this.settings.currentImage=t,this.description(),this.pagination(),this.arrows(),this.storeImgSize(e,t),s=this.fit(t,i.elems.wrapper),this.center(s.width,s.height,s.left,s.top,0)},center:function(t,e,s,i,n){return this.elems.content.css("overflow","visible").animate({width:t,height:e,left:s,top:i},n).promise()},appear:function(t){var e=this;clearTimeout(this.settings.timer),this.elems.loader.stop().fadeOut(300,function(){e.elems.img.attr("src",e.settings.images[t].src)})},fit:function(e,s){var i,n,o=this.settings.images[e].height,a=this.settings.images[e].width,l=t(s).height(),r=t(s).width(),c=this.getOutMarginH(),h=r-this.getOutMarginW(),m=l-c,g=m/h,u=l/r,p=o/a;return"cover"==this.settings.imageSize?p<u?n=(i=l)/p:i=(n=r)*p:"native"==this.settings.imageSize?(i=o,n=a):(p>g?n=(i=m)/p:i=(n=h)*p,"default"===this.settings.imageSize&&(n>=a||i>=o)&&(n=a,i=o)),{height:i,width:n,top:(l-i)/2,left:(r-n)/2}},change:function(t){this.zoomOut(0),this.zoomable();var e=this.settings.currentImage+parseInt(t);if(e>this.settings.lastImage){if(this.settings.loop)return this.load(0)}else{if(!(e<0))return this.load(e);if(this.settings.loop)return this.load(this.settings.lastImage)}},arrows:function(){this.settings.loop?t([this.elems.left[0],this.elems.right[0]]).addClass("active"):this.settings.linkImages?(this.settings.currentImage==this.settings.lastImage?this.elems.right.removeClass("active"):this.elems.right.addClass("active"),0===this.settings.currentImage?this.elems.left.removeClass("active"):this.elems.left.addClass("active")):t([this.elems.left[0],this.elems.right[0]]).removeClass("active")},description:function(){var t=this;this.elems.description.html(t.settings.images[t.settings.currentImage].title)},pagination:function(){var t=this,e=this.settings.lastImage+1,s=this.settings.currentImage+1;this.elems.pagination.html(s+" "+t.settings.separator2+e)},storeImgSize:function(t,e){void 0!==t&&(this.settings.images[e].height&&this.settings.images[e].width||(this.settings.images[e].height=t.height,this.settings.images[e].width=t.width))},close:function(){if(!this.settings.fullscreenOpen){var e=[this.elems.overlay[0],this.elems.loader[0],this.elems.wrapper[0]],s=this,i=t.when(t(e).fadeOut(200)).done(function(){s.elems.domContainer.removeClass(s._cssClasses.join(" "))});return this.settings.currentImage=!1,this.settings.initialized=!1,i}this.exitFullScreen()},destroy:function(){this.element.removeData(),this.element.find(this.settings.imageSelector).off("click.chocolat"),this.settings.initialized&&(this.settings.fullscreenOpen&&this.exitFullScreen(),this.settings.currentImage=!1,this.settings.initialized=!1,this.elems.domContainer.removeClass(this._cssClasses.join(" ")),this.elems.wrapper.remove())},getOutMarginW:function(){return this.elems.left.outerWidth(!0)+this.elems.right.outerWidth(!0)},getOutMarginH:function(){return this.elems.top.outerHeight(!0)+this.elems.bottom.outerHeight(!0)},markup:function(){this.elems.domContainer.addClass("chocolat-open "+this.settings.className),"cover"==this.settings.imageSize&&this.elems.domContainer.addClass("chocolat-cover"),this.settings.container!==e&&this.elems.domContainer.addClass("chocolat-in-container"),this.elems.wrapper=t("<div/>",{class:"chocolat-wrapper",id:"chocolat-content-"+this.settings.setIndex}).appendTo(this.elems.domContainer),this.elems.overlay=t("<div/>",{class:"chocolat-overlay"}).appendTo(this.elems.wrapper),this.elems.loader=t("<div/>",{class:"chocolat-loader"}).appendTo(this.elems.wrapper),this.elems.content=t("<div/>",{class:"chocolat-content"}).appendTo(this.elems.wrapper),this.elems.img=t("<img/>",{class:"chocolat-img",src:""}).appendTo(this.elems.content),this.elems.top=t("<div/>",{class:"chocolat-top"}).appendTo(this.elems.wrapper),this.elems.left=t("<div/>",{class:"chocolat-left"}).appendTo(this.elems.wrapper),this.elems.right=t("<div/>",{class:"chocolat-right"}).appendTo(this.elems.wrapper),this.elems.bottom=t("<div/>",{class:"chocolat-bottom"}).appendTo(this.elems.wrapper),this.elems.close=t("<span/>",{class:"chocolat-close"}).appendTo(this.elems.top),this.elems.fullscreen=t("<span/>",{class:"chocolat-fullscreen"}).appendTo(this.elems.bottom),this.elems.description=t("<span/>",{class:"chocolat-description"}).appendTo(this.elems.bottom),this.elems.pagination=t("<span/>",{class:"chocolat-pagination"}).appendTo(this.elems.bottom),this.elems.setTitle=t("<span/>",{class:"chocolat-set-title",html:this.settings.setTitle}).appendTo(this.elems.bottom),this.settings.afterMarkup.call(this)},openFullScreen:function(){var t=this.elems.wrapper[0];t.requestFullscreen?(this.settings.fullscreenOpen=!0,t.requestFullscreen()):t.mozRequestFullScreen?(this.settings.fullscreenOpen=!0,t.mozRequestFullScreen()):t.webkitRequestFullscreen?(this.settings.fullscreenOpen=!0,t.webkitRequestFullscreen()):t.msRequestFullscreen?(t.msRequestFullscreen(),this.settings.fullscreenOpen=!0):this.settings.fullscreenOpen=!1},exitFullScreen:function(){s.exitFullscreen?(s.exitFullscreen(),this.settings.fullscreenOpen=!1):s.mozCancelFullScreen?(s.mozCancelFullScreen(),this.settings.fullscreenOpen=!1):s.webkitExitFullscreen?(s.webkitExitFullscreen(),this.settings.fullscreenOpen=!1):this.settings.fullscreenOpen=!0},events:function(){var i=this;t(s).off("keydown.chocolat").on("keydown.chocolat",function(t){i.settings.initialized&&(37==t.keyCode?i.change(-1):39==t.keyCode?i.change(1):27==t.keyCode&&i.close())}),this.elems.wrapper.find(".chocolat-right").off("click.chocolat").on("click.chocolat",function(){i.change(1)}),this.elems.wrapper.find(".chocolat-left").off("click.chocolat").on("click.chocolat",function(){return i.change(-1)}),t([this.elems.overlay[0],this.elems.close[0]]).off("click.chocolat").on("click.chocolat",function(){return i.close()}),this.elems.fullscreen.off("click.chocolat").on("click.chocolat",function(){i.settings.fullscreenOpen?i.exitFullScreen():i.openFullScreen()}),i.settings.backgroundClose&&this.elems.overlay.off("click.chocolat").on("click.chocolat",function(){return i.close()}),this.elems.wrapper.find(".chocolat-img").off("click.chocolat").on("click.chocolat",function(t){return null===i.settings.initialZoomState&&i.elems.domContainer.hasClass("chocolat-zoomable")?i.zoomIn(t):i.zoomOut(t)}),this.elems.wrapper.mousemove(function(e){if(null!==i.settings.initialZoomState&&!i.elems.img.is(":animated")){var s=t(this).offset(),n=t(this).height(),o=t(this).width(),a=i.settings.images[i.settings.currentImage],l=a.width,r=a.height,c=[e.pageX-o/2-s.left,e.pageY-n/2-s.top],h=0;l>o&&(h=c[0]/(o/2),h*=(l-o+0)/2);var m=0;r>n&&(m=c[1]/(n/2),m*=(r-n+0)/2);var g={"margin-left":-h+"px","margin-top":-m+"px"};void 0!==e.duration?t(i.elems.img).stop(!1,!0).animate(g,e.duration):t(i.elems.img).stop(!1,!0).css(g)}}),t(e).on("resize",function(){i.settings.initialized&&i.debounce(50,function(){var t=i.fit(i.settings.currentImage,i.elems.wrapper);i.center(t.width,t.height,t.left,t.top,0),i.zoomable()})})},zoomable:function(){var t=this.settings.images[this.settings.currentImage],e=this.elems.wrapper.width(),s=this.elems.wrapper.height(),i=!(!this.settings.enableZoom||!(t.width>e||t.height>s)),n=this.elems.img.width()>t.width||this.elems.img.height()>t.height;i&&!n?this.elems.domContainer.addClass("chocolat-zoomable"):this.elems.domContainer.removeClass("chocolat-zoomable")},zoomIn:function(e){this.settings.initialZoomState=this.settings.imageSize,this.settings.imageSize="native";var s=t.Event("mousemove");s.pageX=e.pageX,s.pageY=e.pageY,s.duration=this.settings.duration,this.elems.wrapper.trigger(s),this.elems.domContainer.addClass("chocolat-zoomed");var i=this.fit(this.settings.currentImage,this.elems.wrapper);return this.center(i.width,i.height,i.left,i.top,this.settings.duration)},zoomOut:function(t,e){if(null!==this.settings.initialZoomState){e=e||this.settings.duration,this.settings.imageSize=this.settings.initialZoomState,this.settings.initialZoomState=null,this.elems.img.animate({margin:0},e),this.elems.domContainer.removeClass("chocolat-zoomed");var s=this.fit(this.settings.currentImage,this.elems.wrapper);return this.center(s.width,s.height,s.left,s.top,e)}},setDomContainer:function(){this.settings.container===e?this.elems.domContainer=t("body"):this.elems.domContainer=t(this.settings.container)},debounce:function(t,e){clearTimeout(this.settings.timerDebounce),this.settings.timerDebounce=setTimeout(function(){e()},t)},api:function(){var t=this;return{open:function(e){return e=parseInt(e)||0,t.init(e)},close:function(){return t.close()},next:function(){return t.change(1)},prev:function(){return t.change(-1)},goto:function(e){return t.open(e)},current:function(){return t.settings.currentImage},place:function(){return t.place(t.settings.currentImage,t.settings.duration)},destroy:function(){return t.destroy()},set:function(e,s){return t.settings[e]=s,s},get:function(e){return t.settings[e]},getElem:function(e){return t.elems[e]}}}});var a={container:e,imageSelector:".chocolat-image",className:"",imageSize:"default",initialZoomState:null,fullScreen:!1,loop:!1,linkImages:!0,duration:300,setTitle:"",separator2:"/",setIndex:0,firstImage:0,lastImage:!1,currentImage:!1,initialized:!1,timer:!1,timerDebounce:!1,images:[],enableZoom:!0,imageSource:"href",afterInitialize:function(){},afterMarkup:function(){},afterImageLoad:function(){}};t.fn.Chocolat=function(e){return this.each(function(){o++;var s=t.extend(!0,{},a,e,{setIndex:o});t.data(this,"chocolat")||t.data(this,"chocolat",new n(t(this),s))})}});