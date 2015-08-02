<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Downloads extends CI_Controller{

	public function download(){
		
		$downpath=$_GET['downpath'];
		mb_convert_encoding($downpath,'gbk','utf-8');
		$data['downpath']=$downpath;
		$this->load->view('download',$data);
	}
}
