<?php

class MY_Model extends CI_Model{

  protected $_table_name = '';
  protected $_primary_key = 'id';
  protected $_primary_filter = 'intval';
  protected $_order_by = '';
  protected $_timestamps = FALSE;
  public $rules = array();

  public function __construct() {
      parent::__construct();

  }

  public function array_from_post($fields){
    $data = array();
    foreach ($fields as $field) {
    $data[$field] = $this->input->post($field);
    }
    return $data;
  }

  public function get($id = NULL, $single = FALSE){
        $data;
        if($id!= NULL){
          $qr= 'SELECT * FROM '.$this->_table_name.' where '.$this->_primary_key.' = '.$id;
          $query = $this->db->query($qr);

          $data = $query->row();

        } else if($single == true){
          $query =  $this->db->get($this->_table_name);
           $data = $query->row();

        } else{
          if(!count($this->db->ar_orderby)){
            $this->db->order_by($this->_order_by);
          }
          $query =  $this->db->get($this->_table_name);
           $data = $query->result();
        }
        return $data;

	}

  public function get_by($where, $single = FALSE){
if(array_key_exists('email',$where) && array_key_exists('password',$where)){
        $this->db->where('password = \''.$where['password']. '\' AND email = \''.$where['email'].'\'');
}else{
  $this->db->where($where);
}
    return $this->get(NULL, $single);
  }

  public function insert($data, $id = NULL){
    //insert
    if($this->_timestamps == true){
      $now = date('Y-m-d H:i:s');
      $id || $data['created'] =  $now;
      $data['modified'] = $now;

    }
    if($id == NULL ){

      !isset($data[$this->_primary_key]) or $data[$this->_primary_key] = NULL;
      $this->db->insert($this->_table_name, $data);
      $this->db->insert_id();
   } else{
    //  update
     $filter = $this->_primary_filter;
      $id = $filter($id);

  //    $this->db->set($data);
      $this->db->where($this->_primary_key, $id);
      $this->db->update($this->_table_name, $data);
   }

   return $id;
  }

public function delete($id){
  $filter = $this->_primary_filter;
   $id = $filter($id);
   if($id){
  $this->db->where($this->_primary_key, $id);
  $this->db->limit(1);
  $this->db->delete($this->_table_name);
  return true;
}
  return false;
}






}
