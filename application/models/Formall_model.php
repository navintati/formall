<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formall_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function search($limit, $offset, $sort_by, $sort_order)
	{

		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		$sort_columns = array('CustomerID', 'CustomerName', 'Address', 'City', 'PostalCode', 'Country');
		$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'CustomerName';

		// Results query
		// $query = $this->db->select('*')
		// 				  ->from('customer')
		// 				  ->limit($limit, $offset);

		// $rest['rows'] = $query->get()->result();
		
		// Count query
		$query = $this->db->select('COUNT(*) as count', FALSE)
					  ->from('customer');

		$tmp = $query->get()->result();

		$rest['num_rows'] = $tmp[0]->count;

		// Search Box
		$query = $this->db->select("*")
						  ->from("customer")
						  ->like('CustomerName')
						  ->or_like('Address')
						  ->or_like('City')
						  ->or_like('PostalCode')
						  ->or_like('Country')
						  ->limit($limit, $offset)
						  // ->order_by('CustomerID', 'DESC');
						  ->order_by($sort_by, $sort_order);

		$rest['search'] = $query->get();
		// $rest['search'] = $query->get()->result();



		return $rest;

	}

	// public function fetch_data($query)
	// {
	// 	$this->db->select("*");
	// 	$this->db->from("customer");
	// 	// $this->db->where("Flag", '1');
	// 	if ($query != '') 
	// 	{
	// 		$this->db->like('CustomerName', $query);
	// 		$this->db->or_like('Address', $query);
	// 		$this->db->or_like('City', $query);
	// 		$this->db->or_like('PostalCode', $query);
	// 		$this->db->or_like('Country', $query);
	// 	}
	// 	$this->db->order_by('CustomerID', 'DESC');
	// 	return $this->db->get();
		
	// }

	public function fetch_data($query)
	{
		$query = $this->db->select("*")
						  ->from("customer")
						  ->like('CustomerName', $query)
						  ->or_like('Address', $query)
						  ->or_like('City', $query)
						  ->or_like('PostalCode', $query)
						  ->or_like('Country', $query)
						  ->order_by('CustomerID', 'DESC')
						  ->get();
		
	}




}