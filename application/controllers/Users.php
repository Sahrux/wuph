<?php
	
class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('vb');
	}
	
	public function index(){
	if ($this->session->islogged) {
			$config['base_url'] = base_url().'Users';
			$config['total_rows'] = $this->vb->user_count();
			$config['per_page'] = 4;
			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<div><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div><!--pagination-->';
			$config['first_link'] = '&laquo; Birinci';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Axirinci &raquo;';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Sonrakı &rarr;';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&larr; Öncəki';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active" ><a style="color:white;" href="">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			$data['rows']=$this->vb->getallusers($config['per_page'],$this->uri->segment(2,0));
			$data['count']=$this->vb->num_rows();
			$data['per_page']=$config['per_page'];
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$this->load->view('admin/users',$data);
		}else{
			redirect('Login');
		}
	}
	public function switch($id){ 
		isAdmin('Users','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		/*if ($status==true) {
			$sts=1;
		}else{
			$sts=0;
		}*/
		$data=array(
			'status'=>$status
		);
		if ($id != '1') {
			$update=$this->vb->edit($data,$id,'admin');
		 if ($update) {
		 	$data['success']="Status uğurla dəyişdi";
		 	$data['deyishdi']="OK";
		 }else {
		 	$data['error']= "Xeta yarandi";
		 }
		 $data['token']=$this->security->get_csrf_hash();
		 
		 echo json_encode($data);
		}else{
			return false;
		}
		 

	}

	public function edituserpage($id){
		$sessid=$this->session->userinfo->uid;
			if ($sessid != '1') {
			if ($id != $sessid ) {
			
			isAdmin('Users','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');

			}
			else{
				$fname=$this->input->post('fname');
				$lname=$this->input->post('lname');
				$uname=$this->input->post('uname');
				$email=$this->input->post('email');
				$pp=$this->input->post('pp');
				$data=array(
					'id'=>$id,
					'fname'=>$fname,
					'lname'=>$lname,
					'uname'=>$uname,
					'email'=>$email,
					'pp'=>$pp
				);
			$this->load->view('admin/edituser',$data);
			}
			
		}else{
				$fname=$this->input->post('fname');
				$lname=$this->input->post('lname');
				$uname=$this->input->post('uname');
				$email=$this->input->post('email');
				$pp=$this->input->post('pp');
				$data=array(
					'id'=>$id,
					'fname'=>$fname,
					'lname'=>$lname,
					'uname'=>$uname,
					'email'=>$email,
					'pp'=>$pp
				);
			$this->load->view('admin/edituser',$data);
		}
	}
	public function edituser(){
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
				$id=$this->input->post('uid');
				$fname=$this->input->post('fname');
				$lname=$this->input->post('lname');
				$pp=$this->input->post('pp');
				$uname=$this->input->post('uname');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
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

				$update=$this->vb->edit($data,$id,'admin');
				if ($update) {
					$this->session->set_flashdata('updatedu', 'Uğurla redaktə edildi');
					redirect('Users');
				}else{
					redirect('Users/edituserpage');
				}
			}
			}else{
				echo "form validation error";
			}	 
		
		
	}
	public function deleteuser(){
		isAdmin('Users','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		$id=$this->input->post('id');
		if ($id != "1") {
			$delete=$this->vb->deleterowad($id);
			$this->session->set_flashdata('deleted', 'Ugurla silindi');
			redirect('Users','refresh'); 
		}else{
			$this->session->set_flashdata('boss','Yo man!Bossu silə bilmərsən!');
			redirect('Users');
		}
		
	}
}