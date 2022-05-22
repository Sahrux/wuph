<?php
	
class Blog extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('vb');
	}
	public function index(){
		
		if ($this->session->islogged) {
			$config['base_url'] = base_url().'Blog';
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
			$data['rows']=$this->vb->blogsbycategory($config['per_page'],$this->uri->segment(2,0));
			$data['count']=$this->vb->num_rows();
			$data['per_page']=$config['per_page'];
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$this->load->view('admin/blog',$data);
		}else{
			redirect('Login');
		}
	
	}
	public function newblogpage(){
		isAdmin('Blog','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		// $role=$this->isAdmin();
		// if ($role) {
		$data['categories']=$this->vb->getcategory();
		$data['authors']=$this->vb->getusers();
		$this->load->view('admin/newblogpage',$data);
		/*}else{
			redirect('Admin');
		}*/
		
		
	}
	public function addblog(){
		$title= $this->input->post('title');
		$post= $this->input->post('post');
		// $image= $this->input->post('image');
		$categoryname= $this->input->post('category');
		$authorname= $this->input->post('author');
		$catar=$this->db->where('name',$categoryname)->get('categories')->row();
		$category_id=$catar->cid;
		$autar=$this->db->where('uname',$authorname)->get('admin')->row(); 
		$author_id=$autar->uid;
		$filename = $title;
		$config['encrypt_name'] = TRUE;
		$config['upload_path']          = './images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $config['file_name']             =$filename.'jpeg';
        // $config['file_name'] = $_FILES['image']['name'];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('image')){
        
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('uploaderror', $error);
            // redirect('Blog/newblogpage');
            echo "<pre>";
            print_r($error ) ;
        }
        else{
            $updata=$this->upload->data();
            $image=$updata['file_name'];
           
	        $data=array(
			'category_id'=>$category_id,
			'title'=>$title,
			'image'=>$image,
			'post'=>html_escape($post),
			'author_id'=>$author_id
			);
			$insertion=$this->vb->insert($data,'posts');
			if ($insertion) {
				$this->session->set_flashdata("inserted","yes");
				redirect('Blog');
			}else{
				$this->session->set_flashdata('inserted',"no");
				redirect('admin/newblogpage');
			}
         }       
		
		
	}
	public function editblogpage(){
		isAdmin('Blog','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		$id=$this->input->post('editedid');
		$data['categories']=$this->vb->getcategory();
		$data['authors']=$this->vb->getusers();
		$title= $this->input->post('title');
		$post= $this->input->post('post');
		$image= $this->input->post('image');
		$categoryname= $this->input->post('category');
		$authorname= $this->input->post('author');
		$data['id']=$id;
		$data['title']=$title;
		$data['post']=$post;
		$data['image']=$image;
		$data['categoryname']=$categoryname;
		$data['authorname']=$authorname;
		$this->load->view('admin/editblogpage',$data);
		
	}
	public function editblog(){
		$id=$this->input->post('id');	
		$title= $this->input->post('title');
		$post= $this->input->post('post');
		// $image= $this->input->post('image');
		$categoryname= $this->input->post('category');
		$authorname= $this->input->post('author');
		$catar=$this->db->where('name',$categoryname)->get('categories')->row();
		$category_id=$catar->cid;
		$autar=$this->db->where('uname',$authorname)->get('admin')->row();
		$author_id=$autar->uid;
		$filename = $title;
		$config['encrypt_name'] = TRUE;
		$config['upload_path']          = './images/';
        // $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['allowed_types']        = '*';
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $config['file_name']             =$filename.'jpeg';
        // $config['file_name'] = $_FILES['image']['name'];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('image')){
        
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('uploaderror', $error);
            // redirect('Blog/newblogpage');
            echo "<pre>";
            print_r($error ) ;
        }else{
        	$updata=$this->upload->data();
            $image=$updata['file_name'];
        	$data=array(
			'category_id'=>$category_id,
			'title'=>$title,
			'image'=>$image,
			'post'=>html_escape($post),
			'author_id'=>$author_id
		);
		/*echo "<pre>";
		print_r($data);die();*/
		$update=$this->vb->editb($data,$id,'posts');
		if ($update) {
			$this->session->set_flashdata('updated',"yes");
			redirect('Blog');
		}else{
			$this->session->set_flashdata('updated',"no");
			redirect('admin/editblogpage');
		}
        }
		
	}
	public function deleteblog(){
		isAdmin('Blog','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		$id=$this->input->post('id');
		$delete=$this->vb->deleterow($id,'posts');
		if ($delete) {
			$this->session->set_flashdata('deleted','Ugurla silindi');
			redirect('Blog');
		}else{
			$this->session->set_flashdata('notdeleted','Ugurla Silinmedi');
			redirect('Blog');
		}
	}

}