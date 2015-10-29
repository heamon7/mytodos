<?php if (!defined('THINK_PATH')) exit();?><FORM method="post" action="/index.php/Home/Index/update">
    标题:<INPUT type="text" name="data" value="<?php echo ($vo["data"]); ?>"><br/>
    <!--内容:<TEXTAREA name="content" rows="5" cols="45"><?php echo ($vo["content"]); ?></TEXTAREA><br/> -->
    <INPUT type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
    <INPUT type="submit" value="提交">
</FORM>