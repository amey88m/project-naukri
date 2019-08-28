// candidate error module
let err_module = (function(){
	
	
			let errorMssg 	  = document.querySelector('#cl_error'),
				error_msg	  = document.querySelector('.cl_error_msg');


			let user = {
				u_name:document.querySelector('.firstname'),
				u_f:document.querySelector('.fathername')
			}

	

	return{
		errorMssgBtn:errorMssg,
		showErrorMssg:function(val)
		{
			errorMssg.classList.add('showerror');
			output = new Error(val);
			error_msg.innerText = output + " " +"is empty";
			return;
		},
		hideErrorMssg:function()
		{
			errorMssg.classList.remove('showerror');
		}
	}


})();


