<?php

  class Articles_m extends MY_Model{

    protected $_table_name = 'articles';
    protected $_order_by = 'pubdate desc, id desc';
    protected $_rules = array();
    protected $_timestamps = TRUE;
    public $rules = array(
      'pubdate' => array(
  			'field' => 'pubdate',
  			'label' => 'publication date',
  			'rules' => 'trim|required|extract_length[10]|xss_clean'
  		),
  		'title' => array(
  			'field' => 'title',
  			'label' => 'title',
  			'rules' => 'trim|required|max_length[100]|xss_clean'
  		),
      'slug' => array(
  			'field' => 'slug',
  			'label' => 'slug',
  			'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
  		),

      'body' => array(
  			'field' => 'body',
  			'label' => 'body',
  			'rules' => 'trim|required'
  		),
  	);


    public function get_new(){
      $articles = new stdClass();
      $articles->title = '';
      $articles->slug = '';
      $articles->body = '';
      $articles->pubdate = date('Y-m-d');

      return $articles;
    }

    public function get_recent($limit = 3){
      $limit = (int) $limit;

      $this->db->where('pubdate <=', date('Y-m-d'));
      $this->db->limit($limit);
      return parent::get();
    }


  }
