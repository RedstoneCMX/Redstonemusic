<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<base href="<?php echo base_url()?>" />
	<title>redstone的音乐</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.windstagball.js"></script>
	<script type="text/javascript" src="js/artDialog.min.js"></script>
	<script type="text/javascript" src="js/artDialog.plugins.min.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	<link rel="stylesheet" type="text/css" href="css/twitter.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/my_modal.css"/>  
	<script type="text/javascript">
		$(document).ready(function(){

			$("#a1").attr("class","actived");

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

			$("#cloud_div").windstagball({
	            radius:120,
	            speed:15
	        });

			$("#contactme").click(function(){
				var dialog = art.dialog({
					title: '提示',
					content:"给我发邮件吧亲！",
					width:250,
					height:60,
					ok:function(){
						
	  					return true;
					},
					okValue:'确定'
				});
				dialog.visible();
			});

			$("#surprise").click(function(){
				alert("孩子，好好学习，天天向上！╮(╯_╰)╭");
			});
			
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
<div id="cloud_div">
	<a href="<?php echo site_url("indexs/young")?>">青春记忆</a>
	<a href="<?php echo site_url("indexs/old")?>" >怀旧经典</a>
	<a href="<?php echo site_url("indexs/love")?>">情歌速递</a>
	<a href="<?php echo site_url("indexs/courage")?>">励志天堂</a>
	<a href="<?php echo site_url("indexs/english")?>">英文金曲</a>
	<a href="<?php echo site_url("upload_musics/index")?>">上传歌曲</a>
	<a href="http://weibo.com/u/2348228554/home" class="red" target="blank">我的微博</a>
	<a href="#" id="contactme" class="green">联系我1175326238@qq.com</a>
	<a href="http://www.bit.edu.cn/" target="blank">北京理工大学</a>
	<a href="http://cs.bit.edu.cn/" target="blank">计算机学院</a>
	<a href="#" id="surprise">有惊喜哦</a>
	<a href="http://lfy2us.com/" class="red" target="blank">小二哥的主页</a>
</div>
<br/> 
<br/>


</div>

<br/>
<br/>
</body>
</html>
