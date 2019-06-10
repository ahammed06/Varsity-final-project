(function($){
	
	$.fn.previewForm = function(options){
		var form_settings = $.extend({
			identifier         : 'label',
			show_password        : true,
			extratext    : 'Do You Want To submit',
			yes	 : 'yes',
			no	 : 'no',
			title	 : 'Please preview'			
		}, options);
				
			var dia_log;	
			var renderBUTTON;
			var this_frm;
			this_frm = $(this);
		
	$(this).submit(function (){

	if($('#pfomdata').length){
						return true;
					}
		
		
		dia_log="";
		var needle_cnfrm;
	
		if(this.id.length > 0){ needle_cnfrm = '#'+this.id+' label'; }
		else  { needle_cnfrm = '.'+$(this).attr('class')+' label'; }
		
	$(needle_cnfrm).each(function(i,val) { 
		if($(this).text().length >2){
			
	what_t= $('#'+$(this).attr('for')) ;

	}
		});
		dia_log = dia_log.replace('undefined', '');
		
		
		renderBUTTON="";
		renderBUTTON += '<a href="javascript:void(0);" class="button form_yes">'+form_settings.yes+'<span></span></a>';
		renderBUTTON += '<a href="javascript:void(0);" class="button form_no">'+form_settings.no+'<span></span></a>';
		
		var renderTemplate = [
			'<div id="previewOverlay">',
			'<div id="previewBox">',
			'<h1>',form_settings.title,'</h1>',
			'<p>',dia_log,'</p>',
			'<p>',form_settings.extratext,'</p>',
			'<div id="previewButtons">',
			renderBUTTON,
			'</div></div></div>'
		].join('');
		
		$(renderTemplate).hide().appendTo('body').fadeIn();
		
	$(".form_yes") .click(function(){ 
			var input = $("<input>").attr("type", "hidden").attr("id", "pfomdata").val("true");
				this_frm.append($(input));
				this_frm.submit();
			});
			
	$(".form_no") .click(function(){
				$('#previewOverlay').fadeOut(function(){
				$(this).remove();
					});
			});
					
	return false;
			
		});
	}
	
})(jQuery);