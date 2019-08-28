<?php 

	function __autoload($classname)
	{
		if(file_exists("controller/".$classname.".php")):
			require_once "controller/".$classname.".php";
		elseif(file_exists("controller/candidate/".$classname.".php")):
			require_once "controller/candidate/".$classname.".php";
		elseif(file_exists("controller/empl/".$classname.".php")):
			require_once "controller/empl/".$classname.".php";
		elseif(file_exists("controller/hr/".$classname.".php")):
			require_once "controller/hr/".$classname.".php";
		elseif(file_exists("model/".$classname.".php")):
			require_once "model/".$classname.".php";	
		elseif(file_exists("model/candidate/".$classname.".php")):
			require_once "model/candidate/".$classname.".php";
		elseif(file_exists("model/email/".$classname.".php")):
			require_once "model/email/".$classname.".php";
		elseif(file_exists("model/empl/".$classname.".php")):
			require_once "model/empl/".$classname.".php";
		elseif(file_exists("model/hr/".$classname.".php")):
			require_once "model/hr/".$classname.".php";
		elseif(file_exists("classes/".$classname.".php")):
			require_once "classes/".$classname.".php";
		endif;
	}



 ?>