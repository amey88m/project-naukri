(function($){

// get an dom element
var indexWrap 	= document.querySelector('.index-wrap'),i,target,
	btn 		= document.querySelectorAll('.btn_w');

indexWrap.onclick = signupElement;

function signupElement(event){
	target = module_g.getEventTarget(event);
	if(target.matches('.btn_w') || target.mozMatches('.btn_w') || target.webKitMatches('.btn_w')) {
		window.location.href = target.dataset.attr;
		return;
	}
}	


})(jQuery);



