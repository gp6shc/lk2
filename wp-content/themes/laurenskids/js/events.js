
// check if page is not at the top on ready
if ($(window).scrollTop() > 20) {
	$(document.body).addClass("sticky");
}

// Collapse header on scroll away from top
jQuery(document).ready(function($) {
	var miliseconds = 0; // uptime in seconds
	setInterval(function() {miliseconds++;}, 1);
	
	var viewport = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	var docBody = $(document.body);
	var LKVideo = document.getElementById('js-video');
	var videoController = document.getElementById('js-controller');
	
	function changeVideo(doThis) {
		if (doThis === "pause") {
			if (!videoHome.paused) {
				videoHome.pause();
				videoController.classList.remove("fa-pause");
				videoController.classList.add("fa-play");
			}
		}else if (doThis === "play") {
			if (videoHome.paused) {
				videoHome.play();
				videoController.classList.remove("fa-play");
				videoController.classList.add("fa-pause");
			}
		}
	}
	
	function toggleVideo() {
		if (!videoHome.paused) {
			videoHome.pause();
			videoController.classList.remove("fa-pause");
			videoController.classList.add("fa-play");
		}else{
			videoHome.play();
			videoController.classList.remove("fa-play");
			videoController.classList.add("fa-pause");
		}
	}
	
	if (LKVideo) {
		var videoWrapperHeight = LKVideo.offsetHeight;
		var videoHome = LKVideo.firstElementChild;
		
		videoHome.addEventListener("canplaythrough", function() {
			//alert('ready @ '+miliseconds);
		}, false);
		
		LKVideo.addEventListener("click", toggleVideo, false);
		videoController.addEventListener("click", toggleVideo, false);
	}
	
	if (viewport > 800 ) {
		if (LKVideo) {
			$(window).scroll(function(){
				docBody.toggleClass("sticky", window.pageYOffset >= 20 );
				if (window.pageYOffset >= (videoWrapperHeight + 320)) {
					changeVideo("pause");
				}else{
					changeVideo("play");
				}
			});
		}else{
			$(window).scroll(function(){
				docBody.toggleClass("sticky", window.pageYOffset >= 25 );

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

if (archiveBtn) {
	var archiveList =  document.getElementById('js-archive-list');
	
	archiveBtn.addEventListener('click', function() {
		archiveList.classList.toggle('open');
	}, false);
}

// lisiten for click on FAQ blocks

var faqs = document.getElementsByClassName('faq');

if (faqs.length > 0) {
	
	var openFAQ = function(e) {
		e.classList.toggle('opened');
	};
	
	for (var i = 0; i < faqs.length; i++) {
		faqs[i].addEventListener('click', function() { openFAQ(this); }, false);
	}
	
}

// open mail contact section if inquiry requests materials and require those fields

var topic = document.getElementById('topic');

if (topic) {
	
	var onSelectionChange = function() {
		var mailingSection = document.getElementById('js-mailing-section'); 
		var selectedOption = topic.options[topic.selectedIndex];
		var mailingFields = document.getElementsByClassName('js-mail-field');
		
		if(selectedOption.value === "Materials Request") {
			mailingSection.classList.add('loose');
			for (var i = 0; i < mailingFields.length; i++) {
				mailingFields[i].setAttribute("required", "required");
				
			}
		}else{
			mailingSection.classList.remove('loose');
			for (var j = 0; j < mailingFields.length; j++) {
				mailingFields[j].removeAttribute("required");
			}
		}
	};

	topic.addEventListener('change', onSelectionChange, false);
}