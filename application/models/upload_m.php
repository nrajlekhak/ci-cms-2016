<?php

/**
 *
 */
class Upload_m extends MY_Model{

  protected $_table_name = 'carousel';

  protected $_rules = array();
  protected $_order_by = 'id';



  public $rules = array(
    'id' => array(
      'field' => 'id',
      'label' => 'id',
      'rules' => 'trim|intval'
    ),
    'filename' => array(
      'field' => 'filename',
      'label' => 'filename',
      'rules' => 'trim|required|xss_clean'
    ),
    'file_ext' => array(
      'field' => 'file_ext',
      'label' => 'file_ext',
      'rules' => 'trim|required|xss_clean'
    ),
    'file_caption' => array(
      'field' => 'file_caption',
      'label' => 'file_caption',
      'rules' => 'trim|required|xss_clean'
    ),
    'file_desc' => array(
      'field' => 'file_desc',
      'label' => 'file_desc',
      'rules' => 'trim|required|xss_clean'
    ),
  );
public  function __construct(){
    parent::__construct();


  }

public function get_new(){
  $carousel = new stdClass();
  $carousel->filename= '';
  $carousel->file_ext = '';
  $carousel->file_caption = '';
  $carousel->file_desc = '';


  return $carousel;
}
}
