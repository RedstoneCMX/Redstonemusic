<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<base href="<?php echo base_url()?>" />
	<title>redstone的音乐</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/my_modal.css"/>  
	<script type="text/javascript">
		$(document).ready(function(){
			$("#a2").attr("class","actived");
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

			
			var func_id=new Array("one_cycle_id","inturn_id","cycleplay_id","random_id");
			$("#inturn_id").addClass("play_setting_click");
			var func_length=func_id.length;

			function selectplaytype(id){
				for(var i=0;i<func_length;i++){
					if(id!=func_id[i])
						$("#"+func_id[i]).removeClass("play_setting_click");
					if(id==func_id[i]){
						$("#"+func_id[i]).addClass("play_setting_click");
						}
				}
			}
			
			var num=<?php echo $young_num ?>;

			//单曲循环函数
			function one_cycle(){
				this.play();
			}
			//顺序播放函数
			function inturn(){
				var nextid=parseInt(this.id.substr(9))+1;
				var youngsongnext=document.getElementById("youngsong"+nextid);
				youngsongnext.play();
			}

			//循环播放函数
			function cycleplay(){
				var nextid=parseInt(this.id.substr(9))+1;
				if(nextid<num){
					var youngsongnext=document.getElementById("youngsong"+nextid);
					youngsongnext.play();
				}
				if(nextid==num){
					var youngsongfirst=document.getElementById("youngsong0");
					youngsongfirst.play();
				}
			}
			//随机播放函数
			function randomplay(){
				 var i=parseInt(Math.random()*num);
				 var youngsongrandom=document.getElementById("youngsong"+i);
				 youngsongrandom.play();
			}
			
			for(var i=0;i<num;i++){
				
				$("#young_look_lyric_id"+i).mouseover(function(){
					$("#"+this.id).attr("class","look_lyric_over");
				});
				$("#young_look_lyric_id"+i).mouseleave(function(){
					$("#"+this.id).attr("class","look_lyric");
				});
				
				$("#young_look_lyric_id"+i).click(function(){
					var temp=this.id.substr(19);
					$('#young_myModal'+temp).modal('show');
				});

				var youngsong=document.getElementById("youngsong"+i);
				if(i<num){
					youngsong.addEventListener('ended',inturn);
				}
				
			}
			
			//单曲循环
			$("#one_cycle_id").click(function(){

				selectplaytype(this.id);
				for(var i=0;i<num;i++){
					var youngsong=document.getElementById("youngsong"+i);
					youngsong.removeEventListener('ended', inturn);
					youngsong.removeEventListener('ended', cycleplay);
					youngsong.removeEventListener('ended', randomplay);
					youngsong.addEventListener('ended',one_cycle);
				//	alert("aaa");
				}
			});
			//顺序播放
			$("#inturn_id").click(function(){
					selectplaytype(this.id);
					for(var i=0;i<num;i++){
						var youngsong=document.getElementById("youngsong"+i);
						youngsong.removeEventListener('ended', one_cycle);
						youngsong.removeEventListener('ended', cycleplay);
						youngsong.removeEventListener('ended', randomplay);
						if(i<num){
							youngsong.addEventListener('ended',inturn);
						}
					}
			});

			//循环播放
			$("#cycleplay_id").click(function(){
					selectplaytype(this.id);
					for(var i=0;i<num;i++){
						var youngsong=document.getElementById("youngsong"+i);
						youngsong.removeEventListener('ended', one_cycle);
						youngsong.removeEventListener('ended', inturn);
						youngsong.removeEventListener('ended', randomplay);
						youngsong.addEventListener('ended',cycleplay);
					}
			});

			//随机播放
			$("#random_id").click(function(){
					selectplaytype(this.id);
					for(var i=0;i<num;i++){
						var youngsong=document.getElementById("youngsong"+i);
						youngsong.removeEventListener('ended', one_cycle);
						youngsong.removeEventListener('ended', inturn);
						youngsong.removeEventListener('ended', cycleplay);
						youngsong.addEventListener('ended',randomplay);
					}
			});
			

		});

		//滚动条滚动加载
		<?php for($i=2;isset($young_result[$i]);){ ?>
			
			window.onscroll=function(){
				var a=<?php echo $i ?>;
				alert(a);
				<?php $j=$i; ?>
			 if($(document).scrollTop()>=$(document).height()-$(window).height()){
				var one_content="<div class='one_song'><div class='one_song_first'><h3><?php echo $young_result[$j]->name ?></h3><div><audio controls='true' preload='none' id='youngsong<?php echo $j?>'><source src='<?php echo $young_result[$j]->path ?>' type='audio/mpeg'>Your browser does not support the audio element.</source></audio></div><br/><div class='singer'>歌手:<?php echo $young_result[$j]->singer ?> </div><div class='look_lyric' id='young_look_lyric_id<?php echo $j?>'> 查看歌词</div><br/><br/><div class='download'><a href='<?php echo site_url('downloads/download') ?>?downpath=<?php echo $young_result[$j]->path?>'>下载歌曲</a></div></div><div class='img_content'><img src='<?php echo $young_result[$j]->photo ?>' style='height:200px;width:200px;'/></div></div>";
				$(one_content).appendTo($(".music_content"));

			}
			<?php $i++;?>
		}
		<?php  }?>
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
		<div class="mytitle">
		<br/>
		<div class="music_title">青春记忆</div>
		<div class="play_setting"><a id="one_cycle_id">单曲循环</a></div>
		<div class="play_setting"><a id="inturn_id">顺序播放</a></div>
		<div class="play_setting"><a id="cycleplay_id">列表循环</a></div>
		<div class="play_setting"><a id="random_id">随机播放</a></div>
		</div>
		<br/><br/>
		<hr/>
		<div class="music_content">
			<?php for($i=0;$i<2;$i++){ ?>
			<div class="one_song">
				<div class="one_song_first">
				<h3><?php echo $young_result[$i]->name ?></h3>
				<div>
				<audio controls="true" preload="none" id="youngsong<?php echo $i?>">
					<source src="<?php echo $young_result[$i]->path ?>" type="audio/mpeg">
						Your browser does not support the audio element.
					</source>	
				</audio>
				</div>
				<br/>
				<div class="singer">歌手:<?php echo $young_result[$i]->singer ?> </div>
				<div class="look_lyric" id="young_look_lyric_id<?php echo $i?>"> 查看歌词</div><br/><br/>
				<div class="download"><a href="<?php echo site_url('downloads/download') ?>?downpath=<?php echo $young_result[$i]->path?>">下载歌曲</a></div>
				
				</div>
				<div class="img_content"><img src="<?php echo $young_result[$i]->photo ?>" style="height:200px;width:200px;" /></div>
				
			</div>
			
			
			<div class="modal fade" id="young_myModal<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">歌词</h4>
			      </div>
			     	<div class="modal-body">
			     	<div class="lyric">
			     		<pre><?php echo $young_result[$i]->lyric ?></pre>
			     	</div>
					
			
			                    	
					</div>
			      <div class="modal-footer">
						<button  data-dismiss="modal" id="close_lyric">关闭</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			<?php }?>
			
		</div>
		
	</div>
	
	<br/>
<br/>
</div>
<br/>
<br/>

</body>
</html>

