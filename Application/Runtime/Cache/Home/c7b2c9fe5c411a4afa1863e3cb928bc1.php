<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP实例BBS页面</title>

    <!--引入文件-->
    <link href="/TP_BBS/Public/CSS/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="/TP_BBS/Public/CSS/signin.css" rel="stylesheet">
    <link href="/TP_BBS/Public/CSS/board.css" rel="stylesheet">

    <style type="text/css">
        body{
            padding:20px;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>TP实例BBS
            <small>ewen thinkphp练习</small>
        </h1>
    </div>

    <div id = "user">
    <?php if(cookie('username')) { ?>
    <a href = "#"><?php echo cookie('username'); ?></a>&nbsp;&nbsp;
    <a href = "/TP_BBS/index.php/Home/User/logout">注销</a>
    <?php  }else{ ?>
    <a href = "/TP_BBS/index.php/Home/User/login">登录</a>&nbsp;&nbsp;
    <a href = "/TP_BBS/index.php/Home/User/reg">注册</a>
    <?php } ?>
</div>


    <h4><b>分类</b></h4>
    <table class="table">
        <?php if(is_array($board)): foreach($board as $key=>$vo): ?><tr>
                <td><?php echo ($key+1); ?></td>
                <td><a href="/TP_BBS/index.php/Home/Board/detail/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></td>
            </tr><?php endforeach; endif; ?>
    </table>

</body>
</html>