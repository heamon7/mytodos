<?php if (!defined('THINK_PATH')) exit();?>￼<html>
<head>
    <title>think</title>
</head>
<body>
<h1>All lists:</h1>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class="success button"><?php echo ($vo["id"]); ?>:<?php echo ($vo["data"]); ?></a></br><?php endforeach; endif; else: echo "" ;endif; ?>
<a href="<?php echo U('create');?>" class="success button">Create new List</a>
</body>
</html>