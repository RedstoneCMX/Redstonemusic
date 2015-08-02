<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<base href="<?php echo base_url()?>" />
<title>上传示例</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css"/>
<script type="text/javascript">
var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
var i=0;//初始化数组下标
$(function() {
    $('#file_upload1').uploadify({
    	'auto'     : false,//关闭自动上传
    	'removeTimeout' : 1,//文件队列上传完成1秒后删除
        'swf'      : 'uploadify.swf',
        'uploader' : 'uploads/upload',
        'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
		'formData':{'id':'6'},//在服务端使用$_POST['id']获取该数据,服务端代码上传成功后将在目录生成一个6.txt的文件
        'buttonText' : '选择图片',//设置按钮文本
        'multi'    : true,//允许同时上传多张图片
        'uploadLimit' : 1,//一次最多只允许上传10张图片
        'fileTypeDesc' : 'Image Files',//允许所有文件
        'fileTypeExts' : '*gif; *.jpg; *.png',//限制允许上传的图片后缀
        'fileSizeLimit' : '200KB',//限制上传的图片不得超过200KB 
        'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
           //    img_id_upload[i]=data;
            //   i++;
        	alert(data);
        },
        'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
          //  if(img_id_upload.length>0)
         //   alert('成功上传的文件有：'+encodeURIComponent(img_id_upload));
        }  
        // Put your options here
    });


    $('#file_upload2').uploadify({
    	'auto'     : false,//关闭自动上传
    	'removeTimeout' : 1,//文件队列上传完成1秒后删除
        'swf'      : 'uploadify.swf',
        'uploader' : 'uploads/upload',
        'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
		'formData':{'id':'6'},//在服务端使用$_POST['id']获取该数据,服务端代码上传成功后将在目录生成一个6.txt的文件
        'buttonText' : '选择文件',//设置按钮文本
        'multi'    : true,//允许同时上传多张图片
        'uploadLimit' : 1,//一次最多只允许上传10张图片
        'fileTypeDesc' : 'All Files',//允许所有文件
        'fileTypeExts' : '*.mp3',//限制允许上传的图片后缀
        'fileSizeLimit' : '200MB',//限制上传的图片不得超过200KB 
        'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
            //   img_id_upload[i]=data;
            //   i++;
            alert(data);
        },
        'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
          //  if(img_id_upload.length>0)
          //  alert('成功上传的文件有：'+encodeURIComponent(img_id_upload));
        }  
        // Put your options here
    });

    $("#a_upload").click(function(){
    	$('#file_upload1').uploadify('upload','*');
    	$('#file_upload2').uploadify('upload','*');
    });
    
});
</script>
</head>
<body>
<input type="file" name="file_upload1" id="file_upload1" />
<input type="file" name="file_upload2" id="file_upload2" />
<p><a  id="a_upload">上传</a>
<a href="javascript:$('#file_upload1').uploadify('cancel','*')">重置图片上传队列</a>
<a href="javascript:$('#file_upload2').uploadify('cancel','*')">重置歌曲上传队列</a>
</p>
</body>
</html>