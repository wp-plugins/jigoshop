/*
	glDatePicker v1.3 - http://code.gautamlad.com/glDatePicker/
	Compiled using Google Closure Compiler - http://closure-compiler.appspot.com/home
*/
(function(c){var r={calId:0,cssName:"default",startDate:-1,endDate:-1,selectedDate:-1,showPrevNext:!0,allowOld:!0,showAlways:!1,position:"absolute"},j={init:function(a){return this.each(function(){var b=c(this),e=c.extend({},r);e.calId=b[0].id+"-gldp";a&&(e=c.extend(e,a));b.data("settings",e);b.click(j.show).focus(j.show);e.showAlways&&setTimeout(function(){b.trigger("focus")},50);c(document).bind("click",function(){j.hide.apply(b)})})},show:function(a){a.stopPropagation();j.hide.apply(c("._gldp").not(c(this)));
j.update.apply(c(this))},hide:function(){if(c(this).length){var a=c(this).data("settings");a.showAlways||(c("#"+a.calId).slideUp(200),c(this).removeClass("_gldp"))}},setStartDate:function(a){c(this).data("settings").startDate=a},setEndDate:function(a){c(this).data("settings").endDate=a},setSelectedDate:function(a){c(this).data("settings").selectedDate=a},update:function(){var a=c(this),b=a.data("settings"),e=b.calId,d=b.startDate;-1==b.startDate&&(d=new Date,d.setDate(1));d.setHours(0,0,0,0);var k=
d.getTime(),f=new Date(0);-1!=b.endDate&&(f=new Date(b.endDate),/^\d+$/.test(b.endDate)&&(f=new Date(d),f.setDate(f.getDate()+b.endDate)));f.setHours(0,0,0,0);var f=f.getTime(),h=new Date(0);-1!=b.selectedDate&&(h=new Date(b.selectedDate),/^\d+$/.test(b.selectedDate)&&(h=new Date(d),h.setDate(h.getDate()+b.selectedDate)));h.setHours(0,0,0,0);var h=h.getTime(),i=a.data("theDate"),i=-1==i||"undefined"==typeof i?d:i,m=new Date(i);m.setDate(1);var r=m.getTime(),d=new Date(m);d.setMonth(d.getMonth()+1);
d.setDate(0);var w=d.getTime(),t=d.getDate(),n=new Date(m);n.setDate(0);n=n.getDate();a.data("theDate",i);for(var d="",u=0,v=0;6>u;u++){for(var s="",q=0;7>q;q++,v++){var o=n-m.getDay()+v+1,p=o-n,g=0==q?"sun":6==q?"sat":"day";if(1<=p&&p<=t){o=new Date;o.setHours(0,0,0,0);var l=new Date(i);l.setHours(0,0,0,0);l.setDate(p);l=l.getTime();g=o.getTime()==l?"today":g;b.allowOld||(g=l<k?"noday":g);-1!=b.endDate&&(g=l>f?"noday":g);-1!=b.selectedDate&&(g=l==h?"selected":g)}else g="noday",p=0>=p?o:o-t-n;s+=
"<td class='gldp-days "+g+" **-"+g+"'><div class='"+g+"'>"+p+"</div></td>"}d+="<tr class='days'>"+s+"</tr>"}h=k<r||b.allowOld;k=w<f||f<k;b.showPrevNext||(h=k=!1);f="January,February,March,April,May,June,July,August,September,October,November,December".split(",")[i.getMonth()]+" "+i.getFullYear();k=("<div class='**'><table><tr>"+("<td class='**-prevnext prev'>"+(h?"\u25c4":"")+"</td>")+"<td class='**-monyear' colspan='5'>{MY}</td>"+("<td class='**-prevnext next'>"+(k?"\u25ba":"")+"</td>")+"</tr><tr class='**-dow'><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td></tr>"+
d+"</table></div>").replace(/\*{2}/gi,"gldp-"+b.cssName).replace(/\{MY\}/gi,f);0==c("#"+e).length&&a.after(c("<div id='"+e+"'></div>").css({"z-index":b.zIndex}));e=c("#"+e);e.html(k).slideDown(200);a.addClass("_gldp");c("[class*=-prevnext]",e).click(function(b){b.stopPropagation();if(""!=c(this).html()){var b=c(this).hasClass("prev")?-1:1,d=new Date(m);d.setMonth(i.getMonth()+b);a.data("theDate",d);j.update.apply(a)}});
c("tr.days td:not(.noday, .selected)",e).mouseenter(function(){var a="gldp-"+b.cssName+"-"+c(this).children("div").attr("class");c(this).removeClass(a).addClass(a+"-hover")}).mouseleave(function(){if(!c(this).hasClass("selected")){var a="gldp-"+b.cssName+"-"+c(this).children("div").attr("class");c(this).removeClass(a+"-hover").addClass(a)}}).click(function(b){b.stopPropagation();var b=c(this).children("div").html(),d=a.data("settings"),e=new Date(i);e.setDate(b);a.data("theDate",e);a.val(e.getMonth()+
1+"/"+e.getDate()+"/"+e.getFullYear());if(null!=d.onChange&&"undefined"!=typeof d.onChange)d.onChange(a,e);d.selectedDate=e;j.hide.apply(a)})}};c.fn.glDatePicker=function(a){if(j[a])return j[a].apply(this,Array.prototype.slice.call(arguments,1));if("object"===typeof a||!a)return j.init.apply(this,arguments);c.error("Method "+a+" does not exist on jQuery.glDatePicker")}})(jQuery);
(function($){
	$(document).ready(function(){
		// Set calendar widgets
		jigoshop_order_export_calendar_format($('#jigoshop-order-export-start-date'), new Date());
		jigoshop_order_export_calendar_format($('#jigoshop-order-export-end-date'), new Date());
		jigoshop_order_export_enable_calendar();
	});
})(jQuery);

function jigoshop_order_export_calendar_format(target, date){
	var d = date.getDate();
	var m = date.getMonth()+1;
	var y = date.getFullYear();
	target.val((d <= 9?'0'+d:d)+'-'+(m <=9 ?'0'+m:m)+'-'+y); // Formats as dd-MM-yyyy
}

function jigoshop_order_export_enable_calendar(){
	var $start = jQuery('#jigoshop-order-export-start-date');
	var $end = jQuery('#jigoshop-order-export-end-date');
	$start.removeAttr('disabled');
	$start.glDatePicker({
		allowOld: false,
		endDate: new Date(),
		onChange: jigoshop_order_export_calendar_format
	});
	$end.removeAttr('disabled');
	$end.glDatePicker({
		allowOld: false,
		endDate: new Date(),
		onChange: jigoshop_order_export_calendar_format
	});
}
