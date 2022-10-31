<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model_controller extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('demo_model', 'cm');
	}

	public function index()
	{
		$this->config->load('list_items');
		$data['list_items'] = config_item('list_items');
		$this->load->view('custom_model_view',$data);
	}

	// GET ROWS FUNCTION DROPDWON DATA 
	public function get_rows()
	{
		$data = $this->cm->getrow();
		$output = [
			'data'  => $data,	
		];
		echo json_encode($output);	
	}

	// GET ROWS FUNCTION TABLE DATA
	public function get_values($data = '')
	{
		$input = $this->input->post('lastname');
		$data =$this->cm->getvalue($input);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);			
	}

	// GET ROWS SORTED FUNCTION 
	public function get_rows_sorted($data = '')
	{
		$r_id = $this->input->post('r_id');
		$data = $this->cm->sorted($r_id);
		$query = $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query	
		];
		echo json_encode($output);	
	}

	// GET ROW WHERE IN LIKE FUNCTION
	public function get_rows_where_in_like($data = '')
	{
		$r_id = $this->input->post('r_id');
		$data =$this->cm->get_Rows_Inlike($r_id);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}
	
	// GET SINGLE ROWS IN DATABASE DATA
	public function get_single_rows($data = '')
	{
		$r_id = $this->input->post('r_id');
		$data = $this->cm->get_Singlerow($r_id);
		$query = $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query	
		];
		echo json_encode($output);	
	}

	// TOTAL COUNT IN DATABASE DATA ROW
	public function get_total_count()
	{
		$data =$this->cm->total_count();
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	// GET COUNT FUNCTION 
	public function get_count($data = '')
	{
		$r_id = $this->input->post('r_id');
		$data =$this->cm->count($r_id);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	// SINGLE VALUE FUNCTION
	public function single_value($data = '')
	{
		$r_id = $this->input->post('r_id');
		$data=$this->cm->single($r_id);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	// INPUT ID RECORD ARE AVAILABLE OR NOT!
	public function check_avaibility($data = '')
	{
		$r_id = $this->input->post('r_id');
		$data =$this->cm->check($r_id);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	// FIND IN SET FUNCTION 
	public function find_in_set()
	{
		$data =$this->cm->find();
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	// RECORD INSERT AND SHOW
	public function insert_row()
	{
		$posted_data = $this->input->post();
		$insert_id = $this->cm->datainsert($posted_data);
		$query= $this->db->last_query();
		$where = array(
			'r_id' => $insert_id
		);
		$data =$this->cm->getRows('register',$where);
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	// RECORD UPDATE FUNCTION
	public function update_row($data = "")
	{
		$r_id = $this->input->post('r_id');
		$data =$this->cm->update_record($r_id);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	// RECORD DELETE FUNCTION 
	public function delete_row($data = "")
	{
		$r_id = $this->input->post('r_id');
		$data =$this->cm->delete_record($r_id);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	// JOIN TABLE DATA SHOW
	public function join()
	{
		$data =$this->cm->join_table();
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function left_join()
	{
		$join_condition=['register.r_id=register_age.id'];
		$data =$this->cm->getRowsWhereJoin('register',[],['register_age'],$join_condition, 'left');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function right_join()
	{
		$join_condition=['register.r_id=register_age.id'];
		$data =$this->cm->getRowsWhereJoin('register',[],['register_age'],$join_condition, 'right');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function full_join()
	{
		$join_condition=['register.r_id=register_age.id'];
		$data =$this->cm->getRowsWhereJoin('register',[],['register_age'],$join_condition, 'full');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function left_outer()
	{
		$join_condition=['register.r_id=register_age.id'];
		$data =$this->cm->getRowsWhereJoin('register',[],['register_age'],$join_condition, 'LEFT OUTER');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function right_outer()
	{
		$join_condition=['register.r_id=register_age.id'];
		$data =$this->cm->getRowsWhereJoin('register',[],['register_age'],$join_condition, 'RIGHT OUTER');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}
}