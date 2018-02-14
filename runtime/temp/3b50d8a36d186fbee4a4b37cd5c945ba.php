<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\user\info.html";i:1517882893;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>个人资料</title>
    <link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style>
    .sever{
        margin-top:30px;
    }
    .row-center{

        display:flex;
        align-items:center;
        justify-content:center;

    }
  .col-center{

        display:flex;
  	   flex-direction:column;
        align-items:center;
        justify-content:center;

    }
    p,strong{
	font-size:18px;
    }
</style>

<body style="overflow-y:scroll;">

<div class="layui-container-fluid"  style=" display:flex;justify-content:center;align-items: center;">
    <?php if(isset($data)): ?>
    <div class="">
	
         <img   src="<?php echo $data['avastar']==''?'/static/images/avastar.png' : $data['avastar']; ?>" style="width:200px;height:200px;border-radius:50%;object-fit:cover;">
         <button class="layui-btn sever change">点击上传头像</button>
         
      <div  class="sever" style="text-align:left;line-height:2;">
	      <p><strong>姓名：</strong><span><?php echo $data['truename']; ?></span></p>
	      <p><strong>性别：</strong><span><?php echo $data['sex']; ?></span></p>
	      <p><strong>出生日期：</strong><span><?php echo $data['birthdate']; ?></span></p>
	      <p><strong>目标职位：</strong><span><?php echo $data['position']; ?></span></p>
	      <p><strong>毕业院校：</strong><span><?php echo $data['graduated']; ?></span></p>
	      <p><strong>学历：</strong><span><?php echo $data['education']; ?></span></p>
      </div> 
      
     
      <strong>自我评价</strong>
      <p style="margin-top:15px;"><?php echo $data['selfevaluation']; ?></p>
      <strong>工作经历</strong>
      <p style="margin-top:15px;"><?php echo $data['experience']; ?></p>
       
       
       
     <a target="_parent" href="<?php echo url('register/editRegister'); ?>" class="layui-btn sever" >修改</a>
      
    </div>
    
    
    
  <!--   <div style="width:200px;height:200px;border-radius: 50%;">
        <img  class="change"  src="<?php echo isset($data['avastar'])?$data['avastar']: '/static/images/avastar.png'; ?>" style="width:200px;height:200px;border-radius:50%;object-fit:cover;">
    </div>

  <div  style="margin-top:30px;text-align:center;line-height:1.75;">



  </div> -->


<?php else: ?>

    <p>你还没有详细的信息，<a  target="_parent" href="<?php echo url('register/userRegister'); ?>">马上去填写</a></p>
    <?php endif; ?>




</div>

<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script>
    window.onload=function(){

    }

    layui.use('upload', function(){
        var form = layui.form;
        var upload = layui.upload
        upload.render({
			   elem: '.change',
			  url: "<?php echo url('imgUpload'); ?>",
			  field:"image",
	         before: function(obj){ 
					layer.load(2); 
		      }
			  ,done: function(res, index, upload){	
				  layer.closeAll("loading")
			    if(res.code == 0){
	            history.go(0)		
			    }			    
			  }
			}); 
        
        
        

    });
</script>

</body>
</html>