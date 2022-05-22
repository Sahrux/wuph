<?php 
	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('vb');
		}

		public function index(){
			$this->load->view('admin/login');
		}
		public function login(){
			
			$this->form_validation->set_rules('password','Şifrə','required');
			$this->form_validation->set_rules('uname','Istifadəçi Adı','required|max_length[15]');
			$this->form_validation->set_message('required','<div class="alert alert-danger fade in alert-dismissible" role="alert">%s inputunu doldurun..!!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span></button></div>');
			$this->form_validation->set_message('max_length','<div class="alert alert-danger fade in alert-dismissible" role="alert">%s inputu max 12 simvol olmalidir..!!
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span></button></div>');
				if($this->form_validation->run()){
					$uname=$this->input->post('uname');
					$password=$this->input->post('password');
					$isregistered=$this->vb->isregistered($uname,md5($password));
					if ($isregistered) {
						$this->session->set_userdata('islogged',true);
						$this->session->set_userdata('userinfo',$isregistered);
						redirect('Admin');
					}else{
						
						$this->session->set_flashdata('isntlogged','<div class="alert alert-danger fade in alert-dismissible" role="alert">
						  Belə istifadəçi tapılmadı
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button></div>');
						redirect('Login');
								}
					}else{
						$this->load->view('admin/login');
			    }
		    }
				public function logout(){
					$this->session->sess_destroy();
					redirect('Admin');
		   }

	  }
