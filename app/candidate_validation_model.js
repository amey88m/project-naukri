let validateInputs = (function(){
	
		
		let	firstname 	  = document.querySelector('.firstname').value,
			fathername 	  = document.querySelector('.fathername').value,
			lastname  	  = document.querySelector('.lastname').value,
			
			resume 		  = document.querySelector('.candidate_resume'),
			avatar 		  = document.querySelector('.candidate_avatar'),

			qualification = document.querySelector('.qualification'),
			otherqul 	  = document.querySelector('.otherqualification'),

			course 		  = document.querySelector('.course'),
			self_desc 	  = document.querySelector('.selfDesc'),

			username 	  = document.querySelector('.username'),
			useremail 	  = document.querySelector('.email'),
			userpassword  = document.querySelector('.password'),

			form 		  = document.querySelector('.registerCandidateForm'),
			formCandidateLoginWrap  = document.querySelector('.login-form'),
			bar 		  = document.querySelector('.progress-bar'),
			li 			  = bar.querySelectorAll('li'),
			info 		  = document.querySelectorAll('.info'),
			active_bar 	  = document.querySelector('.active-bar'),
			errorcloseIco = document.querySelector('.cl_error_ico'),
			output, target, next, current, prev;


			let user = {
				// first : firstname,
				// father : fathername,
				// last : lastname,
				username : username,
				email : useremail,
				pass  : userpassword
			};

		return{

			// check for empty fields
			checkEmptyInput:function()
			{
				let input = document.querySelectorAll('input');
				
				let myinput = new Array();	
				
				for(var i=0; i<input.length; i++){
					console.log(myinput.push(input[i]));
				}

				// if(user.first == 0)
				// 	console.log('empty first name')
			}

		}

	})();



validateInputs.checkEmptyInput();