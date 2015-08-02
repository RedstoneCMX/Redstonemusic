<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexs extends CI_Controller {

	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function young(){
	
	//青春记忆
		$young_sql_music="select * from music where music_type='青春记忆'";
		$young_sql_type="select * from musictype where music_type='青春记忆'";
		//echo $sql;
		$this->load->database(); 
		$young_select_music=$this->db->query($young_sql_music);
		if(!$young_select_music->num_rows()){
				echo "查询失败";
		}
		else{
			$young_result=$young_select_music->result();
		}
		$data['young_result']=$young_result;
		
		$young_select_type=$this->db->query($young_sql_type);
		if(!$young_select_type->num_rows()){
				echo "查询失败";
		}
		else{
			$young_num=$young_select_type->result();
			$data['young_num']=$young_num[0]->num;
		}
		
		$this->load->view('young',$data);
	}
	
	
	public function old(){
	//怀旧经典
		$old_sql_music="select * from music where music_type='怀旧经典'";
		$old_sql_type="select * from musictype where music_type='怀旧经典'";
		//echo $sql;
		$this->load->database(); 
		$old_select_music=$this->db->query($old_sql_music);
		if(!$old_select_music->num_rows()){
				echo "查询失败";
		}
		else{
			$old_result=$old_select_music->result();
		}
		$data['old_result']=$old_result;
		
		$old_select_type=$this->db->query($old_sql_type);
		if(!$old_select_type->num_rows()){
				echo "查询失败";
		}
		else{
			$old_num=$old_select_type->result();
			$data['old_num']=$old_num[0]->num;
		}
		
		$this->load->view('old',$data);
	}
	
	public function love(){
		//情歌天堂
		$love_sql_music="select * from music where music_type='情歌速递'";
		$love_sql_type="select * from musictype where music_type='情歌速递'";
		//echo $sql;
		$this->load->database(); 
		$love_select_music=$this->db->query($love_sql_music);
		if(!$love_select_music->num_rows()){
				echo "查询失败";
		}
		else{
			$love_result=$love_select_music->result();
		}
		$data['love_result']=$love_result;
		
		$love_select_type=$this->db->query($love_sql_type);
		if(!$love_select_type->num_rows()){
				echo "查询失败";
		}
		else{
			$love_num=$love_select_type->result();
			$data['love_num']=$love_num[0]->num;
		}
		
		$this->load->view('love',$data);
	}
	
	public function courage(){
		
		//励志天堂
		$courage_sql_music="select * from music where music_type='励志天堂'";
		$courage_sql_type="select * from musictype where music_type='励志天堂'";
		//echo $sql;
		$this->load->database(); 
		$courage_select_music=$this->db->query($courage_sql_music);
		if(!$courage_select_music->num_rows()){
				echo "查询失败";
		}
		else{
			$courage_result=$courage_select_music->result();
		}
		$data['courage_result']=$courage_result;
		
		$courage_select_type=$this->db->query($courage_sql_type);
		if(!$courage_select_type->num_rows()){
				echo "查询失败";
		}
		else{
			$courage_num=$courage_select_type->result();
			$data['courage_num']=$courage_num[0]->num;
		}
		
		$this->load->view('courage',$data);
	}
	
	public function english(){
		
		
		//励志天堂
		$english_sql_music="select * from music where music_type='英文金曲'";
		$english_sql_type="select * from musictype where music_type='英文金曲'";
		//echo $sql;
		$this->load->database(); 
		$english_select_music=$this->db->query($english_sql_music);
		if(!$english_select_music->num_rows()){
				echo "查询失败";
				$this->load->view('english');
				return ;
		}
		else{
			$english_result=$english_select_music->result();
		}
		$data['english_result']=$english_result;
		
		$english_select_type=$this->db->query($english_sql_type);
		if(!$english_select_type->num_rows()){
				echo "查询失败";
		}
		else{
			$english_num=$english_select_type->result();
			$data['english_num']=$english_num[0]->num;
		}
		
		$this->load->view('english',$data);
		
	}
	
	
	public function aboutme(){
		
		$this->load->view('aboutme');
	}
}
