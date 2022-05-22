<?php
	
class Category extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('vb');
	}
	public function index(){
	if ($this->session->islogged) {
		// $data['rows']=$this->vb->getcategory();
		$data['rows']=$this->vb->contentsbycategory();
			$this->load->view('admin/category',$data);
		}else{
			redirect('Login');
		}
	}
	public function delete(){
		isAdmin('Category','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		$id=$this->input->post('deletedid');
		$result=$this->vb->deleterowc($id,'categories');
		if ($result) {
			$this->session->set_flashdata('deleted', 'Ugurla silindi');
			
		}else{
			$this->session->set_flashdata('notdeleted', 'Ugurla Silinmedi');
		}
		redirect('Category'); 
		// echo $id;
	}
	public function update(){
		isAdmin('Category','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		if ($_POST['name']) {
		$this->form_validation->set_rules('name','Ad','required|max_length[12]');
		$this->form_validation->set_message('required','%s inputunu doldurun..!!');
		$this->form_validation->set_message('max_length','%s inputu max 12 simvol olmalidir..!!');
		if($this->form_validation->run()){
			$id=$this->input->post('editedid');
			$name=$this->input->post('name');
			// echo $id;die();
			$data=array(
			'name'=>$name
		);
			$update=$this->vb->editc($data,$id,'categories');
			if ($update) {
				redirect('Category');
			}else{
				echo "Yenilənmədi";
			}
		}else{
			echo 'Vətəndaş inputları düzgün doldur!!!';
		}
		}else{
			echo "Post gəlmir";
		}
	}
	public function addcategory(){
		isAdmin('Category','Sizin bu əməliyyatı icra etmək üçün səlahiyyətiniz yoxdur!');
		if ($_POST['name']) {
		$this->form_validation->set_rules('name','Kateqoriya Adi','required|max_length[12]');
		$this->form_validation->set_message('required','%s inputunu doldurun..!!');
		$this->form_validation->set_message('max_length','%s inputu max 12 simvol olmalidir..!!');
		if ($this->form_validation->run()) {
		$name=$this->input->post('name');
		$data=array(
			'name'=>$name,
		);
		$result=$this->vb->insert($data,'categories');
		if($result){
			redirect('Category');	
			}
			else{
			echo "Elave edilmedi";
			}	
		}
		else
		{
		echo "Inputlari duzgun doldurun";
		}	
		}else{
			echo "post gelmir";
		}
		
	}	

}