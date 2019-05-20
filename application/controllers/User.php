<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->helper("url_helper");
	}

	public function index()
	{
		$this->load->view('user');
		//echo "hola";
	}
	public function shopping()
	{
		$this->load->view('shopping');
	}
}
