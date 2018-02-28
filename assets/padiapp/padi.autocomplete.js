/*
 * by Puji W Prayitno (puji@padi.net.id)
 * PadiNET -- Surabaya 2014
 * License : GPL v 3
 * */
$.fn.autocomp = function(options){
	var settings = $.extend({
		data:'',
		bindElement:'',
		position:0,
		},options);
	var liSelected,thiselement;
	thiselement = $(this);
	thiselement.bind('focus',function(){
		$(this).select();
	});
	thiselement.bind('keyup',function(e){
		code = e.which;
		if((code!==40)&&(code!==38)&&(code!==13)){
			settings.bindElement.find('ul#padiDropDown').empty();
			$.each(settings.data,function(key,val){
				if(val.indexOf(thiselement.val())>=0){
					settings.bindElement
					.find('ul#padiDropDown')
					.append('<li key='+key+' class="padiLiSuggestion">'+val+'</li>');
					$('.padiLiSuggestion').bind('mouseover',function(){
						$(this).addClass('selected');
					});
					$('.padiLiSuggestion').bind('mouseout',function(){
						$(this).removeClass('selected');
					});
					$('.padiLiSuggestion').bind('click',function(){
						thiselement.val($(this).text());
						thiselement.attr('key',$(this).attr('key'));
						settings.bindElement.find('ul#padiDropDown').empty();
					});
				}
			});
		}
		if(code===13){
			ss = settings.bindElement.find('ul#padiDropDown li.selected');
			thiselement.val(ss.text());
			thiselement.attr('key',ss.attr('key'));
			settings.bindElement.find('ul#padiDropDown').empty();
		}
	});
	thiselement.bind('keydown',function(e){
		//thiselement = $(this);
		li = settings.bindElement.find('ul#padiDropDown li');
		code = e.which;
		if(code===40){
			if(liSelected){
				liSelected.removeClass('selected');
				next = liSelected.next();
				if(next.length > 0){
					liSelected = next.addClass('selected');
				}else{
					liSelected = li.eq(0).addClass('selected');
				}
			}else{
				liSelected = li.eq(0).addClass('selected');				
			}
		}else	if(code===38){
			if(liSelected){
				liSelected.removeClass('selected');
				next = liSelected.prev();
				if(next.length > 0){
					liSelected = next.addClass('selected');
				}else{
					liSelected = li.last().addClass('selected');
				}
			}else{
				liSelected = li.last().addClass('selected');
			}
		}
	});
	settings.bindElement.find('ul#padiDropDown').remove();
	settings.bindElement.append('<div class="widget-main"><ul id="padiDropDown"></ul></div>');
	return thiselement;
}
