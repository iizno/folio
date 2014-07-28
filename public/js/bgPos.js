(function($){var g=!!$.Tween;if(g){$.Tween.propHooks['backgroundPosition']={get:function(a){return parseBackgroundPosition($(a.elem).css(a.prop))},set:setBackgroundPosition}}
else{$.fx.step['backgroundPosition']=setBackgroundPosition};
function parseBackgroundPosition(c){var d=(c||'').split(/ /);var e={center:'50%',left:'0%',right:'100%',top:'0%',bottom:'100%'};
var f=function(a){var b=(e[d[a]]||d[a]||'50%').match(/^([+-]=)?([+-]?\d+(\.\d*)?)(.*)$/);d[a]=[b[1],parseFloat(b[2]),b[4]||'px']};if(d.length==1&&$.inArray(d[0],['top','bottom'])>-1){d[1]=d[0];d[0]='50%'}f(0);f(1);return d}
function setBackgroundPosition(a){if(!a.set){initBackgroundPosition(a)}$(a.elem).css('background-position',((a.pos*(a.end[0][1]-a.start[0][1])+a.start[0][1])+a.end[0][2])+' '+((a.pos*(a.end[1][1]-a.start[1][1])+a.start[1][1])+a.end[1][2]))}
function initBackgroundPosition(a){a.start=parseBackgroundPosition($(a.elem).css('backgroundPosition'));a.end=parseBackgroundPosition(a.end);for(var i=0;i<a.end.length;i++){if(a.end[i][0]){a.end[i][1]=a.start[i][1]+(a.end[i][0]=='-='?-1:+1)*a.end[i][1]}}a.set=true}})(jQuery);

function getBackgroundPos(obj) {
  var pos = obj.css('background-position');
  if (pos == 'undefined' || pos == null) {
    // for IE, because it doesn`t know background-position
    pos = [obj.css('background-position-x'),obj.css('background-position-y')];
  }
  else {
    pos = pos.split(' ');
  }
  return {
    x: parseFloat(pos[0]),
    xUnit: pos[0].replace(/[0-9-.]/g, ''),
    y: parseFloat(pos[1]),
    yUnit: pos[1].replace(/[0-9-.]/g, '')
  };
}