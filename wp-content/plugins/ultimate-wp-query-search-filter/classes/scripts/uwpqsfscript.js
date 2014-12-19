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
		// function initMasonry() {
			var container = document.getElementById('lk-ajax');
			var msnry = new Masonry( container, {
				// options
				columnWidth: 237,
				gutter: 13,
				itemSelector: '.lk-post',
				isFitWidth: true,
				isInitLayout: false
			});
		//}
		
		window.process_data = function ($obj) {
			
			var ajaxURL = "/lk2/wp-admin/admin-ajax.php";
			var ajxdiv = $("#lk-ajax");
			var res = $('.loader');
			var getdata = $obj.closest("form").serialize();
			var pagenum = '1';
						
			jQuery.ajax({
				type: 'POST',	 
				url: ajaxURL,
				data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				beforeSend:function() {
					ajxdiv.addClass("opacity-0");
					res.removeClass("opacity-0");				 
				},
				success: function(html) {
					setTimeout(function() {
						res.addClass("opacity-0");
						debugger;
						setTimeout( function() {
							ajxdiv.html(html);

							msnry.reloadItems();
							msnry.layout();

							ajxdiv.removeClass("opacity-0");
						}, 150);
						
					}, 750);
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
