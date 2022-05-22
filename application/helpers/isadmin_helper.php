<?php 

function isadmin($page,$message){
		$ci=& get_instance();
		$ci->load->database(); 
		$ci->load->library('session'); 
	 	if($ci->session->islogged){
	 		$id=$ci->session->userinfo->uid;
	 		$user=$ci->db->where('uid',$id)->get('admin')->row();
	 		
	 		$role=$user->role;
	 		$status=$user->status;
 			if ($role !=true || $status !=true) {
	 			$ci->session->set_flashdata('isadmin', $message);
	 			redirect($page);
	 			die();
	 		}
	 		

	 	}else{
	 		redirect('Login');
	 		die();
	 	}
	}
	function saygac($id){
		$ci=& get_instance();
		$ci->load->database();
		$blog_count=$ci->db->where('id',$id)->get('posts')->row()->hit;
		$blog_count++;
		// print_r($blog_count ) ;die();
		$data=array(
			'hit'=>$blog_count
		);
		$update=$ci->db->where('id',$id)->update('posts',$data);
	}
 ?>