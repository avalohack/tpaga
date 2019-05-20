<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('getRealIP')){
	function getRealIP(){
		if (isset($_SERVER["HTTP_CLIENT_IP"])){
	        return $_SERVER["HTTP_CLIENT_IP"];
		}
	    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
	        return $_SERVER["HTTP_X_FORWARDED_FOR"];
	    }
	    elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
	        return $_SERVER["HTTP_X_FORWARDED"];
	    }
	    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
	        return $_SERVER["HTTP_FORWARDED_FOR"];
	    }
	    elseif (isset($_SERVER["HTTP_FORWARDED"])){
	        return $_SERVER["HTTP_FORWARDED"];
	    }
	    else    {
	        return $_SERVER["REMOTE_ADDR"];
   		 }

	}

}
else{
	return "tu helper esta mal revisa ";
}