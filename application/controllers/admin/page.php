<?php


class Page extends Admin_Controller{

  function __construct(){
      parent::__construct();
      $this->load->model('page_m');
  }
    public function index(){
      //fetch all pages
    $this->data['pages'] = $this->page_m->get_with_parent();
    //load the view
    $this->data['subview'] = 'admin/page/index';
    $this->load->view('admin/_layout_main', $this->data);

  }

  public function order (){
  		$this->data['sortable'] = TRUE;
  		$this->data['subview'] = 'admin/page/order';
  		$this->load->view('admin/_layout_main', $this->data);
  	}

  	public function order_ajax (){
  		// Save order from ajax call
  		if (isset($_POST['sortable'])) {
  			$this->page_m->save_order($_POST['sortable']);
  		}

  		// Fetch all pages
  		$this->data['pages'] = $this->page_m->get_nested();

  		// Load view
  		$this->load->view('admin/page/order_ajax', $this->data);
  	}
  public function edit($id = NUll){
    //fetch a page or set new
      if($id){

        $this->data['page']= $this->page_m->get($id);
        count($this->data['page']) || $this->data['errors'][] = 'page could not be found';
      }else{
        $this->data['page'] = $this->page_m->get_new();
      }
      //pages without parents
      $this->data['pages_no_parents'] = $this->page_m->get_no_parents();

      //set up the form
      $rules = $this->page_m->rules;
      $this->form_validation->set_rules($rules);

      // Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->page_m->array_from_post(array('title', 'slug','body','parent_id', 'template'));
			$this->page_m->insert($data, $id);
			redirect('admin/page');
}
      //load the view
      $this->data['subview'] = 'admin/page/edit';
      $this->load->view('admin/_layout_main', $this->data);

  }

  public function delete($id){
      $this->page_m->delete($id);
      redirect('admin/page');
  }


  public function _unique_slug($str){
    // do not validate if slug already exists
    // unless it's the slug of current page
    $id = $this->uri->segment(4);
    $this->db->where('slug',$this->input->post('slug'));
    !$id || $this->db->where('id !=', $id);
    $page = $this->page_m->get();

    if(count($page)){
      $this->form_validation->set_message('_unique_slug','%s should be unique');
      return false;
    }
    return true;
  }


}
