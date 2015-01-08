
// check if page is not at the top on ready
if ($(window).scrollTop() > 20) {
	$(document.body).addClass("sticky");
}

// Collapse header on scroll away from top
jQuery(document).ready(function($) {
	var docBody = document.body;
	var docBodyJQ = $('body');
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
		
		videoHome.addEventListener('play', function() {
			docBody.style.opacity = 1;
		});
		
		if (window.innerWidth <= 1024) {
			docBody.style.opacity = 1;
			
		}
	}

// Add class "sticky" or "pinky" (mobile) when not scrolled to the top
	$(window).scroll(function(){
	 	if (window.innerWidth > 767) {
			docBodyJQ.toggleClass('sticky', window.pageYOffset >= 25);
			
			if (LKVideo) {
				if (window.pageYOffset >= (videoWrapperHeight + 320)) {
					changeVideo("pause");
				}else{
					changeVideo("play");
				}
			}
		}else{
			if (docBody.classList.contains( 'sticky' )) {		
				docBody.classList.remove('sticky');
			}
			docBodyJQ.toggleClass('pinky', window.pageYOffset >= 25);
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

;(function( $ ){

  'use strict';

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null,
      ignore: null
    };

    if(!document.getElementById('fit-vids-style')) {
      // appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
      var head = document.head || document.getElementsByTagName('head')[0];
      var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
      var div = document.createElement("div");
      div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
      head.appendChild(div.childNodes[1]);
    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        'iframe[src*="player.vimeo.com"]',
        'iframe[src*="youtube.com"]',
        'iframe[src*="youtube-nocookie.com"]',
        'iframe[src*="kickstarter.com"][src*="video.html"]',
        'object',
        'embed'
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var ignoreList = '.fitvidsignore';

      if(settings.ignore) {
        ignoreList = ignoreList + ', ' + settings.ignore;
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not('object object'); // SwfObj conflict patch
      $allVideos = $allVideos.not(ignoreList); // Disable FitVids on this video.

      $allVideos.each(function(){
        var $this = $(this);
        if($this.parents(ignoreList).length > 0) {
          return; // Disable FitVids on this video.
        }
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width'))))
        {
          $this.attr('height', 9);
          $this.attr('width', 16);
        }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+'%');
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );

$(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $(".entry-content").fitVids();
});