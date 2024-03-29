<?php

  class Page_m extends MY_Model{

    protected $_table_name = 'pages';
    protected $_order_by = 'order';
    protected $_rules = array();

    public $rules = array(
      'parent_id' => array(
  			'field' => 'parent_id',
  			'label' => 'parent_id',
  			'rules' => 'trim|intval'
  		),
      'template' => array(
  			'field' => 'template',
  			'label' => 'template',
  			'rules' => 'trim|required|xss_clean'
  		),
  		'title' => array(
  			'field' => 'title',
  			'label' => 'title',
  			'rules' => 'trim|required|max_length[100]|xss_clean'
  		),
      'slug' => array(
  			'field' => 'slug',
  			'label' => 'slug',
  			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
  		),

      'body' => array(
  			'field' => 'body',
  			'label' => 'body',
  			'rules' => 'trim|required'
  		),
  	);

    public function delete ($id){
		// Delete a page
		parent::delete($id);

		// Reset parent ID for its children
		$this->db->set(array(
			'parent_id' => 0
		))->where('parent_id', $id)->update($this->_table_name);
	}

  public function save_order ($pages){
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
				}
			}
		}
	}

  public function get_nested (){

		$pages = $this->db->order_by('order','asc')->get('pages')->result_array();

		$array = array();
		foreach ($pages as $page) {
			if ( $page['parent_id']== 0) {
				$array[$page['id']] = $page;
			}
			else {
				$array[$page['parent_id']]['children'][] = $page;
      }

		}

		return $array;
	}

  public function get_archive_link(){
    $page = parent::get_by(array('template'=>'blog'),true);
    return isset($page->slug) ? $page->slug : '';
  }

    public function get_with_parent ($id = NULL, $single = FALSE){
    		$this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
    		$this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
    		return parent::get($id, $single);
    	}


    public function get_new(){
  		$page = new stdClass();
  		$page->title = '';
  		$page->slug = '';
      $page->body = '';
  		$page->template = 'page';
      $page->parent_id = 0;
  		return $page;
  	}
public function get_no_parents(){
  //fetch pages without parents
  $this->db->select('id, title');
  $this->db->where('parent_id',0);
  $pages = parent::get();

  // Return key => value pair array
		$array = array(
			0 => 'No parent'
		);
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[$page->id] = $page->title;
			}
		}

		return $array;
}

  }
