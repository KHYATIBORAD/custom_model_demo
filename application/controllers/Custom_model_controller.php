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
	public function get_values($data = ''){
		$input = $this->input->post('lastname');
		$data =$this->cm->getvalue($input);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);			
	}

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

	public function get_distinct_rows()
	{
		$where=array(
			'r_id'=>'4'
		);
		$data =$this->cm->getDistinctRows('register',$where,'','country');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function get_single_rows()
	{
		$where=array(
			'r_id'=>'6'
		);
		$data['userdata'] =$this->cm->getSingleRow('register',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function get_total_count()
	{
		$data =$this->cm->getTotalCount('register');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function get_count()
	{
		$where=array(
			'r_id'=>'1'
		);
		$data =$this->cm->getCount('register',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function insert_row()
	{
		$data=[
			'firstname'=>'dwit',
			'lastname'=>'borad',
			'password'=>'123',
			'contact'=>'9087654321',
			'email'=>'dwit@mailinator.com',
			'gender'=>'male',
			'country'=>'india'
		];
		$insert_id =$this->cm->insertRow('register',$data);
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

	public function update_row()
	{
		$data=array(
			'firstname'=>'kridha'
		);
		$where=array(
			'r_id'=>'2'
		);
		$data =$this->cm->updateRow('register',$data,$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function delete_row()
	{
		$where=array(
			'r_id'=>'8'
		);
		$data =$this->cm->deleteRow('register',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function single_value()
	{
		$where=array(
			'r_id'=>'6'
		);
		$data['userdata'] =$this->cm->getSingleValue('register','lastname',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function check_avaibility()
	{
		$where=array(
			'r_id'=>'3'
		);
		$data =$this->cm->checkAvailability('register',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function find_in_set()
	{
		$data =$this->cm->findInSet('register','firstname','khyati');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function join()
	{
		$join_condition=['register.r_id=register_age.id'];
		$data =$this->cm->getRowsWhereJoin('register',[],['register_age'],$join_condition);
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