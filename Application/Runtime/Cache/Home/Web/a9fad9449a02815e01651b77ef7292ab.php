<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title><?php echo ($title); ?>-<?php echo ($webtitle); ?></title>
        <meta name="keywords" content="<?php echo ($keywords); ?>">
        <meta name="description" content="<?php echo ($description); ?>">
        <link href="<?php echo ($tplpath); ?>/css/global.css" rel="stylesheet">
        <link href="<?php echo ($tplpath); ?>/css/style.css" rel="stylesheet">
        <link href="<?php echo ($tplpath); ?>/css/idangerous.swiper.css" rel="stylesheet">
        <!--[if lt IE 8]>
            <script src="<?php echo ($tplpath); ?>/js/html5shiv.js"></script>
        <![endif]-->
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

		<div class="content profile-top-bg">
			<div class="container">
				<div class="col col3"></div>
				<div class="col col9">
					<h1 class="white f36 margin-t30">
						<?php echo ($title); ?>
					</h1>
                    <?php if(($serialize) > "0"): ?><h3 class="white f14 margin-t10"><?php echo ($serialize); ?></h3><?php endif; ?>
				</div>
			</div>
		</div>

		<div class="content bgcolor-fff padding-tb15">
			<div class="container">
				<div class="col col3 vl-align-top">
					<div class="profile-cover"><img src="<?php echo ($pic); ?>" class="img-full"></div>
					<div class="dig">
						<span <?php echo ($digg['up_js']); ?> class="player_up pl_mov"><?php echo ($digg['up']); ?></span>
						<span <?php echo ($digg['down_js']); ?> class="player_down pl_mov pl_movri"><?php echo ($digg['down']); ?></span>
						<a href="javascript:;" <?php echo ($favorites); ?> class="player_sc pl_mov margin-t15">收藏</a>
						<span class="player_hot pl_mov pl_movri margin-t15"><?php echo ($hits); ?></span>
					</div>
				</div>
				<div class="col col6 h88 vl-align-top padding-r15">
					<div class="col col12 f14 padding-tb8">
						<a href="/">首页</a>	&gt;
						<a href="<?php echo url_change('lists',array('id'=>get_category_parent($cid),'name'=>get_category_name(get_category_parent($cid))));?>" class="a1"><?php echo get_category(get_category_parent($cid));?></a>	&gt;
						<a href="<?php echo ($curl); ?>" class="a1"><?php echo ($ctitle); ?></a>	&gt;
						<a href="<?php echo ($url); ?>" class="a1"><?php echo ($title); ?></a>
					</div>
					<div class="col col12 f14 padding-tb8">类型：<a href="<?php echo ($curl); ?>" class="a1"><?php echo ($ctitle); ?></a></div>
					<div class="col col12 f14 padding-tb8">主演：
						<?php if(is_array($actors_array)): $i = 0; $__LIST__ = $actors_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$actors): $mod = ($i % 2 );++$i;?><a href="<?php echo ($actors['url']); ?>" class="a1"><?php echo ($actors['actors']); ?></a> /<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="col col6 f14 padding-tb8">年份：<a href="<?php echo U('lists/lists',array('id'=>$cid,'year'=>$year));?>" class="a1"><?php echo ($year); ?></a></div>
					<div class="col col6 f14 padding-tb8">导演：<a href="<?php echo U('search/index',array('id'=>$cid,'keyword'=>$directors));?>" class="a1"><?php echo ($directors); ?></a></div>
					<div class="col col6 f14 padding-tb8">区域：<a href="<?php echo U('lists/lists',array('id'=>$cid,'area'=>$area));?>" class="a1"><?php echo ($area); ?></a></div>
					<div class="col col6 f14 padding-tb8">语言：<a href="<?php echo U('lists/lists',array('id'=>$cid,'language'=>$language));?>" class="a1"><?php echo ($language); ?></a></div>
					<div class="col col12 f14 padding-tb8 profile-word">简介：<?php echo ($content); ?></div>
					<div class="col col12 f14 padding-tb8 a2 profile-show">点击展开全部</div>
				</div>
				<div class="col col3 bgcolor-f8f8 padding label-radius">
					<div class="col col12">
						<h3 class="public_title_f">
							<span>公告</span>
						</h3>
					</div>
					<ul class="col col12 margin-t10">
						<?php $__NEWS__ = D('Tag')->news(101, "id","8", 1,"true"); if(is_array($__NEWS__)): $i = 0; $__LIST__ = $__NEWS__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><a href="<?php echo ($news['url']); ?>" class="col col12 f12 border-bottom-d padding-tb8 a1">• <?php echo ($news['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="content margin-t15 padding-tb15">
			<div class="container">
				<div class="col col77 f12 bgcolor-fff padding vl-align-top">
					<div class="col col12 ad-height">
						<script src="/Public/Ad/movie_840x100.js"></script>
					</div>
					<?php $__PLAYLIST__ = D('Tag')->playlistTag($id,''); if(is_array($__PLAYLIST__)): $i = 0; $__LIST__ = $__PLAYLIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?><div class="col col12 play-list <?php if(($i) != "1"): ?>margin-t30<?php endif; ?>">
						<h2 class="col f16 u-tab-title"><?php echo ($player['title']); ?><em></em></h2>
					</div>
					<div class="col col12 padding-tb15" name="PlayList">
						<?php if(is_array($player['movie_url'])): $i = 0; $__LIST__ = $player['movie_url'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$url): $mod = ($i % 2 );++$i;?><a href="<?php echo ($url['url']); ?>" target="_player" <?php if(($player['vip']) == "1"): echo ($url['vip_js']); endif; ?> class="label label-hover margin-t10"><?php echo ($url['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
						<span class="label label-hover margin-t10" name="play-show"></span>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>


					<div class="col col12 ad-height">
						<script src="/Public/Ad/movie_840x100.js"></script>
					</div>

					<div class="col col12 margin-t30">
						<h3 class="public_title_f">猜你喜欢</h3>
					</div>
					<div class="col col12 move-list">
						<?php $__LIST__ = D('Tag')->lists($cid, "hits desc","12", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="col col286">
							<a href="<?php echo ($list['url']); ?>">
								<span class="tip"></span>
								<div class="list-img">
									<span class="player"></span>
									<img src="<?php echo ($list['pic']); ?>" class="img-full">
									<i><?php echo ($list['year']); ?></i>
								</div>
								<dl class="profiles bgcolor-fff text-left">
									<dt class="f14 h33 like-dt"><?php echo (msubstr($list['title'],0,9)); ?></dt>
									<dd class="f12 h88"><?php echo (msubstr($list['actors'],0,11)); ?></dd>
								</dl>
							</a>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
						<div class="col col12 margin-t30">
							<iframe id="comment" scrolling="no" frameborder="0" style="height: 571px; display: block !important; width: 100% !important; border: 0px none !important; overflow: hidden !important;" src="/index.php?s=/Home/Comment/index/id/<?php echo ($id); ?>/limit/5"></iframe>
						</div>
					</div>
				</div>

				<div class="col col33 vl-align-top">
					<div class="col col12 bgcolor-fff padding">
						<div class="col col12">
							<h3 class="public_title_f"><?php echo ($ctitle); ?>排行榜</h3>
						</div>
						<div class="col col12 margin-t15 padding-b10 rank">
							<?php $__LIST__ = D('Tag')->lists($cid, "hits desc","10", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><dl class="col col12 rank-list">
								<a href="<?php echo ($list['url']); ?>">
									<dd><?php echo ($i); ?></dd>
									<dt><?php echo (msubstr($list['title'],0,10)); ?></dt>
									<img src="<?php echo ($list['pic']); ?>" class="img-full">
								</a>
							</dl><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>


					<div class="col col12 bgcolor-fff margin-t15 padding move-type">
						<dl class="col col12 f12 vl-align-top">
							<dt class="f14"><span class="padding-lr8">类型</span></dt>
							<dd>
								<?php $__TYPE__ = D('Tag')->typeTag($cid); if(is_array($__TYPE__)): $i = 0; $__LIST__ = $__TYPE__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><a href="<?php echo ($type['url']); ?>" class="a1"><?php echo ($type['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</dd>
						</dl>
						<dl class="col col12 f12 vl-align-top">
							<dt class="f14"><span class="padding-lr8">地区</span></dt>
							<dd>
								<?php $__AREA__ = D('Tag')->classTag($cid,'AREA'); if(is_array($__AREA__)): $i = 0; $__LIST__ = $__AREA__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><a href="<?php echo ($area['url']); ?>" class="a1"><?php echo ($area['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</dd>
						</dl>
						<dl class="col col12 f12 vl-align-top">
							<dt class="f14"><span class="padding-lr8">年代</span></dt>
							<dd>
								<?php $__YEAR__ = D('Tag')->classTag($cid,'YEAR'); if(is_array($__YEAR__)): $i = 0; $__LIST__ = $__YEAR__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i;?><a href="<?php echo ($year['url']); ?>" class="a1"><?php echo ($year['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</dd>
						</dl>
						<dl class="col col12 f12 vl-align-top">
							<dt class="f14"><span class="padding-lr8">语言</span></dt>
							<dd>
								<?php $__LANGUAGE__ = D('Tag')->classTag($cid,'LANGUAGE'); if(is_array($__LANGUAGE__)): $i = 0; $__LIST__ = $__LANGUAGE__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$language): $mod = ($i % 2 );++$i;?><a href="<?php echo ($language['url']); ?>" class="a1"><?php echo ($language['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</dd>
						</dl>
					</div>

					<div class="col col12 bgcolor-fff padding margin-t15 ">
						<div class="col col12">
							<h3 class="public_title_f">最新更新</h3>
						</div>
						<div class="col col12 margin-t15 r-h-list">
							<?php $__LIST__ = D('Tag')->lists($cid, "update_time desc","6", 1,"true"); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><dl class="col col6 padding">
								<a href="<?php echo ($list['url']); ?>">
									<dd><img src="<?php echo ($list['pic']); ?>" class="img-full"></dd>
									<dt class="f14 h88"><?php echo (msubstr($list['title'],0,10)); ?></dt>
								</a>
							</dl><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>

				</div>

			</div>
		</div>

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
		<script type="text/javascript">
			$(function(){
				// 顶和踩的位置
				function DigChenge() {
					var DigTop = $('.profile-cover').outerHeight(true) - 100;
					var DigWidth = $('.profile-cover').outerWidth(true);
					$('.dig').css({'top':DigTop,'width':DigWidth});
				};

				var img = new Image();
				img.src = $('.profile-cover img').attr("src");
				img.onload = function(){
					DigChenge();
					$(window).resize(function () {
						DigChenge()
					});
				};

			});
		</script>
	</body>
	

</html>