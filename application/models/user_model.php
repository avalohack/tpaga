<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
	
	public function getUser(){
		
		$email = $this->input->post('inputEmail');  
		
		$sql=" SELECT * FROM users";
		$sql.=" WHERE email = '".$email."'";
		$query=$this->db->query($sql);
		return $query->result_array();	
	}

	public function setUser(){	

    $Email=$this->input->post('inputEmail');
    $Password=sha1($this->input->post('inputPassword'));
    $data = array(
        'Email'   =>$Email,
        'Password'=>$Password,
        'tipo' 	  =>'0',
    );

    $this->db->insert('users',$data);
}	

	// 	// INSERT INTO `users` (`email`, `password`, `IdUser`, `tipo`) VALUES ('a@a.com', SHA1('avalo'), NULL, '0');
	// 	echo $item;
	// 	exit();
	// 	return $query->result_array();	
	// }
}


