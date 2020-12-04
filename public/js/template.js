"use strict";function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}function _createClass(e,t,n){return t&&_defineProperties(e.prototype,t),n&&_defineProperties(e,n),e}!function(a){var s=a.fn.sggbisCard=function(e){return s.elements=this,s.mobileMode=!1,s._apply(),s._checkMobile(),this};s._checkMobile=function(){a(document).width()<768?s.mobileMode=!0:s.mobileMode=!1},s._apply=function(){return null!=this.elements&&this.elements.each(function(e){var t=!0;if(a(this).hasClass("newsLatest")&&s.mobileMode&&(t=!1),t&&a(this).keepRatio(),a(this).innerHeight())var n=a(this).innerWidth()/a(this).innerHeight();if(1.9<n?a(this).addClass("wide"):a(this).removeClass("wide"),!a(this).hasClass("dce")&&a(this).hasClass("wide")&&a(this).children(".cardContent").hasClass("haveVisuel")){var i=a(this).find(".title").html();a(this).find(".taxoLabel").html(i),a(this).find(".taxoLabel").find(".fa").remove()}a(this).innerWidth()<290&&!s.mobileMode?a(this).addClass("smallCard"):a(this).removeClass("smallCard"),s._appear(a(this),250*(e+1)),a(this).addClass("cardDone"),a(this).find(".movingLine").SGMovingLine()}),this},s._appear=function(e,t){setTimeout(function(){e.hasClass(".cardVisible")||(e.addClass("cardVisible"),e.hasClass("dce")||e.hasClass("pictoCard")||e.hasClass("twitterCards")||e.hasClass("edito")||e.hasClass("esaliaGreenBlock")||e.hasClass("card-rte")||e.find(".cardContentTxt").dotdotdot({watch:!1}))},t)},a(window).bind("load",function(e){}),a(window).bind("resize orientationchange",function(e){s._checkMobile(),s._apply()})}(jQuery),function(s){var o=s.fn.keepRatio=function(e){return o.elements=this,o.mobileMode=!1,o.ModernizrCssremunit=!1,o._checkMobile(),o._initModernizr(),o._apply(),this};o._initModernizr=function(){o.ModernizrCssremunit=Modernizr.cssremunit},o._checkMobile=function(){s(document).width()<768?o.mobileMode=!0:o.mobileMode=!1},o._apply=function(){return null!=this.elements&&this.elements.each(function(){var e=s(this).data("dimratio");if(o.mobileMode&&null!=s(this).data("dimratiomobile")&&(e=s(this).data("dimratiomobile"),"0"==s(this).data("dimratiomobile")&&(e=void 0)),null!=e){var t=e.split("-"),n=t[0]/t[1],i=30*(t[0]-1),a=(s(this).innerWidth()-i)/n+30*(t[1]-1);s(this).hasClass("homePageCarrousel")&&(a+=30),isZoomed()&&(a+=10),o.ModernizrCssremunit?s(this).css("height",a/10+"rem"):s(this).css("height",a)}}),this},s(window).bind("load",function(e){}),s(window).bind("resize orientationchange",function(e){o._apply(),o._checkMobile()})}(jQuery),function(o){o.fn.cardWallFilters=function(e){var s=o.extend({},o.fn.cardWallFilters.defaults,e);return this.each(function(){console.debug("cardWallFilters");var a=o(this);function t(){var e=a.find(".moreResult"),t=e.data("page");e.data("page",t+1),e.addClass("loading"),i({"tx_bisgsummary_pi2[page]":t,"tx_bisgsummary_pi2[text]":a.find("#filterText").val(),"tx_bisgsummary_pi2[itemType]":a.find("#filterTypeDoc").val(),"tx_bisgsummary_pi2[tags]":a.find("#filterTag").val(),"tx_bisgsummary_pi2[category]":a.find("#filterCategory").val(),"tx_bisgsummary_pi2[year]":a.find("#filterYear").val(),"tx_bisgsummary_pi2[sorting]":a.find("#sentenceSorting").val()},!1,!0)}function n(){i({"tx_bisgsummary_pi2[text]":a.find("#filterText").val(),"tx_bisgsummary_pi2[itemType]":a.find("#filterTypeDoc").val(),"tx_bisgsummary_pi2[tags]":a.find("#filterTag").val(),"tx_bisgsummary_pi2[category]":a.find("#filterCategory").val(),"tx_bisgsummary_pi2[year]":a.find("#filterYear").val(),"tx_bisgsummary_pi2[sorting]":a.find("#sentenceSorting").val()})}function i(e,t,n){if(o(window).data("cardInfiniteScrollReady",!1),a.addClass("loading"),null==n&&(n=!1),n&&(e["tx_bisgsummary_pi2[removeWrapperToListing]"]=!0),null==t){var i=a.find(".summaryWallAjax");e["tx_bisgsummary_pi2[refreshFilter]"]=!0}else{if(a.hasClass("wallCard--insights"))i=a.find(".wallInsights");else i=a.find(".resultsContainer .wallCardItems");e["tx_bisgsummary_pi2[removeWrapperToListing]"]=!0}e.no_cache=!0,e["tx_bisgsummary_pi2[ajaxCall]"]=!0,e["tx_bisgsummary_pi2[ajaxMethod]"]="refreshResults",e["tx_bisgsummary_pi2[forceConf]"]=s.forceConf,e["tx_bisgsummary_pi2[idContent]"]=s.idContent,o.ajax({type:"POST",data:e,url:s.currentPageLink,dataType:"html",success:function(e){if(n)if(a.hasClass("wallCard--isotope")){var t=o(e);a.find(".wallCardItems").append(t).isotope("appended",t)}else a.hasClass("wallCard--insights")?a.find(".summaryWallAjax .wallInsights__item").last().after(e):a.find(".summaryWallAjax .wallCardRow_card").last().after(e);else a.find(".moreResult").data("page",2),i.html(e),a.hasClass("wallCard--insights")?scrollToItem(a.find(".summaryFilters")):a.hasClass("wallCard--isotope")&&a.find(".wallCardItems").isotope("destroy").isotope({layoutMode:"packery",itemSelector:".card",percentPosition:!0,packery:{columnWidth:".grid-sizer"}});a.find(".card:not(.cardDone)").sggbisCard(),a.cardWall(),a.find(".summaryWallAjax").find(".card").size()<s.nbTotalResults?a.find(".moreResult").show():a.find(".moreResult").hide(),a.find(".moreResult").removeClass("loading"),a.removeClass("loading"),o(window).data("cardInfiniteScrollReady",!0)}})}a.find(".summaryFilters select").change(function(e){n()}),a.find("#filterTextSubmit").click(function(){a.find("#filterTextSubmit").hasClass("disabled")||n()}),a.find(".resetFilter").click(function(){o(this).prev().val(0),n()}),s.infiniteScroll&&(o(window).data("cardInfiniteScrollReady",!0),o(window).scroll(function(){var e=a.find(".moreResult");0!=o(window).data("cardInfiniteScrollReady")&&verge.inViewport(e)&&"none"!=e.css("display")&&(console.debug("on lance linfinite scroll"),t())})),a.on("click",".moreResult",function(){t()}),a.find(".tagList .label, .onePageMenu__item").click(function(e){o(this).hasClass("label")?o(this).addClass("label-primary").removeClass("label-default").siblings().removeClass("label-primary").addClass("label-default"):o(this).addClass("active").siblings().removeClass("active");var t={};t["tx_bisgsummary_pi2["+o(this).data("name")+"]"]=o(this).data("id"),i(t,!1),e.preventDefault()}),a.find("#filterText").focus(function(){a.on("keydown",function(e){13==e.which&&a.find("#filterTextSubmit").trigger("click"),2<=a.find("#filterText").val().length?a.find("#filterTextSubmit").removeClass("disabled"):a.find("#filterTextSubmit").addClass("disabled")})}),a.find("#filterText").blur(function(){a.off("keydown")}),function(){var e=document.location.hash;if(e){var t=e.split("-");"#tag"==t[0]&&a.find(".tagList > span[data-id="+t[1]+"]").trigger("click")}}()})},o.fn.cardWallFilters.defaults={nbTotalResults:0,currentPageLink:!1}}(jQuery),function(y){y.fn.cardWall=function(e){var v=y.extend({},y.fn.cardWall.defaults,e);return this.each(function(){var s,o,r,l,d,n="",c=y(this),f=!1,t=[];function i(e){var t=document.createElement("div");y(t).addClass("cardPlaceHolder"),y(t).addClass("trans"),y(t).append('<div class="container">'),y(t).append('<button title="'+v.ll.close+'" class="closeBtn" tabindex="1"><span class="accessi">'+v.ll.close+'</span><span class="fa fa-times"></span></button>'),y(t).append('<div class="spinner"><span class="fa fa-refresh fa-spin"></span></div>'),y(t).append('<button title="'+v.ll.prev+'" tabindex="2" class="leftBtn navBtn"><div><span class="accessi">'+v.ll.prev+'</span><span class="fa fa-angle-left"></span></div></button>'),y(t).append('<button title="'+v.ll.next+'" tabindex="3" class="rightBtn navBtn"><div><span class="accessi">'+v.ll.next+'</span><span class="fa fa-angle-right"></span></div></button>');var n=e.offset(),i=function(){var e;viewportSize().width<801?e=y(".mainHeader").innerHeight():((e=y(".mainHeader").innerHeight()-y(window).scrollTop())<y(".subHeader").innerHeight()&&!y("body").hasClass("hamburgermenu")&&(e=y(".subHeader").innerHeight()),y("body").hasClass("hamburgermenu")&&(e=y(".mainHeader").innerHeight()-y(window).scrollTop())<0&&(e=y(".mainHeader").innerHeight()));return e}();y(t).css("width",e.innerWidth()+2),y(t).css("height",e.innerHeight()+2),y(t).css("left",n.left),y(t).css("top",n.top-y(window).scrollTop()),y("#main").append(y(t)),s=y(t).find(".leftBtn"),r=y(t).find(".rightBtn"),o=y(t).find(".spinner"),d=y(t),g(),y(t).find(".closeBtn").focus(),y(t).find(".closeBtn").css("top",i+20),y(".cardPlaceHolder .closeBtn").click(function(){!function(){d.addClass("toHide");var e=l.offset();f&&y(".fixedheader").fadeIn();setTimeout(function(){d.css({opacity:.5,width:l.innerWidth()+4,height:l.innerHeight()+4,left:e.left,top:e.top-y(window).scrollTop()-1}),y("body").removeClass("noscroll haveCardPopin")},500),setTimeout(function(){d.remove(),c.find(v.cardItem).removeClass("loading")},1e3)}()}),r.click(function(){var e;(e=h())&&(d.find(".container").addClass("loadingNext"),r.addClass("loading"),o.addClass("loading"),m(e))}),s.click(function(){var e;(e=u())&&(d.find(".container").addClass("loadingPrevious"),s.addClass("loading"),o.addClass("loading"),m(e))});var a=viewportSize().height-i;y(".fixedheader").hasClass("active")&&(f=!0,y(".fixedheader").fadeOut()),setTimeout(function(){y(t).css("position","fixed"),y(t).css("left","0px"),y(t).css("top",i),y(t).css("width","100%"),y(t).css("height",a),y("body").addClass("noscroll haveCardPopin")},250),setTimeout(function(){p()},1e3)}function u(){var e=t.indexOf(l.attr("id"));return 0!=e&&y("#"+t[e-1])}function h(){var e=t.indexOf(l.attr("id"));return e<t.length-1&&y("#"+t[e+1])}function p(){d.find(".container").html(n),initAddthisGaEvents(".addthis_toolbox.inpopin a"),initContentsAssets()}function m(t){t.find(".googleLink").size()&&gaTrackPage(t.find(".googleLink").data("href"));var e=t.data("ajax");"#"==e.charAt(0)?(n=y(e).html(),a(t)):y.ajax({url:t.data("ajax"),data:{"tx_bisgsummary_pi2[applause]":t.data("applause")},type:"POST",success:function(e){n=e,a(t)}})}function g(){u()?s.removeClass("disabled"):s.addClass("disabled"),h()?r.removeClass("disabled"):r.addClass("disabled"),s.removeClass("loading"),r.removeClass("loading")}function a(e){(l=e).data("ref"),y("body").hasClass("noscroll")?(g(),p(),o.removeClass("loading"),d.find(".container").removeClass("loadingNext").removeClass("loadingPrevious")):i(e)}c.find(v.cardItem).each(function(){y(this).find("a").click(function(e){e.stopPropagation()}),y(this).unbind("click"),t.push(y(this).attr("id")),v.addSpinnerOnCard&&0==y(this).find(".spinner").length&&y(this).append('<div class="spinner"><span class="fa fa-refresh fa-spin"></span></div>'),y(this).click(function(){return gaTrackEvent({hitType:"event",eventCategory:"wall block",eventAction:"click",eventLabel:y(this).data("href")}),null!=y(this).data("filelink")?(window.open(y(this).data("filelink")),!1):null!=y(this).data("ajax")?((e=y(this)).toggleClass("loading"),m(e),!1):!!y(this).data("href")&&(GBIS.frontend_editing?(window.parent.location.href=y(this).data("href"),!1):void(-1===y(this).data("href").indexOf("http")?document.location.href="/"+y(this).data("href"):y(this).data("hrefblank")?window.open(y(this).data("href"),"_blank"):document.location.href=y(this).data("href")));var e})})})},y.fn.cardWall.defaults={cardItem:".card",addSpinnerOnCard:!0,ll:{close:"Close",prev:"Prev",next:"Next"}}}(jQuery),function(i){var t=i.fn.contentOverflow=function(e){return t.elements=this,t._init(),t._apply(),this};t._init=function(){console.debug("contentOverflow init"),this.elements.each(function(){var e=i(this);e.data({pl:parseInt(e.css("paddingLeft"),10),pr:parseInt(e.css("paddingLeft"),10)})})},t._apply=function(){return null!=this.elements&&this.elements.each(function(){var e=i(this);if(e.hasClass("overflow--left")){e.css("marginLeft",0),e.find(" > div").css({paddingLeft:0});var t=verge.rectangle(this);e.css("marginLeft",-t.left),e.find(" > div").css("paddingLeft",t.left-e.data("pl"))}if(e.hasClass("overflow--right")){e.css("marginRight",0),e.find(" > div").css({paddingRight:0});var n=verge.rectangle(this);t=verge.viewportW()-n.right;e.css("marginRight",-t),e.find(" > div").css("paddingRight",t-e.data("pr"))}}),this},i(window).bind("load",function(e){}),i(window).bind("resize orientationchange",function(e){try{SG_debounce(t._apply(),500)}catch(e){e instanceof ReferenceError&&console.log("il faut une fonction de debounce nommÃ© SG_debounce")}})}(jQuery);var FactoringForm=function(){function FactoringForm(e){var t=this;_classCallCheck(this,FactoringForm),this.options=e,this.reponses=[],this.reponses[1]=e.reponse1,this.getDatas().then(function(e){t.myDatas=e,t.renderView()})}return _createClass(FactoringForm,[{key:"getDatas",value:function(){var e=this;return new Promise(function(i,a){$.ajax({url:e.options.datasPath,type:"get",success:function(e,t,n){i(e)},error:function(e,t,n){a({xhr:e,errorType:t,error:n})}})})}},{key:"renderView",value:function renderView(){var _self=this,appQwantSearch=new Vue({el:_self.options.container,data:function(){return{lang:_self.options.lang,datas:_self.myDatas,currentQuestion:1,displayNext:!1,offre:!1,isMounted:!1,answers:[]}},computed:{question:function(){return this.datas.questions[this.currentQuestion]}},mounted:function(){var e=this;setTimeout(function(){e.isMounted=!0},1e3),this.selectProp(this.datas.questions[1],_self.options.reponse1),this.validateQuestion()},updated:function(){},methods:{i10n:function(e){return void 0!==e[this.lang]?e[this.lang]:"trad manquante"},clickOnProposition:function(){var e=this;TweenMax.to(this.$refs.mainContainer,.5,{alpha:0,onComplete:function(){e.validateQuestion()}})},validateQuestion:function validateQuestion(){if(this.displayNext=!1,this.currentQuestion>=this.datas.questions.length-1)return this.offre=this.getOffre(),void TweenMax.to(this.$refs.mainContainer,.5,{alpha:1});var nextQuestionCondition=this.datas.questions[this.currentQuestion+1].condition,dynamicCondition=eval(this.transformCondition(nextQuestionCondition,"this"));this.currentQuestion++,dynamicCondition||this.validateQuestion(),TweenMax.to(this.$refs.mainContainer,.5,{alpha:1})},transformCondition:function(e,t){return e=(e=(e=(e=e.replace(/et/gi,"&&")).replace(/ou/gi,"||")).replace(/(\d)=(\s?[\w]{1,2})/g,t+".questionHasResponse($1, '$2')")).replace(/(\d)<>(\s?[\w]{1,2})/g,"!"+t+".questionHasResponse($1, '$2')")},questionHasResponse:function(e,n){var i=!1;return void 0===this.datas.questions[e].propositions?(console.error("questionHasResponse : question "+e+" inconnue"),!1):(this.datas.questions[e].propositions.forEach(function(e,t){e.value===n&&!0===e.checked&&(i=!0)}),i)},getOffre:function getOffre(){for(var _self=this,offre=!1,i=0;i<this.datas.offres.length;i++){var elt=this.datas.offres[i],dynamicCondition=eval(this.transformCondition(elt.condition,"_self"));if(dynamicCondition){offre=elt;break}}offre||console.error("getOffre: pas doffre, bizarre, erreur dans le fichier de conf ?");var myDatasToSave={questions:this.datas.questions,offre:offre};return SG_addlog("factoringForm",JSON.stringify(myDatasToSave)),$.cookie("SG_factoringProduct",this.i10n(offre.mainTitle),{path:"/"}),offre},selectProp:function(i,a){var s=this;this.answers.push(i.id+"_"+a),this.datas.questions[i.id].propositions.forEach(function(e,t){if(s.datas.questions[i.id].multiple||s.$set(s.datas.questions[i.id].propositions[t],"checked",!1),e.value==a){var n=0==s.datas.questions[i.id].propositions[t].checked||null==s.datas.questions[i.id].propositions[t].checked;s.$set(s.datas.questions[i.id].propositions[t],"checked",n)}}),this.displayNext=!0}}})}}]),FactoringForm}();function _typeof(e){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}!function(e){var t=e.fn.forceSquare=function(e){return t.elements=this,t._apply(),this};t._apply=function(){return null!=this.elements&&this.elements.each(function(){e(this).css("height",e(this).innerWidth())}),this},e(window).bind("load",function(e){t._apply()}),e(window).bind("resize orientationchange",function(e){t._apply()})}(jQuery);var gbis={menuOpen:!1,is2018:$("body").hasClass("design2018"),is2015:$("body").hasClass("design2015"),isHamburgermenu:$("body").hasClass("hamburgermenu"),isTransparentHeader:$("body").hasClass("transparentHeader"),isTransparentHeaderImmersive:$("body").hasClass("transparentHeader_immersive"),initLogoWhite:$("body").hasClass("logoWhite"),isOnePageMenu:$("body").hasClass("hasOnePageMenu"),isHeaderOneLine:$("body").hasClass("headerOneLine")};Modernizr.addTest("cssremunit",function(){var e=document.createElement("div");try{e.style.fontSize="3rem"}catch(e){}return/rem/.test(e.style.fontSize)});var pistilMainMenu={init:function(){$(".mainContainer .mainMenu > li").mouseenter(function(){$(this).addClass("hover")}).mouseleave(function(){$(this).removeClass("hover")}),$(".mainContainer .mainMenu > li").focusin(function(){$(".mainContainer .mainMenu > li").removeClass("hover"),$(this).addClass("hover")}),$("#langueSwitcherForm").focusin(function(){$(".mainContainer .mainMenu > li").removeClass("hover")}),$(".mainContainer .mainMenu > li > a").doubleTapToGo(),$(".navmobileMenu .mainMenu > li > a").on("click",function(){if($(this).next().size())return $(this).parent("li").hasClass("active")?($(this).next().slideUp(),$(this).parent("li").removeClass("active")):($(".navmobileMenu .mainMenuSub").slideUp(),$(this).next().slideToggle(),$(".navmobileMenu > ul > li").removeClass("active"),$(this).parent("li").addClass("active")),!1})}};function redirectXitiInUtm(){var e=document.location.href;if(e&&0<=e.indexOf("#xtor")){var t=e.match(/(htt.*:\/\/[^#]*)#xtor=([^\[]*)-\[([^\]]*)\]-([0-9]*)-\[([^\]]*)]/i);if(t.length){console.debug("Url xtor finded");var n=t[1]+"?utm_source="+t[2]+"&utm_medium="+t[3]+"&utm_term="+t[4]+"&utm_content="+encodeURIComponent(t[5]);document.location.href=n}}}function changeHeaderLogo(e){return console.debug("changeHeaderLogo",e),!gbis.is2015&&(!$("body").hasClass("navOpen")&&void("white"==e?$("body").addClass("logoWhite"):"black"==e?$("body").removeClass("logoWhite"):gbis.initLogoWhite?$("body").addClass("logoWhite"):$("body").removeClass("logoWhite")))}function isZoomed(){return"14px"!=$("body").css("font-size")}function gaTrackPage(e){"undefined"!=typeof ga&&(ga("send","pageview",e),null!=("undefined"==typeof gaT2?"undefined":_typeof(gaT2))&&ga("t2.send","pageview",e))}function gaTrackButtonEvent(e,t){"undefined"!=typeof ga&&(null==t&&(t="button"),ga("send","event",t,"click",e),null!=("undefined"==typeof gaT2?"undefined":_typeof(gaT2))&&ga("t2.send","event",t,"click",e))}function gaTrackEvent(e){"undefined"!=typeof ga&&(ga("send",e),null!=("undefined"==typeof gaT2?"undefined":_typeof(gaT2))&&ga("t2.send",e))}function haveCss(){return"none"==$("#nocss").css("display")}function viewportSize(){var e=document.createElement("div");e.style.cssText="position: fixed;top: 0;left: 0;bottom: 0;right: 0;",document.documentElement.insertBefore(e,document.documentElement.firstChild);var t={width:e.offsetWidth,height:e.offsetHeight};return document.documentElement.removeChild(e),t}function isIE(){var e=navigator.userAgent.toLowerCase();return-1!=e.indexOf("msie")&&parseInt(e.split("msie")[1])}function initAddthisGaEvents(e){$(e).each(function(){$(this).click(function(){gaTrackEvent({hitType:"event",eventCategory:"button",eventAction:$(this).find(".accessi").html(),eventLabel:$(document).attr("title")})})})}function initCardsGaEvents(){$(".tx-dce-pi1 .card, .tx-bisgsummary-pi3 .card").each(function(){$(this).click(function(){$(this).data("href")&&gaTrackEvent({hitType:"event",eventCategory:"button",eventAction:"wall block",eventLabel:$(this).data("href")})})})}function initVideoGaEvents(){$(".videoPlayer video").on("play",function(){gaTrackEvent({hitType:"event",eventCategory:"Player video",eventAction:"play",eventLabel:$(this).data("src")})})}function initImportFundsGaEvents(){$(".importFunds-kiids a").on("click",function(){gaTrackEvent({hitType:"event",eventCategory:"button",eventAction:"click",eventLabel:$(this).attr("href")})})}function initDceGaEvents(){$(".dce-btn a").on("click",function(){gaTrackEvent({hitType:"event",eventCategory:"button",eventAction:$(this).find(".dce-button__label").html(),eventLabel:$(this).attr("href")}),$(this).addClass("gaEvent")}),$(".dce-parallaxeVideo a").on("click",function(){gaTrackEvent({hitType:"event",eventCategory:"button",eventAction:$(this).html(),eventLabel:$(this).attr("href")}),$(this).addClass("gaEvent")}),$("a.dce-button, .dce-button a, .tx-dce-pi1 .parallax .cta").on("click",function(){gaTrackEvent({hitType:"event",eventCategory:"button",eventAction:$(this).html(),eventLabel:$(this).attr("href")}),$(this).addClass("gaEvent")})}function initContentsAssets(){$(".keyfigure, .tx-biimgcarrousel-pi1 .square, .gridder .itemContent").forceSquare(),$(".carrouselCard, .cardItem, .card").sggbisCard()}function isMobile(){return $(document).width()<768}function isTabletV(){return 768<=$(document).width()&&$(document).width()<992}function strip_tags(e,n){n=(((n||"")+"").toLowerCase().match(/<[a-z][a-z0-9]*>/g)||[]).join("");return e.replace(/<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi,"").replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,function(e,t){return-1<n.indexOf("<"+t.toLowerCase()+">")?e:""})}function scrollToItem(e){console.debug("scrollToItem",e);var t=0;$(".fixedheader.active").length&&(t=$(".fixedheader.active").height()+150),$("html, body").animate({scrollTop:e.offset().top-t},750)}function SG_typeText(e,t,n){var i=20*_.random(1,10);$(e).append(t.charAt(n)).delay(i).promise().done(function(){n<t.length&&SG_typeText(e,t,++n)})}function SG_debounce(i,a,s){var o;return function(){console.debug("SG_debounce");var e=this,t=arguments,n=s&&!o;clearTimeout(o),o=setTimeout(function(){o=null,s||i.apply(e,t)},a),n&&i.apply(e,t)}}function SG_addlog(e,t){$.post("/?eID=Gbis::AddLog",{category:e,myDatas:t}).done(function(e){})}function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}function _createClass(e,t,n){return t&&_defineProperties(e.prototype,t),n&&_defineProperties(e,n),e}!function(){var e;function t(e){classie.add(e.target.parentNode,"input--filled")}function n(e){""===e.target.value.trim()&&classie.remove(e.target.parentNode,"input--filled")}String.prototype.trim||(e=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,String.prototype.trim=function(){return this.replace(e,"")}),$("input.input__field").each(function(){""!==$(this).val()&&$(this).parent().addClass("input--filled"),this.addEventListener("focus",t),this.addEventListener("blur",n)})}(),Array.prototype.indexOf||(Array.prototype.indexOf=function(e){var t=this.length>>>0,n=Number(arguments[1])||0;for((n=n<0?Math.ceil(n):Math.floor(n))<0&&(n+=t);n<t;n++)if(n in this&&this[n]===e)return n;return-1}),function(n){var t=n.fn.headerImmersive=function(e){return t.elements=this,t._apply(),this};t._apply=function(){var t=n.viewportH();return null!=this.elements&&this.elements.each(function(){if(isMobile()||isTabletV())n(this).parent().css("height",260);else{var e=n.viewportW()/n(this).data("ratio");t<e&&(e=.9*t),n(this).parent().css("height",e)}}),this},n(window).bind("load",function(e){t._apply()}),n(window).bind("resize orientationchange",function(e){t._apply()})}(jQuery);var GBIS_Map=function(){function n(e){_classCallCheck(this,n),console.debug("Map : constructor");var t={containerId:"mainGmap",map_center:0,zoom_level:10,gmap:{mapTypeControl:!1,center:{lat:-25.363,lng:131.044},mapTypeId:google.maps.MapTypeId.ROADMAP,styles:[{featureType:"all",elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#333333"},{lightness:40}]},{featureType:"all",elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#ffffff"},{lightness:16}]},{featureType:"all",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#fefefe"},{lightness:20}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#f2f2f2"},{lightness:19}]},{featureType:"transit.station",elementType:"labels.icon",stylers:[{visibility:"on"}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#fefefe"},{lightness:17},{weight:1.2}]},{featureType:"administrative.country",elementType:"labels.text.fill",stylers:[{color:"#000000"}]},{featureType:"administrative.country",elementType:"labels.text.stroke",stylers:[{color:"#ffffff"}]},{featureType:"administrative.locality",elementType:"labels.text.fill",stylers:[{color:"#000000"}]},{featureType:"administrative.locality",elementType:"labels.text.stroke",stylers:[{color:"#ffffff"}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#f5f5f5"},{lightness:20}]},{featureType:"landscape.natural.landcover",elementType:"labels.text.stroke",stylers:[{lightness:"100"},{gamma:"5.76"},{color:"#ea0303"}]},{featureType:"landscape.natural.terrain",elementType:"labels.text.stroke",stylers:[{lightness:"-41"},{saturation:"100"},{gamma:"10.00"},{weight:"4.94"},{hue:"#ff0000"}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#f5f5f5"},{lightness:21}]},{featureType:"poi.park",elementType:"geometry",stylers:[{color:"#dedede"},{lightness:21}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#ffffff"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#ffffff"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#ffffff"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#ffffff"},{lightness:16}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#e9e9e9"},{lightness:17}]},{featureType:"water",elementType:"geometry.fill",stylers:[{color:"#C9C9C9"}]}]}};this.conf=$.extend(1,t,e),console.debug(this.conf),this.init()}return _createClass(n,[{key:"init",value:function(){console.debug("Map : init"),this.map=new google.maps.Map(document.getElementById(this.conf.containerId),this.conf.gmap),this.buildAllMarkers(),this.initMenu()}},{key:"initMenu",value:function(){var e=this;$(".pageMenu > a").on("click",function(){return $(".pageMenu > a").removeClass("active"),$(this).addClass("active"),e.filterContinent($(this).data("uid")),!1})}},{key:"filterContinent",value:function(e){console.debug("Map : filterContinent : "+e);var t=new google.maps.LatLngBounds;if(this.markersPerContinents[e])for(var n=0;n<this.markersPerContinents[e].length;n++)t.extend(this.markersPerContinents[e][n]);else for(var i=0;i<this.markers.length;i++)t.extend(this.markers[i]);var a=new TimelineMax;a.staggerTo(".mapMenuPays > a",.3,{autoAlpha:0},.05),a.set(".mapMenuPays > a",{display:"none"}),a.set(".mapMenuPays > a.mapMenuPays__c"+e,{display:"block"}),a.staggerTo(".mapMenuPays > a.mapMenuPays__c"+e,.2,{autoAlpha:1},.05),this.map.fitBounds(t)}},{key:"setMarker",value:function(e,t){var n=new google.maps.Marker({map:this.map,optimized:!1,icon:{url:"./typo3conf/ext/bi_template/themes/default/res/img/marker.svg",scaledSize:new google.maps.Size(25,30)},position:t,title:e.title,myLink:e.link});google.maps.event.addListener(n,"click",function(){window.location.href=this.myLink})}},{key:"buildAllMarkers",value:function(){console.debug("Map : buildAllMarkers");var e=this;e.conf.activeCountry?e.buildMarkersCountry():e.conf.activeImplantation?e.buildMarkersImplantation():e.buildMarkersContinent()}},{key:"buildMarkersImplantation",value:function(){console.debug("Map : buildMarkersImplantation");var a=this;console.debug(a),$.each(a.conf.datas,function(e,t){$.each(t.pays,function(e,t){$.each(t.imp,function(e,t){if(t.uid==a.conf.activeImplantation){var n=t.gps.split(","),i=new google.maps.LatLng(n[0],n[1]);a.setMarker(t,i),a.map.panTo(i),a.map.setZoom(a.conf.zoom_level)}})})})}},{key:"buildMarkersCountry",value:function(){console.debug("Map : buildMarkersCountry");var a=new google.maps.LatLngBounds,s=this;if($.each(s.conf.datas,function(e,t){$.each(t.pays,function(e,t){t.uid==s.conf.activeCountry&&$.each(t.imp,function(e,t){if(t.gps){var n=t.gps.split(","),i=new google.maps.LatLng(n[0],n[1]);s.setMarker(t,i),a.extend(i)}})})}),"0"!=s.conf.map_center){console.debug("Map : on force le centre");var e=s.conf.map_center.split(",");s.map.panTo(new google.maps.LatLng(e[0],e[1])),s.map.setZoom(s.conf.zoom_level)}else this.map.fitBounds(a)}},{key:"buildMarkersContinent",value:function(){var s=new google.maps.LatLngBounds,o=this;o.markersPerContinents=[],o.markers=[],$.each(o.conf.datas,function(e,a){o.markersPerContinents[a.uid]=[],$.each(a.pays,function(e,t){if(t.gps){var n=t.gps.split(","),i=new google.maps.LatLng(n[0],n[1]);o.setMarker(t,i),o.markersPerContinents[a.uid].push(i),o.markers.push(i),s.extend(i)}})}),this.map.fitBounds(s)}}]),n}();!function(n){n.fn.SGPowerMailShowField=function(e){var t=n.extend({},n.fn.SGPowerMailShowField.defaults,e);return this.each(function(){var e=n(this);n(t.toShow).hide(),e.on("change",function(){n(this).val()==t.reactiveFieldValue?n(t.toShow).show():n(t.toShow).hide()})})},n.fn.SGPowerMailShowField.defaults={reactiveFieldValue:"",toShow:""}}(jQuery),function(i){i.fn.SGFilterChilds=function(n){i.extend({},i.fn.SGFilterChilds.defaults,n);return this.each(function(){var e=i(this),t=n.filter;e.attr("data-filter",t),t?i(this).children().each(function(){i(this).hasClass(t)?i(this).show():i(this).hide()}):i(this).children().show()})},i.fn.SGFilterChilds.defaults={}}(jQuery),function(n){n.fn.SGImportFundsFilter=function(e){n.extend({},n.fn.SGImportFundsFilter.defaults,e);return this.each(function(){n.cookie.json=!0;var e=n.cookie("disclaimerDatas");if(null!=e&&"null"!=e){var t=e.lang.toUpperCase();n(this).SGFilterChilds({filter:t})}})},n.fn.SGImportFundsFilter.defaults={}}(jQuery),function(c){c.fn.SGMovingLine=function(e){c.extend({},c.fn.SGMovingLine.defaults,e);return this.each(function(){var e=c(this);if(!e.hasClass("mlTitle")){e.wrapInner('<span class="mlTitle__content"></span>');var t=e.find(".mlTitle__content").width(),n=Math.floor(parseInt(e.css("fontSize"))/4.5),i=.3*t,a=.75*t,s=Math.random()*(a-i)+i,o=.3*-t,r=t-s,l=.2*(Math.random()*(r-o)+o);e.addClass("mlTitle");var d=c("<span />").addClass("mlTitle__bar").css({bottom:2.2*-n,height:n,backgroundColor:e.css("color")}).appendTo(c(this).find(".mlTitle__content"));setTimeout(function(){d.css({transform:"translateX("+l+"px)",width:s})},200)}})},c.fn.SGMovingLine.defaults={}}(jQuery),function(n){n.fn.SGVerticalTabs=function(e){n.extend({},n.fn.SGVerticalTabs.defaults,e);return this.each(function(){function e(e){var t=i.find(".dce-verticalTabs__tabs__item").eq(e);i.find(".dce-verticalTabs__tabs__item").eq(a).removeClass("dce-verticalTabs__tabs__item--active"),t.addClass("dce-verticalTabs__tabs__item--active");var n=verge.rectangle(t).top-verge.rectangle(i.find(".dce-verticalTabs__tabs")).top;TweenMax.to(i.find(".dce-verticalTabs__cursor"),.8,{y:n,ease:Expo.easeInOut}),TweenMax.to(i.find(".dce-verticalTabs__contents__item").eq(a),.8,{autoAlpha:0}),i.find(".dce-verticalTabs__contents__item").eq(a).removeClass("dce-verticalTabs__contents__item--active"),TweenMax.to(i.find(".dce-verticalTabs__contents__item").eq(e),.8,{autoAlpha:1}),i.find(".dce-verticalTabs__contents__item").eq(e).addClass("dce-verticalTabs__contents__item--active"),a=e}var t,i=n(this),a=0;e(a),i.find(".dce-verticalTabs__tabs__item").on("click",function(){e(n(this).data("uid"))}),t=0,i.find(".dce-verticalTabs__contents__item").each(function(){n(this).height()>t&&(t=n(this).height())}),i.find(".dce-verticalTabs__contents").height(t)})},n.fn.SGVerticalTabs.defaults={}}(jQuery),function(i){i.fn.SGCarouselKeys=function(e){var t=i.extend({},i.fn.SGCarouselKeys.defaults,e);function n(){i(this.$owlItems[this.currentItem]).find(".dce-carouselKeys__slide__key").counterUp({delay:10,time:1e3})}return console.debug("SGCarouselKeys",t),this.each(function(){i(this).owlCarousel({autoPlay:""!=t.autoPlay&&t.autoPlay,singleItem:!0,transitionStyle:"fadeUp",afterMove:n,afterInit:n})})},i.fn.SGCarouselKeys.defaults={}}(jQuery);
//# sourceMappingURL=gbis.min.js.map