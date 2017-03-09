<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP实例BBS</title>

    <!--引入文件-->
    <link href="/TP_BBS/Public/CSS/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="/TP_BBS/Public/CSS/signin.css" rel="stylesheet">

    <style type="text/css">
        body{
            padding:20px;
        }
    </style>
</head>
<body>

    <div class="page-header">
        <h1>TP实例BBS
            <small><?php echo ($board["name"]); ?>版块</small>
        </h1>
    </div>

    <table class="table">
        <?php if(is_array($post)): foreach($post as $key=>$vo): ?><tr>
                <td>第<?php echo ($key); ?>帖：</td>
                <td><a href="/TP_BBS/index.php/Home/Post/index/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["text"]); ?></a></td>
                <td>楼主：<?php echo ($vo["author"]); ?></td>
            </tr><?php endforeach; endif; ?>
    </table>
    <?php echo ($page); ?>
</body>
</html>