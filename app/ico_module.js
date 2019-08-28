// icon module
let ico_module = (function(){

				let loginEyeSlash 	= document.querySelector('.loginEyeSlash'),
					loginEye 		= document.querySelector('.loginEye'),
					loginEyeSlash2 	= document.querySelector('.loginEyeSlash_2'),
					loginEye2 		= document.querySelector('.loginEye_2');

				let config = {
					eyeSlash: loginEyeSlash,
					eye:loginEye,
					eyeSlash2: loginEyeSlash2,
					eye2:loginEye2
				}

	
	return {

		eye_slash: config.eyeSlash,
		eye_catch: config.eye,
		eye_slash2: config.eyeSlash2,
		eye_catch2: config.eye2,


		changeTotxt:function()
		{
			config.eyeSlash.style.display = "none";
			config.eyeSlash.previousElementSibling.style.display = "block";
			config.eyeSlash.nextElementSibling.setAttribute('type', 'text');
		},
		changeTopassword:function()
		{
			config.eye.style.display = "none";
			config.eye.nextElementSibling.style.display = "block";
			config.eye.nextElementSibling.nextElementSibling.setAttribute('type', 'password');
		},
		changeTotxt2:function()
		{
			config.eyeSlash2.style.display = "none";
			config.eyeSlash2.previousElementSibling.style.display = "block";
			config.eyeSlash2.nextElementSibling.setAttribute('type', 'text')
		},
		changeTopassword2:function()
		{
			config.eye2.style.display = "none";
			config.eye2.nextElementSibling.style.display = "block";
			config.eye2.nextElementSibling.nextElementSibling.setAttribute('type', 'password');
		}


	}

})();

ico_module.eye_slash.addEventListener('click', ico_module.changeTotxt);
ico_module.eye_catch.addEventListener('click', ico_module.changeTopassword);
ico_module.eye_slash2.addEventListener('click', ico_module.changeTotxt2 );
ico_module.eye_catch2.addEventListener('click', ico_module.changeTopassword2 );

