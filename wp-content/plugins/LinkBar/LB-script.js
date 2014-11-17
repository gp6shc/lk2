var LBInput = document.getElementById('LB-url-to-select');
if( LBInput !== null ) {
	LBInput.parentNode.addEventListener('mouseup', function() {
	    LBInput.classList.toggle('LB-display-none');
	    LBInput.select();
	}, false);
	
	window.addEventListener('keydown', function (e) {
		if (e.keyCode === 67) {
			LBInput.style.backgroundColor = "#1ada41";
			LBInput.style.color = "#ffffff";
			setTimeout( function() { 
				LBInput.style.backgroundColor = LBInput.parentNode.style.backgroundColor;
				LBInput.style.color = LBInput.parentNode.style.color;
			}, 1800);
		}
	}, false);
}
