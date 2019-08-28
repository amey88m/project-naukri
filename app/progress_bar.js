

		function progressBar(e)
		{
			let active_bar 	  = document.querySelector('.active-bar');
			let form 		  = document.querySelector('.registerCandidateForm');
			let info 		  = document.querySelectorAll('.info');
			let bar 		  = document.querySelector('.progress-bar');
			let li 			  = bar.querySelectorAll('li');
			var target 		  = module_g.getEventTarget(e);	
			let current = target.parentNode,
				next = target.parentNode.nextElementSibling;

			
			let info_array = [];
			for(let i=0; i<li.length; i++){
				info_array.push(li[i]);
			}

			info_array.filter((ele,index)=>{
				
				if(info[index].classList.contains('activeMe') == true)
					li[index].classList.add('active-bar')
			});

			// hide current
			current.classList.remove('activeMe');

			// show next
			next.classList.add('activeMe');

			
		}

