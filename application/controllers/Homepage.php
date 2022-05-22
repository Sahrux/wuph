<?php 

class Homepage extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('vb');
	}
	
	public function index(){
		$data['categories']=$this->vb->contentsbycategory();
		/*$categories=[];
		$catarr= $this->vb->getcategory();
		foreach ($catarr as $category ) {
			array_push($categories,$category->name);
		}
		// print_r($categories);die();
		for ($i=0; $i < count($categories) ; $i++) { 
			$data["$categories[$i]"]=$this->db->select('*')->join('categories','categories.cid=posts.category_id')->join('admin','admin.uid=posts.author_id')->from('posts')->where("name=$categories[$i]")->get();
			print_r($data["$categories[$i]"]);
		}*/
		$config['base_url'] = base_url().'Homepage';
			$config['total_rows'] = $this->vb->num_rows();
			$config['per_page'] = 3;
			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination">';        
		    $config['full_tag_close'] = '</ul>';        
		    $config['first_link'] = 'First';        
		    $config['last_link'] = 'Last';        
		    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['first_tag_close'] = '</span></li>';        
		    $config['prev_link'] = '&laquo';        
		    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['prev_tag_close'] = '</span></li>';        
		    $config['next_link'] = '&raquo';        
		    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['next_tag_close'] = '</span></li>';        
		    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['last_tag_close'] = '</span></li>';        
		    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
		    $config['cur_tag_close'] = '</a></li>';        
		    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['num_tag_close'] = '</span></li>';
			$data['posts']=$this->vb->blogsbycategory($config['per_page'],$this->uri->segment(2,0));
			$data['count']=$this->vb->num_rows();
			$data['per_page']=$config['per_page'];
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
		$this->load->view('front/index',$data);
	}
	public function aboutus(){
		$data['admins']=$this->vb->getusers();
		$this->load->view('front/moreaboutus',$data);
	}
	
	public function readmore($id=''){
		saygac($id);
		$data['post']=$this->db->select('*')->join('categories','categories.cid=posts.category_id')->join('admin','admin.uid=posts.author_id')->from('posts')->where('id',$id)->get()->row();
		$this->load->view('front/readmore',$data);
	}
	public function contactus(){
		$this->form_validation->set_rules('name','required');
		$this->form_validation->set_rules('email','required');
		$this->form_validation->set_rules('number','required');
		$this->form_validation->set_rules('topic','required');
		// $this->form_validation->set_rules('message','required|min_length[15]');
		$this->form_validation->set_message('required',"%s inputunu doldurmayibsiz");
		/*$this->form_validation->set_message('max_length',"%s inputu 12 simvoldan artiq ola bilmez");
		$this->form_validation->set_message('numeric','%s inputu sadece numeric ola biler');
		$this->form_validation->set_message('min_length','%s inputu 15 simvoldan az ola bilmez');*/
		// if ($this->form_validation->run()) {
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$number=$this->input->post('number');
			$topic=$this->input->post('topic');
			$message=$this->input->post('message');
			$data=array(
				'coname'=>$name,
				'comail'=>$email,
				'conumber'=>$number,
				'cotopic'=>$topic,
				'comessage'=>$message
			);

			$insert=$this->vb->register('contact',$data);
			if ($insert) {
				$this->session->set_flashdata('messaged','Mesajiniz ugurla gonderildi');
				redirect('Homepage');
			}else{
				$this->session->set_flashdata('notmessaged','Problem yarandi mesaj gondererken');
				redirect('Homepage');
			}
		/*}else{

			redirect('Homepage');
		}*/
		
	}


}



 ?>