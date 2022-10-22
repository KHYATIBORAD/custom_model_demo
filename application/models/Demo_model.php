<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model');
        
    }

    public function getrow()
    {
        return $this->my_model->getDistinctRows('register','lastname',[],[]);
    }

     public function getvalue($data = '')
    {
        // $input = $this->input->post('lastname');
        $where = [ 'lastname' => $data];
        return $this->my_model->getRows('register', $where, [], null, '*');
    }

    public function sorted($data = '')
    {
        $where = [ 'r_id' => $data];
        return $this->my_model->getRowsSorted('register',$where,[],'firstname');
    }

    public function get_Rows_Inlike($data = "")
    {
        $where = [ 'r_id' => $data];
        return $this->my_model->getRowsWhereInLike('register', $where);
    }

    
}
?>