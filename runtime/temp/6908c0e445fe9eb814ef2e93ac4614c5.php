<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\user\myevaluationlist.html";i:1517887170;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新闻管理</title>
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
<!-- 		<input style="width: 200px; margin-right: 15px;" type="text"
			name="keyword" placeholder="请输入新闻名" autocomplete="off"
			class="layui-input">
		<button class="layui-btn articleSearch" >
			<i class="layui-icon">&#xe615;</i>查询
		</button> -->
<!-- 		<button class="layui-btn layui-btn-danger">
			<i class="layui-icon">&#xe640;</i>批量删除
		</button> -->
		<button class="layui-btn " onclick="refresh()">
			刷新
		</button>
	
	</blockquote>
		
	
    <?php if(isset($none)): ?>
	<div style="position: absolute; left: 50%; top:50%;transform: translate(-50%, -50%); text-align: center;">
			<p >亲，综合能力报告是参与我们“职造计划”才能获得哦</p>	
			<button class="layui-btn evalapply" >立即参与</button>	
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
			       
			        url: "<?php echo url('user/myEvaluationList'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'evalid', title: '编号'},
			         {field: 'name', title: '报告标题'   },
			         {field: 'desc', title: '报告说明'  },
			         {field: 'createtime', title: '报告时间' },
			         {field: 'score', title: '报告附件', toolbar: '#bar' },
			        // {field: 'sche', title: '课程安排',templet: '#scheTpl'},
			        // {field: 'created_at', title: '创建时间' },
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

			$(".evalapply").on("click",function(){
			   $.ajax({
				   url:"<?php echo url('evalapply'); ?>",
				   beforeSend:function(){
					   layer.load(2)
				   },
				   success:function(res){
					   layer.closeAll("loading")
					   if(res==1){
						   layer.msg("申请成功，职造师会联系亲哦",{anim:0},function(){
							   history.go(0);
						   })
					   }
				   }
			   })	
			})
				


				table.on('tool(table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
					  var data = obj.data; //获得当前行数据
					  var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					  var tr = obj.tr; //获得当前行 tr 的DOM对象	
					  var dtd=$.Deferred();
					  console.log(data)
					  if(layEvent === 'download'){ //查看
						  window.open("evalDownload?evalid="+data.evalid);      

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
						      maxmin: true, //开启最大化最小化按钮
						      area: ['893px', '600px'],
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
  <button class="layui-btn layui-btn-xs" lay-event="download">下载</button>

 
  <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="nameTpl">
  {{#  if(d.name){ }}
    {{d.name}}
  {{#  } else { }}
     <span style="color:#FFB800;">暂无岗位名称</span>
  {{#  } }}

</script>
<script type="text/html" id="cnameTpl">
  {{#  if(d.cname){ }}
  {{d.cname}}
  {{#  } else { }}
     <span style="color:#FFB800;">暂无公司名称</span>
  {{#  } }}

</script>
<script type="text/html" id="statusTpl">
  {{#  if(d.status == 1){ }}
    <span style="color:#5FB878;">已通过</span>
  {{#  } else { }}
     <span style="color:#FFB800;">待通过</span>
  {{#  } }}

</script>
</body>

</html>