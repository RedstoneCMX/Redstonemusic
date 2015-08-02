<?php	
		$filename=substr($downpath, 6);
		$downpath=iconv('utf-8', 'gbk', $downpath);
		if (!file_exists($downpath)){
			header("Content-type: text/html; charset=utf-8");
			echo "File not found!";
			exit; 
		} else {
			$file = fopen($downpath,"rb"); 
			Header("Content-type: application/octet-stream");
			Header("Accept-Ranges: bytes");
			Header("Accept-Length: ".filesize($downpath));
			Header("Content-Disposition: attachment; filename=".$filename);
			echo fread($file, filesize($downpath));
			fclose($file);
		}
?>