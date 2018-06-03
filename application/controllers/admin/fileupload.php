<?php

class fileUpload extends Admin_Controller {

        public function __construct()
        {
                parent::__construct();

                 $this->load->model('upload_m');

        }

        public function index()
        {

         $this->data['images'] = $this->upload_m->get();
          $this->data['subview'] = 'admin/slider/index';

          $this->load->view('admin/_layout_main', $this->data);

        }

        public function do_upload(){
          $file['file_caption'] = $this->input->post('file_caption');
          $file['file_desc'] = $this->input->post('file_desc');
          $id = $this->input->post('fileid');

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1920;
                $config['max_height']           = 1080;

                $this->load->library('upload');
                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload('userfile')){
                  $this->data['error'] =  $this->upload->display_errors();

                        $this->data['subview'] = 'admin/slider/carousel';
                        $this->load->view('admin/_layout_main', $this->data);
                }
                else{
                  $upload_data = $this->upload->data();
                  $car_data = array(
                    'filename' => ''.$upload_data['file_name'],
                    'file_ext' => ''.$upload_data['file_ext'],
                    'file_caption' => ''. $file['file_caption'] ,
                    'file_desc' => ''. $file['file_desc']  ,
                );
              
                if($id){
                  $this->upload_m->insert($car_data, $id);
                  redirect('admin/fileupload');
                }else{
                $this->upload_m->insert($car_data);
                redirect('admin/fileupload');
                }
          //        $this->data['subview'] = 'admin/fileupload';
          //        $this->load->view('admin/_layout_main', $this->data);
                }
        }

        public function edit($id = NUll){

         //fetch a images or set new
            if($id){

              $this->data['images']= $this->upload_m->get($id);




            }else{

              $this->data['images'] = $this->upload_m->get_new();

            }


            //set up the form
            $rules = $this->upload_m->rules;
            $this->form_validation->set_rules($rules);


            // Process the form
      		if ($this->form_validation->run() == TRUE) {
      			$data = $this->upload_m->array_from_post(array('filename','file_caption', 'file_desc'));
            die('here');
      			$this->upload_m->insert($data, $id);

      			redirect('admin/fileupload');
      }

            //load the view
            $this->data['subview'] = 'admin/slider/carousel';
            $this->load->view('admin/_layout_main', $this->data);

    }



        public function delete($id){
            $this->upload_m->delete($id);
            redirect('admin/fileupload');
        }


}
?>
