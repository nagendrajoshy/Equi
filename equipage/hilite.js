// Highlight Words Script
// copyright Stephen Chapman, 17th January 2007
// you may copy this script provided that you retain the copyright notice

var kw = [];
var qsParm = []; function qs() {var query = window.location.search.substring(1); var parms = query.split('&'); for (var i=0; i < parms.length; i++) {var pos = parms[i].indexOf('='); if (pos > 0) {var key = parms[i].substring(0,pos); var val = parms[i].substring(pos+1); qsParm[key] = val;}}} qsParm['hilite'] = null; qs();
if (qsParm['hilite'] != null) kw = qsParm['hilite'].split(',');
function start() {var bdy = document.getElementsByTagName('body')[0].innerHTML; for (var i = kw.length - 1; i >= 0; i--) {var re = new RegExp('(\\b'+kw[i]+'\\b)','ig'); bdy = bdy.replace(re,'<span class="hl">$1<\/span>'); var re1 = new RegExp('(<[^>]*?)<span class="hl">('+kw[i]+')<\/span>(.*?>)','ig'); bdy = bdy.replace(re1,'$1$2$3');var re2 = new RegExp('(<script.*?>)<span class="hl">('+kw[i]+')<\/span>(<\/script>)','ig'); bdy = bdy.replace(re2,'$1$2$3'); var re3 = new RegExp('(<textarea.*?>)<span class="hl">('+kw[i]+')<\/span>(<\/textarea>)','ig'); bdy = bdy.replace(re3,'$1$2$3');} document.getElementsByTagName('body')[0].innerHTML = bdy;}
window.onload = start;
                  