	
	function setFile(datasource)
	{

		let xhr = new XMLHttpRequest;

		if(xhr)
		{
			xhr.open('GET','app/'+datasource+'.js',true,'admin','123');
			// XMLHttpRequestObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');

			xhr.onreadystatechange = function()
			{
				if(xhr.readyState == 4 && xhr.status == 200)
				{
					eval(xhr.responseText)
				}
			}
			xhr.send(null);
		}
	}
	