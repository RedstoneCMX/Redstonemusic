<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<base href="<?php echo base_url()?>" />
	<title>redstone的音乐</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/my_modal.css"/>  
	<link rel="stylesheet" type="text/css" href="css/aboutme.css"/>
	<script type="text/javascript">
		$(document).ready(function(){

			
			$("#a8").attr("class","actived");
			for(var i=1;i<=8;i++ ){
				$("#a"+i).mouseover(function(){
				
					for (j = 1; j < 7; j++)
					{
						$('#'+this.id).animate({
							'margin-left': '-=1'
						}, 3, function() {
						    $(this).animate({
								'margin-left': '+=2'
							}, 3, function() {
								$(this).animate({
									'margin-left': '-=1'
								}, 3, function() {
									
								});
							});
						});
					}
				});
			}

			$("#aboutme_id").animate({
				height:"200px"
			});
			//$("#aboutme_id").slideToggle("slow");
			
		});
	
	</script>
</head>
<body>
<div class="top_line">
	
</div>
<div class="header">
</div>

<div class="main">
	<div class="nav">
		<ul id="menu">
			<li><a href="<?php echo site_url("indexs/index")?>" id="a1">主页</a></li>
			<li><a href="<?php echo site_url("indexs/young")?>" id="a2">青春记忆</a></li>
			<li><a href="<?php echo site_url("indexs/old")?>" id="a3">怀旧经典</a></li>
			<li><a href="<?php echo site_url("indexs/love")?>" id="a4">情歌速递</a></li>
			<li><a href="<?php echo site_url("indexs/courage")?>" id="a5">励志天堂</a></li>
			<li><a href="<?php echo site_url("indexs/english")?>" id="a6">英文金曲</a></li>
			<li><a href="<?php echo site_url("upload_musics/index")?>" id="a7">上传歌曲</a></li>
			<li><a href="<?php echo site_url("indexs/aboutme")?>" id="a8">关于我</a></li>
		</ul>
		
	</div>
	<br/>
<div class="mymusic">
		<div class="mytitle"><h2>关于我</h2></div>
		<hr/>
		<br/>
		<div class="aboutme" id="aboutme_id">
			<br/>
			<div class="about_content">
				<div class="myphoto"><img src="myphoto/chenmingxin.jpeg" style="height:150px;"/></div><div class="myinfo">陈明新，网名Redstone，北京理工大学计算机学院硕士在读。研究方向网络与信息安全，主要专注于web安全，以及匿名订购协议的研究。本科期间独立完成多项web开发项目，前端后端全栈工程师。未来将转战大型网站架构分析，Hadoop，spark，大数据分析等方向。<br/><br/>联系方式：chenmingxinbit@gmail.com<br/>现居住地：北京-海淀<br/>邮编：100081</div>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<h2>Redstone.</h2>
			</div>
			
			
		</div>
</div>
<br/>
<br/>

</div>

<br/>
<br/>

</body>
</html>

