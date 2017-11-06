<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Player/player/play_v1.css" rel="stylesheet" type="text/css" media="all">
<title>播放器</title>
</head>
<body>
<div class="player_contain player_contain_wide" id="player_container">
    <div class="player player_baropen" id="_player" style="z-index: 3;">
    <?php echo ($player["player_code"]); ?>
    </div><!--player 播放器自身 END-->
    <?php if((MOBILE) == "web"): ?><div class="playerbar  playerbar_open" id="sideSub" style="right: -5px;">
        <a href="javascript:;" class="playerbar_tigger" hidefocus="hidefocus" id="playerbar_tigger" title="收起播放列表" kkpv_filter="yes">收起播放列表</a>
        <div class="playerbar_con">
            <div class="tab_menu">
                <ul>
                    <li class="one on">
                        <span><?php echo ($player["ptitle"]); ?></span><em></em>
                    </li>
                     <div class="cm-opt">
                        <?php $__PLAYLIST__ = D('Tag')->playlistTag($id,''); if(is_array($__PLAYLIST__)): $i = 0; $__LIST__ = $__PLAYLIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$play): $mod = ($i % 2 );++$i; if(($play['type']) != "1"): ?><a id="#player_url_<?php echo ($play['id']); ?>" href="javascript:;"><?php echo ($play["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                     </div>
                </ul>
                <div class="switch switch_mode" id="sub_mode_switch_c">
                  <a title="列表模式" href="javascript:;" id="sub_mode_switch_list"><span class="switch_list">列表模式</span></a>
                  <a class="on" title="文字模式" href="javascript:;" id="sub_mode_switch_txt"><span class="switch_txt">文字模式</span></a>
                  <a class="on" title="倒序排列" href="javascript:;" id="sub_mode_switch_sort"><span class="switch_asc">倒序排列</span></a>
                </div>					
            </div>
            <div class="playerbar_contain scroll-bar">
                <?php $__PLAYLIST__ = D('Tag')->playlistTag($id,''); if(is_array($__PLAYLIST__)): $i = 0; $__LIST__ = $__PLAYLIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$play): $mod = ($i % 2 );++$i; if(($play['type']) != "1"): ?><ul id="player_url_<?php echo ($play['id']); ?>" class="diversity diversity_zy">
                     <?php if(is_array($play['movie_url'])): $i = 0; $__LIST__ = $play['movie_url'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$url): $mod = ($i % 2 );++$i;?><li <?php if(($_GET['n']== $i) AND ($player['id'] == $play['id']) ): ?>class="on"<?php endif; ?> name="<?php echo ($i); ?>">
                       <a href="<?php echo ($url['url']); ?>" title="<?php echo ($url['title']); ?>" target="_parent"><?php echo ($i); ?></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>					
        </div>
	</div><?php endif; ?>
    <?php if(($player["adon"]) == "1"): ?><div class="playad">
        <p class="timer">广告倒计时<span id="playad_timer"></span>秒</p>
        <div id="playad_container"><?php echo (htmlspecialchars_decode($player["player_ad"])); ?></div><!--.  END-->
        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" style="position:absolute;top:0;left:0;width:100%;height:100%;filter:alpha(opacity=0);"></iframe>
	</div><!--playad 5s END--><?php endif; ?>
</div>
<script src="/Public/Player/player/jquery.js"></script>
<script src="/Public/Player/player/jquery.cookie.js"></script>
<script src="/Public/Player/player/history.js"></script>
<script type="text/javascript">
$(function(){
	<?php if((MOBILE) == "web"): ?>$("#playerbar_tigger").click(function(){
			if($("#playerbar_tigger").attr("kkpv_filter")=='yes'){
				$("#sideSub").animate({right: '-305px'},250,function(){
					$("#_player").removeClass("player_baropen");
					$("#sideSub").removeClass("playerbar_open");
					$("#playerbar_tigger").attr("title","展开播放列表");
					$("#playerbar_tigger").attr("kkpv_filter","on");
					$("#playerbar_tigger").text("展开播放列表");
					$('.player').css('width',$(document).width()-20);
				});
			}else{
				$("#sideSub").animate({right: '-5px'},250,function(){
					$("#sideSub").addClass("playerbar_open");
					$("#playerbar_tigger").attr("title","收起播放列表");
					$("#playerbar_tigger").attr("kkpv_filter","yes");
					$("#playerbar_tigger").text("收起播放列表");
				});
				$("#_player").addClass("player_baropen");
				$('.player_baropen').css('width',$(document).width()-320);
			}
		});
		
		$('.tab_menu ul').hover(function(){
			$(this).find('.cm-opt').fadeIn(300);
		},function(){
			$(this).find('.cm-opt').fadeOut(300);
		});
		
		$(".cm-opt a").click(function(){
			$('.tab_menu li span').text($(this).text());
			$(this).parent().hide();
			$('.playerbar_contain ul').hide();
			$($(this).attr('id')).show();
		});
		
		$('#sub_mode_switch_sort').click(function(){
			var divTestJQ = $(".playerbar_contain ul:visible");
			var divJQ = $(">li", divTestJQ);
			var EntityList = [];
			var lisort=true;
			if($(this).find("span").attr("class")=="switch_dsc"){
				$(this).find("span").removeClass("switch_dsc").addClass("switch_asc");
				$(this).attr("title","倒序排列").find("span").text("倒序排列");
				lisort=true;
			}else{
				$(this).find("span").removeClass("switch_asc").addClass("switch_dsc");
				$(this).attr("title","正序排列").find("span").text("正序排列");
				lisort=false;
				
			}
			divJQ.each(function () {
				var thisJQ = $(this);
				EntityList.push({ Name: parseInt(thisJQ.attr("name"), 10), JQ: thisJQ });
			});
			EntityList.sort(function (a, b){
				if(lisort){
					return a.Name - b.Name;
				}else{
					return b.Name - a.Name;
				}
			});
			for (var i = 0; i < EntityList.length; i++){
				EntityList[i].JQ.appendTo(divTestJQ);
			};
		});
		$('#sub_mode_switch_txt').click(function(){
				mode_switch("txt",this);
		});
		$('#sub_mode_switch_list').click(function(){
				mode_switch("list",this);
		});
		$('#player_url_<?php echo ($player["id"]); ?>').show();
		mode_switch($.cookie('sub_mode_switch'),'#sub_mode_switch_'+$.cookie('sub_mode_switch'));
		if($.cookie('sub_mode_switch')=='txt'){
			var scrollHeight=(<?php echo ($_GET['n']); ?>-1)*41/5;
		}else{
			var scrollHeight=(<?php echo ($_GET['n']); ?>-1)*41;
		}
		$(".scroll-bar").animate({scrollTop:scrollHeight},300);
		player_width();<?php endif; ?>
	$('.player_contain').css('height',$('#playeriframe', parent.document).height());
	<?php if(($player["adon"]) == "1"): ?>timer(intDiff);<?php endif; ?>
	<?php if(($player_recom) == "1"): ?>player_time();<?php endif; ?>
	<?php if(($record_on) == "1"): ?>history_add();<?php endif; ?>
});

<?php if((MOBILE) == "web"): ?>function mode_switch(mode,xthis){
	var divTestJQ = $(".playerbar_contain ul");
	if(!$(xthis).hasClass("on")){
		var divJQ = $(">li", divTestJQ);
		divJQ.each(function () {
			var thisJQ = $(this);
			var thistitle = thisJQ.find("a").attr("title");
			var thisname = thisJQ.find("a").text();
			if(thisJQ.find("a").find("sup").is("sup")){
				thistitle+=thisJQ.find("a").find("sup").prop('outerHTML');
			}
			thisJQ.find("a").html(thistitle).attr("title",thisname);
		});
	}
	$(xthis).addClass("on");
	if(mode=="txt"){
		$(xthis).prev().removeClass("on");
		divTestJQ.removeClass("diversity_zy").addClass("diversity_tv");
	}else{
		$(xthis).next().removeClass("on");
		divTestJQ.removeClass("diversity_tv").addClass("diversity_zy");
	}
	if(mode!=$.cookie('sub_mode_switch')){
		$.cookie('sub_mode_switch',mode ,{expires:365});
	}
}

function player_width(){
	$('.player_contain').css('width',$(document).width());
	$('.player').css('width',$(document).width()-20);
	$('.player_baropen').css('width',$(document).width()-320);
}<?php endif; ?>

var intDiff = parseInt(<?php echo ($player['timer']); ?>);//倒计时总秒数量
function timer(intDiff){
    iCount = window.setInterval(function(){
		if(intDiff > 0){
			$('#playad_timer').text(intDiff);
		}else{
			clearInterval(iCount);
			$('.playad').remove();
		}
		intDiff--;
	}, 1000);
}
function player_recom(){
	$.get('<?php echo U("User/Recom/play");?>');
}

function player_time(){
	window.setInterval(function(){
		player_recom();
	}, 1000*60*<?php echo C('USER_PLAY_TIME');?>);
}

function history_add(){
	var host = window.parent.location.href,
	date = new Date();
	add_history({
		'title'   : '<?php echo ($movie["title"]); ?>',
		'id'      : '<?php echo ($movie["id"]); ?>',
		'url'     : '<?php echo ($movie["url"]); ?>',
		'purl'    : host,
		'time'    : date.getTime()
	});
}
</script>
</body>
</html>