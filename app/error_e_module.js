

let emp_err_module = (function(){
	
			// cache some variables
			var responsewrap  = document.querySelector('#response-wrap'),
						close = document.querySelector('.close');
			
			function hideMe()
			{
				responsewrap.classList.remove('active');
			}	

	return{
		
		alertDiv:function()
		{
			close.addEventListener('click', hideMe);
		}
	}

})();

emp_err_module.alertDiv()