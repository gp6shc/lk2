// Header switching

jQuery(document).ready(function($) {
	var docBody = $(document.body);
	var viewport = $(window).width();

	function addSticky() {
			docBody.toggleClass("sticky", (window.pageYOffset || document.scrollTop) >= 1);
		}
	
	if( viewport > 800 ) {
		$(window).scroll( addSticky ); 
	}
});

// Search expanding

var searchBtn = document.getElementById("js-search-btn");
var socialLinks = document.getElementById("js-social");
var quickLinks = document.getElementById("js-quick-links");
var searchElems = document.getElementById("js-search-contain");

function searchExpand() {
    socialLinks.classList.toggle("opacity-0"/* , "pointer-events-none" */);
    quickLinks.classList.toggle("opacity-0"/* , "pointer-events-none" */);
    searchBtn.classList.toggle("search-expand");
    
    if( searchElems.classList.contains("display-none") ) {
    	searchBtn.classList.remove("fa-search");
    	searchBtn.classList.add("fa-times");
    	setTimeout( function() {searchElems.classList.toggle("opacity-1");}, 150);
    	searchElems.classList.remove("display-none");
    	searchElems.firstElementChild.focus();			
    }else{
    	searchBtn.classList.remove("fa-times");
    	searchBtn.classList.add("fa-search");
    	searchElems.classList.toggle("opacity-1");
    	setTimeout( function() {searchElems.classList.add("display-none");}, 300);
    	
	}
}

searchBtn.addEventListener('mousedown', searchExpand , false);

//listen for click on menu icon 



// adds "toggle" class to #site-navigation

	var	container = document.getElementById( 'site-navigation' );

	var iconToggle = document.getElementById("js-icon-toggle");
	
	iconToggle.addEventListener( 'touchstart', function() {
		if ( container.className.indexOf( 'toggled' ) === -1 ) {
			container.classList.add("toggled");
			iconToggle.firstElementChild.style.opacity = "0";
			iconToggle.lastElementChild.style.opacity = "1";
		}else{
			container.classList.remove("toggled");
			iconToggle.lastElementChild.style.opacity = "0";
			iconToggle.firstElementChild.style.opacity = "1";

		}
	}, false);