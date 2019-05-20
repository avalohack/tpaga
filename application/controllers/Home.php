<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->helper("url_helper");

		$this->load->helper('getRealIP_helper'); //ayuda que me permite identificar el usuario para que nos de informacion solo si va acomprar
		$this->user_session();

	}

	public function user_session(){
		$this->load->library('session');
		// if ($login==null) {
		// 	# code...
		// }
		// else{
			$user_session = array(
			     'session_id'    => $GLOBALS['_COOKIE']['ci_session'],
			     'ip_address'    => $GLOBALS['_SERVER']['REMOTE_ADDR'],
			     'user_agent'    => $GLOBALS['_SERVER']['HTTP_USER_AGENT'],
			     'last_activity' => '8888884',
			     'shopping'		 => $shopping = array(),
			);

		// }		
		$this->session->set_userdata($user_session);
	}

	public function index()
	{

		// echo "<pre>";
		// 	print_r(count($products) );
		// echo "<pre>";
		// exit();
		$this->load->model('home_model');

		$data['shopping'] = count($this->session->userdata('shopping'));
		$data['GetPlans']=$this->home_model->GetPlans();
		$this->load->view('home',$data);
	}
}
