<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
	
	public function getUser(){
		
		$email = $this->input->post('inputEmail');  
		
		$sql=" SELECT Email FROM users";
		$sql.=" WHERE email = '".$email."'";
		$query=$this->db->query($sql);
		return $query->result_array();	
	}

	public function setUser(){	
        $Email 	  =$this->input->post('inputEmail');
        $Password =sha1($this->input->post('inputPassword'));
        if($this->input->post('Nickname')){
        	$Nickname =$this->input->post('Nickname');
        }
        else{
        	$Nickname = null;
        }
        $Phone = $this->input->post('inputPhone');        	
        $data = array(
            'Email'   =>$Email,
            'Password'=>$Password,
            'tipo' 	  =>'0',
            'Nickname'=>$Nickname,
            'Phone'	  =>$Phone,
        );
        $this->db->insert('users',$data);
    }	
    public function getUserLogin(){
        $Email    =$this->input->post('inputEmail');
        $Password    =sha1($this->input->post('inputPassword'));

        $sql= " SELECT * from users ";
        $sql.=" where (Email  = '".$Email."'  or Nickname = '".$Email."')";
        $sql.=" and Password  = '".$Password."'";
        $query=$this->db->query($sql);
        return $query->result_array();  
    } 

}


