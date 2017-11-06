<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title><?php echo ($webtitle); ?></title>
        <meta name="keywords" content="<?php echo ($keywords); ?>">
        <meta name="description" content="<?php echo ($description); ?>">
        <link href="<?php echo ($tplpath); ?>/css/global.css?v=0.02" rel="stylesheet">
        <link href="<?php echo ($tplpath); ?>/css/style.css?v=0.03" rel="stylesheet">
        <link href="<?php echo ($tplpath); ?>/css/swiper-3.4.2.min.css" rel="stylesheet">
        <!--[if lt IE 8]>
            <script src="<?php echo ($tplpath); ?>/js/html5shiv.js"></script>
        <![endif]-->
        <script>
            var _hmt = _hmt || [];
            (function() {
              var hm = document.createElement("script");
              hm.src = "https://hm.baidu.com/hm.js?fae7424cf04a81ae0763bb37fc817e79";
              var s = document.getElementsByTagName("script")[0]; 
              s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </head>
    <body class="bgcolor-f5f5">
         <script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?fae7424cf04a81ae0763bb37fc817e79";
        var s = document.getElementsByTagName("script")[0]; 
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<div class="content bgcolor-fff header">
    <div class="container">
        <div class="col col2">
            <a href="/" class="logo"><img src="<?php echo ($webpath); echo ($weblogo); ?>"></a>
        </div>
        <div class="col col5 text-right">
            <form name="search" id="searchform" action="<?php echo ($webdir); echo U('Search/index');?>" method="post" target="_blank">
            <div class="search">
                <ul class="search_show">
                    <?php $__LIST__ = D('Tag')->lists($cid, "hits desc","5", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li class="f14">
                        <span class="text-center"><?php echo ($i); ?></span>
                        <a href="<?php echo ($list['url']); ?>"><?php echo (msubstr($list['title'],0,10)); ?></a>
                        <em><?php echo ($list['ctitle']); ?></em>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <input type="text" class="word" placeholder="三生三世十里桃花" id="searchTxt" autocomplete="off" name="keyword">
                <button class="search_enter"><i class="icon search_icon"></i>搜 索</button>
            </div>
            </form>
        </div>
        <div class="col col5 text-right" name="TopIcon">
           <!--  <div class="col col2 f14 text-center">
                <a href="<?php echo U('Home/Other/index/tpl/vip');?>" target="_blank" class="tr_icons">
                    <i class="icon icon-vip"></i>
                    <span>开通VIP</span>
                </a>
            </div> -->
            <div class="col col2 f14 text-center">
                <a href="#" class="tr_icons">
                    <i class="icon icon-look"></i>
                    <span>观看记录</span>
                </a>
                <div class="show-record border-top text-left">
                    <em></em><i></i>
                    <div id="hisStatu"></div>
                    <div class="record text-center">
                        <h4 class="col col12 f12 h66 text-left margin-t15">大家都在看</h4>
                        <div class="col col12 margin-t10">
                            <?php $__LIST__ = D('Tag')->lists($cid, "hits desc","3", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="col col37">
                                <a href="<?php echo ($list['url']); ?>">
                                    <div style="height: 90px;overflow: hidden;">
                                        <img src="<?php echo ($list['pic']); ?>" class="img-full">
                                    </div>
                                    <span class="f12 h66 Show-Word"><?php echo (msubstr($list['title'],0,10)); ?></span>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col2 f14 text-center">
                <a href="#" class="tr_icons">
                    <i class="icon icon-history"></i>
                    <span>收藏</span>
                </a>
                <div class="show-record border-top text-left">
                    <em></em><i></i>
                    <div id="favorite"></div>
                    <div class="record text-center">
                        <div class="col col6 f12"></div>
                        <div class="col col6 f12 text-right"><a href="<?php echo U('/User/Favorites/index',array('type'=>1));?>" class="a1">私密收藏夹</a></div>
                    </div>
                </div>
            </div>
           <!--  <div class="col col2 f14 text-center">
                <a href="<?php echo U('Home/Other/index/tpl/app_down');?>" target="_blank" class="tr_icons">
                    <i class="icon icon-phone"></i>
                    <span>下载APP</span>
                </a>
            </div> -->
            <div class="col col2 text-center">
            	<?php if(empty($user['id'])): ?><a href="<?php echo ($user['userlogin']); ?>" class="tr_icons top_user">
                    <i class="icon icon-user"></i>
                    <span class="f14">注册/登录</span>
                </a>
                <?php else: ?>
                <a href="<?php echo ($user['userurl']); ?>" class="tr_icons top_user">
                    <img src="<?php echo ($user['path']); ?>">
                    <span class="f12 h66 text-center"><?php echo ($user['username']); ?></span>
                </a><?php endif; ?>
                <div class="show-record border-top text-left">
                    <em></em><i></i>
                    <div class="top-user text-center">
                        <?php if(empty($user['id'])): ?><h3 class="h66 f14 margin-t15">您还没有登录，请登录！</h3>
                        <a href="<?php echo ($user['userlogin']); ?>" class="btn btn-blue btn-big btn-radius margin-t15">登录</a>
                        <h3 class="h66 f12 margin-t15"><a href="<?php echo ($user['userreg']); ?>" class="a1">还没有帐号？立即注册</a></h3>
                        <?php else: ?>
                        <a href="<?php echo ($user['userurl']); ?>">
                        <div class="col col4 padding vl-align-top">
                            <img src="<?php echo ($user['path']); ?>" class="img-full">
                        </div>
                        <div class="col col8 padding text-left h66">
                            <ul class="padding-b8">
                                <li class="col col5 f12">用户名：</li>
                                <li class="col col7 f12"><?php echo ($user['username']); ?></li>
                            </ul>
                            <?php if($user['vip_time'] > time()): ?><ul class="padding-b8">
                                    <li class="col col5 f12">到期时间：</li>
                                    <li class="col col7 f12"><?php echo (time_format($user['vip_time'],"Y-m-d")); ?></li>
                                </ul>
                                <ul>
                                    <li class="col col5 f12">VIP：</li>
                                    <li class="col col7"><i class="icon icon-user-vip"></i></li>
                                </ul><?php endif; ?>
                        </div>
                        </a>
                        <div class="col col12 border-top">
                            <div class="col col6 padding f12 text-left">
                                <a href="<?php echo ($user['userurl']); ?>"><b>用户中心</b></a>
                            </div>
                            <div class="col col6 padding f12"><a href="<?php echo U('/User/Recom/index');?>">用户签到</a></div>
                        </div>
                        <div class="col col12 user-top-bottom bgcolor-f5f5 padding-tb8 padding-lr15 text-left">
                            <div class="col col6 f12"><?php if($user['vip_time'] < time()): ?><a href="<?php echo U('Home/Other/index/tpl/vip');?>" target="_blank" class="a1">立即开通VIP</a><?php endif; ?></div>
                            <div class="col col6 f12 text-right"><a href="<?php echo ($user['userlogout']); ?>" class="a1">退出</a></div>
                        </div><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content bgcolor-f8f8 border-top">
    <div class="container">
        <div class="col col8 f14 menu">
            <a href="<?php echo ($webpath); ?>" title="首页" <?php if(($nav['id'] == $cid) OR ($nav['id'] == $pid)): ?>class="active"<?php endif; ?>>首页<em></em></a>
            <?php $__NAV__ = D('Tag')->getNav(0,"",0,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><span>
                    <a href="<?php echo ($nav['url']); ?>" <?php if(($nav['id'] == $cid) OR ($nav['id'] == $pid)): ?>class="active"<?php endif; ?>><?php echo ($nav['title']); ?><em></em></a>
                    <?php if(($nav['branch']) == "1"): ?><div class="tow-menu">
                        <b></b>
                        <?php $__NAV__ = D('Tag')->getNav($nav['id'],"",0,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><a href="<?php echo ($menu['url']); ?>"><?php echo ($menu['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div><?php endif; ?>
                </span><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="col col4 text-right f14 menu">
            <a href="javascript:AddFavorite('<?php echo ($weburl); ?>', '<?php echo ($webname); ?>')">收藏本站</a>
            <a href="<?php echo U('Home/Other/index/tpl/time');?>" class="hot" target="_blank">最近更新</a>
        </div>
    </div>
</div>

<!-- 浮动header -->
<div class="content bgcolor-fff play-header" style="display: none;" name="play-header">
    <div class="container">
        <div class="col col2">
            <a href="/" class="logo"><img src="<?php echo ($webpath); echo ($weblogo); ?>"></a>
        </div>
        <div class="col col6" name="TopIcon">
            <div class="col col2 f14">
                <a href="#" class="pindao">
                    <i class="icon top_menu"></i>
                    频道
                </a>
                <div class="show-record border-top text-left">
                    <em></em><i></i>
                    <div class="top-class f14">
                        <a href="<?php echo ($webpath); ?>" title="首页" <?php if(($nav['id'] == $cid) OR ($nav['id'] == $pid)): ?>class="active"<?php endif; ?>>首页<em></em></a>
                        <?php $__NAV__ = D('Tag')->getNav(0,"",0,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><span>
                                <a href="<?php echo ($nav['url']); ?>" <?php if(($nav['id'] == $cid) OR ($nav['id'] == $pid)): ?>class="active"<?php endif; ?>><?php echo ($nav['title']); ?><em></em></a>
                                <?php if(($nav['branch']) == "1"): ?><div class="tow-menu">
                                    <b></b>
                                    <?php $__NAV__ = D('Tag')->getNav($nav['id'],"",0,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><a href="<?php echo ($menu['url']); ?>"><?php echo ($menu['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="col col10 text-right">
                <div class="search">
                    <form name="search" id="searchform" action="<?php echo U('Search/index');?>" method="post" target="_blank">
                        <input type="text" class="word" placeholder="三生三世十里桃花" id="searchTxt" autocomplete="off" name="keyword">
                    <button class="search_enter"><i class="icon search_icon"></i>搜 索</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col col4 text-right text-center" name="TopIcon">

            <div class="col col2 f14 text-center">
                <a href="<?php echo U('Home/Other/index/tpl/vip');?>"  target="_blank" class="tr_icons">
                    <i class="icon icon-vip"></i>
                </a>
            </div><div class="col col2 f14 text-center">
                <a href="#" class="tr_icons">
                    <i class="icon icon-look"></i>
                </a>
                <div class="show-record border-top text-left">
                    <em></em><i></i>
                    <div id="hisStatu"></div>
                    <div class="record text-center">
                        <h4 class="col col12 f12 h66 text-left margin-t15">大家都在看</h4>
                        <div class="col col12 margin-t10">
                            <?php $__LIST__ = D('Tag')->lists($cid, "hits desc","3", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="col col37">
                                <a href="<?php echo ($list['url']); ?>">
                                    <div style="height: 90px;overflow: hidden;">
                                        <img src="<?php echo ($list['pic']); ?>" class="img-full">
                                    </div>
                                    <span class="f12 h66 Show-Word"><?php echo (msubstr($list['title'],0,10)); ?></span>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col2 f14 text-center">
                <a href="#" class="tr_icons">
                    <i class="icon icon-history"></i>
                </a>
                <div class="show-record border-top text-left">
                    <em></em><i></i>
                    <div id="favorite"></div>
                    <div class="record text-center">
                        <div class="col col6 f12"></div>
                        <div class="col col6 f12 text-right"><a href="<?php echo U('/User/Favorites/index',array('type'=>1));?>" class="a1">私密收藏夹</a></div>
                    </div>
                </div>
            </div>
            <div class="col col2 f14 text-center">
                <a href="<?php echo U('Home/Other/index/tpl/app_down');?>" target="_blank" class="tr_icons">
                    <i class="icon icon-phone"></i>
                </a>
            </div>
            <div class="col col2 text-center">
                <?php if(empty($user['id'])): ?><a href="<?php echo ($user['userlogin']); ?>" class="tr_icons top_user">
                    <i class="icon icon-user"></i>
                </a>
                <?php else: ?>
                <a href="<?php echo ($user['userurl']); ?>" class="tr_icons top_user">
                    <img src="<?php echo ($user['path']); ?>">
                </a><?php endif; ?>
                <div class="show-record border-top text-left">
                    <em></em><i></i>
                    <div class="top-user text-center">
                        <?php if(empty($user['id'])): ?><h3 class="h66 f14 margin-t15">您还没有登录，请登录！</h3>
                        <a href="<?php echo ($user['userlogin']); ?>" class="btn btn-blue btn-big btn-radius margin-t15">登录</a>
                        <h3 class="h66 f12 margin-t15"><a href="<?php echo ($user['userreg']); ?>" class="a1">还没有帐号？立即注册</a></h3>
                        <?php else: ?>
                        <a href="<?php echo ($user['userurl']); ?>">
                        <div class="col col4 padding vl-align-top">
                            <img src="<?php echo ($user['path']); ?>" class="img-full">
                        </div>
                        <div class="col col8 padding text-left h66">
                            <ul class="padding-b8">
                                <li class="col col5 f12">用户名：</li>
                                <li class="col col7 f12"><?php echo ($user['username']); ?></li>
                            </ul>
                            <?php if($user['vip_time'] > time()): ?><ul class="padding-b8">
                                    <li class="col col5 f12">到期时间：</li>
                                    <li class="col col7 f12"><?php echo (time_format($user['vip_time'],"Y-m-d")); ?></li>
                                </ul>
                                <ul>
                                    <li class="col col5 f12">VIP：</li>
                                    <li class="col col7"><i class="icon icon-user-vip"></i></li>
                                </ul><?php endif; ?>
                        </div>
                        </a>
                        <div class="col col12 border-top">
                            <div class="col col6 padding f12 text-left">
                                <a href="<?php echo ($user['userurl']); ?>"><b>用户中心</b></a>
                            </div>
                            <div class="col col6 padding f12"><a href="<?php echo U('/User/Recom/index');?>">用户签到</a></div>
                        </div>
                        <div class="col col12 user-top-bottom bgcolor-f5f5 padding-tb8 padding-lr15 text-left">
                            <div class="col col6 f12"><?php if($user['vip_time'] < time()): ?><a href="/vip" target="_blank" class="a1">立即开通VIP</a><?php endif; ?></div>
                            <div class="col col6 f12 text-right"><a href="<?php echo ($user['userlogout']); ?>" class="a1">退出</a></div>
                        </div><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        
        <div id="banner" class="content">
            <ul id="banner_img">
                <?php $__SLIDER__ = D('Tag')->getSlider(9,"id,title,cover_id,link",2); if(is_array($__SLIDER__)): $i = 0; $__LIST__ = $__SLIDER__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slider): $mod = ($i % 2 );++$i;?><li>
                    <a href="<?php echo ($slider["url"]); ?>" target="_blank">
                        <img src="<?php echo ($slider["pic"]); ?>" data-adaptive-background="1">
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div id="banner_ctr" class="banner-right">
                <ul>
                    <?php $__SLIDER__ = D('Tag')->getSlider(9,"id,title,cover_id,link",2); if(is_array($__SLIDER__)): $i = 0; $__LIST__ = $__SLIDER__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slider): $mod = ($i % 2 );++$i;?><li><?php echo ($slider["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>

        <div class="content bgcolor-000">
            <div class="container padding-tb10">
                <ul class="nav-box">
                    <?php $__NAV__ = D('Tag')->getNav(0,"6",0,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="col nav-box-1">
                        <a href="<?php echo ($nav['url']); ?>"><?php echo ($nav['title']); ?></a>
                    </li>
                    <li class="col">
                        <?php $__NAV__ = D('Tag')->getNav($nav['id'],"6",0,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><a href="<?php echo ($menu['url']); ?>"><?php echo ($menu['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="col nav-box-3">
                        <a href="<?php echo U('Home/Other/index/tpl/vip');?>" target="_blank">
                            <div class="box-vip"></div>
                            <h5>开通VIP</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <?php $__NAV__ = D('Tag')->getNav(0,"",1,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($i) == "1"): ?><div class="content margin-t30">
                    <div class="container">
                        <div class="col col12 color-line padding-b5">
                            <h3 class="public_title">
                                <span>热映大片抢先看</span>
                            </h3>
                        </div>
                        <div class="col col12 move-list">
                            <?php $__LIST__ = D('Tag')->lists($nav['id'], "update_time desc","6", 1,"true",$pos); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="col col26">
                                <a href="<?php echo ($list['url']); ?>">
                                    <?php switch($list["tj_tag"]): case "1": ?><span class="tip tip-new"></span><?php break;?>
                                        <?php case "2": ?><span class="tip tip-hot"></span><?php break;?>
                                        <?php case "3": ?><span class="tip tip-big"></span><?php break;?>
                                        <?php case "4": ?><span class="tip tip-vip"></span><?php break; endswitch;?>
                                    
                                    <div class="list-img">
                                        <span class="player"></span>
                                        <img src="<?php echo ($list['pic']); ?>" class="img-full">
                                        <i><?php echo ($list['year']); ?></i>
                                    </div>
                                    <dl class="profiles bgcolor-fff text-left">
                                        <dt class="f14 h33"><?php echo (msubstr($list['title'],0,9)); ?></dt>
                                        <dd class="f12 h88"><?php echo (msubstr($list['actors'],0,11)); ?></dd>
                                        <em class="f14 orange"><?php echo ($list['ctitle']); ?></em>
                                    </dl>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <div class="content margin-t30">
                    <div class="container">
                        <div class="col col106 vl-align-top">
                            <div class="col col12 color-line">
                                <h3 class="public_title">
                                    <span><?php echo ($nav['title']); ?></span>
                                </h3>
                                <div class="subtitle f14 h88">
                                    <?php $__NAV__ = D('Tag')->getNav($nav['id'],"8",0,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mnav): $mod = ($i % 2 );++$i;?><a href="<?php echo ($mnav['url']); ?>"><?php echo ($mnav['title']); ?></a>
                                        <span>/</span><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <a href="<?php echo url_change("lists/index",array("name"=>"film","id"=>$nav['id']));?>">更多&gt;</a>
                                </div>
                            </div>
                            <div class="col col12 move-list">
                                <?php $__LIST__ = D('Tag')->lists($nav['id'], "update_time desc","10", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="col col25">
                                    <a href="<?php echo ($list['url']); ?>">
                                        <?php switch($list["tj_tag"]): case "1": ?><span class="tip tip-new"></span><?php break;?>
                                            <?php case "2": ?><span class="tip tip-hot"></span><?php break;?>
                                            <?php case "3": ?><span class="tip tip-big"></span><?php break;?>
                                            <?php case "4": ?><span class="tip tip-vip"></span><?php break; endswitch;?>
                                        <div class="list-img">
                                            <span class="player"></span>
                                            <img src="<?php echo ($list['pic']); ?>" class="img-full">
                                            <small><?php echo (msubstr($list['actors'],0,11)); ?></small>
                                        </div>
                                        <dl class="profiles bgcolor-fff text-left">
                                            <dt class="f14 h33"><?php echo (msubstr($list['title'],0,10)); ?></dt>
                                            <dd class="f12 h88"><i class="icon icon-small-play"></i><?php echo ($list['hits']); ?></dd>
                                            <em class="f14 orange"><?php echo ($list['ctitle']); ?></em>
                                        </dl>
                                    </a>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>

                        <div class="col col26 rank">
                            <div class="col col12">
                                <h3 class="public_title_f">
                                    <span><?php echo ($nav['title']); ?>排行榜</span>
                                </h3>
                            </div>
                            <div class="col col12 bgcolor-fff margin-t15 padding-b10">
                                <?php $__LIST__ = D('Tag')->lists($nav['id'], "hits desc","15", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><dl class="col col12 rank-list">
                                    <a href="<?php echo ($list['url']); ?>">
                                        <dd><?php echo ($i); ?></dd>
                                        <dt class="text-left"><?php echo (msubstr($list['title'],0,10)); ?></dt>
                                        <img src="<?php echo ($list['pic']); ?>" class="img-full">
                                    </a>
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="content margin-t30">
                    <div class="container">
                        <div class="col col106 ts-move-list move-list">
                            <div class="col col12 color-line">
                                <h3 class="public_title">
                                    <span><?php echo ($nav['title']); ?></span>
                                </h3>
                                <div class="subtitle f14 h88">
                                    <?php $__NAV__ = D('Tag')->getNav($nav['id'],"",0,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mnav): $mod = ($i % 2 );++$i;?><a href="<?php echo ($mnav['url']); ?>"><?php echo ($mnav['title']); ?></a>
                                    <span>/</span><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <a href="<?php echo url_change("lists/index",array("name"=>"dianshiju","id"=>$nav['id']));?>">更多&gt;</a>
                                </div>
                            </div>
                            <div class="col col42" id="<?php echo ($nav['name']); ?>">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php $__LIST__ = D('Tag')->lists($nav['id'], "update_time desc","3", 1,"true",$pos); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                                            <a href="<?php echo ($list['url']); ?>">
                                                <div class="list-img">
                                                    <span class="player"></span>
                                                    <img src="<?php echo ($list['pic']); ?>" class="img-full">
                                                </div>
                                                <dl class="profiles bgcolor-fff text-left">
                                                    <dt class="f16 h33"><?php echo (msubstr($list['title'],0,10)); ?></dt>
                                                    <dd class="f12 h88"><?php echo (msubstr($list['actors'],0,11)); ?></dd>
                                                    <em class="f12 h66"><i class="icon icon-small-play"></i><?php echo ($list['hits']); ?></em>
                                                </dl>
                                            </a>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                                <div class="swiper-pagination swiper-pagination-p1"></div>
                            </div>
                            <?php $__LIST__ = D('Tag')->lists($nav['id'], "update_time desc","6", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="col col266">
                                <a href="<?php echo ($list['url']); ?>">
                                    <?php switch($list["tj_tag"]): case "1": ?><span class="tip tip-new"></span><?php break;?>
                                        <?php case "2": ?><span class="tip tip-hot"></span><?php break;?>
                                        <?php case "3": ?><span class="tip tip-big"></span><?php break;?>
                                        <?php case "4": ?><span class="tip tip-vip"></span><?php break; endswitch;?>
                                    <div class="list-img">
                                        <span class="player"></span>
                                        <img src="<?php echo ($list['pic']); ?>" class="img-full">
                                        <small><?php echo ($list['serialize']); ?></small>
                                    </div>
                                    <dl class="profiles bgcolor-fff text-left">
                                        <dt class="f14 h33"><?php echo (msubstr($list['title'],0,10)); ?></dt>
                                        <dd class="f12 h88"><?php echo (msubstr($list['actors'],0,11)); ?></dd>
                                        <em class="f14 orange"><?php echo ($list['ctitle']); ?></em>
                                    </dl>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="col col26 rank" style="padding-bottom: 0">
                            <div class="col col12">
                                <h3 class="public_title_f">
                                    <span><?php echo ($nav['title']); ?>排行榜</span>
                                </h3>
                            </div>
                            <div class="col col12 bgcolor-fff margin-t15 padding-b10">
                                <?php $__LIST__ = D('Tag')->lists($nav['id'], "hits desc","10", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><dl class="col col12 rank-list" style="margin-top: 6.5px">
                                    <a href="<?php echo ($list['url']); ?>">
                                        <dd><?php echo ($i); ?></dd>
                                        <dt class="text-left"><?php echo (msubstr($list['title'],0,10)); ?></dt>
                                        <img src="<?php echo ($list['pic']); ?>" class="img-full">
                                    </a>
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                </div><?php endif; ?>

            <div class="content margin-t30">
                <div class="container">
                    <div class="ad-height col col36 border"><script src="/Public/Ad/index_377x100.js"></script></div>
                    <div class="ad-height col col70 border"><script src="/Public/Ad/index_779x100.js"></script></div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <!--
<div class="msg_winw">
    <div class="close">
        <img src="<?php echo ($tplpath); ?>/images/ad_close.png">
    </div>
    <script src="/index.php?s=/Home/Ad/index/id/13"></script>
</div>
-->
<style type="text/css">
    #ft.comlimi_footer {
    padding: 0;
    margin-top: 10px;
    padding-top: 20px;
    padding-bottom: 20px;
    border-top: 0px solid #f2f1f1;
    line-height: 24px;
    color: #555;
}
style_16_common.css:260
#ft {
    padding: 10px 0 50px;
    border-top: 1px solid #E9F5DE;
    line-height: 1.8;
    color: #555;
}
style_16_common.css:260
.comlimi_footer {
    background: #FFF url(http://www.suibiwang.com/template/comlimi_meiwencomcn/images/img/comlimi_footer_bg.png) repeat-x scroll 0px 0px;
    box-shadow: 1px 0px 3px #B0DE41;
    text-align: center;
    font-size: 14px;
}
style_16_common.css:260
body, ul, ol, li, p, h1, h2, h3, h4, h5, h6, form, fieldset, table, td, img, div, tr {
    margin: 0;
    padding: 0;
}
style_16_common.css:1
* {
    word-wrap: break-word;
}
.comlimi_footer p.p_1 {
    margin-bottom: 15px;
    color: #CCC;
}
style_16_common.css:260
.comlimi_footer p {
    line-height: 20px;
}
ul, li, p, em {
    list-style-type: none;
    -webkit-padding-start: 0;
    -webkit-margin-before: 0;
    -webkit-margin-after: 0;
    -webkit-margin-start: 0;
    -webkit-margin-end: 0;
    margin: 0;
    padding: 0;
}
body, ul, ol, li, p, h1, h2, h3, h4, h5, h6, form, fieldset, table, td, img, div, tr {
    margin: 0;
    padding: 0;
}
body, ul, ol, li, dl, dd, p, h1, h2, h3, h4, h5, h6, form, fieldset, .pr, .pc {
    margin: 0;
    padding: 0;
}
* {
    word-wrap: break-word;
}

p {
    display: block;
    -webkit-margin-before: 1em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
}
#ft.comlimi_footer {
    padding: 0;
    margin-top: 10px;
    padding-top: 20px;
    padding-bottom: 20px;
    border-top: 0px solid #f2f1f1;
    line-height: 24px;
    color: #555;
}

#ft {
    padding: 10px 0 50px;
    border-top: 1px solid #E9F5DE;
    line-height: 1.8;
    color: #555;
}
.comlimi_footer {
    background: #FFF url(http://www.suibiwang.com/template/comlimi_meiwencomcn/images/img/comlimi_footer_bg.png) repeat-x scroll 0px 0px;
    box-shadow: 1px 0px 3px #B0DE41;
    text-align: center;
    font-size: 14px;
}
</style>
<div id="ft" class="comlimi_footer">
    <p class="p_1">
        <a href="javascript:void(0);">申请友链</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);">关于我们</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);">小黑屋</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);">Archiver</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);">申请认证</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);">手机版</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);">App下载</a>
        <span class="pipe">|</span>
    </p>
    <p class="p_2"> 
        Copyright © 2012-2017 
        <a href="javascript:void(0);" target="_blank"><?php echo ($webtitle); ?> Inc.</a>
        &nbsp; All Rights Reserved.&nbsp; 
        <a href="javascript:void(0);" target="_blank"><?php echo ($webtitle); ?></a>
        &nbsp; 版权所有 &nbsp;
        <span class="pipe">|</span>
        <a href="javascript:void(0);" target="_blank" title="网站地图">网站地图</a>

        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=441380237&amp;site=qq&amp;menu=yes" target="_blank" title="QQ">  
            <img src="http://www.tntstudy.cn/public/static/index/images/site_qq.jpg" alt="QQ">
        </a>&nbsp;
        <meta name="baidu_union_verify" content="df6591fe416d4aadb483900e83e3a802">
    </p>
    <p class="p_2">Powered by 
        <a href="javascript:void(0);" target="_blank">心随互联！</a> 
        <em>X3.2</em>&nbsp;技术支持：
        <a href="javascript:void(0);" target="_blank"><?php echo ($webtitle); ?>运营部</a> &nbsp;备案信息：
        <a href="javascript:void(0);" target="_blank">赣ICP备16007291号-1</a>
    </p>
    <div class="footer_service">
       <!--  <p class="p_2">本站大部分界面参照
            <a href="http://www.suibiwang.com" style="color:#8EC61D;">随笔网</a>，站内部分内容则从美文网或技术博客上摘录并非原创，希望大家谅解！
        </p> -->
        <p class="p_2"><?php echo ($webtitle); ?>版权所有.未经授权禁止链接、复制或建立</p>
    </div>
</div>
<!-- <div class="content margin-t30 bgcolor-fff border-top padding-tb15">
    <div class="container">
        <div class="col col3 vl-align-top">
            <div class="col col12 text-left">
                <h3 class="public_title_f">客户端</h3>
            </div>
            <div class="col col12 margin-t10">
                <a href="<?php echo U('Home/Other/index/tpl/app_down');?>" target="_blank" class="col col4 f12 a1">iPad版</a>
                <a href="<?php echo U('Home/Other/index/tpl/app_down');?>" target="_blank" class="col col4 f12 a1">iPhone版</a>
                <a href="<?php echo U('Home/Other/index/tpl/app_down');?>" target="_blank" class="col col4 f12 a1">Android版</a>
            </div>
        </div>
        <div class="col col5 vl-align-top">
            <div class="col col12 text-left">
                <h3 class="public_title_f">版权说明</h3>
            </div>
            <div class="col col12 f12 margin-t10 bottom-word h66">
                如果来函说明本网站提供内容系本人或法人版权所有.<br>
本网站在核实后，有权先行撤除，以保护版权拥有者的权益 <br>
邮箱地址：info@168tv.eu  <br>
<?php echo ($webtitle); ?>版权所有.未经授权禁止链接、复制或建立
            </div>
        </div>
    </div>
</div> -->

<script type="text/javascript" src="<?php echo ($tplpath); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ($tplpath); ?>/js/jquery.mouseDelay.min.js"></script>
<script type="text/javascript" src="<?php echo ($tplpath); ?>/js/template/global.js"></script>
        <script type="text/javascript" src="<?php echo ($tplpath); ?>/js/jquery.New.Slider.js"></script>
        <script type="text/javascript" src="<?php echo ($tplpath); ?>/js/swiper-3.4.2.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo ($tplpath); ?>/js/jquery.adaptive-backgrounds.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                <?php $__NAV__ = D('Tag')->getNav(0,"",1,"id,title,name,pid,link"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if($i > 1): ?>var <?php echo ($nav['name']); ?> = new Swiper('#<?php echo ($nav['name']); ?> .swiper-container', {
                            direction: 'horizontal',
                            loop: true,
                            pagination: '.swiper-pagination-p1',
                            paginationType : 'bullets',
                            autoplayDisableOnInteraction : false,
                            autoplay: 5000
                        });<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                $.adaptiveBackground.run();
            });
        </script>
    </body>
</html>