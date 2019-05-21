<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	public function user_session(){
		$this->load->library('session');
		// if ($login==null) {
		// 	# code...
		// }
		// else{
		if (isset($GLOBALS['_COOKIE']['ci_session'])) {
			$cookie=$GLOBALS['_COOKIE']['ci_session'];
		}
		else{
			$cookie= "navegador_anonimo".rand();
		}
			$user_session = array(
			     'session_id'    => $cookie,
			     'ip_address'    => $GLOBALS['_SERVER']['REMOTE_ADDR'],
			     'user_agent'    => $GLOBALS['_SERVER']['HTTP_USER_AGENT'],
			     'last_activity' => '8888884',
			     'shopping'		 => $shopping = array(),
			);

		// }		
		$this->session->set_userdata($user_session);
	}

}