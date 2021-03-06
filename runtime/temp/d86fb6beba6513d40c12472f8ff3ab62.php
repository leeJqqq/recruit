<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"D:\wamp3\wamp64\www\recruit\public/../application/companyadmin\view\position\positionlist.html";i:1517186675;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>普工需求管理</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style type="text/css">
.flex-row {
	display: flex;
	align-items: center;
}
</style>

<body  style="height:auto;">
	<blockquote class="layui-elem-quote flex-row">
		<button class="layui-btn layui-btn-normal add" data-url="<?php echo url('addPosition'); ?>">
			<i class="layui-icon">&#xe654;</i>新增普工招聘
		</button>
		<button class="layui-btn " onclick="refresh()">
			刷新
		</button>
	</blockquote>
		
	
    <?php if(isset($none)): ?>
	<div style="position: absolute; left: 50%; top:50%;margin-top:-30px; margin-left:-63px; text-align: center;">
			<i class="layui-icon" style="font-size: 36px;color: #009688;">&#xe69c;</i>
			<p>您还没有发布普工需求</p>			
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
			       
			        url: "<?php echo url('position/positionList'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'poid', title: '编号' },
			         {field: 'name', title: '职位名称' },
			         {field: 'status', title: '状态',templet: '#statusTpl' },
			         {field: 'createtime', title: '创建时间' },
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
								title:"新增普工招聘",
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
						  layer.open({
						      type: 2,
						      title: '内容查看',
						      shadeClose: true,
						      shade: false,
                              area: ['100%', '100%'],
						      content: "articlePreview?id="+data.postid
						    });

					  } else if(layEvent === 'del'){ //删除
					    layer.confirm('确定删除该需求么', function(index){
					    	  _ajax("<?php echo url('positionDel'); ?>",{poid:data.poid},dtd)
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
						      content: "positionEdit?poid="+data.poid
						    });
					    
					  }else if(layEvent === 'change2on'){
						  _ajax("<?php echo url('statusChange'); ?>",{poid:data.poid,status:1},dtd)
						  dtd.done(function(){
							  $(tr).find("button.on").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>'
								  obj.update({
									  status:1
						       });
						  })
							
					  }else if(layEvent === 'change2off'){
						  _ajax("<?php echo url('statusChange'); ?>",{poid:data.poid,status:0},dtd)
						 dtd.done(function(){
					     $(tr).find("button.off").get(0).outerHTML='<button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>'
						  obj.update({
							status:0
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

  <button class="layui-btn layui-btn-xs" lay-event="edit">编辑</button>
  {{#  if(d.status== 1){ }}
   <button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销提交审核</button>
  {{#  } else { }}
    <button class="layui-btn layui-btn-xs on" lay-event="change2on">提交审核</button>
  {{#  } }}

  <button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button>
 
  <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="statusTpl">
  {{#  if(d.status == 1){ }}
    <span style="color:#5FB878;">审核中</span>
  {{#  } else { }}
     <span style="color:#FFB800;">未提交审核</span>
  {{#  } }}
</script>
</body>

</html>