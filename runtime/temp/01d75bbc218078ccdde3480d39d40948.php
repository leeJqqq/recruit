<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"D:\wamp3\wamp64\www\recruit\public/../application/companyadmin\view\position\editPosition.html";i:1517216846;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>普工招聘编辑</title>

<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/static/css/swiper.min.css" />
</head>
<style>
.label_img{
	object-fit:cover;
	width:100%;
	height:100%;
}
.hide{
	display:none;
}

.treat>input:checked+label{
    background-color: #5FB878;
	color:#ffffff;
}
.treat>input:checked+label:after{

}
.fa-plus{
	cursor:pointer;
}
.hidden{
	display:none;
}
.show{
	display:block;
}
.treat label{
	cursor:pointer;
	text-align:center;
	margin-right:15px;
	padding:12px 40px;
	border:1px solid #c2c2c2;
	border-radius:10px;
	white-space:nowrap;
   -webkit-user-select:none;
   -moz-user-select:none;
   -ms-user-select:none;
   user-select:none;
	margin-bottom:15px;
}
.companyimg{
	position:relative;
	width:300px;
	height:150px;
	border:1px solid #c2c2c2;
	text-align:center;
}

</style>

<body style="overflow:scroll;">

<form class="layui-form" action=""  style="width:70%;">
<p style="font-size:18px;margin:15px 0;">岗位内容</p>

  <div class="layui-form-item">
    <label class="layui-form-label" >职位名称</label>
    <div class="layui-input-block" >
      <input type="text" name="title" required  lay-verify="required" placeholder="请输入职位名称" autocomplete="off" class="layui-input" value="<?php echo isset($data['name'])?$data['name']:''; ?>">
    </div>
  </div>
  
   <div class="layui-form-item">
    <label class="layui-form-label">招聘人数</label>
    <div class="layui-input-block">
      <input type="number" name="number" required  lay-verify="required" placeholder="请输入招聘人数" autocomplete="off" class="layui-input" value="<?php echo isset($data['number'])?$data['number']:''; ?>">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">职位薪酬</label>
    <div class="layui-input-block">
      <input type="text" name="salary" required  lay-verify="required" placeholder="请输入职位薪酬" autocomplete="off" class="layui-input" value="<?php echo isset($data['salary'])?$data['salary']:''; ?>">
    </div>
  </div>


 

  
  <p style="font-size:18px;margin:15px 0;">岗位福利</p>
   <div class="layui-form-item" style="width:70%;">

    <div class="layui-input-block treat" style="display:flex;flex-wrap:wrap;" >
    <?php if(is_array($treat) || $treat instanceof \think\Collection || $treat instanceof \think\Paginator): $i = 0; $__LIST__ = $treat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <input id="c<?php echo $i; ?>" type="checkbox"  style="display:none; " name="treat"   value="<?php echo $vo; ?>"  lay-ignore >
      <label for="c<?php echo $i; ?>"  ><?php echo $vo; ?></label>
    <?php endforeach; endif; else: echo "" ;endif; ?>

      <label id="myprompt"><span class="fa fa-plus"></span></label>
    </div>
  </div>
  
    <div class="layui-form-item">
    <label class="layui-form-label">入职补贴</label>
    <div class="layui-input-block">
    
    <input class="radio" type="radio" name="subsidy" required  lay-verify="required" value="0" title="否"  >
    <input class="radio" type="radio" name="subsidy" required  lay-verify="required" value="1" title="是">
     
      
    </div>
  </div>
  
   
   <p style="font-size:18px;margin:15px 0;">工作描述</p>
      <script id="container" name="content" type="text/plain">
<?php echo isset($data['desc'])?$data['desc']: ''; ?>
    </script>
 

   <p style="font-size:18px;margin:15px 0;">工作环境照片</p>
   
   <!-- 工厂环境照片，只上传一次 -->
   <div style="position:relative;width:70%;left:27px;">
   
   
     <div class="swiper-container" style="width:100%;margin-left:0;margin-bottom:30px;">
    <div class="swiper-wrapper">
    
    
    <?php if(is_array($pics) || $pics instanceof \think\Collection || $pics instanceof \think\Paginator): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="swiper-slide companyimg" id="image<?php echo $i; ?>" style=""> 
       <span class="fa fa-plus plus fa-2x <?php if($vo != $i): ?>hidden<?php endif; ?>" style="line-height:150px;"></span>
	  <button class="layui-btn layui-btn-xs del <?php if($vo == $i): ?>hidden<?php endif; ?>" style="position:absolute;top:0;right:0;">删除</button>
      <?php if($vo != $i): ?>
       <img   style="object-fit:cover;width:100%;height:100%;"   src="<?php echo $vo; ?>"  />
      <?php endif; ?>  
     </div>  
   
    
    <?php endforeach; endif; else: echo "" ;endif; ?> 
    
    
  <!--       <div class="swiper-slide companyimg" id="image1" style="">
	        <span class="fa fa-plus plus fa-2x" style="line-height:150px;"></span>
	        <button class="layui-btn layui-btn-xs del hidden" style="position:absolute;top:0;right:0;">删除</button>
        </div>  
        <div class="swiper-slide companyimg" id="image2" style="">
	        <span class="fa fa-plus plus fa-2x" style="line-height:150px;"></span>
	        <button class="layui-btn layui-btn-xs del hidden" style="position:absolute;top:0;right:0;">删除</button>
        </div>
         <div class="swiper-slide companyimg" id="image3" style="">
	        <span class="fa fa-plus plus fa-2x" style="line-height:150px;"></span>
	        <button class="layui-btn layui-btn-xs del hidden" style="position:absolute;top:0;right:0;">删除</button>
        </div>
         <div class="swiper-slide companyimg" id="image4" style="">
	        <span class="fa fa-plus plus fa-2x" style="line-height:150px;"></span>
	        <button class="layui-btn layui-btn-xs del hidden" style="position:absolute;top:0;right:0;">删除</button>
        </div>
         <div class="swiper-slide companyimg" id="image5" style="">
	        <span class="fa fa-plus plus fa-2x" style="line-height:150px;"></span>
	        <button class="layui-btn layui-btn-xs del hidden" style="position:absolute;top:0;right:0;">删除</button>
        </div> -->
    </div>
     </div> 
   
    <div class="swiper-button-prev"  style="left:-27px;"></div>
    <div class="swiper-button-next" style="right:-27px;" ></div>
   
   </div>
   
  
    
   <!-- //照片 -->
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="addPosition">发布招聘</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

    </form>
    <script type="text/javascript" src="/admin/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/admin/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
	<script src="/admin/js/jquery-3.2.1.min.js"></script>
	<script src="/static/js/swiper.min.js"></script>
	<script src="/admin/layui/layui.js"></script>
	<script>

    var ue = UE.getEditor('container',{
        initialFrameWidth :700,
        initialFrameHeight :500,
        zIndex:300,
        pasteplain:true,
        toolbars: [
                   ['fullscreen', 'source', 'undo', 'redo','simpleupload',  'edittable', 'edittd'],
                   ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
               ]
    });
	
	
	var treatNum =$(".treat label:not(#myprompt)").length;
	var mySwiper = new Swiper ('.swiper-container', {
		slidesPerView:'auto',
		spaceBetween : 20,
	    
	    // 如果需要前进后退按钮
	    navigation: {
	      nextEl: '.swiper-button-next',
	      prevEl: '.swiper-button-prev',
	    },

	  })  

	layui.use(['form','upload','layer'], function(){
		  var form   = layui.form;
		  var upload = layui.upload;
		  var layer  = layui.layer;
		
		  <?php if(isset($data)): ?>
		  

		  //选择radio
		  $(".radio[value='<?php echo $data['is_subsidy']; ?>']").prop("checked",true);
           
		  //选择待遇多选
		  $("input[type='checkbox']").prop("checked",true)
		  
          form.render()
		  
		  <?php endif; ?>
	    $(".treat").children("input").css("display","none")
	    //保存
		form.on('submit(addPosition)', function(data){
	     //判断是否设置正确的薪酬区间
/* 			  if(parseInt(data.field['price_min'])>parseInt(data.field['price_max'])){
					layer.msg("请设置正确的薪酬区间",{icon:5,shift:6})
					return false;
			  } */
			  
		 if(!data.field['subsidy']){
			 layer.msg("请选择是否津贴",{icon:5,shift:6})
			 return false;
		 }	  
			  
	     if(ue.getContent()==""){
                 layer.msg("请编辑内容",{icon:5,shift:6})
                 return false;
         }
	
	    //遍历待遇多选
	    var  treat=[];
		$(".treat").children('input').each(function(){
			if($(this).prop("checked")){
				treat.push($(this).val())
			}
		})
		
		
		//遍历图片
		var images=[];
		$(".companyimg").each(function(){
			if($(this).find("img").length>0){
				images.push($(this).find("img").attr("src"));
			}


		})

		
	
		
       	  if (images === undefined ||images.length == 0) {
	            layer.msg("请上传环境照片",{icon:5,shift:6})
	            return false;
	        }
		
		//对提交数据的处理
	    data.field['treat'] = treat
	    data.field['desc']=ue.getContent();
		var url="<?php echo url('addPosition'); ?>";
		var data={data:data.field,image:images};
		<?php if(isset($data)): ?>
		url="<?php echo url('positionEdit'); ?>"
		data['poid']=<?php echo $data['poid']; ?>;
		data['oldcontent']='<?php echo $data['desc']; ?>';
		<?php endif; ?>
		
		
		//提交给后台处理
	    $.ajax({
	    	url:url,
	    	beforeSend:function(){
	    		layer.load(2)
	    	},
	    	data:data,
	    	type:"post", 
	    	success:function(data){
	    		if(data==1){
	    			layer.msg("保存成功")
	    			setTimeout(function(){
	    				history.go(0)
	    			},500)
	    			
	    		}
	    	},
	    	complete:function(){
	    		layer.closeAll("loading")
	    	}
	    	
	    }) 
			    return false;
			  });
		  
		  
		  
	  $("#myprompt").click(function(){
			  var that = $(this)
			  layer.prompt({title: '请输入福利待遇名称，并确认'}, function(text, index){
				  treatNum=treatNum+1;
				  that.before('<input id="c'+treatNum+'" type="checkbox"  style="display:none;" name="treat"  value="'+text+'" lay-ignore >'+
					      '<label for="c'+treatNum+'"  >'+text+'</label>') 
			       layer.close(index);
				});
		  }) 
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
			    	if($(item).children("img").length>0){
			    		$(item).children("img").attr("src",res.src.replace(/\\/g,'/'));
			    	}else{
			    	  	$(item).children("span.plus").addClass("hidden")
				    	$(item).children("button.del").removeClass("hidden")				    	
				    	$(item).append('<img   style="object-fit:cover;width:100%;height:100%;"   src="'+res.src.replace(/\\/g,'/')+'"  />')
				 
			    	}
			    }			    
			  }
			}); 
	})
	$(".del").on("click",function(event){
		event.stopPropagation();
		event.preventDefault()
		var that = $(this)
	    var confirm = layer.confirm('确定要移除该图片吗', {
			  btn: ['确定','取消'] 
			}, function(){
				that.parent().children("span.plus").removeClass("hidden");
		    	that.addClass("hidden");   	
		    	that.parent ().children("img").remove();
		/*     	if(images[that.parent().attr("id")]){
		    		   delete images[that.parent().attr("id")];  
		    	}  */
		          
		    	layer.close(confirm);		    	
			})
	})
	
	
	
	
	
	</script>


</body>
</html>