<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formall extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('formall_model', 'formd');

	}

	public function display($sort_by = 'CustomerName', $sort_order = 'asc', $offset = 0)
	{

		$limit = 50;

		// Title Click Acs and Desc
		$data['fields'] = array(
				'CustomerID' => 'CustomerID',
				// 'Sr.no' => 'Sr.no',
				'CustomerName' => 'CustomerName', 
				'Address' => 'Address', 
				'City' => 'City', 
				'PostalCode' => 'PostalCode', 
				'Country' => 'Country'
		);

		$result = $this->formd->search($limit, $offset, $sort_by, $sort_order);

		// echo "<pre>"; print_r($data['fields']); echo "</pre>"; die();
		// $data['films'] = $result['rows'];
		$data['num_results'] = $result['num_rows'];
		$data['searchall'] = $result['search'];
		// echo "<pre>"; print_r($data['searchall']); echo "</pre>"; die(' PREE DATA ');
		// if ($data['searchall']->num_rows() > 0) {
			// foreach ($data['searchall']->result() as $row) {
			// 	$data['film'] = $row;
			// }
		// }

		// Pagination
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url('formall/display/'.$sort_by.'/'.$sort_order);
		// echo "<pre>"; print_r($config['base_url']); echo "</pre>"; die();
		$config['total_rows'] = $data['num_results'];
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['num_tag_open'] = '&nbsp;';
		$config['num_tag_close'] = '&nbsp;';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['prev_link'] = '<';
		$config['next_link'] = '>';
		$config['prev_tag_open'] = '&nbsp;';
		$config['prev_tag_close'] = '&nbsp;';
		$config['next_tag_open'] = '&nbsp;';
		$config['next_tag_close'] = '&nbsp;';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;

		$this->load->view('includes/header');
		$this->load->view('formlist', $data);
		$this->load->view('includes/footer');
		
	}

	// public function fetch()
	// {
	// 	$data = true;
	// 	//echo "<pre>"; print_r($_POST); echo "</pre>"; die(' PREE DATA ');
	// 	$query = "";

	// 	if ($this->input->post('query')) 
	// 	{
	// 		$query = $this->input->post('query');
	// 	}
	// 	$data = $this->formd->fetch_data($query);

	// 	if ( $data->num_rows() == 0 ) 
	// 	{
	// 		foreach ($data->result() as $row) 
	// 		{
	// 			// echo "<pre>"; print_r($row); echo "</pre>"; die(' PREE DATA ');
	// 			$data['mainrow'] = $row;
	// 		}
	// 		// echo "<pre>"; print_r($data); echo "</pre>"; die(' PREE DATA ');
	// 		//$data['zero'] = "No Records Found!!!";
	// 	}

	// }





}