/*
	IE7, version 0.8 (alpha) (2005/05/23)
	Copyright: 2004-2005, Dean Edwards (http://dean.edwards.name/)
	License: http://creativecommons.org/licenses/LGPL/2.1/
*/
if(appVersion<5.5){ANON="HTML:!";var ap=function(f,o,a){f.apply(o,a)};if(''.replace(/^/,String)){var _0=String.prototype.replace;var _1=function(e,r){var m,n="",s=this;while(s&&(m=e.exec(s))){n+=s.slice(0,m.index)+ap(r,this,m);s=s.slice(m.lastIndex)}return n+s};String.prototype.replace=function(e,r){this.replace=(typeof r=="function")?_1:_0;return this.replace(e,r)}}if(!Function.apply){var APPLY="apply-"+Number(new Date);ap=function(f,o,a){var r;o[APPLY]=f;switch(a.length){case 0:r=o[APPLY]();break;case 1:r=o[APPLY](a[0]);break;case 2:r=o[APPLY](a[0],a[1]);break;case 3:r=o[APPLY](a[0],a[1],a[2]);break;case 4:r=o[APPLY](a[0],a[1],a[2],a[3]);break;default:var aa=[],i=a.length-1;do aa[i]="a["+i+"]";while(i--);eval("r=o[APPLY]("+aa+")")}delete o[APPLY];return r};ICommon.valueOf.prototype.inherit=function(){return ap(arguments.callee.caller.ancestor,this,arguments)}}if(![].push)Array.prototype.push=function(){for(var i=0;i<arguments.length;i++){this[this.length]=arguments[i]}return this.length};if(![].pop)Array.prototype.pop=function(){var i=this[this.length-1];this.length--;return i};if(isHTML){HEADER+="address,blockquote,body,dd,div,dt,fieldset,form,"+"frame,frameset,h1,h2,h3,h4,h5,h6,iframe,noframes,object,p,"+"hr,applet,center,dir,menu,pre,dl,li,ol,ul{display:block}"}}
/* compressed with http://dean.edwards.name/packer/ */