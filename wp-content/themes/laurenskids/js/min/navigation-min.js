!function(){var e,n,a;if(e=document.getElementById("site-navigation"),e&&(n=e.getElementsByTagName("button")[0],"undefined"!=typeof n)){if(a=e.getElementsByTagName("ul")[0],"undefined"==typeof a)return void(n.style.display="none");-1===a.className.indexOf("nav-menu")&&(a.className+=" nav-menu"),n.onclick=function(){-1!==e.className.indexOf("toggled")?e.className=e.className.replace(" toggled",""):e.className+=" toggled"}}}();