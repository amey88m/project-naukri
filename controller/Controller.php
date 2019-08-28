<?php 
/**
 * CONTROLLER BS
 */
class Controller
{
	

			// load view
			public function loadView($view)
			{
				require_once "./view/".$view.".php";
			}

			// load model
			public function loadModel($model)
			{
				require_once "model/".$model. ".php";
			}
			

			// load Errors
			public function loadError($err)
			{
				require_once "./view/errors/".$err.".php";
			}


			// load classes
			public function loadClasses($class)
			{
				require_once "./classes/".$class.".php";
			}


			
		
	
}


 ?>