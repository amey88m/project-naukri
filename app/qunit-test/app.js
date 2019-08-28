// targe module
let module_g = (function(){
		
	return{
		getEventTarget:function(e)
		{
			e = e || window.event;
			return e.target || e.srcElement;		
		}
	}	

})();
