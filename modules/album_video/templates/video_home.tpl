
{*if $row}
<div class="col47per fr">
    <div class="head_bar"><img src="{$url}images/icon_video.png"/><span>Video</span> </div>
    <a href="{$url}{$row.pre_link}-{$row.id}.html" class="video_focus thumb_over"> <span class="icon_play"></span> <span class="title_thumb_bottom">{$row.title}</span> <img style="width: 462px" src="{$url}upload/gallery/video/{$row.photo}"/> </a>
</div>
{/if*}

<style>
#play_show_video {
	display: none; overflow: hidden; border: 7px solid #444444;
}
</style>
<script>
$(function(){

	var img = document.getElementById('this_img'); 
	//or however you get a handle to the IMG
	var width = img.clientWidth;
	var height = img.clientHeight;
	//console.log(width + 'x' + height);
	$('#play_show_video').css('width', width+'px');
	$('#play_show_video').css('height', height+'px');

	$('.video_play_click').click(function(){
		$(this).hide();
		$('#play_show_video').show();
		
		_div = $('#play_show_video').find('div');
		_div.attr('data-maxwidth', width);
		_div.attr('data-maxheight', height);
		_div.find('iframe').attr('width', width);
		_div.find('iframe').attr('height', height);
		_src_embed = _div.find('iframe').attr('src').replace("?", "?autoplay=1&");
		_div.find('iframe').attr('src', _src_embed);
		return false;
	})

	
})
</script>
<div class="col47per fr">
    <div class="head_bar"><img src="{$url}images/icon_video.png"/><a href="{$url}video/"><span>Video</span></a></div>
	
    <a href="{$url}{$row.pre_link}-{$row.id}.html" class="video_focus thumb_over video_play_click">
		<span class="icon_play"></span>
		<span class="title_thumb_bottom">{$row.title}</span>
		<img id="this_img" style="width: 462px" src="{$url}upload/gallery/video/{$row.photo|default:'no-image.jpg'}"/>
	</a>
	<div id="play_show_video">
		{$row.embed}
	</div>
</div>
