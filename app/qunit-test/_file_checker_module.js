var checkerFile = (function(){
	
	
// let allow_ext_resume  = ["dcox","ocx","pdf"];
// let allow_ext_avatar  = ['png','jpg','jpeg'];

	
		return {
			checkFile:function(id,ext_resume){
				let name 		= document.getElementById(id);
			
				if(name.type == "file"){
					// let allow_file_ext = [".doc", ".docx", ".pdf"];
					let regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + ext_resume.join('|') + ")$");
					if(!regex.test(name.value.toLowerCase()))
						// alert(" wrong file formate,use " + ext_resume);
						name.value = "";
						return false;
					// else
					// 	return true;
					
				}
				// return true;	
			}
		}	
})();


