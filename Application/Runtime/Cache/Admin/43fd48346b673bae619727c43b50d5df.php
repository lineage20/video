<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎您登录雷风影视系统-<?php echo ($meta_title); ?></title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>
<body class="bg-white margin">
    <div class="panel admin-panel">
    <form method="post" class="form-x">
    	<div class="panel-head"><strong>影片选择</strong></div>
        <div class="padding border-bottom">
            <div class="button-group button-group-small">
            <button type="button" class="button dropdown-toggle">按分类查询<span class="downward"></span></button>
            <ul class="drop-menu">
            	<li><a href="<?php echo U('index');?>">所有分类</a></li>
                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index',array('category'=>$vo['id'],'open'=>1));?>"><?php echo ($vo["html"]); echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            </div>
            <div class="button-group button-group-small">
            <button type="button" class="button dropdown-toggle">排序查询<span class="downward"></span></button>
            <ul class="drop-menu">
                <li><a href="<?php echo U('index',array('category'=>$_GET['category']));?>">默认查询</a></li>
                <li><a href="<?php echo U('index',array('category'=>$_GET['category'],'order'=>'hits','type'=>'asc','open'=>1));?>">人气升序</a></li>
                <li><a href="<?php echo U('index',array('category'=>$_GET['category'],'order'=>'hits','type'=>'desc','open'=>1));?>">人气降序</a></li>
                <li><a href="<?php echo U('index',array('category'=>$_GET['category'],'order'=>'create_time','type'=>'asc','open'=>1));?>">添加时间升序</a></li>
                <li><a href="<?php echo U('index',array('category'=>$_GET['category'],'order'=>'create_time','type'=>'desc','open'=>1));?>">添加时间降序</a></li>
                <li><a href="<?php echo U('index',array('category'=>$_GET['category'],'order'=>'update_time','type'=>'asc','open'=>1));?>">更新时间升序</a></li>
                <li><a href="<?php echo U('index',array('category'=>$_GET['category'],'order'=>'update_time','type'=>'desc','open'=>1));?>">更新时间降序</a></li>
            </ul>
            </div>
            <div class="button-group button-group-small">
            <button type="button" class="button dropdown-toggle">按语言查询<span class="downward"></span></button>
            <ul class="drop-menu">
                <li><a href="<?php echo U('index',array('category'=>$_GET['category']));?>">所有语言</a></li>
                <?php if(is_array(C("MOVIE_LANGUAGE"))): $i = 0; $__LIST__ = C("MOVIE_LANGUAGE");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$language): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index',array('category'=>$_GET['category'],'language'=>$language,'open'=>1));?>"><?php echo ($language); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            </div>
            <div class="button-group button-group-small">
            <button type="button" class="button dropdown-toggle">按年份查询<span class="downward"></span></button>
            <ul class="drop-menu">
                <li><a href="<?php echo U('index',array('category'=>$_GET['category'],'open'=>1));?>">所有年份</a></li>
                <?php if(is_array(C("MOVIE_YEAR"))): $i = 0; $__LIST__ = C("MOVIE_YEAR");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index',array('category'=>$_GET['category'],'year'=>$year,'open'=>1));?>"><?php echo ($year); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            </div>
            <div class="float-right">
            	<input type="text" name="keyword" class="input input-auto input-small" placeholder="搜索关键词" /> <a class="button button-small" href="javascript:;" id="search" url="<?php echo U('index',array('open'=>1));?>"><span class="icon-search"></span> 搜索</a>
            </div>
        </div>
        <div class="panel-body">
            <?php if(!empty($movielist)): ?><div class="line-middle">
                <?php if(is_array($movielist)): $i = 0; $__LIST__ = $movielist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="x2 choose_movie" data-mid="<?php echo ($vo['id']); ?>">
                        <div class="media clearfix" style="height: 180px;">
                            <a href="#">
                                <img src="<?php echo get_cover($vo['cover_id'],'path');?>" style="height: 156px" class="radius img-responsive img-border">
                            </a>
                            <div class="media-body">
                                <strong><?php echo ($vo['title']); ?></strong>
                            </div>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php else: ?>
                <div class="xl12 xs6 xm4 xb2"><p>aOh! 暂时还没有内容!</p></div><?php endif; ?>
        </div>
         <div class="panel-foot text-center">
         	<div class="page"><?php echo ($_page); ?></div>
        </div>
        </form>
    </div>
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/pintuer.js"></script>
<script src="/Public/Admin/js/respond.js"></script>
<script src="/Public/Admin/js/admin.js"></script>
<script src="/Public/static/layer/layer.js"></script>
<script type="text/javascript">
$(function(){
    //搜索功能
    $("#search").click(function(){
        var url = $(this).attr('url');
        var query = $(this).prev('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
        window.location.href = url;
    });

    $(".order").click(function(){
        var url = $(this).attr('url');
         if( url.indexOf('?')>0 ){
            url += '&';
        }else{
            url += '?';
        }
        if($(this).hasClass("icon-arrow-up")){
            url += 'type=asc';
            $(this).removeClass("icon-arrow-up text-red").addClass("icon-arrow-down text-green");
        }else{
            url += 'type=desc';
            $(this).removeClass("icon-arrow-down text-green").addClass("icon-arrow-up text-red");
        }
        window.location.href = url;
    });

    $(".choose_movie").click(function(){
        var mid = $(this).data('mid');
        var index = parent.layer.getFrameIndex(window.name);
        var type = $('[name="type"]', window.parent.document).val();
        if(type==1){
            var url=mid;
        }else{
            if(<?php echo C('WEB_PATTEM');?>==1){
                var url='/index.php?s=home/movie/index/id/'+mid;
            }else{
                var url='/movie/'+mid+'/';
            }
        }
        $('[name="link"]', window.parent.document).val(url);
        parent.layer.close(index);
        return false;
    });
})
</script>
</body>
</html>