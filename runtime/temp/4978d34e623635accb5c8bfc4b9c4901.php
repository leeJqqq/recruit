<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\job\myjob.html";i:1517186675;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>申请管理</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style type="text/css">
.flex-row {
	display: flex;
	align-items: center;
}
</style>

<body  style="scroll-x:scroll;">
	<blockquote class="layui-elem-quote flex-row">
	<!-- 
		<button class="layui-btn layui-btn-normal add" data-url="<?php echo url('editArticle'); ?>">
			<i class="layui-icon">&#xe654;</i>新增新闻
		</button> -->
<!-- 		<button class="layui-btn layui-btn-danger">
			<i class="layui-icon">&#xe640;</i>批量删除
		</button> -->
		<button class="layui-btn " onclick="refresh()">
			刷新
		</button>
	</blockquote>
		
	
    <?php if(isset($none)): ?>
	<div style="position: absolute; left: 50%; top:50%;margin-top:-30px; margin-left:-63px; text-align: center;">
			<i class="layui-icon" style="font-size: 36px;color: #009688;">&#xe69c;</i>
			<p>这里一点内容都没有</p>			
		</div>
		<?php else: ?>
		<table class="layui-table"  id="table"  lay-filter="table" style="width:auto;" >
	    </table>
	<?php endif; ?>
    <script src="/admin/layui/layui.js"></script>
	<script type="text/javascript">
	var tranStatus={
			'发布':1,
			'不发布':0
	}
		layui.use([ 'table', 'layer','jquery','form' ], function() {
			var $=layui.jquery;
			var table = layui.table;
			var layer=layui.layer;		
			var form = layui.form
		<?php if(!isset($none)): ?>
			var init= layer.load(2, {shade: false});
		var articleTable = table.render({
			        elem:"#table",	
			        where:{
			        	jobid:<?php echo $jobid; ?>
			        },
			        url: "<?php echo url('myjob'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'orderid', title: '编号'},
			         {field: 'telphone', title: '学员手机',templet: '#judgeTpl' },
			         {field: 'createtime', title: '报名时间' },
			         {field: 'score', title: '操作', width:250, toolbar: '#bar'}
			        ]],
				   page:true,
				   done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量

			        layer.close(init)
			    }
				});
			 
			 
			 $(".articleSearch").on("click",function(){
				 var keyword=$("input[name='keyword']").val();
				 if(keyword==""){
					 return;
				 }
				 articleTable.reload({
					  where: { 
					    keyword:keyword
					  }
					  ,page: {
					    curr: 1 //重新从第 1 页开始
					  }
					});
				 
			 })
			 
			 
			<?php endif; ?>
	
			
				$(".add").on("click",function(){			
					var data = {
							title:"新增新闻",
							href : $(this).attr("data-url")
						}
					window.parent.navtab.tabAdd(data)
					
				})
			
				


				table.on('tool(table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
					  var data = obj.data; //获得当前行数据
					  var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					  var tr = obj.tr; //获得当前行 tr 的DOM对象	
					  var dtd=$.Deferred();
					  console.log(data)
					  if(layEvent === 'detail'){ //查看
						  layer.prompt({title: '请填写您的反馈信息',value: data.feedback, formType: 2}, function(text, index){
							    layer.close(index);
							    $.ajax({
							    	url:"<?php echo url('edituserfeedback'); ?>",  	
							    	data:{orderid:data.orderid,text:text},
							    	type:"post",
							    	beforeSend:function(){
							    		layer.load(2)
							    	},
							    	success:function(data){
							    		layer.closeAll("loading")
							    		if(data==1){
							    			layer.msg("反馈成功");
							    			obj.update({
												feedback:text
											 });
							    		}
							    	},
							    	complete:function(){
							    		layer.closeAll("loading")
							    	}
							    	
							    })
							  });

					  } else if(layEvent === 'del'){ //删除
					    layer.confirm('确定删除该新闻么', function(index){
					    	  _ajax("<?php echo url('articleDel'); ?>",{postid:data.postid},dtd)
							  dtd.done(function(){
								  obj.del(); 
								  layer.close(index);
							  })
					    });
					  } else if(layEvent === 'edit'){ //编辑
						  layer.open({
						      type: 2,
						      title: '内容编辑',
						      shadeClose: true,
						      shade: false,
                              area: ['100%', '100%'],
						      content: "articleEdit?id="+data.postid
						    });
					    
					  }else if(layEvent === 'change2on'){
						  _ajax("<?php echo url('statusChange'); ?>",{postid:data.postid,status:1},dtd)
						  dtd.done(function(){
							  $(tr).find("button.on").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>'
								  obj.update({
									  is_valid:1
						       });
						  })
							
					  }else if(layEvent === 'change2off'){
						  _ajax("<?php echo url('statusChange'); ?>",{postid:data.postid,status:0},dtd)
						 dtd.done(function(){
					     $(tr).find("button.off").get(0).outerHTML='<button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>'
						  obj.update({
							is_valid:0
						 });
						  })
					
					  }
					});
				
				function  _ajax(url,data,deferred){
					var index = layer.load(2, {shade: false});
					$.ajax({
						url:url,
						data:data,
						type:"post",
						success:function(data){
							layer.close(index)
							if(data==1){
								deferred.resolve();
							}else{
								layer.msg("操作失败");
							}
							
						}
						
					})
					
					
				}
				 
		});
	
	function refresh(){
		history.go(0)
	}
	

		
		
	</script>
<script type="text/html" id="bar">
  <button class="layui-btn layui-btn-xs" lay-event="detail">反馈</button>
 
  <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="statusTpl">
  {{#  if(d.is_valid == 1){ }}
    <span style="color:#5FB878;">发布中</span>
  {{#  } else { }}
     <span style="color:#FFB800;">未发布</span>
  {{#  } }}
</script>
<script type="text/html" id="judgeTpl">
  {{#  if(!d.telphone || d.telphone == ""){ }}
 <span style="color:#FFB800;">未填</span>
  
  {{#  } else { }}
      <span style="color:#5FB878;">{{d.telphone}}</span>
  {{#  } }}
</script>
</body>

</html>