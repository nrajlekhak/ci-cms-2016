<?php

class Dashboard extends Admin_Controller {

  public function __construct(){
    parent::__construct();
  }



  public function index() {
    //fetch recently modified articles
      $this->load->model('articles_m');
      $this->db->order_by('modified desc');
      $this->db->limit(5);

      $this->data['recent_articles'] = $this->articles_m->get();


      $this->data['subview'] = 'admin/dashboard/index';
      $this->load->view('admin/_layout_main', $this->data);
  }


  public function modal() {
    $this->load->view('admin/_layout_modal', $this->data);

  }

}
