<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_musics extends CI_Controller{

	public function index(){
		$this->load->view("upload_music");
		
	}
	
	public function upload_image(){
	//本文件由uploadify官方提供，第一php网对其进行了修改和注释
	$targetFolder = 'photo'; //设置上传目录

		if (!empty($_FILES)) {
			$tempFile = $_FILES['Filedata']['tmp_name'];
			//随机生成文件名
			$basicstr = "abcdefghijklmnopqrstuvwxyz0123456789";
  			$randnameStr = "";
  			for($j=0;$j<20;$j++)
  			{
    			$randnameStr .= substr($basicstr,rand(0,35),1);
  			}
  			
  			$pos =strrpos($_FILES['Filedata']['name'],'.');// 得到字符串 .efg
			$suffix=substr($_FILES['Filedata']['name'],$pos);
			$randnameStr.=$suffix;
  			session_start();
  			$_SESSION['photorand']=$randnameStr;
			$targetFile =$targetFolder. '/' . $randnameStr;//上传后的图片路径
			
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png'); //允许的文件后缀
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			
			if (in_array($fileParts['extension'],$fileTypes)) {
				
				move_uploaded_file($tempFile,iconv('UTF-8','gb2312',$targetFile));
				echo $targetFile;//上传成功后返回给前端的数据
				//file_put_contents($_POST['id'].'.txt','cc上传成功了！');
			} else {
				echo '不支持的文件类型';
			}
		}
	}
	
	public function upload_song(){
	//本文件由uploadify官方提供，第一php网对其进行了修改和注释
	$targetFolder = 'music'; //设置上传目录

		if (!empty($_FILES)) {
			$tempFile = $_FILES['Filedata']['tmp_name'];
		
			$targetFile =$targetFolder. '/' . $_FILES['Filedata']['name'];//上传后的图片路径
			$this->load->database(); 
			$check_sql="select path from music where path='".$targetFile."'";
			$check_result=$this->db->query($check_sql);
			if($check_result->num_rows()){
				echo "已有相同歌曲了";
				return ;
			}
			
			// Validate the file type
			$fileTypes = array('mp3'); //允许的文件后缀
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			
			if (in_array($fileParts['extension'],$fileTypes)) {
				
				move_uploaded_file($tempFile,iconv('UTF-8','gb2312',$targetFile));
				echo $_FILES['Filedata']['name'];//上传成功后返回给前端的数据
				//file_put_contents($_POST['id'].'.txt','cc上传成功了！');
			} else {
				echo '不支持的文件类型';
			}
		}
	}
	
	public function input_sql(){
		$songname=$_POST['songname'];
		$songpath=$_POST['songpath'];
		$singer=$_POST['singer'];
		$songtype=$_POST['songtype'];
		$lyric=$_POST['lyric'];
		$photopath=$_POST['photopath'];
		if($songname==""||$songpath==""||$singer==""||$songtype==""||$lyric==""||$photopath==""){
			echo "上传失败";
			return ;
		}
		$songpath="music/".$songpath;
		//$photopath="photo/".$photopath;
		session_start();
		if(isset($_SESSION['photorandname']))
  			$photopath="photo/".$_SESSION['photorand'];
  		
		//特殊字符转码
		$songname=htmlspecialchars($songname,ENT_QUOTES);
		$singer=htmlspecialchars($singer,ENT_QUOTES);
		$lyric=htmlspecialchars($lyric,ENT_QUOTES);
		//$user = mysql_real_escape_string($user);
		//$pwd = mysql_real_escape_string($pwd);
		$this->load->database(); 
		$insert_sql="insert into music(music_type,name,path,lyric,singer,photo) values('".$songtype."','".$songname."','".$songpath."','".$lyric."','".$singer."','".$photopath."')";
		$this->db->query($insert_sql);
		if($this->db->affected_rows()){
			
			$update_sql="update musictype set num=num+1 where music_type='".$songtype."'";
			$this->db->query($update_sql);
			if($this->db->affected_rows())	
				echo "添加成功";
			else 
				echo "添加失败";
		}
		else "添加失败";
	}
	
}

