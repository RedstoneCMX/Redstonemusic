<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<base href="<?php echo base_url()?>" />
	<title>redstone的音乐</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mytooltip.js"></script>
	<script type="text/javascript" src="js/jquery.uploadify-3.1.min.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	<link rel="stylesheet" type="text/css" href="css/uploadify.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/upload_music.css"/>
	<link rel="stylesheet" type="text/css" href="css/upload_modal.css"/>
	<script type="text/javascript" src="js/artDialog.min.js"></script>
	<script type="text/javascript" src="js/artDialog.plugins.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/twitter.css"/>
	<link rel="stylesheet" type="text/css" href="css/my_tooltip.css"/>    
	<script type="text/javascript">
		var flag=0;
		$(document).ready(function(){

			$("#a7").attr("class","actived");

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
			
			function add_data(){	
				var songname=$("#song_name").val();
				var songpath=$("#input_song").val();
				var singer=$("#input_singer").val();
				var songtype=$("#song_type").val();
				var lyric=$("#lyric_text").val();
				if(lyric=="")
					lyric="暂无歌词";
				var photopath=$("#hidden_input_image").val();
				//alert(songname+songpath+singer+songtype+lyric+photopath);
				
				$.post("<?php echo site_url('upload_musics/input_sql')?>",{songname:songname,songpath:songpath,singer:singer,songtype:songtype,lyric:lyric,photopath:photopath},function(d){	
					if(d=="添加成功"){
						$("#myModal").modal('hide');
			        	var dialog = art.dialog({
							title: '提示',
							content:"上传成功！",
							width:250,
							height:60,
							ok:function(){
								
	    	  					return true;
							},
							okValue:'确定'
						});
						dialog.visible();
					}

					if(d=="添加失败"){
						$("#myModal").modal('hide');
			        	var dialog = art.dialog({
							title: '提示',
							content:"上传失败！",
							width:250,
							height:60,
							ok:function(){
								
	    	  					return true;
							},
							okValue:'确定'
						});
						dialog.visible();
					}
					
				});
			}


			$('#file_upload_song').uploadify({
		    	'auto'     : false,//关闭自动上传
		    	'removeTimeout' : 1,//文件队列上传完成1秒后删除
		        'swf'      : 'uploadify.swf',
		        'uploader' : '<?php echo site_url("upload_musics/upload_song")?>',
		        'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
		        'buttonText' : '浏览',//设置按钮文本
		        'multi'    : true,//允许同时上传多张图片
		        'uploadLimit' : 1,//一次最多只允许上传10张图片
		        'fileTypeDesc' : 'All Files',//允许所有文件
		        'fileTypeExts' : '*.mp3',//限制允许上传的图片后缀
		        'fileSizeLimit' : '200MB',//限制上传的图片不得超过200KB
		        'width': 80,//buttonImg的大小  
			    'height': 30,// 
			    'rollover': true,//button是否变换
			    'onSelect': function(fileObj){
					//alert(fileObj.name);
					//$('#file_upload_song').uploadify('cancel','*');
					$("#input_song").attr("value",fileObj.name);
				 }, 
		        'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
					//alert(data);
					if(data=="已有相同歌曲了"){
						$("#myModal").modal('hide');
						var dialog = art.dialog({
							title: '提示',
							content:data,
							width:250,
							height:60,
							ok:function(){
								
	    	  					return true;
							},
							okValue:'确定'
						});
						dialog.visible();
						
				    }
					else{
						flag++;
					//	if(flag==2){
					//		add_data();
					//    }
						$('#file_upload_photo').uploadify('upload','*');
					}
					
					
					
		           // alert(data);
		        },
		        'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
		        	$('#file_upload_song').uploadify('cancel','*');
		        }  
		        // Put your options here
		    });
			
			$('#file_upload_photo').uploadify({
			   	'auto'     : false,//关闭自动上传
			   	'removeTimeout' : 1,//文件队列上传完成1秒后删除
			   	'swf'      : 'uploadify.swf',
			   	'uploader' : '<?php echo site_url("upload_musics/upload_image")?>',
			   	'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
			    'buttonText' : '浏览',//设置按钮文本
			    'multi'    : true,//允许同时上传多张图片
			    'uploadLimit' : 1,//一次最多只允许上传10张图片
			    'fileTypeDesc' : 'Image Files',//允许所有文件
			    'fileTypeExts' : '*gif; *.jpg; *.png',//限制允许上传的图片后缀
			    'fileSizeLimit' : '10MB',//限制上传的图片不得超过200KB  
			    'width': 80,//buttonImg的大小  
			    'height': 30,// 
			    'rollover': true,//button是否变换
			    'onSelect': function(fileObj){
					//alert(fileObj.name);
					//$('#file_upload_photo').uploadify('cancel','*');
					$("#input_image").attr("value",fileObj.name);
				 }, 
			    'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
			        
			        flag++;
			        if(flag==2){
			        	$("#hidden_input_image").attr("value",data);
			        	add_data();
			        }
			     },
			     'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
			    	 $('#file_upload_photo').uploadify('cancel','*');
			     }  
			        // Put your options here
			});

			
			$("#total_upload_id").click(function(){
				
				var songname=$("#song_name").val();
				var songpath=$("#input_song").val();
				var singer=$("#input_singer").val();
				var songtype=$("#song_type").val();
				var lyric=$("#lyric_text").val();
				var photopath=$("#input_image").val();

				if(songname==""){
					buildTooltip("#song_name", "歌曲名称不能为空！", "right");
					destroyTooltip("#song_name");
				}
				if(songpath==""){
					buildTooltip("#file_upload_song", "请选择歌曲！", "right");
					$("#file_upload_song").mouseover(function(){
						$("#file_upload_song").tooltip('destroy');
					});
				}
				if(singer==""){
					buildTooltip("#input_singer", "歌手不能为空！", "right");
					destroyTooltip("#input_singer");
				}
				if(songtype==""){
					buildTooltip("#song_type", "歌曲类型不能为空！", "right");
					destroyTooltip("#song_type");
				}
				if(photopath==""){
					buildTooltip("#file_upload_photo", "请选择图片！", "right");
					$("#file_upload_photo").mouseover(function(){
						//alert("aaa");
						$("#file_upload_photo").tooltip('destroy');
					});
				}
				if(songname==""||songpath==""||singer==""||songtype==""||photopath==""){
					return ;
				}
				
				
				$("#myModal").modal('show');
				
				$('#file_upload_song').uploadify('upload','*');
		    	
		    	//重置上传队列
		    	//$('#file_upload_song').uploadify('cancel','*');
		    	//$('#file_upload_photo').uploadify('cancel','*');
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

	<div class="mymusic">
		<div class="mytitle"><h2>上传歌曲</h2></div>
		<hr/>
		<br/>
		
		<div class="upload_main">
			<div class="upload_content">
			<div class="remind_title">歌曲名称:</div><div class="input_info"><input type="text" class="input_class" id="song_name" name="song_name"/></div>
			<br/><br/><br/>
			<div class="remind_title">选择歌曲:</div><div class="input_info"><input type="text" class="input_class" id="input_song" /></div><div class="button_scan" id="button_scan_song"><input type="file" name="file_upload_song" id="file_upload_song"/></div>
			<br/><br/><br/>
			<div class="remind_title">歌手:</div><div class="input_info"><input type="text" class="input_class" id="input_singer" /></div>
			<br/><br/><br/>
			<div class="remind_title">歌曲类型:</div><div class="input_info">
			<select class="select_class" id="song_type">
			<option>青春记忆</option>
			<option>怀旧经典</option>
			<option>情歌速递</option>
			<option>励志天堂</option>
			<option>英文金曲</option>
			</select>
			</div>
			<br/><br/><br/>
			<div class="lyric_title">歌词:</div><div class="lyric_content"><textarea class="lyric_class" id="lyric_text"></textarea></div>
			
			<div class="remind_title">选择图片:</div><div class="input_info"><input type="text" class="input_class" id="input_image" name="input_image"/></div><div class="button_scan" id="button_scan_image"><input type="file" name="file_upload_photo" id="file_upload_photo"  /></div>
			</div>
			
			<div class="submit_upload"><button class="upload_button" id="total_upload_id">上传歌曲</button></div>
			
		</div>
	</div>
<br/>
<br/>
<br/>
<br/>
</div>

<br/>
<br/>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="loading_img"></div>		 
</div><!-- /.modal -->
<input type="text" id="hidden_input_image" style="display:none"/>
</body>
</html>

