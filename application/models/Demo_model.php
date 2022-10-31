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

    public function get_Singlerow($data = '')
    {
        $where = [ 'r_id' => $data];
        return $this->my_model->getSingleRow('register',$where,'array');
    }

    public function total_count()
    {
        return $this->my_model->getTotalCount('register');
    }

    public function count($data = "")
    {
        $where = [ 'r_id' => $data];
        return $this->my_model->getCount('register', $where);
    }

    public function single($data = "")
    {
        $where = [ 'r_id' => $data];
        return $this->my_model->getSingleValue('register','lastname',$where);
    }
    
    public function check($data = "")
    {
        $where = [ 'r_id' => $data];
        return $this->my_model->checkAvailability('register',$where);
    }

    public function find()
    {
        return $this->my_model->findInSet('register','firstname','khyati');
    }

    public function datainsert($data = "")
    {
        return $this->my_model->insertRow('register',$data);
    }

     public function update_record($id = "")
    {
        $data=array(
            'firstname'=>'kridha'
        );
        $where = [ 'r_id' => $id];
        return $this->my_model->updateRow('register',$data,$where);
    }

    public function delete_record($data = "")
    {
        $where = [ 'r_id' => $data];
        return $this->my_model->deleteRow('register',$where);
    }

    public function join_table()
    {
        $join_condition=['register.r_id=register_age.id'];
        return $this->my_model->getRowsWhereJoin('register',[],['register_age'],$join_condition,'');
    }
}
?>