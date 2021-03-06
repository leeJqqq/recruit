<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\register\userRegister.html";i:1514363401;s:72:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\layout.html";i:1517825523;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="keywords" content="<?php echo $pc['keywords']; ?>" />
<link rel="stylesheet" href="/static/css/swiper.min.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/admin/layui/css/layui.css" />
 <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css" /> 
<link rel="stylesheet" href="/static/css/hover-min.css" />
<link rel="stylesheet" href="/static/css/bootsnav.css" />

<title><?php echo $pc['title']; ?></title>
</head>
<style>
/* common */
body,html{
	font-family:"Helvetica Neue", Helvetica, Arial, "PingFang SC", "Hiragino Sans GB", "Heiti SC", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
	color:#333;
	font-size:16px;
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
.sever{
	margin-top:30px;
}
.line-indent{
	text-indent:2em;
}
.text-nowrap{
	white-space:nowrap; 
	text-overflow:ellipsis; 
	-o-text-overflow:ellipsis; 
	overflow: hidden; 
}


/*common  */

/* index */

.company-logo{
	width:128px;
	height:64px;
	
}
#mynav>ul>li>a{
   color:#000000;
   background:#ffffff;
    border-bottom:2px solid #FFFFFF;
}
#mynav>ul>li>a:active,#mynav>ul>li>a:hover,#mynav>ul>li>a:focus,#mynav .active a{
     border-bottom:2px solid #1881EC;
     color:#1881EC;
}
/*index  */

/*course  */
.hvr-sweep-to-top:before{
	z-index:10;
	background:#000000;
	opacity:0.5;
	-webkit-transition-duration: .2s;
    transition-duration: .2s;
}



#course{
  border:0;	
}
 #course a{
  	border:0;
 	color:#000000;

 }  
 #course a:active,#course a:hover,#course a:focus, #course .active a{
	color:#1881EC;
 	
 }
 .course-item{
	cursor:pointer;
 	width:380px;
 	
 }
 .course-name:hover{
	color:#1881EC;
 }
 
 #detail{
	border:0;
 }
 #detail a{
  	border:0;
 	color:#000000;
 	background:#ffffff;
 }
#detail a:active,#detail a:hover,#detail a:focus,#detail .active a{
	color:#1881EC;	
 }
 
 
/*course  */
 
/*userreg*/
.userregform .layui-form-radio i:hover, .layui-form-radioed i{
	color:#1881EC;
}
.userregform label{
	white-space:nowrap;
}
 
 
/*userreg  */
.mylabel{
	font-weight:normal;
	font-size:14px;
	
}
/* userreg */

</style>
<body style="">
<nav class="navbar navbar-default" style="margin-bottom: 0;background:#ffffff;">
  <div class="container " style="">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
        <span class="sr-only">响应式汉堡按钮</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <img src="<?php echo $logo; ?>" alt=""  style="width:64px;height:64px;"/>
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="mynav" >
 
     <ul class="nav navbar-nav "  style="display:inline-block;margin-left:15px;" >
      <li  data-c="index" class="active"><a href="<?php echo url('index/index'); ?>">首页 <span class="sr-only">(current)</span></a></li>
      <?php if(is_array($navlist) || $navlist instanceof \think\Collection || $navlist instanceof \think\Paginator): $i = 0; $__LIST__ = $navlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <li data-c="<?php echo $vo['c']; ?>"><a href="<?php echo $vo['column']; ?>"><?php echo $vo['name']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>

        <ul class="nav navbar-nav navbar-right "  style="display:inline-block;" >
            <?php if(isset($username)): ?>
         <!--   <div class="navbar-text ">

                <span> 用户  </span>

            </div>-->

            <li  class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo url('user/index'); ?>">个人中心</a></li>
                    <li><a href="<?php echo url('user/logout'); ?>">退出</a></li>
                </ul>
            </li>
            <?php else: ?>
            <p class="navbar-text navbar-right "><a href="#" class="navbar-link useroper" data-toggle="modal" data-target="#userModal">注册/登录</a></p>
            <?php endif; ?>



        </ul>

     
      <!--       <p class="navbar-text navbar-right "><a href="<?php echo url('index/user/index'); ?>" class="navbar-link" >个人后台</a></p> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 <img src="/static/images/zzz.jpg" width="100%" style="height:400px;object-fit:cover;" alt="...">
<div class="container sever" >
<h2 class="text-center">个人信息填写</h2>
    <form class="layui-form sever userregform"  >
   
        <div class="layui-form-item">
            <label class="layui-form-label">姓名：</label>
            <div class="layui-input-block">
                <input type="text" name="name" value="<?php echo isset($data['truename'])?$data['truename']:''; ?>"  lay-verify="required" placeholder="请输入真实姓名" autocomplete="off" class="layui-input">
            </div>
        </div>
        <?php if(!isset($data)): ?>
        <div class="layui-form-item">
            <label class="layui-form-label">密码：</label>
            <div class="layui-input-block">
                <input type="password" name="pwd"  lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码：</label>
            <div class="layui-input-block">
                <input type="password" name="pwd2"  lay-verify="required" placeholder="请再次输入你的密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <?php endif; ?>

           <div class="layui-form-item">
            <label class="layui-form-label">出生日期：</label>
            <div class="layui-input-block">
                <input type="text" name="date" id="userdate" value="<?php echo isset($data['birthdate'])?$data['birthdate']:''; ?>"  lay-verify="required" placeholder="请选择出生年月" autocomplete="off" class="layui-input">
            </div>
        </div>
        <?php if(isset($data)): ?>
        <div class="layui-form-item">
            <label class="layui-form-label">性别：</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" value="0" title="男" <?php if($data['sex'] == '0'): ?>checked<?php endif; ?>>
                <input type="radio" name="sex" value="1" title="女" <?php if($data['sex'] == '1'): ?>checked<?php endif; ?>>
            </div>
        </div>
        <?php else: ?>
        <div class="layui-form-item">
            <label class="layui-form-label">性别：</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" value="0" title="男" checked>
                <input type="radio" name="sex" value="1" title="女" >
            </div>
        </div>
        <?php endif; ?>

        <div class="layui-form-item">
            <label class="layui-form-label">目标职位：</label>
            <div class="layui-input-block">
                <input type="text" name="position" value="<?php echo isset($data['position'])?$data['position']:''; ?>"   lay-verify="required" placeholder="请输入目标单位" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">毕业院校：</label>
            <div class="layui-input-block">
                <input type="text" name="graduated"  value="<?php echo isset($data['graduated'])?$data['graduated']:''; ?>" lay-verify="required" placeholder="请输入毕业院校" autocomplete="off" class="layui-input">
            </div>
        </div>



        <?php if(isset($data)): ?>
        <div class="layui-form-item">
            <label class="layui-form-label">学历：</label>
            <div class="layui-input-block">
                <input type="radio" name="edu" value="初中" title="初中" <?php if($data['education'] == '初中'): ?>checked<?php endif; ?>>
                <input type="radio" name="edu" value="高中" title="高中" <?php if($data['education'] == '高中'): ?>checked<?php endif; ?>>
                <input type="radio" name="edu" value="大专" title="大专" <?php if($data['education'] == '大专'): ?>checked<?php endif; ?>>
                <input type="radio" name="edu" value="本科" title="本科" <?php if($data['education'] == '本科'): ?>checked<?php endif; ?>>
                <input type="radio" name="edu" value="硕士" title="硕士" <?php if($data['education'] == '硕士'): ?>checked<?php endif; ?>>
                <input type="radio" name="edu" value="博士" title="博士" <?php if($data['education'] == '博士'): ?>checked<?php endif; ?>>

            </div>
        </div>
        <?php else: ?>
        <div class="layui-form-item">
            <label class="layui-form-label">学历：</label>
            <div class="layui-input-block">
                <input type="radio" name="edu" value="初中" title="初中">
                <input type="radio" name="edu" value="高中" title="高中" checked>
                <input type="radio" name="edu" value="大专" title="大专">
                <input type="radio" name="edu" value="本科" title="本科">
                <input type="radio" name="edu" value="硕士" title="硕士">
                <input type="radio" name="edu" value="博士" title="博士">

            </div>
        </div>
        <?php endif; ?>




        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">自我评价</label>
            <div class="layui-input-block">
                <textarea name="selfevaluation"  placeholder="请输入自我评价" lay-verify="required" class="layui-textarea"><?php echo isset($data['selfevaluation'])?$data['selfevaluation']:''; ?></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">工作经历</label>
            <div class="layui-input-block">
                <textarea name="experience" placeholder="请输入工作经历" lay-verify="required" class="layui-textarea"><?php echo isset($data['experience'])?$data['experience']:''; ?></textarea>
            </div>
        </div>


<?php if(isset($data)): ?>
        <button class="layui-btn center-block" lay-submit lay-filter="editreg"   data-loading-text="正在提交..." style=" border-radius:20px;background:#1881EC;color:#ffffff;">立即提交</button>
        <?php else: ?>
        <button class="layui-btn center-block" lay-submit lay-filter="userreg"   data-loading-text="正在提交..." style=" border-radius:20px;background:#1881EC;color:#ffffff;">立即提交</button>
        <?php endif; ?>

        
    </form>
     

</div>

<div class="container-fluid sever" style="background:#DFDFDF;">
<div class="container" style="height:100%;">
<h4 class="text-center">宣传口号：<?php echo $footer['catchword']; ?></h4>
	<div class="row row-center">
	   <div class="col-md-4 col-center" style="border-right:1px solid #ffffff;">
          <div style="background:#ffffff;width:150px;height:150px;position:relative;line-height:150px;">
       <video  src="<?php echo $footer['myvideo']; ?>"  width="150px" height="150px"  >
       您的浏览器不支持在线播放视频
       </video>
       <span id="footvideo" class="fa fa-play-circle fa-3x" style="position:absolute;color:#ffffff;cursor:pointer;top: 50%;left: 50%;transform: translate(-50%, -50%);"></span> 
         </div>
        </div>
	   <div class="col-md-4 col-center" style="height:150px;border-right:1px solid #ffffff;overflow:auto;">
        <?php if(is_array($posts) || $posts instanceof \think\Collection || $posts instanceof \think\Paginator): $i = 0; $__LIST__ = $posts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <p><a href="<?php echo url('post/postdetail','postid='.$vo['postid']); ?>"><?php echo $vo['title']; ?></a></p>
        <?php endforeach; endif; else: echo "" ;endif; ?>   
       </div>
	   <div class="col-md-4 col-center">
      <div style="background:#ffffff;width:150px;height:150px;">
      <img src="<?php echo $footer['label_img']; ?>" width="100%"  height="100%" />
      </div>
      </div>
	</div>
	<h5 class='text-center'>Copyright@2013-2018 ZHONGSHAN ZMR Co.Ltd掌门人网络科技有限公司技术支持</h5>
</div>
</div>

<!-- 用户注册时弹出 -->

<div class="modal fade"  role="dialog" id="userModal" style="">
 <div class="modal-dislog" style="width:350px;  position:absolute; top: 50%;left: 50%;transform: translate(-50%, -50%);">
     <div class="hidden modal-content userReg">
     
        <div style="padding:15px;">
          <h4 style="border-bottom:2px solid #1881EC;margin-bottom:0;display:inline-block;padding-bottom:15px;">绑定信息</h4>
          <hr  style="margin:0;" />
        </div>




        <div class="modal-body">
        
        	<form class="form-horizontal">
        	
        	<div class="form-group">
	        	<div class="col-md-12">
	        	<label class="control-label hidden mylabel" for="tel">手机号码不能为空</label>
	        	  <input type="tel"  name="tel" id="tel" class="form-control" placeholder="请输入手机号码" />
	        	</div>
        	</div>
        	
            <div class="form-group">
            <div class="col-md-8">
            <label class="control-label hidden mylabel" for="code">验证码不能为空</label>
            	<input type="text"  name="code" id="code" class="form-control" placeholder="请输入验证码" />
            </div>

             <div class="col-md-4">
               <button type="button"  style="width:100%;" class="btn btn-default">验证码</button>
             </div>            
        	</div>

                <h5>有账号了？现在去 <a href="#" class="login">登录</a></h5>
        	<button  type="submit"   class="center-block btn btn-default userRegister "  style="background:#1881EC;width:80px; color:#ffffff;border-radius:15px;">提交</button>
        	</form>
        </div>
    </div>
     <div class="modal-content userLogin">

         <div style="padding:15px;">
             <h4 style="border-bottom:2px solid #1881EC;margin-bottom:0;display:inline-block;padding-bottom:15px;">登录</h4>
             <hr  style="margin:0;" />
         </div>

         <div class="modal-body">

             <form class="form-horizontal">

                 <div class="form-group">
                     <div class="col-md-12">
                         <label class="control-label hidden mylabel" for="tel">手机号码不能为空</label>
                         <input type="text"  name="username"  class="form-control" placeholder="请输入手机号码" />
                     </div>
                 </div>

                 <div class="form-group">
                     <div class="col-md-12">
                         <label class="control-label hidden mylabel" for="tel">密码不能为空</label>
                         <input type="password"  name="userpass" class="form-control" placeholder="请输入密码" />
                     </div>
                 </div>

                 <h5>还没有账号？现在去 <a href="#" class="reg">注册</a></h5>
                 <button  type="submit" class="center-block btn btn-default userlogin"  style="background:#1881EC;width:80px; color:#ffffff;border-radius:15px;">登录</button>
             </form>
         </div>
     </div>
 </div>
</div> 
<!-- 用户注册时弹出 -->
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/static/js/lazyload.min.js"></script>
<script src="/static/js/swiper.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script  src="/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/js/bootsnav.js"></script>

<script>
window.onload=function(){
	lazyload();
}
$('#companyReg').modal({
	  'backdrop':'static',
	  'show':false,
	  "keyboard":false
})
 $('#addjob').modal({
  'show':false,
 })
$("#userModal").modal({
 'show':false, 
})
 
 
$(".mycarousel").on("click",function(){
if($(this).attr("data-url")){
location.href=$(this).attr("data-url")
}

}) 
 
function viewdata(initdata){
	var html="";
	 for(key in initdata  ){
		 
	html+='<div class="course-item  col-md-4"  style="width:380px;padding:0 15px;"  data-id="'+initdata[key]['courseid']+'">'+
			'<div class="hvr-sweep-to-top coursehover" style="height:200px;width:350px;">'+
			'<img  class="" src="'+initdata[key]['label_img']+'" width="350px"  height="200px"  style="object-fit: cover;position:absolute;" />'+
			'<button class="btn btn-default hidden courseApply" data-loading-text="正在报名..." data-id="'+initdata[key]['courseid']+'" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index:20;" >加入课程</button>'+
			'</div>'+
			'<h3>'+initdata[key]['name']+'</h3>'+
			'<p class="text-nowrap">'+initdata[key]['desc']+'</p>'+
			'<p>'+
			'<span class="fa fa-eye"></span>'+
			'<span>'+initdata[key]['pageview']+'</span>'+
			'<span class="pull-right">'+initdata[key]['price']+'元</span>'+
			'</p></div>'	 
	 }
	
   $("#courselist").children(".row").append(html);

}
/*common*/
<?php if(isset($nav)): ?>
$("#mynav").find("li").removeClass("active");
$("#mynav").find("li[data-c='<?php echo $nav; ?>']").addClass("active")
<?php endif; ?>

$("#footvideo").on("click",function(event){
	var that=$(this)
	layer.open({
		  type: 2,
		  title: false,
		  area: ['630px', '360px'],
		  shade: 0.8,
		  closeBtn: 0,
		  shadeClose: true,
		  content: that.parent().children("video").attr("src")
		});
})


/*common  */

$(".courseApply").on("click",function(e){

e.stopPropagation();
 var $btn = $(this).button('loading')
var id=$(this).attr("data-id");
$.ajax({
	url:"<?php echo url('course/apply'); ?>",
    data:{courseid:id},
    type:"post",
	success:function(data){
	
		if(data==1){
			layer.msg("报名成功")
		}else if(data===0){
			 $(".useroper").trigger("click")
		}else{
			layer.msg(data)
		}
		
	},
    complete:function(){
        $btn.button('reset')
}
	
	
})
})


$(".jobApply").on("click",function(){
var $btn = $(this).button('loading')
var id=$(this).attr("data-jobid");
$.ajax({
	url:"<?php echo url('job/apply'); ?>",
    data:{jobid:id},
    type:"post",
	success:function(data){
		if(data==1){
			$('#addjob').modal('toggle')
		}else if(data===0){
			 $(".useroper").trigger("click")
		}else{
			layer.msg(data)
		}
		
	},
    complete:function(){
        $btn.button('reset')
}
	
	
})
})


$("#courselist").on({
	mouseenter:function(){
	    
		$(this).children("button").removeClass("hidden")
	},
	mouseleave:function(){
		$(this).children("button").addClass("hidden")
	}
},'.coursehover')

/*报名课程  */

/*首页  */
  var mySwiper = new Swiper ('#company-list', {
	direction: 'vertical',
	slidesPerView : "auto",
	spaceBetween : 20,
      freeMode:true
  })  


/* /首页  */

layui.use(['layer', 'form','upload','laydate'], function(){
  var layer = layui.layer
  ,form = layui.form;
   var upload= layui.upload;
   var laydate=layui.laydate;
  
  /*企业注册  */

   var images={};
  
   form.on('submit(companyReg)', function(data){
	   var $btn = $(data.elem).button('loading')
     if(data.field.pwd!=data.field.pwd2){
    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
    	 return;
     }
  /*  if(JSON.stringify(images) == "{}"){
	   layer.msg("请上传公司图片",{icon:5,shift:6});
   } 
 */

    $.ajax({
    	url:"<?php echo url('companyReg'); ?>",
    	data:{data:data.field,images:images},
    	type:"post",
    	beforeSend:function(){
    		layer.load(2);
    	},
    	success:function(data){
    		if(data==1){
    			$('#companyReg').modal('toggle')
    		}else{
    			layer.msg(data)
    		}
    		
    	},
    	complete:function(){
    		layer.closeAll("loading")
    		  $btn.button('reset')
    	}
    }) 
    return false;
  });
   
   
   //企业资料更新
   form.on('submit(companyRegupdate)', function(data){
	   var $btn = $(data.elem).button('loading')
	   
/*      if(data.field.pwd!=data.field.pwd2){
    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
    	 return;
     } */
 /*   if(JSON.stringify(images) == "{}"){
	   layer.msg("请上传公司图片",{icon:5,shift:6});
   }  */
    $.ajax({
    	url:"<?php echo url('editcprofile'); ?>",
    	data:{data:data.field,images:images},
    	type:"post",
    	beforeSend:function(){
    		layer.load(2);
    	},
    	success:function(data){
    		if(data==1){
    		layer.msg("更新成功",function(){
    			location.href="<?php echo url('companyadmin/index/index'); ?>"    			
    		})
    		
    		}else{
    			layer.msg(data)
    		}
    		
    	},
    	complete:function(){
    		layer.closeAll("loading")
    		  $btn.button('reset')
    	}
    }) 
    return false;
  }); 
   
   
   
   
   /* 用户注册 */
   form.on('submit(userreg)', function(data){
	 var $btn = $(data.elem).button('loading')
     if(data.field.pwd!=data.field.pwd2){
    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
    	
    	 return false; 
     }	
	  data.field['experience']=data.field['experience'].replace(/\n|\r\n/g,"<br>");
	  data.field['selfevaluation']=data.field['selfevaluation'].replace(/\n|\r\n/g,"<br>");  
    $.ajax({
    	url:"<?php echo url('register/userRegister'); ?>",
    	data:{data:data.field},
    	type:"post",
    	beforeSend:function(){
    		layer.load(2);
    	},
    	success:function(data){
    		layer.closeAll("loading")
    		if(data==1){
    			layer.msg("保存成功!");
    		}else if(data==0){
    			layer.msg("请先登录");
    		}
    		
    		else{
    			layer.msg(data)
    		}
    		
    	},
    	complete:function(){
    		layer.closeAll("loading")
    		   setTimeout(function(){
    				location.href="<?php echo url('index/index'); ?>"
    			},500)
    		  $btn.button('reset')


    	}
    }) 
    return false;
  });

    form.on('submit(editreg)', function(data){
        var $btn = $(data.elem).button('loading')
        data.field['experience']=data.field['experience'].replace(/\n|\r\n/g,"<br>");
        data.field['selfevaluation']=data.field['selfevaluation'].replace(/\n|\r\n/g,"<br>");
        $.ajax({
            url:"<?php echo url('register/editRegister'); ?>",
            data:{data:data.field},
            type:"post",
            beforeSend:function(){
                layer.load(2);
            },
            success:function(data){
                layer.closeAll("loading")
                if(data==1){
                    layer.msg("保存成功!");
                }else if(data==0){
                    layer.msg("请先登录");
                }

                else{
                    layer.msg(data)
                }

            },
            complete:function(){
                layer.closeAll("loading")
                setTimeout(function(){
                    location.href="<?php echo url('index/index'); ?>"
                },500)
                $btn.button('reset')


            }
        })
        return false;
    });


    
  /* /企业注册*/
	  upload.render({
			   elem: '.companyimg',
			  url: "<?php echo url('imgUpload'); ?>",
			  field:"image",
			  multiple:true,
	         before: function(obj){ 
					layer.load(2); 
		      }
			  ,done: function(res, index, upload){	
				  layer.closeAll("loading")
			    if(res.code == 0){
			    	
			    	var item = this.item;	
			    	images[$(item).attr("id")]='/temp/'+res.src.replace(/\\/g,'/')			    	
			    	if($(item).children("img").length>0){
			    		$(item).children("img").attr("src",'/temp/'+res.src.replace(/\\/g,'/'));
			    	}else{
			    	  	$(item).children("span").addClass("hidden")
				    	$(item).children("span.del").removeClass("hidden")
				    	$(item).removeClass("companyimg")
				    	$(item).append('<img   style="object-fit:cover;width:100%;height:100%;"   src="/temp/'+res.src.replace(/\\/g,'/')+'"  />')
			    	}
			    }			    
			  }
			});      
			   
  /*  企业注册图片上传*/
  
  /* 课程 */
  
  //点击进入课程内页
  $("#courselist").on("click",".course-item",function(){
	 var id=$(this).attr("data-id");
	  location.href="../../index/course/courseDetail?courseid="+id;
	  
  })
  /* 课程 */


  /*用户注册按钮*/
$(".reg").on("click",function(e){

e.preventDefault();
$(this).closest(".modal-content").addClass("hidden");
$(".userReg").removeClass("hidden")

})

$(".login").on("click",function(e){

    e.preventDefault();
    $(this).closest(".modal-content").addClass("hidden");
    $(".userLogin").removeClass("hidden")

})

 $(".userRegister").on("click",function(e){
    e.preventDefault();
    $tel=$("input[name='tel']");
    $code=$("input[name='code']");
    if($tel.val()==""){
    	
    	$tel.closest(".form-group").addClass("has-error");
    	$tel.closest(".form-group").find("label").removeClass("hidden");
    	setTimeout(function(){
    		$tel.closest(".form-group").removeClass("has-error");
    		$tel.closest(".form-group").find("label").addClass("hidden");
    	},1500)
    	return;
    }
    if($("input[name='code']").val()==""){
    	
    	 $code.closest(".form-group").addClass("has-error");
    	 $code.closest(".form-group").find("label").removeClass("hidden")
    	setTimeout(function(){
    		 $code.closest(".form-group").removeClass("has-error");
    		 $code.closest(".form-group").find("label").addClass("hidden")
    	},1500)
    	return;
    }
 	$.ajax({
		url: "<?php echo url('register/userBaseRegister'); ?>",
		data:{mobile:$tel.val(),code:$code.val()},
		beforeSend:function(){		
			layer.load(2);
		},
		type:"POST",
		success:function(data){
	      if(data.code==1){
	    	  layer.closeAll('loading');
	    	  layer.msg("注册成功");
	    	  setTimeout(function(){
	    		  location.href="<?php echo url('register/userRegister'); ?>";
	    	  },500)
	      }else{
	    	  layer.msg(data.msg)
	      }
		},
		complete:function(){
			 layer.closeAll('loading');
		}
		
		
	}) 

})
$(".userlogin").on("click",function(e){

    e.preventDefault();
    $username=$("input[name='username']");
    $userpass=$("input[name='userpass']");
    if( $username.val()==""){

        $username.closest(".form-group").addClass("has-error");
        $username.closest(".form-group").find("label").removeClass("hidden");
        setTimeout(function(){
            $username.closest(".form-group").removeClass("has-error");
            $username.closest(".form-group").find("label").addClass("hidden");
        },1500)
        return;
    }
    if($userpass.val()==""){

        $userpass.closest(".form-group").addClass("has-error");
        $userpass.closest(".form-group").find("label").removeClass("hidden")
        setTimeout(function(){
            $userpass.closest(".form-group").removeClass("has-error");
            $userpass.closest(".form-group").find("label").addClass("hidden")
        },1500)
        return;
    }
    $.ajax({
        url: "<?php echo url('user/login'); ?>",
        data:{username:$username.val(),userpass:$userpass.val()},
        beforeSend:function(){
            layer.load(2);
        },
        type:"POST",
        success:function(data){
            if(data==1){
                layer.closeAll('loading');
                layer.msg("登录成功");
                setTimeout(function(){
                    location.href="<?php echo url('index/index'); ?>";
                },500)
            }else{
            	layer.msg(data)
            }
        },
        complete:function(){
            layer.closeAll('loading');
        }


    })




})




  /*   用户注册  */
  laydate.render({
  elem: '#userdate'
  ,format: 'yyyy-MM-dd'
  });
  /*  */
  
 /* 职位内页*/
    var jobSwiper = new Swiper ('#jobDetail', {
        slidesPerView:'auto',
        spaceBetween : 20,

        // 如果需要前进后退按钮
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    })


    $(".loadmore").on("click",function(){
    	$load=$(this).next();
    	$text=$(this);
    	$load.removeClass("hidden")
    	$text.addClass("hidden")
    	page=parseInt($(this).attr("data-currentpage"))
    	cateid=$(this).attr("data-cateid")
    	$.ajax({
    		url:"<?php echo url('course/catedetail'); ?>",
    		data:{cateid:cateid,page:page+1},
    		success:function(data){
    			if(data.length<6){
    				$text.parent().addClass("hidden")
    			}else{
    				$text.attr("data-currentpage",page+1)
    				$load.addClass("hidden")
    				$text.removeClass("hidden")
    			}
    			viewdata(data)
    		},
    		complete:function(){
    			$load.addClass("hidden")
    			$text.removeClass("hidden")
    		}
    	})
      })
      
  
  
  
  
  
  
  
  
  
});//layui

/*报名课程  */

/*加载更多  职学院*/

    
    
    
/*加载更多  职学院 */
  
    
  
   
     
      
    
       
        
        
        





</script>


</body>
</html>