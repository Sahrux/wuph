<?php 

class Frontcategory extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('vb');
		$this->load->library('pagination');
	}

	public function category($id){
			$data['byid']=$this->db->where('cid',$id)->get('categories')->row();
			$data['categories']=$this->vb->contentsbycategory();
			$config['base_url'] = base_url().'Frontcategory/category';
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
			$data['posts']=$this->vb->blogsbycategori($config['per_page'],$this->uri->segment(2,0),$id);
			$data['currentcat']=$this->vb->blogsbycategorigrpby($config['per_page'],$this->uri->segment(2,0),$id);
			$data['count']=$this->vb->num_rows();
			$data['per_page']=$config['per_page'];
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$this->load->view('front/bycategory',$data);
	}
}