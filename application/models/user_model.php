<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
	
	public function getUser(){
		
		echo $email = $this->input->post('inputEmail');  
		
		$sql=" SELECT * FROM users";
		$sql.=" WHERE email = '".$email."'";
		$query=$this->db->query($sql);
		return $query->result_array();	
	}
	public function setUser(){	

    $inputEmail=$this->input->post('inputEmail');
    $inputPassword=sha1($this->input->post('inputPassword'));
    $data = array(
        'OrderLines'=>$OrderLines,
        'CustomerName'=>$CustomerName
    );

    $this->db->insert('Customer_Orders',$data);
}	

		// INSERT INTO `users` (`email`, `password`, `IdUser`, `tipo`) VALUES ('a@a.com', SHA1('avalo'), NULL, '0');
		echo $item;
		exit();
		return $query->result_array();	
	}
}


