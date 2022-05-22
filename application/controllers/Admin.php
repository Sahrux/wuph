<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('vb');
		$this->sessioncontrol();
	}
	 function sessioncontrol(){
		$control=$this->session->islogged;
		if (!isset($control) && $control != true) {
			redirect("Login");
		}
	}
	public function index()	{
		$id=$this->session->userinfo->uid;
		// $data['user']=$this->vb->getuserbyid($id);
		$data['user']=$this->db->where('uid',$id)->get('admin')->row();
		$this->load->view('admin/index',$data);
		
	}
	
	
	public function newuserpage(){
		isAdmin('Users','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		$this->load->view('admin/newuser');
	} 
	public function addnewuser(){
		// echo "salam fuad";die();
			$this->form_validation->set_rules('fname','Ad','required|max_length[12]');
			$this->form_validation->set_rules('lname','Soyad','required|max_length[12]');
			$this->form_validation->set_rules('uname','Istifadəçi Adı','required|max_length[15]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Şifrə','required|matches[password2]');
			$this->form_validation->set_rules('password2','Şifrə2','required|matches[password]');
			$this->form_validation->set_message('required','%s inputunu doldurun..!!');
			$this->form_validation->set_message('max_length','%s inputu max 12 simvol olmalidir..!!');
			$this->form_validation->set_message('valid_email','Duzgun email daxil edin..!!');
			$this->form_validation->set_message('matches','Daxil etdiyiniz sifreler eynilik teski etmir..!!');
			if($this->form_validation->run()){
				$fname=$this->input->post('fname');
				$lname=$this->input->post('lname');
				$uname=$this->input->post('uname');
				$email=$this->input->post('email');
				
				// $pp=$this->input->post('pp');
				$config['encrypt_name'] = TRUE;
				$config['upload_path']          = './images/';
		        $config['allowed_types']        = '*';
		        $config['max_size']             = 2048;
		        // $config['max_width']            = 1024;
		        // $config['max_height']           = 768;
		        // $config['file_name']             =$filename.'jpeg';
		        // $config['file_name'] = $_FILES['image']['name'];

		        $this->load->library('upload', $config);
		        $this->upload->initialize($config);
		        if ( ! $this->upload->do_upload('pp')){
		        
		            $error = array('error' => $this->upload->display_errors());
		            $this->session->set_flashdata('uploaderror', $error);
		            // redirect('Blog/newblogpage');
		            echo "<pre>";
		            print_r($error ) ;
		        }else{
		        	$updata=$this->upload->data();
            		$pp=$updata['file_name'];
            		// echo $pp;die();
		        	$password=$this->input->post('password');
					$data=array(
						'fname'=>$fname,
						'lname'=>$lname,
						'uname'=>$uname,
						'email'=>$email,
						'password'=>md5($password),
						'pp'=>$pp
					);
					$result=$this->vb->register('admin',$data);
					if ($result) {
						redirect('Users');
					}else{
						echo "problem appeared";
					}
		        }
				
			}else{
				redirect('Admin');
			}

		}
	
}
