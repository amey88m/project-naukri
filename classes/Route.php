<?php 
class Route
{
	
	private static $validroute = Array();

		

		public static function set_route($uri, $function)
		{
			
			$validroute[] = $uri;

			// remove ext.
			$new_url = explode('.', $_GET['url']);

			// remove white spaces
			$new_uri = str_replace(' ', '', $new_url);


			if($new_url[0] == $uri):
				return $function->__invoke();
			endif;

		}

}


?>