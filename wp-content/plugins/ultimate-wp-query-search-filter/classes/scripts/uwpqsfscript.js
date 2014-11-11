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
			// var res = {loader:$('<div />',{'class':'umloading'}),container : $(''+ajxdiv+'')};
		
			var getdata = $obj.closest("form").serialize();
			var pagenum = '1';
			
			// res.container.append(res.loader);
			
			jQuery.ajax({
				type: 'POST',	 
				url: ajax.url,
				data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				beforeSend:function() {
					$(''+ajxdiv+'').fadeOut(500);
					// res.loader.fadeIn(150);
					 
					},
				success: function(html) {
					$(''+ajxdiv+'').html(html).fadeIn(500);
					// res.loader.fadeOut(150);

				 }
				 });
			
		}	
		
		window.upagi_ajax = function (pagenum, formid) {
			var ajxdiv = $(''+formid+'').find("#uajaxdiv").val();	
			// var res = {loader:$('<div />',{'class':'umloading'}),container : $(''+ajxdiv+'')};
			var getdata = $(''+formid+'').serialize();
		
			jQuery.ajax({
				 type: 'POST',	 
				 url: ajax.url,
				 data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				 beforeSend:function() {
					 $(''+ajxdiv+'').empty();
					 // res.container.append(res.loader);
					 $('html, body').animate({scrollTop : 360}, 500);
					 },
				 success: function(html) {
				  // res.container.find(res.loader).remove();
				  $(''+ajxdiv+'').html(html);
				
				//res.container.find(res.loader).remove();
				 }
				 });
		}
		
	 $('body').on('click', '.chktaxoall,.chkcmfall',function () {
	
	    $(this).closest('.togglecheck').find('input:checkbox').prop('checked', this.checked);
		
         });
         
	process_data(jQuery('#uwpqsffrom_119'));

});//end of script
