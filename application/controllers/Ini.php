<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ini extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		// load url helper
        $this->load->helper('url');

	}

	public function index()
	{
		redirect('home');
	}
}
