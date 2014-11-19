jQuery(document).ready(function($) {
	
		$('body').on('click','.usearchbtn', function(e) {
			process_data($(this));
			return false;
		});
	
		$('body').on('click','.upagievent', function(e) {
			var pagenumber =  $(this).attr('id');
			var formid = $('#curuform').val();
			upagi_ajax(pagenumber, formid);
			return false;
		});

		$('body').on('keypress','.uwpqsftext',function(e) {
		  if(e.keyCode == 13){
		    e.preventDefault();
		    process_data($(this));
		  }
		});
		
		window.process_data = function ($obj) {
			
			var ajxdiv = $obj.closest("form").find("#uajaxdiv").val();	
			var res = $('.loader');
			var getdata = $obj.closest("form").serialize();
			var pagenum = '1';
						
			jQuery.ajax({
				type: 'POST',	 
				url: ajax.url,
				data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				beforeSend:function() {
					$(''+ajxdiv+'').fadeOut(300);
					res.fadeIn(150);
					//console.log(({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }));
					 
					},
				success: function(html) {
					setTimeout(function() {
						$(''+ajxdiv+'').html(html).fadeIn(300);
						res.fadeOut(150);
					}, 250);

				 }
				 });
			
		}	
		
		window.upagi_ajax = function (pagenum, formid) {
			var ajxdiv = $(''+formid+'').find("#uajaxdiv").val();	
			var res = $('.loader');
			var getdata = $(''+formid+'').serialize();
		
			jQuery.ajax({
				type: 'POST',	 
				url: ajax.url,
				data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				beforeSend:function() {
					 $(''+ajxdiv+'').fadeOut(300);
					 res.fadeIn(150);
					 $('html, body').animate({scrollTop : 360}, 500);
				},
					
				success: function(html) {
					setTimeout(function() {
						$(''+ajxdiv+'').html(html).fadeIn(300);
						res.fadeOut(150);
					}, 250);
				}
			});
		}
		
	 $('body').on('click', '.chktaxoall,.chkcmfall',function () {
	
	    $(this).closest('.togglecheck').find('input:checkbox').prop('checked', this.checked);
		
         });
         
	process_data(jQuery('form[id*="uwpqsffrom_"]'));

});//end of script
