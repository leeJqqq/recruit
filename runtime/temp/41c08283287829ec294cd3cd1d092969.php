<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\position\positionlist.html";i:1517640964;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>职位管理</title>
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
   
    <button class="layui-btn " onclick="refresh()">
        刷新
    </button>
</blockquote>


<?php if(isset($none)): ?>
<div style="position: absolute; left: 50%; top:50%;margin-top:-30px; margin-left:-63px; text-align: center;">
    <i class="layui-icon" style="font-size: 36px;color: #009688;">&#xe69c;</i>
    <p>这里一个职位都没有</p>
</div>
<?php else: ?>
<table class="layui-table"  id="table"  lay-filter="table" style="width:auto;" >
</table>
<?php endif; ?>
<script src="/admin/layui/layui.js"></script>
<script type="text/javascript">
    layui.use([ 'table', 'layer','jquery','form' ], function() {
        var $=layui.jquery;
        var table = layui.table;
        var layer=layui.layer;
        var form = layui.form
        <?php if(!isset($none)): ?>
        var init= layer.load(2, {shade: false});
        var articleTable = table.render({
            elem:"#table",
            url: "<?php echo url('positionList'); ?>",
            cols:[[
                {checkbox: true},
                {field: 'poid', title: '编号' },
                {field: 'cname', title: '公司名称' },
                {field: 'name', title: '职位名称' },
                {field: 'is_subsidy', title: '是否有津贴',templet: '#statusTpl' },
                {field: 'is_show', title: '前台显示',templet: '#showTpl' },
                {field: 'is_top', title: '是否置顶',templet: '#topTpl' },
                {field: 'createtime', title: '创建时间' },
                {field: 'score', title: '操作', width:300, toolbar: '#bar'}
            ]],
            page:true,
            done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量

                layer.close(init)
            }
        });




        <?php endif; ?>
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
                        content: "positionPreview?poid="+data.poid
                    });

                } else if(layEvent === 'del'){ //删除
                    layer.confirm('确定删除该新闻么', function(index){
                        _ajax("<?php echo url('articleDel'); ?>",{postid:data.postid},dtd)
                        dtd.done(function(){
                            obj.del();
                            layer.close(index);
                        })
                    });
                } else if(layEvent === 'list'){ //编辑
              	  layer.open({
				      type: 2,
				      title: '申请人数管理',
				      shadeClose: true,
				      shade: false,

				      area: ['100%', '100%'],
                     moveOut: true,
				      content: "myposition?poid="+data.poid
				    });

                } else if(layEvent === 'topon'){ //编辑
                	 _ajax("<?php echo url('settop'); ?>",{poid:data.poid,is_top:1},dtd)
                     dtd.done(function(){
                         $(tr).find("button.topon").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs topoff" lay-event="topoff">取消置顶</button>'
                         obj.update({
                             is_top:1
                         });
                     })

                    }else if(layEvent === 'topoff'){ //编辑
                	 _ajax("<?php echo url('settop'); ?>",{poid:data.poid,is_top:0},dtd)
                     dtd.done(function(){
                         $(tr).find("button.topoff").get(0).outerHTML='<button class="layui-btn  layui-btn-xs topon" lay-event="topon">置顶</button>'
                         obj.update({
                             is_top:0
                         });
                     })

                    } else if(layEvent === 'change2on'){
                    _ajax("<?php echo url('statusChange'); ?>",{poid:data.poid,is_show:1},dtd)
                    dtd.done(function(){
                        $(tr).find("button.on").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>'
                        obj.update({
                            is_show:1
                        });
                    })
                }else if(layEvent === 'change2off'){
                    _ajax("<?php echo url('statusChange'); ?>",{poid:data.poid,is_show:0},dtd)
                    dtd.done(function(){
                        $(tr).find("button.off").get(0).outerHTML='<button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>'
                        obj.update({
                            is_show:0
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
                        }else if(data==3){
                        	 layer.msg("最多只能置顶三个职位哦");
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
    <button class="layui-btn layui-btn-xs" lay-event="detail">查看</button>
    {{#  if(d.is_show == 1){ }}
    <button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>
    {{#  } else { }}
    <button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>
    {{#  } }}
    <button class="layui-btn layui-btn-xs" lay-event="list">申请人数</button>

    {{#  if(d.is_top == 1){ }}
    <button class="layui-btn-warm layui-btn layui-btn-xs  topoff" lay-event="topoff">取消置顶</button>
    {{#  } else { }}
    <button class="layui-btn layui-btn-xs  topon" lay-event="topon">置顶</button>
    {{#  } }}

   
    <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="showTpl">
    {{#  if(d.is_show == 1){ }}
    <span style="color:#5FB878;">是</span>
    {{#  } else { }}
    <span style="color:#FFB800;">否</span>
    {{#  } }}
</script>
<script type="text/html" id="topTpl">
    {{#  if(d.is_top == 1){ }}
    <span style="color:#5FB878;">是</span>
    {{#  } else { }}
    <span style="color:#FFB800;">否</span>
    {{#  } }}
</script>
<script type="text/html" id="statusTpl">
    {{#  if(d.is_subsidy == 1){ }}
    <span style="color:#5FB878;">是</span>
    {{#  } else { }}
    <span style="color:#FFB800;">否</span>
    {{#  } }}
</script>
</body>

</html>