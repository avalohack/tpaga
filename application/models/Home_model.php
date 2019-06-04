<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model{
	
	public function GetPlans(){
		$sql=" SELECT * FROM `plans` ";
		$query=$this->db->query($sql);
		return $query->result_array();	
	}
	public function GetPlans_iten($item){		
		$sql=" SELECT * FROM plans ";
		$sql.= " WHERE ".$item;
		$query=$this->db->query($sql);
		return $query->result_array();	
	}
}


