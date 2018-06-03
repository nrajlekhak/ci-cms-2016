<?php

 class Article extends Frontend_Controller{

   function __construct(){
     parent::__construct();
     $this->load->model('articles_m');
     $this->data['recent_articles'] = $this->articles_m->get_recent();
   }

   public function index($id,$slug){
     //fetch the article
     $this->db->where('pubdate <=', date('Y-m-d'));
     $this->data['article'] = $this->articles_m->get($id);
      count($this->data['article']) or show_404(uri_string());

      //redirct if slug was incorrect
      $requested_slug = $this->uri->segment(3);
      $set_slug = $this->data['article']->slug;
      if ($set_slug != $requested_slug) {
        redirect('article/'. $this->data['article']->id .'/'. $set_slug,'location','301');
      }


      //load view
      add_meta_title($this->data['article']->title);
      $this->data['subview'] = 'article';
      $this->load->view('_main_layout', $this->data);

   }
 }
