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
		
		// Inintialize Masonry instance
		var container = document.querySelector('#lk-ajax');
		var msnry = new Masonry( container, {
			// options
			columnWidth: 250,
			itemSelector: '.lk-post'
		});
		
		window.process_data = function ($obj) {
			
			var ajaxURL = "/lk2/wp-admin/admin-ajax.php";
			var ajxdiv = $obj.closest("form").find("#uajaxdiv").val();	
			var res = $('.loader');
			var getdata = $obj.closest("form").serialize();
			var pagenum = '1';
						
			jQuery.ajax({
				type: 'POST',	 
				url: ajaxURL,
				data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				beforeSend:function() {
					$(''+ajxdiv+'').fadeOut(300);
					res.fadeIn(150);
					
					//console.log(({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }));					 
					},
				success: function(html) {
					setTimeout( function() {
						res.fadeOut(150);
						setTimeout( function() {
							$(''+ajxdiv+'').html(html).fadeIn(300);
						
							msnry.reloadItems();
							msnry.layout();
						}, 150);
						
					}, 250);

				 }
			});
		}	
		
		window.upagi_ajax = function (pagenum, formid) {
			
			var ajaxURL = "/lk2/wp-admin/admin-ajax.php";
			var ajxdiv = $(''+formid+'').find("#uajaxdiv").val();	
			var res = $('.loader');
			var getdata = $(''+formid+'').serialize();
		
			jQuery.ajax({
				type: 'POST',	 
				url: ajaxURL,
				data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				beforeSend:function() {
					$(''+ajxdiv+'').fadeOut(300);
					res.fadeIn(150);
					

					$('html, body').animate({
						scrollTop: ($('#lk-ajax').offset().top - 210)
					}, 1000);
				},
					
				success: function(html) {
					setTimeout(function() {
						res.fadeOut(150);
						setTimeout( function() {
							$(''+ajxdiv+'').html(html).fadeIn(300);
						
							msnry.reloadItems();
							msnry.layout();
						}, 150);
						
					}, 750);
					
				}
			});
		}
		
	$('body').on('click', '.chktaxoall,.chkcmfall',function () {
		$(this).closest('.togglecheck').find('input:checkbox').prop('checked', this.checked);	
	});
	
	
	$('form[id*="uwpqsffrom_"]').change(function(){ process_data($(this)); })

	process_data($('form[id*="uwpqsffrom_"]'));

});//end of script
