<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reversepay_model extends CI_Model{	
	
	public function setReversePay($reversePay){
		return $this->db->inser('reversepay',$reversePay);
	}

}


