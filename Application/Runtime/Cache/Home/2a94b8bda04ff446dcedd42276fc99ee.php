<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thinktodo</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/js/bootstrap.js"></script>
<style>
    .button{
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;

    }
    .button-full{
        margin-top:10px;
        width:100%;
    }
</style>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">-->
                <!--<span class="sr-only">Toggle navigation</span>-->
                <!--<span class="icon-bar"></span>-->
                <!--<span class="icon-bar"></span>-->
                <!--<span class="icon-bar"></span>-->
            <!--</button>-->
            <a class="navbar-brand" href="/">Thinktodo</a>
        </div>

    </div><!-- /.container-fluid -->
</nav>
<div class="jumbotron" style="border-radius: 4px;margin:10px;padding: 10px;">

    
<div class="main-content">
<h1>All Todo Lists</h1>
<ol class="list-group">
    <?php if(is_array($lists)): $k = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "暂时没有task" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="list-group-item"><?php echo ($k); ?>. <a href="<?php echo U('edit',array('id'=>$vo['id']));?>" ><?php echo ($vo["data"]); ?></a>

            <a href="<?php echo U('delete',array('id'=>$vo['id']));?>" task-id="<?php echo ($vo["id"]); ?>" class="delete-task"><button class="btn-danger button" style="float:right">delete</button></a>
        <a href="<?php echo U('edit',array('id'=>$vo['id']));?>" ><button class="btn-info button" style="float:right;margin-right:10px;">edit</button></a></li></br><?php endforeach; endif; else: echo "暂时没有task" ;endif; ?>
</ol>

<a href="<?php echo U('create');?>" ><button class="btn-primary button button-full">Create new task</button></a>
<input type="hidden" name="is_ajax" value="<?php echo ($is_ajax); ?>">
<!--<script type="text/javascript">-->
<!--</script>-->

</div>

    <!--<h1>Hello, world!</h1>-->
    <!--<p>...</p>-->
    <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
</div>
<script type="text/javascript">
    $('body').on('click',".delete-task",function(e){
//    $('.delete-task').click(function(e){
        e.preventDefault();
        var task_id = $(this).attr('task-id');
        var href = $(this).attr('href');
        console.log(task_id);
        console.log(href);
//
        e.preventDefault();
        $.post(href,
                {
                    id:task_id

                },
                function(data,status){
                    if(data['status']==1){
                        $.post('/',
                                {
                                },
                                function(data,status){
                                    if(data){
                                        $('.main-content').html(data);
                                    console.log(data)
                                    }
                                });
                    }
                });
    })
</script>
</body>
</html>