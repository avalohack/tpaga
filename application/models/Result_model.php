<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Result_model extends CI_Model{
	
	public function setResult($numMax,$IdUser,$jsonResult){	
		$vector =array('order_id'=>$numMax,
				  	   'IdUser'  =>$IdUser,
			     	   'result'  =>$jsonResult);		
		return $this->db->insert('result',$vector);
	}

}


