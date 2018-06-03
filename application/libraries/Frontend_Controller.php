<?php

class Frontend_Controller extends MY_Controller{

  function __construct()
  {
    parent::__construct();
    $this->load->model('page_m');
    $this->load->model('articles_m');
    $this->data['menu'] = $this->page_m->get_nested();

    $this->data['blog_archive_link'] = $this->page_m->get_archive_link();

  $this->data['meta_title'] = config_item('site_name');
    }
  }
