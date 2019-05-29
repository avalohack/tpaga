<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Result_model extends CI_Model{
	
	public function setResult($numMax,$IdUser,$tpaga_payment_url){	
		$vector =array('order_id'=>$numMax,
				  	   'IdUser'  =>$IdUser,
			     	   'result'  =>$tpaga_payment_url);		
		return $this->db->insert('result',$vector);
	}

}


