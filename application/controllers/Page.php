<?php

class Page extends Frontend_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('page_m');
    $this->load->model('articles_m');

  }

public function index(){

//fetch the page data
$this->data['page'] = $this->page_m->get_by(array('slug'=>(string)$this->uri->segment(1)),true);
count($this->data['page']) || show_404(current_url());

 add_meta_title($this->data['page']->title);

$method = '_'.$this->data['page']->template;

if(method_exists($this, $method)){
$this->$method();
} else{
  log_message('error','could not load template '. $method.' in file'.__FILE__.' at line '.__LINE__);
  show_error('could not load template');
}
  $this->data['subview'] = $this->data['page']->template;
  $this->load->view('_main_layout', $this->data);

}

private function _blog(){
  $this->db->where('pubdate <=',date('Y-m-d'));
  $count = $this->db->count_all_results('articles');
 $this->data['recent_articles'] = $this->articles_m->get_recent();
  //for pagination
  $perpage = 4;

  if ($count > $perpage) {
    $this->load->library('pagination');

    $config['base_url'] = base_url($this->uri->segment(1). '/');
    $config['total_rows'] = $count;
    $config['per_page'] = $perpage;
    $config['uri_segment'] = 2;


    $this->pagination->initialize($config);
    $this->data['pagination'] = $this->pagination->create_links();
    $offset = $this->uri->segment(2);
  } else{
    $this->data['pagination'] = "";
    $offset = 0;
  }

  $this->db->where('pubdate <=',date('Y-m-d'));
  $this->db->limit($perpage,$offset);
  $this->data['articles'] = $this->articles_m->get();

}



private function _homepage(){
  $this->load->model('articles_m');
  $this->db->limit(6);
  $this->db->where('pubdate <=',date('Y-m-d'));
  $this->data['articles'] = $this->articles_m->get();
$this->load->model('upload_m');
$this->data['images'] = $this->upload_m->get();
}
private function _page(){
 $this->data['recent_articles'] = $this->articles_m->get_recent();
}

private function _developer(){

}

private function _contact(){

}

private function _about(){
 
}
  }
