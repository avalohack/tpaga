<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invoices_model extends CI_Model{
	
	// public function setUser(){
	// 	$sql=" SELECT * FROM `plans` ";
	// 	$query=$this->db->query($sql);
	// 	return $query->result_array();	
	// }
	public function setUser($item){		
		echo $item;
		exit();
		return $query->result_array();	
	}
	public function getNumMax(){
		$sql = 'SELECT order_id FROM invoices';
		$sql.= ' WHERE `order_id` =';
		$sql.= ' (SELECT MAX( `order_id` )  FROM invoices)';
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	public function setInvoices($tpaga){
		//return $this->db->insert($tabla,$documento);

	}
}


