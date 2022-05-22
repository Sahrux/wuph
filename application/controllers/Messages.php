<?php 
/**
 * 
 */
class Messages extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('vb');
	}
	public function index (){
		$data['messages']=$this->vb->getmessages()->result();
		$this->load->view('admin/messages',$data);
	}
	public function delete(){
		$id=$this->input->post('deletedid');
		$delete=$this->db->where('coid',$id)->delete('contact');
		if ($delete) {
			$this->session->set_flashdata("deleted","Ugurla silindi");
			redirect('Messages');
		}else{
			$this->session->set_flashdata('notdeleted',"Data silinerken problem yarandi");
			redirect("Messages");
		}
	}
}
 ?>