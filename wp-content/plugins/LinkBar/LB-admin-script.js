jQuery(document).ready(function($){
    $('.my-color-field').wpColorPicker();
});


var LBCheckboxes = document.getElementsByClassName('service-check');
var shortcodeResult = document.getElementById('shortcode-result');


function updateShortCode() {
    var LBService = this.children[0].firstChild.value;
    var LBServiceShortcode = (" "+LBService+'=1');
    var LBSearch = shortcodeResult.value.search(LBServiceShortcode);
	var newShortcodeResult = "";
    
    if( LBSearch === -1 ) {
    	newShortcodeResult = shortcodeResult.value.replace(']', '');
    	newShortcodeResult += (LBServiceShortcode + "]");
    	shortcodeResult.value = newShortcodeResult;
    }else{
		newShortcodeResult = shortcodeResult.value.replace(LBServiceShortcode, '');
    	shortcodeResult.value = newShortcodeResult;
    }
}

for( var i = 0; i < LBCheckboxes.length; i++) {
    LBCheckboxes[i].addEventListener('change', updateShortCode, false);
}

document.getElementById('shortcode-container').addEventListener('click', function() {
    	shortcodeResult.select();
}, false);