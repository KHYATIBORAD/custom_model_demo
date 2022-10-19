<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model_controller extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('custom_model', 'cm');
	}

	public function index()
	{
		$this->load->view('custom_model_view');
	}

	public function get_rows()
	{
		$where=array(
			'f_id'=>'1'
		);
		$data =$this->cm->getRows('user_feedback',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function get_rows_sorted()
	{
		$where=array(
			'f_id'=>'5'
		);
		$data =$this->cm->getRowsSorted('user_feedback',$where,'','user_comment');
		$query= $this->db->last_query();

		$output = [
			'data'  => $data,
			'query' => $query
		];

		echo json_encode($output);	
	}

	public function get_rows_where_in_like()
	{
		$where=array(
			'f_id'=>'2'
		);
		$data =$this->cm->getRowsWhereInLike('user_feedback',$where,'','user_comment');
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
			'f_id'=>'2'
		);
		$data =$this->cm->getDistinctRows('user_feedback',$where,'','user_comment');
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
			'f_id'=>'2'
		);
		$data['userdata'] =$this->cm->getSingleRow('user_feedback',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function get_total_count()
	{
		$data =$this->cm->getTotalCount('user_feedback');
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
			'f_id'=>'2'
		);
		$data =$this->cm->getCount('user_feedback',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function insert_row()
	{
		$data=array(
			'user_comment'=>'good'
		);
		$data =$this->cm->insertRow('user_feedback',$data);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function update_row()
	{
		$data=array(
			'user_comment'=>'very good'
		);
		$where=array(
			'f_id'=>'6'
		);
		$data =$this->cm->updateRow('user_feedback',$data,$where);
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
			'f_id'=>'7'
		);
		$or_where=array(
			'f_id'=>'7'
		);
		$data =$this->cm->deleteRow('user_feedback',$where,$or_where);
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
			'f_id'=>'6'
		);
		$data['userdata'] =$this->cm->getSingleValue('user_feedback','user_comment',$where);
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
			'f_id'=>'6'
		);
		$data =$this->cm->checkAvailability('user_feedback',$where);
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function find_in_set()
	{
		$data =$this->cm->findInSet('user_feedback','user_comment','good');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}

	public function join()
	{
		$where=array(
			'f_id'=>'6'
		);
		$data =$this->cm->getRowsWhereJoin('user_feedback',$where,'');
		$query= $this->db->last_query();
		$output = [
			'data'  => $data,
			'query' => $query
		];
		echo json_encode($output);	
	}
}
