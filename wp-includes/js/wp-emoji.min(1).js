!function(c,l){c.wp=c.wp||{},c.wp.emoji=new function(){var n,u,e=c.MutationObserver||c.WebKitMutationObserver||c.MozMutationObserver,a=c.document,t=!1,r=0,o=0<c.navigator.userAgent.indexOf("Trident/7.0");function i(){return!a.implementation.hasFeature||a.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")}function s(){if(!t){if(void 0===c.twemoji){if(600<r)return;return c.clearTimeout(u),u=c.setTimeout(s,50),void r++}n=c.twemoji,t=!0,e&&new e(function(u){for(var e,t,n,a,r=u.length;r--;){if(e=u[r].addedNodes,t=u[r].removedNodes,1===(n=e.length)&&1===t.length&&3===e[0].nodeType&&"IMG"===t[0].nodeName&&e[0].data===t[0].alt&&"load-failed"===t[0].getAttribute("data-error"))return;for(;n--;){if(3===(a=e[n]).nodeType){if(!a.parentNode)continue;if(o)for(;a.nextSibling&&3===a.nextSibling.nodeType;)a.nodeValue=a.nodeValue+a.nextSibling.nodeValue,a.parentNode.removeChild(a.nextSibling);a=a.parentNode}!a||1!==a.nodeType||a.className&&"string"==typeof a.className&&-1!==a.className.indexOf("wp-exclude-emoji")||d(a.textContent)&&f(a)}}}).observe(a.body,{childList:!0,subtree:!0}),f(a.body)}}function d(u){return!!u&&(/[\uDC00-\uDFFF]/.test(u)||/[\u203C\u2049\u20E3\u2122\u2139\u2194-\u2199\u21A9\u21AA\u2300\u231A\u231B\u2328\u2388\u23CF\u23E9-\u23F3\u23F8-\u23FA\u24C2\u25AA\u25AB\u25B6\u25C0\u25FB-\u25FE\u2600-\u2604\u260E\u2611\u2614\u2615\u2618\u261D\u2620\u2622\u2623\u2626\u262A\u262E\u262F\u2638\u2639\u263A\u2648-\u2653\u2660\u2663\u2665\u2666\u2668\u267B\u267F\u2692\u2693\u2694\u2696\u2697\u2699\u269B\u269C\u26A0\u26A1\u26AA\u26AB\u26B0\u26B1\u26BD\u26BE\u26C4\u26C5\u26C8\u26CE\u26CF\u26D1\u26D3\u26D4\u26E9\u26EA\u26F0-\u26F5\u26F7-\u26FA\u26FD\u2702\u2705\u2708-\u270D\u270F\u2712\u2714\u2716\u271D\u2721\u2728\u2733\u2734\u2744\u2747\u274C\u274E\u2753\u2754\u2755\u2757\u2763\u2764\u2795\u2796\u2797\u27A1\u27B0\u27BF\u2934\u2935\u2B05\u2B06\u2B07\u2B1B\u2B1C\u2B50\u2B55\u3030\u303D\u3297\u3299]/.test(u))}function f(u,e){var t;return!l.supports.everything&&n&&u&&("string"==typeof u||u.childNodes&&u.childNodes.length)?(e=e||{},t={base:i()?l.svgUrl:l.baseUrl,ext:i()?l.svgExt:l.ext,className:e.className||"emoji",callback:function(u,e){switch(u){case"a9":case"ae":case"2122":case"2194":case"2660":case"2663":case"2665":case"2666":return!1}return!(l.supports.everythingExceptFlag&&!/^1f1(?:e[6-9a-f]|f[0-9a-f])-1f1(?:e[6-9a-f]|f[0-9a-f])$/.test(u)&&!/^(1f3f3-fe0f-200d-1f308|1f3f4-200d-2620-fe0f)$/.test(u))&&"".concat(e.base,u,e.ext)},attributes:function(){return{role:"img"}},onerror:function(){n.parentNode&&(this.setAttribute("data-error","load-failed"),n.parentNode.replaceChild(a.createTextNode(n.alt),n))}},"object"==typeof e.imgAttr&&(t.attributes=function(){return e.imgAttr}),n.parse(u,t)):u}return l&&(l.DOMReady?s():l.readyCallback=s),{parse:f,test:d}}}(window,window._wpemojiSettings);