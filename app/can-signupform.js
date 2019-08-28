/* form submit function */

function signupForm()
{
	
	let resp, 
		reg_form_res = document.getElementById('registration_form_res'),
		
		xhr = new XMLHttpRequest;

	if(xhr)
		xhr.open('POST','candidate-signup-success',true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

			xhr.onreadystatechange=function()
			{
				if(xhr.readyState== 4 && xhr.status==200 ){
					resp = xhr.responseText;
					reg_form_res.innerHTML = resp;
				}
			}
		xhr.send($('form').serialize());

}