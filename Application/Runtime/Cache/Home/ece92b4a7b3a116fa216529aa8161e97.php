<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP实例BBS</title>

    <!--引入文件-->
    <link href="/TP_BBS/Public/CSS/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="/TP_BBS/Public/CSS/signin.css" rel="stylesheet">
</head>
<body>
    <div class="page-header">
        <h1>TP实例BBS
            <small>ewen thinkphp练习</small>
        </h1>
    </div>

    <table class="table">
        <tr>
            <td>楼主</td><td><?php echo ($owner["text"]); ?></td><td><?php echo ($owner["author"]); ?></td>
        </tr>
        <?php if(is_array($post)): foreach($post as $key=>$vo): ?><tr>
                <td>第<?php echo ($key); ?>楼</td>
                <td><?php echo ($vo["text"]); ?></td><td><?php echo ($vo["author"]); ?></td>
            </tr><?php endforeach; endif; ?>
    </table>
    <?php echo ($page); ?>

    <form method="post" action="/TP_BBS/Home/Post/add" role="form">
        <input type="text" class="form-control" id="name" name="text" placeholder="请输入内容">

        <input type="hidden" name="board" value="<?php echo $owner['board']?>" />
        <input type="hidden" name="own" value="<?php echo $owner['id']?>" />

        <div class="checkbox">
            <label>
                <input name="alone" type="checkbox">是否作为主题帖
            </label>
        </div>
        <button type="submit" class="btn btn-default">发表</button>
    </form>

</body>
</html>