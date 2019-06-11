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
	public function setInvoices($tpaga,$IdUser){
		unset($tpaga['purchase_items']);//limpiamos el elemento donde iran los itens para tpaga 
		$x=['IdUser'=>$IdUser];
		$tpaga = $tpaga + $x;
		return $this->db->insert('invoices',$tpaga);
	}

	public function setInvoicesDetail($key){
		return $this->db->insert('invoicedetail',$key);
	}

	public function setInvoicePay($numInvoice){
		$data = array('pay' => '1');
		$this->db->where('order_id', $numInvoice);
		return $this->db->update('invoices',$data);
	}

	public function getInvoices(){
		$data = $this->session->userdata('Usuario');

		// $sql = 'SELECT * FROM invoices';
		// $sql.= ' WHERE IdUser  = ';
		// $sql.= $data['IdUser'];
		// $sql.= ' and';
		// $sql.= ' pay = 1';

		$sql = 'SELECT * FROM invoices';
		$sql.= ' inner JOIN invoicedetail';
		$sql.= ' on invoices.order_id = invoicedetail.order_id';
		$sql.= ' WHERE IdUser  = ';
		$sql.= $data['IdUser'];
		$sql.= ' and';
		$sql.= ' pay = 1';

		$query=$this->db->query($sql);
		return $query->result_array();
	}
}


