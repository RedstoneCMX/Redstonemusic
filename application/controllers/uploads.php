<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Uploads extends CI_Controller{

	public function index(){
		$this->load->view("uploaddemo");
		
	}
	
	public function upload(){
	//本文件由uploadify官方提供，第一php网对其进行了修改和注释
	$targetFolder = 'uploads'; //设置上传目录

		if (!empty($_FILES)) {
			$tempFile = $_FILES['Filedata']['tmp_name'];
		
			$targetFile =$targetFolder. '/' . $_FILES['Filedata']['name'];//上传后的图片路径
			
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png','mp3'); //允许的文件后缀
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,iconv('UTF-8','gb2312',$targetFile));
				echo $_FILES['Filedata']['name'];//上传成功后返回给前端的数据
				file_put_contents($_POST['id'].'.txt','上传成功了！');
			} else {
				echo '不支持的文件类型';
			}
		}
	}
}
