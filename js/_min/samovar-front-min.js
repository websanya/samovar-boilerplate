!function($,e,t,n){function r(e,t){this.element=e,this.options=$.extend({},o,t),this._defaults=o,this._name=i,this.init()}var i="keepTheRhythm",o={baseLine:24,verticalAlignment:"center",spacing:"padding"};r.prototype={init:function(){var t=$(this.element),n=this;$(e).resize(function(){n.fixRhythm(t)}).trigger("resize")},fixRhythm:function(e){var t=e.height(),n=this.options.baseLine-t%this.options.baseLine;n===this.options.baseLine&&(n=0);var r=0,i=n;"center"===this.options.verticalAlignment?(r=n/2,i=n-r):"bottom"===this.options.verticalAlignment&&(r=n,i=0),e.css("margin"===this.options.spacing?{marginTop:r+"px",marginBottom:i+"px"}:{paddingTop:r+"px",paddingBottom:i+"px"})}},$.fn[i]=function(e){return this.each(function(){$.data(this,"plugin_"+i)||$.data(this,"plugin_"+i,new r(this,e))})}}(jQuery,window,document),function($){setTimeout(function(){$("img").keepTheRhythm({baseLine:14}),$("iframe").keepTheRhythm({baseLine:14,spacing:"margin"}),$(".wp-video").keepTheRhythm({baseLine:14})},500),$("iframe").parent("p").addClass("iframe-container"),setTimeout(function(){$("div[data-twttr-id]").keepTheRhythm({baseLine:14}),$(".twitter-tweet").keepTheRhythm({baseLine:14}),$("#disqus_thread").keepTheRhythm({baseLine:14})},2500),setTimeout(function(){$("iframe.twitter-tweet-rendered + p").remove()},1750)}(jQuery),function($){var e=$(".samovar-sticky-header .site-header");e[0]&&$(window).on("scroll",function(){$(this).scrollTop()>e.outerHeight()?e.addClass("scrolled"):e.removeClass("scrolled")})}(jQuery),function($){$(".samovar-fullscreen-header")[0]&&$("body.single")[0]&&($(".entry-header").addClass("samovar-entry-fullscreen").detach().prependTo(".site-inner"),$(".site-inner").css("margin-top",$(window).height()+42),$(".entry-header").css("background-image","url("+$(".entry-header img").attr("src")+")"),$(".entry-header img").detach(),$(".entry-comments-link").detach(),$(".samovar-fullscreen-overlay").css("opacity",$(".samovar-fullscreen-overlay").attr("data-opacity")))}(jQuery),window.Modernizr=function(e,t,n){function r(e){v.cssText=e}function i(e,t){return r(prefixes.join(e+";")+(t||""))}function o(e,t){return typeof e===t}function a(e,t){return!!~(""+e).indexOf(t)}function s(e,t){for(var r in e){var i=e[r];if(!a(i,"-")&&v[i]!==n)return"pfx"==t?i:!0}return!1}function c(e,t,r){for(var i in e){var a=t[e[i]];if(a!==n)return r===!1?e[i]:o(a,"function")?a.bind(r||t):a}return!1}function l(e,t,n){var r=e.charAt(0).toUpperCase()+e.slice(1),i=(e+" "+b.join(r+" ")+r).split(" ");return o(t,"string")||o(t,"undefined")?s(i,t):(i=(e+" "+w.join(r+" ")+r).split(" "),c(i,t,n))}var u="2.7.1",d={},f=!0,p=t.documentElement,m="modernizr",h=t.createElement(m),v=h.style,y,g={}.toString,E="Webkit Moz O ms",b=E.split(" "),w=E.toLowerCase().split(" "),T={},x={},C={},L=[],j=L.slice,N,k={}.hasOwnProperty,S;S=o(k,"undefined")||o(k.call,"undefined")?function(e,t){return t in e&&o(e.constructor.prototype[t],"undefined")}:function(e,t){return k.call(e,t)},Function.prototype.bind||(Function.prototype.bind=function(e){var t=this;if("function"!=typeof t)throw new TypeError;var n=j.call(arguments,1),r=function(){if(this instanceof r){var i=function(){};i.prototype=t.prototype;var o=new i,a=t.apply(o,n.concat(j.call(arguments)));return Object(a)===a?a:o}return t.apply(e,n.concat(j.call(arguments)))};return r}),T.csstransitions=function(){return l("transition")};for(var M in T)S(T,M)&&(N=M.toLowerCase(),d[N]=T[M](),L.push((d[N]?"":"no-")+N));return d.addTest=function(e,t){if("object"==typeof e)for(var r in e)S(e,r)&&d.addTest(r,e[r]);else{if(e=e.toLowerCase(),d[e]!==n)return d;t="function"==typeof t?t():t,"undefined"!=typeof f&&f&&(p.className+=" "+(t?"":"no-")+e),d[e]=t}return d},r(""),h=y=null,function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=g.elements;return"string"==typeof e?e.split(" "):e}function i(e){var t=v[e[m]];return t||(t={},h++,e[m]=h,v[h]=t),t}function o(e,n,r){if(n||(n=t),y)return n.createElement(e);r||(r=i(n));var o;return o=r.cache[e]?r.cache[e].cloneNode():f.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),!o.canHaveChildren||d.test(e)||o.tagUrn?o:r.frag.appendChild(o)}function a(e,n){if(e||(e=t),y)return e.createDocumentFragment();n=n||i(e);for(var o=n.frag.cloneNode(),a=0,s=r(),c=s.length;c>a;a++)o.createElement(s[a]);return o}function s(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return g.shivMethods?o(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/[\w\-]+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(g,t.frag)}function c(e){e||(e=t);var r=i(e);return g.shivCSS&&!p&&!r.hasCSS&&(r.hasCSS=!!n(e,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),y||s(e,r),e}var l="3.7.0",u=e.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,p,m="_html5shiv",h=0,v={},y;!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",p="hidden"in e,y=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){p=!0,y=!0}}();var g={elements:u.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:l,shivCSS:u.shivCSS!==!1,supportsUnknownElements:y,shivMethods:u.shivMethods!==!1,type:"default",shivDocument:c,createElement:o,createDocumentFragment:a};e.html5=g,c(t)}(this,t),d._version=u,d._domPrefixes=w,d._cssomPrefixes=b,d.testProp=function(e){return s([e])},d.testAllProps=l,d.prefixed=function(e,t,n){return t?l(e,t,n):l(e,"pfx")},p.className=p.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+L.join(" "):""),d}(this,this.document),function(e,t,n){function r(e){return"[object Function]"==m.call(e)}function i(e){return"string"==typeof e}function o(){}function a(e){return!e||"loaded"==e||"complete"==e||"uninitialized"==e}function s(){var e=h.shift();v=1,e?e.t?f(function(){("c"==e.t?N.injectCss:N.injectJs)(e.s,0,e.a,e.x,e.e,1)},0):(e(),s()):v=0}function c(e,n,r,i,o,c,l){function u(t){if(!m&&a(d.readyState)&&(b.r=m=1,!v&&s(),d.onload=d.onreadystatechange=null,t)){"img"!=e&&f(function(){E.removeChild(d)},50);for(var r in C[n])C[n].hasOwnProperty(r)&&C[n][r].onload()}}var l=l||N.errorTimeout,d=t.createElement(e),m=0,y=0,b={t:r,s:n,e:o,a:c,x:l};1===C[n]&&(y=1,C[n]=[]),"object"==e?d.data=n:(d.src=n,d.type=e),d.width=d.height="0",d.onerror=d.onload=d.onreadystatechange=function(){u.call(this,y)},h.splice(i,0,b),"img"!=e&&(y||2===C[n]?(E.insertBefore(d,g?null:p),f(u,l)):C[n].push(d))}function l(e,t,n,r,o){return v=0,t=t||"j",i(e)?c("c"==t?w:b,e,t,this.i++,n,r,o):(h.splice(this.i++,0,e),1==h.length&&s()),this}function u(){var e=N;return e.loader={load:l,i:0},e}var d=t.documentElement,f=e.setTimeout,p=t.getElementsByTagName("script")[0],m={}.toString,h=[],v=0,y="MozAppearance"in d.style,g=y&&!!t.createRange().compareNode,E=g?d:p.parentNode,d=e.opera&&"[object Opera]"==m.call(e.opera),d=!!t.attachEvent&&!d,b=y?"object":d?"script":"img",w=d?"script":b,T=Array.isArray||function(e){return"[object Array]"==m.call(e)},x=[],C={},L={timeout:function(e,t){return t.length&&(e.timeout=t[0]),e}},j,N;N=function(e){function t(e){var e=e.split("!"),t=x.length,n=e.pop(),r=e.length,n={url:n,origUrl:n,prefixes:e},i,o,a;for(o=0;r>o;o++)a=e[o].split("="),(i=L[a.shift()])&&(n=i(n,a));for(o=0;t>o;o++)n=x[o](n);return n}function a(e,i,o,a,s){var c=t(e),l=c.autoCallback;c.url.split(".").pop().split("?").shift(),c.bypass||(i&&(i=r(i)?i:i[e]||i[a]||i[e.split("/").pop().split("?")[0]]),c.instead?c.instead(e,i,o,a,s):(C[c.url]?c.noexec=!0:C[c.url]=1,o.load(c.url,c.forceCSS||!c.forceJS&&"css"==c.url.split(".").pop().split("?").shift()?"c":n,c.noexec,c.attrs,c.timeout),(r(i)||r(l))&&o.load(function(){u(),i&&i(c.origUrl,s,a),l&&l(c.origUrl,s,a),C[c.url]=2})))}function s(e,t){function n(e,n){if(e){if(i(e))n||(l=function(){var e=[].slice.call(arguments);u.apply(this,e),d()}),a(e,l,t,0,s);else if(Object(e)===e)for(p in f=function(){var t=0,n;for(n in e)e.hasOwnProperty(n)&&t++;return t}(),e)e.hasOwnProperty(p)&&(!n&&!--f&&(r(l)?l=function(){var e=[].slice.call(arguments);u.apply(this,e),d()}:l[p]=function(e){return function(){var t=[].slice.call(arguments);e&&e.apply(this,t),d()}}(u[p])),a(e[p],l,t,p,s))}else!n&&d()}var s=!!e.test,c=e.load||e.both,l=e.callback||o,u=l,d=e.complete||o,f,p;n(s?e.yep:e.nope,!!c),c&&n(c)}var c,l,d=this.yepnope.loader;if(i(e))a(e,0,d,0);else if(T(e))for(c=0;c<e.length;c++)l=e[c],i(l)?a(l,0,d,0):T(l)?N(l):Object(l)===l&&s(l,d);else Object(e)===e&&s(e,d)},N.addPrefix=function(e,t){L[e]=t},N.addFilter=function(e){x.push(e)},N.errorTimeout=1e4,null==t.readyState&&t.addEventListener&&(t.readyState="loading",t.addEventListener("DOMContentLoaded",j=function(){t.removeEventListener("DOMContentLoaded",j,0),t.readyState="complete"},0)),e.yepnope=u(),e.yepnope.executeStack=s,e.yepnope.injectJs=function(e,n,r,i,c,l){var u=t.createElement("script"),d,m,i=i||N.errorTimeout;u.src=e;for(m in r)u.setAttribute(m,r[m]);n=l?s:n||o,u.onreadystatechange=u.onload=function(){!d&&a(u.readyState)&&(d=1,n(),u.onload=u.onreadystatechange=null)},f(function(){d||(d=1,n(1))},i),c?u.onload():p.parentNode.insertBefore(u,p)},e.yepnope.injectCss=function(e,n,r,i,a,c){var i=t.createElement("link"),l,n=c?s:n||o;i.href=e,i.rel="stylesheet",i.type="text/css";for(l in r)i.setAttribute(l,r[l]);a||(p.parentNode.insertBefore(i,p),f(n,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))},function(e){"use strict";function t(e){return new RegExp("(^|\\s+)"+e+"(\\s+|$)")}function n(e,t){var n=r(e,t)?o:i;n(e,t)}var r,i,o;"classList"in document.documentElement?(r=function(e,t){return e.classList.contains(t)},i=function(e,t){e.classList.add(t)},o=function(e,t){e.classList.remove(t)}):(r=function(e,n){return t(n).test(e.className)},i=function(e,t){r(e,t)||(e.className=e.className+" "+t)},o=function(e,n){e.className=e.className.replace(t(n)," ")});var a={hasClass:r,addClass:i,removeClass:o,toggleClass:n,has:r,add:i,remove:o,toggle:n};"function"==typeof define&&define.amd?define(a):e.classie=a}(window),function(){function e(){if(classie.has(n,"open")){classie.remove(n,"open"),classie.add(n,"close");var e=function(t){if(support.transitions){if("visibility"!==t.propertyName)return;this.removeEventListener(transEndEventName,e)}classie.remove(n,"close")};support.transitions?n.addEventListener(transEndEventName,e):e()}else classie.has(n,"close")||classie.add(n,"open")}var t=document.getElementById("trigger-overlay"),n=document.querySelector("div.overlay"),r=n.querySelector(".overlay-close");transEndEventNames={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",msTransition:"MSTransitionEnd",transition:"transitionend"},transEndEventName=transEndEventNames[Modernizr.prefixed("transition")],support={transitions:Modernizr.csstransitions},t.addEventListener("click",e),r.addEventListener("click",e)}();