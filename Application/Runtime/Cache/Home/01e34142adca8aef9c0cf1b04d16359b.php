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

    <!---->
<form method="post" action="/index.php/Home/Index/create">
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">任务名称:</span>
        <input type="text" name="data" class="form-control" aria-describedby="basic-addon1"><br/>

        <!--<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">-->

    </div>
    <input type="submit" class="button btn-primary button-full" value="提交">
    <!--内容:<TEXTAREA name="content" rows="5" cols="45"><?php echo ($vo["content"]); ?></TEXTAREA><br/> -->

</form>

<!---->
<!--<FORM method="post" action="/index.php/Home/Index/create">-->
    <!--名字:<INPUT type="text" name="data"><br/>-->
    <!--&lt;!&ndash;描述:<TEXTAREA name="content" rows="5" cols="45"></TEXTAREA><br/>&ndash;&gt;-->
    <!--<INPUT type="submit" value="提交">-->
<!--</FORM>-->

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