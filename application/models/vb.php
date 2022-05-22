<?php 

class Vb extends CI_Model{

public function register($table,$data=array()){
$registration=$this->db->insert($table,$data);
return $registration;
}
public function isregistered($uname,$password){
	$result=$this->db->where('uname',$uname)->where('password',$password)->get('admin');
	if($result->num_rows()==1){
		return $result->row();
	}else{
		return false;
	}
}
public function blogs(){
	$result=$this->db->get('posts');
	if ($result->num_rows()>0) {
		return $result->result();
	}else {
		return false;
	}
}
public function blogsbycategory($per,$segment){
	$result=$this->db->select('*')->join('categories','categories.cid=posts.category_id')->join('admin','admin.uid=posts.author_id')->from('posts')->limit($per,$segment)->get();
	if ($result->num_rows()>0) {
		return $result->result();
	}else {
		return false;
	}
}
public function blogsbycategori($per,$segment,$id){
	$result=$this->db->select('*')->join('categories','categories.cid=posts.category_id')->join('admin','admin.uid=posts.author_id')->from('posts')->where('categories.cid',$id)->limit($per,$segment)->get();
	if ($result->num_rows()>0) {
		return $result->result();
	}else {
		return false;
	}
}public function blogsbycategorigrpby($per,$segment,$id){
	$result=$this->db->select('*,count(*) as count')->join('categories','categories.cid=posts.category_id')->join('admin','admin.uid=posts.author_id')->from('posts')->where('categories.cid',$id)->limit($per,$segment)->group_by('categories.cid')->get();
	if ($result->num_rows()>0) {
		return $result->result();
	}else {
		return false;

	}
}
public function nolimitpostsjoinedtable(){
	$result=$this->db->select('*')->join('categories','categories.id=posts.category_id')->join('admin','admin.uid=posts.author_id')->from('posts')->get();
	if ($result->num_rows()>0) {
		return $result->result();
	}else {
		return false;
	}
}
	public function num_rows(){
		$result=$this->db->select('*')->from('categories')->join('posts','categories.cid=posts.category_id')->get();
		return $result->num_rows();
	}
	public function contentsbycategory(){
		$result=$this->db->query("SELECT COUNT(posts.id) as count, categories.cid,categories.name FROM categories left JOIN posts ON posts.category_id=categories.cid GROUP by categories.cid;");
		return $result->result();
	}
	public function user_count(){
		$data=$this->db->query('select * from admin');
		return $data->num_rows();
	}
	public function getallusers($per,$segment){
		$result=$this->db->select('*')->from('admin')->limit($per,$segment)->get();
		if ($result->num_rows()>0) {
		return $result->result();
		}else {
			return false;
		}
	}
	public function getusers(){
		$result=$this->db->get('admin');
		if ($result->num_rows()>0) {
		return $result->result();
		}else {
			return false;
		}
	}
	/*public function getusers(){
		$result=$this->db->get('admin');
		if ($result->num_rows()>0) {
		return $result->result();
		}else {
			return false;
		}
	}*/
	public function getuserbyid($id){
		$result=$this->db->where('uid',$id)->get('admin');
		if($result->num_rows==1){
			return $result->row();
		}else{
			return false;
		}
	}
	public function getcategory(){
		$result=$this->db->get('categories');
		if ($result->num_rows()>0) {
		return $result->result();
		}else {
			return false;
		}
	}
	public function deleterow($where,$table){
		$result=$this->db->where('id',$where)->delete($table);
		return $result;

	}
	public function deleterowc($where,$table){
		$result=$this->db->where('cid',$where)->delete($table);
		return $result;

	}
	public function deleterowad($where){
		$result=$this->db->where('uid',$where)->delete('admin');
		return $result;

	}
	public function edit($data,$id,$table){
		$update=$this->db->where('uid',$id)->update($table,$data);
		return $update;
	}public function editb($data,$id,$table){
		$update=$this->db->where('id',$id)->update($table,$data);
		return $update;
	}public function editc($data,$id,$table){
		$update=$this->db->where('cid',$id)->update($table,$data);
		return $update;
	}
	public function insert($data,$table){
		$insertion=$this->db->insert($table,$data);
		return $insertion;
	}
	public function getmessages(){
		$messages=$this->db->get('contact');
		return $messages;
	}
}



