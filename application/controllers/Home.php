<?php
// https://payment-links.docs.tpaga.co/quickstart.html
// https://payment-links.docs.tpaga.co/quickstart.html#pyos-delivery-label
// http://jsonviewer.stack.hu/
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		// load url helper
        $this->load->helper('url');
		// load Session Library
        $this->load->library('session');
	}

	// public function user_session(){
	// 	// if (isset($GLOBALS['_COOKIE']['ci_session'])) {
	// 	// $cookie=$GLOBALS['_COOKIE']['ci_session'];
	// 	// }
	// 	// else{
	// 	// 	$cookie= "navegador_anonimo".rand();
	// 	// }	
	// 	// 	$user_session = array(
	// 	// 		     'session_id'    => $cookie,
	// 	// 		     'ip_address'    => $GLOBALS['_SERVER']['REMOTE_ADDR'],
	// 	// 		     'user_agent'    => $GLOBALS['_SERVER']['HTTP_USER_AGENT'],
	// 	// 		     'last_activity' => '88888845',
	// 	// 	);	
	// 	// 	$this->session->set_userdata($user_session);
	// }
	
	public function addSession(){
		$items = $this->input->post('items');
		$user_session = array('shopping' => array($items));
		$this->session->set_userdata($user_session);
	}



	public function index()
	{
		// echo "<pre>";
		// 	print_r($this->session->userdata());
		// echo "</pre>";

		$this->load->model('home_model');
		if($this->session->userdata('shopping')){
			$data['shopping'] = count(explode(',',$this->session->userdata('shopping')['0']));
		}
		else{
			$data['shopping']= 0;
		}
		
		$data['GetPlans']=$this->home_model->GetPlans();
		$this->load->view('home',$data);
	}
}
