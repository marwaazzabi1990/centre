"undefined"!=typeof jQuery?(void 0===jQuery.fn.hoverIntent&&function(d){d.fn.hoverIntent=function(e,t,n){var o={interval:100,sensitivity:6,timeout:0};o="object"==typeof e?d.extend(o,e):d.isFunction(t)?d.extend(o,{over:e,out:t,selector:n}):d.extend(o,{over:e,out:e,selector:t});function a(e){s=e.pageX,i=e.pageY}function r(e){var t=d.extend({},e),n=this;n.hoverIntent_t&&(n.hoverIntent_t=clearTimeout(n.hoverIntent_t)),"mouseenter"===e.type?(c=t.pageX,l=t.pageY,d(n).on("mousemove.hoverIntent",a),n.hoverIntent_s||(n.hoverIntent_t=setTimeout(function(){u(t,n)},o.interval))):(d(n).off("mousemove.hoverIntent",a),n.hoverIntent_s&&(n.hoverIntent_t=setTimeout(function(){!function(e,t){t.hoverIntent_t=clearTimeout(t.hoverIntent_t),t.hoverIntent_s=!1,o.out.apply(t,[e])}(t,n)},o.timeout)))}var s,i,c,l,u=function(e,t){return t.hoverIntent_t=clearTimeout(t.hoverIntent_t),Math.sqrt((c-s)*(c-s)+(l-i)*(l-i))<o.sensitivity?(d(t).off("mousemove.hoverIntent",a),t.hoverIntent_s=!0,o.over.apply(t,[e])):(c=s,l=i,void(t.hoverIntent_t=setTimeout(function(){u(e,t)},o.interval)))};return this.on({"mouseenter.hoverIntent":r,"mouseleave.hoverIntent":r},o.selector)}}(jQuery),jQuery(document).ready(function(a){var r,e,t,o=a("#wpadminbar"),s=!1;r=function(e,t){var n=a(t),o=n.attr("tabindex");o&&n.attr("tabindex","0").attr("tabindex",o)},e=function(n){o.find("li.menupop").on("click.wp-mobile-hover",function(e){var t=a(this);t.parent().is("#wp-admin-bar-root-default")&&!t.hasClass("hover")?(e.preventDefault(),o.find("li.menupop.hover").removeClass("hover"),t.addClass("hover")):t.hasClass("hover")?a(e.target).closest("div").hasClass("ab-sub-wrapper")||(e.stopPropagation(),e.preventDefault(),t.removeClass("hover")):(e.stopPropagation(),e.preventDefault(),t.addClass("hover")),n&&(a("li.menupop").off("click.wp-mobile-hover"),s=!1)})},t=function(){var e=/Mobile\/.+Safari/.test(navigator.userAgent)?"touchstart":"click";a(document.body).on(e+".wp-mobile-hover",function(e){a(e.target).closest("#wpadminbar").length||o.find("li.menupop.hover").removeClass("hover")})},o.removeClass("nojq").removeClass("nojs"),"ontouchstart"in window?(o.on("touchstart",function(){e(!0),s=!0}),t()):/IEMobile\/[1-9]/.test(navigator.userAgent)&&(e(),t()),o.find("li.menupop").hoverIntent({over:function(){s||a(this).addClass("hover")},out:function(){s||a(this).removeClass("hover")},timeout:180,sensitivity:7,interval:100}),window.location.hash&&window.scrollBy(0,-32),a("#wp-admin-bar-get-shortlink").click(function(e){e.preventDefault(),a(this).addClass("selected").children(".shortlink-input").blur(function(){a(this).parents("#wp-admin-bar-get-shortlink").removeClass("selected")}).focus().select()}),a("#wpadminbar li.menupop > .ab-item").bind("keydown.adminbar",function(e){if(13==e.which){var t=a(e.target),n=t.closest(".ab-sub-wrapper"),o=t.parent().hasClass("hover");e.stopPropagation(),e.preventDefault(),n.length||(n=a("#wpadminbar .quicklinks")),n.find(".menupop").removeClass("hover"),o||t.parent().toggleClass("hover"),t.siblings(".ab-sub-wrapper").find(".ab-item").each(r)}}).each(r),a("#wpadminbar .ab-item").bind("keydown.adminbar",function(e){if(27==e.which){var t=a(e.target);e.stopPropagation(),e.preventDefault(),t.closest(".hover").removeClass("hover").children(".ab-item").focus(),t.siblings(".ab-sub-wrapper").find(".ab-item").each(r)}}),o.click(function(e){"wpadminbar"!=e.target.id&&"wp-admin-bar-top-secondary"!=e.target.id||(o.find("li.menupop.hover").removeClass("hover"),a("html, body").animate({scrollTop:0},"fast"),e.preventDefault())}),a(".screen-reader-shortcut").keydown(function(e){var t;13==e.which&&(t=a(this).attr("href"),-1!=navigator.userAgent.toLowerCase().indexOf("applewebkit")&&t&&"#"==t.charAt(0)&&setTimeout(function(){a(t).focus()},100))}),a("#adminbar-search").on({focus:function(){a("#adminbarsearch").addClass("adminbar-focused")},blur:function(){a("#adminbarsearch").removeClass("adminbar-focused")}}),"sessionStorage"in window&&a("#wp-admin-bar-logout a").click(function(){try{for(var e in sessionStorage)-1!=e.indexOf("wp-autosave-")&&sessionStorage.removeItem(e)}catch(e){}}),navigator.userAgent&&-1===document.body.className.indexOf("no-font-face")&&/Android (1.0|1.1|1.5|1.6|2.0|2.1)|Nokia|Opera Mini|w(eb)?OSBrowser|webOS|UCWEB|Windows Phone OS 7|XBLWP7|ZuneWP7|MSIE 7/.test(navigator.userAgent)&&(document.body.className+=" no-font-face")})):function(l,e){function t(e,t,n){e&&"function"==typeof e.addEventListener?e.addEventListener(t,n,!1):e&&"function"==typeof e.attachEvent&&e.attachEvent("on"+t,function(){return n.call(e,window.event)})}function u(e){for(var t=f.length;t--;)if(f[t]&&e==f[t][1])return f[t][0];return!1}function n(e){for(var t,n,o,a=e.target||e.srcElement;;){if(!a||a==l||a==d)return;if(a.id&&"wp-admin-bar-get-shortlink"==a.id)break;a=a.parentNode}for(e.preventDefault&&e.preventDefault(),e.returnValue=!1,-1==a.className.indexOf("selected")&&(a.className+=" selected"),t=0,n=a.childNodes.length;t<n;t++)if((o=a.childNodes[t]).className&&-1!=o.className.indexOf("shortlink-input")){o.focus(),o.select(),o.onblur=function(){a.className=a.className?a.className.replace(v,""):""};break}return!1}var d,m=new RegExp("\\bhover\\b","g"),f=[],v=new RegExp("\\bselected\\b","g");t(e,"load",function(){d=l.getElementById("wpadminbar"),l.body&&d&&(l.body.appendChild(d),d.className&&(d.className=d.className.replace(/nojs/,"")),t(d,"mouseover",function(e){!function(e){for(var t,n,o,a,r,s,i=[],c=0;e&&e!=d&&e!=l;)"LI"==e.nodeName.toUpperCase()&&(i[i.length]=e,(n=u(e))&&clearTimeout(n),e.className=e.className?e.className.replace(m,"")+" hover":"hover",a=e),e=e.parentNode;if(a&&a.parentNode&&(r=a.parentNode)&&"UL"==r.nodeName.toUpperCase())for(t=r.childNodes.length;t--;)(s=r.childNodes[t])!=a&&(s.className=s.className?s.className.replace(v,""):"");for(t=f.length;t--;){for(o=!1,c=i.length;c--;)i[c]==f[t][1]&&(o=!0);o||(f[t][1].className=f[t][1].className?f[t][1].className.replace(m,""):"")}}(e.target||e.srcElement)}),t(d,"mouseout",function(e){!function(e){for(;e&&e!=d&&e!=l;)"LI"==e.nodeName.toUpperCase()&&function(e){var t=setTimeout(function(){e.className=e.className?e.className.replace(m,""):""},500);f[f.length]=[t,e]}(e),e=e.parentNode}(e.target||e.srcElement)}),t(d,"click",n),t(d,"click",function(e){!function(e){var t,n,o,a,r,s;if(!("wpadminbar"!=e.id&&"wp-admin-bar-top-secondary"!=e.id||(t=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0)<1))for(s=800<t?130:100,n=Math.min(12,Math.round(t/s)),o=800<t?Math.round(t/30):Math.round(t/20),a=[],r=0;t;)(t-=o)<0&&(t=0),a.push(t),setTimeout(function(){window.scrollTo(0,a.shift())},r*n),r++}(e.target||e.srcElement)}),t(document.getElementById("wp-admin-bar-logout"),"click",function(){if("sessionStorage"in window)try{for(var e in sessionStorage)-1!=e.indexOf("wp-autosave-")&&sessionStorage.removeItem(e)}catch(e){}})),e.location.hash&&e.scrollBy(0,-32),navigator.userAgent&&-1===document.body.className.indexOf("no-font-face")&&/Android (1.0|1.1|1.5|1.6|2.0|2.1)|Nokia|Opera Mini|w(eb)?OSBrowser|webOS|UCWEB|Windows Phone OS 7|XBLWP7|ZuneWP7|MSIE 7/.test(navigator.userAgent)&&(document.body.className+=" no-font-face")})}(document,window);