<?php


class Articles extends Admin_Controller{

  function __construct(){
      parent::__construct();
      $this->load->model('articles_m');
  }
    public function index(){
      //fetch all articless
    $this->data['articles'] = $this->articles_m->get();
    //load the view
    $this->data['subview'] = 'admin/articles/index';
    $this->load->view('admin/_layout_main', $this->data);

  }


  public function edit($id = NUll){
    //fetch a articles or set new
      if($id){

        $this->data['articles']= $this->articles_m->get($id);
        count($this->data['articles']) || $this->data['errors'][] = 'articles could not be found';
      }else{
        $this->data['articles'] = $this->articles_m->get_new();
      }


      //set up the form
      $rules = $this->articles_m->rules;
      $this->form_validation->set_rules($rules);

      // Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->articles_m->array_from_post(array('title', 'slug','body','pubdate'));
			$this->articles_m->insert($data, $id);
			redirect('admin/articles');
}
      //load the view
      $this->data['subview'] = 'admin/articles/edit';
      $this->load->view('admin/_layout_main', $this->data);

  }

  public function delete($id){
      $this->articles_m->delete($id);
      redirect('admin/articles');
  }

}
