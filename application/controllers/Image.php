<?php 
	class Image extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}

		public function index(){
			$this->load->view('image_form');
		}

		public function upload(){
			$config['upload_path'] = "./uploads/original";
			$config['allowed_types'] = "jpg|png";
	
			$this->load->library('upload',$config);

			if($this->upload->do_upload('image')){
				$data = $this->upload->data();
				$error = null;
			}else{
				$error = $this->upload->display_errors();
				$data = null;
			}

			//Image resize
			$resized_img = 'uploads/resized/'.$data['file_name'];
			$original_img = "uploads/original/".$data['file_name'];
			$this->load->library('image_lib');
			$imagelib_config['image_library'] = "gd2";
			$imagelib_config['source_image'] = $data['full_path'];
			$imagelib_config['width'] = 300;
			$imagelib_config['height'] = 200;
			$imagelib_config['new_image'] = $resized_img;
			$this->image_lib->initialize($imagelib_config);
			if($this->image_lib->resize()){
				$this->load->view('image_form',array('original_img'=>$original_img,'resized_img'=>$resized_img));
			}else{
				echo $this->image_lib->display_errors();
			}

			
		}
	}
