/*!
* FoxUI.js 3.2.0 , author: FED-H5, date:20161019 20:54:40
* Copyright 2016 sohutv inc.
*/
window.svp=window.svp||{},function(e){function r(e){return function(r){return{}.toString.call(r)=="[object "+e+"]"}}function t(){return T++}function n(e){return e.match(A)[0]}function o(e){for(e=e.replace(O,"/");e.match(U);)e=e.replace(U,"/");return e=e.replace(C,"$1/")}function i(e){var r=e.length-1,t=e.charAt(r);return"#"===t?e.substring(0,r):".js"===e.substring(r-2)||e.indexOf("?")>0||".css"===e.substring(r-3)||"/"===t?e:e+".js"}function a(e){var r=E.alias;return r&&x(r[e])?r[e]:e}function s(e){var r,t=E.paths;return t&&(r=e.match(N))&&x(t[r[1]])&&(e=t[r[1]]+r[2]),e}function u(e){var r=E.vars;return r&&e.indexOf("{")>-1&&(e=e.replace(D,function(e,t){return x(r[t])?r[t]:e})),e}function c(e){var r=E.map,t=e;if(r)for(var n=0,o=r.length;o>n;n++){var i=r[n];if(t=w(i)?i(e)||e:e.replace(i[0],i[1]),t!==e)break}return t}function f(e,r){var t,i=e.charAt(0);if(I.test(e))t=e;else if("."===i)t=o((r?n(r):E.cwd)+e);else if("/"===i){var a=E.cwd.match(k);t=a?a[0]+e.substring(1):e}else t=E.base+e;return 0===t.indexOf("//")&&(t=location.protocol+t),t}function l(e,r){if(!e)return"";e=a(e),e=s(e),e=u(e),e=i(e);var t=f(e,r);return t=c(t)}function v(e){return e.hasAttribute?e.src:e.getAttribute("src",4)}function d(e,r,t,n){var o=B.test(e),i=L.createElement(o?"link":"script");t&&(i.charset=t),S(n)||i.setAttribute("crossorigin",n),h(i,r,o,e),o?(i.rel="stylesheet",i.href=e):(i.async=!0,i.src=e),Y?M.insertBefore(i,Y):M.appendChild(i),X=null}function h(e,r,t,n){function o(){e.onload=e.onerror=e.onreadystatechange=null,t||E.debug||M.removeChild(e),e=null,r&&r()}var i="onload"in e;return!t||!F&&i?void(i?(e.onload=o,e.onerror=function(){q("error",{uri:n,node:e}),o()}):e.onreadystatechange=function(){/loaded|complete/.test(e.readyState)&&o()}):void setTimeout(function(){p(e,r)},1)}function p(e,r){var t,n=e&&e.sheet;if(F)n&&(t=!0);else if(n)try{n.cssRules&&(t=!0)}catch(o){"NS_ERROR_DOM_SECURITY_ERR"===o.name&&(t=!0)}setTimeout(function(){t?r&&r():p(e,r)},20)}function g(){if(X)return X;if(K&&"interactive"===K.readyState)return K;for(var e=M.getElementsByTagName("script"),r=e.length-1;r>=0;r--){var t=e[r];if("interactive"===t.readyState)return K=t}}function m(e){var r=[];return e.replace(W,"").replace(V,function(e,t,n){n&&r.push(n)}),r}function y(e,r){this.uri=e,this.dependencies=r||[],this.exports=null,this.status=0,this._waitings={},this._remain=0}if(!e.seajs){var seajs=e.seajs={version:"2.2.4"},E=seajs.data={};"function"!=typeof String.indexOf&&(String.prototype.indexOf=function(e){for(var r=this.length,t=e.length,n=0,o=!1;r>n;){if(this.substr(n,t)===e){o=!0;break}n++}return o||(n=-1),n}),"function"!=typeof Array.indexOf&&(Array.prototype.indexOf=function(e){for(var r=-1,t=0,n=this.length;n>t;t++)if(this[t]===e){r=t;break}return r});var b=r("Object"),x=r("String"),_=Array.isArray||r("Array"),w=r("Function"),S=r("Undefined"),T=0,j=E.events={};seajs.on=function(e,r){var t=j[e]||(j[e]=[]);return t.push(r),seajs},seajs.off=function(e,r){if(!e&&!r)return j=E.events={},seajs;var t=j[e];if(t)if(r)for(var n=t.length-1;n>=0;n--)t[n]===r&&t.splice(n,1);else delete j[e];return seajs};var q=seajs.emit=function(e,r){var t,n=j[e];if(n)for(n=n.slice();t=n.shift();)t(r);return seajs},A=/[^?#]*\//,O=/\/\.\//g,U=/\/[^\/]+\/\.\.\//,C=/([^:\/])\/\//g,N=/^([^\/:]+)(\/.+)$/,D=/{([^{]+)}/g,I=/^\/\/.|:\//,k=/^.*?\/\/.*?\//,L=document,R=n(L.URL),G=L.scripts,H=L.getElementById("seajsnode")||G[G.length-1],$=n(v(H)||R);seajs.resolve=l;var X,K,M=L.head||L.getElementsByTagName("head")[0]||L.documentElement,Y=M.getElementsByTagName("base")[0],B=/\.css(?:\?|$)/i,F=+navigator.userAgent.replace(/.*(?:AppleWebKit|AndroidWebKit)\/(\d+).*/,"$1")<536;seajs.request=d;var P,V=/"(?:\\"|[^"])*"|'(?:\\'|[^'])*'|\/\*[\S\s]*?\*\/|\/(?:\\\/|[^\/\r\n])+\/(?=[^\/])|\/\/.*|\.\s*require|(?:^|[^$])\brequire\s*\(\s*(["'])(.+?)\1\s*\)/g,W=/\\\\/g,z=seajs.cache={},J={},Q={},Z={},ee=y.STATUS={FETCHING:1,SAVED:2,LOADING:3,LOADED:4,EXECUTING:5,EXECUTED:6};y.prototype.resolve=function(){for(var e=this,r=e.dependencies,t=[],n=0,o=r.length;o>n;n++)t[n]=y.resolve(r[n],e.uri);return t},y.prototype.load=function(){var e=this;if(!(e.status>=ee.LOADING)){e.status=ee.LOADING;var r=e.resolve();q("load",r);for(var t,n=e._remain=r.length,o=0;n>o;o++)t=y.get(r[o]),t.status<ee.LOADED?t._waitings[e.uri]=(t._waitings[e.uri]||0)+1:e._remain--;if(0===e._remain)return void e.onload();var i={};for(o=0;n>o;o++)t=z[r[o]],t.status<ee.FETCHING?t.fetch(i):t.status===ee.SAVED&&t.load();for(var a in i)i.hasOwnProperty(a)&&i[a]()}},y.prototype.onload=function(){var e=this;e.status=ee.LOADED,e.callback&&e.callback();var r,t,n=e._waitings;for(r in n)n.hasOwnProperty(r)&&(t=z[r],t._remain-=n[r],0===t._remain&&t.onload());delete e._waitings,delete e._remain},y.prototype.fetch=function(e){function r(){seajs.request(i.requestUri,i.onRequest,i.charset,i.crossorigin)}function t(){delete J[a],Q[a]=!0,P&&(y.save(o,P),P=null);var e,r=Z[a];for(delete Z[a];e=r.shift();)e.load()}var n=this,o=n.uri;n.status=ee.FETCHING;var i={uri:o};q("fetch",i);var a=i.requestUri||o;return!a||Q[a]?void n.load():J[a]?void Z[a].push(n):(J[a]=!0,Z[a]=[n],q("request",i={uri:o,requestUri:a,onRequest:t,charset:w(E.charset)?E.charset(a):E.charset,crossorigin:w(E.crossorigin)?E.crossorigin(a):E.crossorigin}),void(i.requested||(e?e[i.requestUri]=r:r())))},y.prototype.exec=function(){function require(e){return y.get(require.resolve(e)).exec()}var e=this;if(e.status>=ee.EXECUTING)return e.exports;e.status=ee.EXECUTING;var r=e.uri;require.resolve=function(e){return y.resolve(e,r)},require.async=function(e,n){return y.use(e,n,r+"_async_"+t()),require};var n=e.factory,exports=w(n)?n(require,e.exports={},e):n;return void 0===exports&&(exports=e.exports),delete e.factory,e.exports=exports,e.status=ee.EXECUTED,q("exec",e),exports},y.resolve=function(e,r){var t={id:e,refUri:r};return q("resolve",t),t.uri||seajs.resolve(t.id,r)},y.define=function(e,r,t){var n=arguments.length;1===n?(t=e,e=void 0):2===n&&(t=r,_(e)?(r=e,e=void 0):r=void 0),!_(r)&&w(t)&&(r=m(t.toString()));var o={id:e,uri:y.resolve(e),deps:r,factory:t};if(!o.uri&&L.attachEvent){var i=g();i&&(o.uri=i.src)}q("define",o),o.uri?y.save(o.uri,o):P=o},y.save=function(e,r){var t=y.get(e);t.status<ee.SAVED&&(t.id=r.id||e,t.dependencies=r.deps||[],t.factory=r.factory,t.status=ee.SAVED)},y.get=function(e,r){return z[e]||(z[e]=new y(e,r))},y.use=function(r,t,n){var o=y.get(n,_(r)?r:[r]);o.callback=function(){for(var exports=[],r=o.resolve(),n=0,i=r.length;i>n;n++)exports[n]=z[r[n]].exec();t&&t.apply(e,exports),delete o.callback},o.load()},y.preload=function(e){var r=E.preload,n=r.length;n?y.use(r,function(){r.splice(0,n),y.preload(e)},E.cwd+"_preload_"+t()):e()},seajs.use=function(e,r){return y.preload(function(){y.use(e,r,E.cwd+"_use_"+t())}),seajs},y.define.cmd={},seajs.Module=y,E.fetchedList=Q,E.cid=t,seajs.require=function(e){var r=y.get(y.resolve(e));return r.status<ee.EXECUTING&&(r.onload(),r.exec()),r.exports};var re=/^(.+?\/)(\?\?)?(seajs\/)+/;E.base=($.match(re)||["",$])[1],E.dir=$,E.cwd=R,E.charset="utf-8",E.preload=function(){var e=[],r=location.search.replace(/(seajs-\w+)(&|$)/g,"$1=1$2");return r+=" "+L.cookie,r.replace(/(seajs-\w+)=1/g,function(r,t){e.push(t)}),e}(),seajs.config=function(e){for(var r in e){var t=e[r],n=E[r];if(n&&b(n))for(var o in t)n[o]=t[o];else _(n)?t=n.concat(t):"base"===r&&("/"!==t.slice(-1)&&(t+="/"),t=f(t)),E[r]=t}return q("config",e),seajs};var te,ne=/\W/g;seajs.importStyle=function(e,r){if(!r||(r=r.replace(ne,"-"),!L.getElementById(r))){var t;if(!te||r?(t=L.createElement("style"),r&&(t.id=r),M.appendChild(t)):t=te,void 0!==t.styleSheet){if(L.getElementsByTagName("style").length>31)throw new Error("Exceed the maximal count of style tags in IE");t.styleSheet.cssText+=e}else t.appendChild(L.createTextNode(e));r||(te=t)}},e.define=y.define,e.require=seajs.require,e.use=seajs.use,svp.define=y.define,svp.require=seajs.require,svp.seajs=seajs}}(window),function(e){function r(e){var r=e.length;if(!(2>r)){g.comboSyntax&&(x=g.comboSyntax),g.comboMaxLength&&(_=g.comboMaxLength),E=g.comboExcludes;for(var t=[],o=0;r>o;o++){var i=e[o];if(!b[i]){var a=h.get(i);a.status<p&&!v(i)&&!d(i)&&t.push(i)}}t.length>1&&s(n(t))}}function t(e){e.requestUri=b[e.uri]||e.uri}function n(e){return i(o(e))}function o(e){for(var r={__KEYS:[]},t=0,n=e.length;n>t;t++)for(var o=e[t].replace("://","__").split("/"),i=r,a=0,s=o.length;s>a;a++){var u=o[a];i[u]||(i[u]={__KEYS:[]},i.__KEYS.push(u)),i=i[u]}return r}function i(e){for(var r=[],t=e.__KEYS,n=0,o=t.length;o>n;n++){for(var i=t[n],s=i,u=e[i],c=u.__KEYS;1===c.length;)s+="/"+c[0],u=u[c[0]],c=u.__KEYS;c.length&&r.push([s.replace("__","://"),a(u)])}return r}function a(e){for(var r=[],t=e.__KEYS,n=0,o=t.length;o>n;n++){var i=t[n],s=a(e[i]),u=s.length;if(u)for(var c=0;u>c;c++)r.push(i+"/"+s[c]);else r.push(i)}return r}function s(e){for(var r=0,t=e.length;t>r;r++)for(var n=e[r],o=n[0]+"/",i=f(n[1]),a=0,s=i.length;s>a;a++)u(o,i[a]);return b}function u(e,r){var t=e+x[0]+r.join(x[1]),n=t.length>_;if(r.length>1&&n){var o=c(r,_-(e+x[0]).length);u(e,o[0]),u(e,o[1])}else{if(n)throw new Error("The combo url is too long: "+t);for(var i=0,a=r.length;a>i;i++)b[e+r[i]]=t}}function c(e,r){for(var t=x[1],n=e[0],o=1,i=e.length;i>o;o++)if(n+=t+e[o],n.length>r)return[e.splice(0,o),e]}function f(e){for(var r=[],t={},n=0,o=e.length;o>n;n++){var i=e[n],a=l(i);a&&(t[a]||(t[a]=[])).push(i)}for(var s in t)t.hasOwnProperty(s)&&r.push(t[s]);return r}function l(e){var r=e.lastIndexOf(".");return r>=0?e.substring(r):""}function v(e){return E?E.test?E.test(e):E(e):void 0}function d(e){var r=g.comboSyntax||["??",","],t=r[0],n=r[1];return t&&e.indexOf(t)>0||n&&e.indexOf(n)>0}var h=seajs.Module,p=h.STATUS.FETCHING,g=seajs.data,m=function(){var e=!1;return e=svp&&svp.isCombo?!0:svp&&"auto"==svp.isCombo?/h5\.itc\.cn|t\.m\.tv\.sohu\.com/i.test(window.location.href):!1},y=m()||!1;if(y){var E,b=g.comboHash={},x=["??",","],_=200;if(seajs.on("load",r),seajs.on("fetch",t),g.test){var w=seajs.test||(seajs.test={});w.uris2paths=n,w.paths2hash=s}}}(window),function(e){function r(e){s[e.name]=e}function t(e){return e&&s.hasOwnProperty(e)}function n(e){for(var r in s)if(t(r)){var n=","+s[r].ext.join(",")+",";if(n.indexOf(","+e+",")>-1)return r}}function o(r,t){var n=e.XMLHttpRequest?new e.XMLHttpRequest:new e.ActiveXObject("Microsoft.XMLHTTP");return n.open("GET",r,!0),n.onreadystatechange=function(){if(4===n.readyState){if(n.status>399&&n.status<600)throw new Error("Could not load: "+r+", status = "+n.status);t&&t(n.responseText)}},n.send(null)}function i(r){try{r&&/\S/.test(r)&&(e.execScript||function(r){(e.eval||eval).call(e,r)})(r)}catch(t){console.log(t)}}function a(e){return e.replace(/(["\\])/g,"\\$1").replace(/[\f]/g,"\\f").replace(/[\b]/g,"\\b").replace(/[\n]/g,"\\n").replace(/[\t]/g,"\\t").replace(/[\r]/g,"\\r").replace(/[\u2028]/g,"\\u2028").replace(/[\u2029]/g,"\\u2029")}var s={},u={};r({name:"text",ext:[".tpl",".html"],exec:function(e,r){i('define("'+e+'#", [], "'+a(r)+'")')}}),r({name:"json",ext:[".json"],exec:function(e,r){i('define("'+e+'#", [], '+r+")")}}),r({name:"handlebars",ext:[".handlebars"],exec:function(e,r){var t=['define("'+e+'#", ["handlebars"], function(require, exports, module) {','  var source = "'+a(r)+'"','  var Handlebars = require("handlebars")["default"]',"  module.exports = function(data, options) {","    options || (options = {})","    options.helpers || (options.helpers = {})","    for (var key in Handlebars.helpers) {","      options.helpers[key] = options.helpers[key] || Handlebars.helpers[key]","    }","    return Handlebars.compile(source)(data, options)","  }","})"].join("\n");i(t)}}),seajs.on("resolve",function(e){var r=e.id;if(!r)return"";var o,i;(i=r.match(/^(\w+)!(.+)$/))&&t(i[1])?(o=i[1],r=i[2]):(i=r.match(/[^?]+(\.\w+)(?:\?|#|$)/))&&(o=n(i[1])),o&&-1===r.indexOf("#")&&(r+="#");var a=seajs.resolve(r,e.refUri);o&&(u[a]=o),e.uri=a}),seajs.on("request",function(e){var r=u[e.uri];r&&(o(e.requestUri,function(t){s[r].exec(e.uri,t),e.onRequest()}),e.requested=!0)})}(window);