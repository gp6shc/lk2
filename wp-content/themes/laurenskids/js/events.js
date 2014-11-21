// Header switching

jQuery(document).ready(function($) {
	var viewport = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	var docBody = $(document.body);
	var LKVideo = document.getElementById('js-video');
	
	if (LKVideo !== null) {
		var videoWrapperHeight = LKVideo.offsetHeight;
		var videoHome = LKVideo.firstElementChild;
	}
/*
	var deBouncer = function($,cf,of, interval){
	    // deBouncer by hnldesign.nl
	    // based on code by Paul Irish and the original debouncing function from John Hann
	    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	    var debounce = function (func, threshold, execAsap) {
	        var timeout;
	        return function debounced () {
	            var obj = this, args = arguments;
	            function delayed () {
	                if (!execAsap) {
	                    func.apply(obj, args);
	                }
	                timeout = null;
	            }
	            if (timeout) {
	                clearTimeout(timeout);
	            }else if (execAsap) {
	                func.apply(obj, args);
	            }
	            timeout = setTimeout(delayed, threshold || interval);
	        };
	    };
	    jQuery.fn[cf] = function(fn){  return fn ? this.bind(of, debounce(fn)) : this.trigger(cf); };
	};
	
	deBouncer(jQuery,'smartscroll', 'scroll', 1);
*/
	

	if ($(window).scrollTop() > 20) {
		docBody.addClass("sticky");
	}

		
	if (viewport > 800 ) {
		if (LKVideo !== null) {
			$(window).scroll(function(){
				docBody.toggleClass("sticky", window.pageYOffset >= 20 );
				if (window.pageYOffset >= videoWrapperHeight) {
					if (!videoHome.paused) {
						videoHome.pause();
					}
				}else{
					if (videoHome.paused) {
						videoHome.play();
					}
				}
			});
		}else{
			$(window).scroll(function(){
				docBody.toggleClass("sticky", window.pageYOffset >= 20 );
				
			});
			
		}
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

if (Math.max(document.documentElement.clientWidth, window.innerWidth || 0) > 800) {
	searchBtn.addEventListener('click', searchExpand , false);
	
}else{
	searchBtn.addEventListener('touchstart', searchExpand , false);
	
}

// listen for click on menu icon 
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
	
// listen for click on Archive button in sidebar.php to open the list of archives

var archiveBtn = document.getElementById('js-archive-btn');

if (archiveBtn !== null) {
	var archiveList =  document.getElementById('js-archive-list');
	
	archiveBtn.addEventListener('click', function() {
		archiveList.classList.toggle('open');
	}, false);
}


