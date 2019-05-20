<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->helper("url_helper");
		$this->load->library('session');
// $user_anonimo = array(
// 			     'session_id'    => random hash,
// 			     'ip_address'    => 'string - user IP address',
// 			     'user_agent'    => 'string - user agent data',
// 			     'last_activity' => timestamp
// 			)
		// http://blog.unijimpe.net/obtener-direccion-ip-con-php/
	}

	public function index()
	{
		// echo "<pre>";
		// 	print_r($_SERVER['REMOTE_ADDR']);
		// echo "<pre>";

		// exit();
		$this->load->model('home_model');
		$data['GetPlans']=$this->home_model->GetPlans();
		$this->load->view('home',$data);
	}
}
