<?php 
/**
 * 
 */
class Contact extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('vb');
	}
	public function index(){
		$this->load->view('front/contact');
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
				'cotopic'=>html_escape($topic),
				'comessage'=>html_escape($message)
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