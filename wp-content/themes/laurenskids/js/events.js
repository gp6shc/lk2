
// check if page is not at the top on ready
if ($(window).scrollTop() > 20) {
	$(document.body).addClass("sticky");
}

// Collapse header on scroll away from top
jQuery(document).ready(function($) {
	var docBody = $(document.body);
	var LKVideo = document.getElementById('js-video');
	
	function changeVideo(doThis) {
		if (doThis === "pause") {
			if (!videoHome.paused) {
				videoHome.pause();
			}
		}else if (doThis === "play") {
			if (videoHome.paused) {
				videoHome.play();
			}
		}
	}	

	if (LKVideo) {
		var videoHome = LKVideo.firstElementChild;
		var videoWrapperHeight = LKVideo.offsetHeight;
  
		/*
var playAgain = function() {
			videoHome.currentTime = 0;
			console.log("looped");
		};
		setInterval(playAgain, ((videoHome.duration * 1000) - 450));
*/
	}

// Add class "sticky" or "pinky" (mobile) when not scrolled to the top
$(window).scroll(function(){
 	if (window.innerWidth > 767) {
		docBody.toggleClass("sticky", window.pageYOffset >= 25 );
		if (window.pageYOffset >= (videoWrapperHeight + 320)) {
			changeVideo("pause");
		}else{
			changeVideo("play");
		}
	}else{
		docBody.toggleClass("pinky", window.pageYOffset >= 25 );
	}
});

});


// Search expanding

var searchBtn = document.getElementById("js-search-btn");
var socialLinks = document.getElementById("js-social");
var quickLinks = document.getElementById("js-quick-links");
var searchElems = document.getElementById("js-search-contain");

function searchExpand(e) {
	e.preventDefault();
    socialLinks.classList.toggle("opacity-0");
    quickLinks.classList.toggle("opacity-0");
    searchBtn.classList.toggle("search-expand");
    
    if( searchElems.classList.contains("opacity-0") ) {
    	searchBtn.classList.remove("fa-search");
    	searchBtn.classList.add("fa-times");
    	setTimeout( function() {searchElems.classList.toggle("opacity-1");}, 150);
    	searchElems.classList.toggle("opacity-0");
	   	searchElems.firstElementChild.focus();
    }else{
    	searchBtn.classList.remove("fa-times");
    	searchBtn.classList.add("fa-search");
    	searchElems.classList.toggle("opacity-1");
		setTimeout( function() {searchElems.classList.toggle("opacity-0");}, 150);
    	
	}
}

searchBtn.addEventListener('click', searchExpand , false);

// listen for click on menu icon 
// adds "toggled" class to #site-navigation

	var	container = document.getElementById( 'site-navigation' );
	var iconToggle = document.getElementById( 'js-icon-toggle' );
	
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
		e.parentNode.classList.toggle('opened');
	};
	
	for (var i = 0; i < faqs.length; i++) {
		faqs[i].firstElementChild.addEventListener('click', function() { openFAQ(this); }, false);
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
				mailingFields[i].removeAttribute("tabindex");
				
			}
		}else{
			mailingSection.classList.remove('loose');
			for (var j = 0; j < mailingFields.length; j++) {
				mailingFields[j].setAttribute("tabindex", "-1");
				mailingFields[j].removeAttribute("required");
			}
		}
	};

	topic.addEventListener('change', onSelectionChange, false);
}