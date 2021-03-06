<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\page\editpage.html";i:1516787008;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>编辑页面栏目</title>
    <link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
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
    .disable label,.disable input{
        color:#c2c2c2;
        cursor:not-allowed;
    }
</style>

<body style="overflow:scroll;">

<form class="layui-form" action=""  style="width:70%;">

    <div style="margin-bottom:30px;display:flex;margin-left:63px;">
        <p style="margin-right:15px;">内容</p>
        <script id="container" name="content" type="text/plain">
  <?php echo isset($data['content'])?$data['content']:''; ?>
  </script>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即发布</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>

</form>

<script type="text/javascript" src="/admin/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/admin/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script>
    var ue = UE.getEditor('container',{
        initialFrameWidth :1000,
        initialFrameHeight :500,
        zIndex:300	,
        pasteplain:true
    });
    layui.use(['form','upload','layer'], function(){
        var form   = layui.form;
        var upload = layui.upload;
        var layer  = layui.layer;

        <?php if(isset($data)): endif; ?>
            //监听提交
            form.on('submit(formDemo)', function(data){
                if(ue.getContent()==""){
                    layer.msg("请编辑内容",{icon:5,shift:6})
                    return false;
                }
                var url="<?php echo url('editPage'); ?>";
                var data={data:data.field}
                <?php if(isset($data)): ?>
                data['pageid']="<?php echo $data['pageid']; ?>"
                <?php endif; ?>
                    $.ajax({
                        url:url,
                        data:data,
                        type:"POST",
                        beforeSend:function(){
                            layer.load(2, {shade: false});
                        },
                        success:function(data){
                            layer.closeAll()
                            if(data==1){
                                layer.msg("保存成功",{ time: 700 },function(){
                                    history.go(0)
                                })
                            }
                        }
                    })
                    return false;
                });





        });


</script>

</body>
</html>