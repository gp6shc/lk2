// Header switching

jQuery(document).ready(function() {
  jQuery(window).scroll(function () {
    var scrolled = jQuery(this).scrollTop();
	var viewport = jQuery(window).width();
	var masthead = jQuery("#masthead");
	var top_area = jQuery(".top-area");
	var logo = jQuery(".logo");
	//var menu = jQuery(".menu-toggle");
	    //when we scroll past 70
        if (scrolled > 70 && viewport > 800) { 
			masthead.addClass('stickyhead');
			logo.addClass('small');
			top_area.css({'display':'none'});
		//when we scroll back up
		} else if (scrolled < 70 && viewport > 800) { 
			masthead.removeClass('stickyhead');
			logo.removeClass('small');
			top_area.css({'display':'block'});	
		//<800 viewport, remove stickyhead and use media queries to style
		} else if (viewport < 800) { 	
			masthead.removeClass('stickyhead');
		} else {
		}			
  });
});

	
//listen for click on menu icon 
jQuery(document).ready(function() {
    jQuery('.fa-bars').click(function() {		
		if (jQuery(this).hasClass('fa-bars')) {
		    jQuery(this).removeClass('fa-bars').addClass('fa-times');
		} else {
		    jQuery(this).removeClass('fa-times').addClass('fa-bars');
		    
		}
    });    
});

// Search expanding