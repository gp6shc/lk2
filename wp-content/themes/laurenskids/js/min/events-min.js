function searchExpand(){socialLinks.classList.toggle("opacity-0"),quickLinks.classList.toggle("opacity-0"),searchBtn.classList.toggle("search-expand"),searchElems.classList.contains("display-none")?(searchBtn.classList.remove("fa-search"),searchBtn.classList.add("fa-times"),setTimeout(function(){searchElems.classList.toggle("opacity-1")},150),searchElems.classList.remove("display-none"),searchElems.firstElementChild.focus()):(searchBtn.classList.remove("fa-times"),searchBtn.classList.add("fa-search"),searchElems.classList.toggle("opacity-1"),setTimeout(function(){searchElems.classList.add("display-none")},300))}jQuery(document).ready(function($){function e(){s.toggleClass("sticky",(window.pageYOffset||document.scrollTop)>=1)}var s=$(document.body),t=$(window).width();t>800&&$(window).scroll(e)});var searchBtn=document.getElementById("js-search-btn"),socialLinks=document.getElementById("js-social"),quickLinks=document.getElementById("js-quick-links"),searchElems=document.getElementById("js-search-contain");searchBtn.addEventListener("mousedown",searchExpand,!1);var container=document.getElementById("site-navigation"),iconToggle=document.getElementById("js-icon-toggle");iconToggle.addEventListener("touchstart",function(){-1===container.className.indexOf("toggled")?(container.classList.add("toggled"),iconToggle.firstElementChild.style.opacity="0",iconToggle.lastElementChild.style.opacity="1"):(container.classList.remove("toggled"),iconToggle.lastElementChild.style.opacity="0",iconToggle.firstElementChild.style.opacity="1")},!1);